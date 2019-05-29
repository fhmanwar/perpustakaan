<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
		parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('buku_model');
    $this->load->model('jenis_model');
    $this->load->model('bahasa_model');
    $this->load->model('file_model');
		$this->load->model('link_model');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');

	}

	public function index()
	{
		// $site = $this->home_model->listing();
		$buku	= $this->buku_model->buku();
		// $new	= $this->produk_model->new();
		$berita = $this->berita_model->berita();
    $slide = $this->berita_model->slide();
    $site = $this->konfigurasi_model->listing();
		$link = $this->link_model->listing();

    $data = array('title'  			=> $site->namaweb.' | '.$site->tagline,
									// 'produk'			=> $produk,,,,,
									'site'					=> $site,
                  'buku'  		  => $buku,
									'berita'  		=> $berita,
                  'slide'  			=> $slide,
									'link'  			=> $link,
                  'isi'    			=> 'home/list');

    $this->load->view('layout/file',$data,FALSE);
	}

	public function Login()
	{
		$site = $this->konfigurasi_model->listing();
		// Validasi
		$valid = $this->form_validation;
    $valid->set_rules('username','Username','required', array(	'required'	=> 'Username harus diisi'));
    $valid->set_rules('password','Password','required|min_length[6]',
                array(	'required'	=> 'Password harus diisi',
                        'min_length'		=> 'password min 6 character'
                ));

    if($valid->run()===FALSE) {

			$data = array('title' => 'Sign In',
										'isi' => 'home/loginRegis'
										);
      $this->load->view('layout/file',$data,False);
    }else {
      $username	= $this->input->post('username');
      $password	= $this->input->post('password');

      //compare dengan database
			$cek_login = $this->user_model->login($username,$password);
			// jika cocok maka create session
			 if(count($cek_login) == 1){
				 // $this->session->set_userdata('id',$cek_login->id);
				 $this->session->set_userdata('username',$username);
         $this->session->set_userdata('akses_level',$cek_login->akses_level);
         $this->session->set_userdata('id_user',$cek_login->id_user);
				 $this->session->set_userdata('nama',$cek_login->nama);
				 if ($this->session->userdata('akses_level')=='User') {
					redirect(base_url('home'),'refresh');
				}
				elseif ($this->session->userdata('akses_level')!='User' && $this->session->userdata('akses_level')!='Admin' ) {
					redirect(base_url('home/login'),'refresh');
				}
			 }else {
         $this->session->set_flashdata('Success','Username or Password is wrong');
         redirect(base_url('home/login'),'refresh');
       }
    }
    // End validasi
	}

  //register
  public function register(){
		$site = $this->home_model->listing();

		// Validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama','Nama','required', array( 'required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
		 									array( 'required' 		=> '%s harus diisi',
														 'valid_email'	=> '%s tidak valid'));

		$valid->set_rules('username','Username','required|is_unique[users.username]',
											array( 'required' 	=> '%s harus diisi',
														 'is_unique'	=> '%s: <strong>'.$this->input->post('username').
						   							 '</strong> sudah digunakan. Buat username baru!'));

		$valid->set_rules('password','Password','required|max_length[32]|min_length[8]',
											array( 'required' 		=> 'Password harus diisi',
														 'min_length'		=> 'password min 6 character',
													 	 'max_length'		=> 'password max 32 character'));



		if($valid->run() === FALSE) {
			$data = array('title'  => 'Register | '.$site['namaweb'],
										'judul'  => 'Register',
	                  'isi'    => 'home/register'
									);

	    $this->load->view('layout/file',$data);
		}else {
			$i = $this->input;
			$data = array( 	'nama'				=> 	$i->post('nama'),
											'email'				=>	$i->post('email'),
											'username'		=>	$i->post('username'),
											'password'		=>	md5($i->post('password')), //enkripsi md5
											'id_home'			=>  $i->post('id_home'),
											'akses_level'	=>  $i->post('akses_level'));
			$this->user_model->tambah($data);
			$this->session->set_flashdata('success','Created successfully');
			redirect(base_url('home/login'));
		}
		// End validasi
    $data = array('title'  => 'Register | '.$site['namaweb'],
									'judul'  => 'Register',
                  'isi'    => 'home/register'
								);

    $this->load->view('layout/file',$data);

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
    $this->simple_login->logout();
	}

}
