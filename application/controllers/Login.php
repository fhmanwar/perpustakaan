<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct(){
		parent::__construct();
    $this->load->model('user_model');
    $this->load->model('link_model');
    $this->load->model('konfigurasi_model');
    $this->load->model('auth_model');
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

      // $data = array('title' => 'Login Administrator' );
      // $this->load->view('admin/login_view',$data,False);
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
    
		$valid = $this->form_validation;
		$valid->set_rules('username', 'Username', 'trim|required|xss_clean');
		$valid->set_rules('password', 'Password', 'trim|required|xss_clean');
		
		$valid->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');
		
		if ($valid->run() === FALSE) {
				$data = array('title' => 'Sign In',
												'isi' => 'home/loginRegis'
										);
				$this->load->view('layout/file',$data,False);
		} else {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        $cek = $this->auth_model->cekUser($user);
        // $where = array(
        //   'username' => $user,
        //   'password' => password_verify($pass, $data->password)
        //   );
        // $cek = $this->m_login->cek_login("user",$where)->num_rows();
				if($cek->num_rows() > 0)
				{
						$data = $cek->row_array();
						// $data = $cek->row();
						if(password_verify($pass, $data['password']))
						// if(password_verify($pass, $data->password))
						{
								/**
								 * STATUS
								 * 1 = AKTIF
								 * 2 = TIDAK AKTIF
								 * 3 = BANNED
								 */
								if($data['id_status'] == '1')
								// if($data->id_status == '1')
								{
										/**
										 * LEVEL
										 * 1 = ADMIN
										 * 2 = ANGGOTA
										 */
										if($data['id_level'] == '1')
										// if($data->id_level == '1')
										{
												$data = array(
														'username' => $data['username'],
														'email' => $data['email'],
														'level' => 'Admin',
                        );
                        
                        // $data = array(
                        //   'id_user' => $id_user, 
                        //   'id_level' => $id_level,
                        //   'username' => $user,
                        //   'nama' => $nama,
                        //   'level' => 'Admin'
                        // );
                        
												$this->session->set_userdata($data);
												redirect(base_url('admin/dasbor'),'refresh');
										}
										if($data['id_level'] === '2')
										// elseif($data->id_level == '2')
										{
												// $session = array(
												// 		'username' => $data['username'],
												// 		'email' => $data['email'],
												// 		'level' => 'Anggota',
                        // );
                        $session = array(
                          'id_user' => $data->id_user, 
                          'id_level' => $data->id_level,
                          'username' => $user,
                          'email' => $data->email,
                          // 'level' => 'Anggota'
                        );
												$this->session->set_userdata($session);
												redirect(base_url('home'),'refresh');
										}
								}
								elseif($data['id_status'] == '2')
								// elseif($data->id_status === '2')
								{
										$this->session->set_flashdata('Success', 'Maaf! Akun Anda Belum Aktif.');
										redirect(base_url('login'),'refresh');
								}
								elseif($data['id_status'] == '3')
								// elseif($data->id_status === '3')
								{
										$this->session->set_flashdata('Success', 'Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.');
										redirect(base_url('login'),'refresh');
								}
						}
						else
						{
								$this->session->set_flashdata('Success', 'Maaf! Password Anda Salah');
								redirect(base_url('login'),'refresh');
						}
				}
				else
				{
						$this->session->set_flashdata('Success', 'Maaf! Akun Tidak Ditemukan');
						redirect(base_url('login'));
				}
		}
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
