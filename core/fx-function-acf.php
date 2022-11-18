<?php 
if ( !defined('ABSPATH')) exit;

// ACF DECLARATION

add_filter('acf/settings/path', 'my_acf_settings_path');
function my_acf_settings_path( $path ) {
    $path = get_template_directory() . '/assets/acf/';
	return $path;    
}

add_filter('acf/settings/dir', 'my_acf_settings_dir');
function my_acf_settings_dir( $dir ) {
    $dir = get_template_directory_uri() . '/assets/acf/';
    return $dir;
}

include_once( get_template_directory() . '/assets/acf/acf.php' );
//include_once( get_stylesheet_directory() . '/assets/acf/acf.php' );

// TABS FOR OPTION THEME
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme Options',
		'menu_title'	=> 'Theme Options',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',

	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'parent_slug'	=> 'theme-general-settings',

	));
	
}

//SAVE ACF FIELDS
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    $path = get_template_directory() . '/assets/acf/acf-json';
    return $path;
}

//LOADS ACF FIELDS
add_filter('acf/settings/load_json', 'my_acf_json_load_point');
function my_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_template_directory() . '/assets/acf/acf-json';
        return $paths;
}

// load a google map api key
// function my_acf_init() {
// 	acf_update_setting('google_api_key', 'AIzaSyBi2V8Iw1gUnx1trNAXqg-btB9bGtK7mUc');  // Change the GOOGLE MAP API KEY if necessary.
// }
//add_action('acf/init', 'my_acf_init');

//ENABLE THIS AFTER DEVELOPMENT WAS DONE
//add_filter('acf/settings/show_admin', '__return_false');