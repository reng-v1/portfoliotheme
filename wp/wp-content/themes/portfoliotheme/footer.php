<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>

<?php
  $emailAddress     = get_field('email_address', 'option');
  $aboutImage       = get_field('about_image', 'option');
  $aboutDescription = get_field('about_description', 'option');
  $linkinLink       = get_field('linkin_url', 'option');
  $twitterLink      = get_field('twitter_url', 'option');
  $githubLink       = get_field('github_url', 'option');
  $codepenLink      = get_field('codepen_url', 'option');
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
              <img src="<?php echo $aboutImage; ?>" />
            </div>
            <div class="about-content">
              <h2>About Me</h2>
              <p><?php echo $aboutDescription; ?></p>
            </div>
            <h1><a class="emailaddress" href=""><?php echo $emailAddress; ?></a></h1>
            <div class="icons-wrapper">
              <?php if($linkinLink) { ?>
              <a href="<?php echo $linkinLink; ?>" class="icon"><i class="linkedin grow-rotate ion-social-linkedin"></i></a>
              <?php } ?>
              <?php if ($twitterLink) { ?>
              <a href="<?php echo $twitterLink; ?>" class="icon"><i class="twitter grow-rotate ion-social-twitter"></i></a>
              <?php } ?>
              <?php if($githubLink) { ?>
              <a href="<?php echo $githubLink; ?>" class="icon"><i class="github grow-rotate ion-social-github"></i></a>
              <?php } ?>
              <?php if($codepenLink) { ?>
              <a href="<?php echo $codepenLink; ?>" class="icon"><i class="codepen grow-rotate ion-social-codepen"></i></a>
              <?php } ?>
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
