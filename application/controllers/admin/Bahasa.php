<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bahasa extends CI_Controller
{

    public function __construct() {
			parent::__construct();
			//proteksi halaman
			if($this->session->userdata('username') == "" && $this->session->userdata('level') != "Admin" ){
				$this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
				redirect(base_url('login'),'refresh');
			}
			
      // $this->load->model('home_model');
      $this->load->model('bahasa_model');
    }


    public function index(){
      $bahasa = $this->bahasa_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('nama_bahasa','Nama','required', array( 'required' => 'Nama harus diisi'));

      $valid->set_rules('kode_bahasa','Kode Bahasa','required|is_unique[bahasa.kode_bahasa]',
  											array( 'required' 	=> '%s harus diisi',
  														 'is_unique'	=> '%s: <strong>'.$this->input->post('kode_bahasa').
  						   							 '</strong> sudah digunakan. Buat kode bahasa buku baru!'));

     if($valid->run()===FALSE) {
     // End validasi

     $data = array( 'title' => 'Kelola Bahasa Buku',
                    'bahasa'	=> 	$bahasa,
                    // 'home'  => $home,
                    'isi'  => 'admin/bahasa/list');
     $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
 			$i = $this->input;
 			$data = array( 	'kode_bahasa'		=>	$i->post('kode_bahasa'),
 											'nama_bahasa'		=> 	$i->post('nama_bahasa'),
 											'keterangan'		=>	$i->post('keterangan'),
                      'urutan'		    =>	$i->post('urutan')
                    );
 			$this->bahasa_model->tambah($data);
 			$this->session->set_flashdata('success','Bahasa created successfully');
 			redirect(base_url('admin/bahasa'),'refresh');
 		}
  }
  // Edit Bahasa
	public function edit($id_bahasa) {
		// $home = $this->home_model->listing();
		$bahasa = $this->bahasa_model->detail($id_bahasa);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_bahasa','Nama','required', array( 'required' => 'Nama harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Edit Bahasa '.$bahasa->nama_bahasa,
											'bahasa'		=> $bahasa,
											'isi' 		=> 'admin/bahasa/edit');
			$this->load->view('admin/layout/file',$data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array( 	'id_bahasa'			=> 	$id_bahasa,
                      'kode_bahasa'		=>	$i->post('kode_bahasa'),
                      'nama_bahasa'		=> 	$i->post('nama_bahasa'),
                      'keterangan'		=>	$i->post('keterangan'),
                      'urutan'		    =>	$i->post('urutan')
                    );
			$this->bahasa_model->edit($data);
			$this->session->set_flashdata('success','Bahasa updated successfully');
			redirect(base_url('admin/bahasa'));
		}
		// End masuk database
	}

  // Delete Bahasa
	public function delete($id_bahasa) {

		$data = array('id_bahasa'=> $id_bahasa);
		$this->bahasa_model->delete($data);
		$this->session->set_flashdata('Success','Bahasa Deleted successfully');
		redirect (base_url('admin/bahasa'),'refresh');
	}
}
