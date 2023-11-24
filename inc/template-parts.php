<?php
/**
 * wpzaro functions builder layouts
 *
 * @package wpzaro
 */

//opened header layout
if (!function_exists('wpzaro_header_layout_open')) {
    add_action('wpzaro_header_open', 'wpzaro_header_layout_open');
    function wpzaro_header_layout_open()
    {
        
        $overlay        = wpzaro_theme_setting('wpzaro_navbar_overlay', 'disable');
        $sticky_type    = wpzaro_theme_setting('wpzaro_navbar_sticky', 'sticky-none');
        if (is_page()) {
            $overlay_page   = get_post_meta(get_the_ID(), 'wpzaro_navbar_overlay', true);
            $overlay        = $overlay_page ? $overlay_page : $overlay;
        }
        $sticky_class   = $sticky_type == 'sticky-top' ? 'sticky-top wrapper-navbar-sticky' : 'sticky-none';

        if ($overlay == 'enable' && $sticky_type == 'sticky-top') {
            $sticky_class = 'wrapper-navbar-overlay fixed-top wrapper-navbar-sticky';
        } else if ($overlay == 'enable' && $sticky_type == 'sticky-none') {
            $sticky_class = 'wrapper-navbar-overlay position-absolute top-0 start-0 w-100 z-3';
        }
        ?>

        <div class="skippy visually-hidden-focusable overflow-hidden">
            <div class="container-xl">
                <a class="d-inline-flex p-2 m-1" href="#content"><?php esc_html_e('Skip to content', 'wpzaro'); ?></a>    
            </div>
        </div>

        <!-- ******************* The Navbar Area ******************* -->
        <header id="wrapper-navbar" class="<?php echo $sticky_class; ?>">
        <?php
    }
}

///open navigation header
if (!function_exists('wpzaro_header_navigation_open')) {
    add_action('wpzaro_header_open', 'wpzaro_header_navigation_open');
    function wpzaro_header_navigation_open()
    {        
        $class = 'bg-body';
        $shadow     = wpzaro_theme_setting('wpzaro_navbar_shadow', 'shadow-sm');
        if($shadow) {
            $class .= ' '.$shadow;
        }
        $container  = wpzaro_theme_setting('wpzaro_navbar_container_type', 'default');
        if($container == 'default'){
            $container = wpzaro_theme_setting('wpzaro_container_type', 'container');
        }
        ?>
        <nav id="main-nav" class="navbar navbar-expand-lg <?php echo $class; ?>" aria-label="Main navigation">
            <div class="flex-wrap flex-lg-nowrap <?php echo $container; ?>">
        <?php
    }
}

///content header navbar
if (!function_exists('wpzaro_header_navbar')) {
    add_action('wpzaro_header', 'wpzaro_header_navbar');
    function wpzaro_header_navbar()
    {
        get_template_part('template-parts/navbar');
    }
}

///closed header layout
if (!function_exists('wpzaro_header_navigation_close')) {
    add_action('wpzaro_header_close', 'wpzaro_header_navigation_close');
    function wpzaro_header_navigation_close()
    {
    ?>
            </div>
        </nav>
    <?php
    }
}

///closed header layout
if (!function_exists('wpzaro_header_layout_close')) {
    add_action('wpzaro_header_close', 'wpzaro_header_layout_close');
    function wpzaro_header_layout_close()
    {
    ?>
        </header>
        <!-- #wrapper-navbar end -->
    <?php
    }
}

//opened footer layout
if (!function_exists('wpzaro_footer_layout_open')) {
    add_action('wpzaro_footer_open', 'wpzaro_footer_layout_open');
    function wpzaro_footer_layout_open()
    {
    ?>

        <!-- ******************* The Footer Area ******************* -->
        <footer class="wrapper p-0" id="wrapper-footer">

        <?php
    }
}

///closed footer layout
if (!function_exists('wpzaro_footer_layout_close')) {
    add_action('wpzaro_footer_close', 'wpzaro_footer_layout_close');
    function wpzaro_footer_layout_close()
    {
        ?>

        </footer> <!-- #wrapper-footer end -->

    <?php
    }
}

///add footer site info
if (!function_exists('wpzaro_footer_content')) {
    add_action('wpzaro_footer', 'wpzaro_footer_content');
    function wpzaro_footer_content()
    {
        $maincontainer  = wpzaro_theme_setting('wpzaro_container_type');
        $container      = wpzaro_theme_setting('wpzaro_footersiteinfo_container_type', 'default');
        $container      = $container == 'default' ? $maincontainer : $container;
        $container_one  = $container == 'container-fixed' ? 'container' : 'wrapper';
        $container_two  = $container == 'container-fixed' ? 'p-3' : $container;
        ?>

            <?php get_template_part('template-parts/sidebar/sidebar', 'footerfull'); ?>

            <div class="<?php echo esc_attr($container_one) . ' type-' . esc_attr($container); ?>" id="wrapper-footer-site-info" role="footer">

                <div class="<?php echo esc_attr($container_two); ?>">

                    <div class="site-info">

                        <?php wpzaro_site_info(); ?>

                    </div><!-- .site-info -->

                </div><!-- .container end -->

            </div><!-- #wrapper-footer-site-info end -->

        <?php
    }
}

