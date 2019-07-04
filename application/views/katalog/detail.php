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
        <tr>
          <th class="col-lg-4">Harga Buku </th>
          <td class="col-sm-1">:</td>
          <td class="col-lg-8">Rp. <?php echo number_format($buku->harga,'0',',','.') ?></td>
        </tr>
      </table>
    </div>
    <div class="clearfix"> </div>

    <?php if(!$this->session->userdata('username')==''){ ?>
    <hr>
    <div class="col-md-12">
      <div class="occasion-cart col-md-6">
        <div class="chr single-item single_page_b">
          <a href="<?php echo base_url('katalog/addCart/'.$buku->id_buku) ?>" class="btn btn-lg btn-success">
            <i class="fa fa-cart-plus" aria-hidden="true"></i> Beli
          </a>
          </div>
        </div>
        
        <div class="occasion-cart col-md-6">
          <div class="chr single-item single_page_b">
            <!-- <form action="#" method="post"> -->
              <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#detail<?php echo $buku->id_buku ?>">
                <i class="fa fa-book" aria-hidden="true"></i> Pinjam
              </button>
              <div class="modal fade" id="detail<?php echo $buku->id_buku ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="exampleModalLongTitle" aria-hidden="true">Masukkan Tanggal</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <?php echo form_open(base_url('katalog/addPinjam/'.$buku->id_buku)); ?>
                            <input type="hidden" name="id_buku" value="<?php echo $buku->id_buku?>">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group ">
                                    <label>Tanggl Peminjaman</label>
                                    <input type="date" name="tanggal_pinjam" class="form-control" placeholder="YYYY-MM-DD" id="tanggal_pinjam" value="<?php if(isset($_POST['tanggal_pinjam'])){ echo set_value('tanggal_pinjam'); }else{ echo date('Y-m-d');} ?>" required>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label>Tanggl Harus Kembali</label>
                                    <input type="date" name="tanggal_kembali" class="form-control" placeholder="YYYY-MM-DD" id="tanggal_kembali" value="<?php echo set_value('tanggal_kembali') ?>" required>
                                  </div>
                                </div>
                              </div>

                            </div>
                            <!-- <input type="date" name="tanggal_kembali" value="<?php echo $buku->id_buku?>"> -->
                            <br>
                            <br>
                            <br>
                            <div class="col-md-12 text-center">
                            <button type="submit" name="Submit" class="btn btn-primary btn-md">
                              <i class="fa fa-save"></i>
                               Pinjam
                            </button>
                              </div>
                              <?php echo form_close(); ?>
                            </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                          </div>
                            
                      </div>
                  </div>
              </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    <?php }?>



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
