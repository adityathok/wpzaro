<?php
/**
 * Header Navbar Search
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<div class="nav-item dropdown nav-search dropdown-toggle-icon-none">
    <a class="nav-link pe-0 dropdown-toggle-none" role="button" href="#" id="navbarSearch" data-bs-toggle="dropdown" aria-expanded="true">
        <i class="fa fa-search"> </i>
    </a>
    <div class="dropdown-menu dropdown-menu-end shadow rounded p-2" aria-labelledby="navbarSearch" style="min-width: 15em;" data-bs-popper="none">
        <form class="input-group" method="GET" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary m-0" type="submit">Search</button>
        </form>
    </div>
</div>