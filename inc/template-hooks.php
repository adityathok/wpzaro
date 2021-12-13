<?php 
/**
 * wpzaro functions hooks
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 /**
 * Site before Header
 */
function wpzaro_header_before() {
	do_action( 'wpzaro_header_before' );
}

 /**
 * Site Header
 */
function wpzaro_header() {
	do_action( 'wpzaro_header' );
}

/**
 * Site after Header
 */
 function wpzaro_header_after() {
	do_action( 'wpzaro_header_after' );
}

 /**
 * Site before Content
 */
function wpzaro_content_before() {
	do_action( 'wpzaro_content_before' );
}

/**
 * Site after Content
 */
function wpzaro_content_after() {
	do_action( 'wpzaro_content_after' );
}

 /**
 * Site Top Content
 */
function wpzaro_content_top() {
	do_action( 'wpzaro_content_top' );
}

/**
 * Site bottom Content
 */
function wpzaro_content_bottom() {
	do_action( 'wpzaro_content_bottom' );
}

 /**
 * Site before Footer
 */
 function wpzaro_footer_before() {
	do_action( 'wpzaro_footer_before' );
}

 /**
 * Site Footer
 */
function wpzaro_footer() {
	do_action( 'wpzaro_footer' );
}

/**
 * Site after Footer
 */
 function wpzaro_footer_after() {
	do_action( 'wpzaro_footer_after' );
}

/**
 * Sidebar left
 */
function wpzaro_sidebar_left() {
	do_action( 'wpzaro_sidebar_left' );
}

/**
 * Sidebar Right
 */
function wpzaro_sidebar_right() {
	do_action( 'wpzaro_sidebar_right' );
}