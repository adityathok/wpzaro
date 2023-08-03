<?php

/**
 * Header Navbar (bootstrap5)
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
$navbar_parts       = wpzaro_theme_setting('wpzaro_navbar_parts', []);
$navbar_alignitems  = wpzaro_theme_setting('wpzaro_navbar_parts_alignitems', 'align-items-center');
?>

<?php if ($navbar_parts) : ?>
    <div class="row navbar-parts w-100 justify-content-between <?php echo $navbar_alignitems; ?>">
        <?php foreach ($navbar_parts as $part) : ?>
            <?php if ($part['part']) : ?>

                <?php
                $column_l       = $part['column'] ? $part['column'] : 'col-md-4';
                $column_l       = $column_l == 'hide' ? 'd-md-none' : $column_l;
                $column_s       = $part['column_small'] ? $part['column_small'] : 'col-12';
                $column_s       = $column_s == 'hide' ? 'd-none d-md-block' : $column_s;
                $align          = $part['align'] ? $part['align'] : 'start';
                ?>
                <div class="col-navbar <?php echo $column_l . ' ' . $column_s; ?> text-md-<?php echo $align; ?>">

                    <?php get_template_part('templates-parts/navbar-part/navbar-' . $part['part']); ?>

                </div>

            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>