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
    * Count number of column by bootstrap,
    */
    function wpzaro_column_classes($count=null,$equalheight=false) {
        $result = [];

        if ($count === 2) {
            $result[] = 'col-md-6';
        } elseif ($count === 3) {
            $result[] = 'col-md-4';
        } elseif ($count === 4) {
            $result[] = 'col-md-3';
        } elseif ($count === 5) {
            $result[] = 'col-md-20';
        } elseif ($count === 6) {
            $result[] = 'col-md-2';
        } else {            
            $result[] = 'col-md-12';
        }

        if($equalheight) {
            $result[] = 'align-items-stretch';
        }

        return $result?implode(" ",$result):'';

    }
}