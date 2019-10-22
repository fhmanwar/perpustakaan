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


<section class="about" id="about">
      <div class="container py-lg-5 py-md-5 py-sm-4 py-3">
        <!--Horizontal Tab-->
        <div id="horizontalTab">
          <div class="container">
            <div class="tab4">
              <h4 class="mb-3 text-center" data-blast="color"><?php echo $buku->judul_buku ?></h4>
              <div class="row mt-lg-4 mt-3">
                <div class="col-md-5 about-txt-img">
                  <img src="<?php echo base_url('assets/upload/buku/'.$buku->cover_buku) ?>" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-7 latest-list">
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
                      <th class="col-lg-4">Kolasi </th>
                      <td class="col-sm-1">:</td>
                      <td class="col-lg-8"><?php echo $buku->kolasi ?></td>
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
                  <!-- <div class="about-jewel-agile-left">
                    <p><?php echo $buku->ringkasan ?></p>
                  </div> -->
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!--//about-->
