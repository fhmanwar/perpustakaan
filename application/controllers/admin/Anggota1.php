<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('anggota_model');
    }


    public function index(){
      $anggota = $this->anggota_model->listing();

      $data = array(
        'title' => 'Data Anggota('.count($anggota).')',
        'anggota'	=> 	$anggota,
        'isi'     => 'admin/anggota/list'
      );
        $this->load->view('admin/layout/file', $data, false);
    }

    public function tambah(){
      $valid = $this->form_validation;
      $valid->set_rules('nama_anggota','Nama','required', array( 'required' => 'Nama harus diisi'));
      $valid->set_rules('email','Email','required|valid_email',
  		 									array( 'required' 		=> '%s harus diisi',
  														 'valid_email'	=> '%s tidak valid'));

      $valid->set_rules('username','Username','required|is_unique[anggota.username]',
  											array( 'required' 	=> '%s harus diisi',
  														 'is_unique'	=> '%s: <strong>'.$this->input->post('username').
  						   							 '</strong> sudah digunakan. Buat username baru!'));

      $valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
  											array( 'required' 		=> 'Password harus diisi',
  														 'min_length'		=> 'password min 6 character',
  													 	 'max_length'		=> 'password max 32 character'));

     if($valid->run()===FALSE) {
     // End validasi

     $data = array( 'title' => 'Create Anggota',
                    // 'home'  => $home,
                    'isi'  => 'admin/anggota/tambah');
     $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
 			$i = $this->input;
 			$data = array( 	'id_user'		 		    =>	$this->session->userdata('id_user'),
                      'status_anggota'	  => $i->post('status_anggota'),
                      'nama_anggota'	    => 	$i->post('nama_anggota'),
 											'email'		 		      =>	$i->post('email'),
                      'tlp'		 		      =>	$i->post('tlp'),
                      'instansi'	        =>	$i->post('instansi'),
 											'username'     	    =>	$i->post('username'),
 											'password'	   	    =>	sha1($i->post('password'))
                    );
 			$this->anggota_model->tambah($data);
 			$this->session->set_flashdata('success','Anggota created successfully');
 			redirect(base_url('admin/anggota'),'refresh');
 		}
  }
  // Edit Anggota
	public function edit($id_anggota) {
		// $home = $this->home_model->listing();
		$anggota = $this->anggota_model->detail($id_anggota);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_anggota','Nama','required', array( 'required' => 'Nama harus diisi'));

	  $valid->set_rules('email','Email','required|valid_email',
 												array( 'required' 		=> 'email harus diisi',
	 												 		 'valid_email'	=> 'Email tidak valid'));

		if($valid->run()===FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Edit Anggota'.$anggota->nama_anggota,
											'anggota'		=> $anggota,
											'isi' 		=> 'admin/anggota/edit');
			$this->load->view('admin/layout/file',$data);
		// masuk database
		}else{
			$i = $this->input;
			if(strlen($i->post('password')) > 6  ){
				$data = array( 	'id_anggota'			  => 	$id_anggota,
                        'id_user'		 		    =>	$this->session->userdata('id_user'),
                        'status_anggota'	  => $i->post('status_anggota'),
                        'nama_anggota'	    => 	$i->post('nama_anggota'),
                        'email'		 		      =>	$i->post('email'),
                        'tlp'		 		        =>	$i->post('tlp'),
                        'instansi'	        =>	$i->post('instansi'),
                        'password'	   	    =>	sha1($i->post('password'))
                      );
			}else {
				$data = array( 	'id_anggota'			  => 	$id_anggota,
                        'id_user'		 		    =>	$this->session->userdata('id_user'),
                        'status_anggota'	  => $i->post('status_anggota'),
                        'nama_anggota'	    => 	$i->post('nama_anggota'),
                        'email'		 		      =>	$i->post('email'),
                        'tlp'		 		        =>	$i->post('tlp'),
                        'instansi'	        =>	$i->post('instansi')
                      );
			}
			$this->anggota_model->edit($data);
			$this->session->set_flashdata('success','Anggota/Administrator updated successfully');
			redirect(base_url('admin/anggota'));
		}
		// End masuk database
	}

  // Delete Anggota
	public function delete($id_anggota) {
    //proteksi halaman
    if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

		$data = array('id_anggota'=> $id_anggota);
		$this->anggota_model->delete($data);
		$this->session->set_flashdata('Success','Anggota/Administrator Deleted successfully');
		redirect (base_url('admin/anggota'),'refresh');
	}
}
