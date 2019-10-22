<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Level extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model([
            'level_model'
        ]);
        //proteksi halaman
        if($this->session->userdata('username') == "" && $this->session->userdata('level') != 'Admin'){
            $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
            redirect(base_url('login'),'refresh');
        }
    }

    public function index()
    {
        $level = $this->level_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('level', 'Level', 'trim|required|xss_clean');
        $valid->set_rules('kode_level', 'Kode Level', 'required|is_unique[level.kode_level]');

        $valid->set_message([
            'required' => '%s Harus diisi',
            'is_unique' => '%s: <strong>'.$this->input->post('kode_level').'</strong> sudah digunakan. Buat kode jenis buku baru!'
        ]);
        if($valid->run() == FALSE){
            $data = [
                'title' => 'Level User',
                'level' => $level,
                'isi' => 'admin/level/list'
            ];
            $this->load->view('admin/layout/file',$data,False);
        }else {
            $this->level_model->create();
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-danger" role-"alert">
                    Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
                </div>'
            );
            redirect(base_url('admin/level'),'refresh');
        }
    }

    public function edit($id)
    {
        $level = $this->level_model->listing();
        $valid = $this->form_validation;
        $valid->set_rules('level', 'Level', 'trim|required|xss_clean');

        $valid->set_message([
            'required' => '%s Harus diisi'
        ]);

        if($valid->run() == FALSE){
            $data = [
                'title' => 'Edit User',
                'level' => $level,
                'isi' => 'admin/level/list'
            ];
            $this->load->view('admin/layout/file',$data,False);
        }else {
            $this->level_model->update($id);
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-danger" role-"alert">
                    Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
                </div>'
            );
            redirect(base_url('admin/level'),'refresh');
        }
    }

    public function delete($id)
    {
        $this->level_model->delete($id);
        $this->session->set_flashdata(
            'pesan', 
            '<div class="alert alert-danger" role-"alert">
                Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
            </div>'
        );
        redirect(base_url('admin/level'),'refresh');
    }
}
