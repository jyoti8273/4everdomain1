<?php

namespace elementhelper\Widget;

use Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Hero extends Element_El_Widget {

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
    public function get_name() {
        return 'hero';
    }

    /**
     * Get widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title() {
        return __( 'Hero', 'elementhelper' );
    }

    /**
     * Get widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon() {
        return 'elh-widget-icon eicon-single-post';
    }

    public function get_keywords() {
        return ['hero', 'blurb', 'infobox', 'content', 'block', 'box'];
    }

    /**
     * Register content related controls
     */
    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'design_style',
            [
                'label'              => __( 'Design Style', 'elementhelper' ),
                'type'               => Controls_Manager::SELECT,
                'options'            => [
                    'style_1' => __( 'Style 1', 'elementhelper' ),
                    'style_2' => __( 'Style 2', 'elementhelper' ),
                    'style_3' => __( 'Style 3', 'elementhelper' ),
                ],
                'default'            => 'style_1',
                'frontend_available' => true,
                'style_transfer'     => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label'       => __( 'Sub Title', 'elementhelper' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Sub Title', 'elementhelper' ),
                'placeholder' => __( 'Sub Title', 'elementhelper' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'design_style' => ['style_1','style_2'],
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label'       => __( 'Title', 'elementhelper' ),
                'label_block' => true,
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Title', 'elementhelper' ),
                'placeholder' => __( 'Type Title', 'elementhelper' ),
                'dynamic'     => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label'       => __( 'Description', 'elementhelper' ),
                'description' => elh_element_get_allowed_html_desc( 'intermediate' ),
                'type'        => Controls_Manager::TEXTAREA,
                'default'     => __( 'Description goes here', 'elementhelper' ),
                'placeholder' => __( 'Type info box description', 'elementhelper' ),
                'rows'        => 5,
                'dynamic'     => [
                    'active' => true,
                ],
                'condition'   => [
                    'design_style' => ['style_2','style_3'],
                ],
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label'   => __( 'Title HTML Tag', 'elementhelper' ),
                'type'    => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => __( 'H1', 'elementhelper' ),
                        'icon'  => 'eicon-editor-h1',
                    ],
                    'h2' => [
                        'title' => __( 'H2', 'elementhelper' ),
                        'icon'  => 'eicon-editor-h2',
                    ],
                    'h3' => [
                        'title' => __( 'H3', 'elementhelper' ),
                        'icon'  => 'eicon-editor-h3',
                    ],
                    'h4' => [
                        'title' => __( 'H4', 'elementhelper' ),
                        'icon'  => 'eicon-editor-h4',
                    ],
                    'h5' => [
                        'title' => __( 'H5', 'elementhelper' ),
                        'icon'  => 'eicon-editor-h5',
                    ],
                    'h6' => [
                        'title' => __( 'H6', 'elementhelper' ),
                        'icon'  => 'eicon-editor-h6',
                    ],
                ],
                'default' => 'h2',
                'toggle'  => false,
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label'     => __( 'Alignment', 'elementhelper' ),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'   => [
                        'title' => __( 'Left', 'elementhelper' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementhelper' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'  => [
                        'title' => __( 'Right', 'elementhelper' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'toggle'    => true,
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_cf7',
            [
                'label' => elh_element_is_cf7_activated() ? __('Contact Form 7', 'elementhelper') : __('Missing Notice', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        if (!elh_element_is_cf7_activated()) {
            $this->add_control(
                '_cf7_missing_notice',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => sprintf(
                        __('Hello %2$s, looks like %1$s is missing in your site. Please click on the link below and install/activate %1$s. Make sure to refresh this page after installation or activation.', 'elementhelper'),
                        '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term'))
                        . '" target="_blank" rel="noopener">Contact Form 7</a>',
                        elh_element_get_current_user_display_name()
                    ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                ]
            );

            $this->add_control(
                '_cf7_install',
                [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<a href="' . esc_url(admin_url('plugin-install.php?s=Contact+Form+7&tab=search&type=term')) . '" target="_blank" rel="noopener">Click to install or activate Contact Form 7</a>',
                ]
            );
            $this->end_controls_section();
            return;
        }

        $this->add_control(
            'form_id',
            [
                'label' => __('Select Your Form', 'elementhelper'),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => ['' => __('', 'elementhelper')] + \elh_element_get_cf7_forms(),
            ]
        );

        $this->add_control(
            'html_class',
            [
                'label' => __('HTML Class', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'description' => __('Add CSS custom class to the form.', 'elementhelper'),
            ]
        );

        $this->end_controls_section();

        // img
        $this->start_controls_section(
            '_section_image',
            [
                'label' => __( 'Image', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'big_image',
            [
                'label'     => __( 'Big Image', 'elementhelper' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2', 'style_3'],
                ],
            ]
        );

        $this->add_control(
            'hero_img_1',
            [
                'label'     => __( 'Hero Image 1', 'elementhelper' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'hero_img_2',
            [
                'label'     => __( 'Hero Image 2', 'elementhelper' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name'      => 'thumbnail',
                'default'   => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'download_button',
            [
                'label' => __( 'Download Button', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1'],
                ],
            ]
        );

        $this->add_control(
            'db_text',
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
            'bd_img_1',
            [
                'label'     => __( 'Image', 'elementhelper' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'bd_img_1_link',
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
        

        $this->add_control(
            'bd_img_2',
            [
                'label'     => __( 'Image', 'elementhelper' ),
                'type'      => Controls_Manager::MEDIA,
                'default'   => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic'   => [
                    'active' => true,
                ],
            ]
        );

        $this->add_control(
            'bd_img_2_link',
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
            '_section_button',
            [
                'label' => __( 'Button', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2', 'style_3'],
                ],
            ]
        );

        $this->add_control(
            'button1_text',
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
            'button1_link',
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

        $this->add_control(
            'button2_text',
            [
                'label'       => __( 'Text', 'elementhelper' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => __( 'Button Text', 'elementhelper' ),
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic'     => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_2'],
                ],
            ]
        );

        $this->add_control(
            'button2_link',
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
                    'design_style' => ['style_2'],
                ],
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            '_section_setting',
            [
                'label' => __( 'Settings', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
			'show_shape1',
			[
				'label' => __( 'Show Shape 1', 'elementhelper' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'show_shape2',
			[
				'label' => __( 'Show Shape 2', 'elementhelper' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->end_controls_section();
    }

    /**
     * Register styles related controls
     */
    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_media_style',
            [
                'label' => __( 'Icon / Image', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'offset_toggle',
            [
                'label'        => __( 'Offset', 'elementhelper' ),
                'type'         => Controls_Manager::POPOVER_TOGGLE,
                'label_off'    => __( 'None', 'elementhelper' ),
                'label_on'     => __( 'Custom', 'elementhelper' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'media_offset_x',
            [
                'label'       => __( 'Offset Left', 'elementhelper' ),
                'type'        => Controls_Manager::SLIDER,
                'size_units'  => ['px'],
                'condition'   => [
                    'offset_toggle' => 'yes',
                ],
                'range'       => [
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
                'label'      => __( 'Offset Top', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition'  => [
                    'offset_toggle' => 'yes',
                ],
                'range'      => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                ],
                'selectors'  => [
                    // Media translate styles
                    '(desktop){{WRAPPER}} .banner-right img , (desktop){{WRAPPER}} .capabilities__thumb, (desktop){{WRAPPER}} .banner-right img' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .banner-right img, (tablet){{WRAPPER}} .capabilities__thumb, (tablet){{WRAPPER}} .banner-right img'     => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .banner-right img, (mobile){{WRAPPER}} .capabilities__thumb, (mobile){{WRAPPER}} .banner-right img'     => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Body text styles
                    '{{WRAPPER}} .banner-right,{{WRAPPER}} .capabilities__thumb, {{WRAPPER}} .banner-right img'=> 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'media_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-right, {{WRAPPER}} .banner-right' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'media_padding',
            [
                'label'      => __( 'Padding', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-right, {{WRAPPER}} .banner-right i, {{WRAPPER}} .banner-right' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'media_border',
                'selector' => '{{WRAPPER}} .banner-right img, {{WRAPPER}} .banner-right i, {{WRAPPER}} .banner-right img',
            ]
        );

        $this->add_responsive_control(
            'media_border_radius',
            [
                'label'      => __( 'Border Radius', 'elementhelper' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-right img, {{WRAPPER}} .banner-right img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .banner-right i, {{WRAPPER}} .banner-right img'   => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'media_box_shadow',
                'exclude'  => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .banner-right img, {{WRAPPER}} .banner-right i, {{WRAPPER}} .achievement__thumb img',
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label'      => __( 'Background Rotate', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'default'    => [
                    'unit' => 'deg',
                ],
                'range'      => [
                    'deg' => [
                        'min' => 0,
                        'max' => 360,
                    ],
                ],
                'selectors'  => [
                    // Icon rotate styles
                    '{{WRAPPER}} .about__thumb img'                                               => '-ms-transform: rotate(-{{SIZE}}{{UNIT}}); -webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                    // Icon box transform styles
                    '(desktop){{WRAPPER}} .about__thumb,(desktop){{WRAPPER}} .achievement__thumb' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(tablet){{WRAPPER}} .about__thumb,(tablet){{WRAPPER}} .achievement__thumb'   => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(mobile){{WRAPPER}} .about__thumb,(mobile){{WRAPPER}} .achievement__thumb'   => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg);',
                ],
            ]
        );

        $this->end_controls_section();

        // Title & Description style
        $this->start_controls_section(
            '_section_title_style',
            [
                'label' => __( 'Title & Description', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label'      => __( 'Content Box Padding', 'elementhelper' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-content, {{WRAPPER}} .capabilities__content, {{WRAPPER}} .achievement__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_heading',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Sub Title', 'elementhelper' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'sub_title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-content span,{{WRAPPER}} .section__title span, {{WRAPPER}} .section__title-3 span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label'     => __( 'Sub Text Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-content span,{{WRAPPER}} .section__title span, {{WRAPPER}} .section__title-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'sub_title_typography',
                'label'    => __( 'Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .banner-content span,{{WRAPPER}} .section__title span, {{WRAPPER}} .section__title-3 span',
                'scheme'   => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            'title_heading',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Title', 'elementhelper' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-content .section__title,{{WRAPPER}} .section__title-2, {{WRAPPER}} .section__title-3' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => __( 'Text Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-content .section__title,{{WRAPPER}} .section__title-2, {{WRAPPER}} .section__title-3' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'title_typography',
                'label'    => __( 'Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .banner-content .section__title,{{WRAPPER}} .section__title-2, {{WRAPPER}} .section__title-3',
                'scheme'   => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'type'      => Controls_Manager::HEADING,
                'label'     => __( 'Description', 'elementhelper' ),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label'      => __( 'Bottom Spacing', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-content p, {{WRAPPER}} .achievement__content p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label'     => __( 'Text Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-content p, {{WRAPPER}} .achievement__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'description_typography',
                'label'    => __( 'Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .banner-content p, {{WRAPPER}} .achievement__content p',
                'scheme'   => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'List Item', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'item_icon_size',
            [
                'label'      => __( 'Size', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .achievement__item i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'item_typography',
                'selector' => '{{WRAPPER}} .about__list ul li span, {{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3',
                'scheme'   => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'item_border',
                'selector' => '{{WRAPPER}} .about__list ul li span,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item i',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label'      => __( 'Border Radius', 'elementhelper' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker, {{WRAPPER}} .achievement__item i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker, {{WRAPPER}} .achievement__item i',
            ]
        );

        $this->add_control(
            'hr_2',
            [
                'type'  => Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );

        $this->start_controls_tabs( '_tabs_button' );

        $this->start_controls_tab(
            '_tab_button_normal',
            [
                'label' => __( 'Normal', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'item_link_color_2',
            [
                'label'     => __( 'Text Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_border_color_2',
            [
                'label'     => __( 'Border Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'item_bg_color_2',
            [
                'label'     => __( 'Background Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li span i,{{WRAPPER}} .capabilities__list ol li::marker,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3, {{WRAPPER}} .achievement__item i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_translate_2',
            [
                'label'     => __( 'Icon Translate X', 'elementhelper' ),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
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
                'label' => __( 'Hover', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'link_hover_color',
            [
                'label'     => __( 'Text Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label'     => __( 'Border Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label'     => __( 'Background Color', 'elementhelper' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about__list ul li:hover span i, {{WRAPPER}} .about__list ul li:hover span i,{{WRAPPER}} .capabilities__list ol li::marker,,{{WRAPPER}} .capabilities__list ol li, {{WRAPPER}} .achievement__item h3:hover, {{WRAPPER}} .achievement__item i:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_icon_translate',
            [
                'label'     => __( 'Icon Translate X', 'elementhelper' ),
                'type'      => Controls_Manager::SLIDER,
                'default'   => [
                    'size' => 0,
                ],
                'range'     => [
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
                'label' => __( 'Button', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'btn_icon_size',
            [
                'label'      => __( 'Icon Size', 'elementhelper' ),
                'type'       => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range'      => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors'  => [
                    '{{WRAPPER}} .banner-btn .thm-btn i, {{WRAPPER}} .achievement__content .thm-btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'btn_typography',
                'selector' => '{{WRAPPER}} .banner-btn .thm-btn, {{WRAPPER}} .achievement__content .thm-btn',
                'scheme'   => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Button Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-btn .thm-btn-2, {{WRAPPER}} .banner-btn .thm-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color',
            [
                'label' => __( 'Button Bg Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-btn .thm-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_color2',
            [
                'label' => __( 'Button 2 Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-btn .thm-btn-2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'btn_bg_color2',
            [
                'label' => __( 'Button 2 Bg Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .banner-btn .thm-btn-2' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name'     => 'btn_border',
                'selector' => '{{WRAPPER}} .banner-btn .thm-btn, {{WRAPPER}} .achievement__content .thm-btn',
            ]
        );

        $this->add_control(
            'btn_border_radius',
            [
                'label'      => __( 'Border Radius', 'elementhelper' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .banner-btn .thm-btn, {{WRAPPER}} .achievement__content .thm-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'     => 'btn_box_shadow',
                'selector' => '{{WRAPPER}} .banner-btn .thm-btn, {{WRAPPER}} .achievement__content .thm-btn',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $title = elh_element_kses_basic( $settings['title'] );
        ?>

        <?php
            if ( $settings['design_style'] === 'style_3' ):

            if ( !empty( $settings['big_image']['id'] ) ) {
                $big_image = wp_get_attachment_image_url( $settings['big_image']['id'], $settings['thumbnail_size'] );
            }

            $this->add_render_attribute( 'title', 'class', 'section__title' );
            $this->add_render_attribute( 'title', '', '' );
        ?>
        <section class="banner-area banner-3">
            <div class="hero-bg-img banner-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-10">
                            <div class="banner-content pt-100">
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                                <?php if ($settings['description']) : ?>
                                <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>
                                <?php if ($settings['button1_text']) : ?>
                                <div class="banner-btn">
                                    <a class="thm-btn thm-btn-2" href="<?php echo esc_url($settings['button1_link']['url']); ?>"><?php echo esc_html($settings['button1_text']); ?></a>
                                </div>
                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                    <?php if ( !empty( $big_image ) ): ?>
                    <div class="banner-right duxin-animate">
                        <img src="<?php echo esc_url( $big_image ); ?>" alt="img">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
            elseif ( $settings['design_style'] === 'style_2' ):

            if ( !empty( $settings['big_image']['id'] ) ) {
                $big_image = wp_get_attachment_image_url( $settings['big_image']['id'], $settings['thumbnail_size'] );
            }

            $this->add_render_attribute( 'title', '', '' );
            $this->add_render_attribute( 'title', 'class', 'section__title' );
        ?>
        <section class="banner-area banner-2">
            <div class="hero-bg-img banner-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 col-md-10">
                            <div class="banner-content pt-100">
                                <?php if ($settings['sub_title']) : ?>
                                <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                                <?php endif; ?>
                                <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape($settings['title_tag']),
                                    $this->get_render_attribute_string('title'),
                                    $title
                                ); ?>
                                <?php if ($settings['description']) : ?>
                                <p><?php echo elh_element_kses_intermediate($settings['description']); ?></p>
                                <?php endif; ?>
                                
                                <div class="banner-btn">
                                    <?php if ($settings['button1_text']) : ?>
                                    <a class="thm-btn thm-btn-2" href="<?php echo esc_url($settings['button1_link']['url']); ?>"><?php echo esc_html($settings['button1_text']); ?></a>
                                    <?php endif; ?>
                                    <?php if ($settings['button2_text']) : ?>
                                    <a class="thm-btn border-btn" href="<?php echo esc_url($settings['button2_link']['url']); ?>"><?php echo esc_html($settings['button2_text']); ?></a>
                                    <?php endif; ?>
                                </div>  

                            </div>
                        </div>
                    </div>
                    <?php if ( !empty( $big_image ) ): ?>
                    <div class="banner-right">
                        <img src="<?php echo esc_url( $big_image ); ?>" alt="img">
                    </div>
                    <?php endif; ?>
                </div>
                <div class="banner-shape">
                    <?php if ( 'yes' === $settings['show_shape1'] ) : ?>
                    <img class="shape-1" src="<?php print get_template_directory_uri(); ?>/assets/img/shape/banner-shape-01.png" alt="img">
                    <?php endif; ?>
                    <?php if ( 'yes' === $settings['show_shape2'] ) : ?>
                    <img class="shape-2" src="<?php print get_template_directory_uri(); ?>/assets/img/shape/banner-shape-02.png" alt="img">
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php else:
            if (!elh_element_is_cf7_activated()) {
                return;
            }
            if ( !empty( $settings['hero_img_1']['id'] ) ) {
                $hero_img_1 = wp_get_attachment_image_url( $settings['hero_img_1']['id'], $settings['thumbnail_size'] );
            }
            if ( !empty( $settings['hero_img_2']['id'] ) ) {
                $hero_img_2 = wp_get_attachment_image_url( $settings['hero_img_2']['id'], $settings['thumbnail_size'] );
            }
            if ( !empty( $settings['bd_img_1']['id'] ) ) {
                $bd_img_1 = wp_get_attachment_image_url( $settings['bd_img_1']['id'], $settings['thumbnail_size'] );
            }
            if ( !empty( $settings['bd_img_2']['id'] ) ) {
                $bd_img_2 = wp_get_attachment_image_url( $settings['bd_img_2']['id'], $settings['thumbnail_size'] );
            }
            $this->add_inline_editing_attributes( 'title', '' );
            $this->add_render_attribute( 'title', 'class', 'section__title' );
        ?>

        <!-- banner start -->
        <section class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="banner-content pt-100">
                            <?php if ($settings['sub_title']) : ?>
                            <span><?php echo elh_element_kses_intermediate($settings['sub_title']); ?></span>
                            <?php endif; ?>

                            <?php printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                $title
                            ); ?>

                            <div class="subscribe-form mb-30">
                                <?php if (!empty($settings['form_id'])) {
                                    echo elh_element_do_shortcode('contact-form-7', [
                                        'id' => $settings['form_id'],
                                        'html_class' => 'elh-cf7-form ' . elh_element_sanitize_html_class_param($settings['html_class']),
                                    ]);
                                }
                                ?>
                            </div>

                            <div class="get-app">
                                <?php if ($settings['db_text']) : ?>
                                <div class="dn-text">
                                    <span><?php echo $settings['db_text']; ?></span>
                                </div>
                                <?php endif; ?>
                                <?php if ( !empty( $bd_img_1 ) ): ?>
                                <a href="<?php echo esc_url($settings['bd_img_2_link']['url']); ?>">
                                    <img src="<?php echo esc_url( $bd_img_1 ); ?>" alt="img">
                                </a>
                                <?php endif; ?>
                                <?php if ( !empty( $bd_img_2 ) ): ?>
                                <a href="<?php echo esc_url($settings['bd_img_2_link']['url']); ?>">
                                    <img src="<?php echo esc_url( $bd_img_2 ); ?>" alt="img">
                                </a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-right">
                            <?php if ( !empty( $hero_img_1 ) ): ?>
                            <div class="banner-img-1 duxin-animate">
                                <img src="<?php echo esc_url( $hero_img_1 ); ?>" alt="img">
                            </div>
                            <?php endif; ?>
                            <?php if ( !empty( $hero_img_2 ) ): ?>
                            <div class="banner-img-2 duxin-animate duxin-animate-2">
                                <img src="<?php echo esc_url( $hero_img_2 ); ?>" alt="img">
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- banner end -->
        <?php endif;?>
        <?php
}
}
