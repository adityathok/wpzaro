<?php

/**
 * wpzaro functions builder parts
 *
 * @package wpzaro
 */

///sidebar left
if (!function_exists('wpzaro_sidebar_left_check')) {
    add_action('wpzaro_sidebar_left', 'wpzaro_sidebar_left_check');
    function wpzaro_sidebar_left_check()
    {
        $sidebar_pos = wpzaro_theme_setting('wpzaro_sidebar_position');

        if ('left' === $sidebar_pos || 'both' === $sidebar_pos) {
            get_template_part('templates-parts/sidebar/sidebar', 'left');
        }
    ?>

        <div class="col-md content-area" id="primary">

        <?php
    }
}

///sidebar right
if (!function_exists('wpzaro_sidebar_right_check')) {
    add_action('wpzaro_sidebar_right', 'wpzaro_sidebar_right_check');
    function wpzaro_sidebar_right_check()
    {
        $sidebar_pos = wpzaro_theme_setting('wpzaro_sidebar_position');
        ?>

        </div><!-- #closing the primary container from wpzaro_sidebar_left_check() -->

        <?php

        if ('right' === $sidebar_pos || 'both' === $sidebar_pos) {
            get_template_part('templates-parts/sidebar/sidebar', 'right');
        }
    }
}

