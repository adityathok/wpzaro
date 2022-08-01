<?php
/**
 * wpzaro Theme Customizer
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if (class_exists('Kirki'))
return false;

/**
 * Add support after_setup_theme for Customizer custom-background.
 */
add_action( 'after_setup_theme', 'wpzaro_setup_custom_background' );

if ( ! function_exists( 'wpzaro_setup_custom_background' ) ) {

	function wpzaro_setup_custom_background() {

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'wpzaro_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

	}
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( ! function_exists( 'wpzaro_customize_register' ) ) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function wpzaro_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	}
}
add_action( 'customize_register', 'wpzaro_customize_register' );

if ( ! function_exists( 'wpzaro_theme_customize_register' ) ) {
	/**
	 * Register individual settings through customizer's API.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer reference.
	 */
	function wpzaro_theme_customize_register( $wp_customize ) {

		// Theme layout settings.
		$wp_customize->add_section(
			'wpzaro_theme_layout_options',
			array(
				'title'       => __( 'Theme Layout Settings', 'wpzaro' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Container width and sidebar defaults', 'wpzaro' ),
				'priority'    => apply_filters( 'wpzaro_theme_layout_options_priority', 160 ),
			)
		);
		
		// Theme typography settings.
		$wp_customize->add_section(
			'wpzaro_theme_typography_options',
			array(
				'title'       => __( 'Typography Settings', 'wpzaro' ),
				'capability'  => 'edit_theme_options',
				'description' => __( 'Setting Global font', 'wpzaro' ),
				'priority'    => apply_filters( 'wpzaro_theme_layout_options_priority', 160 ),
			)
		);

		/**
		 * Select sanitization function
		 *
		 * @param string               $input   Slug to sanitize.
		 * @param WP_Customize_Setting $setting Setting instance.
		 * @return string Sanitized slug if it is a valid choice; otherwise, the setting default.
		 */
		function wpzaro_theme_slug_sanitize_select( $input, $setting ) {

			// Ensure input is a slug (lowercase alphanumeric characters, dashes and underscores are allowed only).
			$input = sanitize_key( $input );

			// Get the list of possible select options.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

		}

		$wp_customize->add_setting(
			'wpzaro_bootstrap_version',
			array(
				'default'           => 'bootstrap5',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'wpzaro_container_type',
			array(
				'default'           => 'container',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'wpzaro_theme_slug_sanitize_select',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_container_type',
				array(
					'label'       => __( 'Container Type', 'wpzaro' ),
					'description' => __( 'Choose between Theme container and container-fluid', 'wpzaro' ),
					'section'     => 'wpzaro_theme_layout_options',
					'settings'    => 'wpzaro_container_type',
					'type'        => 'select',
					'choices'     => array(
						'container'       => __( 'Fixed width container', 'wpzaro' ),
						'container-fluid' => __( 'Full width container', 'wpzaro' ),
					),
					'priority'    => apply_filters( 'wpzaro_container_type_priority', 10 ),
				)
			)
		);
		
		$wp_customize->add_setting(
			'wpzaro_container_width',
			array(
				'default'           => '1200',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_container_width',
				array(
					'label'       => __( 'Container width', 'wpzaro' ),
					'description' => __( 'Override Theme Container.', 'wpzaro' ),
					'section'     => 'wpzaro_theme_layout_options',
					'settings'    => 'wpzaro_container_width',
					'type'        => 'number',
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_setting(
			'wpzaro_navbar_type',
			array(
				'default'           => 'collapse',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_navbar_type',
				array(
					'label'             => __( 'Responsive Navigation Type', 'wpzaro' ),
					'description'       => __(
						'Choose between an expanding and collapsing navbar or an offcanvas drawer.',
						'wpzaro'
					),
					'section'           => 'wpzaro_theme_layout_options',
					'settings'          => 'wpzaro_navbar_type',
					'type'              => 'select',
					'sanitize_callback' => 'wpzaro_theme_slug_sanitize_select',
					'choices'           => array(
						'collapse'  => __( 'Collapse', 'wpzaro' ),
						'offcanvas' => __( 'Offcanvas', 'wpzaro' ),
					),
					'priority'          => apply_filters( 'wpzaro_navbar_type_priority', 20 ),
				)
			)
		);

		$wp_customize->add_setting(
			'wpzaro_sidebar_position',
			array(
				'default'           => 'right',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_sidebar_position',
				array(
					'label'             => __( 'Sidebar Positioning', 'wpzaro' ),
					'description'       => __(
						'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.',
						'wpzaro'
					),
					'section'           => 'wpzaro_theme_layout_options',
					'settings'          => 'wpzaro_sidebar_position',
					'type'              => 'select',
					'sanitize_callback' => 'wpzaro_theme_slug_sanitize_select',
					'choices'           => array(
						'right' => __( 'Right sidebar', 'wpzaro' ),
						'left'  => __( 'Left sidebar', 'wpzaro' ),
						'both'  => __( 'Left & Right sidebars', 'wpzaro' ),
						'none'  => __( 'No sidebar', 'wpzaro' ),
					),
					'priority'          => apply_filters( 'wpzaro_sidebar_position_priority', 20 ),
				)
			)
		);

		$wp_customize->add_setting(
			'wpzaro_site_info_override',
			array(
				'default'           => 'Copyright © {year} {site_title}. All rights reserved.',
				'type'              => 'theme_mod',
				'sanitize_callback' => 'wp_kses_post',
				'capability'        => 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_site_info_override',
				array(
					'label'       => __( 'Footer Site Info', 'wpzaro' ),
					'description' => __( 'Override theme site info located at the footer of the page.use {year} {site_title}', 'wpzaro' ),
					'section'     => 'wpzaro_theme_layout_options',
					'settings'    => 'wpzaro_site_info_override',
					'type'        => 'textarea',
					'priority'    => 20,
				)
			)
		);

		$wp_customize->add_setting(
			'wpzaro_google_font_link_embed',
			array(
				'default'           => "https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap",
				'type'              => 'theme_mod',
				'sanitize_callback' => 'wp_kses_post',
				'capability'        => 'edit_theme_options',
			)
		);		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_google_font_link_embed',
				array(
					'label'       => __( 'Google font link', 'wpzaro' ),
					'description' => __( 'Add link embed google font', 'wpzaro' ),
					'section'     => 'wpzaro_theme_typography_options',
					'settings'    => 'wpzaro_google_font_link_embed',
					'type'        => 'textarea',
					'priority'    => 20,
				)
			)
		);
		$wp_customize->add_setting(
			'wpzaro_google_font_body_css_rule',
			array(
				'default'           => "font-family: 'Open Sans', sans-serif;",
				'type'              => 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
				'capability'        => 'edit_theme_options',
			)
		);		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'wpzaro_google_font_body_css_rule',
				array(
					'label'       => __( 'Body CSS rules', 'wpzaro' ),
					'description' => __( 'Add CSS rules font family to body.', 'wpzaro' ),
					'section'     => 'wpzaro_theme_typography_options',
					'settings'    => 'wpzaro_google_font_body_css_rule',
					'type'        => 'text',
					'priority'    => 20,
				)
			)
		);


	}
} // End of if function_exists( 'wpzaro_theme_customize_register' ).
add_action( 'customize_register', 'wpzaro_theme_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
if ( ! function_exists( 'wpzaro_customize_preview_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function wpzaro_customize_preview_js() {
		wp_enqueue_script(
			'wpzaro_customizer',
			get_template_directory_uri() . '/js/customizer.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_preview_init', 'wpzaro_customize_preview_js' );

/**
 * Loads javascript for conditionally showing customizer controls.
 */
if ( ! function_exists( 'wpzaro_customize_controls_js' ) ) {
	/**
	 * Setup JS integration for live previewing.
	 */
	function wpzaro_customize_controls_js() {
		wp_enqueue_script(
			'wpzaro_customizer',
			get_template_directory_uri() . '/js/customizer-controls.js',
			array( 'customize-preview' ),
			'20130508',
			true
		);
	}
}
add_action( 'customize_controls_enqueue_scripts', 'wpzaro_customize_controls_js' );


if ( ! function_exists( 'wpzaro_default_navbar_type' ) ) {
	/**
	 * Overrides the responsive navbar type for Bootstrap 4
	 *
	 * @param string $current_mod
	 * @return string
	 */
	function wpzaro_default_navbar_type( $current_mod ) {

		if ( 'bootstrap5' !== wpzaro_theme_setting( 'wpzaro_bootstrap_version' ) ) {
			$current_mod = 'collapse';
		}

		return $current_mod;
	}
}
add_filter( 'theme_mod_wpzaro_navbar_type', 'wpzaro_default_navbar_type', 20 );


if ( ! function_exists( 'wpzaro_customize_generate_css' ) ) {
	/**
	* This will generate a line of CSS for use in header output. If the setting
	* ($mod_name) has no defined value, the CSS will not be output.
	* 
	* @uses wpzaro_theme_setting()
	* @param string $selector CSS selector
	* @param string $style The name of the CSS *property* to modify
	* @param string $mod_name The name of the 'theme_mod' option to fetch
	* @param string $prefix Optional. Anything that needs to be output before the CSS property
	* @param string $postfix Optional. Anything that needs to be output after the CSS property
	* @param bool $echo Optional. Whether to print directly to the page (default: true).
	* @return string Returns a single line of CSS with selectors and a property.
	* @since WPzaro 1.0
	*/
	function wpzaro_customize_generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
		$return = '';
		$mod = wpzaro_theme_setting($mod_name);
		if ( ! empty( $mod ) ) {
			$return = sprintf('%s { %s:%s; }',
			$selector,
			$style,
			$prefix.$mod.$postfix
			);
			if ( $echo ) {
				echo $return;
			}
		}
		return $return;
	}
}


if ( ! function_exists( 'wpzaro_customize_header_output' ) ) {
	function wpzaro_customize_header_output() {
		/**
		* This will output the custom WordPress settings to the live theme's WP head.
		* 
		* Used by hook: 'wp_head'
		* 
		* @see add_action('wp_head',$func)
		* @since MyTheme 1.0
		*/

		$gfont_link		= wpzaro_theme_setting( 'wpzaro_google_font_link_embed' );
		$gfont_css_rule	= wpzaro_theme_setting( 'wpzaro_google_font_body_css_rule' );
		if($gfont_link) {
			echo '
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="'.$gfont_link.'" rel="stylesheet">
			';
		}
		?>
		<!--wpzaro Customizer CSS--> 
		<style type="text/css">
			 <?php wpzaro_customize_generate_css('.container', 'max-width', 'wpzaro_container_width','','px'); ?>
			 <?php if($gfont_link && $gfont_css_rule) { echo 'body {'.$gfont_css_rule.'}'; } ?>
		</style> 
		<!--/wpzaro Customizer CSS-->
		<?php
	}
	add_action( 'wp_head' , 'wpzaro_customize_header_output');
}