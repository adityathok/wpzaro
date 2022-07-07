<?php
/**
 * wpzaro Theme Customizer use Kirki
 *
 * @package wpzaro
 */
 
// Exit if accessed directly.
defined('ABSPATH') || exit;

if (class_exists('Kirki')) {
    
    //Layout Panel
    new \Kirki\Panel(
        'layout_id',
        [
            'priority'    => 10,
            'title'       => esc_html__( 'Layout Settings', 'wpzaro' ),
            'description' => esc_html__( 'Theme setting layout.', 'wpzaro' ),
        ]
    ); 
        //Container Section
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
            new \Kirki\Field\Select(
                [
                    'settings'    => 'wpzaro_container_type',
                    'label'       => esc_html__( 'Container Type', 'wpzaro' ),
                    'section'     => 'section_container',
                    'default'     => 'container',
                    'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                    'description' => esc_html__( 'Choose between Theme container and container-fluid', 'wpzaro' ),
                    'choices'     => [
                        'container'       => esc_html__( 'Fixed width container', 'wpzaro' ),
                        'container-fluid' => esc_html__( 'Full width container', 'wpzaro' ),
                    ],
                ]
            );
        //Navigation Section
        new \Kirki\Section(
            'section_navigation',
            [
                'title'       => esc_html__( 'Navigation', 'wpzaro' ),
                'description' => esc_html__( 'Navigation settings.', 'wpzaro' ),
                'panel'       => 'layout_id',
                'priority'    => 160,
            ]
        );
            new \Kirki\Field\Select(
                [
                    'settings'    => 'wpzaro_navbar_type',
                    'label'       => esc_html__( 'Responsive Navigation Type', 'wpzaro' ),
                    'section'     => 'section_navigation',
                    'default'     => 'collapse',
                    'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                    'description' => esc_html__( 'Choose between an expanding and collapsing navbar or an offcanvas drawer.', 'wpzaro' ),
                    'choices'     => [
                        'collapse'  => esc_html__( 'Collapse', 'wpzaro' ),
                        'offcanvas' => esc_html__( 'Offcanvas', 'wpzaro' ),
                    ],
                ]
            );
        //Sidebar Section
        new \Kirki\Section(
            'section_sidebar',
            [
                'title'       => esc_html__( 'Sidebar', 'wpzaro' ),
                'description' => esc_html__( 'Sidebar settings.', 'wpzaro' ),
                'panel'       => 'layout_id',
                'priority'    => 160,
            ]
        );
            new \Kirki\Field\Select(
                [
                    'settings'    => 'wpzaro_sidebar_position',
                    'label'       => esc_html__( 'Sidebar Positioning', 'wpzaro' ),
                    'section'     => 'section_sidebar',
                    'default'     => 'right',
                    'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                    'description' => esc_html__( 'Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.', 'wpzaro' ),
                    'choices'     => [
                        'right' => esc_html__( 'Right sidebar', 'wpzaro' ),
                        'left'  => esc_html__( 'Left sidebar', 'wpzaro' ),
                        'both'  => esc_html__( 'Left & Right sidebars', 'wpzaro' ),
                        'none'  => esc_html__( 'No sidebar', 'wpzaro' ),
                    ],
                ]
            );
}