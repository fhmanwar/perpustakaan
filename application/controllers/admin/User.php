<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct() {
      parent::__construct();
      // $this->load->model('home_model');
      $this->load->model('user_model');
      $this->load->model('level_model');
      $this->load->model('status_model');
    }


    public function index(){
			// $user = $this->user_model->listing();
			$user = $this->user_model->listing();

      $data = array('title' => 'Data User('.count($user).')',
									'user'	=> 	$user,
                  'isi'   => 'admin/user/list'
                  );
        $this->load->view('admin/layout/file', $data, false);
    }

		public function tambah(){
			$level      = $this->level_model->getLevel()->result();
			$status     = $this->status_model->getStatus()->result();
      $valid = $this->form_validation;
      $valid->set_rules('nama','Nama','trim|required|xss_clean');
      $valid->set_rules('nama','Nama','trim|required|xss_clean');
      $valid->set_rules('nama','Nama','trim|required|xss_clean');
      $valid->set_rules('email','Email','trim|required|xss_clean|valid_email|valid_emails|is_unique[user.email]');
      $valid->set_rules('username','Username','required|is_unique[user.username]');
      $valid->set_rules('password','Password','trim|required|xss_clean|max_length[32]|min_length[6]');
      // $valid->set_rules('konfirmasi','Konfirmasi Password','trim|required|xss_clean|matches[password]');

			$valid->set_message(array(
				'required' => 'Maaf! <b>%s</b> Tidak Boleh Kosong!',
				'is_unique' =>'Maaf! <b>%s</b> Telah Digunakan. Harap Menggunakan Akun lain.',
				'valid_email' => 'Maaf! <b>%s</b> Tidak Valid',
				'valid_emails' => 'Maaf! <b>%s</b> Tidak Valid',
				// 'matches' => 'Maaf! <b>%s</b> Tidak Sama.',
				'min_length' => 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.',
				'max_length' => 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.'
			));
			if($valid->run()===FALSE) {
				// End validasi

				$data = array(
					'title' => 'Create User/Administrator',
					'level'         => $level,
					'status'        => $status,
					// 'home'  => $home,
					'isi'  => 'admin/user/tambah'
				);
				$this->load->view('admin/layout/file',$data,false);

				// masuk database
			}else{
				$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str),4);

        $email = $this->input->post('email');
        $pass = $this->input->post('password');

        $ci = get_instance();
				$ci->load->library('email');
				$config['protocol'] = "smtp";
				$config['smtp_host'] = "ssl://smtp.gmail.com";
				$config['smtp_port'] = "465";
				$config['smtp_user'] = "testingemailmahasiswa@gmail.com";
				$config['smtp_pass'] = "akusayangkamu123";
				$config['charset'] = "utf-8";
				$config['mailtype'] = "html";
				$config['newline'] = "\r\n";
						
				$ci->email->initialize($config);

				$isi = '<table>';
				$isi .= '<tr><td><h4>Aktifkan Akun Perpustakaan!</h4></td></tr>';
				$isi .= '<tr><td><p>Halo <b>' . $email . '</b> terima kasih telah melakukan pendaftaran di Perpustakaan. Kami beritahukan kepada Anda untuk melakukan aktivasi akun agar bisa digunakan.</p></td></tr>';
				$isi .= '<tr><td><a href="'.base_url('home/login').'aktivasi/'.$random.'">AKTIVASI AKUN</a></td></tr>';
				$isi .= '<tr><td><p>Terima Kasih, Salam Hormat</p></td></tr>';
				$isi .= '</table>';
				
				$ci->email->from('noreply@perpus.com', 'noreply');
				$ci->email->to($email);
				$ci->email->subject('AKTIFASI AKUN E-LIBRARY');
				$ci->email->message($isi);
				$this->email->send();
				$i = $this->input;
				$data = array( 	
					'id_level'      => $i->post('id_level'),
					'id_status'     => $i->post('id_status'),
					'username'		=>	$i->post('username'),
					'password'		=>	password_hash($pass, PASSWORD_BCRYPT),
					'token'				=>	$random,
					'nama'				=> 	$i->post('nama'),
					'email'				=>	$i->post('email'),
					// 'akses_level'	=>  $i->post('akses_level'),
					'keterangan'		=>	$i->post('keterangan')
				);
				$this->user_model->tambah($data);
				$this->session->set_flashdata('success','User/Administrator created successfully');
				redirect(base_url('admin/user'),'refresh');
			}
			$data = array(
				'title' => 'Create User/Administrator',
				'level'         => $level,
				'status'        => $status,
				// 'home'  => $home,
				'isi'  => 'admin/user/tambah'
			);
			$this->load->view('admin/layout/file',$data,false);
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
