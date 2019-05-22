<?php
  $konfigurasi = $this->konfigurasi_model->listing();
  $link = $this->link_model->listing();
  require_once('head.php');
  require_once('nav.php');
  require_once('content.php');
  require_once('footer.php');
