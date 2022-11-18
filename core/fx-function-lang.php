<?php 
if ( !defined('ABSPATH')) exit;


function fx_lang_setup() {
	load_theme_textdomain( 'fx_lang', get_template_directory() . '/languages/fx-' . get_locale() . '.mo' );
}
add_action( 'after_setup_theme', 'fx_lang_setup');

/************************************/
// LANGUAGE FILE DECLARATION / START
/************************************/