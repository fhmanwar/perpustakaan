<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array( 'peminjaman_model',
                              'buku_model',
                              'anggota_model'
                      ));
  }

  public function index()
  {
    $peminjaman = $this->peminjaman_model->listing();
    $data = array('title' => 'Data Peminjaman Buku ('.count($peminjaman).')',
                  'peminjaman' => $peminjaman,
                  'isi' => 'admin/peminjaman/list'
            );
    $this->load->view('admin/layout/file', $data, false);
  }

  public function tambah(){
    $anggota = $this->anggota_model->listing();
    $data = array('title' => 'Peminjaman Buku',
                  'anggota' => $anggota,
                  'isi' => 'admin/peminjaman/list_anggota'
            );
    $this->load->view('admin/layout/file', $data, false);
  }

  public function add($id_anggota){
    $anggota = $this->anggota_model->detail($id_anggota);
    $peminjaman = $this->peminjaman_model->anggota($id_anggota);
    $buku = $this->buku_model->listing();
    $konfigurasi = $this->konfigurasi_model->listing();

    $data = array('title' => 'Peminjaman Buku atas nama: '.$anggota->nama_anggota,
                  'anggota' => $anggota,
                  'peminjaman' => $peminjaman,
                  'buku' => $buku,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'admin/peminjaman/tambah'
            );
    $this->load->view('admin/layout/file', $data, false);
  }

}
