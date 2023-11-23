<?php

/**
 * Header Navbar Secondary Menu
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$navbar_aligment    = wpzaro_theme_setting('wpzaro_secondarymenu_header_aligment', 'ms-auto');

wp_nav_menu(
    array(
        'theme_location'  => 'secondary',
        'container_class' => 'collapse navbar-collapse',
        'container_id'    => 'navbarNavSecondary',
        'menu_class'      => 'navbar-secondary-menu navbar-nav ' . $navbar_aligment,
        'fallback_cb'     => '',
        'menu_id'         => 'secondary-menu',
        'depth'           => 2,
        'walker'          => new wpzaro_WP_Bootstrap_Navwalker(),
    )
);
