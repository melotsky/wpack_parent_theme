<?php 
if ( !defined('ABSPATH')) exit;

/*************************/
/* FOR HEADER AREA START */
/*************************/

function my_header() {
    do_action('my_header');
}

function headerWrapperStart(){
    // WRAPPPER FOR HEADER START 
    // FOR IMAGES THAT NEEDS TO LOAD ON THE HEADER
?>
    <div id="mainHeaderHolder" class="group">
    <section id="secHHolder" class="group">
    <header id="masterHeader" class="group site-1400px">
<?php
}

function headerWrapperEnd(){
    // WRAPPER FOR HEADER END
?>
    </header>
    </section>
    </div>
<?php
}

function headerInnerWrapperStart(){
?>
    <div id="innerHeaderWrapper" class="group">
<?php
}

function headerInnerWrapperEnd(){
?>
    </div>
<?php
}

function theHeaderLogo(){
    $image = wp_get_attachment_image_src(get_field('logo', 'option'), 'full');
    $logoholder = '<a href="'.esc_url( home_url( '/' ) ).'">';
    $logoholder .= '<img id="logo" src="'. $image[0] .'" alt="'. get_bloginfo('name') .'" title="' . get_bloginfo('name') . '" />';
    $logoholder .= '</a>';
    echo $logoholder;
}

function mainNavDeclaration(){
    ob_start();
    wp_nav_menu( array('container' => 'nav', 'container_class' => 'header-nav group', 'container_id' => 'id_header-nav', 'menu_class' => 'sf-menu', 'menu_id' => 'thenavigator', 'theme_location' => 'main-nav-top-position') );
    $theNavValue = ob_get_contents();
    $mainNav = '<div id="navigation" class="group">';
    $mainNav .= $theNavValue;
    $mainNav .="</div>";
    ob_end_clean();
    echo $mainNav;
  }

function navWrapperStart(){
    echo "<div id=\"nav-holder-right\" class=\"group\"><div id=\"navHolder\" class=\"group\">";
}

function navWrapperEnd(){
    echo "</div></div>";
}

function humbergerMennu(){
    echo "<div id=\"hamMenuHolder\" class=\"group sb-toggle-left show-left showRespMenu\">";
    echo "<div id=\"innerHamMenuHolder\" class=\"group\">";
    echo "<div id=\"hmhBTNHolder\" class=\"gruop\">";
    echo "<button ID=\"slickerbtn\" class=\"hamburger hamburger--emphatic\" type=\"button\"><span class=\"hamburger-box\"> <span class=\"hamburger-inner\"></span></span></button>";
    echo "</div></div></div>";
}

function slider_holder(){
    global $post;
    $blog_id = get_option( 'page_for_posts' );
    if( is_front_page() ){
        $class_top = "home-slider";
        $slider_shortcode = get_field('slider_shortcode', $post->ID);
    }else if( is_home() ){
        $class_top = "inner-slider";
        $slider_shortcode = get_field('slider_shortcode', $blog_id);
    }else if( is_search() ){
        $class_top = "inner-slider";
        $slider_shortcode = get_field('search_slider_shortcode', 'option');
    }else{
        $class_top = "inner-slider";
        $slider_shortcode = get_field('slider_shortcode', $post->ID);
    }

    echo "<div id=\"slider-holder\" class=\"group {$class_top}\">";
    echo do_shortcode( $slider_shortcode );
    echo "<div class=\"slider-black\"></div>";
    echo "</div>";
}

function btn_search_wrapper_start(){
    echo "<div id=\"btn_search_wrapper\" class=\"group\">";
    echo "<div id=\"btn_search_wrapper__inner\" class=\"group site-1180px\">";
}

function btn_search_wrapper_end(){
    echo "</div>";
	echo "<div id=\"spt_srch\" class=\"group\"></div>";
	echo "</div>";
}

function btn_support($main_title, $link1, $link2, $title1, $title2){
    global $post;
    $current_link = get_permalink($post->ID);

    if ($current_link == $link1){ $class_active1 = " active"; }
    if ($current_link == $link2){ $class_active2 = " active"; }

    $output  .= "<div id=\"the-btns\" class=\"group\">";
    $output .= "<h3>{$main_title}</h3>";
    $output .= "<div class=\"group the-btns_innerwrapper\">";
    $output .= "<a href=\"{$link1}\" class=\"btn_link_1{$class_active1}\"><span>{$title1}</span></a>";
    $output .= "<a href=\"{$link2}\" class=\"btn_link_2{$class_active2}\"><span>{$title2}</span></a>";
    $output .= "</div></div>";
    return $output;
}

function the_btns(){
    $btn_main_title = get_field('button_title', 'option');
    $btn_title1 = get_field('button_1_title', 'option');
    $btn_title2 = get_field('button_2_title', 'option');
    $btn_link1 = get_field('target_page_button_1', 'option');
    $btn_link2 = get_field('target_page_button_2', 'option');
    echo btn_support($btn_main_title, $btn_link1, $btn_link2, $btn_title1, $btn_title2);
}

function searchform_slider(){ 
	$search_title = get_field('search_title', 'option');
    $value = isset($_GET['s']) ? $_GET['s'] : "Søg i feltet her";
    $value = esc_attr($value);
    $home_url = home_url( '/' );
    echo "<div id=\"search_holder\" class=\"group\"><h3>{$search_title}</h3>";
	echo "<aside class=\"widget group\" id=\"search-form\">";
    echo "<div class=\"textwidget group\">";
	echo "<form action=\"{$home_url}\" id=\"searchform\" method=\"get\">";
    echo "<fieldset><input type=\"text\" id=\"s\" name=\"s\" placeholder=\"{$value}\" required />";
    echo "<input id=\"searchsubmit\" type=\"submit\" value=\"Søg\" />";
    echo "</fieldset></form></div></aside></div>";

    //$tat1 = sprintf( __( 'You can visit the page by clicking <a href="%s">here</a>.', 'bsfj_lang' ), 'http://example.com');
    //$tat2 = sprintf( __( 'You can visit the page by clicking <a href="#">here</a>.', 'bsfj_lang' ));
}

add_action('my_header', 'headerWrapperStart', 1);
add_action('my_header', 'headerInnerWrapperStart', 2);
add_action('my_header', 'theHeaderLogo', 3);
add_action('my_header', 'navWrapperStart', 5);
add_action('my_header', 'mainNavDeclaration', 6);
add_action('my_header', 'navWrapperEnd', 7);
add_action('my_header', 'humbergerMennu', 8);
add_action('my_header', 'headerInnerWrapperEnd', 11);
add_action('my_header', 'headerWrapperEnd', 20);
add_action('my_header', 'slider_holder', 21);
add_action('my_header', 'btn_search_wrapper_start', 25);
add_action('my_header', 'the_btns', 26);
add_action('my_header', 'btn_search_wrapper_end', 28);
add_action('my_header', 'searchform_slider', 26);