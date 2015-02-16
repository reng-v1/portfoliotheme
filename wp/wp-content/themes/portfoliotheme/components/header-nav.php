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

  $content = '<header class="no-margin">
                <div class="main-nav-wrapper hide-for-small">
                  <div class="center-wrapper">
                    <div class="grid-row no-margin">
                      <div class="col small-col-4">
                        <a href="#" class="nav-logo"></a>
                      </div>
                      <div class="col small-col-8">
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