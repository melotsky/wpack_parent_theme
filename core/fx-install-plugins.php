<?php 
if ( !defined('ABSPATH')) exit;

/**
 * Install plugins
 */

add_action( 'tgmpa_register', 'fx_lang_register_required_plugins' );

function fx_lang_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		// array(
		// 	'name'               => 'TGM Example Plugin', // The plugin name.
		// 	'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
		// 	'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
		// 	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		// 	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
		// 	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		// 	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		// 	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		// 	'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		// ),

		// This is an example of how to include a plugin from an arbitrary external source in your theme.
		// array(
		// 	'name'         => 'TGM New Media Plugin', // The plugin name.
		// 	'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
		// 	'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
		// 	'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		// 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		// ),

		// This is an example of how to include a plugin from a GitHub repository in your theme.
		// This presumes that the plugin code is based in the root of the GitHub repository
		// and not in a subdirectory ('/src') of the repository.
		// array(
		// 	'name'      => 'Adminbar Link Comments to Pending',
		// 	'slug'      => 'adminbar-link-comments-to-pending',
		// 	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		// ),

        // This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Admin Menu Editor (optional)',
			'slug'      => 'admin-menu-editor',
			'required'  => false,
        ),
		array(
			'name'      => 'Autoptimize',
			'slug'      => 'autoptimize',
			'required'  => false,
        ),
		array(
			'name'      => 'Async JavaScript',
			'slug'      => 'async-javascript',
			'required'  => false,
        ),
		array(
			'name'      => 'Autoptimize Criticalcss (optional)',
			'slug'      => 'autoptimize-criticalcss',
			'required'  => false,
        ),
        array(
			'name'      => 'Better Search Replace (optional)',
			'slug'      => 'better-search-replace',
			'required'  => false,
        ),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
        ),
		array(
			'name'      => 'Contact Form 7 Conditional Fields (optional)',
			'slug'      => 'cf7-conditional-fields',
			'required'  => false,
        ),
        array(
			'name'      => 'Disable Author Archives (optional)',
			'slug'      => 'disable-author-archives',
			'required'  => false,
        ),
        array(
			'name'      => 'Disable Comments (optional)',
			'slug'      => 'disable-comments',
			'required'  => false,
        ),
        array(
			'name'      => 'Duplicate Post (optional)',
			'slug'      => 'duplicate-post',
			'required'  => false,
        ),
        array(
			'name'      => 'Editor Blocks for Gutenberg',
			'slug'      => 'editor-blocks',
			'required'  => false,
        ),
        array(
			'name'      => 'EverlightBox (optional)',
			'slug'      => 'everlightbox',
			'required'  => false,
        ),
        array(
			'name'      => 'Email Encoder - Protect Email Addresses',
			'slug'      => 'email-encoder-bundle',
			'required'  => false,
        ),
        array(
			'name'      => 'Google Tag Manager for WordPress',
			'slug'      => 'duracelltomi-google-tag-manager',
			'required'  => false,
        ),
        array(
			'name'      => 'MainWP Child (optional)',
			'slug'      => 'mainwp-child',
			'required'  => false,
        ),
        array(
			'name'      => 'Polylang (optional)',
			'slug'      => 'polylang',
			'required'  => false,
        ),
        array(
			'name'      => 'Page scroll to id (optional)',
			'slug'      => 'page-scroll-to-id',
			'required'  => false,
        ),
        array(
			'name'      => 'Open External Links in a New Window (optional)',
			'slug'      => 'open-external-links-in-a-new-window',
			'required'  => false,
        ),
        array(
			'name'      => 'Really Simple SSL',
			'slug'      => 'really-simple-ssl',
			'required'  => false,
        ),
        array(
			'name'      => 'Regenerate Thumbnails (optional)',
			'slug'      => 'regenerate-thumbnails',
			'required'  => false,
        ),
        array(
			'name'      => 'Remove Yoast SEO Comments (optional)',
			'slug'      => 'remove-yoast-seo-comments',
			'required'  => false,
        ),
        array(
			'name'      => 'Responsive Video Light (optional)',
			'slug'      => 'responsive-video-light',
			'required'  => false,
        ),
        array(
			'name'      => 'Simple WebP (optional)',
			'slug'      => 'webp-simple',
			'required'  => false,
        ),
        array(
			'name'      => 'WebP Express (RECOMMENDED!)',
			'slug'      => 'webp-express',
			'required'  => false,
        ),
        array(
			'name'      => 'Smush It',
			'slug'      => 'wp-smushit',
			'required'  => false,
        ),
        array(
			'name'      => 'Turn Off REST API',
			'slug'      => 'turn-off-rest-api',
			'required'  => false,
        ),
        array(
			'name'      => 'Video PopUp (optional)',
			'slug'      => 'video-popup',
			'required'  => false,
        ),
        array(
			'name'      => 'Webcraftic Local Google Analytics (optional)',
			'slug'      => 'simple-google-analytics',
			'required'  => false,
        ),
		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		array(
			'name'        => 'Yoast SEO',
			'slug'        => 'wordpress-seo',
			//'is_callable' => 'wpseo_init',
        ),
		array(
			'name'        => 'RankMath SEO',
			'slug'        => 'seo-by-rank-math',
			//'is_callable' => 'wpseo_init',
		),
		array(
			'name'        => 'Debug Bar',
			'slug'        => 'debug-bar',
			//'is_callable' => 'wpseo_init',
		),
		array(
			'name'        => 'Debug Bar Actions and Filters Addon',
			'slug'        => 'debug-bar-actions-and-filters-addon',
			//'is_callable' => 'wpseo_init',
		),
		array(
			'name'        => 'Query Monitor',
			'slug'        => 'query-monitor',
			//'is_callable' => 'wpseo_init',
		),
		array(
			'name'        => 'Schema - All In One Schema Rich Snippets',
			'slug'        => 'all-in-one-schemaorg-rich-snippets',
			//'is_callable' => 'wpseo_init',
		),
		array(
			'name'        => 'Pretty Links – Link Management, Branding, Tracking & Sharing Plugin',
			'slug'        => 'pretty-link',
			//'is_callable' => 'wpseo_init',
		)
		
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'fx_lang',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'fx_lang' ),
			'menu_title'                      => __( 'Install Plugins', 'fx_lang' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'fx_lang' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'fx_lang' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'fx_lang' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'fx_lang'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'fx_lang'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'fx_lang'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'fx_lang'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'fx_lang'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'fx_lang'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'fx_lang'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'fx_lang'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'fx_lang'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'fx_lang' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'fx_lang' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'fx_lang' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'fx_lang' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'fx_lang' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'fx_lang' ),
			'dismiss'                         => __( 'Dismiss this notice', 'fx_lang' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'fx_lang' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'fx_lang' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}

