<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$maincontainer      = get_theme_mod( 'wpzaro_container_type' );
$sortable_layout    = get_theme_mod( 'wpzaro_navbar_sortable_layout', array('logo','menu') );
$container          = get_theme_mod( 'wpzaro_navbar_container_type', 'default' );
$container          = $container=='default' ? $maincontainer : $container;
$shadow_type        = get_theme_mod( 'wpzaro_navbar_shadow', 'shadow-sm' );
?>

<nav id="main-nav" class="navbar navbar-expand-md navbar-light bg-white <?php echo $shadow_type; ?>" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'wpzaro' ); ?>
	</h2>

	<div class="<?php echo esc_attr( $container ); ?>">

        <?php if ( $sortable_layout ) { 
            
            foreach( $sortable_layout as $layout): 
            
                get_template_part( 'global-templates/navbar-'.$layout);
            
            endforeach; 

        } ?>		

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
