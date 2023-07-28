<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$maincontainer      = wpzaro_theme_setting('wpzaro_container_type');
$shadow_type        = wpzaro_theme_setting('wpzaro_navbar_shadow', 'shadow-sm');
$container          = wpzaro_theme_setting('wpzaro_navbar_container_type', 'default');
$container          = $container == 'default' ? $maincontainer : $container;
$container_one      = $container == 'container-fixed' ? 'container' : '';
$container_two      = $container == 'container-fixed' ? 'container-fluid' : $container;
$navbar_parts       = wpzaro_theme_setting('wpzaro_navbar_parts', []);
$navbar_alignitems  = wpzaro_theme_setting('wpzaro_navbar_parts_alignitems', 'align-items-center');
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-light <?php echo $shadow_type; ?> <?php echo $container_one; ?>" aria-labelledby="main-nav-label">

    <h2 id="main-nav-label" class="screen-reader-text">
        <?php esc_html_e('Main Navigation', 'wpzaro'); ?>
    </h2>

    <div class="<?php echo esc_attr($container_two); ?>">

        <?php if ($navbar_parts) : ?>
            <div class="row navbar-parts w-100 justify-content-between <?php echo $navbar_alignitems; ?>">
                <?php foreach ($navbar_parts as $key => $part) : ?>
                    <?php if ($part['part']) : ?>

                        <?php
                        $column_l       = $part['column'] ? $part['column'] : 'col-md-4';
                        $column_l       = $column_l == 'hide' ? 'd-md-none' : $column_l;
                        $column_s       = $part['column_small'] ? $part['column_small'] : 'col-12';
                        $column_s       = $column_s == 'hide' ? 'd-none d-md-block' : $column_s;
                        $align          = $part['align'] ? $part['align'] : 'start';
                        ?>
                        <div class="col-navbar <?php echo $column_l . ' ' . $column_s; ?> text-md-<?php echo $align; ?>">

                            <?php if ($part['part'] == 'offcanvas') : ?>
                                <button class="navbar-toggler d-inline-block border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas<?php echo $key; ?>" aria-controls="navbarOffcanvas<?php echo $key; ?>" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'wpzaro'); ?>">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            <?php else : ?>
                                <?php get_template_part('templates-parts/navbar-part/navbar-' . $part['part']); ?>
                            <?php endif; ?>

                        </div>

                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->

<?php
if ($navbar_parts) :
    foreach ($navbar_parts as $key => $part) :
        if ($part['part'] == 'offcanvas') : ?>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarOffcanvas<?php echo $key; ?>">

                <div class="offcanvas-header justify-content-end">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <?php if (is_active_sidebar('headeroffcanvas')) :
                        dynamic_sidebar('headeroffcanvas');
                    endif; ?>
                </div>

            </div><!-- #navbarOffcanvas<?php echo $key; ?> -->
<?php
        endif;
    endforeach;
endif;
?>