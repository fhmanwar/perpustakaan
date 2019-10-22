<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
		parent::__construct();
		$this->load->model('berita_model');
		$this->load->model('buku_model');
		$this->load->model('jenis_model');
		$this->load->model('bahasa_model');
		$this->load->model('file_model');
		$this->load->model('link_model');
		$this->load->model('user_model');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$buku	= $this->buku_model->buku();
		$berita = $this->berita_model->berita();
		$home = $this->berita_model->home();
		$slide = $this->berita_model->slide();
		$site = $this->konfigurasi_model->listing();
		$link = $this->link_model->listing();

		$data = array(
			'title'  			=> $site->namaweb.' | '.$site->tagline,
			// 'produk'			=> $produk,,,,,
			'site'					=> $site,
			'buku'  		  => $buku,
			'news'  		=> $home,
			'berita'  		=> $berita,
			'slide'  			=> $slide,
			'link'  			=> $link,
			'isi'    			=> 'home/list'
		);

		$this->load->view('layout/file',$data,FALSE);
	}
	
}
