<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anggota_model', 'anggota');
    }

    public function create()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data   = ([
                'id_user'		 	=>	$this->input->post('id_user'),
                'status_anggota'	=>  $this->input->post('status_anggota'),
                'nama_anggota'	    => 	$this->input->post('nama_anggota'),
                'email'		 		=>	$this->input->post('email'),
                'tlp'		 		=>	$this->input->post('tlp'),
                'instansi'	        =>	$this->input->post('instansi'),
                'username'     	    =>	$this->input->post('username'),
                'password'	   	    =>	password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ]);
            if($this->anggota->tambah($data))
            {
                echo "Berhasil Menambahkan Data";
            }
            else
            {
                echo "Gagal Menambahkan Data";
            }
        }
        else
        {
            echo "Akses Ditolak";
        }
    }

    public function read()
    {
        $anggota        = $this->anggota->listing();
        $response       = ([
            'result'    => $anggota,
        ]);
        echo json_encode($response);
    }

    public function update()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data   = ([
                'status_anggota'	=>  $this->input->post('status_anggota'),
                'nama_anggota'	    => 	$this->input->post('nama_anggota'),
                'email'		 		=>	$this->input->post('email'),
                'tlp'		 		=>	$this->input->post('tlp'),
                'instansi'	        =>	$this->input->post('instansi'),
                'username'     	    =>	$this->input->post('username'),
                'password'	   	    =>	password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            ]);
            if($this->anggota->update($data))
            {
                echo "Berhasil Mengubah Data";
            }
            else
            {
                echo "Gagal Mengubah Data";
            }
        }
        else
        {
            echo "Akses Ditolak";
        }
    }

    public function delete()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if($this->anggota->hapus())
            {
                echo "Berhasil Menghapus Data";
            }
            else
            {
                echo "Gagal Menghapus Data";
            }
        }
        else
        {
            echo "Akses Ditolak";
        }
    }
}
