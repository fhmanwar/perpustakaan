<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dasbor extends CI_Controller
{
  // Load database
  public function __construct(){
    parent::__construct();
		$this->load->model('user_model');
  }

    public function index()
    {
      $data = array(
				'title' => 'Dashboard',
				'isi'   => 'admin/dasbor/list',
			);
			$this->load->view('admin/layout/file', $data, false);
    }

    // Profil
    public function profile() {
  		// $home = $this->home_model->listing();
      // $id_user = $this->session->userdata('id_user');
			// $user = $this->user_model->detail($id_user);
			$user['user']	= $this->user_model->getUser(
				'user',
				['username' => $this->session->userdata('username') ]
			);

			$data = array( 	'title' 	=> 'User Profile',
											'user'		=> $user['user'],
											'isi' 		=> 'admin/dasbor/profile');
			$this->load->view('admin/layout/file',$data);
		}
		
		public function setting()
		{
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

  			// $data = array( 	'title' 	=> 'Update Profile'.$user->nama,
  			$data = array( 	'title' 	=> 'Update Profile'.$user['nama'],
  											'user'		=> $user,
  											'isi' 		=> 'admin/dasbor/setting');
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
  			$this->session->set_flashdata(
					'pesan',
					'<div class="alert alert-danger" role-"alert">
						Profile updated successfully
					</div>'
				);
  			redirect(base_url('admin/dasbor/profile'));
  		}
  		// End masuk database
		}
}
