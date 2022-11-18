<?php
/**
 * Banner Manager Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

 // Create id attribute allowing for custom "anchor" value.
$id = 'banner-manager_' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'game-providers-single';
if( !empty($block['className']) ) {
    $className .= ' ' . esc_html(strip_tags($block['className']));
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}?>
<div class="banner_manager" id="<?php _e($id)?>">
    <?php if( get_field('randomize_the_banners_bb') == "1" ) : ?> 
        <?php 
            $target_id = get_field('select_banner_bb'); 
            $link = get_field('link_bo', $target_id );
            $link_url = $link['url'];
            $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
        <div class="banner_manager__img">
        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
        <?php 
            $image = get_field('banner_image_bo', $target_id);
            $title = get_the_title($target_id);
            echo wp_get_attachment_image( 
                $image['id'], 'full', 
                false, 
                array(
                    'title' => $title, 
                    'alt' => $title, 
                    'class' => 'img__banner_manager'
                )
            );
        ?>
        </a>
        </div>
    <?php else:  ?>
        <?php
        wp_reset_postdata();
        $loop = new WP_Query( array( 
                            'post_type'      => 'banner', 
                            'posts_per_page' => 1,
                            'orderby'        => 'rand', ) 
                        );
        ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <div class="banner_manager__img">
                <?php
                    $theID = get_the_ID();
                    $link = get_field('link_bo', $theID);
                    $link_url = $link['url'];
                    $link_target = $link['target'] ? $link['target'] : '_self';                
                ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                <?php 
                    $image = get_field('banner_image_bo', $theID);
                    $title = get_the_title( $theID );
                    echo wp_get_attachment_image( 
                        $image['id'], 'full', 
                        false, 
                        array(
                            'title' => $title, 
                            'alt' => $title, 
                            'class' => 'img__banner_manager'
                        )
                    );
                ?>
                </a>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); // reset the query ?>
    <?php endif; ?>
</div>