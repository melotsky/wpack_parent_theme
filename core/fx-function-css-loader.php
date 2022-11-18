<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// LOAD CSS / START
/************************************/
if (!is_admin()) {
function fx_css() {
	
//	wp_register_style( 'superfish_style', get_template_directory_uri(). '/assets/css/nav.css', 'all' ); // SUPERFISH
//	wp_enqueue_style( 'superfish_style' );

	wp_register_style( 'fontawesome_style', get_template_directory_uri(). '/assets/css/font-awesome-4.3.0/css/font-awesome.min.css', 'all' ); // SUPERFISH
	wp_enqueue_style( 'fontawesome_style' );
	
	wp_register_style( 'slicknav_style', get_template_directory_uri(). '/assets/css/slicknav.css', 'all' ); // SLICKNAV
	wp_enqueue_style( 'slicknav_style' );
	
	wp_register_style( 'slidebars_style', get_template_directory_uri(). '/assets/css/slidebars.css', 'all' ); // SLIDEBAR STYLE
	wp_enqueue_style( 'slidebars_style' );
	
	wp_register_style( 'ham_style', get_template_directory_uri(). '/assets/css/ham.css', 'all' ); // HAM STYLE
	wp_enqueue_style( 'ham_style' );
	
//	wp_register_style( 'animation_style', get_template_directory_uri(). '/assets/css/animate.css', 'all' ); // ANIMATE STYLE
//	wp_enqueue_style( 'animation_style' );
	
	wp_register_style( 'slickcaro_style', get_template_directory_uri(). '/assets/css/slick.css', 'all' ); // SLICK CAROUSEL STYLE
	wp_enqueue_style( 'slickcaro_style' );
	
//	wp_register_style( 'magnific_style', get_template_directory_uri(). '/assets/css/magnific-popup.css', 'all' ); // MAGNIFIC STYLE
//	wp_enqueue_style( 'magnific_style' );

	wp_register_style( 'main_style', get_template_directory_uri(). '/assets/css/style.css', 'all'); // MAIN STYLE
	wp_enqueue_style( 'main_style' );

}

add_action('init', 'fx_css', 2);
}

/************************************/
// LOAD CSS / END
/************************************/