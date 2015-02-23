<?php
/**
* Header Navigation
* for Portfolio Theme
**/

// prepare the menu itself

// Main Nav shortcode
function main_nav(){

  ob_start();
  wp_nav_menu( array(
    'menu' => 'Main Nav',
    'theme_location' => 'header-nav',
    'container' => ''
  ) );
  $menuMarkup = ob_get_clean();
  ob_end_flush();

  $navText = get_field('nav_logo_text', 'option');
  $navImage = get_field('nav_logo_image', 'option');

  $content = '<header class="no-margin">
                <div class="main-nav-wrapper">
                  <div class="center-wrapper">
                    <div class="grid-row no-margin">
                      <div class="col small-col-12 medium-col-4">';
                      if($navImage) {
  $content .=            '<a href="/"><img src="'.$navImage.'" alt=""/></a>';
                      }else {
  $content .=            '<h1 class="nav-logo"><a href="/">'.$navText.'</a></h1>';                      
                      }
  $content .=         '</div>
                      <div class="col small-col-12 medium-col-8">
                        <nav class="main-nav">'.$menuMarkup.'</nav>
                      </div>
                    </div>
                  </div>
                </div>
              </header>';
  return $content;
}
add_shortcode( 'header-nav', 'main_nav' );

?>