<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
  // Load database
  public function __construct(){
    parent::__construct();
    // $this->load->model('home_model');
    $this->load->model('user_model');
    // $this->load->model('video_model');
    // $this->load->model('berita_model');
    // $this->load->model('produk_model');
    // $this->load->model('kategori_produk_model');
    // $this->load->model('kategori_berita_model');
  }

    public function index()
    {
      $data = array('title' => 'Login Administrator',
                  'isi'   => 'admin/dasbor/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    // Profil
    public function profile() {
  		// $home = $this->home_model->listing();
      $id_user = $this->session->userdata('id_user');
  		$user = $this->user_model->detail($id_user);

  		// Validasi
  		$valid = $this->form_validation;
  		$valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));

  	  $valid->set_rules('email','Email','required|valid_email',
   												array( 'required' 		=> 'email harus diisi',
  	 												 		 'valid_email'	=> 'Email tidak valid'));

  		if($valid->run()===FALSE) {
  		// End validasi

  			$data = array( 	'title' 	=> 'Update Profile'.$user->nama,
  											'user'		=> $user,
  											'isi' 		=> 'admin/dasbor/profile');
  			$this->load->view('admin/layout/file',$data);
  		// masuk database
  		}else{
  			$i = $this->input;
  			if(strlen($i->post('password')) > 6  ){
  				$data = array( 	'id_user'			=> 	$id_user,
  												'nama'				=> 	$i->post('nama'),
  												'email'				=>	$i->post('email'),
                          'password'		=>	sha1($i->post('password')), //enkripsi md5+
                          'keterangan'	=>	$i->post('keterangan'),
  												'akses_level'	=> $i->post('akses_level'));
  			}else {
  				$data = array( 	'id_user'			=> 	$id_user,
  												'nama'				=> 	$i->post('nama'),
  												'email'				=>	$i->post('email'),
                          'keterangan'  =>	$i->post('keterangan'),
  												'akses_level'	=>  $i->post('akses_level'));
  			}
  			$this->user_model->edit($data);
  			$this->session->set_flashdata('success','Profile updated successfully');
  			redirect(base_url('admin/dasbor/profile'));
  		}
  		// End masuk database
  	}
}
