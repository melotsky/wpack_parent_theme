<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// MENU POSITION / START
/************************************/
register_nav_menus( array(

    'main-nav-top-position' => __( 'Main Nav Top Position', '' ),
    'main-nav-footer-position' => __( 'Main Nav Footer Position', '' )
	
) );
/************************************/
// MENU POSITION / END
/************************************/

/************************************/
// FUNCTION TO ECHO THE TITLE OF MENU START
/************************************/
function kamote($location) {
	$menu_location = $location;
	$menu_locations = get_nav_menu_locations();
	$menu_object = (isset($menu_locations[$menu_location]) ? wp_get_nav_menu_object($menu_locations[$menu_location]) : null);
	$menu_name = (isset($menu_object->name) ? $menu_object->name : '');
	$titileraw = esc_html($menu_name);
	return $titileraw;
}

// echo kamote('MENU-POSITION');
/************************************/
// FUNCTION TO ECHO THE TITLE OF MENU END
/************************************/