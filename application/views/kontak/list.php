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
          <a href="<?php echo base_url('usulan') ?>"><?php echo $title ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->

<!-- contact -->
<div class="section contact" id="contact" style="margin-top: 50px;">
    <div class="container">
        <h4 class="rad-txt text-center">
            <span class="abtxt1">usulan</span>
            <span class="abtext">Buku</span>
        </h4>
        <?php
        if($this->session->flashdata('success')){
          echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
          echo $this->session->flashdata('success');
          echo '</div>';
        }else {
          echo validation_errors('<div class="alert alert-warning">','</div>');

          echo form_open(base_url('usulan'));
        ?>
        <div class="contact-form">
            <div class="col-md-12">
              <!-- contact form grid -->
              <div class="contact-top1 form_w3layouts">
                <h5 class="text-center"><?php echo $title ?></h5>
                <input type="text" name="judul" placeholder="Judul Buku" value="<?php echo set_value('judul') ?>" required>
                <input type="text" name="penulis" placeholder="Nama Penulis" value="<?php echo set_value('penulis') ?>" required>
                <input type="text" name="penerbit" placeholder="Nama Penerbit" value="<?php echo set_value('penerbit') ?>" required>
                <input type="text" name="nama_pengusul" placeholder="Nama Pengusul" value="<?php echo set_value('nama_pengusul') ?>" required>
                <input class="email" type="email" name="email_pengusul" placeholder="Email Pengusul" value="<?php echo set_value('email_pengusul') ?>" required>
                <textarea name="judul" placeholder="Keterangan"><?php echo set_value('keterangan') ?></textarea>
                <div class="text-center">
                  <input type="submit" name="Submit" value="Submit">
                </div>
              </div>
              <!--  //contact form grid ends here -->
            </div>
            <div class="clearfix"></div>
        </div>
        <?php
          echo form_close();
        }
        ?>
        <!-- contact details -->
        <div class="contact-bottom">
            <h6>contact info</h6>
            <!-- contact details left -->
            <div class="col-md-6 col-sm-6">
                <div class="contact-left">
                    <div class="address">
                        <h5>Address:</h5>
                        <p>
                            1185 Maria St
                            <br> Burlington Canada.</p>
                    </div>
                    <div class="address address-mdl">
                        <h5>phone:</h5>
                        <p>
                            +1 234 5678</p>
                        <p>
                            +11 222 333</p>
                    </div>
                </div>A
            </div>
            <!-- //contact details left -->
            <!-- contact details right -->
            <div class="col-md-6 col-sm-6">
                <div class="contact-right">
                    <div class="address">
                        <h5>Email:</h5>
                        <p>
                            <a href="mailto:info@example.com">mail@library.com</a>
                        </p>
                        <p>
                            <a href="mailto:info@example.com">mail@chronicle.com</a>
                        </p>
                    </div>
                    <div class="footer-social address  address-mdl">
                        <h5>let's get social</h5>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="fa fa-facebook icon_facebook"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-twitter icon_twitter"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-dribbble icon_dribbble"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="fa fa-google-plus icon_g_plus"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- //contact-details right -->
            <div class="clearfix"></div>
        </div>
        <!-- //contact details ends here -->
    </div>
</div>
<!-- //contact -->
