<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$navbar_parts = wpzaro_theme_setting('wpzaro_navbar_parts', []);
if($navbar_parts):
    foreach ($navbar_parts as $part) :
        get_template_part('templates-parts/navbar-' . $part);
    endforeach;
endif;
