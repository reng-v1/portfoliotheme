<?php
/**
* Presentational Shortcodes
* for Mindful Living Network
**/

// Box Shadow shortcode
function box_shadow( $args, $content = null ){

  $options = shortcode_atts( array(
      'padding'  => false
  ), $args );

  $boxContainer;
  if ( $options['padding'] ) {
    $boxContainer = '<div class="box shadow-box padding">';
  } else {
    $boxContainer = '<div class="box shadow-box">';
  }

  $boxContainer .= '<div class="content">'. do_shortcode($content) . '</div></div>';
  return $boxContainer;
}
add_shortcode( 'box-shadow', 'box_shadow' );

// Outside Heading shortcode
function outside_heading( $args, $content = null ){

  $options = shortcode_atts( array(), $args );

  $heading = '<div class="outside-heading">'.do_shortcode($content).'</div>';

  return $heading;
}
add_shortcode( 'outside-heading', 'outside_heading' );

?>