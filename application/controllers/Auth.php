<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
    }
    

    // public function index($err = NULL){
    //     $data = array(
    //         'title' => 'SIGN IN', 
    //         'error' => $err,
    //         'action' => site_url('auth/login'),
    //         'isi' => 'home/loginRegis'
    //     );
    //     $this->load->view('layout/file', $data, FALSE);
    // }

    public function login(){
        $user = $this->input->post('username');
        $pass = $this->input->post('password');
        
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
            $cek = $this->auth_model->cekUser($user);
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
                        if($data['id_level'] === '1')
                        // if($data->id_level == '1')
                        {
                            $data = array(
                                'username' => $data['username'],
                                'email' => $data['email'],
                                'level' => 'Admin',
                            );
                            
                            $this->session->set_userdata($data);
                            redirect(base_url('admin/dasbor'),'refresh');
                        }
                        if($data['id_level'] === '2')
                        // elseif($data->id_level === '2')
                        {
                            $session = array(
                                'username' => $data['username'],
                                'email' => $data['email'],
                                'level' => 'Anggota',
                            );
                            $this->session->set_userdata($session);
                            redirect(base_url('home/login'),'refresh');
                        }
                    }
                    elseif($data['id_status'] == '2')
                    // elseif($data->id_status == '2')
                    {
                        $this->session->set_flashdata('Success', 'Maaf! Akun Anda Belum Aktif.');
                        redirect(base_url('home/login'),'refresh');
                    }
                    elseif($data['id_status'] == '3')
                    // elseif($data->id_status == '3')
                    {
                        $this->session->set_flashdata('Success', 'Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.');
                        redirect(base_url('home/login'),'refresh');
                    }
                }
                else
                {
                    $this->session->set_flashdata('Success', 'Maaf! Password Anda Salah');
                    redirect(base_url('home/login'),'refresh');
                }
            }
            else
            {
                $this->session->set_flashdata('Success', 'Maaf! Akun Tidak Ditemukan');
                redirect(base_url('home/login'));
            }
        }
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

    private function passBcrypt($pass)
    {
        return password_hash($pass,PASSWORD_BCRYPT);
    }

}

/* End of file Auth.php */
