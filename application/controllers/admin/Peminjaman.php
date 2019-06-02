<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array( 
        'peminjaman_model',
        'buku_model',
        'anggota_model'
    ));
  }

  public function test()
  {
    $x = $this->peminjaman_model->list();
    $peminjaman = $this->peminjaman_model->listing();
    var_dump($x);
    $y = [
        $this->uri->segment(1),
        $this->uri->segment(2),
        $this->uri->segment(3),
        $this->uri->segment(4),
    ];
    echo '<br><br><br>';
    echo '<br><b>Use Print_r :</b><pre>'; print_r($y); echo '</pre>';
    echo '<br><b>Use var_dump :</b><pre>'; var_dump($y); echo '</pre>';
    echo '<pre>'; print_r($x); echo '</pre>';
    // echo '<pre>'; var_dump($x); echo '</pre>';
    
  }

  public function index()
  {
    $peminjaman = $this->peminjaman_model->list();

    $data = array('title' => 'Data Peminjaman Buku ('.count($peminjaman).')',
                  'peminjaman' => $peminjaman,
                  'isi' => 'admin/peminjaman/list'
            );
    $this->load->view('admin/layout/file', $data, false);
  }

  public function dataPeminjam(){
    $anggota = $this->anggota_model->getAnggota();
    $data = array(
        'title' => 'Anggota Peminjaman Buku',
        'anggota' => $anggota,
        'isi' => 'admin/peminjaman/list_anggota'
    );
    $this->load->view('admin/layout/file', $data, false);
  }

  public function add($id){
    $anggota = $this->anggota_model->detailAnggota($id);
    $peminjaman = $this->peminjaman_model->anggota($id);
    $buku = $this->buku_model->listing();
    $konfigurasi = $this->konfigurasi_model->listing();
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($id);

    $valid = $this->form_validation;
    $valid->set_rules('id_buku','Pilih judul buku', 'required',
                    array('required' => 'Pilih judul buku' ));

    if ($valid->run() === FALSE) {

      $data = array('title' => 'Peminjaman Buku atas nama: '.$anggota->nama,
                    'anggota' => $anggota,
                    'peminjaman' => $peminjaman,
                    'buku' => $buku,
                    'konfigurasi' => $konfigurasi,
                    'limit' => $limit,
                    'isi' => 'admin/peminjaman/add'
              );
      $this->load->view('admin/layout/file', $data, false);
    }else {
      $i = $this->input;
      $data = array('id_user' => $this->session->userdata('id_user'),
                    'id_buku ' => $i->post('id_buku'),
                    'id_anggota' => $id_anggota,
                    'tanggal_pinjam'  => $i->post('tanggal_pinjam'),
                    'tanggal_kembali'  => $i->post('tanggal_kembali'),
                    'keterangan'  => $i->post('keterangan'),
                    'status_kembali'  => $i->post('status_kembali')
              );
      $this->peminjaman_model->tambah($data);
      $this->session->set_flashdata('success','Data Peminjaman Telah ditambahkan');
      redirect(base_url('admin/peminjaman/add/'.$id_anggota),'refresh');
    }
  }

  public function edit($id_peminjaman){
    $peminjaman = $this->peminjaman_model->detail($id_peminjaman);
    $id_anggota = $peminjaman->id_anggota;
    $anggota = $this->anggota_model->detail($id_anggota);
    $buku = $this->buku_model->listing();
    $konfigurasi = $this->konfigurasi_model->listing();

    $valid = $this->form_validation;
    $valid->set_rules('id_buku','Pilih judul buku', 'required',
                    array('required' => 'Pilih judul buku' ));

    if ($valid->run() === FALSE) {

      $data = array('title' => 'Peminjaman Buku atas nama: '.$anggota->nama_anggota,
                    'anggota' => $anggota,
                    'peminjaman' => $peminjaman,
                    'buku' => $buku,
                    'konfigurasi' => $konfigurasi,
                    'isi' => 'admin/peminjaman/edit'
              );
      $this->load->view('admin/layout/file', $data, false);
    }else {
      $i = $this->input;
      $data = array('id_peminjaman' => $id_peminjaman,
                    'id_user' => $this->session->userdata('id_user'),
                    'id_buku ' => $i->post('id_buku'),
                    'id_anggota' => $id_anggota,
                    'tanggal_pinjam'  => $i->post('tanggal_pinjam'),
                    'tanggal_kembali'  => $i->post('tanggal_kembali'),
                    'keterangan'  => $i->post('keterangan'),
                    'status_kembali'  => $i->post('status_kembali')
              );
      $this->peminjaman_model->edit($data);
      $this->session->set_flashdata('success','Edited is Successfully');
      redirect(base_url('admin/peminjaman'),'refresh');
    }
  }


	public function kembali($id_peminjaman) {
    $peminjaman = $this->peminjaman_model->detail($id_peminjaman);
    $i = $this->input;
    $data = array('id_peminjaman' => $id_peminjaman,
                  'id_user' => $this->session->userdata('id_user'),
                  'status_kembali'  => 'Sudah'
            );
    $this->peminjaman_model->edit($data);
    $this->session->set_flashdata('success','Edited is Successfully');
    redirect(base_url('admin/peminjaman'),'refresh');
	}


	public function delete($id_peminjaman) {
    //proteksi halaman
    if($this->session->userdata('username') == "" && $this->session->userdata('akses_level') == "" ){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

		$data = array('id_peminjaman'=> $id_peminjaman);
		$this->peminjaman_model->delete($data);
		$this->session->set_flashdata('Success','Jenis Deleted successfully');
		redirect (base_url('admin/peminjaman'),'refresh');
	}

}
