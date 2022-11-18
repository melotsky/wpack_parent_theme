<?php
/**
 * Header Template
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no" maximum-scale=1.0, />
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php
if ( is_singular() && get_option( 'thread_comments' ) )
wp_enqueue_script( 'comment-reply' );
wp_head();
?>
</head>
<body <?php body_class(); ?>>
<?php 
my_slidebar(); 
my_header();

if( is_front_page() ) {
    //echo "jhome";
}