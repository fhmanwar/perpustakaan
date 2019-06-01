<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Link extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
			$this->load->model('link_model');
			//proteksi halaman
			if($this->session->userdata('username') == ""){
				$this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
				redirect(base_url('login'),'refresh');
			}
    }


    public function index(){
      $link = $this->link_model->listing();

      $valid = $this->form_validation;
      $valid->set_rules('nama_link','Nama Link','required', array( 'required' => 'Nama Link harus diisi'));

      $valid->set_rules('url',' Alamat Link','required|is_unique[link.url]',
  											array( 'required' 	=> '%s harus diisi',
  														 'is_unique'	=> '%s: <strong>'.$this->input->post('url').
  						   							 '</strong> sudah digunakan. Buat Alamat Link baru!'));

     if($valid->run()===FALSE) {
     // End validasi

     $data = array( 'title' => 'Konfigurasi Link',
                    'link'	=> 	$link,
                    'isi'  => 'admin/link/list');
     $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
 			$i = $this->input;
 			$data = array( 	'nama_link'		=>	$i->post('nama_link'),
 											'url'	      	=> 	$i->post('url'),
                      'target'		    =>	$i->post('target')
                    );
 			$this->link_model->tambah($data);
 			$this->session->set_flashdata('success','Link created successfully');
 			redirect(base_url('admin/link'),'refresh');
 		}
  }
  // Edit Link
	public function edit($id_link) {
		// $home = $this->home_model->listing();
		$link = $this->link_model->detail($id_link);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_link','Nama Link','required', array( 'required' => 'Nama Link harus diisi'));

		if($valid->run()==FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Konfigurasi Link ',
											'link'		=> $link,
											'isi' 		=> 'admin/link/edit');
			$this->load->view('admin/layout/file',$data);
		// masuk database
		}else{
			$i = $this->input;
			$data = array( 	'id_link'			=> 	$id_link,
                      'url'		=>	$i->post('url'),
                      'nama_link'		=> 	$i->post('nama_link'),
                      'target'		=>	$i->post('target')
                    );
			$this->link_model->edit($data);
			$this->session->set_flashdata('success','Link updated successfully');
			redirect(base_url('admin/link'));
		}
		// End masuk database
	}

  // Delete Link
	public function delete($id_link) {
		$data = array('id_link'=> $id_link);
		$this->link_model->delete($data);
		$this->session->set_flashdata('Success','Link Deleted successfully');
		redirect (base_url('admin/link'),'refresh');
	}
}
