<?php 
class Status extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model([
            'status_model'
        ]);
    }

    public function index()
    {
        $status = $this->status_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules('status', 'Status', 'trim|required|xss_clean');
        $valid->set_rules('kode_status', 'Kode Status', 'required|is_unique[status.kode_status]');

        $valid->set_message([
            'required' => '%s Harus diisi',
            'is_unique' => '%s: <strong>'.$this->input->post('kode_jenis').'</strong> sudah digunakan. Buat kode jenis buku baru!'
        ]);
        if($valid->run() == FALSE){
            $data = [
                'title' => 'Status User',
                'status' => $status,
                'isi' => 'admin/status/list'
            ];
            $this->load->view('layout/file',$data,False);
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

    public function edit()
    {
        $status = $this->status_model->detail();
        $valid = $this->form_validation;
        $valid->set_rules('status', 'Status', 'trim|required|xss_clean');
        $valid->set_rules('kode_status', 'Kode Status', 'required|is_unique[status.kode_status]');

        $valid->set_message([
            'required' => '%s Harus diisi',
            'is_unique' => '%s: <strong>'.$this->input->post('kode_jenis').'</strong> sudah digunakan. Buat kode jenis buku baru!'
        ]);

        if($valid->run() == FALSE){
            $data = [
                'title' => 'Edit User',
                'status' => $status,
                'isi' => 'admin/status/list'
            ];
            $this->load->view('layout/file',$data,False);
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
