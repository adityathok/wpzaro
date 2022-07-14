<?php 
/**
 * wpzaro functions builder parts
 *
 * @package wpzaro
 */
 
 //opened header layout
if ( ! function_exists( 'wpzaro_header_layout_open' ) ) {
    add_action('wpzaro_header_open','wpzaro_header_layout_open');
    function wpzaro_header_layout_open() {
        $sticky_type    = get_theme_mod( 'wpzaro_navbar_sticky', 'sticky-none' );
        $sticky_class   = $sticky_type==='sticky-none'?$sticky_type:$sticky_type.' wrapper-navbar-sticky';
        ?>

        <!-- ******************* The Navbar Area ******************* -->
	    <header id="wrapper-navbar" class="<?php echo $sticky_class; ?>">

        <?php
    }
}

///closed header layout
if ( ! function_exists( 'wpzaro_header_layout_content' ) ) {
    add_action('wpzaro_header','wpzaro_header_layout_content');
    function wpzaro_header_layout_content() {
        ?>
        <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'wpzaro' ); ?></a>
        <?php get_template_part( 'templates-part/navbar'); ?>
        <?php
    }
}

///closed header layout
if ( ! function_exists( 'wpzaro_header_layout_close' ) ) {
    add_action('wpzaro_header_close','wpzaro_header_layout_close');
    function wpzaro_header_layout_close() {
        ?>
        </header><!-- #wrapper-navbar end -->
        <?php
    }
}

//opened footer layout
if ( ! function_exists( 'wpzaro_footer_layout_open' ) ) {
    add_action('wpzaro_footer_open','wpzaro_footer_layout_open');
    function wpzaro_footer_layout_open() {
        ?>

        <!-- ******************* The Footer Area ******************* -->
        <footer class="wrapper p-0" id="wrapper-footer">

        <?php
    }
}

///add footer site info
if ( ! function_exists( 'wpzaro_footer_layout_content' ) ) {
    add_action('wpzaro_footer','wpzaro_footer_layout_content');
    function wpzaro_footer_layout_content() {
        $container = get_theme_mod( 'wpzaro_container_type' );
        ?>

            <?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

            <div class="wrapper" id="wrapper-footer-site-info" role="footer">

                <div class="<?php echo esc_attr( $container ); ?>">

                    <div class="site-info">

                        <?php wpzaro_site_info(); ?>

                    </div><!-- .site-info -->

                </div><!-- .container end -->

            </div><!-- #wrapper-footer-site-info end -->

        <?php
    }
}

///closed footer layout
if ( ! function_exists( 'wpzaro_footer_layout_close' ) ) {
    add_action('wpzaro_footer_close','wpzaro_footer_layout_close');
    function wpzaro_footer_layout_close() {
        ?>

        </footer>  <!-- #wrapper-footer end -->

        <?php
    }
}

if ( ! function_exists( 'wpzaro_header_footer_bbrender' ) && class_exists('FLThemeBuilderLayoutData') ) {
	/**
	 * Render Header or Footer Beaver Builder Themer
	 */
    add_action( 'wp', 'wpzaro_header_footer_bbrender' );
	function wpzaro_header_footer_bbrender() {
		// Get the header ID.
		$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();
		// If we have a header, remove the theme header and hook in Beaver Themer'
		if ( ! empty( $header_ids ) ) {
            remove_action( 'wpzaro_header_open', 'wpzaro_header_layout_open');
            remove_action( 'wpzaro_header', 'wpzaro_header_layout_content');
            remove_action( 'wpzaro_header_close', 'wpzaro_header_layout_close');
		    add_action( 'wpzaro_header', 'FLThemeBuilderLayoutRenderer::render_header' );
		}
        
        // Get the footer ID.
        $footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

        // If we have a footer, remove the theme footer and hook in Beaver Themer.
        if ( ! empty( $footer_ids ) ) {
            remove_action( 'wpzaro_footer_open', 'wpzaro_footer_layout_open');
            remove_action( 'wpzaro_footer', 'wpzaro_footer_layout_content');
            remove_action( 'wpzaro_footer_close', 'wpzaro_footer_layout_close');
            add_action( 'wpzaro_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
        }
	}
}