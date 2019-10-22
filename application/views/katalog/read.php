<!-- banner -->
<div class="banner-bg-inner">
  <!-- banner-text -->
  <div class="banner-text-inner">
    <div class="container">
      <h2 class="title-inner">
        <?php echo $judul ?>
      </h2>

    </div>
  </div>
  <!-- //banner-text -->
</div>
<!-- //banner -->
<!-- breadcrumbs -->
<div class="crumbs text-center">
  <div class="container">
    <div class="row">
      <ul class="btn-group btn-breadcrumb bc-list">
        <li class="btn btn1">
          <a href="<?php echo base_url() ?>">
            <i class="glyphicon glyphicon-home"></i>
          </a>
        </li>
        <li class="btn btn2">
          <a href="<?php echo base_url('katalog') ?>">Katalog</a>
        </li>
        <li class="btn btn3">
          <a href="<?php echo base_url('katalog/detail/'.$buku->id_buku) ?>"><?php echo $buku->judul_buku ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->

<div class="innerf-pages text-center" style="margin-top:50px;">
  <h2><?php echo $title ?> </h2> 
  <br>
  <iframe src="<?php echo base_url('./assets/upload/files/'.$file->nama_file) ?>" width="60%" height="1100" allowfullscreen webkitallowfullscreen></iframe>
</div>
