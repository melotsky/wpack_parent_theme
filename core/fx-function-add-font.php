<?php 
if ( !defined('ABSPATH')) exit;
/************************************/
// ADD FONT / START DECLARE ALL YOUR FONTS HERE FROM GOOGLE
/************************************/
function fx_addfont() {

	if (!is_admin()) {
		wp_register_style( 'addfont-opensans', '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600italic,600,700,700italic,800,800italic');
		wp_enqueue_style( 'addfont-opensans');
}}

add_action('init', 'fx_addfont');

/************************************/
// ADD FONT / END
/************************************/