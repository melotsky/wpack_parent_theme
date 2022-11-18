<?php 
if ( !defined('ABSPATH')) exit;
/************************************/
// DISABLE THE CSS and JS FILES LOADED BY THE PARENT THEME / START
/************************************/
function disable_the_css_js_of_parent_theme_or_plugins() {
   
	// disable the style of the plugin called EDITOR BLOCKS BY Editorblocks
	wp_dequeue_style( 'editor-blocks' );
	wp_deregister_style( 'editor-blocks' );
	
	// wp_dequeue_style( 'genericons' );
    // wp_deregister_style( 'genericons' );
	
	// wp_dequeue_style( 'twentysixteen-fonts' );
    // wp_deregister_style( 'twentysixteen-fonts' );
	
	// wp_dequeue_style( 'chld_thm_cfg_parent' );
    // wp_deregister_style( 'chld_thm_cfg_parent' );

	// wp_dequeue_style( 'twentysixteen-block-editor-style-css' );
    // wp_deregister_style( 'twentysixteen-block-editor-style-css' );
	
	// //JS FILES
	// wp_dequeue_script( 'twentysixteen-skip-link-focus-fix' );
    // wp_dequeue_script( 'twentysixteen-script' );
	
	

}
add_action( 'wp_enqueue_scripts', 'disable_the_css_js_of_parent_theme_or_plugins', 20 );

/************************************/
// DISABLE THE CSS FILES LOADED BY THE PARENT THEME / END
/************************************/