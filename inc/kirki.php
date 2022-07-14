<?php
/**
 * wpzaro Theme Customizer use Kirki
 *
 * @package wpzaro
 */
 
// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('Kirki'))
return false;

//Layout Panel
new \Kirki\Panel(
    'general_id',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'General', 'wpzaro' ),
        'description' => esc_html__( 'General theme settings.', 'wpzaro' ),
    ]
); 
    //Container Section
    new \Kirki\Section(
        'section_container',
        [
            'title'       => esc_html__( 'Container', 'wpzaro' ),
            'description' => esc_html__( 'Container settings.', 'wpzaro' ),
            'panel'       => 'general_id',
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
    //Typography Section
    new \Kirki\Section(
        'section_typography',
        [
            'title'       => esc_html__( 'Typography', 'wpzaro' ),
            'description' => esc_html__( 'Typography global settings.', 'wpzaro' ),
            'panel'       => 'general_id',
            'priority'    => 160,
        ]
    );
        new \Kirki\Field\Typography(
            [
                'settings'    => 'wpzaro_typography_global',
                'label'       => esc_html__( 'Typography', 'wpzaro' ),
                'description' => esc_html__( 'Select typography options for global', 'wpzaro' ),
                'section'     => 'section_typography',
                'priority'    => 10,
                'transport'   => 'auto',
                'default'     => [
                    'font-family'     => 'Roboto',
                    'variant'         => 'regular',
                    'font-style'      => 'normal',
                    'font-size'       => '14px',
                    'line-height'     => '1.5',
                    'letter-spacing'  => '0',
                    'text-transform'  => 'none',
                    'text-decoration' => 'none',
                    'text-align'      => 'left',
                ],
                'output'      => [
                    [
                        'element' => 'body,.is-root-container',
                    ],
                ],
            ]
        );
        new \Kirki\Field\Multicolor(
            [
                'settings'  => 'wpzaro_typography_color_global',
                'label'     => esc_html__( 'Typography Color', 'wpzaro' ),
                'section'   => 'section_typography',
                'priority'  => 10,
                'choices'   => [
                    'color'    => esc_html__( 'Color', 'wpzaro' ),
                    'link'     => esc_html__( 'Link', 'wpzaro' ),
                    'hover'    => esc_html__( 'Hover', 'wpzaro' ),
                    'active'   => esc_html__( 'Active', 'wpzaro' ),
                ],
                'alpha'     => true,
                'default'   => [
                    'link'   => '#333333',
                    'link'   => '#0063b1',
                    'hover'  => '#333333',
                    'active' => '#0063b1',
                ],
                'output'    => [
                    [
                        'choice'    => 'color',
                        'element'   => 'body,.is-root-container',
                        'property'  => 'color',
                    ],
                    [
                        'choice'    => 'link',
                        'element'   => 'a',
                        'property'  => 'color',
                    ],
                    [
                        'choice'    => 'hover',
                        'element'   => 'a:hover',
                        'property'  => 'color',
                    ],
                    [
                        'choice'    => 'active',
                        'element'   => 'a:active',
                        'property'  => 'color',
                    ],
                ],
            ]
        );
    //Sidebar Section
    new \Kirki\Section(
        'section_sidebar',
        [
            'title'       => esc_html__( 'Sidebar', 'wpzaro' ),
            'description' => esc_html__( 'Sidebar settings.', 'wpzaro' ),
            'panel'       => 'general_id',
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
        new \Kirki\Field\Slider(
            [
                'settings'    => 'wpzaro_sidebar_width',
                'label'       => esc_html__( 'Sidebar Width', 'wpzaro' ),
                'section'     => 'section_sidebar',
                'default'     => 30,
                'transport'   => 'auto',
                'choices'     => [
                    'min'  => 10,
                    'max'  => 60,
                    'step' => 1,
                ],
                'output' => [
                    [
                        'element'  => '.widget-area',
                        'property' => 'max-width',
                        'units'    => '%',
                        'media_query' => '@media (min-width: 768px)',
                    ],
                ],
            ]
        );

//Header Panel
new \Kirki\Panel(
    'header_id',
    [
        'priority'    => 10,
        'title'       => esc_html__( 'Header', 'wpzaro' ),
        'description' => esc_html__( 'Theme head layout setting.', 'wpzaro' ),
    ]
); 
    //Navbar Site Identity
    new \Kirki\Section(
        'title_tagline',
        [
            'title'       => esc_html__( 'Site Identity', 'wpzaro' ),
            'description' => esc_html__( 'Site Identity settings.', 'wpzaro' ),
            'panel'       => 'header_id',
            'priority'    => 160,
        ]
    );
    //Navbar layout Section
    new \Kirki\Section(
        'section_layout_navbar',
        [
            'title'       => esc_html__( 'Layout', 'wpzaro' ),
            'description' => esc_html__( 'Header layout settings.', 'wpzaro' ),
            'panel'       => 'header_id',
            'priority'    => 160,
        ]
    );
        new \Kirki\Field\Select(
            [
                'settings'    => 'wpzaro_navbar_container_type',
                'label'       => esc_html__( 'Container Type', 'wpzaro' ),
                'section'     => 'section_layout_navbar',
                'default'     => 'default',
                'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                'description' => esc_html__( 'Choose between Theme container and container-fluid, or default', 'wpzaro' ),
                'choices'     => [
                    'default'         => esc_html__( 'Default', 'wpzaro' ),
                    'container'       => esc_html__( 'Fixed width container', 'wpzaro' ),
                    'container-fluid' => esc_html__( 'Full width container', 'wpzaro' ),
                ],
            ]
        );
        new \Kirki\Field\Select(
            [
                'settings'    => 'wpzaro_navbar_type',
                'label'       => esc_html__( 'Responsive Header Menu Type', 'wpzaro' ),
                'section'     => 'section_layout_navbar',
                'default'     => 'collapse',
                'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                'description' => esc_html__( 'Choose between an expanding and collapsing navbar or an offcanvas drawer.', 'wpzaro' ),
                'choices'     => [
                    'collapse'  => esc_html__( 'Collapse', 'wpzaro' ),
                    'offcanvas' => esc_html__( 'Offcanvas', 'wpzaro' ),
                ],
            ]
        );
        new \Kirki\Field\Select(
            [
                'settings'    => 'wpzaro_navbar_sticky',
                'label'       => esc_html__( 'Sticky Navbar', 'wpzaro' ),
                'section'     => 'section_layout_navbar',
                'default'     => 'sticky-none',
                'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                'description' => esc_html__( 'Choose sticky for header.', 'wpzaro' ),
                'choices'     => [
                    'sticky-none'   => esc_html__( 'No', 'wpzaro' ),
                    'sticky-top'    => esc_html__( 'Yes', 'wpzaro' ),
                ],
            ]
        );
        new \Kirki\Field\Sortable(
            [
                'settings' => 'wpzaro_navbar_sortable_layout',
                'label'    => __( 'Sortable Layout', 'wpzaro' ),
                'section'  => 'section_layout_navbar',
                'default'  => [ 'logo', 'menu' ],
                'priority' => 10,
                'choices'  => [
                    'logo'      => esc_html__( 'Logo', 'wpzaro' ),
                    'menu'      => esc_html__( 'Menu', 'wpzaro' ),
                    'search'    => esc_html__( 'Search', 'wpzaro' ),
                ],
            ]
        );
    //Navbar Style Section
    new \Kirki\Section(
        'section_style_navbar',
        [
            'title'       => esc_html__( 'Style', 'wpzaro' ),
            'description' => esc_html__( 'Header style settings.', 'wpzaro' ),
            'panel'       => 'header_id',
            'priority'    => 160,
        ]
    );
        new \Kirki\Field\Select(
            [
                'settings'    => 'wpzaro_navbar_shadow',
                'label'       => esc_html__( 'Header Shadow', 'wpzaro' ),
                'section'     => 'section_style_navbar',
                'default'     => 'shadow-sm',
                'placeholder' => esc_html__( 'Choose an option', 'wpzaro' ),
                'description' => esc_html__( 'Choose style shadow for header.', 'wpzaro' ),
                'choices'     => [
                    'shadow-none'   => esc_html__( 'None', 'wpzaro' ),
                    'shadow-sm'     => esc_html__( 'Small', 'wpzaro' ),
                    'shadow'        => esc_html__( 'Regular', 'wpzaro' ),
                    'shadow-lg'     => esc_html__( 'Larger', 'wpzaro' ),
                ],
            ]
        );
        new \Kirki\Field\Dimension(
            [
                'settings'    => 'wpzaro_header_logo_width',
                'label'       => esc_html__( 'Logo Width', 'wpzaro' ),
                'description' => esc_html__( 'Max width logo default (px)', 'wpzaro' ),
                'section'     => 'section_style_navbar',
                'default'     => '180px',
                'choices'     => [
                    'accept_unitless' => true,
                ],
                'output' => array(
                    array(
                        'element'  => '.navbar-brand img',
                        'property' => 'max-width',
                    ),
                ),
            ]
        );
