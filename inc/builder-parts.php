<?php 
/**
 * wpzaro functions builder parts
 *
 * @package wpzaro
 */
 
 //opened header layout
if ( ! function_exists( 'wpzaro_header_layout_open' ) ) {
    add_action('wpzaro_header_before','wpzaro_header_layout_open',21);
    function wpzaro_header_layout_open() {
        ?>

        <!-- ******************* The Navbar Area ******************* -->
	    <header id="wrapper-navbar">

        <?php
    }
}

///closed header layout
if ( ! function_exists( 'wpzaro_header_layout_content' ) ) {
    add_action('wpzaro_header','wpzaro_header_layout_content',21);
    function wpzaro_header_layout_content() {
        $navbar_type       = get_theme_mod( 'understrap_navbar_type', 'collapse' );
        ?>
        <a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'wpzaro' ); ?></a>
        <?php get_template_part( 'global-templates/navbar', $navbar_type); ?>
        <?php
    }
}

///closed header layout
if ( ! function_exists( 'wpzaro_header_layout_close' ) ) {
    add_action('wpzaro_header_after','wpzaro_header_layout_close',21);
    function wpzaro_header_layout_close() {
        ?>
        </header><!-- #wrapper-navbar end -->
        <?php
    }
}

//opened footer layout
if ( ! function_exists( 'wpzaro_footer_layout_open' ) ) {
    add_action('wpzaro_footer_before','wpzaro_footer_layout_open',21);
    function wpzaro_footer_layout_open() {
        ?>

        <!-- ******************* The Footer Area ******************* -->
        <div class="wrapper" id="wrapper-footer">
	        <footer class="site-footer" id="colophon">

        <?php
    }
}

///closed footer layout
if ( ! function_exists( 'wpzaro_footer_layout_content' ) ) {
    add_action('wpzaro_footer','wpzaro_footer_layout_content',21);
    function wpzaro_footer_layout_content() {
        $navbar_type       = get_theme_mod( 'wpzaro_navbar_type', 'collapse' );
        ?>
            <div class="site-info">

                <?php wpzaro_site_info(); ?>

            </div><!-- .site-info -->
        <?php
    }
}

///closed header layout
if ( ! function_exists( 'wpzaro_header_layout_close' ) ) {
    add_action('wpzaro_header_after','wpzaro_header_layout_close',21);
    function wpzaro_header_layout_close() {
        ?>
            </footer>
        </div>  <!-- #wrapper-footer end -->
        <?php
    }
}