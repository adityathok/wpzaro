<?php

/**
 * wpzaro functions and definitions
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// wpzaro's includes directory.
$wpzaro_inc_dir = 'inc';

// Array of files to include.
$wpzaro_includes = array(
	'/metabox-page.php',					// Custom Metabox for pages.
	'/kirki.php',                      		// Customizer additions use Kirki.
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/template-hooks.php',                  // template hooks.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/builder-parts.php',                   // Load builder layout from hooks.
	'/functions/class-wp-bootstrap-navwalker.php',		// Load function custom WordPress nav walker.
	'/functions/wpzaro-ratio-thumbnail.php',			// Load function generate classes bootstrap.
);

// Load WooCommerce functions if WooCommerce is activated.
if (class_exists('WooCommerce')) {
	$wpzaro_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if (class_exists('Jetpack')) {
	$wpzaro_includes[] = '/jetpack.php';
}

// Include files.
foreach ($wpzaro_includes as $file) {
	require_once get_theme_file_path($wpzaro_inc_dir . $file);
}
