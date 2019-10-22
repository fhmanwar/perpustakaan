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
    <!-- product left -->
    <div class="side-bar col-md-3">

      <!--preference -->
      <div class="left-side">
        <h3 class="shopf-sear-headits-sear-head">Categories</h3>
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Buku</a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
            <ul>
              <li>- <a href="<?php echo base_url('katalog')?>" class="span">All</a></li>
            <?php foreach ($jenis as $row) {?>
              <li>- <a href="<?php echo base_url('katalog/index/'.$row->id_jenis)?>" class="span"><?php echo $row->nama_jenis?></a></li>
            <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <!-- // preference -->

      <div class="search-hotel">
        <h3 class="shopf-sear-headits-sear-head">
          <span>author</span> in focus</h3>
        <form action="<?php echo base_url('katalog') ?>" method="post">
          <input type="search" placeholder="search here" name="cari" required="">
          <input type="submit" value="Search">
        </form>
      </div>

    </div>
    <!-- //product left -->

    <!-- product right -->
    <div class="left-ads-display col-md-9">
      <!-- <div class="wrapper_top_shop"> -->
        <!-- product-sec1 -->
        <!-- <div class="product-sec1"> -->
          <?php
            $i;
            foreach ($loop as $get) {
          ?>
          <!-- row1-->
          <div class="col-md-3 product-men">
            <div class="product-chr-info chr">
              <div class="thumbnail">
              <?php if ($get->cover_buku != "") { ?>
                <a href="<?php echo base_url('katalog/detail/'.$get->id_buku) ?>">
                  <img src="<?php echo base_url('assets/upload/buku/'.$get->cover_buku) ?>" alt="" style="width:200px; height:250px;">
                </a>
              <?php } else {
                  echo 'Tidak ada';
              } ?>
              </div>
              <div class="caption">
                <h4><?php echo $get->judul_buku ?></h4>
                <p><?php echo $get->penulis_buku ?></p>
                <div class="matrlf-mid">
                  <ul class="rating">
                    <li>
                      <a href="#">
                        <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span class="fa fa-star yellow-star" aria-hidden="true"></span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span class="fa fa-star gray-star" aria-hidden="true"></span>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <span class="fa fa-star gray-star" aria-hidden="true"></span>
                      </a>
                    </li>
                  </ul>
                  <ul class="text-success">
                    <li><b>$ 100.00</b></li>
                  </ul>

                  <div class="clearfix"> </div>
                </div>
                <form action="<?php echo base_url('katalog/detail/'.$get->id_buku) ?>" method="post">
                  <!-- <input type="hidden" name="cmd" value="_cart">
                  <input type="hidden" name="add" value="1">
                  <input type="hidden" name="chr_item" value="Book1">
                  <input type="hidden" name="amount" value="100.00"> -->
                  <button type="submit" class="chr-cart pchr-cart">Read More
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <!-- <i class="fa fa-cart-plus" aria-hidden="true"></i> -->
                  </button>
                  <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                </form>
              </div>
            </div>
          </div>
          <!-- //row1 -->
          <?php } ?>
          <!-- <div class="clearfix"></div>

        </div> -->

        <!-- //product-sec1 -->
        <!-- <div class="clearfix"></div>
      </div> -->
    </div>
    <div class="clearfix"></div>

  </div>
</div>
<!--// Shop -->
