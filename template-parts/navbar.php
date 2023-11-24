<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
// $navbar_parts = wpzaro_theme_setting('wpzaro_navbar_parts', []);
// if($navbar_parts):
//     foreach ($navbar_parts as $part) :
//         get_template_part('template-parts/navbar-' . $part);
//     endforeach;
// endif;


$navbar_layout = wpzaro_theme_setting('wpzaro_navbar_layout', 1);
switch ($navbar_layout) {
    case 2:
        # code...
        break;
    
    default:        
        ?>
            <?php get_template_part('template-parts/navbar-logo'); ?>
            
            <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNavOffcanvas" aria-controls="navbarNavOffcanvas" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'wpzaro'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNavOffcanvas">
                <div class="offcanvas-header justify-content-end">
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div><!-- .offcancas-header -->
                <div class="offcanvas-body">

                    <?php get_template_part('template-parts/navbar-menu'); ?>
                    <div class="d-flex justify-content-center justify-content-md-end">
                        <?php get_template_part('template-parts/navbar-search'); ?>
                        <?php get_template_part('template-parts/navbar-darkmode'); ?>
                        <?php get_template_part('template-parts/navbar-cart'); ?>
                    </div>

                </div>
            </div><!-- .offcanvas -->
        <?php
        break;
}