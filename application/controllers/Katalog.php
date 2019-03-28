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
    $buku	= $this->buku_model->detaill($id_buku);
    $file_buku	= $this->buku_model->buku($id_buku);

    $data = array('title'  			=> $buku->judul_buku,//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  'buku'  		  => $buku,
                  'file_buku'  		  => $file_buku,
                  // 'keywords'  	=> $keywords,
									// 'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'judul'       => 'Detail Buku',
                  'isi'    			=> 'katalog/detail');

    $this->load->view('layout/file',$data,FALSE);
	}
}
