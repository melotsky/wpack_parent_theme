<?php 
if ( !defined('ABSPATH')) exit;

function my_copyright() {
    do_action('my_copyright');
}

function midman(){
	echo '<div id="fkup" class="group"><img id="kupke" src="' . get_template_directory_uri() . '/assets/css/images/kupke.png"/></div>';
}

add_action('my_copyright', 'midman', 1);

require_once( dirname(__FILE__) . '/hooks/header-hook.php'); // OPTION THEME / ACF
require_once( dirname(__FILE__) . '/hooks/footer-hook.php'); // OPTION THEME / ACF
require_once( dirname(__FILE__) . '/hooks/slidebar-hook.php'); // OPTION THEME / ACF


// FOR  GALLERY WIDDGET USING SITE ORIGIN and ACF PRO
function show_gallery( $atts ) {
    // attributes
$a = shortcode_atts( array(
    'id' => ''
), $atts );

if( $a['id'] == '' ) {
    return;
}



// Arguments
    $args = array( 'post_type' => 'gallery',
        'p' => $a['id'],
        'posts_per_page' => 1 
    );

     // The Query
    $gallery_query = new WP_Query( $args );



    // The Loop
    if ( $gallery_query->have_posts() ) {
        while ( $gallery_query->have_posts() ) {
            $gallery_query->the_post();
            $images = get_field('images');
            if( $images ) {
                echo '<div id="theVarkGallery" class="site-main"><div id="tgVarkWrapper" class="theGalleryo group">';
                $counter = 1;
                foreach( $images as $image => $imageID){					
                        $bigimage = wp_get_attachment_image_src( $imageID[id], 'full');
                        $thumbimage = wp_get_attachment_image_src( $imageID[id], 'gallery-thumb');
                        $titleText = get_post( $imageID[id] ); // Get IMG by ID
                        $altText = get_post_meta( $imageID[id], '_wp_attachment_image_alt', true ); // Get IMG by ID
                        ?>
                        <div id="gal<?php _e($counter)?>" class="group tgVarkClass<?php if($counter % 6 == 0) { echo ' last'; } if($counter % 4 == 0) { echo ' fourth'; } if($counter % 2 == 0) { echo ' sec'; } ?>">
                            <a href="<?php _e($bigimage[0])?>" class="everlightbox-trigger" rel="regroup">
                                <img src="<?php _e($thumbimage[0]) ?>" title="<?php //_e( $titleText->post_title )?>" alt="<?php //_e( $altText )?>" />
                            </a>
                        </div>
                        <?php 
                            if($counter % 6 == 0) { echo '<div class="clearthisGalVarkCPT last"></div>'; } 
                            if($counter % 4 == 0) { echo '<div class="clearthisGalVarkCPT fourth"></div>'; } 
                            if($counter % 2 == 0) { echo '<div class="clearthisGalVarkCPT sec"></div>'; } 
                        ?>
                        <?php $counter++;
                }
                echo '</div></div>';			
            }
        }
        wp_reset_postdata();
    }

//return $content;
}
add_shortcode( 'show_gallery', 'show_gallery' );








class Eteam_Gallery_Widget extends WP_Widget {

    // Set up the widget name and description.
    public function __construct() {
      $widget_options = array( 'classname' => 'gallery_widget', 'description' => 'Widget to show gallery' );
      parent::__construct( 'Eteam_Gallery_Widget', 'Eteam - Gallery', $widget_options );
    }

    // Create the widget output.
    public function widget( $args, $instance ) {
      echo do_shortcode( '[show_gallery id="'.$instance[ 'gallery_id' ].'"]' );
    }
 

    // Create the admin area widget settings form.
    public function form( $instance ) {
      global $wp_customize; ?>
      <p>
          <label for="<?php echo $this->get_field_id( 'gallery_id' ); ?>"><?php _e( 'Eteam Gallery:', 'eteam-utilities' ) ?></label>
          <select id="<?php echo $this->get_field_id( 'gallery_id' ); ?>" name="<?php echo $this->get_field_name( 'gallery_id' ); ?>">
            <?php
              // Set content
              $content = '';
              // Arguments
              $args = array( 
                'post_type' => 'gallery',
                'posts_per_page' => -1
              );
              // The Query
              $eteam_gallery_query = new WP_Query( $args );

              // The Loop
              if ( $eteam_gallery_query->have_posts() ) {
                while ( $eteam_gallery_query->have_posts() ) {
                  $eteam_gallery_query->the_post();
                  $selected_gallery = ( $instance['gallery_id'] == get_the_ID() ) ? 'selected' : '';
                  $content .= '<option value="'.get_the_ID().'" '.$selected_gallery.'>';
                    $content .= get_the_title();
                  $content .= '</option>';
                }
                wp_reset_postdata();
              }
              echo $content;
            ?>
          </select>       
      </p><?php

    }

    // Apply settings to the widget instance.
    public function update( $new_instance, $old_instance ) {
      $instance = $old_instance;
      $instance[ 'gallery_id' ] = $new_instance[ 'gallery_id' ];
      return $instance;
    }
  }
  // -- Register Eteam Gallery Widget -- //
  function eteam_gallery_register_widget() {
    register_widget( 'Eteam_Gallery_Widget' );
  }
  add_action( 'widgets_init', 'eteam_gallery_register_widget' );