<?php
/**
 * Widget Name: Eteam - Language Switcher
 * Widget ID: eteam-language-switcher
 * Author: Eteam.dk
 * Author URI: http://www.eteam.dk/
 */

class Eteam_Language_Switcher_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'eteam-language-switcher',
			esc_html__( 'Eteam - Language Switcher', 'kickass' ),
			array(
				'description' => esc_html__( 'Display customizable language switch.', 'kickass' )
			),
			array(),
			array(
				'heading_text' 	=> array(
					'type' 				=> 'text',
					'label' 			=> __('Heading Text', 'kickass'),
					'default' 		=> __('Language Support', 'kickass'),
				),

				'heading_icon' 	=> array(
					'type' 				=> 'media',
					'label' 			=> __('Icon file', 'kickass'),
					'library' 		=> 'image',
					'fallback' 		=> true,
				),

				'heading_caret' => array(
					'type' 				=> 'media',
					'label' 			=> __('Image file', 'kickass'),
					'library' 		=> 'image',
					'fallback' 		=> true,
				),

				'remove_current_language' => array(
					'type' 								=> 'select',
					'label' 							=> __('Remove Current Language', 'kickass'),
					'description' 				=> __( 'Remove current language on the list (default:True)', 'kickass' ),
					'default' 						=> '1',
					'options' 						=> array(
																			'0' => __('False', 'kickass'),
																			'1' => __('True', 'kickass'),
																		)
				),

				'show_flag' 		=> array(
					'type' 				=> 'select',
					'label' 			=> __('Show Flag', 'kickass'),
					'description' => __( 'Display language flag (default:True)', 'kickass' ),
					'default' 		=> '1',
					'options' 		=> array(
															'0' => __('False', 'kickass'),
															'1' => __('True', 'kickass'),
														)
				)
			),
			KICKASS_WIDGET_FOLDER_URI
		);
	}

	function initialize() {
		// styling
		$this->register_frontend_styles(
			array(
				array(
					'eteam-language-switcher',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/style.css',
					array(),
					KICKASS_VERSION
				),
			)
		);

		// scripts
		$this->register_frontend_scripts(
			array(
				array(
					'eteam-language-switcher',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/js/scripts.js',
					array( 'jquery' ),
					KICKASS_VERSION
				),
			)
		);
	}
}
siteorigin_widget_register( 'eteam-language-switcher', __FILE__, 'Eteam_Language_Switcher_Widget' );