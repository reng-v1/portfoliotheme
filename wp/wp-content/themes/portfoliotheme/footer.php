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
