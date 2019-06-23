<?php
$konfigurasi = $this->konfigurasi_model->listing();

  
  $data['user']	= $this->user_model->getUser(
    'user',
    ['username' => $this->session->userdata('username') ]
  );

require_once('head.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');