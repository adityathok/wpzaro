<?php
/**
 * Header Navbar Search
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
$type_form  = get_theme_mod( 'wpzaro_searchform_header_type', 'dropdown' );

?>

<?php if ( $type_form == 'inline' ) : ?>

    <div class="header-search d-none d-md-inline-block">
        <form class="d-flex" role="search" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="form-control me-2" name="s" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit"><i class="fa fa-search"> </i></button>
        </form>
    </div>

<?php elseif($type_form == 'modal') : ?>

    <div class="header-search d-none d-md-inline-block">
        <span class="nav-link pe-0" data-bs-toggle="modal" data-bs-target="#searchNavbarModal">
            <i class="fa fa-search"> </i>
        </span>

        <!-- Modal -->
        <div class="modal fade" id="searchNavbarModal" tabindex="-1" aria-labelledby="searchNavbarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content mt-5">
                    <div class="modal-body">                    
                        <form class="d-flex" role="search" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <input class="form-control me-2" name="s" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-dark" type="submit"><i class="fa fa-search"> </i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Jquery move element to the bottom of the page
            jQuery(document).ready(function($) {
                if ( $("#searchNavbarModal").length ) {
                    $("#searchNavbarModal").appendTo("body");
                }
            });
        </script>

    </div>

<?php else : ?>

    <div class="header-search d-none d-md-inline-block">
        <div class="nav-item dropdown nav-search dropdown-toggle-icon-none">
            <a class="nav-link pe-0 dropdown-toggle-none" role="button" href="#" id="navbarSearch" data-bs-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-search"> </i>
            </a>
            <div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navbarSearch" style="min-width: 15em;" data-bs-popper="none">
                <form class="input-group" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input class="form-control" name="s" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-secondary m-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

<?php endif; ?>