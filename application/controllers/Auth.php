<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function index(){
        $valid = $this->form_validation;
        $valid->set_rules('username', 'Username', 'trim|required');
        $valid->set_rules('password', 'Password', 'trim|required');

        $valid->set_message('required', 'Maaf! <b>%s</b> Tidak Boleh Kosong!');

        if ($valid->run() == FALSE) {
            $data = array('title' => 'Sign In',
                            'isi' => 'home/login'
                        );
            $this->load->view('layout/file',$data,False);
        } else {
            $user = $this->input->post('username');
            $pass = $this->input->post('password');
            // $cek = $this->auth_model->cekUser($user);
            $cek = $this->auth_model->cek_login('user',['username' => $user]);
            if($cek){

            }else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role-"alert">Belum Melakukan Registrasi! Silahkan Registrasi terlebih dahulu. </div>');
                redirect(base_url('login'));
            }
            // if($cek->num_rows() > 0)
            // {
            //     // $data = $cek->row_array();
            //     $data = $cek->row();
            //     // if(password_verify($pass, $data['password']))
            //     if(password_verify($pass, $data->password))
            //     {
            //         /**
            //          * STATUS
            //          * 1 = AKTIF
            //          * 2 = TIDAK AKTIF
            //          * 3 = BANNED
            //          */
            //         // if($data['id_status'] == '1')
            //         if($data->id_status == '1')
            //         {
            //             /**
            //              * LEVEL
            //              * 1 = ADMIN
            //              * 2 = ANGGOTA
            //              */
            //             echo 'id status = 1';
            //             // if($data['id_level'] == '1')
            //             if($data->id_level == '1')
            //             {
            //                 echo 'id level = 1';
            //                 $data = array(
            //                     'username' => $data['username'],
            //                     'email' => $data['email'],
            //                     'level' => 'Admin',
            //                 );

            //                 $this->session->set_userdata($data);
            //                 // redirect(base_url('admin/dasbor'),'refresh');
            //             }
            //             // if($data['id_level'] === '2')
            //             elseif($data->id_level == '2')
            //             {
            //                 $session = array(
            //                     'username' => $data['username'],
            //                     'email' => $data['email'],
            //                     'level' => 'Anggota',
            //                 );
            //                 $this->session->set_userdata($session);
            //                 redirect(base_url('home'),'refresh');
            //             }
            //         }
            //         // elseif($data['id_status'] == '2')
            //         elseif($data->id_status == '2')
            //         {
            //             $this->session->set_flashdata('Success', 'Maaf! Akun Anda Belum Aktif.');
            //             redirect(base_url('login'),'refresh');
            //         }
            //         // elseif($data['id_status'] == '3')
            //         elseif($data->id_status == '3')
            //         {
            //             $this->session->set_flashdata('Success', 'Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.');
            //             redirect(base_url('login'),'refresh');
            //         }
            //     }
            //     else
            //     {
            //         $this->session->set_flashdata('Success', 'Maaf! Password Anda Salah');
            //         redirect(base_url('login'),'refresh');
            //     }
            // }
            // else
            // {
            //     $this->session->set_flashdata('Success', 'Maaf! Akun Tidak Ditemukan');
            //     redirect(base_url('login'));
            // }
        }
    }

    public function register()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str),4);
        // $num = "10".rand(1,9).date('dmY').time();

        // VALIDASI
        $valid = $this->form_validation;
        
        $valid->set_rules('nama', 'Nama', 'required|xss_clean');
        $valid->set_rules('username', 'Username', 'trim|required|xss_clean|is_unique[user.username]');
        $valid->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email|is_unique[user.email]');
        $valid->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');
        $valid->set_rules('password1', 'Konfirmasi Password', 'trim|required|xss_clean|matches[password]');

        // PESAN VALIDASI
        $valid->set_message([
            'required' => 'Maaf! <b>%s</b> Tidak Boleh Kosong!',
            'is_unique' => 'Maaf! <b>%s</b> Telah Digunakan. Harap Menggunakan Akun lain.',
            'valid_email' => 'Maaf! <b>%s</b> Tidak Valid',
            'matches' => 'Maaf! <b>%s</b> Tidak Sama.',
            'min_length' => 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.'
        ]);

        if($valid->run() == FALSE)
        {
            $data = array('title'  => 'Sign Up ',
                        'isi'    => 'home/register'
                    );
            $this->load->view('layout/file',$data);
        }
        else
        {
            $data = [
                'id_level' => 1,
                'id_status' => 1,
                'username' => htmlspecialchars($this->input->post('username',true)),
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'token' => $random,
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'email' => htmlspecialchars($this->input->post('email',true)),
                'avatar' => 'default.jpg',
                
            ];
            $this->auth_model->register($data);
            // $this->Auth_model->daftarAkun();
            // $this->session->set_userdata('emailregister', $this->input->post('email'));
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role-"alert">Berhasil Melakukan Registrasi! Silahkan Cek Email. </div>');
            redirect(base_url('login'));
        }
        // $data = array('title' => 'Sign Up ',
        //                 'isi' => 'home/register'
        //             );
        // $this->load->view('layout/file',$data,False);
    }

    public function test()
    {
        // echo $this->security->get_csrf_token_name()."<br>";
        // echo $this->security->get_csrf_hash();
        echo "<br><br>";
        echo password_hash('12345678', PASSWORD_BCRYPT);
        echo "<br><br>";
        echo password_hash('12345678', PASSWORD_ARGON2I);
    }

}

/* End of file Auth.php */
