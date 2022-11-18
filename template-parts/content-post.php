<?php


/**
 * Content area for Default Template
 */


?>

<article id="post-<?php the_ID(); ?>" <?php post_class('group'); ?>>
  <header class="entry-header">
      <?php the_title( '<h1 class="entry-title"><span>', '</span></h1>' ); ?>
  </header>
  <div class="entry-content group">
    <?php the_content(); ?>
    <?php //wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
  </div>
  <!-- .entry-content -->
    <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

</article>
<!-- #post --> 





						<div id="prenxtlink" class="group prenextLinkeer">
                        <?php
                        $prev_post = get_previous_post();
                        if (!empty( $prev_post )): ?>
                            <a class="prevPost" href="<?php echo get_the_permalink( $prev_post->ID )  ?>">
								<?php //if( $currentLanguage == "da-DK"): echo "Tidligere"; else: echo "Previous"; endif; ?>
								<span class="prevtitle"><?php _e( get_the_title( $prev_post->ID ) )?></span>
								<span class="default_prev_title"><?php _e('previous', 'pgflowteknik')?></span>
                            </a>
                        <?php endif ?>


                        <?php
                        $next_post = get_next_post();
                            if (!empty( $next_post )): ?>
                                <a class="nextPost" href="<?php echo get_the_permalink($next_post->ID)  ?>">
									<?php //if( $currentLanguage == "da-DK"): echo "Næste"; else: echo "Next"; endif; ?>
									<span class="nexttitle"><?php _e( get_the_title( $next_post->ID ) )?></span>
									<span class="default_next_title"><?php _e('next', 'pgflowteknik')?></span>
                                </a>
                            <?php endif ?>
						</div>