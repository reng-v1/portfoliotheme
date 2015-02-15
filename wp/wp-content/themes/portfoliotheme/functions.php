<?php

// menu registration
function remove_parent_menu_location() {
    unregister_nav_menu( 'primary' );
}
add_action( 'after_setup_theme', 'remove_parent_menu_location', 20 );
/*register_nav_menu( 'header-nav', __( 'Main Navigation Header', 'mindfulliving' ) );
register_nav_menu( 'footer-drkathleenhall', __( 'Footer Menu One', 'mindfulliving' ) );
register_nav_menu( 'footer-thestressinstitute', __( 'Footer Menu Two', 'mindfulliving' ) );
register_nav_menu( 'footer-mindfullivingnetwork', __( 'Footer Menu Three', 'mindfulliving' ) );*/
// shortcode components
remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 12);
/*require_once(get_stylesheet_directory().'/components/header-nav.php');
require_once(get_stylesheet_directory().'/components/grid.php');
require_once(get_stylesheet_directory().'/components/presentation.php');
require_once(get_stylesheet_directory().'/components/blog-post-preview.php');
require_once(get_stylesheet_directory().'/components/ask-feed.php');
require_once(get_stylesheet_directory().'/components/book-preview.php');
require_once(get_stylesheet_directory().'/components/product-snapshot.php');
require_once(get_stylesheet_directory().'/components/mindful-moment-preview.php');
require_once(get_stylesheet_directory().'/components/sister-banner-sites.php');
require_once(get_stylesheet_directory().'/components/product-preview.php');
require_once(get_stylesheet_directory().'/components/banner.php');
require_once(get_stylesheet_directory().'/components/client-showcase.php');
require_once(get_stylesheet_directory().'/components/ask-question.php');
require_once(get_stylesheet_directory().'/components/recent-community-question.php');*/

// helper function for multi-site content
//require_once(get_stylesheet_directory().'/multi-site-content.php');

// setting up an ACF options page
/*if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
  	'page_title' 	=> 'Mindful Living Theme Settings',
  	'menu_title'	=> 'Mindful Living Theme Settings',
  	'menu_slug' 	=> 'theme-general-settings',
  	'position'    => '2.5'
  ));
}*/

// setting up our shortcode dropdown plugin for TinyMCE
function register_mlnshortcode_button( $buttons ) {
   array_push( $buttons, "|", "mlnshortcodes" );
   return $buttons;
}
function add_mlnshortcode_plugin( $plugin_array ) {
   $plugin_array['mlnshortcodes'] = get_stylesheet_directory_uri() . '/js/mce-shorts.js';
   return $plugin_array;
}
function mlnshortcodes_button() {
  if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
    return;
  }
  if ( get_user_option('rich_editing') == 'true' ) {
    add_filter( 'mce_external_plugins', 'add_mlnshortcode_plugin' );
    add_filter( 'mce_buttons', 'register_mlnshortcode_button' );
  }
}
function custom_script() {
    wp_enqueue_script(
        'custom', // name your script so that you can attach other scripts and de-register, etc.
        get_stylesheet_directory_uri() . '/js/custom.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}
function swipe_script() {
    wp_enqueue_script(
        'swipe', // name your script so that you can attach other scripts and de-register, etc.
        get_stylesheet_directory_uri() . '/js/swipe.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}
function gsap_script() {
    wp_enqueue_script(
        'tweenmax', // name your script so that you can attach other scripts and de-register, etc.
        get_stylesheet_directory_uri() . '/js/TweenMax.min.js', // this is the location of your script file
        array('jquery') // this array lists the scripts upon which your script depends
    );
}
add_action( 'wp_enqueue_scripts', 'custom_script' );
add_action( 'wp_enqueue_scripts', 'swipe_script' );
add_action( 'wp_enqueue_scripts', 'gsap_script' );
add_action('init', 'mlnshortcodes_button');

// WP-API and ACF
// https://github.com/PanManAms/WP-JSON-API-ACF
require_once(get_stylesheet_directory().'/WP-JSON-API-ACF/plugin.php');

?>