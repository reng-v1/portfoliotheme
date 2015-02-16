<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>

<?php
  $localSite = get_field('this_site', 'option');
?>
	</div>

  <div class="footer-wrapper">
  	
    <div class="center-wrapper">

      <div class="grid-row">
        <div class="col small-col-12">
          <h1>Contact Me</h1>
        </div>
      </div>

      <div class="grid-row">

        <div class="col small-col-12 medium-col-6">
          <div class="contact-section">
            <?php echo do_shortcode('[contact-form-7 id="18" title="Footer Contact"]'); ?>
          </div>
        </div>

        <div class="col small-col-12 medium-col-6">
          <div class="about-section">
            <div class="about-image">
              <img src="<?php echo get_stylesheet_directory_uri().'/images/about-me-pic.jpg'?>" />
            </div>
            <div class="about-content">
              <h2>About Me</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eu purus vehicula, finibus nisi sit amet, viverra leo. In dapibus felis sit amet sollicitudin ultrices. Quisque venenatis mollis ligula, sit amet viverra est sagittis ut. Morbi a massa vitae magna consequat sodales non nec erat.</p>
            </div>
            <h1><a class="emailaddress" href="">ryanengkl@gmail.com</a></h1>
            <div class="icons-wrapper">
              <a href="#" class="icon"><i class="linkedin grow-rotate ion-social-linkedin"></i></a>
              <a href="#" class="icon"><i class="twitter grow-rotate ion-social-twitter"></i></a>
              <a href="#" class="icon"><i class="github grow-rotate ion-social-github"></i></a>
              <a href="#" class="icon"><i class="codepen grow-rotate ion-social-codepen"></i></a>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>


  <!-- jQuery is called via the WordPress-friendly way via functions.php -->

  <!-- this is where we put our custom functions -->
  <script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

  <!-- TypeKit Embed -->
  <script src="//use.typekit.net/wxv3wly.js"></script>
  <script>try{Typekit.load();}catch(e){}</script>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-XXXXXX-XX', 'domainname.com');
    ga('send', 'pageview');

  </script>

</body>

</html>
