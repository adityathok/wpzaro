<?php
/**
 * Declaring classes bootstrap
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if ( ! function_exists( 'wpzaro_column_classes' ) ) {
    /**
    * large number of column by bootstrap,
    */
    function wpzaro_column_classes($args=null) {

        $large          = isset($args['large']) ? $args['large'] : 1;
        $small          = isset($args['small']) ? $args['small'] : 1;
        $equalheight    = isset($args['equalheight']) ? $args['equalheight'] : '';

        $classes = [];

        if ($large === 'auto') {
            $classes[] = 'col-md';
        } elseif ($large === 1) {
            $classes[] = 'col-md-12';
        } elseif ($large === 2) {
            $classes[] = 'col-md-6';
        } elseif ($large === 3) {
            $classes[] = 'col-md-4';
        } elseif ($large === 4) {
            $classes[] = 'col-md-3';
        } elseif ($large === 5) {
            $classes[] = 'col-md-4 col-lg-20';
        } elseif ($large === 6) {
            $classes[] = 'col-md-4 col-lg-3 col-xl-2';
        }

        if($small === 1) {
            $classes[] = 'col-12';
        } elseif ($small === 2) {
            $classes[] = 'col-6';
        } elseif ($small === 3) {
            $classes[] = 'col-4';
        } elseif ($small === 4) {
            $classes[] = 'col-3';
        }

        if($equalheight) {
            $classes[] = 'align-items-stretch';
        }

        return $classes?implode(" ",$classes):'';

    }
}