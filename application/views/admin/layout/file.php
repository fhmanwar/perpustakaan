<?php
//proteksi halaman
if($this->session->userdata('username') == "" && $this->session->userdata('id_level') != 1 ){
  $this->session->set_flashdata('Success','Silahkan login terlebih dahulu');
  redirect(base_url('login'),'refresh');
}

$data['user']	= $this->user_model->getUser(
  'user',
  ['username' => $this->session->userdata('username') ] 
);

require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');
