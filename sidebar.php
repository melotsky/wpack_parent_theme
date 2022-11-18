<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kick_Ass_Theme
 */

if ( ! is_active_sidebar( 'main-sidebar' ) ) {
	//return;
}
?>

<aside id="secondary" class="widget-area group" role="complementary">
<?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
<?php endif; ?>
</aside><!-- #secondary -->
