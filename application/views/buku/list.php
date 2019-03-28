<div class="slider">
    <div class="callbacks_container">
      <ul class="rslides" >
        <li>
          <div style="background-image: url(<?php echo base_url()?>assets/front/images/b2.jpg);">
            <div class="container">
              <div class="slider-info text-left">
                <div class="text-center" style="padding-bottom:100px; margin-top:-100px; margin-bottom: 1px;">
                  <h5 style=" color: white;" >Buku</h5>
                  <h4>
                    <a href="<?php echo base_url() ?>">Home</a>
                    <a href="<?php echo base_url('katalog') ?>">Katalog</a>
                  </h4>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
    <div class="clearfix"></div>

    <!--Keyword-->
    <section class="py-md-5 py-sm-4 py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 subscrib-w3layouts text-center">
            <h2 data-blast="color">Pencarian Buku</h2>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="newsletter">
              <form action="<?php echo base_url('katalog') ?>" method="post" class="d-flex">
                <input type="text" name="cari" class="form-control" placeholder="Keyword" required >
                <!-- <input type="submit" name="submit" class="btn btn-danger" value="Search" > -->
                <button class="btn1" >
                <span class="fa fa-search" data-blast="bgcolor"></span>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//about-->

    <!--Book-->
    <section class="team py-lg-4 py-md-3 py-sm-3 py-3" id="team">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <h3 class="title text-center mb-lg-5 mb-md-4 mb-sm-4 mb-3"><?php echo $title ?></h3>
        <div class="row">
          <?php $i; foreach ($buku as $buku) {?>
          <div class="col-lg-3 col-md-6 col-sm-6 profile">
            <div class="team-shadow">
              <div class="img-box">
                <?php if($buku->cover_buku != ""){ ?>
                <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" alt="<?php echo $buku->judul_buku ?>">
                <?php }else{ echo 'Tidak ada';} ?>
                <!-- <div class="list-social-icons">
                  <ul>
                    <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                    <li><a href="#"><span class="fas fa-envelope"></span></a></li>
                    <li><a href="#"><span class="fas fa-rss"></span></a></li>
                    <li><a href="#"><span class="fab fa-vk"></span></a></li>
                  </ul>
                </div> -->
              </div>
              <div class="team-w3layouts-info py-lg-4 py-3 text-center" data-blast="bgColor">
                <h4 class="text-white mb-2"> <a href="<?php echo base_url('katalog/read/'.$buku->id_buku) ?>"><?php echo $buku->judul_buku ?></a> </h4>
                <span class="wls-client-title text-black"><?php echo $buku->penulis_buku ?></span>
              </div>
            </div>
          </div>
          <!-- <div class="clearfix"></div> -->
        <?php } ?>
        </div>
      </div>
    </section>
    <!--//Buku-->
