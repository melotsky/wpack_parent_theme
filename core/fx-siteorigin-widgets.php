<?php 
if ( !defined('ABSPATH')) exit;

/**
 * Functions to add SiteOrigin Widget framework.
 *
 * @package Kickass
 */

// Define base widget folder url.
define( 'THEME_NAME_WIDGET_FOLDER_URI', get_template_directory_uri() . '/inc/widgets/' );

// Define theme font.
define ( 'THEME_NAME_WIDGET_FONTS', '' );

/**
 * Add new widgets list.
 *
 * @return array
 */
function theme_name_widgets_collection( $folders ) {

	// Get widgets folder.
	$folders[] = get_template_directory() . '/inc/widgets/';

	// Return folders list.
	return $folders;
}
add_filter( 'siteorigin_widgets_widget_folders', 'theme_name_widgets_collection' );


