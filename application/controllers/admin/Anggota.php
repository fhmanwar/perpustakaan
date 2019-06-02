<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model([
            'anggota_model',
            'status_model'
        ]);
        
    }
    
    public function test()
    {
        $x = $this->anggota_model->getAnggota();
        var_dump($x);
    }

    public function index()
    {
        $anggota = $this->anggota_model->getAnggota();
        $data = [
            'title' => 'Data Anggota('.count($anggota).')',
            'anggota'	=> 	$anggota,
            'isi'     => 'admin/anggota/list'
        ];
        $this->load->view('admin/layout/file', $data, FALSE);   
    }

    public function create()
    {
        $status     = $this->status_model->getStatus()->result();
        $anggota = $this->anggota_model->getAnggota();
        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','trim|required|xss_clean');
        $valid->set_rules('email','Email','trim|required|xss_clean|valid_email|valid_emails|is_unique[user.email]');
        $valid->set_rules('username','Username','required|is_unique[user.username]');
        $valid->set_rules('password','Password','trim|required|xss_clean|max_length[32]|min_length[6]');

        $valid->set_message(array(
            'required' => 'Maaf! <b>%s</b> Tidak Boleh Kosong!',
            'is_unique' =>'Maaf! <b>%s</b> Telah Digunakan. Harap Menggunakan Akun lain.',
            'valid_email' => 'Maaf! <b>%s</b> Tidak Valid',
            'valid_emails' => 'Maaf! <b>%s</b> Tidak Valid',
            'min_length' => 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.',
            'max_length' => 'Maaf! <b>%s</b> Minimal <b>%s</b> Karakter.'
        ));

        if($valid->run() == false){
            $data = [
                'title' => 'Data Anggota('.count($anggota).')',
                'anggota'	=> 	$anggota,
                'status'	=> 	$status,
                'isi'     => 'admin/anggota/tambah'
            ];
            $this->load->view('admin/layout/file', $data, FALSE);   
        }else {
            $this->anggota_model->createAnggota();
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-success" role="alert">
                    Berhasil Melakukan Registrasi!
                </div>'
            );
            redirect(base_url('admin/anggota'));
        }
    }

    public function update($id)
    {
        $status     = $this->status_model->getStatus()->result();
        $anggota = $this->anggota_model->detailAnggota($id);
        $valid = $this->form_validation;
        $valid->set_rules('nama','Nama','trim|required|xss_clean');
        $valid->set_rules('email','Email','trim|required|xss_clean');

        $valid->set_message(array(
            'required' => 'Maaf! <b>%s</b> Tidak Boleh Kosong!'
        ));

        if($valid->run() == false){
            $data = [
                'title' => 'Edit Anggota'.$anggota->nama,
                'anggota'	=> 	$anggota,
                'status'	=> 	$status,
                'isi'     => 'admin/anggota/edit'
            ];
            $this->load->view('admin/layout/file', $data, FALSE);   
        }else {
            $this->anggota_model->updateAnggota($id);
            $this->session->set_flashdata(
                'pesan', 
                '<div class="alert alert-success" role="alert">
                    Berhasil Melakukan Update!
                </div>'
            );
            redirect(base_url('admin/anggota'));
        }
    }

    public function delete($id)
    {
        $this->anggota_model->deleteAnggota($id);
		$this->session->set_flashdata(
			'pesan',
			'<div class="alert alert-success" role="alert">
				Anggota Berhasil di Hapus
			</div>'
		);
		redirect (base_url('admin/anggota'),'refresh');
    }

}

/* End of file Anggota.php */
