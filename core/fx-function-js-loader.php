<?php 
if ( !defined('ABSPATH')) exit;

if (!is_admin()) {
/************************************/
// INLCUDE THE JQUERY USED BY THE WORDPRESS SAME WITH OTHER THEMES LIKE 2010 TO 2015 / START
/************************************/
function theme_scripts() {
  wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'theme_scripts');


/************************************/
// LOAD JS / START
/************************************/
function fx_js() {

	wp_register_script('jquery_hoverintent', get_template_directory_uri(). '/assets/js/hoverIntent.js', array('jquery'), '', true ); // JQUERY SUPERFISH
	wp_enqueue_script('jquery_hoverintent');
	
	wp_register_script('jquery_superfish', get_template_directory_uri(). '/assets/js/superfish.js', array('jquery'), '', true ); // JQUERY SUPERFISH
	wp_enqueue_script('jquery_superfish');
	
	wp_register_script('jquery_superfish_settings', get_template_directory_uri(). '/assets/js/js-superfish-settings.js', array('jquery'), '', true ); // JQUERY SUPERFISH
	wp_enqueue_script('jquery_superfish_settings');
	
	wp_register_script('jquery_slicknav', get_template_directory_uri(). '/assets/js/jquery.slicknav.min.js', array('jquery'), '', true ); // JQUERY SLICKNAV
	wp_enqueue_script('jquery_slicknav');
	
	wp_register_script('jquery_slicknav_settings', get_template_directory_uri(). '/assets/js/js-slicknav-settings.js', array('jquery'), '', true ); // JQUERY FLEXNAV
	wp_enqueue_script('jquery_slicknav_settings');
	
	wp_register_script('jquery_slidebars', get_template_directory_uri(). '/assets/js/slidebars.min.js', array('jquery'), '', true ); // SLIDEBARS
	wp_enqueue_script('jquery_slidebars');
	
	wp_register_script('jquery_slidebars_settings', get_template_directory_uri(). '/assets/js/js-slidebars-settings.js', array('jquery'), '', true ); // SLIDEBAR SETTINGS
	wp_enqueue_script('jquery_slidebars_settings');
	
	wp_register_script('jquery_ham_settings', get_template_directory_uri(). '/assets/js/ham-settings.js', array('jquery'), '', true ); // HAM SETTINGS
	wp_enqueue_script('jquery_ham_settings');
	
//	wp_register_script('jquery_wow', get_template_directory_uri(). '/assets/js/wow.min.js', array('jquery'), '', true ); // WOW ANIMATION
//	wp_enqueue_script('jquery_wow');
	
	wp_enqueue_script( 'custom_script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '', true );
	wp_enqueue_script('custom_script');

	wp_register_script('jquery_slickcaro', get_template_directory_uri(). '/assets/js/slick.min.js', array('jquery'), '', true ); // SLICK CAROUSEL
	wp_enqueue_script('jquery_slickcaro');
	
	wp_register_script('jquery_slickcaro_settings', get_template_directory_uri(). '/assets/js/js-slickslider-settings.js', array('jquery'), '', true ); // SLICK CAROUSEL SETTINGS
	wp_enqueue_script('jquery_slickcaro_settings');
	
//	wp_register_script('jquery_magnific', get_template_directory_uri(). '/assets/js/magnific-popup.js', array('jquery'), '', true ); // magnific
//	wp_enqueue_script('jquery_magnific');
	
	// Change the GOOGLE MAP API KEY and the LANGUAGE if necessary.
//	wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyBi2V8Iw1gUnx1trNAXqg-btB9bGtK7mUc&language=da', array('jquery'), '', true );
//	wp_enqueue_script('google-maps');

	
	// EVERLIGHT MOD ENABLE THIS IF YOU WANT TO USE EVERLIGHT
	// MUST INSTAL EVERLIGHT PLUGIN
	//wp_register_script('everlight_mod', get_template_directory_uri(). '/assets/js/everlight_mod.js', array('jquery'), '', true ); // magnific
	//wp_enqueue_script('everlight_mod');	
	
}

add_action('init', 'fx_js', 1);

/************************************/
// LOAD JS / END
/************************************/


/************************************/
// LOAD JS TO FOOTER / START
/************************************/

function add_script_to_footer() {
//	wp_register_script('Ajax_Loader', get_template_directory_uri(). '/assets/js/ajax.js' ); 
//	wp_enqueue_script('Ajax_Loader', true);
}
//add_action( 'wp_footer', 'add_script_to_footer' );	

/************************************/
// LOAD JS TO FOOTER / END
/************************************/
}