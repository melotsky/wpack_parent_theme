<?php 
if ( !defined('ABSPATH')) exit;

function theFooterHook(){
    do_action('theFooterHook');
}

function footerWrapperStart(){
    echo '<section id="secFooter" class="group">';
    echo '<div id="secFooterHelper" class="group">';
    echo '<footer id="masterFooter" class="group site-1400px">';
}

function footerWrapperEnd(){
    echo '</footer></div>'; 
    echo '<div id="lastFooterWrapper" class="group"><div id="lastFooter" class="group site-1400px">';
    echo '<p><a href="https://www.domain.com/" target="_blank">cumuluseo.com</a></p>';
    echo '</div></div>';
    echo '</section>';
    echo '<div id="backtotop" class="group" style="display: none"> <span></span> </div>';
    echo '</div><!-- #the-site-holder END -->';
    echo '</div> <!-- #sb-site END -->';
}

function footerLogo(){
    $theUrl = get_site_url();
    $footerLogo = wp_get_attachment_image_src(get_field('footer_logo', 'option'), 'full'); 
    $startWrapper = '<div id="cptrFooter" class="group">';
    $startWrapper .= '<a href="'. home_url( '/' ) .'">';
    $startWrapper .= '<img id="footerLogo" src="'. $footerLogo[0] .'" alt="'. get_bloginfo('name') .'" title="'. get_bloginfo('name') .'" /></a>';
    $startWrapper .= '<p>&copy; Copyright '. date("Y"). ' <a href="'. home_url( '/' ) .'">' .  getDomain($theUrl) . '</a><br />';
    $startWrapper .= ' All rights reserved.</p></div>';
    echo $startWrapper;
    //getDomain($theUrl)
}

function rightAreaStartWrap() {
    $rightAreaStartWrap = '<div id="rightFooter" class="group">';
    echo $rightAreaStartWrap;
}

function rightAreaEndWrap() {
    $rightAreaEndWrap = '</div>';
    echo $rightAreaEndWrap;
}

function mainRightFooter(){ 
    ob_start();
    dynamic_sidebar( 'footermenu' );
    $theMenu = ob_get_contents();
    $mainRightFooter = '<div id="footerMenu1" class="group footerClassSupport">';
    $mainRightFooter .= $theMenu . '</div>';
    ob_end_clean();
    echo $mainRightFooter;

    ob_start();
    dynamic_sidebar( 'fifp' );
    $theSecMenux = ob_get_contents();
    $xmainSecRightFooter = '<div id="footerInformationWidg" class="group footerClassSupport">';
    $xmainSecRightFooter .= $theSecMenux . '</div>';
    ob_end_clean();
    echo $xmainSecRightFooter;

    ob_start();
    dynamic_sidebar( 'cifp' );
    $theContactWid = ob_get_contents();
    $theContactWidWrappers = '<div id="footerContactWidg" class="group footerClassSupport">';
    $theContactWidWrappers .= $theContactWid . '</div>';
    ob_end_clean();
    echo $theContactWidWrappers;
}

function popup_form() {
    global $post;
    if ( get_field('enable_popup_form', $post->ID) ) :
        $rf_title = get_field( 'title_of_the_form', $post->ID );
        $form_shortcode = get_field( 'form_shortcode', $post->ID );
        echo "<div id=\"regulator-form\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group rf_inner_wrapper\">";
        echo "<h3 class=\"rf_title\">{$rf_title}</h3>";
        echo "<div id=\"the_cf7_form\" class=\"group tcf7\">";
        echo do_shortcode( $form_shortcode );
        echo "</div>";
        echo "</div></div>";
    endif; 

}

function the_popup_box(){
    global $post;
    $box1 = get_field('content_b1', $post->ID );
    $box2 = get_field('content_b2', $post->ID );
    $box3 = get_field('content_b3y', $post->ID );
    if ( get_field('box_1', $post->ID) ) :
        echo "<div id=\"popupbox-1\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group entry-content entry-helper\">";
        echo $box1;
        echo "<div class=\"pop-linker\"><a href=\"#popupbox-2\" class=\"popup-form-toggle\">Næste</a></div>";
        echo "</div></div>";
        echo "<div id=\"popupbox-2\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group entry-content entry-helper\">";
        echo $box2;
        echo "<div class=\"pop-linker\"><a href=\"#popupbox-3\" class=\"popup-form-toggle\">Næste</a></div>";
        echo "</div></div>";
        echo "<div id=\"popupbox-3\" class=\"popup-form mfp-hide\">";
        echo "<div class=\"group entry-content entry-helper\">";
        echo $box3;
        echo "<div class=\"pop-linker\"><a href=\"#popupbox-1\" class=\"popup-form-toggle\">Næste</a></div>";
        echo "</div></div>";
    endif;
}


add_action('theFooterHook', 'popup_form', 1);
add_action('theFooterHook', 'footerWrapperStart', 2);
add_action('theFooterHook', 'footerLogo', 6);
add_action('theFooterHook', 'rightAreaStartWrap', 3);
add_action('theFooterHook', 'mainRightFooter', 4);
add_action('theFooterHook', 'rightAreaEndWrap', 5);
add_action('theFooterHook', 'footerWrapperEnd', 100);
add_action ('theFooterHook', 'the_popup_box', 200);