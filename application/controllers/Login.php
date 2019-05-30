<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

  public function index(){

    // // Validasi
		// $valid = $this->form_validation;
    // $valid->set_rules('username','Username','required', array(	'required'	=> 'Username harus diisi'));
    // $valid->set_rules('password','Password','required|min_length[6]',
    //             array(	'required'	=> 'Password harus diisi',
    //                     'min_length'		=> 'password min 6 character'
    //             ));

    // if($valid->run()===FALSE) {

      $data = array('title' => 'Login Administrator' );
      $this->load->view('admin/login_view',$data,False);
    // }else {
    //   $username	= $this->input->post('username');
    //   $password	= $this->input->post('password');

    //   //compare dengan database
		// 	$cek_login = $this->user_model->login($username,$password);
		// 	// jika cocok maka create session
		// 	 if(count($cek_login) == 1){
		// 		 // $this->session->set_userdata('id',$cek_login->id);
		// 		 $this->session->set_userdata('username',$username);
    //      $this->session->set_userdata('akses_level',$cek_login->akses_level);
    //      $this->session->set_userdata('id_user',$cek_login->id_user);
		// 		 $this->session->set_userdata('nama',$cek_login->nama);
    //      redirect(base_url('admin/dasbor'),'refresh');
		// 	 }else {
    //      $this->session->set_flashdata('Success','Username or Password is wrong');
    //      redirect(base_url('login'),'refresh');
    //    }
    // }
    // // End validasi
  }

  // Logout
	public function logout() {
    // $this->session->set_userdata('id',$cek_login->id);
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('akses_level');
    $this->session->unset_userdata('id_user');
    $this->session->unset_userdata('nama');
    $this->session->set_flashdata('Success','Logout successfully');
    redirect(base_url('login'),'refresh');
	}

}
