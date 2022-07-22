<?php
/**
 * Header Navbar Logo
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<!-- Your site title as branding in the menu -->
<?php if ( ! has_custom_logo() ) { ?>

    <?php if ( is_front_page() && is_home() ) : ?>

        <h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

    <?php else : ?>

        <a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

    <?php endif; ?>

<?php
} else {
    the_custom_logo();
}
?>
<!-- end custom logo -->
