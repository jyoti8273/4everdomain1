<?php
namespace ElementHelper\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;

defined( 'ABSPATH' ) || die();

class Service extends Element_El_Widget {

    /**
     * Get widget name.
     *
     * Retrieve Element Helper widget name.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'service';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Service', 'elementhelper' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.sabber.com/widgets/icon-box/';
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'elh-widget-icon eicon-preview-medium';
    }

    public function get_keywords() {
        return [ 'service', 'list', 'icon' ];
    }

    protected function register_content_controls() {

        $this->start_controls_section(
            '_section_design_title',
            [
                'label' => __( 'Design Style', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 
            'design_style',
            [
                'label' => __( 'Design Style', 'elementhelper' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'elementhelper' ),
                    'style_2' => __( 'Style 2', 'elementhelper' ),
                    'style_3' => __( 'Style 3', 'elementhelper' ),
                    'style_4' => __( 'Style 4', 'elementhelper' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();        

        // section title
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Heading', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_2'
                ],
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'ElhInfo Box Sub Title', 'elementhelper' ),
                'placeholder' => __( 'Type Info Box Sub Title', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'ElhInfo Box Title', 'elementhelper' ),
                'placeholder' => __( 'Type Info Box Title', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'desccription',
            [
                'label' => __( 'Desccription', 'elementhelper' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( 'Heading Desccription Text', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => __( 'Title HTML Tag', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1'  => [
                        'title' => __( 'H1', 'elementhelper' ),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2'  => [
                        'title' => __( 'H2', 'elementhelper' ),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3'  => [
                        'title' => __( 'H3', 'elementhelper' ),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4'  => [
                        'title' => __( 'H4', 'elementhelper' ),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5'  => [
                        'title' => __( 'H5', 'elementhelper' ),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6'  => [
                        'title' => __( 'H6', 'elementhelper' ),
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
                'label' => __( 'Alignment', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementhelper' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementhelper' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementhelper' ),
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

        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_2'
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Text', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'elementhelper' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.sabber.com/',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
                'button_icon',
                [
                    'label' => __( 'Icon', 'elementhelper' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button_icon!' => ''];
        } else {
            $this->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'before' => [
                        'title' => __( 'Before', 'elementhelper' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'after' => [
                        'title' => __( 'After', 'elementhelper' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'before',
                'toggle' => false,
                'condition' => $condition,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'condition' => $condition,
                'selectors' => [
                    '{{WRAPPER}} .elh-btn--icon-before .elh-btn-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .elh-btn--icon-after .elh-btn-icon' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section(); 

        // _section_icon

        $this->start_controls_section(
            '_section_icon',
            [
                'label' => __( 'Services List', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'elementhelper' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'style_1' => __( 'Style 1', 'elementhelper' ),
                    'style_2' => __( 'Style 2', 'elementhelper' ),
                    'style_3' => __( 'Style 3', 'elementhelper' ),
                    'style_4' => __( 'Style 4', 'elementhelper' ),
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'type',
            [
                'label' => __( 'Media Type', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'icon' => [
                        'title' => __( 'Icon', 'elementhelper' ),
                        'icon' => 'fa fa-smile-o',
                    ],
                    'image' => [
                        'title' => __( 'Image', 'elementhelper' ),
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
                'label' => __( 'Image', 'elementhelper' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'type' => 'image'
                ],
                'dynamic' => [
                    'active' => true,
                ]
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
                ]
            ]
        );

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'elementhelper' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } 
        else {
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
                    ]
                ]
            );
        }

        $repeater->add_control(
            'image_bg',
            [
                'label' => __( 'Image', 'elementhelper' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features Title', 'elementhelper' ),
                'placeholder' => __( 'Type Icon Box Title', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( 'Features sub Title', 'elementhelper' ),
                'placeholder' => __( 'Type Icon Box sub Title', 'elementhelper' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );


        $repeater->add_control(
            'description',
            [
                'label' => __( 'Description', 'elementhelper' ),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __( 'Icon Description', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            's_url',
            [
                'label' => __( 'URL', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __( '#', 'elementhelper' ),
                'placeholder' => __( 'URL Here', 'elementhelper' ),
                'condition' => [
                    'field_condition' => ['style_1','style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
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
                    ]
                ]
            ]
        );

        $this->add_group_control(
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
                ]
            ]
        );

        $this->add_responsive_control(
            'align_slide',
            [
                'label' => __( 'Alignment', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementhelper' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementhelper' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementhelper' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}}' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_h_section_style_title',
            [
                'label' => __( 'Section Title & Desccription', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_h_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'htitle',
                'selector' => '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'htitle',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title',
            ]
        );

        $this->add_control(
            'h_heading_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'h_blend_mode',
            [
                'label' => __( 'Blend Mode', 'elementhelper' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '' => __( 'Normal', 'elementhelper' ),
                    'multiply' => 'Multiply',
                    'screen' => 'Screen',
                    'overlay' => 'Overlay',
                    'darken' => 'Darken',
                    'lighten' => 'Lighten',
                    'color-dodge' => 'Color Dodge',
                    'saturation' => 'Saturation',
                    'color' => 'Color',
                    'difference' => 'Difference',
                    'exclusion' => 'Exclusion',
                    'hue' => 'Hue',
                    'luminosity' => 'Luminosity',
                ],
                'selectors' => [
                    '{{WRAPPER}} .section__title h2, {{WRAPPER}} .section__title-3 .section-title' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        $this->add_control(
            '_h_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_subheading_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_subheading_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subhtitle',
                'selector' => '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subhtitle',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span',
            ]
        );

        $this->add_control(
            'h_subheading_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section__title-h2 span, {{WRAPPER}} .section__title-3 span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            '_h_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Content', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'h_heading_desc_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'h_desccription',
                'selector' => '{{WRAPPER}} .features__content-left p',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'h_desccription',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .features__content-left p',
            ]
        );

        $this->add_control(
            'h_heading_desc_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .features__content-left p' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_icon',
            [
                'label' => __( 'Icon', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon' => 'padding: {{SIZE}}{{UNIT}}',
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_spacing',
            [
                'label' => __( 'Bottom Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'max' => 150,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typ',
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i'
            ]
        );

        $this->add_responsive_control(
            'icon_border_radius',
            [
                'label' => __( 'Border Radius', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'icon_shadow',
                'exclude' => [
                    'box_shadow_position',
                ],
                'selector' => '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i'
            ]
        );

        $this->start_controls_tabs( '_tabs_icon' );

        $this->start_controls_tab(
            '_tab_icon_normal',
            [
                'label' => __( 'Normal', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __( 'Rotate Icon Box', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
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
                    '{{WRAPPER}} .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .features__icon-2 i, {{WRAPPER}} .services__icon i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
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
            'icon_hover_color',
            [
                'label' => __( 'Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_hover_border_color',
            [
                'label' => __( 'Border Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => 'border-color: {{VALUE}};',
                ],
                'condition' => [
                    'icon_border_border!' => '',
                ]
            ]
        );

        $this->add_control(
            'icon_hover_bg_rotate',
            [
                'label' => __( 'Rotate Icon Box', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'deg' ],
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
                    '{{WRAPPER}}:hover .icon' => '-webkit-transform: rotate({{SIZE}}{{UNIT}}); transform: rotate({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .features__icon-2:hover i, {{WRAPPER}} .services__icon:hover i' => '-webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                ],
                'condition' => [
                    'icon_bg_color!' => '',
                ]
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .features__content-2 h3, {{WRAPPER}} .services__content h3',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .features__content-2 h3, {{WRAPPER}} .services__content h3',
            ]
        );

        $this->start_controls_tabs( '_tabs_title' );

        $this->start_controls_tab(
            '_tab_title_normal',
            [
                'label' => __( 'Normal', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 h3 a, {{WRAPPER}} .services__content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_title_hover',
            [
                'label' => __( 'Hover', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 h3 a:hover, {{WRAPPER}} .services__content h3 a' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __( 'Content', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'label' => __( 'Typography', 'elementhelper' ),
                'exclude' => [
                    'font_family',
                    'line_height'
                ],
                'default' => [
                    'font_size' => ['']
                ],
                'selector' => '{{WRAPPER}} .features__content-2 p, {{WRAPPER}} .services__content p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     *
     * Used to generate the final HTML displayed on the frontend.
     *
     * Note that if skin is selected, it will be rendered by the skin itself,
     * not the widget.
     *
     * @since 1.0.0
     * @access public
     */
    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'description', 'none' );
        $this->add_render_attribute( 'description', 'class', '' );
        $this->add_render_attribute( 'title', 'class', 'wow fadeInUp' );
        $this->add_render_attribute( 'title', 'data-wow-delay', '.4s' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', '' );
        $this->add_render_attribute( 'button', 'class', 'z-btn' ); 

        ?>

        <?php if ( $settings['design_style'] === 'style_2' ): 


        $title = elh_element_kses_basic( $settings['title' ] );


        $this->add_render_attribute( 'button', 'class', 'text_btn' );

        ?>

        <section class="features__area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-6">
                        <div class="features__content-left">
                            <div class="section__title section__title-h2 mb-25">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <span class="wow fadeInUp"><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                                <?php endif; ?>
                                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>
                            <?php if ( $settings['desccription'] ) : ?>
                            <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo elh_element_kses_intermediate( $settings['desccription'] ); ?></p>
                            <?php endif; ?>

                            <?php if ( !empty( $settings['button_link']['url'] ) ) : ?>
                            <div class="link-sec">
                                <?php if( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                    printf( '<a %1$s href="%3$s">%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button_text'] ),
                                        esc_url($settings['button_link']['url'])
                                    );
                                elseif( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) :
                                 ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                <?php elseif( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                    if ( $settings['button_icon_position'] === 'before' ): ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                        <?php
                                    else: ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                    <?php
                                    endif;
                                endif; ?> 
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-6 offset-xl-1 col-lg-6">
                        <div class="features__content-right">
                            <div class="row">
                                <?php 
                                foreach ( $settings['slides'] as $key => $slide ):

                                    if (!empty($slide['image_bg']['id'])){
                                        $image_bg = wp_get_attachment_image_url( $slide['image_bg']['id'], $settings['thumbnail_size'] );
                                    }
                                    if (!empty($slide['image']['id'])){
                                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                    }
                                ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="features__item features__item-2 white-bg fix mb-30 wow fadeInUp" data-wow-delay=".2s">
                                        <div class="features__thumb-2" data-background="<?php echo esc_url($image_bg); ?>"></div>
                                        <div class="features__content-2">
                                            <div class="features__icon features__icon-2">
                                                <?php if( !empty($slide['selected_icon']) ): ?>
                                                    <?php elh_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'elh-btn-icon'] ); ?>
                                                    <?php else: ?>
                                                        <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                                <?php endif; ?>
                                            </div>
                                            <?php if( $slide['title'] ) : ?>
                                            <h3><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo elh_element_kses_basic( $slide['title'] ); ?></a></h3>
                                            <?php endif; ?>
                                            <?php if( $slide['description'] ): ?>
                                            <p><?php echo elh_element_kses_intermediate( $slide['description'] ); ?></p>
                                            <?php endif; ?>

                                            <?php if( !empty($slide['s_url']) ): ?>
                                            <div class="features__btn-2">
                                                <a href="<?php echo esc_url( $slide['s_url'] ); ?>" class="link-btn">
                                                    <i class="fal fa-long-arrow-right"></i>
                                                    <i class="fal fa-long-arrow-right"></i>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php else: 

        $title = elh_element_kses_basic( $settings['title' ] );
        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'big_title mb-0' );

        $this->add_render_attribute( 'button', 'class', 'text_btn' );

        ?>

            <section class="services__area">
                <div class="container">
                    <div class="row">
                        <?php 
                        foreach ( $settings['slides'] as $key => $slide ):
                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                                if ( ! $image ) {
                                    $image = $slide['image']['url'];
                                }
                            }
                        ?>

                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                            <div class="services__item mb-90 wow fadeInUp" data-wow-delay=".4s">
                                <div class="services__icon mb-35">
                                    <?php if( !empty($slide['selected_icon']) ): ?>
                                        <?php elh_element_render_icon( $slide, 'icon', 'selected_icon', ['class' => 'elh-btn-icon'] ); ?>
                                        <?php else: ?>
                                            <img src="<?php echo esc_url($image); ?>" alt="icon" />
                                    <?php endif; ?>
                                </div>
                                <div class="services__content">
                                    <?php if( $slide['title'] ) : ?>
                                    <h3><a href="<?php echo esc_url( $slide['s_url'] ); ?>"><?php echo elh_element_kses_basic( $slide['title'] ); ?></a></h3>
                                    <?php endif; ?>
                                    <?php if( $slide['description'] ): ?>
                                    <p><?php echo elh_element_kses_intermediate( $slide['description'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

        <?php endif; ?>
        
        <?php
    }

}