<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Status extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model([
            'status_model'
        ]);
        //proteksi halaman
        if($this->session->userdata('username') == "" && $this->session->userdata('status') != 'Admin'){
            $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
            redirect(base_url('login'),'refresh');
        }
    }

    public function index()
    {
        $status = $this->status_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('status', 'Status', 'trim|required|xss_clean');
        $valid->set_rules('kode_status', 'Kode Status', 'required|is_unique[status.kode_status]');

        $valid->set_message([
            'required' => '%s Harus diisi',
            'is_unique' => '%s: <strong>'.$this->input->post('kode_status').'</strong> sudah digunakan. Buat kode jenis buku baru!'
        ]);
        if($valid->run() == FALSE){
            $data = [
                'title' => 'Status User',
                'status' => $status,
                'isi' => 'admin/status/list'
            ];
            $this->load->view('admin/layout/file',$data,False);
        }else {
            $this->status_model->create();
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-danger" role-"alert">
                    Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
                </div>'
            );
            redirect(base_url('admin/status'),'refresh');
        }
    }

    public function edit($id)
    {
        $status = $this->status_model->listing();
        $valid = $this->form_validation;
        $valid->set_rules('status', 'Status', 'trim|required|xss_clean');

        $valid->set_message([
            'required' => '%s Harus diisi'
        ]);

        if($valid->run() == FALSE){
            $data = [
                'title' => 'Edit User',
                'status' => $status,
                'isi' => 'admin/status/list'
            ];
            $this->load->view('admin/layout/file',$data,False);
        }else {
            $this->status_model->update($id);
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-danger" role-"alert">
                    Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
                </div>'
            );
            redirect(base_url('admin/status'),'refresh');
        }
    }

    public function delete($id)
    {
        $this->status_model->delete($id);
        $this->session->set_flashdata(
            'pesan', 
            '<div class="alert alert-danger" role-"alert">
                Maaf! Akun Anda Dinonaktifkan, Silahkan Hubungi Customer Service.
            </div>'
        );
        redirect(base_url('admin/status'),'refresh');
    }
}
