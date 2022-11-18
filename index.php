<?php
/**
 * Template for Default Template
 */

get_header(); ?>

<div id="primary" class="site-content">
  <div id="content" role="main">


	<?php if ( have_posts() ) : ?>
		<div id="dito">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="item">
        			<h1><a href="<?php the_permalink() ?>"><?php the_title()?></a></h1>
    			</div>
			<?php endwhile; ?>
        </div>
			<?php 
			// if (function_exists("pagination")) {
            //     pagination($additional_loop->max_num_pages);
            // } 
			?>

			<?php 
            global $wp_query; // you can remove this line if everything works for you
                        
            // don't display the button if there are not enough posts
            if (  $wp_query->max_num_pages > 1 )
                echo '<div class="pagination group"><div class="misha_loadmore">show more</div></div>'; // you can use <a> as well
            ?>			

	<?php else : ?>

	<?php endif; ?>








  </div>
  <!-- #content --> 
</div>
<!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>