<?php

/**
 * Check and setup theme's default settings
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!function_exists('wpzaro_setup_theme_default_settings')) {
	/**
	 * Store default theme settings in database.
	 */
	function wpzaro_setup_theme_default_settings()
	{
		$defaults = wpzaro_get_theme_default_settings();
		$settings = get_theme_mods();
		foreach ($defaults as $setting_id => $default_value) {
			// Check if setting is set, if not set it to its default value.
			if (!isset($settings[$setting_id])) {
				set_theme_mod($setting_id, $default_value);
			}
		}
	}
}

if (!function_exists('wpzaro_get_theme_default_settings')) {
	/**
	 * Retrieve default theme settings.
	 *
	 * @return array
	 */
	function wpzaro_get_theme_default_settings()
	{
		$defaults = array(
			'wpzaro_posts_index_style' => 'default',   // Latest blog posts style.
			'wpzaro_sidebar_position'  => 'right',     // Sidebar position.
			'wpzaro_container_type'    => 'container', // Container width.
		);

		/**
		 * Filters the default theme settings.
		 *
		 * @param array $defaults Array of default theme settings.
		 */
		return apply_filters('wpzaro_theme_default_settings', $defaults);
	}
}

if (!function_exists('wpzaro_theme_setting')) {
	/**
	 * Retrieve theme settings.
	 *
	 */
	function wpzaro_theme_setting($option_name = null, $default = null)
	{

		if (empty($option_name)) {
			return false;
		}

		if (empty($default) && class_exists('Kirki') && isset(Kirki::$all_fields[$option_name]) && isset(Kirki::$all_fields[$option_name]['default'])) {
			$default = Kirki::$all_fields[$option_name]['default'];
		}

		$option_value = get_theme_mod($option_name, $default);

		return $option_value;
	}
}
