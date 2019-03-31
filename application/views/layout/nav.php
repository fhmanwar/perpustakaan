<nav class="navbar navbar-default navbar-fixed-top">
  <div class="main-nav">
    <div class="container">

    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Chronicle</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <h1>
        <a class="navbar-brand" href="<?php echo base_url() ?> "><?php echo $konfigurasi->namaweb ?></a>
      </h1>
    </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-ex1-collapse nav-right">
        <ul class="nav navbar-nav navbar-left cl-effect-15">
          <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
          <li class="hidden">
          <a class="page-scroll" href="#page-top"></a>
          </li>
          <li>
          <a href="<?php echo base_url()?>">Home</a>
          </li>
          <li>
          <a href="<?php echo base_url('katalog')?>">Katalog Buku</a>
          </li>
          <!-- <li>
          <a href="<?php echo base_url('katalog')?>">Katalog Buku</a>
          </li> -->

          <li class="dropdown">
            <a href="#" class="dropdown-toggle effect-3" data-toggle="dropdown">shop
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="<?php echo base_url()?>assets/front/shop.html">product catalog</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>assets/front/single_product.html">single product</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>assets/front/checkout.html">checkout</a>
              </li>
              <li>
                <a href="<?php echo base_url()?>assets/front/payment.html">Payment</a>
              </li>
            </ul>
          </li>

          <li>
            <a href="<?php echo base_url('usulan') ?>">Usulan</a>
          </li>
          <li>
            <a href="<?php echo base_url('home/login') ?>" title="SignIn & SignUp">
            <span class="fa fa-user nav-icon" aria-hidden="true"></span>
            </a>
          </li>
        </ul>
        <!-- search-bar -->
        <div class="search-bar-agileits">
          <div class="cd-main-header">
          <ul class="cd-header-buttons">
            <li>
              <a class="cd-search-trigger" href="#cd-search">
                <span></span>
              </a>
            </li>
          </ul>
          <!-- cd-header-buttons -->
          </div>
          <div id="cd-search" class="cd-search">
            <form action="<?php echo base_url('katalog') ?>" method="post">
              <input name="cari" type="search" placeholder="Type and Hit Enter...">
            </form>
          </div>
        </div>
        <!-- //search-bar ends here -->
        <!-- shopping cart -->
        <div class="cart-mainf">
          <div class="chrcart chrcart2 cart cart box_1">
            <form action="#" method="post" class="last">
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="display" value="1">
              <button class="top_chr_cart" type="submit" name="submit" value="">
                <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
              </button>
            </form>
          </div>
        </div>
        <!-- //shopping cart ends here -->
      </div>
      <!-- /.navbar-collapse -->
    <div class="clearfix"></div>
    </div>
    <!-- /.container -->
  </div>
</nav>
<!-- //navbar ends here -->
