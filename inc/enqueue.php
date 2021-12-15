<?php
/**
 * wpzaro enqueue scripts
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'wpzaro_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function wpzaro_scripts() {
		// Get the theme data.
		$the_theme         = wp_get_theme();
		$theme_version     = $the_theme->get( 'Version' );
		$suffix            = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		// Grab asset urls.
		$theme_styles  = "/css/theme{$suffix}.css";
		$theme_scripts = "/js/theme{$suffix}.js";

		$css_version = $theme_version . '.' . filemtime( get_template_directory() . $theme_styles );
		wp_enqueue_style( 'wpzaro-styles', get_template_directory_uri() . $theme_styles, array(), $css_version );

		wp_enqueue_script( 'jquery' );

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . $theme_scripts );
		wp_enqueue_script( 'wpzaro-scripts', get_template_directory_uri() . $theme_scripts, array(), $js_version, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_localize_script(
			'wpzaro-scripts',
			'themepath',
			array(
				'homeUrl'        => get_home_url(),
				'ajaxUrl'        => admin_url('admin-ajax.php'),
				'ajaxPost'       => admin_url('admin-post.php'),
				'restUrl'        => rest_url(),
				'restUrlProduct' => rest_url('wp/v2/product'),
				'shopName'       => sanitize_title_with_dashes(sanitize_title_with_dashes(get_bloginfo('name'))),
				'inWishlist'     => esc_html__("Already in wishlist","wpzaro"),
				'removeWishlist' => esc_html__("Remove from wishlist","wpzaro"),
				'buttonText'     => esc_html__("Details","wpzaro"),
				'error'          => esc_html__("Something went wrong, could not add to wishlist","wpzaro"),
				'noWishlist'     => esc_html__("No wishlist found","wpzaro"),
			)
		);

	}
} // End of if function_exists( 'wpzaro_scripts' ).

add_action( 'wp_enqueue_scripts', 'wpzaro_scripts' );
