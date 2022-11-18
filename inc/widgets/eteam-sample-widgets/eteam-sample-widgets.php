<?php
/**
 * Widget Name: Eteam - Sample Widgets
 * Widget ID: eteam-sample-widgets
 * Author: Eteam.dk
 * Author URI: http://eteam.dk
 */

class Eteam_Sample_Widgets_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'eteam-sample-widgets',
			esc_html__( 'Eteam - Sample Widgets', 'kickass' ),
			array(
				'description' => esc_html__( 'Sample widgets only.', 'kickass' )
			),
			array(),
			array(
				'sample_title' => array(
					'type' 	=> 'text',
					'label' => esc_html__( 'Sample Title', 'kickass' ),
				),
				'sample_editor' => array(
					'type' 	=> 'tinymce',
					'label' => esc_html__( 'Sample Editor', 'kickass' ),
				),
				'sample_color' => array(
						'type' => 'color',
						'label' => __('Sample Color', 'kickass'),
				),
				'sample_number' => array(
						'type' => 'number',
						'label' => __('Sample Number', 'kickass'),
				),
				'sample_size' => array(
						'type' => 'measurement',
						'label' => __('Sample Size', 'kickass')
				),
				'sample_font' => array(
						'type' => 'font',
						'label' => __( 'Sample Font', 'kickass' ),
						'default' => 'default'
					),
				'sample_url' => array(
					'type' => 'link',
					'label' => __('Sample URL', 'kickass'),
				),
				'sample_checkbox' => array(
					'type' => 'checkbox',
					'default' => false,
					'label' => __('I\'m sample checkbox', 'kickass'),
				),
				'sample_image' => array(
					'type' => 'media',
					'label' => __( 'Sample Image file', 'kickass' ),
					'library' => 'image',
					'fallback' => true,
				),
				'sample_repeater' => array(
					'type' => 'repeater',
			        'label' => __( 'Sample Repeater' , 'kickass' ),
			        'item_name'  => __( 'Single Item', 'kickass' ),
							'item_label' => array(
								'selector'     => "[name*='sample_repeater_field_title']",
								'update_event' => 'change',
								'value_method' => 'val'
							),
			        'fields' => array(
								'sample_repeater_field_title' => array(
									'type' 	=> 'text',
									'label' => esc_html__( 'Repeater Field Title' )
								),
								'sample_repeater_field_content' => array(
									'type' 	=> 'tinymce',
									'label' => esc_html__( 'Repeater Field Content' ),
									'row' => 20
								),
							)
				)
			),
			THEME_NAME_WIDGET_FOLDER_URI
		);
	}

	function initialize() {
		$this->register_frontend_styles(
			array(
				array(
					'eteam-sample-widgets-style',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/css/style.css',
					array(),
					KICKASS_VERSION
				),
				array(
					'eteam-sample-widgets-fonts',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . '/fonts/fonts.css',
					array(),
					KICKASS_VERSION
				),
			)
		);

		$this->register_frontend_scripts(
			array(
				array(
					'eteam-sample-widgets-script',
					THEME_NAME_WIDGET_FOLDER_URI . basename( dirname( __FILE__ ) ) . 'js/script.js',
					array( 'jquery' ),
					KICKASS_VERSION
				)
			)
		);
	}
}
siteorigin_widget_register( 'eteam-sample-widgets', __FILE__, 'Eteam_Sample_Widgets_Widget' );
