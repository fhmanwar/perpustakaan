<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('User_model');
    }


    public function index(){
      $user = $this->user_model->listing();

      $data = array('title' => 'Data User('.count($user).')',
                  'user'	=> 	$user,
                  'isi'   => 'admin/user/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

    public function tambah(){
      $valid = $this->form_validation;
      $valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));
      $valid->set_rules('email','Email','required|valid_email',
  		 									array( 'required' 		=> '%s harus diisi',
  														 'valid_email'	=> '%s tidak valid'));

      $valid->set_rules('username','Username','required|is_unique[user.username]',
  											array( 'required' 	=> '%s harus diisi',
  														 'is_unique'	=> '%s: <strong>'.$this->input->post('username').
  						   							 '</strong> sudah digunakan. Buat username baru!'));

      $valid->set_rules('password','Password','required|max_length[32]|min_length[6]',
  											array( 'required' 		=> 'Password harus diisi',
  														 'min_length'		=> 'password min 6 character',
  													 	 'max_length'		=> 'password max 32 character'));

     if($valid->run()===FALSE) {
     // End validasi

     $data = array( 'title' => 'Create User/Administrator',
                    // 'home'  => $home,
                    'isi'  => 'admin/user/tambah');
     $this->load->view('admin/layout/file',$data,false);

     // masuk database
     }else{
 			$i = $this->input;
 			$data = array( 	'nama'				=> 	$i->post('nama'),
 											'email'				=>	$i->post('email'),
 											'username'		=>	$i->post('username'),
 											'password'		=>	sha1($i->post('password')), //enkripsi md5
 											'keterangan'		=>	$i->post('keterangan'),
 											'akses_level'	=>  $i->post('akses_level'));
 			$this->user_model->tambah($data);
 			$this->session->set_flashdata('success','User/Administrator created successfully');
 			redirect(base_url('admin/user'),'refresh');
 		}
  }
  // Edit User
	public function edit($id_user) {
		// $home = $this->home_model->listing();
		$user = $this->user_model->detail($id_user);

		// Validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama','required', array( 'required' => 'Nama harus diisi'));

	  $valid->set_rules('email','Email','required|valid_email',
 												array( 'required' 		=> 'email harus diisi',
	 												 		 'valid_email'	=> 'Email tidak valid'));

		if($valid->run()===FALSE) {
		// End validasi

			$data = array( 	'title' 	=> 'Edit User/Administrator'.$user->nama,
											'user'		=> $user,
											'isi' 		=> 'admin/user/edit');
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
			$this->session->set_flashdata('success','User/Administrator updated successfully');
			redirect(base_url('admin/user'));
		}
		// End masuk database
	}

  // Delete User
	public function delete($id_user) {
    //proteksi halaman
    if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

		$data = array('id_user'=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('Success','User/Administrator Deleted successfully');
		redirect (base_url('admin/user'),'refresh');
	}
}
