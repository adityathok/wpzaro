<?php
/**
 * Left sidebar check
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$sidebar_pos = get_theme_mod( 'wpzaro_sidebar_position' );

if ( 'left' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'templates-part/sidebar/sidebar', 'left' );
}
?>

<div class="col-md content-area" id="primary">
