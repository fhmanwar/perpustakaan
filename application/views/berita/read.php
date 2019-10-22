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
          <a href="<?php echo base_url('berita') ?>">Berita</a>
        </li>
        <li class="btn btn3">
          <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>"><?php echo $berita->judul_berita ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->
<!-- Single -->
<div class="innerf-pages section">
  <div class="container">
    <div class="col-md-4 single-right-left ">
      <div class="grid images_3_of_2">
        <div class="flexslider1">
          <ul class="slides">
            <li data-thumb="<?php echo base_url('assets/upload/berita/'.$berita->gambar)?>">
              <div class="thumb-image"><img src="<?php echo base_url('assets/upload/berita/'.$berita->gambar) ?>" data-imagezoom="true" alt=" " class="img-responsive"> </div>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>

    </div>
    <div class="col-md-8 single-right-left simpleCart_shelfItem">

      <div class="clearfix"></div>
      <div class="desc_single">
        <h5>Description</h5>
        <p><?php echo $berita->isi ?></p>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
</div>
<!-- /new_arrivals -->
<div class="singlep_btm">
  <div class="container">
    <div class="new_arrivals">
      <h4 class="rad-txt text-center">
        <span class="abtxt1">Berita</span>
        <span class="abtext"> Terbaru</span>
      </h4>
      <!-- row3 -->
      <?php $i=1; foreach ($berita_lain as $berita) {?>
      <div class="col-md-4 product-men">
        <div class="product-chr-info chr">
          <div class="thumbnail">
            <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>">
              <img src="<?php echo base_url('assets/upload/berita/'.$berita->gambar) ?>" alt="" style="width:300px; height:200px;">
            </a>
          </div>
          <div class="caption">
            <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>">
                <h4><?php echo $berita->judul_berita ?></h4>
            </a>
            <p><?php echo character_limiter($berita->isi,35)?></p>
            <hr>
            <div class="matrlf-mid">
                <ul class="text-success">
                    <li><b><?php echo $berita->jenis_berita ?></b></li>
                </ul>
                <ul>
                    <li><i class="fa fa-calendar-check-o"></i> <?php $d=strtotime($berita->tanggal); echo date("j M Y",$d); ?></li>
                </ul>
                <div class="clearfix"> </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <!-- //row3 -->
      <div class="clearfix"></div>
    </div>
    <!--//new_arrivals-->
    <div class="clearfix"></div>

  </div>
</div>
<!--// Single -->
