<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// WIDGET DECLARATION / START
/************************************/
add_action( 'after_setup_theme', 'remove_default_sidebars', 11 );
function remove_default_sidebars(){
    remove_action( 'widgets_init', 'kickass_widgets_init' );
}
if (function_exists('register_sidebar')) {
	
	register_sidebar(array(
    	'name' => 'Sidebar',
     	'id'   => 'sidebar',
     	'description'   => 'Right Side Bar',
     	'before_widget' => '<aside id="%1$s" class="widget %2$s group"><div class="widget-wrap group">',
     	'after_widget'  => '</div></div></aside>',
     	'before_title'  => '<h3 class="widget-title">',
     	'after_title'   => '</h3><div class="sidebar-widget-wrapper group">'
    ));
	
	register_sidebar(array(

    	'name' => 'Language Switcher - Header Position',
    	'id'   => 'lshp',
    	'description'   => 'Language Switcher',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s group lshp"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title" style="display: none !important;">',
    	'after_title'   => '</h3>'

    ));
	
	register_sidebar(array(

    	'name' => 'Contact Information - Header Left Position',
    	'id'   => 'hlp',
    	'description'   => 'Contact Information',
    	'before_widget' => '',
    	'after_widget'  => '',
    	'before_title'  => '<h3 style="display: none !important;">',
    	'after_title'   => '</h3>'

    ));
	
	register_sidebar(array(

    	'name' => 'Sidebar Contact Form - Sidebar Position',
    	'id'   => 'sbcf',
    	'description'   => 'Sidebar Contact Form Sidebar Position',
    	'before_widget' => '',
    	'after_widget'  => '',
    	'before_title'  => '<h3 style="display: none !important;">',
    	'after_title'   => '</h3>'

    ));
	
	register_sidebar(array(

    	'name' => 'Contact Information - Footer Position',
    	'id'   => 'cifp',
    	'description'   => 'Contact Information Footer Position',
    	'before_widget' => '',
    	'after_widget'  => '',
    	'before_title'  => '<h3 style="display: none !important;">',
    	'after_title'   => '</h3>'

    ));
	
	
	register_sidebar(array(

    	'name' => 'Menu - Footer Position',
    	'id'   => 'footermenu',
    	'description'   => 'Menu - Footer Position',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s group footer-menu"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title">',
    	'after_title'   => '</h3>'

    ));
	
	
	register_sidebar(array(

    	'name' => 'Facebook - Footer Position',
    	'id'   => 'ffp',
    	'description'   => 'Facebook Footer Position',
    	'before_widget' => '<aside id="%1$s" class="widget %2$s group fb-footer"><div class="widget-wrap group">',
    	'after_widget'  => '</div></aside>',
    	'before_title'  => '<h3 class="widget-title">',
    	'after_title'   => '</h3>'

    ));

}
/************************************/
// WIDGET DECLARATION / END
/************************************/


//CREATE YOUR WIDGETS!!!
/******************************************/
// WIDGETS
/******************************************/


/*ContactInformationHeaderPosition WIDGET START*/

if(!class_exists('ContactInformationHeaderPosition')) {

  class ContactInformationHeaderPosition extends WP_Widget {

    public function __construct() {
      $widget_ops = array(
        'classname' => 'contact_information_header_position_only_widget',
        'description' => 'Contact Information - Header Position',
      );
      parent::__construct( 'ContactInformationHeaderPosition_widget', 'Contact Information - Header Position', $widget_ops );
    }

    /**
    * Outputs the content of the widget
    *
    * @param array $args
    * @param array $instance
    */
	public function widget( $args, $instance ) {
      // outputs the content of the widget
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

	  // widget ID with prefix for use in ACF API functions
	  $widget_id = 'widget_' . $args['widget_id'];
	  
	  
	  $intro_text = get_field('intro_text', $widget_id);
	  
	  ?>




      <?php
            

    }


    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
    	// outputs the options form on admin
    }


    public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		if ( current_user_can( 'unfiltered_html' ) ) {
		$instance['text'] = $new_instance['text'];
		} else {
		$instance['text'] = wp_kses_post( $new_instance['text'] );
		}
		$instance['filter'] = ! empty( $new_instance['filter'] );
		return $instance;
    }

  }

}

/**
 * Register THE WIDGET
 */
function register_ContactInformationHeaderPosition()
{
  register_widget( 'ContactInformationHeaderPosition' );
}
add_action( 'widgets_init', 'register_ContactInformationHeaderPosition' );

/*ContactInformationHeaderPosition WIDGET START*/


/************************************/
// ADMIN TOOLBAR REMOVER START
/************************************/
//add_filter( 'show_admin_bar', '__return_false' );
/************************************/
// ADMIN TOOLBAR REMOVER END
/************************************/


/************************************/
// CHANGE THE --- on SELECT TAG OF CONTACT FORM 7
/************************************/
function my_wpcf7_dropdown_form($html) {
	$text = 'NEW TEXT HERE';
	$html = str_replace('---', '' . $text . '', $html);
	return $html;
}
add_filter('wpcf7_form_elements', 'my_wpcf7_dropdown_form');
/************************************/
// CHANGE THE --- on SELECT TAG OF CONTACT FORM 7
/************************************/

//REMOVE AUTOP of Contact Form 7
add_filter( 'wpcf7_autop_or_not', '__return_false' );