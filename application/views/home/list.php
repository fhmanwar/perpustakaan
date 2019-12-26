<!-- banner -->
<div class="banner-bg-agileits">
    <!-- banner-text -->
    <div class="banner-text">
        <div class="container">
            <!-- <p class="b-txt">the</p> -->
            <h2 class="title">
                <?php echo $site->namaweb?>
            </h2>
            <!-- <ul class="banner-txt">
                <li>share.</li>
                <li> explore. </li>
                <li>amplify.</li>
            </ul> -->
        </div>
    </div>
    <!-- //banner-text -->
</div>
<!-- //banner -->

<!-- about -->
<div class="about-sec section">
    <div class="container">
        <!-- about-left-grid -->
        <div class="col-md-7 about-left-grid">
            <div class="inner-about2">
                <h4>the splendid Central Library</h4>
                <p>Billed as the largest in the world,and the library's collection holds more than 3 million items.</p>
                <h5>the library catalogue</h5>
                <ul class="about-list">
                    <?php foreach ($jenis as $row) {?>
                    <li><i class="fa fa-play-circle-o" aria-hidden="true"></i><?php echo $row->nama_jenis?></li>
                    <!-- <li><i class="fa fa-play-circle-o" aria-hidden="true"></i>magazines</li>
                    <li><i class="fa fa-play-circle-o" aria-hidden="true"></i>ebooks</li>
                    <li><i class="fa fa-play-circle-o" aria-hidden="true"></i>Fiction</li>
                    <li><i class="fa fa-play-circle-o" aria-hidden="true"></i>scientific and Technical Information</li>
                    <li><i class="fa fa-play-circle-o" aria-hidden="true"></i>Comic Books</li>
                    <li><i class="fa fa-play-circle-o" aria-hidden="true"></i>Journals</li> -->
                    <?php }?>
                </ul>
                <a href="<?php echo base_url('katalog');?>">view more</a>
            </div>
            <!-- //about left bottom - services ends here -->
        </div>
        <!-- //about-left-grid ends here-->
        <!-- about-right-grid -->
        <div class="col-md-5 about-right-grid"></div>
        <!-- //about-right-grid ends here -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- //about ends here -->

<div class="container section">
    <!-- about left bottom - services -->
    <div class="principles-grids principles-grids1">
        <div class="abt-btm agileits w3layouts aos-init aos-animate">

        <?php foreach ($jenis as $row) {?>
            <div class="col-md-4 col-sm-4 agileits elite-services2 w3layouts bottom-gds" data-aos="fade-up">
                <div class="bott-img bott-img1 agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts"><?php echo $row->nama_jenis?></h4>
                    <div class="description agileits w3layouts">
                        <a href="<?php echo base_url('katalog/index/'.$row->id_jenis)?>">Read More</a>
                    </div>
                </div>
            </div>
        <?php }?>

            <!-- <div class="col-md-4 col-sm-4 agileits elite-services1 w3layouts bottom-gds" data-aos="fade-down">
                <div class="bott-img agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts"><?php echo $row->nama_jenis?></h4>
                    <div class="description agileits w3layouts">
                        <a href="<?php echo base_url('katalog/index/'.$row->id_jenis)?>">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4 agileits elite-services2 w3layouts bottom-gds" data-aos="fade-down">
                <div class="bott-img bott-img1 agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts">magazines</h4>
                    <div class="description agileits w3layouts">
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 agileits elite-services2 w3layouts bottom-gds" data-aos="fade-down">
                <div class="bott-img bott-img1 agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts">Fiction</h4>
                    <div class="description agileits w3layouts">
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <br>
            <div class="col-md-4 col-sm-4 agileits elite-services1 w3layouts bottom-gds" data-aos="fade-up">
                <div class="bott-img agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts">scientific and Technical Information</h4>
                    <div class="description agileits w3layouts">
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 agileits elite-services2 w3layouts bottom-gds" data-aos="fade-down">
                <div class="bott-img bott-img1 agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts">Comic Books</h4>
                    <div class="description agileits w3layouts">
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4 agileits elite-services2 w3layouts bottom-gds" data-aos="fade-down">
                <div class="bott-img bott-img1 agileits w3layouts">
                    <div class="icon-holder agileits w3layouts">
                        <span class="fa fa-book agileits w3layouts service-icon" aria-hidden="true"></span>
                    </div>
                    <h4 class="mission agileits w3layouts">Journals</h4>
                    <div class="description agileits w3layouts">
                        <a href="#">Read More</a>
                    </div>
                </div>
            </div> -->
            
            <div class="clearfix"></div>

        </div>
    </div>
    <!-- //about left bottom - services ends here -->
