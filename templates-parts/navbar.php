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
                            <?php elseif ($part['part'] == 'darkmode') : ?>

                                <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
                                    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                    </symbol>
                                    <symbol id="sun-fill" viewBox="0 0 16 16">
                                        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                    </symbol>
                                </svg>

                                <?php
                                $cookie_name     = "colormode";
                                $colormode        = isset($_COOKIE[$cookie_name]) ? $_COOKIE[$cookie_name] : 'light';
                                $colormode        = $colormode == 'dark' ? 'dark' : 'light';
                                ?>

                                <span class="btn btn-sm btn-link btn-darkmode">
                                    <svg class="bi my-1 theme-icon-active" fill="currentColor" width="20" height="20">
                                        <use href="#<?php echo $colormode == 'light' ? 'sun-fill' : 'moon-stars-fill'; ?>"></use>
                                    </svg>
                                </span>

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