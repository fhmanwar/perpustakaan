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
            $cek = $this->auth_model->cekLogin('user',['username' => $user]);
            // var_dump($cek);
            if($cek){
                if(password_verify($pass,$cek['password'])){
                    /**
                        STATUS
                        1 = AKTIF
                        2 = TIDAK AKTIF
                        3 = BANNED
                     */
                    // echo "masukk status";
                    if ($cek['id_status'] == 1) {
                        /**
                            LEVEL
                            1 = ADMIN
                            2 = ANGGOTA
                        */
                        if ($cek['id_level'] == 1) {
                            $data = [
                                'id_user' => $cek['id_user'],
                                'username' => $cek['username'],
                                'email' => $cek['email'],
                                'level' => 'Admin'
                            ];
                            $this->session->set_userdata( $data );
                            redirect(base_url('admin/dasbor'));
                        }
                        elseif ($cek['id_level'] == 2) {
                            $data = [
                                'id_user' => $cek['id_user'],
                                'username' => $cek['username'],
                                'email' => $cek['email'],
                                'level' => 'Admin'
                            ];
                            $this->session->set_userdata( $data );
                            redirect(base_url('home'));
                        }
                    }elseif ($cek['id_status'] == 2) {
                        $this->session->set_flashdata(
                            'pesan', 
                            '<div class="alert alert-danger" role-"alert">
                                Maaf! Akun Anda Belum Aktif.
                            </div>'
                        );
                        redirect(base_url('login'));
                    }elseif ($cek['id_status'] == 3) {
                        $this->session->set_flashdata(
                            'pesan', 
                            '<div class="alert alert-danger" role-"alert">
                                Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
                            </div>'
                        );
                        redirect(base_url('login'));
                    }
                }else {
                    $this->session->set_flashdata(
                        'pesan', 
                        '<div class="alert alert-danger" role-"alert">
                            Maaf! Password Anda Salah.
                        </div>'
                    );
                    redirect(base_url('login'));
                }
            }else {
                $this->session->set_flashdata(
                    'pesan', 
                    '<div class="alert alert-danger" role-"alert">
                        Belum Melakukan Registrasi! Silahkan Registrasi terlebih dahulu. 
                    </div>'
                );
                redirect(base_url('login'));
            }
        }
    }

    public function register()
    {
        // $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        // $random = str_repeat(str_shuffle($str),4);
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
            $token = base64_encode(random_bytes(190));
            $email = $this->input->post('email',true);
            $data = [
                'id_level' => 2,
                'id_status' => 2,
                'username' => htmlspecialchars($this->input->post('username',true)),
                'password' => password_hash($this->input->post('password'),PASSWORD_ARGON2ID),
                'token' => $token,
                'nama' => htmlspecialchars($this->input->post('nama',true)),
                'email' => htmlspecialchars($email),
                'avatar' => 'default.jpg',
                'verify' => time()
            ];

            // var_dump($data);
            $this->_sendMail($token,'verify');

            $this->auth_model->register($data);
            // // $this->session->set_userdata('emailregister', $this->input->post('email'));
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role-"alert">Berhasil Melakukan Registrasi! Silahkan Cek Email. </div>');
            redirect(base_url('login'));
        }
    }

    private function _sendMail($token,$type)
    {
        $email = $this->input->post('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com', // ssl://smtp.googlemail.com
            'smtp_user' => '#@gmail.com',
            'smtp_pass' => '#',
            'smtp_port'=> '465',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline'=> "\r\n"
        ];
        $this->email->initialize($config);
        $this->load->library('email', $config);

        
        $this->email->from('no-reply@eLibrary.com', 'noreply');
        $this->email->to($email);
        if($type == 'verify'){
            $this->email->subject('Account Verification');
            $isi = '<table>';
            $isi .= '<tr><td><h4>Aktifkan Akun Perpustakaan!</h4></td></tr>';
            $isi .= '<tr><td><p>Halo <b>' . $email . '</b> terima kasih telah melakukan pendaftaran di Perpustakaan. Kami beritahukan kepada Anda untuk <b>Segera</b> melakukan aktivasi akun agar bisa digunakan.</p></td></tr>';
            $isi .= '<tr><td><a href="'.base_url().'auth/verify?email='.$email.'&token='.urlencode($token).'">AKTIVASI AKUN</a></td></tr>';
            $isi .= '<tr><td><p>Terima Kasih, Salam Hormat</p></td></tr>';
            $isi .= '</table>';
            $this->email->message($isi);
        }elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $isi = 'Click this link to reset your password : ';
            $isi .= '<a href="'.base_url().'auth/reset?email='.$email.'&token='.urlencode($token).'">';
            $isi .= 'Reset Password';
            $isi .= '</a>';
            $this->email->message($isi);
        }
        
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
        
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user',['email' => $email])->row_array();
        
        if ($user) {
            $user_token = $this->db->get_where('user',['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user['verify'] <(60*60*24)) {
                    $this->db->set('id_status',1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    
                    $this->session->set_flashdata(
                        'pesan', 
                        '<div class="alert alert-success" role-"alert">
                        '.$email.' Sudah teraktivasi
                        </div>'
                    );
                    redirect(base_url('login'),'refresh');
                }
                else {
                    $this->db->delete('user', ['email'=> $email]);
                    $this->session->set_flashdata(
                        'pesan', 
                        '<div class="alert alert-warning" role-"alert">
                        Activation failed! token expired.
                        </div>'
                    );
                    redirect(base_url('login'),'refresh');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan', 
                    '<div class="alert alert-danger" role-"alert">
                    Activation failed! Wrong token.
                    </div>'
                );
                redirect(base_url('login'),'refresh');
            }
            
        } else {
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-danger" role-"alert">
                Activation failed! Wrong email.
                </div>'
            );
            redirect(base_url('login'),'refresh');
        }
        
        
    }

    public function logout()
    {
        
        $this->session->unset_userdata([
            'username',
            'email',
            'id_level',
            'id_status'
        ]);
        $this->session->set_flashdata(
            'pesan', 
            '<div class="alert alert-success" role-"alert">
            Berhasil Logout 
            </div>'
        );
        redirect(base_url('login'),'refresh');
        $this->session->sess_destroy();
    }

    public function forgot()
    {
        $valid = $this->form_validation;
        
        $valid->set_rules('email', 'Email Address', 'trim|required|xss_clean|valid_email');

        // PESAN VALIDASI
        $valid->set_message([
            'required' => 'Maaf! <b>%s</b> Tidak Boleh Kosong!',
            'valid_email' => 'Maaf! <b>%s</b> Tidak Valid',
        ]);

        if($valid->run() == FALSE)
        {
            $data = [
                'title' => 'Forgot Password',
                'isi' => 'home/forgot'
            ];
            $this->load->view('layout/file', $data, FALSE);
        }else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user',[
                'email' => $email,
                'id_status' => 1
            ])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(190));

                $data = [
                    'email' => $email,
                    'token' => $token,
                    'verify' => time()
                ];
                $this->auth_model->forgot($data);
                $this->_sendMail($token,'forgot');
                $this->session->set_flashdata(
                    'pesan', 
                    '<div class="alert alert-success" role-"alert">
                        Please check your email to reset Password!
                    </div>'
                );
                redirect(base_url('forgot'),'refresh');
                
            } else {
                $this->session->set_flashdata(
                    'pesan', 
                    '<div class="alert alert-success" role-"alert">
                        E-mail tidak terdaftar atau belum aktif
                    </div>'
                );
                redirect(base_url('forgot'),'refresh');
            }
            
        }
        
    }

    public function reset()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        
        $user = $this->db->get_where('user',['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user',['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email',$email);
                $this->changePass();
            } else {
                $this->session->set_flashdata(
                    'pesan', 
                    '<div class="alert alert-danger" role-"alert">
                    Reset Password failed! Wrong token.
                    </div>'
                );
                redirect(base_url('login'),'refresh');
            }
            
        } else {
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-danger" role-"alert">
                Reset Password failed! Wrong email.
                </div>'
            );
            redirect(base_url('login'),'refresh');
        }
        
        
    }

    public function changePass()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect(base_url('login'),'refresh');
        }
        $valid = $this->form_validation;
        $valid->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]|matches[password1]');
        $valid->set_rules('password1', 'Konfirmasi Password', 'trim|required|xss_clean|matches[password]');

        // PESAN VALIDASI
        $valid->set_message([
            'required' => 'Maaf! <b>%s</b> Tidak Boleh Kosong!',
            'matches' => 'Maaf! <b>%s</b> Tidak Sama.',
            'min_length' => 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.'
        ]);

        if ($valid->run() == FALSE) {
            $data = [
                'title' => 'Change Password',
                'isi' => 'home/changePass'
            ];
            $this->load->view('layout/file', $data, FALSE);
        }else {
            $password = password_hash($this->input->post('password'),PASSWORD_ARGON2ID);
            $email = $this->session->userdata('reset_email');

            $this->auth_model->reset($password,$email);

            $this->session->unset_userdata('reset_email');
            
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-success" role-"alert">
                Password has been changed! Please Login
                </div>'
            );
            redirect(base_url('login'),'refresh');
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
        echo "<br><br>";

        $token = base64_encode(random_bytes(190));
        var_dump($token);
        echo "<br><br>";
        
        $str = "9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A9NzJyMW5iFn2ldUHgqushjcRBEPkwb3tT7-oLfZ4QmIYSOCKDxXp6avV8G10er_A";
        $str1 = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_'; 
        $random = str_repeat(str_shuffle($str1),4);
        echo strlen($random);
        echo "<br><br>";

        echo urlencode($str1);
    }

}

/* End of file Auth.php */