</div>
<br>
<div class="container">
    <div class="stats-aboutinfo">
        <div class="agileits_w3layouts-stats-grids text-center col-md-3">
            <div class="stats-icon">
                <span class="fa fa-book" aria-hidden="true"></span>
            </div>
            <div class="stats-right">
                <h6>volumes</h6>
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='221073' data-delay='.5' data-increment="300">221073</div>

            </div>
            <div class="clearfix"></div>

        </div>
        <div class="agileits_w3layouts-stats-grids text-center col-md-3">
            <div class="stats-icon">
                <span class="fa fa-university" aria-hidden="true"></span>
            </div>
            <div class="stats-right">
                <h6>branches</h6>
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='780' data-delay='.5' data-increment="50">980</div>

            </div>
            <div class="clearfix"></div>


        </div>
        <div class="agileits_w3layouts-stats-grids text-center col-md-3">
            <div class="stats-icon">
                <span class="fa fa-laptop" aria-hidden="true"></span>
            </div>
            <div class="stats-right">
                <h6>e-books</h6>
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='9800' data-delay='.5' data-increment="50">9800</div>

            </div>
            <div class="clearfix"></div>

        </div>
        <div class="agileits_w3layouts-stats-grids text-center col-md-3">
            <div class="stats-icon">
                <span class="fa fa-users" aria-hidden="true"></span>
            </div>
            <div class="stats-right">
                <h6>visitors</h6>
                <div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='123623' data-delay='.5' data-increment="300">123623</div>

            </div>
            <div class="clearfix"></div>

        </div>
        <div class="clearfix"></div>
    </div>
</div>


<div class="addon-sec section">
    <div class="container">
        <h4 class="rad-txt text-center">
            <span class="abtxt1">Berita</span>
            <span class="abtext">Terkini</span>
        </h4>
        <div class="clearfix"> </div>

        <?php foreach($news as $news) { ?>
        <!-- row1-->
        <div class="col-md-4 product-men">
            <div class="product-chr-info chr">
                <div class="thumbnail">
                    <a href="<?php echo base_url('berita/read/'.$news->slug_berita) ?>">
                        <img src="<?php echo base_url('assets/upload/berita/thumbs/'.$news->gambar)?>" alt="" style="width:300px; height:200px;">
                    </a>
                </div>
                <div class="caption">
                    <a href="<?php echo base_url('berita/read/'.$news->slug_berita) ?>">
                        <h4><?php echo $news->judul_berita ?></h4>
                    </a>
                    <p><?php echo character_limiter($news->isi,35)?></p>
                    <hr>
                    <div class="matrlf-mid">
                        <ul class="text-success">
                            <li><b><?php echo $news->jenis_berita ?></b></li>
                        </ul>
                        <ul>
                            <li><i class="fa fa-calendar-check-o"></i> <?php $d=strtotime($news->tanggal); echo date("j M Y",$d); ?></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //row1 -->
        <?php } ?>
    </div>
</div>

<!-- footer-layouts -->
<div class="addon-sec section">
    <div class="container">
        <h4 class="rad-txt">
            <span class="abtxt1">Our</span>
            <span class="abtext">Team</span>
        </h4>
        <div class="row text-center">
            <div class="col-md-5 col-sm-6 col-xs-6 fimg1">
                <div class="imgefct">
                <img src="<?php echo base_url() ?>assets/upload/profile/fahmi.png" class="img-responsive imgtst" alt="" >
                <div class="imgtxt">
                    <h5>Fahmi Anwar</h5>
                    <p>Project Manager & Developer</p>
                    <a href="#" class="hovicon effect-1 twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="hovicon effect-1 facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="hovicon effect-1 google"><i class="fa fa-google-plus"></i></a>
                </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-6 col-xs-6 fimg1">
                <div class="imgefct">
                <img src="<?php echo base_url() ?>assets/upload/profile/ira.png" class="img-responsive imgtst" alt="" >
                <div class="imgtxt">
                    <h5>Rizkia Herliani</h5>
                    <p>Desain Database</p>
                    <a href="#" class="hovicon effect-1 twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="hovicon effect-1 facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="hovicon effect-1 google"><i class="fa fa-google-plus"></i></a>
                </div>
                </div>
            </div>
        </div>
        
        <!-- <div class="clearfix"> </div> -->
    </div>
</div>
