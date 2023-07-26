<?php

/**
 * Declaring thumbnail post by ratio
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;


if (!function_exists('wpzaro_ratio_thumbnail')) {
    /**
     * get thumbnail post by ratio
     *@param $args array $args {
     *     An array of arguments.
     *
     *     @type string $size        Use size media worpdress, default medium
     *     @type int $idpost         Id post, default null     
     *     @type string $ratio       ratio image (16x9, 8x5, 4x3, 3x2, 1x1) default 1x1 
     *     @type boolean $linked     permalink to post, default true   
    }
     */
    function wpzaro_ratio_thumbnail($args = null)
    {
        global $post;

        $idpost     = isset($args['idpost']) ? $args['idpost'] : $post->ID;
        $size       = isset($args['size']) ? $args['size'] : 'medium';
        $linked     = isset($args['linked']) ? $args['linked'] : true;
        $ratio      = isset($args['ratio']) ? $args['ratio'] : '1:1';
        $ratio      = $ratio ? str_replace(":", "x", $ratio) : '';

        $urlimg     = get_the_post_thumbnail_url($idpost, $size);
        $output     = '';

        $output .= '<div class="wpzaro-ratio-thumbnail">';

        if ($linked) :
            $output .= '<a class="wpzaro-ratio-thumbnail-link" href="' . get_the_permalink($post->ID) . '" title="' . get_the_title($post->post_title) . '">';
        endif;

        $output .= '<div class="ratio ratio-' . $ratio . '">';
        if ($urlimg) {
            $output .= get_the_post_thumbnail($idpost, $size, array('class' => 'img-fluid'));
        } else {
            $output .= '<img src="' . get_template_directory_uri() . '/images/no-image.jpg" loading="lazy" height="400" width="400" alt="no image">';
        }
        $output .= '</div>';

        if ($linked) :
            $output .= '</a>';
        endif;

        $output .= '</div>';

        return $output;
    }
}
