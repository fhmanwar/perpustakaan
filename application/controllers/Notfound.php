<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notfound extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('konfigurasi_model');
    $this->load->model('link_model');
  }

  function index()
  {
    $konfigurasi = $this->konfigurasi_model->listing();
    $link = $this->link_model->listing();
    $data = array('title' => '404 Not Found',
                  'link' => $link,
                  'konfigurasi' => $konfigurasi,
                  'isi' => 'errors/notfound'
                );
    $this->load->view('layout/file', $data,FALSE);
  }

}
