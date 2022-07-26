<?php
/**
 * Declaring thumbnail post by ratio
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


if ( ! function_exists( 'wpzaro_ratio_thumbnail' ) ) {
    /**
    * get thumbnail post by ratio
    *@param $args array $args {
    *     An array of arguments.
    *
    *     @type string $size        Use size media worpdress, default medium
    *     @type int $idpost         Id post, default null     
    *     @type string $ratio       ratio image (16:9, 8:5, 4:3, 3:2, 1:1) default 1:1 
    *     @type boolean $linked     permalink to post, default true   
    }
    */
    function wpzaro_ratio_thumbnail($args=null) {
        global $post;

        $idpost     = isset($args['idpost']) ? $args['idpost'] : $post->ID;
        $size       = isset($args['size']) ? $args['size'] : 'medium';
        $linked     = isset($args['linked']) ? $args['linked'] : true;
        $ratio      = isset($args['ratio']) ? $args['ratio'] : '1:1';
        $ratio      = $ratio?str_replace(":","-",$ratio):'';

	    $urlimg     = get_the_post_thumbnail_url($idpost,$size);
	    $urlimg     = $urlimg?$urlimg:get_template_directory_uri().'/images/no-image.jpg';
        $output     = '';

        $output .='<div class="wpzaro-ratio-thumbnail">';
            $output .= '<a class="wpzaro-ratio-thumbnail-link" href="'.get_the_permalink($post->ID).'" title="'.get_the_title($post->ID).'">';
                $output .= '<div class="wpzaro-ratio-thumbnail-box wpzaro-ratio-thumbnail-'.$ratio.'" style="background-image: url('.$urlimg.');">';
                    $output .= '<img src="'.$urlimg.'" loading="lazy" class="wpzaro-ratio-thumbnail-image"/>';
                $output .= '</div>';
            $output .= '</a>';
        $output .= '</div>';

        return $output;
    }
}