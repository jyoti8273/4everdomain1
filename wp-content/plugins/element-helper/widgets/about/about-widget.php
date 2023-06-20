<?php

namespace ElementHelper\Widget;

use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined('ABSPATH') || die();

class About extends Element_El_Widget
{

    /**
     * Get widget name.
     *
     * Retrieve Element Helper widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'about';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return __('About', 'elementhelper');
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'elh-widget-icon eicon-single-post';
    }

    public function get_keywords()
    {
        return ['info', 'blurb', 'box', 'about', 'content'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls()
    {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __('Design Style', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label' => __('Design Style', 'elementhelper'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'elementhelper'),
                    'style_2' => __('Style 2', 'elementhelper'),
                    'style_3' => __('Style 3', 'elementhelper'),
                    'style_4' => __('Style 4', 'elementhelper'),
                    'style_5' => __('Style 5', 'elementhelper'),
                    'style_6' => __('Style 6', 'elementhelper'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __('Title & Description', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'heading_switch',
            [
                'label' => __('Show', 'elementhelper'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementhelper'),
                'label_off' => __('Hide', 'elementhelper'),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'elementhelper'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __('ElhInfo Box Sub Title', 'elementhelper'),
                'placeholder' => __('Type Info Box Sub Title', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'elementhelper'),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('ElhInfo Box Title', 'elementhelper'),
                'placeholder' => __('Type Info Box Title', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'elementhelper'),
                'description' => elh_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Elhinfo box description goes here', 'elementhelper'),
                'placeholder' => __('Type info box description', 'elementhelper'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __('Title HTML Tag', 'elementhelper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __('H1', 'elementhelper'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => __('H2', 'elementhelper'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => __('H3', 'elementhelper'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => __('H4', 'elementhelper'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => __('H5', 'elementhelper'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => __('H6', 'elementhelper'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h2',
                'toggle' => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => __('Alignment', 'elementhelper'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'elementhelper'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'elementhelper'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'elementhelper'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        // img
        $this->start_controls_section(
            '_section_about_image',
            [
                'label' => __('Image', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __('Big Image', 'elementhelper'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sm_image',
            [
                'label' => __('Small Image', 'elementhelper'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __('Features List', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __('Field condition', 'elementhelper'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __('Style 1', 'elementhelper'),
                    'style_2' => __('Style 2', 'elementhelper'),
                    'style_3' => __('Style 3', 'elementhelper'),
                    'style_4' => __('Style 4', 'elementhelper'),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __('Media Type', 'elementhelper'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __('Icon', 'elementhelper'),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __('Image', 'elementhelper'),
                        'icon' => 'fa fa-image',
                    ],
                ],
                'default' => 'icon',
                'toggle' => false,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __('Image', 'elementhelper'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'medium_large',
                'separator' => 'none',
                'exclude' => [
                    'full',
                    'custom',
                    'large',
                    'shop_catalog',
                    'shop_single',
                    'shop_thumbnail'
                ],
                'condition' => [
                    'type' => 'image'
                ],
            ]
        );

        if (elh_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'elementhelper'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ],
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-smile-wink',
                        'library' => 'fa-solid',
                    ],
                    'condition' => [
                        'type' => 'icon'
                    ],
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Title', 'elementhelper'),
                'default'     => __( 'Title', 'elementhelper' ),
                'placeholder' => __('Type title here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'number',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Number', 'elementhelper'),
                'default'     => __( '25%', 'elementhelper' ),
                'placeholder' => __('Type here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_4']
                ],
            ]
        );

        $repeater->add_control(
            'description',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __('Content', 'elementhelper'),
                'default'     => __( 'App allows users to earn points based on their daily engagement & activities using interesting', 'elementhelper' ),
                'placeholder' => __('Type title here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_3']
                ],
            ]
        );

        $repeater->add_control(
            'f_url',
            [
                'label'       => __( 'Link', 'elementhelper' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'http://elementor.sabber.com', 'elementhelper' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => [
					'url' => 'http://elementor.sabber.com',
					'is_external' => true,
					'nofollow' => true,
				],
                'condition' => [
                    'field_condition' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
                'default' => [
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'image' => [
                            'url' => Utils::get_placeholder_image_src(),
                        ],
                    ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2', 'style_3', 'style_4'],
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'       => __( 'Text', 'elementhelper' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button Text', 'elementhelper' ),
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label'       => __( 'Link', 'elementhelper' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'http://elementor.sabber.com', 'elementhelper' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => [
					'url' => 'http://elementor.sabber.com',
					'is_external' => true,
					'nofollow' => true,
				],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_about_exp',
            [
                'label' => __( 'About Experience', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'about_exp_year',
            [
                'label'       => __( 'Experience Year', 'elementhelper' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( '25', 'elementhelper' ),
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'about_exp_title',
            [
                'label'       => __( 'Experience Title', 'elementhelper' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Years Experience', 'elementhelper' ),
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_about_author',
            [
                'label' => __( 'About Author', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_5'],
                ],
            ]
        );

        $this->add_control(
            'about_author_desc',
            [
                'label'       => __( 'Author Comment', 'elementhelper' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Help support language! Our dedicated team professional dictionary editors work to provide you with accurate', 'elementhelper' ),
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'about_author_name',
            [
                'label'       => __( 'Author Comment', 'elementhelper' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Rosalina D.', 'elementhelper' ),
                'placeholder' => __( 'Type text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'about_author_designation',
            [
                'label'       => __( 'Author Designation', 'elementhelper' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Founder', 'elementhelper' ),
                'placeholder' => __( 'Type designation', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

}

    /**
     * Register styles related controls
     */
    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_media_style',
            [
                'label' => __('Icon / Image', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label' => __('Offset', 'elementhelper'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'elementhelper'),
                'label_on' => __('Custom', 'elementhelper'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'media_offset_x',
            [
                'label' => __('Offset Left', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'render_type' => 'ui',
            ]
        );

        $this->add_responsive_control(
            'media_offset_y',
            [
                'label' => __('Offset Top', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'offset_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    // Media translate styles
                    '(desktop){{WRAPPER}} .feat-app img , (desktop){{WRAPPER}} .capabilities__thumb, (desktop){{WRAPPER}} .achievement__thumb img' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .about__thumb img, (tablet){{WRAPPER}} .capabilities__thumb, (tablet){{WRAPPER}} .achievement__thumb img' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .about__thumb img, (mobile){{WRAPPER}} .capabilities__thumb, (mobile){{WRAPPER}} .achievement__thumb img' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Body text styles
                    '{{WRAPPER}} .about__thumb,{{WRAPPER}} .capabilities__thumb, {{WRAPPER}} .achievement__thumb img' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'media_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .feat-app, {{WRAPPER}} .achievement__thumb' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'media_padding',
            [
                'label' => __('Padding', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .feat-app, {{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'media_border',
                'selector' => '{{WRAPPER}} .feat-app img, {{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb img',
            ]
        );

        $this->add_responsive_control(
            'media_border_radius',
            [
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feat-app img, {{WRAPPER}} .achievement__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'media_box_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .feat-app img, {{WRAPPER}} .about__thumb i, {{WRAPPER}} .achievement__thumb img'
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __('Background Rotate', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'default' => [
                    'unit' => 'deg',
                ],
                'range' => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors' => [
                    // Icon rotate styles
                    '{{WRAPPER}} .feat-app img' => '-ms-transform: rotate(-{{SIZE}}{{UNIT}}); -webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                    // Icon box transform styles
                    '(desktop){{WRAPPER}} .about__thumb,(desktop){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(tablet){{WRAPPER}} .about__thumb,(tablet){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(mobile){{WRAPPER}} .about__thumb,(mobile){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg);',
                ],
            ]
        );

        $this->end_controls_section();

        // Title & Description style
        $this->start_controls_section(
            '_section_title_style',
            [
                'label' => __('Title & Description', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Box Padding', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .features-right, {{WRAPPER}} .tt-content, {{WRAPPER}} .achievement__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'elementhelper'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'sub_title_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .features-right .section-title span,{{WRAPPER}} .tt-content .section-title span, {{WRAPPER}} .section__title-3 span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => __('Sub Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-right .section-title span,{{WRAPPER}} .tt-content .section-title span, {{WRAPPER}} .section__title-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'sub_title_typography',
                'label' => __('Typography', 'elementhelper'),
                'selector' => '{{WRAPPER}} .features-right .section-title span,{{WRAPPER}} .tt-content .section-title span, {{WRAPPER}} .section__title-3 span',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'elementhelper'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .features-right .section-title h2,{{WRAPPER}} .tt-content .section-title h2, {{WRAPPER}} .section__title-3 h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-right .section-title h2,{{WRAPPER}} .tt-content .section-title h2, {{WRAPPER}} .section__title-3 h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Typography', 'elementhelper'),
                'selector' => '{{WRAPPER}} .features-right .section-title h2,{{WRAPPER}} .tt-content .section-title h2, {{WRAPPER}} .section__title-3 h2',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Description', 'elementhelper'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .features-right p, {{WRAPPER}} .tt-content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features-right p, {{WRAPPER}} .tt-content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Typography', 'elementhelper'),
                'selector' => '{{WRAPPER}} .features-right p, {{WRAPPER}} .tt-content p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('List Item', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_icon_size',
            [
                'label' => __('Size', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .feat-box i,{{WRAPPER}} .tt-list i,{{WRAPPER}} .achievement__item i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'item_typography',
                'selector' => '{{WRAPPER}} .feat-box h4, {{WRAPPER}} .tt-list li, {{WRAPPER}} .achievement__item h3',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .feat-box h4,{{WRAPPER}} .tt-list li, {{WRAPPER}} .achievement__item i',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feat-box,{{WRAPPER}} .tt-list li, {{WRAPPER}} .achievement__item i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .feat-box,{{WRAPPER}} .tt-list li, {{WRAPPER}} .achievement__item i',
            ]
        );

        $this->add_control(
            'hr_2',
            [
                'type' => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs('_tabs_button');

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __('Normal', 'elementhelper'),
            ]
        );

        $this->add_control(
            'item_link_color_2',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_border_color_2',
            [
                'label' => __('Border Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_bg_color_2',
            [
                'label' => __('Background Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_translate_2',
            [
                'label' => __('Icon Translate X', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_button_hover',
            [
                'label' => __('Hover', 'elementhelper'),
            ]
        );

        $this->add_control(
            'link_hover_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label' => __('Border Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i, {{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_icon_translate',
            [
                'label' => __('Icon Translate X', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'size' => 0
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_btn',
            [
                'label' => __('Button', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'btn_icon_size',
            [
                'label' => __('Icon Size', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tt-btn .thm-btn i, {{WRAPPER}} .achievement__content .z-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .tt-btn .thm-btn, {{WRAPPER}} .achievement__content .z-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'selector' => '{{WRAPPER}} .tt-btn .thm-btn, {{WRAPPER}} .achievement__content .z-btn',
            ]
        );

        $this->add_control(
            'btn_border_radius',
            [
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tt-btn .thm-btn, {{WRAPPER}} .achievement__content .z-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'selector' => '{{WRAPPER}} .tt-btn .thm-btn, {{WRAPPER}} .achievement__content .z-btn',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $title = elh_element_kses_basic($settings['title']);

        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }

        if ($settings['design_style'] === 'style_6'):
        if (!empty($settings['sm_image']['id'])) {
            $sm_image = wp_get_attachment_image_url($settings['sm_image']['id'], $settings['thumbnail_size']);
        }
    ?>

    <section class="fun-fact-area">
        <div class="container">
            <div class="ff-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <?php if (!empty($bg_image)): ?>
                        <div class="fun-fact-img mb-30">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="fun-fact-content mb-30">
                            <div class="section-title">
                                <?php if (!empty($settings['sub_title'])): ?>
                                <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                                <?php endif; ?>
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                            </div>
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($settings['slides'])): ?>
                            <div class="ff-count pt-20">
                                <div class="row">
                                    <?php foreach ($settings['slides'] as $slide): ?>
                                    <div class="col-6">
                                        <div class="ff-count-single">
                                            <div class="ff-icon">
                                            <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                                $this->get_render_attribute_string('image');
                                                $slide['hover_animation'] = 'disable-animation'; ?>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                            <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                                <?php elh_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                            <?php endif; ?>
                                            </div>
                                            <div class="ff-count-text">
                                                <h3><?php echo elh_element_kses_basic($slide['number']); ?></h3>
                                                <span><?php echo elh_element_kses_basic($slide['title']); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php elseif ($settings['design_style'] === 'style_5'):
        if (!empty($settings['sm_image']['id'])) {
            $sm_image = wp_get_attachment_image_url($settings['sm_image']['id'], $settings['thumbnail_size']);
        }
    ?>

    <section class="about-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left mb-30">
                        <?php if (!empty($bg_image)): ?>
                        <div class="about-big-img">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($sm_image)): ?>
                        <div class="about-sml-img">
                            <img src="<?php echo esc_url($sm_image); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                        <div class="about-left-text text-center">
                            <?php if(!empty ($settings['about_exp_year'])) : ?>
                            <h3><?php echo esc_html($settings['about_exp_year']); ?><span>+</span></h3>
                            <?php endif; ?>
                            <?php if(!empty ($settings['about_exp_title'])) : ?>
                            <p><?php echo esc_html($settings['about_exp_title']); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right mb-30">
                        <div class="section-title mb-20">
                            <?php if (!empty($settings['sub_title'])): ?>
                            <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                            <?php if (!empty($settings['description'])): ?>
                            <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="about-bq-box mb-40">
                            <?php if (!empty($settings['about_author_desc'])): ?>
                            <p><?php echo elh_element_kses_intermediate($settings['about_author_desc']); ?></p>
                            <?php endif; ?>
                            <span>
                            <?php if (!empty($settings['about_author_name'])): ?>
                            <span><?php echo esc_html($settings['about_author_name']); ?></span>
                            <?php endif; ?>
                            <?php if (!empty($settings['about_author_designation'])): ?>
                             -
                             <?php echo esc_html($settings['about_author_designation']); ?></span>
                             <?php endif; ?>
                        </div>
                        <?php if (!empty($settings['slides'])): ?>
                        <div class="row">
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <div class="col-md-6 col-sm-6 col-12">
                                <div class="about-box-text">
                                    <h4><?php echo elh_element_kses_basic($slide['title']); ?></h4>
                                    <p><?php echo elh_element_kses_basic($slide['description']); ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php elseif ($settings['design_style'] === 'style_4'): ?>
    <section class="core-features left-white-bg pb-90">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php if (!empty($bg_image)): ?>
                    <div class="core-feature-img duxin-animate mb-30">
                        <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <div class="core-feature-tight mb-30">
                        <div class="section-title">
                            <?php if (!empty($settings['sub_title'])): ?>
                            <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <?php if (!empty($settings['slides'])): ?>
                        <div class="row mb-10">
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                                <div class="c-feature-box text-center mb-20">
                                    <div class="c-feat-icon">
                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                        $this->get_render_attribute_string('image');
                                        $slide['hover_animation'] = 'disable-animation'; ?>
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                        <?php elh_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                    <?php endif; ?>
                                    </div>
                                    <h4><?php echo elh_element_kses_basic($slide['title']); ?></h4>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <?php if (!empty($settings['description'])): ?>
                        <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_text'])): ?>
                        <div class="c-feat-btn pt-25">
                            <a class="thm-btn white-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><?php echo esc_html($settings['button_text']); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php elseif ($settings['design_style'] === 'style_3'): ?>
    <section class="time-track-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <?php if (!empty($bg_image)): ?>
                    <div class="tt-app mb-30 duxin-animate">
                        <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <div class="tt-content mb-30">
                        <div class="section-title mb-20">
                            <?php if (!empty($settings['sub_title'])): ?>
                            <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <?php if (!empty($settings['description'])): ?>
                        <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['slides'])): ?>
                        <ul class="tt-list pt-40">
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <li><i class="ti-check"></i> <?php echo elh_element_kses_basic($slide['title']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_text'])): ?>
                        <div class="tt-btn pt-50">
                            <a class="thm-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><i class="ti-arrow-right"></i> <?php echo esc_html($settings['button_text']); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php elseif ($settings['design_style'] === 'style_2'):
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }
    ?>
    <section class="time-track-area">
        <div class="container">
            <div class="row flex-row-reverse align-items-center">
                <div class="col-lg-6">
                    <?php if (!empty($bg_image)): ?>
                    <div class="tt-app mb-30 duxin-animate">
                        <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="col-lg-6">
                    <div class="tt-content mb-30">
                        <div class="section-title mb-20">
                            <?php if (!empty($settings['sub_title'])): ?>
                            <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <?php if (!empty($settings['description'])): ?>
                        <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['slides'])): ?>
                        <ul class="tt-list pt-40">
                            <?php foreach ($settings['slides'] as $slide): ?>
                            <li><i class="ti-check"></i> <?php echo elh_element_kses_basic($slide['title']); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_text'])): ?>
                        <div class="tt-btn pt-50">
                            <a class="thm-btn" href="<?php echo esc_url($settings['button_link']['url']); ?>"><i class="ti-arrow-right"></i> <?php echo esc_html($settings['button_text']); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else:
        if (!empty($settings['bg_image']['id'])) {
            $bg_image = wp_get_attachment_image_url($settings['bg_image']['id'], $settings['thumbnail_size']);
        }
    ?>

    <section class="features-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="features-left text-center mb-30">
                        <?php if (!empty($bg_image)): ?>
                        <div class="feat-app duxin-animate">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="features-right mb-30">
                        <div class="section-title mb-20">
                            <?php if (!empty($settings['sub_title'])): ?>
                            <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                            <?php endif; ?>
                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>
                        </div>
                        <?php if (!empty($settings['description'])): ?>
                        <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                        <?php endif; ?>
                        <?php if (!empty($settings['slides'])): ?>
                        <div class="row mt-40">
                        <?php foreach ($settings['slides'] as $slide): ?>
                            <div class="col-md-6">
                                <div class="feat-box mb-20">
                                    <div class="feat-icon">
                                    <?php if ($slide['type'] === 'image' && ($slide['image']['url'] || $slide['image']['id'])) :
                                        $this->get_render_attribute_string('image');
                                        $slide['hover_animation'] = 'disable-animation'; ?>
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($slide, 'thumbnail', 'image'); ?>
                                    <?php elseif (!empty($slide['icon']) || !empty($slide['selected_icon']['value'])) : ?>
                                        <?php elh_element_render_icon($slide, 'icon', 'selected_icon'); ?>
                                    <?php endif; ?>
                                    </div>
                                    <?php if (!empty($slide['title'])) : ?>
                                    <h4><?php echo elh_element_kses_basic($slide['title']); ?></h4>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['f_url'])) : ?>
                                    <a href="<?php echo esc_url($slide['f_url']['url']) ?>"><span><i class="ti-arrow-top-right"></i></span></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>
        <?php
    }
}
