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
  	<div class="grid-row footer-tagline-wrapper">
      <div class="center-wrapper">
        <div class="grid-row no-margin">
          <div class="col small-col-12">
            <div class="footer-tagline">
              <h1 class="sub-header">Join the Mindful Living CommUNITY</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="center-wrapper">
      <div class="grid-row no-margin">
        <div class="footer-links-wrapper">
          <div class="col small-col-12 medium-col-3 hide-for-small-only">
          <?php if ( has_nav_menu( 'footer-drkathleenhall' ) ) { ?>
            <div class="links-col-one">
              <?php if ($localSite == 'drkathleenhall') { ?>
                <h5 class="sub-header">Dr. Kathleen Hall</h5>
              <?php }
              if ($localSite == 'askdrkathleenhall') { ?>
                <h5 class="sub-header">Ask Dr. Kathleen</h5>
              <?php }
              if ($localSite == 'thestressinstitute') { ?>
                <h5 class="sub-header">The Stress Institute</h5>
              <?php }
              if ($localSite == 'mindfullivingnetwork') { ?>
                <h5 class="sub-header">Mindful Living Network</h5>
              <?php } ?>
              <?php
              $menu_drkathleenhall = array(
              	'theme_location' => 'footer-drkathleenhall',
              );
              wp_nav_menu( $menu_drkathleenhall );
              ?>
            </div>
          <?php } else { echo '&nbsp;'; } ?>
          </div>
          <div class="col small-col-12 medium-col-3 hide-for-small-only">
          <?php if ( has_nav_menu( 'footer-thestressinstitute' ) ) { ?>
            <div class="links-col-two">
              <h5 class="sub-header">The Stress Institute</h5>
              <?php
              $menu_thestressinstitute = array(
              	'theme_location' => 'footer-thestressinstitute',
              );
              wp_nav_menu( $menu_thestressinstitute );
              ?>
            </div>
          <?php } else { echo '&nbsp;'; } ?>
          </div>
          <div class="col small-col-12 medium-col-3 hide-for-small-only">
          <?php if ( has_nav_menu( 'footer-mindfullivingnetwork' ) ) { ?>
            <div class="links-col-three">
              <h5 class="sub-header">Mindful Living Network</h5>
              <?php
              $menu_mindfullivingnetwork = array(
              	'theme_location' => 'footer-mindfullivingnetwork',
              );
              wp_nav_menu( $menu_mindfullivingnetwork );
              ?>
            </div>
          <?php } else { echo '&nbsp;'; }  ?>
          </div>
          <div class="col small-col-12 medium-col-3">
            <div class="footer-newsletter">
              <h5 class="sub-header">Sign up for Mindful Living Network List</h5>
              <?php mailchimpSF_signup_form(); ?>
              <a href="<?php the_field('facebook_link', 'option'); ?>" class="social-button" target="_blank"><span class="ion-social-facebook"></span>Become a Fan</a>
              <a href="<?php the_field('twitter_link', 'option'); ?>" class="social-button" target="_blank"><span class="ion-social-twitter"></span>Follow Us</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="grid-row darkgray solid-bg no-margin">
      <div class="center-wrapper">
        <div class="grid-row no-margin">
          <div class="col small-col-12">
            <div class="footer-policy-wrapper">
              <a href="<?php get_field($localSite.'_source_url', 'option'); ?>/privacy-page">Privacy Policy</a>
              <a href="<?php get_field($localSite.'_source_url', 'option'); ?>/terms">Terms Agreement</a>
            </div>
          </div>
        </div>
        <div class="grid-row no-margin">
          <div class="col small-col-12">
            <div class="footer-copyright-wrapper">
              <?php if ($localSite == 'drkathleenhall') { ?>
                <img src="/wp-content/themes/mindfulliving/images/logo-dr-kathleen-hall.svg" />
              <?php }
              if ($localSite == 'askdrkathleenhall') { ?>
                <img src="/wp-content/themes/mindfulliving/images/logo-ask-dr-kathleen-hall.svg" />
              <?php }
              if ($localSite == 'thestressinstitute') { ?>
                <img src="/wp-content/themes/mindfulliving/images/logo-stress-institute.svg" />
              <?php }
              if ($localSite == 'mindfullivingnetwork') { ?>
                <img src="/wp-content/themes/mindfulliving/images/logo-mindful-living-network.svg" />
              <?php } ?>
              <p class="copyright gray">&copy; Copyright <?php echo date(Y) ?> Dr. Kathleen Hall. All rights reserved.</p>
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
