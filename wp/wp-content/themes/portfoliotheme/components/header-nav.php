<?php
/**
* Header Navigation
* for Mindful Living Network
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
  $drkathleenhallurl = get_field('drkathleenhall_source_url', 'option');
  $askdrkathleenurl = get_field('askdrkathleenhall_source_url', 'option');
  $stressinstituteurl = get_field('thestressinstitute_source_url', 'option');
  $mindfullivingurl = get_field('mindfullivingnetwork_source_url', 'option');
  //$mindfulmarketurl = get_field('mindful_living_market_source_url', 'option');
  $mindfulmarketurl = esc_url( home_url( '/shop' ) );
  $localSite = get_field('this_site', 'option');


  $content = '<header class="no-margin">
                <div class="grid-row no-margin">
                  <div class="col small-col-12 motto-wrapper">
                    <div class="center-wrapper">
                      <div class="motto">
                        <h4 class="sub-header"><strong>Stress <i>LESS</i>  through Mindful Living&reg;</strong></h4>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="grid-row no-margin hide-for-small">
                  <div class="col small-col-12 explore-bkg">
                    <div class="center-wrapper">
                      <ul class="logos">
                        <li>Explore:</li>';
  if ($localSite == 'drkathleenhall') {
    $content .=        '<li><a class="kathleen-hall-logo current" href="'.$drkathleenhallurl.'">Dr. Kathleen Hall</a></li>';
  } else {
    $content .=        '<li><a class="kathleen-hall-logo" href="'.$drkathleenhallurl.'">Dr. Kathleen Hall</a></li>';
  }
  if ($localSite == 'askdrkathleenhall') {
    $content .=        '<li><a class="ask-kathleen-logo current" href="'.$askdrkathleenurl.'">Ask Dr. Kathleen</a></li>';
  } else {
    $content .=        '<li><a class="ask-kathleen-logo" href="'.$askdrkathleenurl.'">Ask Dr. Kathleen</a></li>';
  }
  if ($localSite == 'thestressinstitute') {
    $content .=        '<li><a class="stress-institute-logo current" href="'.$stressinstituteurl.'" target="_blank">The Stress Institute</a></li>';
  } else {
    $content .=        '<li><a class="stress-institute-logo" href="'.$stressinstituteurl.'" target="_blank">The Stress Institute</a></li>';
  }
  if ($localSite == 'mindfullivingnetwork') {
    $content .=        '<li><a class="mindful-network-logo current" href="'.$mindfullivingurl.'" target="_blank">Mindful Living Network</a></li>';
  } else {
    $content .=        '<li><a class="mindful-network-logo" href="'.$mindfullivingurl.'" target="_blank">Mindful Living Network</a></li>';
  }
    $content .=        '<li><a class="mindful-market-logo" href="'.$mindfulmarketurl.'">Mindful Living Market</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="main-nav-wrapper hide-for-small">
                  <div class="center-wrapper">
                    <div class="grid-row no-margin">
                      <div class="col small-col-3">
                        <a href="'.get_field($localSite.'_source_url', 'option').'" class="nav-logo '.$localSite.'"></a>
                      </div>
                      <div class="col small-col-6">
                        <nav class="main-nav">'.$menuMarkup.'</nav>
                      </div>
                      <div class="col small-col-3">
                        <ul class="utility">
                          <li class="search"><a href="#">Search</a></li>
                          <li class="login"><a href="#">Login</a></li>
                          <li class="newsletter"><a href="'.get_field($localSite.'_source_url', 'option').'/newsletter">Newsletter</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="search-wrapper hide-for-small">
                  <div class="center-wrapper">
                    <div class="search-box">
                      <h1 class="sub-header offwhite rem-by-fives thirty-five">Search</h1>
                      <form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'">
                        <input class="input-box" type="text" name="s">
                        <div class="submit-wrapper">
                          <input class="submit-btn ion-search" type="submit" name="search-submit" value="submit">
                          <div class="submit-icon ion-search"></div>
                        </div>
                      </form>
                      <p>Example: Work Stress</p>
                    </div>
                    <div class="close-btn">
                      <p>Close</p>
                      <div class="close-icon ion-close-round"></div>
                    </div>
                  </div>
                </div>

                <!-- Mobile Verison -->
                <div class="mobile-nav-wrapper show-for-small-only">
                  <div class="grid-row">
                    <div class="col small-col-12">
                      <ul>
                        <li class="logo '.$localSite.'"><a class="ion-chevron-down" href="#"></a></li>
                        <li class="search"><a href="#"></a></li>
                        <li class="menu"><a href="#"></a></li>
                      </ul>
                      <div class="search-box">
                        <form role="search" method="get" id="searchform" class="searchform" action="'.esc_url( home_url( '/' ) ).'">
                          <input class="input-box" type="text" name="s" placeholder="Search the CommUNITY">
                          <div class="submit-wrapper">
                            <input class="submit-btn ion-search" type="submit" name="search-submit" value="submit">
                            <div class="submit-icon ion-search"></div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="explore-drop-down box shadow-box">
                    <div class="grid-row">
                      <div class="col small-col-12">
                        <a href="'.$drkathleenhallurl.'" class="dr-kathleen-logo"></a>
                      </div>
                      <div class="col small-col-12">
                        <a href="'.$askdrkathleenurl.'" class="ask-kathleen-logo"></a>
                      </div>
                      <div class="col small-col-12">
                        <a href="'.$stressinstituteurl.'" class="stress-institute-logo"></a>
                      </div>
                      <div class="col small-col-12">
                        <a href="'.$mindfullivingurl.'" class="mindful-network-logo"></a>
                      </div>
                      <div class="col small-col-12">
                        <a href="'.$mindfulmarketurl.'" class="mindful-market-logo"></a>
                      </div>
                    </div>
                  </div>
                  <div class="menu-drop-down box shadow-box">
                    <div class="grid-row no-margin">
                      <div class="col small-col-12">
                        <a href="'.get_field($localSite.'_source_url', 'option').'/newsletter" class="newsletter"></a>
                      </div>
                    </div>
                    <!--<div class="grid-row no-margin">
                      <div class="col small-col-6">
                        <a href="'.get_field($localSite.'_source_url', 'option').'/newsletter" class="newsletter"></a>
                      </div>
                      <div class="col small-col-6">
                        <a href="#" class="menu-login"></a>
                      </div>
                    </div>-->
                    <div class="grid-row">
                      <nav class="mobile-nav">'.$menuMarkup.'</nav>
                    </div>
                    <div class="grid-row">
                      <div class="col small-col-12">
                        <a href="mailto:info@stressinstitute.com" class="button-box button orange solid-bg">info@stressinstitute.com</a>
                      </div>
                      <div class="col small-col-12">
                        <a href="tel:4044903688" class="button-box button green solid-bg">404-490-3688</a>
                      </div>
                      <div class="col small-col-12">
                        <ul class="social-links">
                          <li class="facebook"><a href="'.get_field('facebook_link', 'option').'"></a></li>
                          <li class="twitter"><a href="'.get_field('twitter_link', 'option').'"></a></li>
                          <li class="pinterest"><a href="'.get_field('pinterest_link', 'option').'"></a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </header>';
  return $content;
}
add_shortcode( 'header-nav', 'main_nav' );

?>