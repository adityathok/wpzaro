<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$maincontainer      = wpzaro_theme_setting('wpzaro_container_type');
$sortable_layout    = wpzaro_theme_setting('wpzaro_navbar_sortable_layout', array('logo', 'menu', 'search'));
$shadow_type        = wpzaro_theme_setting('wpzaro_navbar_shadow', 'shadow-sm');
$container          = wpzaro_theme_setting('wpzaro_navbar_container_type', 'default');
$container          = $container == 'default' ? $maincontainer : $container;
$container_one        = $container == 'container-fixed' ? 'container' : '';
$container_two        = $container == 'container-fixed' ? 'container-fluid' : $container;
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-light <?php echo $shadow_type; ?> <?php echo $container_one; ?>" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e('Main Navigation', 'wpzaro'); ?>
    </h2>

    <div class="<?php echo esc_attr($container_two); ?>">

        <?php if ($sortable_layout) {

            foreach ($sortable_layout as $layout) :

                get_template_part('templates-parts/navbar-part/navbar-' . $layout);

            endforeach;
        } ?>

    </div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->