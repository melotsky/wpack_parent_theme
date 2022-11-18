<?php 
if ( !defined('ABSPATH')) exit;
/*********************************/
//FAVICON FOR FRONT END / BEGIN
/*********************************/
if (get_field( 'favicon', option)){
	function blog_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_field( 'favicon', option) . '" />';
	}
}else{
	function blog_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_template_directory_uri() . '/assets/css/images/favicon.ico' . '" />';
	}
}
add_action('wp_head', 'blog_favicon');
/*********************************/
//FAVICON FOR FRONT END / END
/*********************************/
/*********************************/
//FAVICON FOR ADMIN AREA / BEGIN
/*********************************/
if (get_field( 'favicon', option)){
	function admin_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_field( 'favicon', option) . '" />';
	}
}else{
	function admin_favicon() {
		echo '<link rel="Shortcut Icon" type="image/x-icon" href="' . get_template_directory_uri() . '/assets/css/images/favicon.ico' . '" />';
	}
}
add_action('admin_head', 'admin_favicon');
/*********************************/
//FAVICON FOR ADMIN AREA / END
/*********************************/