<?php
/**
* Grid Shortcode
* for Mindful Living Network
**/

// Grid Row shortcode
function grid_row( $args, $content = null ){

  $options = shortcode_atts( array(
      'nomargin' => false
  ), $args );

  if ( $options['nomargin'] ) {
	  $gridrow = '<div class="grid-row no-margin">' . 	do_shortcode($content) . '</div>';
  } else {
	  $gridrow = '<div class="grid-row">' . 	do_shortcode($content) . '</div>';
  }

  return $gridrow;
}
add_shortcode( 'grid-row', 'grid_row' );


// Grid Row shortcode
function nested_grid_row( $args, $content = null ){

  $options = shortcode_atts( array(
      'nomargin' => false
  ), $args );

  if ( $options['nomargin'] ) {
	  $gridrow = '<div class="grid-row no-margin">' . 	do_shortcode($content) . '</div>';
  } else {
	  $gridrow = '<div class="grid-row">' . 	do_shortcode($content) . '</div>';
  }

  return $gridrow;
}
add_shortcode( 'nested-grid-row', 'nested_grid_row' );

// Column shortcode
function grid_column( $args, $content = null ){

  $options = shortcode_atts( array(
      'smallcolumns'  => 12,
      'largecolumns'  => null,
      'mediumcolumns' => null
  ), $args );

  $colClasses;
  if ( $options['smallcolumns'] ) {
    $colClasses = 'small-col-'.$options['smallcolumns'];
  }
  if ( $options['largecolumns'] ) {
    $colClasses .= ' large-col-'.$options['largecolumns'];
  }
  if ( $options['mediumcolumns'] ) {
    $colClasses .= ' medium-col-'.$options['mediumcolumns'];
  }

  $column = '<div class="col '. $colClasses .'">' . do_shortcode($content) . '</div>';

  return $column;
}
add_shortcode( 'column', 'grid_column' );
// Column shortcode
function nested_grid_column( $args, $content = null ){

  $options = shortcode_atts( array(
      'smallcolumns'  => 12,
      'largecolumns'  => null,
      'mediumcolumns' => null
  ), $args );

  $colClasses;
  if ( $options['smallcolumns'] ) {
    $colClasses = 'small-col-'.$options['smallcolumns'];
  }
  if ( $options['largecolumns'] ) {
    $colClasses .= ' large-col-'.$options['largecolumns'];
  }
  if ( $options['mediumcolumns'] ) {
    $colClasses .= ' medium-col-'.$options['mediumcolumns'];
  }

  $column = '<div class="col '. $colClasses .'">' . do_shortcode($content) . '</div>';

  return $column;
}
add_shortcode( 'nested-column', 'nested_grid_column' );

?>