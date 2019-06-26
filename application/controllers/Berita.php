<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('file_model');
		$this->load->model('link_model');
	}

	public function index()
	{
		// $site = $this->berita_model->listing();
		// $buku	= $this->buku_model->buku();
		// $new	= $this->produk_model->new();
		$berita = $this->berita_model->berita();
		$slide = $this->berita_model->slide();

    $data = array('title'  			=> 'Berita Terbaru',//$site['namaweb'].' | '.$site['tagline']
									// 'produk'			=> $produk,
									// 'new'					=> $new,
                  // 'buku'  		  => $buku,
									'berita'  		=> $berita,
									// 'slide'  			=> $slide,
                  'isi'    			=> 'berita/list');

    $this->load->view('layout/file',$data,FALSE);
	}

  public function read($slug_berita)
	{
		$berita_lain = $this->berita_model->berita_lain();
    $berita = $this->berita_model->read($slug_berita);

    $data = array('title'  => $berita->judul_berita,//.' | '.$site['namaweb']
									'berita' => $berita,
                  'berita_lain'  => $berita_lain,
									'judul'  => 'Detail News',
                  'isi'    => 'berita/read'
								);

    $this->load->view('layout/file',$data,FALSE);
	}
}
