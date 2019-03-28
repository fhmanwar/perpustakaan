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
          <a href="<?php echo base_url('buku') ?>">Buku</a>
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
                <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>">
                  <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" alt="">
                </a>
                <?php }else{ echo 'Tidak ada';} ?>
              </div>
              <div class="caption">
                <h4><?php echo $buku->judul_buku ?></h4>

                <div class="matrlf-mid">
                  <ul class="rating">
                    <li>
                      <a href="#">
                        <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                      </a>
                    </li>
                  </ul>
                  <div class="clearfix"> </div>
                </div>
                <p><?php $buku->ringkasan ?></p>
                <form action="#" method="post">
                  <input type="hidden" name="cmd" value="_cart">
                  <input type="hidden" name="add" value="1">
                  <input type="hidden" name="chr_item" value="Book1">
                  <input type="hidden" name="amount" value="100.00">
                  <button type="submit" class="chr-cart pchr-cart">Add to cart
                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                  </button>
                  <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                </form>
              </div>
            </div>
          </div>
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
