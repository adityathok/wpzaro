<?php

/**
 * Header Navbar Offcanvas
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$uid = uniqid();
?>

<button class="navbar-toggler d-inline-block border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvas<?php echo $uid; ?>" aria-controls="navbarOffcanvas<?php echo $uid; ?>" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'wpzaro'); ?>">
    <span class="navbar-toggler-icon"></span>
</button>

<?php add_action('wp_footer', function () use ($uid) { ?>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarOffcanvas<?php echo $uid; ?>">

        <div class="offcanvas-header justify-content-end">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php if (is_active_sidebar('headeroffcanvas')) :
                dynamic_sidebar('headeroffcanvas');
            endif; ?>
        </div>

    </div><!-- #navbarOffcanvas<?php echo $uid; ?> -->
<?php }); ?>