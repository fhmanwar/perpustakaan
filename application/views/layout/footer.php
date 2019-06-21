<!--/footer-bottom-->
<div class="footerv3-w3ls">
<!-- footerv3-top -->
<div class="footerv3-top">
  <div class="container">
    <div class="col-md-3 col-sm-6 footv3-left">
      <h3>About Us</h3>
      <h4>
          <a href="<?php echo base_url() ?>">chronicle</a>
      </h4>
      <p><?php echo $konfigurasi->deskripsi ?></p>
      <!-- <br><h3>Link Perpustakaan</h3>
      <ul class="info">
        <?php foreach ($link as $link ) {?>
        <li><a href="<?php echo $link->url ?>" title="<?php echo $link->nama_link ?>" target="<?php echo $link->target ?>"><?php echo $link->nama_link ?></a></li>
      <?php } ?>
      </ul> -->
    </div>
    <div class="col-md-3 col-sm-6 footv3-left">
      <h3><?php echo $konfigurasi->namaweb ?></h3>
      <p><?php echo $konfigurasi->tagline ?></p>

      <div class="fv3-contact">
          <span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
          <p> <?php echo $konfigurasi->alamat ?></p>
      </div>
      <div class="fv3-contact">
        <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
        <p><?php echo $konfigurasi->phone ?></p>
        <div class="fv3-contact"></div>
        <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
        <p>
            <a href="mailto:example@email.com"><?php echo $konfigurasi->email ?></a>
        </p>
      </div>
      <div class="clearfix"></div>

    </div>
    <div class="col-md-3 col-sm-6 footv3-left">
      <h3>Latest releases</h3>
      <ul class="info">
        <li><a href="<?php echo base_url()?>shop.html">e-books</a></li>
      </ul>
    </div>
    <div class="col-md-3 col-sm-6 footv3-left">
      <h3>Subscribe</h3>
      <p>Lorem Ipsum is simply dummy text of the printing and Lorem Ipsum has </p>
      <form action="#" method="post">
          <input type="text" value="Your Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Email';}">
          <input type="submit" value="Subscribe">
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- /footerv3-top -->
</div>

<div class="cpy-right">
    <p>© 2018 <?php echo $konfigurasi->namaweb ?> | Design by
        <a href="http://w3layouts.com"> W3layouts.</a>
    </p>
</div>
<!-- </div> -->
<!-- //home -->
<!-- js -->
<script src="<?php echo base_url()?>assets/front/js/jquery-2.2.3.min.js"></script>
<!-- //js -->
<!--search jQuery-->
<script src="<?php echo base_url()?>assets/front/js/main.js"></script>
<!--search jQuery-->
<!-- cart-js -->
<script src="<?php echo base_url()?>assets/front/js/minicart.js"></script>
<script>
chr.render();

chr.cart.on('new_checkout', function (evt) {
    var items, len, i;

    if (this.subtotal() > 0) {
        items = this.items();

        for (i = 0, len = items.length; i < len; i++) {}
    }
});
</script>
<!-- //cart-js -->
<!-- Scrolling Nav JavaScript -->
<script src="<?php echo base_url()?>assets/front/js/scrolling-nav.js"></script>
<!-- //fixed-scroll-nav-js -->
<!-- dropdown nav -->
<script>
$(document).ready(function () {
$(".dropdown").hover(
function () {
  $('.dropdown-menu', this).stop(true, true).slideDown("fast");
  $(this).toggleClass('open');
},
function () {
  $('.dropdown-menu', this).stop(true, true).slideUp("fast");
  $(this).toggleClass('open');
}
);
});
</script>
<!-- //dropdown nav -->
<!-- Scrolling Nav JavaScript -->
<script src="<?php echo base_url()?>assets/front/js/scrolling-nav.js"></script>
<!-- //fixed-scroll-nav-js -->
<!--//scripts-->
<!-- //gallery-js  -->
<!-- start-smooth-scrolling -->
<script src="<?php echo base_url()?>assets/front/js/move-top.js"></script>
<script src="<?php echo base_url()?>assets/front/js/easing.js"></script>
<script>
jQuery(document).ready(function ($) {
    $(".scroll").click(function (event) {
        event.preventDefault();

        $('html,body').animate({
            scrollTop: $(this.hash).offset().top
        }, 1000);
    });
});
</script>
<!-- //end-smooth-scrolling -->
<!-- smooth-scrolling-of-move-up -->
<script>
$(document).ready(function () {
    /*
    var defaults = {
        containerID: 'toTop', // fading element id
        containerHoverID: 'toTopHover', // fading element hover id
        scrollSpeed: 1200,
        easingType: 'linear'
    };
    */

    $().UItoTop({
        easingType: 'easeOutQuart'
    });

});
</script>
<script src="<?php echo base_url()?>assets/front/js/SmoothScroll.min.js"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- about bottom grid Numscroller -->
<script src="<?php echo base_url()?>assets/front/js/numscroller-1.0.js"></script>
<!-- //about bottom grid Numscroller -->
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url()?>assets/front/js/bootstrap.js"></script>
</body>

</html>
