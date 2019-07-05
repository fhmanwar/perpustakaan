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
          <li class="hidden"><a class="page-scroll" href="#page-top"></a></li>

          <!-- <li><a href="<?php echo base_url()?>">Home</a></li> -->
          <li><a href="<?php echo base_url('katalog')?>">Katalog Buku</a></li>
          

          <!-- <li class="dropdown">
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
          </li> -->

          <li><a href="<?php echo base_url('usulan') ?>">Usulan</a></li>

          <li class="search-bar-agileits">
            <div class="cd-main-header">
              <div class="cd-header-buttons">
                <a class="cd-search-trigger" href="#cd-search">
                  <span></span>
                </a>
              </div>
            </div>
          </li>
          <?php if(!$this->session->userdata('username')==''){ ?>
          <li><a  href="<?php echo base_url('katalog/listPinjam')?>"><span class="fa fa-book nav-icon" style="font-size:20px" aria-hidden="true">[<?php echo count($limit)?>]</span></a></li>
          <li><a  href="<?php echo base_url('katalog/cart')?>"><span class="fa fa-cart-arrow-down nav-icon" style="font-size:20px" aria-hidden="true">[<?php echo count($order) ?>]</span></a></li>

          <li><a href="#"><span class="nav-icon" style="font-size:30px" aria-hidden="true"> | </span></a></li>

          <li class="dropdown">
              <a href="#" id="#dropdown-menu" title="SignIn & SignUp" class="dropdown-toggle effect-3">
                <i class="fa fa-user" style="font-size:20px;"></i>
                <?php echo $data['user']['nama']; ?>
                <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url('logout') ?>">Logout</a></li>
              </ul>
            </li>
          <?php }else{?>
            <li>
              <a href="<?php echo base_url('login') ?>" title="SignIn & SignUp" class="dropdown-toggle effect-3">
                <i class="fa fa-user" style="font-size:20px;"></i>
              </a>
            </li>
          <?php }?>
          
        </ul>
        
        <!-- search-bar -->
        <div class="search-bar-agileits">
          <div id="cd-search" class="cd-search">
            <form action="<?php echo base_url('katalog') ?>" method="post">
              <input name="cari" type="search" placeholder="Type and Hit Enter...">
            </form>
          </div>
        </div>
        <!-- //search-bar ends here -->

      </div>
      <!-- /.navbar-collapse -->
    <div class="clearfix"></div>
    </div>
    <!-- /.container -->
  </div>
</nav>
<!-- //navbar ends here -->
