<!-- banner -->
<div class="banner-bg-inner">
  <!-- banner-text -->
  <div class="banner-text-inner">
    <div class="container">
      <h2 class="title-inner">
        world of reading
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
          <a href="shop.html">Berita</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->

<!-- Shop -->
<div class="innerf-pages section">
  <div class="container-cart">
    <div class="col-md-12">

        <!-- product-sec1 -->
        <div class="product-sec1">
          <!-- row1-->
          <?php $i=1; foreach ($berita as $berita) {?>
          <div class="col-md-3 product-men">
            <div class="product-chr-info chr">
              <div class="thumbnail">
                <a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>">
                  <img src="<?php echo base_url('assets/upload/berita/'.$berita->gambar) ?>" alt="">
                </a>
              </div>
              <div class="caption">
                <h4><a href="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" data-blast="color"><?php echo $berita->judul_berita ?> </a></h4>

                <div class="matrlf-mid">
                  <ul class="">
                    <li><a href="#"><span class="fa fa-calendar-check-o" aria-hidden="true"></span> <?php echo $berita->tanggal ?></a></li>
                  </ul>
                  <div class="clearfix"> </div>
                  <p><?php echo $berita->isi ?></p>
                </div>
                <form action="<?php echo base_url('berita/read/'.$berita->slug_berita) ?>" method="post">
                  <button type="submit" class="chr-cart pchr-cart">Read More
                    <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                  </button>
                </form>
              </div>
            </div>
          </div>
          <!-- //row1 -->
          <?php } ?>
          <div class="clearfix"></div>

        </div>

        <!-- //product-sec1 -->
        <div class="clearfix"></div>

    </div>
    <div class="clearfix"></div>

  </div>
</div>
