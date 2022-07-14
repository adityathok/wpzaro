<?php
/**
 * Sidebar setup for footer full
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$maincontainer	= get_theme_mod( 'wpzaro_container_type' );
$container		= get_theme_mod( 'wpzaro_footerfull_container_type', 'default' );
$container		= $container=='default' ? $maincontainer : $container;

?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="wrapper py-md-5" id="wrapper-footer-full" role="footer">

		<div class="<?php echo esc_attr( $container ); ?>" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
