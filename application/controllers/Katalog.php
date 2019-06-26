<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katalog extends CI_Controller {

  public function __construct(){
		parent::__construct();
    $this->load->model('berita_model');
    $this->load->model('buku_model');
    $this->load->model('jenis_model');
    $this->load->model('bahasa_model');
    $this->load->model('file_model');
		$this->load->model('link_model');
    $this->load->model('peminjaman_model');
  }
  
  public function test()
  {
    $x = $this->session->userdata('id_user');
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($x);
    var_dump($limit);
  }

	public function index()
	{
		// $site = $this->home_model->listing();
		$buku	= $this->buku_model->buku();
		// $new	= $this->produk_model->new();
		// $berita = $this->berita_model->berita();
		// $slide = $this->berita_model->slide();

    $valid = $this->form_validation;
    $valid->set_rules('cari','Keywords','required',
                array('required' => 'Keywords harus diisi' ));

    if($valid->run()){
      $cari = strip_tags($this->input->post('cari'));
      $keywords = str_replace(' ','-',$cari);
      redirect(base_url('katalog/cari/'.$keywords),'refresh');
    }

    $data = array('title'  			=> 'Katalog Buku',//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'isi'    			=> 'katalog/list');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function cari($keywords)
	{
		// $site = $this->home_model->listing();
    $keywords = str_replace(' ','-',strip_tags($keywords));
    $buku	= $this->buku_model->cari($keywords);
		// $new	= $this->produk_model->new();
		// $berita = $this->berita_model->berita();
		// $slide = $this->berita_model->slide();


    $data = array('title'  			=> 'Hasil Pencarian "'.$keywords.'" ('.count($buku).')',//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'keywords'  	=> $keywords,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'isi'    			=> 'katalog/cari');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function detail($id_buku)
	{
    // $keywords = str_replace(' ','-',strip_tags($keywords));
    $bukus	= $this->buku_model->buku_baru();
    $buku	= $this->buku_model->detaill($id_buku);
    $file	= $this->file_model->buku($id_buku);
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($id_buku);

    $data = array('title'  			=> $buku->judul_buku,//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'bukus'  		  => $bukus,
                  'file'  		  => $file,
                  'limit'       =>  $limit,
                  'judul'       => 'Detail Buku',
                  'isi'    			=> 'katalog/detail');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function read($id_file)
	{
    // $keywords = str_replace(' ','-',strip_tags($keywords));
    $bukus	= $this->buku_model->buku_baru();
    $file	= $this->file_model->detail($id_file);
    $id_buku = $file->id_buku;
    $buku	= $this->buku_model->detaill($id_buku);

    $data = array('title'  			=> $buku->judul_buku.' - '.$file->judul_file,
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'bukus'  		  => $bukus,
                  'file'  		  => $file,
                  // 'keywords'  	=> $keywords,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'judul'       => 'Detail Buku',
                  'isi'    			=> 'katalog/read');

    $this->load->view('layout/file',$data,FALSE);
  }
  
  public function addPinjam($id)
  {
    //proteksi halaman
    if($this->session->userdata('username') == ""){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }

    $i = $this->input;
    $data = [
      'id_user' => $this->session->userdata('id_user'),
      'id_buku' => $i->post('id_buku'),
      'tanggal_pinjam'  => $i->post('tanggal_pinjam'),
      'tanggal_kembali'  => $i->post('tanggal_kembali'),
      'keterangan'  => $i->post('keterangan'),
      'status_kembali'  => 'Belum'
    ];
    $this->peminjaman_model->tambah($data);
    $this->session->set_flashdata(
        'pesan',
        '<div class="alert alert-success" role="alert">
            Data Peminjaman Telah ditambahkan
        </div>'
    );
    redirect(base_url('katalog/detail/'.$id),'refresh');

  }

  public function listPinjam()
  {
    //proteksi halaman
    if($this->session->userdata('username') == ""){
      $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
      redirect(base_url('login'),'refresh');
    }
    $id = $this->session->userdata('id_user');
    $peminjaman = $this->peminjaman_model->anggota($id);
    $limit = $this->peminjaman_model->limit_peminjaman_anggota($id);
    // $anggota = $this->anggota_model->detailAnggota($id);
    $buku = $this->buku_model->listing();
    $konfigurasi = $this->konfigurasi_model->listing();
    $data = [
      'title'  			=> 'Peminjaman Buku',
      'peminjaman' => $peminjaman,
      'limit' => $limit,
      'konfigurasi' => $konfigurasi,
      'buku' => $buku,
      'isi' => 'katalog/pinjam'
    ];
    $this->load->view('layout/file', $data, FALSE);
  }

  public function bayar()
  {
    $data = [
      'title'  			=> 'Bayar Buku',
      'isi' => 'katalog/pembayaran'
    ];
    $this->load->view('layout/file', $data, FALSE);
  }

  public function delete($id_peminjaman) {
		$data = array('id_peminjaman'=> $id_peminjaman);
		$this->peminjaman_model->delete($data);
		$this->session->set_flashdata(
            'pesan',
            '<div class="alert alert-success" role="alert">
                Peminjaman Deleted successfully
            </div>'
        );
		redirect (base_url('katalog'),'refresh');
	}

}
