<?php
  // Banner Shortcode
  function banner_shortcode($atts, $content) {
    $options = shortcode_atts( array(
      'classes'     => null, /*box shadow-box*/
      'justtext'    => false,
      'imageurl'    => null,
      'titlecolor'  => orange, /*orange, blue, green, pink, black*/
      'titletext'   => null,
      'buttonclasses' => null,   /*button-box button*/
      'buttontext'  => null,
      'buttonurl'   => null,
      'textalign'   => null,   /*left-top, left-middle, left-bottom, right-top, right-middle right-bottom*/
      'style'       => null    /*dark, light*/
    ), $atts );

    if($options['justtext'] == false) {
      $content_shortcode = '
      <div class="banner-wrapper '.$options['classes'].'" style="background-image: url('.$options['imageurl'].');" >
        <img src="'.$options['imageurl'].'" />
        <div class="content '.$options['textalign'].' center-align show-for-medium-up">
          <h2 class="sub-header '.$options['style'].'">'.$options['titletext'].'</h2>
          <a class="'.$options['buttonclasses'].' '.$options['style'].' center-align" style="width: 200px;" href="'.$options['buttonurl'].'">'.$options['buttontext'].'</a>
        </div>
      </div>
      <div class="banner content center-align show-for-small-only">
        <h2 class="sub-header">'.$options['titletext'].'</h2>
         <a class="'.$options['buttonclasses'].' darkgray center-align" href="'.$options['buttonurl'].'">'.$options['buttontext'].'</a>
      </div>';
    }else {
      $content_shortcode = '
      <div class="banner-wrapper">
        <h2 class="sub-header just-text"><span class="'.$options['titlecolor'].'">'.$options['titletext'].'</span>'.do_shortcode($content).'</h2>
      </div>';
    }
    // reset for multiple loop usage
    wp_reset_postdata();

    return $content_shortcode;
  }
  add_shortcode('banner', 'banner_shortcode');
?>