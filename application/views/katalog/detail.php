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


<!-- Single -->
<div class="innerf-pages section">
  <div class="container">
    <div class="col-md-4 single-right-left ">
      <div class="grid images_3_of_2">
        <div class="flexslider1">
          <ul class="slides">
            <li data-thumb="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku)?>">
              <div class="thumb-image"><img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" data-imagezoom="true" alt=" " class="img-responsive"> </div>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
      </div>

    </div>
    <div class="col-md-8 single-right-left simpleCart_shelfItem">

    <div class="clearfix"></div>
    <div class="desc_single">
      <h2 style="align: center;">Description</h2>
      <br>
      <table class="col-md-12">
        <tr>
          <th class="col-lg-4">judul </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->judul_buku ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Penulis Buku </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->penulis_buku ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Nama Jenis </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->nama_jenis ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Nama Bahasa </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->nama_bahasa ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Subject Buku </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->subjek_buku ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Penerbit Buku </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->penerbit ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Tahun Terbit </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->tahun_terbit ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Ringkasan Buku </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php echo $buku->ringkasan ?></td>
        </tr>
        <tr>
          <th class="col-lg-4">Tersedia </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8"><?php if($buku->jumlah_buku == 0){
            echo "Stok Kosong";
          }else {
            echo $buku->jumlah_buku.' buku'; } ?>
          </td>
        </tr>
      </table>
    </div>
    <div class="clearfix"> </div>
    <hr>
    <div class="col-md-12">

    <div class="occasion-cart col-md-6">
      <div class="chr single-item single_page_b">
        <form action="#" method="post">
          <input type="hidden" name="cmd" value="_cart">
          <input type="hidden" name="add" value="1">
          <input type="hidden" name="chr_item" value="Single book">
          <input type="hidden" name="amount" value="100.00">
          <button type="submit" class="chr-cart pchr-cart">
            <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
            <a href="#" data-toggle="modal" data-target="#myModal1"></a>
          </form>
        </div>
      </div>
      <div class="occasion-cart col-md-6">
        <div class="chr single-item single_page_b">
          <form action="#" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="add" value="1">
            <input type="hidden" name="chr_item" value="Single book">
            <input type="hidden" name="amount" value="100.00">
            <button type="submit" class="chr-cart pchr-cart">
              <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
              <a href="#" data-toggle="modal" data-target="#myModal1"></a>
            </form>
          </div>
        </div>
      </div>
    </div>
  <div class="clearfix"> </div>
  </div>
</div>

<!-- /new_arrivals -->
<div class="section singlep_btm" style="margin-bottom: 50px;">
  <div class="container">
    <div class="new_arrivals">
      <h4 class="rad-txt">
        <span class="abtxt1" style="background-color: #03a645; color:#fff;">Konten</span>
        <span class="abtext"> Digital</span>
      </h4>
      <?php if(count($file) < 1 ){ ?>
        <p class="alert alert-success text-center"><i class="glyphicon glyphicon-warning-sign"></i> File Not Found</p>
      <?php }else { ?>
      <!-- row3 -->
      <?php $i=1; foreach($file as $file) {?>
      <div class="col-md-3 product-men">
        <div class="product-chr-info chr">
          <div class="thumbnail">
            <a href="<?php echo base_url('katalog/read/'.$file->id_file) ?>">
              <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" alt="">
            </a>
          </div>
          <div class="caption">
            <h4><?php echo $file->nama_file ?></h4>
          </div>
        </div>
      </div>
      <?php $i++; } ?>

      <!-- //row3 -->
      <div class="clearfix"></div>
      <?php } ?>
    </div>
    <!--//new_arrivals-->
    <div class="clearfix"></div>

  </div>
</div>
<!--// Single -->
<div class="clearfix"></div>
<!-- /new_arrivals -->
<div class="singlep_btm">
  <div class="container">
    <div class="new_arrivals">
      <h4 class="rad-txt text-center">
        <span class="abtxt1">Buku</span>
        <span class="abtext"> Terbaru</span>
      </h4>
      <!-- row3 -->
      <?php $i=1; foreach ($bukus as $buku) {?>
      <div class="col-md-3 product-men">
        <div class="product-chr-info chr">
          <div class="thumbnail">
            <a href="<?php echo base_url('katalog/detail/'.$buku->id_buku) ?>">
              <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" alt="">
            </a>
          </div>
          <div class="caption">
            <h4><?php echo $buku->judul_buku ?></h4>
            <p><?php echo $buku->penulis_buku ?></p>

            <form action="<?php echo base_url('katalog/detail/'.$buku->id_buku) ?>" method="post">
              <button type="submit" class="chr-cart pchr-cart">Read More
                <a href="#" data-toggle="modal" data-target="#myModal1"></a>
                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
              </button>
            </form>
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
