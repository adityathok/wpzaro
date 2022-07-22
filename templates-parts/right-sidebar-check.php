<?php
/**
 * Right sidebar check
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

</div><!-- #closing the primary container from /templates-parts/left-sidebar-check.php -->

<?php
$sidebar_pos = get_theme_mod( 'wpzaro_sidebar_position' );

if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) {
	get_template_part( 'templates-parts/sidebar/sidebar', 'right' );
}
