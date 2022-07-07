<?php
/**
 * wpzaro Theme Customizer use Kirki
 *
 * @package wpzaro
 */
 
// Exit if accessed directly.
defined('ABSPATH') || exit;

if (class_exists('Kirki')) {
    
    new \Kirki\Panel(
        'layout_id',
        [
            'priority'    => 10,
            'title'       => esc_html__( 'Layout Settings', 'wpzaro' ),
            'description' => esc_html__( 'Theme setting layout.', 'wpzaro' ),
        ]
    );
    new \Kirki\Section(
        'section_container',
        [
            'title'       => esc_html__( 'Container', 'wpzaro' ),
            'description' => esc_html__( 'Container settings.', 'wpzaro' ),
            'panel'       => 'layout_id',
            'priority'    => 160,
        ]
    );
    new \Kirki\Field\Dimension(
        [
            'settings'    => 'wpzaro_container_width',
            'label'       => esc_html__( 'Max width container', 'wpzaro' ),
            'description' => esc_html__( 'Max width container default (px)', 'wpzaro' ),
            'section'     => 'section_container',
            'default'     => '1140px',
            'choices'     => [
                'accept_unitless' => true,
            ],
            'output' => array(
                array(
                    'element'  => '.container',
                    'property' => 'max-width',
                ),
            ),
        ]
    );
}