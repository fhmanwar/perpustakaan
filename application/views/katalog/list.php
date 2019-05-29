<!-- banner -->
<div class="banner-bg-inner">
  <!-- banner-text -->
  <div class="banner-text-inner">
    <div class="container">
      <h2 class="title-inner">
        <?php echo $title?>
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
          <a href="<?php echo base_url('katalog') ?>"> Katalog Buku</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->

<!-- Shop -->
<div class="innerf-pages section">
  <div class="container-cart">
    <!-- product right -->
    <div class="col-md-12">
        <!-- product-sec1 -->
        <div class="product-sec1">
          <?php $i; foreach ($buku as $buku) {?>
          <!-- row1-->
          <div class="col-md-3 product-men">
            <div class="product-chr-info chr">
              <div class="thumbnail">
                <?php if($buku->cover_buku != ""){ ?>
                <a href="<?php echo base_url('katalog/detail/'.$buku->id_buku) ?>">
                  <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" alt="">
                </a>
                <?php }else{ echo 'Tidak ada';} ?>
              </div>
              <div class="caption">
                <h4><?php echo $buku->judul_buku ?></h4>

                <div class="matrlf-mid">
                  <ul class="rating">
                    <li>
                      <span class="" aria-hidden="true"></span><?php echo $buku->penulis_buku ?><a href="#"></a></li>
                  </ul>
                  <div class="clearfix"> </div>
                </div>

                <form action="<?php echo base_url('katalog/detail/'.$buku->id_buku) ?>" method="post">
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
<!--// Shop -->
