<?php
/**
 * Template for Default Template
 */

get_header(); 

?>

<div id="primary" class="site-content">
  <div id="content" role="main">
    <?php while ( have_posts() ) : the_post(); ?>
    <?php get_template_part( 'template-parts/content', 'page' ); ?>
    <?php comments_template( '', true ); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
  <!-- #content --> 
</div>
<!-- #primary -->

<picture>
  <source media="(max-width: 360px)"
          srcset="http://localhost/parent_theme/wp-content/uploads/2020/10/tester-360x158.png 360w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-460x201.png 460w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-560x245.png 560w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-760x333.png 760w,">

  <source media="(max-width: 760px)"
          srcset="http://localhost/parent_theme/wp-content/uploads/2020/10/tester-460x201.png 460w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-560x245.png 560w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-760x333.png 760w,">

  <source media="(max-width: 800px)"
          srcset="http://localhost/parent_theme/wp-content/uploads/2020/10/tester-860x376.png 860w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-960x420.png 960w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester-1024x448.png 1024w,
                  http://localhost/parent_theme/wp-content/uploads/2020/10/tester.png 1100w,  ">
  <source srcset="http://localhost/parent_theme/wp-content/uploads/2020/10/tester.png">
  <img src="http://localhost/parent_theme/wp-content/uploads/2020/10/tester.png">
</picture>

<p>fsdfsdfds sd</p>

<?php get_sidebar(); ?>
<?php get_footer(); ?>





