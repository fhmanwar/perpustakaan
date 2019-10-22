<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('jenis_model');
    }


    public function index(){
      $jenis = $this->jenis_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('nama_jenis','Nama','required', array( 'required' => 'Nama harus diisi'));

      $valid->set_rules('kode_jenis','Kode Jenis','required|is_unique[jenis.kode_jenis]',
  											array( 'required' 	=> '%s harus diisi',
  														 'is_unique'	=> '%s: <strong>'.$this->input->post('kode_jenis').
  						   							 '</strong> sudah digunakan. Buat kode jenis buku baru!'));

     if($valid->run()===FALSE) {
     // End validasi

     $data = array( 'title' => 'Kelola Jenis Buku',
                    'jenis'	=> 	$jenis,
                    // 'home'  => $home,
                    'isi'  => 'admin/jenis/list');
     $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
 			$i = $this->input;
 			$data = array( 	'kode_jenis'		=>	$i->post('kode_jenis'),
 											'nama_jenis'		=> 	$i->post('nama_jenis'),
 											'keterangan'		=>	$i->post('keterangan'),
                      'urutan'		    =>	$i->post('urutan')
                    );
 			$this->jenis_model->tambah($data);
 			$this->session->set_flashdata('success','Jenis created successfully');
 			redirect(base_url('admin/jenis'),'refresh');
 		}
  }
  // Edit Jenis
	public function edit($id_jenis) {
		// $home = $this->home_model->listing();
		$jenis = $this->jenis_model->detail($id_jenis);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_jenis','Nama','required', array( 'required' => 'Nama harus diisi'));

		if($valid->run()===FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Edit Jenis '.$jenis->nama_jenis,
											'jenis'		=> $jenis,
											'isi' 		=> 'admin/jenis/edit');
			$this->load->view('admin/layout/file',$data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array( 	'id_jenis'			=> 	$id_jenis,
                      'kode_jenis'		=>	$i->post('kode_jenis'),
                      'nama_jenis'		=> 	$i->post('nama_jenis'),
                      'keterangan'		=>	$i->post('keterangan'),
                      'urutan'		    =>	$i->post('urutan')
                    );
			$this->jenis_model->edit($data);
			$this->session->set_flashdata('success','Jenis updated successfully');
			redirect(base_url('admin/jenis'));
		}
		// End masuk database
	}

  // Delete Jenis
	public function delete($id_jenis) {
    //proteksi halaman
    if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

		$data = array('id_jenis'=> $id_jenis);
		$this->jenis_model->delete($data);
		$this->session->set_flashdata('Success','Jenis Deleted successfully');
		redirect (base_url('admin/jenis'),'refresh');
	}
}
