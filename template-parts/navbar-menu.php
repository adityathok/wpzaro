<?php

/**
 * Header Navbar Menu
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$navbar_aligment    = wpzaro_theme_setting('wpzaro_menu_header_aligment', 'ms-auto');

wp_nav_menu(
    array(
        'theme_location'  => 'primary',
        'container_class' => 'd-flex justify-content-md-end flex-grow-1 pe-2',
        'container_id'    => 'primary-menu',
        'menu_class'      => 'navbar-nav ' . $navbar_aligment,
        'fallback_cb'     => '',
        'menu_id'         => 'main-menu',
        'depth'           => 2,
        'walker'          => new wpzaro_WP_Bootstrap_Navwalker(),
    )
);

?>