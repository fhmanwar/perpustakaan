<!-- newsletter -->
<div class="footerv1-start">
<div class="newsletter">
<div class="container">
<div class="col-md-6 w3agile_newsletter_left">
<h3>Newsletter</h3>
<p>subscribe to our email list.We"ll keep you informed of new releases and updates</p>
</div>
<div class="col-md-6 w3agile_newsletter_right">
<form action="#" method="post">
  <input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
  <input type="submit" value="" />
</form>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
<!-- //newsletter -->
<!-- footer -->
<div class="w3_footerv1 section">
<div class="container">
<div class="w3_footerv1_grids">
<div class="col-md-3 col-sm-6 col-xs-6 w3_footerv1_grid">
  <h3>Contact</h3>
  <p>Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
  <ul class="address">
    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i><?php echo $konfigurasi->alamat ?>
                 <span>Canada.</span></li>
    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com"><?php echo $konfigurasi->email ?></a></li>
    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php echo $konfigurasi->phone ?></li>
  </ul>
</div>
<div class="col-md-3 col-sm-6 col-xs-6  w3_footerv1_grid">
  <h3>Information</h3>
  <ul class="info">
    <li><a href="<?php echo base_url()?>assets/front/about.html">About Us</a></li>
                <li><a href="<?php echo base_url()?>assets/front/about.html">management team</a></li>
                <li><a href="<?php echo base_url()?>assets/front/index.html">self publish</a></li>
    <li><a href="#">free app's</a></li>
    <li><a href="<?php echo base_url()?>assets/front/contact.html">get help</a></li>
  </ul>
</div>
<div class="col-md-3 col-sm-6 col-xs-6  w3_footerv1_grid">
  <h3>Category</h3>
  <ul class="info">
    <li><a href="<?php echo base_url()?>assets/front/shop.html">Biography</a></li>
    <li><a href="<?php echo base_url()?>assets/front/shop.html">Fiction </a></li>
    <li><a href="<?php echo base_url()?>assets/front/shop.html">Literature</a></li>
    <li><a href="<?php echo base_url()?>assets/front/shop.html">Business</a></li>
    <li><a href="<?php echo base_url()?>assets/front/shop.html">Finance</a></li>
  </ul>
</div>
<div class="col-md-3 col-sm-6 col-xs-6 w3_footerv1_grid">
  <h3>trending now</h3>
  <ul class="info">
    <li><a href="shop.html">audio books</a></li>
    <li><a href="shop.html">e-books</a></li>
  </ul>
  <h4>Follow Us</h4>
  <div class="agileits_social_button">
    <ul>
      <li><a href="#" class="google"> </a></li>
      <li><a href="#" class="facebook"> </a></li>
      <li><a href="#" class="twitter"> </a></li>
      <li><a href="#" class="instagram"> <i class="fa fa-instagram"></i> </a> </li>
    </ul>
  </div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>
<!-- //footer -->
<div class="cpy-right">
    <p>© 2018 <?php echo $konfigurasi->namaweb ?> | Design by
        <a href="http://w3layouts.com"> W3layouts.</a>
    </p>
</div>
</div>
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
