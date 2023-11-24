<?php

/**
 * wpzaro Theme Customizer use Kirki
 *
 * @package wpzaro
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

if (!class_exists('Kirki') || class_exists('Kirki') && KIRKI_VERSION < 4)
    return false;

//Layout Panel
new \Kirki\Panel(
    'general_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('General', 'wpzaro'),
        'description' => esc_html__('General theme settings.', 'wpzaro'),
    ]
);
//Container Section
new \Kirki\Section(
    'section_container',
    [
        'title'       => esc_html__('Container', 'wpzaro'),
        'description' => esc_html__('Container settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Dimension(
    [
        'settings'    => 'wpzaro_container_width',
        'label'       => esc_html__('Max width container', 'wpzaro'),
        'description' => esc_html__('Max width container default (px)', 'wpzaro'),
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
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_container',
        'default'     => 'container',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid', 'wpzaro'),
        'choices'     => [
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-xxl'   => esc_html__('Fixed width extra large container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
        ],
    ]
);
//Typography Section
new \Kirki\Section(
    'section_typography',
    [
        'title'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('Typography global settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_typography_global',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('Select typography options for global', 'wpzaro'),
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
        'label'     => esc_html__('Typography Color', 'wpzaro'),
        'section'   => 'section_typography',
        'priority'  => 10,
        'choices'   => [
            'color'    => esc_html__('Color', 'wpzaro'),
            'link'     => esc_html__('Link', 'wpzaro'),
            'hover'    => esc_html__('Hover', 'wpzaro'),
            'active'   => esc_html__('Active', 'wpzaro'),
        ],
        'alpha'     => true,
        'default'   => [
            'color'  => '#333333',
            'link'   => '#0063b1',
            'hover'  => '#333333',
            'active' => '#0063b1',
        ],
        'output'    => [
            [
                'choice'    => 'color',
                'element'   => '[data-bs-theme="light"] body,.is-root-container',
                'property'  => 'color',
            ],
            [
                'choice'    => 'link',
                'element'   => '[data-bs-theme="light"] a:not(.btn),[data-bs-theme="light"] .nav-link',
                'property'  => 'color',
            ],
            [
                'choice'    => 'hover',
                'element'   => '[data-bs-theme="light"] a:not(.btn):hover,[data-bs-theme="light"] .nav-link:hover',
                'property'  => 'color',
            ],
            [
                'choice'    => 'active',
                'element'   => '[data-bs-theme="light"] a:not(.btn):active,[data-bs-theme="light"] .nav-link:active',
                'property'  => 'color',
            ],
        ],
    ]
);
//Sidebar Section
new \Kirki\Section(
    'section_sidebar',
    [
        'title'       => esc_html__('Sidebar', 'wpzaro'),
        'description' => esc_html__('Sidebar settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_sidebar_position',
        'label'       => esc_html__('Sidebar Positioning', 'wpzaro'),
        'section'     => 'section_sidebar',
        'default'     => 'right',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Set sidebar\'s default position. Can either be: right, left, both or none. Note: this can be overridden on individual pages.', 'wpzaro'),
        'choices'     => [
            'right' => esc_html__('Right sidebar', 'wpzaro'),
            'left'  => esc_html__('Left sidebar', 'wpzaro'),
            'both'  => esc_html__('Left & Right sidebars', 'wpzaro'),
            'none'  => esc_html__('No sidebar', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Slider(
    [
        'settings'    => 'wpzaro_sidebar_width',
        'label'       => esc_html__('Sidebar Width', 'wpzaro'),
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
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_widget_classic',
        'label'       => esc_html__('Widget Classic', 'wpzaro'),
        'description' => esc_html__('Use Classic Widget', 'wpzaro'),
        'section'     => 'section_sidebar',
        'default'     => 'off',
        'choices'     => [
            'on'  => esc_html__('Enable', 'wpzaro'),
            'off' => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);

//Background Section
new \Kirki\Section(
    'section_background',
    [
        'title'       => esc_html__('Background', 'wpzaro'),
        'description' => esc_html__('Background settings.', 'wpzaro'),
        'panel'       => 'general_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_background_body',
        'label'       => esc_html__('Background', 'wpzaro'),
        'description' => esc_html__('Background controls for body website', 'wpzaro'),
        'section'     => 'section_background',
        'default'     => [
            'background-color'      => '#ffffff',
            'background-image'      => '',
            'background-repeat'     => 'repeat',
            'background-position'   => 'center center',
            'background-size'       => 'cover',
            'background-attachment' => 'scroll',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '[data-bs-theme="light"] body',
            ],
        ],
    ]
);

//Header Panel
new \Kirki\Panel(
    'header_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('Header', 'wpzaro'),
        'description' => esc_html__('Theme head layout setting.', 'wpzaro'),
    ]
);
//Navbar Site Identity
new \Kirki\Section(
    'title_tagline',
    [
        'title'       => esc_html__('Site Identity', 'wpzaro'),
        'description' => esc_html__('Site Identity settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);

//Navbar Style Section
new \Kirki\Section(
    'section_style_navbar',
    [
        'title'       => esc_html__('Style', 'wpzaro'),
        'description' => esc_html__('Header style settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
	[
		'settings'    => 'wpzaro_navbar_layout',
		'label'       => esc_html__( 'Navbar Layout', 'wpzaro' ),
		'section'     => 'section_style_navbar',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'1' => esc_html__( 'Layout 1', 'wpzaro' ),
		],
	]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'default',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid, or default', 'wpzaro'),
        'choices'     => [
            'default'         => esc_html__('Default', 'wpzaro'),
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-xxl'   => esc_html__('Fixed width extra large container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_sticky',
        'label'       => esc_html__('Sticky Navbar', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'sticky-none',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose sticky for header.', 'wpzaro'),
        'choices'     => [
            'sticky-none'   => esc_html__('No', 'wpzaro'),
            'sticky-top'    => esc_html__('Yes', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_overlay',
        'label'       => esc_html__('Overlay Navbar', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'disable',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Overlay header with transparent background.', 'wpzaro'),
        'choices'     => [
            'disable'   => esc_html__('No', 'wpzaro'),
            'enable'    => esc_html__('Yes', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Dimension(
    [
        'settings'    => 'wpzaro_header_logo_width',
        'label'       => esc_html__('Logo Width', 'wpzaro'),
        'description' => esc_html__('Max width logo default (px)', 'wpzaro'),
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
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_navbar_shadow',
        'label'       => esc_html__('Header Shadow', 'wpzaro'),
        'section'     => 'section_style_navbar',
        'default'     => 'shadow-sm',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose style shadow for header.', 'wpzaro'),
        'choices'     => [
            'shadow-none'   => esc_html__('None', 'wpzaro'),
            'shadow-sm'     => esc_html__('Small', 'wpzaro'),
            'shadow'        => esc_html__('Regular', 'wpzaro'),
            'shadow-lg'     => esc_html__('Larger', 'wpzaro'),
        ],
    ]
);

//Navbar Parts Section
new \Kirki\Section(
    'section_parts_navbar',
    [
        'title'       => esc_html__('Parts', 'wpzaro'),
        'description' => esc_html__('Navbar Parts settings.', 'wpzaro'),
        'panel'       => 'header_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_menu_header_aligment',
        'label'       => esc_html__('Primary Menu Aligment', 'wpzaro'),
        'section'     => 'section_parts_navbar',
        'default'     => 'ms-md-auto',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose Aligment for menu header.', 'wpzaro'),
        'choices'     => [
            'ms-md-auto'   => esc_html__('Right', 'wpzaro'),
            'me-md-auto'   => esc_html__('Left', 'wpzaro'),
            'mx-md-auto'   => esc_html__('Center', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_searchform_header_type',
        'label'       => esc_html__('Search Form', 'wpzaro'),
        'section'     => 'section_parts_navbar',
        'default'     => 'dropdown',
        'placeholder' => esc_html__('Choose type', 'wpzaro'),
        'description' => esc_html__('Choose type form search.', 'wpzaro'),
        'choices'     => [
            'disable'   => esc_html__('Disable', 'wpzaro'),
            'dropdown'  => esc_html__('Dropdown with icon', 'wpzaro'),
            'inline'    => esc_html__('Inline Form', 'wpzaro'),
            'modal'     => esc_html__('Modal with icon', 'wpzaro'),
        ],
    ]
);

//Footer Panel
new \Kirki\Panel(
    'footer_id',
    [
        'priority'    => 10,
        'title'       => esc_html__('Footer', 'wpzaro'),
        'description' => esc_html__('Theme footer layout setting.', 'wpzaro'),
    ]
);
//Footer full
new \Kirki\Section(
    'section_footerfull',
    [
        'title'       => esc_html__('Footer full', 'wpzaro'),
        'description' => esc_html__('Footer full settings.', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_footerfull_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_footerfull',
        'default'     => 'default',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid, or default', 'wpzaro'),
        'choices'     => [
            'default'         => esc_html__('Default', 'wpzaro'),
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
            'container-fixed' => esc_html__('Fixed width container & content', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_typography_footerfull',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerfull',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-size'     => '14px',
            'color'         => '#686868',
            'text-align'    => 'left',
        ],
        'output'      => [
            [
                'element' => '#wrapper-footer-full',
            ],
        ],
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_background_footerfull',
        'label'       => __('Background Color', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerfull',
        'default'     => [
            'background-color'  => '#e9ecef',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '[data-bs-theme="light"] #wrapper-footer-full',
            ],
        ],
    ]
);
//Footer site info
new \Kirki\Section(
    'section_footerinfo',
    [
        'title'       => esc_html__('Footer site info', 'wpzaro'),
        'description' => esc_html__('Footer site info settings.', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Select(
    [
        'settings'    => 'wpzaro_footersiteinfo_container_type',
        'label'       => esc_html__('Container Type', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'default'     => 'default',
        'placeholder' => esc_html__('Choose an option', 'wpzaro'),
        'description' => esc_html__('Choose between Theme container and container-fluid, or default', 'wpzaro'),
        'choices'     => [
            'default'         => esc_html__('Default', 'wpzaro'),
            'container'       => esc_html__('Fixed width container', 'wpzaro'),
            'container-fluid' => esc_html__('Full width container', 'wpzaro'),
            'container-fixed' => esc_html__('Fixed width container & content', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Textarea(
    [
        'settings'    => 'wpzaro_site_info_override',
        'label'       => esc_html__('Footer Site Info', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'default'     => esc_html__('Copyright © {year} {site_title}. All rights reserved.', 'wpzaro'),
        'description' => esc_html__('Override theme site info located at the footer of the page.use {year} {site_title}', 'wpzaro'),
    ]
);
new \Kirki\Field\Typography(
    [
        'settings'    => 'wpzaro_typography_site_info',
        'label'       => esc_html__('Typography', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'priority'    => 10,
        'transport'   => 'auto',
        'default'     => [
            'font-size'     => '14px',
            'color'         => '#ffffff',
            'text-align'    => 'left',
        ],
        'output'      => [
            [
                'element' => '#wrapper-footer-site-info',
            ],
        ],
    ]
);
new \Kirki\Field\Background(
    [
        'settings'    => 'wpzaro_background_site_info',
        'label'       => __('Background Color', 'wpzaro'),
        'description' => esc_html__('', 'wpzaro'),
        'section'     => 'section_footerinfo',
        'default'     => [
            'background-color'  => '#212529',
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'element' => '[data-bs-theme="light"] #wrapper-footer-site-info',
            ],
        ],
    ]
);

//Footer scroll to top
new \Kirki\Section(
    'section_scrolltotop',
    [
        'title'       => esc_html__('Scroll to Top', 'wpzaro'),
        'description' => esc_html__('Enable button scroll to top', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_scrolltotop_enable',
        'label'       => esc_html__('Enable', 'wpzaro'),
        'section'     => 'section_scrolltotop',
        'default'     => 'on',
        'choices'     => [
            'on'        => esc_html__('Enable', 'wpzaro'),
            'off'       => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Color(
    [
        'settings'    => 'wpzaro_scrolltotop_color',
        'label'       => esc_html__('Color Button', 'wpzaro'),
        'section'     => 'section_scrolltotop',
        'default'     => '#333333',
        'choices'     => [
            'alpha' => true,
        ],
        'transport'   => 'auto',
        'output'      => [
            [
                'choice'    => 'color',
                'element'   => '.footer-scrolltotop .btn',
                'property'  => 'background-color',
            ],
        ],
    ]
);

//Floating Whatsapp
new \Kirki\Section(
    'section_floatwhatsapp',
    [
        'title'       => esc_html__('Whatsapp', 'wpzaro'),
        'description' => esc_html__('Enable button whatsapp', 'wpzaro'),
        'panel'       => 'footer_id',
        'priority'    => 160,
    ]
);
new \Kirki\Field\Checkbox_Switch(
    [
        'settings'    => 'wpzaro_floatwhatsapp_enable',
        'label'       => esc_html__('Disable', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => 'off',
        'choices'     => [
            'on'        => esc_html__('Enable', 'wpzaro'),
            'off'       => esc_html__('Disable', 'wpzaro'),
        ],
    ]
);
new \Kirki\Field\Text(
    [
        'settings'    => 'wpzaro_floatwhatsapp_number',
        'label'       => esc_html__('No Whatsapp', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => '',
        'choices'     => [
            'min'  => 0,
            'step' => 1,
        ],
    ]
);
new \Kirki\Field\Text(
    [
        'settings'    => 'wpzaro_floatwhatsapp_text',
        'label'       => esc_html__('Text Whatsapp', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => 'Whatsapp Us',
    ]
);
new \Kirki\Field\Textarea(
    [
        'settings'    => 'wpzaro_floatwhatsapp_message',
        'label'       => esc_html__('Message', 'wpzaro'),
        'section'     => 'section_floatwhatsapp',
        'default'     => 'Hello..',
    ]
);
