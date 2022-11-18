<?php 


if ( !defined('ABSPATH')) exit;



/*************************/
/* FOR SLIDEBAR AREA START */
/*************************/

function my_slidebar() {
    do_action('my_slidebar');
}

function sliderbarWrapperStart(){
    // Responsive Slidedrbar Start
    $sliderbarWrapperStart = '<!--RESPONSIVE SLIDE BAR WITH RESPONSIVE MENU SLICK NAV -->';
    $sliderbarWrapperStart .= '<div id="resp-sidebar" class="sb-slidebar sb-left group">';
    $sliderbarWrapperStart .= '<div class="group resp-sidebar-main-wrapper"><div id="wrapper_SB" class="group">';
    echo $sliderbarWrapperStart;
}

function sliderbarWrapperEnd(){
    // Responsive Slidedrbar End    
    $sliderbarWrapperEnd = '</div></div></div>'; 
    $sliderbarWrapperEnd .= '<!--RESPONSIVE SLIDE BAR WITH RESPONSIVE MENU SLICK NAV -->';
    $sliderbarWrapperEnd .= '<!-- HOLDER OF SITE -->';
    $sliderbarWrapperEnd .= '<div id="sb-site" class="group">';
    $sliderbarWrapperEnd .= '<div id="the-site-holder" class="group" style="position: relative;">';
    echo $sliderbarWrapperEnd;
  }

function theResponsiveLogo(){
    // $image = wp_get_attachment_image_src(get_field('logo', option), 'full');
    // $logoholder = '<a href="'.esc_url( home_url( '/' ) ).'">';
    // $logoholder .= '<img id="theRespLogoX" src="'. $image[0] .'" alt="'. get_bloginfo('name') .'" title="' . get_bloginfo('name') . '" />';
    // $logoholder .= '</a>';
    // echo $logoholder;


    $login = sprintf( __( 'login', 'fx_lang' ));
    $image = wp_get_attachment_image_src(get_field('logo', 'option'), 'full');
    $logoholder = '<div id="slidebar__header" class="group"><div id="close_slidebar">close</div>'; 
    $logoholder .= '<a href="'.esc_url( home_url( '/' ) ).'" class="mblogo">';
    $logoholder .= '<img id="mobile_logo" src="'. $image[0] .'" alt="'. get_bloginfo('name') .'" title="' . get_bloginfo('name') . '" />';
    $logoholder .= '</a>';
    $logoholder .= '<a href="#" id="slidebar__login">'.$login.'</a></div>';
    echo $logoholder;
}

function responsiveMenu(){
    echo '<div id="responsive-menu" class="group"></div>';
}

function respCopyRight(){
    $theUrl = get_site_url();
    $startWrapper = '<div id="respCptrFooter" class="group sbH_helper">';
    $startWrapper .= '<p>&copy; '. date("Y"). ' <a href="'. home_url( '/' ) .'">' . getDomain($theUrl) . '</a><br />';
    $startWrapper .= 'All rights reserved.</p></div>';
    echo $startWrapper;
}

function contact_information_slide_bar(){
    ob_start();
    dynamic_sidebar( 'cisb' );
    $cisb = ob_get_contents();
    $cisb_content  = '<div id="cisb" class="group">';
    $cisb_content .= $cisb . '</div>';
    ob_end_clean();
    echo $cisb_content;
}

add_action('my_slidebar', 'sliderbarWrapperStart', 1);
add_action('my_slidebar', 'theResponsiveLogo', 1 );
add_action('my_slidebar', 'responsiveMenu', 3);
add_action('my_slidebar', 'contact_information_slide_bar', 4);
add_action('my_slidebar', 'respCopyRight', 5);
add_action('my_slidebar', 'sliderbarWrapperEnd', 100);