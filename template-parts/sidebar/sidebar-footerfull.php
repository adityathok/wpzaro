<?php
/**
 * Sidebar setup for footer full
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$maincontainer	= wpzaro_theme_setting( 'wpzaro_container_type' );
$container		= wpzaro_theme_setting( 'wpzaro_footerfull_container_type', 'default' );
$container		= $container=='default' ? $maincontainer : $container;
$container_one	= $container=='container-fixed' ? 'container' : 'wrapper';
$container_two	= $container=='container-fixed' ? 'px-3' : $container;
?>

<?php if ( is_active_sidebar( 'footerfull' ) ) : ?>

	<!-- ******************* The Footer Full-width Widget Area ******************* -->

	<div class="<?php echo esc_attr( $container_one ).' type-'.esc_attr( $container ); ?>" id="wrapper-footer-full" role="footer">

		<div class="<?php echo esc_attr( $container_two ); ?> py-5" id="footer-full-content" tabindex="-1">

			<div class="row">

				<?php dynamic_sidebar( 'footerfull' ); ?>

			</div>

		</div>

	</div><!-- #wrapper-footer-full -->

	<?php
endif;
