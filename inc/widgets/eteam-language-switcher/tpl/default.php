<div class="eteam-language-switcher">
	<?php 
		// let process the instances
		$ls_results = pll_the_languages( array( 'raw' => 1 ) );

		// display heading
		echo '<div class="eteam-language-heading">';

			if ( $instance['heading_icon'] )
				echo '<span class="icon">' .wp_get_attachment_image( $instance['heading_icon'], 'full' ). '</span>';

			if ( $instance['heading_text'] )
				echo '<span class="title">' .$instance['heading_text']. '</span>';

			if ( $instance['heading_caret'] )
				echo '<span class="caret">' .wp_get_attachment_image( $instance['heading_caret'], 'full' ). '</span>';

		echo '</div>';
	
		// build the results
		echo '<ul class="eteam-language-list">'; // begin list
		 
			foreach( $ls_results as $lsr ) {

				if( $instance['remove_current_language'] == true && $lsr['current_lang'] ) 
					continue;

				// populate class
				$list_class	= sprintf( 'class="lang-slug_%1$s lang-id_%2$s"', $lsr['slug'], $lsr['id'] );
				
				// template
				echo "<li {$list_class}>";
					if( $instance['show_flag'] ) { echo '<img src="' .$lsr['flag']. '"/>'; } 
					echo '<a href="' .$lsr['url']. '">' .$lsr['name']. '</a>';
				echo '</li>';
			}
		echo '</ul>'; // end list
	?>
</div>