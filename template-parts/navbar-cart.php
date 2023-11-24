<?php
/**
 * Header Navbar Cart
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if ( !class_exists( 'WooCommerce' ) )
return false;

?>
<div class="navbar-nav navbar-cart">
    <span class="nav-item">
        <a class="cart-contents p-2 nav-link position-relative" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'wpzaro' ); ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag" viewBox="0 0 16 16">
                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
            </svg>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-1 count">
                <?php echo wp_kses_data( sprintf( _n( '%d', '%d', WC()->cart->get_cart_contents_count(), 'wpzaro' ), WC()->cart->get_cart_contents_count() ) ); ?>
            </span>
        </a>
    </span>
</div>