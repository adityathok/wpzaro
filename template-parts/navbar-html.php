<?php
/**
 * Header Navbar HTML
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$code = wpzaro_theme_setting('wpzaro_html_header', '');
echo $code?$code:'';