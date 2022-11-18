<?php 
/**
 * Sample Widgets Template
 */
$sample_image = siteorigin_widgets_get_attachment_image_src( $instance['sample_image'] );
?>

<div class="eteam-sample-widgets">

	<div class="eteam-sample-widgets__title">
		<h3><?php echo $instance['sample_title']; ?></h3>
	</div>

	<div class="eteam-sample-widgets__editor">
		<?php echo $instance['sample_editor']; ?>
	</div>

	<div class="eteam-sample-widgets__color">
		<?php echo $instance['sample_color']; ?>
	</div>

	<div class="eteam-sample-widgets__size">
		<?php echo $instance['sample_size']; ?>
	</div>

	<div class="eteam-sample-widgets__font">
		<?php echo $instance['sample_font']; ?>
	</div>

	<div class="eteam-sample-widgets__number">
		<?php echo $instance['sample_number']; ?>
	</div>

	<div class="eteam-sample-widgets__url">
		<?php echo sow_esc_url( $instance['sample_url'] ); ?>
	</div>

	<div class="eteam-sample-widgets__checkbox">
		<p><?php echo $instance['sample_checkbox']; ?></p>
	</div>

	<div class="eteam-sample-widgets__photo">
		<?php 
			echo wp_get_attachment_image( 
						$instance['sample_image'], 
						$attachment_size, 
						false, 
						array( 
							'title' => $instance['sample_title'],
							'class' => 'eteam-sample-widgets__image' ) 
						); 
		?>
	</div>

	<div class="eteam-sample-widgets__repeater">
		<?php foreach( $instance['sample_repeater'] as $sr ) : ?>
			<div class="eteam-sample-widgets__box">
				<h3><?php echo $sr['sample_repeater_field_title']; ?></h3>
				<p><?php echo $sr['sample_repeater_field_content']; ?></p>
			</div>
		<?php endforeach; ?>
	</div>

</div><!-- .eteam-sample-widgets -->
