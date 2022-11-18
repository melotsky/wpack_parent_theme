<?php 
if ( !defined('ABSPATH')) exit;
function register_acf_block_types() {

    // register a testimonial block.
    acf_register_block_type(array(
        'name'              => 'block-sample',
        'title'             => __('Block Sample'),
        'description'       => __('Just a block sample'),
        'render_template'   => './inc/blocks/block-sample/block-sample.php',
        'category'          => 'common blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'block-sample', 'quote' ),
    ));
}

function promotion_block_four() {

    // register a latest_winners.
    acf_register_block_type(array(
        'name'              => 'promotion_block_four',
        'title'             => __('Promo Block 4 Prizes', 'ahti_lang'),
        'description'       => __('Promo Block 4 Prizes', 'ahti_lang'),
        'render_template'   => './inc/blocks/promotion-block-four/promotion-block-four.php',
        'category'          => 'New blocks',
        'icon'              => 'admin-comments',
        'keywords'          => array( 'promotion-block-four', 'quote' ),
        'mode' => 'edit',
        //'enqueue_script'    => '/wp-includes/js/masonry.min.js' ,
        //'enqueue_style'     => get_template_directory_uri() . '/inc/blocks/latest-winners/latest-winners.css',
    ));

}

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
    add_action('acf/init', 'promotion_block_four');
}    