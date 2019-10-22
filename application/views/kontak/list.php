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
          <a href="<?php echo base_url('kontak') ?>"><?php echo $title ?></a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!--//breadcrumbs ends here-->

<!-- contact -->
<div class="section contact" id="contact">
    <div class="container">
        <h4 class="rad-txt text-center">
            <span class="abtxt1">contact</span>
            <span class="abtext">us</span>
        </h4>
        <div class="contact-form">
            <div class="col-md-7">
                <!-- contact form grid -->
                <div class="contact-top1">
                    <h5>send us a note</h5>
                    <form action="#" class="form_w3layouts" method="post">
                        <input type="text" placeholder="First Name" required="">
                        <input type="text" placeholder="Last Name" required="">

                        <input class="email" type="email" placeholder="Email" required="">
                        <textarea placeholder="Message" required=""></textarea>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                <!--  //contact form grid ends here -->
            </div>
            <!-- contact map grid -->
            <div class="col-md-5 map contact-right">
                <div class="contact-top1">
                    <h5>get directions</h5>
                    <?php echo $konfigurasi->map ?>
                </div>
            </div>
            <!--//contact map grid ends here-->
            <div class="clearfix"></div>
        </div>
        <!-- contact details -->
        <div class="contact-bottom">
            <h6>contact info</h6>
            <!-- contact details left -->
            <div class="col-md-6 col-sm-6">
                <div class="contact-left">
                    <div class="address">
                        <h5>Address:</h5>
                        <p>
                            <?php echo $konfigurasi->alamat ?>
                            <br> Burlington Canada.</p>
                    </div>
                    <div class="address address-mdl">
                        <h5>phone:</h5>
                        <p>
                            <?php echo $konfigurasi->phone ?></p>
                    </div>
                </div>
            </div>
            <!-- //contact details left -->
            <!-- contact details right -->
            <div class="col-md-6 col-sm-6">
                <div class="contact-right">
                    <div class="address">
                        <h5>Email:</h5>
                        <p>
                            <a href="mailto:info@example.com"><?php echo $konfigurasi->email ?></a>
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