if (!function_exists('wpzaro_header_footer_bbrender') && class_exists('FLThemeBuilderLayoutData')) {
    /**
     * Render Header or Footer Beaver Builder Themer
     */
    add_action('wp', 'wpzaro_header_footer_bbrender');
    function wpzaro_header_footer_bbrender()
    {
        // Get the header ID.
        $header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();
        // If we have a header, remove the theme header and hook in Beaver Themer'
        if (!empty($header_ids)) {
            remove_action('wpzaro_header_open', 'wpzaro_header_layout_open');
            remove_action('wpzaro_header_open', 'wpzaro_header_navigation_open');
            remove_action('wpzaro_header', 'wpzaro_header_navbar');
            remove_action('wpzaro_header_close', 'wpzaro_header_layout_close');
            remove_action('wpzaro_header_close', 'wpzaro_header_navigation_close');
            add_action('wpzaro_header', 'FLThemeBuilderLayoutRenderer::render_header');
        }

        // Get the footer ID.
        $footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

        // If we have a footer, remove the theme footer and hook in Beaver Themer.
        if (!empty($footer_ids)) {
            remove_action('wpzaro_footer_open', 'wpzaro_footer_layout_open');
            remove_action('wpzaro_footer', 'wpzaro_footer_content');
            remove_action('wpzaro_footer_close', 'wpzaro_footer_layout_close');
            add_action('wpzaro_footer', 'FLThemeBuilderLayoutRenderer::render_footer');
        }
    }
}

///sidebar left
if (!function_exists('wpzaro_sidebar_left_check')) {
    add_action('wpzaro_sidebar_left', 'wpzaro_sidebar_left_check');
    function wpzaro_sidebar_left_check()
    {
        $sidebar_pos = wpzaro_theme_setting('wpzaro_sidebar_position');

        if ('left' === $sidebar_pos || 'both' === $sidebar_pos) {
            get_template_part('template-parts/sidebar/sidebar', 'left');
        }
    ?>

        <div class="col-md content-area" id="primary">

        <?php
    }
}

///sidebar right
if (!function_exists('wpzaro_sidebar_right_check')) {
    add_action('wpzaro_sidebar_right', 'wpzaro_sidebar_right_check');
    function wpzaro_sidebar_right_check()
    {
        $sidebar_pos = wpzaro_theme_setting('wpzaro_sidebar_position');
        ?>

        </div><!-- #closing the primary container from wpzaro_sidebar_left_check() -->

        <?php

        if ('right' === $sidebar_pos || 'both' === $sidebar_pos) {
            get_template_part('template-parts/sidebar/sidebar', 'right');
        }
    }
}

///scroll to top
if (!function_exists('wpzaro_footer_scrolltotop')) {
    add_action('wpzaro_footer_after', 'wpzaro_footer_scrolltotop');
    function wpzaro_footer_scrolltotop()
    {
        $enable = wpzaro_theme_setting('wpzaro_scrolltotop_enable', 'on');
        if ($enable) :
        ?>
            <div class="floating-footer z-1 position-fixed bottom-0 end-0 me-2 mb-2 footer-scrolltotop" style="display:none;">
                <div class="btn btn-dark rounded-0 border-0 scroll-to-top">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-up" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708l6-6z" />
                    </svg>
                </div>
            </div>
        <?php
        endif;
    }
}

///floating whatsapp
if (!function_exists('wpzaro_footer_floatwhatsapp')) {
    add_action('wpzaro_footer_after', 'wpzaro_footer_floatwhatsapp');
    function wpzaro_footer_floatwhatsapp()
    {
        $whatsapp_number        = wpzaro_theme_setting('wpzaro_floatwhatsapp_number', '');
        $whatsapp_text          = wpzaro_theme_setting('wpzaro_floatwhatsapp_text', 'Whatsapp Us');
        $whatsapp_message       = wpzaro_theme_setting('wpzaro_floatwhatsapp_message', 'Halo..');
        $whatsapp_enable        = wpzaro_theme_setting('wpzaro_floatwhatsapp_enable', false);
        // replace all except numbers
        $whatsapp_number        = $whatsapp_number ? preg_replace('/[^0-9]/', '', $whatsapp_number) : $whatsapp_number;
        // replace 0 with 62 if first digit is 0
        if (substr($whatsapp_number, 0, 1) == 0) {
            $whatsapp_number    = substr_replace($whatsapp_number, '62', 0, 1);
        }
        if ($whatsapp_enable) {
        ?>
            <div class="floating-footer z-1 footer-floatwhatsapp position-fixed bottom-0 end-0 me-2 mb-2">
                <a href="https://wa.me/<?php echo $whatsapp_number; ?>?text=<?php echo $whatsapp_message; ?>" class="btn btn-success shadow rounded-pill px-md-3" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                    </svg>
                    <?php if ($whatsapp_text) : ?>
                        <span class="d-none d-md-inline-block"><?php echo $whatsapp_text; ?></span>
                    <?php endif; ?>
                </a>
            </div>
        <?php
        }
    }
}
