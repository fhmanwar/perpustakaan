<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usulan extends CI_Controller {

  public function __construct(){
		parent::__construct();
    // $this->load->model('berita_model');
    // $this->load->model('jenis_model');
    $this->load->model('usulan_model');

	}

	public function index()
	{
		// $site = $this->home_model->listing();
		// $usulan	= $this->usulan_model->usulan();
		// $new	= $this->produk_model->new();
		// $berita = $this->berita_model->berita();
		// $slide = $this->berita_model->slide();

    $valid = $this->form_validation;

    $valid->set_rules('judul','Judul','required|min_length[10]',
                      array(	'required'	=> '%s harus diisi',
                      'min_length'        => '%s minimal 10 karakter'
                    ));
    $valid->set_rules('penerbit','Penerbit','required|min_length[5]',
                      array(	'required'	=> '%s harus diisi',
                      'min_length'        => '%s minimal 5 karakter'
                    ));
    $valid->set_rules('penulis','Penulis','required|min_length[5]',
                      array(	'required'	=> '%s harus diisi',
                      'min_length'        => '%s minimal 5 karakter'
                    ));
    $valid->set_rules('nama_pengusul','Nama Pengusul','required|min_length[5]',
                      array(	'required'	=> '%s harus diisi',
                      'min_length'        => '%s minimal 5 karakter'
                    ));
    $valid->set_rules('email_pengusul','Email Pengusul','required|valid_email',
                      array(	'required'	=> '%s harus diisi',
                      'valid_email'        => '%s tidak valid'
                    ));

    if($valid->run()===FALSE){
      $data = array('title'  			=> 'Usulan Buku Baru',//$site['namaweb'].' | '.$site['tagline']
                    // 'produk'			=> $produk,
                    // 'new'					=> $new,
                    // 'usulan'  		  => $usulan,
                    // 'berita'  		=> $berita,
                    // 'slide'  			=> $slide,
                    'isi'    			=> 'usulan/list');

      $this->load->view('layout/file',$data,FALSE);
    }else {
      $i = $this->input;
 			$data = array( 	'judul'				     => $i->post('judul'),
 											'penulis'				   =>	$i->post('penulis'),
 											'penerbit'		     =>	$i->post('penerbit'),
 											'keterangan'		   =>	$i->post('keterangan'),
 											'nama_pengusul'	   =>	$i->post('nama_pengusul'),
                      'email_pengusul'   => $i->post('email_pengusul'),
                      'ip_add'	         => $i->ip_address(),
                      'status_usulan'    => 'Baru',
 											'tanggal_usulan'	 => date('Y-m-d H:i:s')
                    );
 			$this->usulan_model->tambah($data);
 			$this->session->set_flashdata('success','Terima kasih usulan anda telah kami terima. kami akan segera melengkapi buku sesuai usulan anda.');
 			redirect(base_url('usulan'),'refresh');
    }
  }
}
