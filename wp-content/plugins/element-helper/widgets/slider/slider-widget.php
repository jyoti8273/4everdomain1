<?php
namespace ElementHelper\Widget;

use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Slider extends Element_El_Widget {

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
        return 'slider';
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
        return __( 'Slider', 'elementhelper' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.sabber.com/widgets/slider/';
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
        return 'elh-widget-icon eicon-slider-full-screen';
    }

    public function get_keywords() {
        return [ 'slider', 'image', 'gallery', 'carousel' ];
    }

    protected function register_content_controls() {


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Slides', 'elementhelper' ),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image', 'elementhelper' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );   

        $repeater->add_control(
            'image_two',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image Two', 'elementhelper' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );   

        $repeater->add_control(
            'image_three',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image Three', 'elementhelper' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );         

        $repeater->add_control(
            'image_four',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Image Four', 'elementhelper' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'field_condition' => ['style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );    

        $repeater->add_control(
            'subtitle',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Sub Title', 'elementhelper' ),
                'default' => __( 'Subtitle', 'elementhelper' ),
                'placeholder' => __( 'Type subtitle here', 'elementhelper' ),
                'condition' => [
                    'field_condition' => ['style_1'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                    

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'elementhelper' ),
                'default' => __( 'Title Here', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'desc',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'label' => __( 'Description', 'elementhelper' ),
                'default' => __( 'Here content', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
                'condition' => [
                    'field_condition' => ['style_2'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        


        // button one
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'elementhelper' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.sabber.com/',
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
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
            $repeater->add_control(
                'button_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
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

        $repeater->add_control(
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

        //button two
        $repeater->add_control(
            'button_text2',
            [
                'label' => __( 'Button Text 2', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'button_link2',
            [
                'label' => __( 'Link', 'elementhelper' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'http://elementor.sabber.com/',
                'condition' => [
                    'field_condition' => ['style_1','style_2','style_3'],
                ], 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'button_icon2',
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
            $repeater->add_control(
                'button_selected_icon2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $repeater->add_control(
            'button_icon_position2',
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

        $repeater->add_control(
            'button_icon_spacing2',
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
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Settings', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __( 'Animation Speed', 'elementhelper' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __( 'Slide speed in milliseconds', 'elementhelper' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay?', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementhelper' ),
                'label_off' => __( 'No', 'elementhelper' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed', 'elementhelper' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __( 'Autoplay speed in milliseconds', 'elementhelper' ),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );        

        $this->add_control(
            'slidetoshow',
            [
                'label' => __( 'Slide to Show', 'elementhelper' ),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'step' => 1,
                'max' => 12,
                'default' => 1,
                'description' => __( 'How many item you want to show?', 'elementhelper' ),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __( 'Infinite Loop?', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementhelper' ),
                'label_off' => __( 'No', 'elementhelper' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __( 'Vertical Mode?', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementhelper' ),
                'label_off' => __( 'No', 'elementhelper' ),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __( 'Navigation', 'elementhelper' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __( 'None', 'elementhelper' ),
                    'arrow' => __( 'Arrow', 'elementhelper' ),
                    'dots' => __( 'Dots', 'elementhelper' ),
                    'both' => __( 'Arrow & Dots', 'elementhelper' ),
                ],
                'default' => 'arrow',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __( 'Slide Content', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __( 'Content Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-slide-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .single-slide-content',
                'exclude' => [
                    'image'
                ]
            ]
        );

        $this->add_control(
            '_heading_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Title', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __( 'Bottom Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Subtitle', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __( 'Bottom Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .sub-title',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_arrow',
            [
                'label' => __( 'Navigation - Arrow', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __( 'Position', 'elementhelper' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'elementhelper' ),
                'label_on' => __( 'Custom', 'elementhelper' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __( 'Vertical', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'arrow_position_x',
            [
                'label' => __( 'Horizontal', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'condition' => [
                    'arrow_position_toggle' => 'yes'
                ],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev' => 'left: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .slick-next' => 'right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_popover();

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'arrow_border',
                'selector' => '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next',
            ]
        );

        $this->add_responsive_control(
            'arrow_border_radius',
            [
                'label' => __( 'Border Radius', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_arrow' );

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __( 'Normal', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_arrow_hover',
            [
                'label' => __( 'Hover', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __( 'Border Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'arrow_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_dots',
            [
                'label' => __( 'Navigation - Dots', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __( 'Vertical Position', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 500,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_spacing',
            [
                'label' => __( 'Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li' => 'margin-right: calc({{SIZE}}{{UNIT}} / 2); margin-left: calc({{SIZE}}{{UNIT}} / 2);',
                ],
            ]
        );

        $this->add_responsive_control(
            'dots_nav_align',
            [
                'label' => __( 'Alignment', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementhelper' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'elementhelper' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementhelper' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs( '_tabs_dots' );
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __( 'Normal', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __( 'Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_hover',
            [
                'label' => __( 'Hover', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __( 'Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots li button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            '_tab_dots_active',
            [
                'label' => __( 'Active', 'elementhelper' ),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __( 'Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots .slick-active button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $slider_autoplay = ( $settings['autoplay'] == 'yes' ) ? true : false;
        $slider_playspeed =  $settings['autoplay_speed'] ? $settings['autoplay_speed'] : '3000';
        $animation_speed =  $settings['animation_speed'] ? $settings['animation_speed'] : '300';
        $slider_slideshow =  $settings['slidetoshow'] ? $settings['slidetoshow'] : '1';
        $slider_infinite = ( $settings['loop'] == 'yes' ) ? true : false;

        switch ( $settings['navigation'] ) {
            case 'none':
                $slider_arrows = false;
                $slider_dots = false;
                break;
            case 'arrow':
                $slider_arrows = true;
                $slider_dots = false;
                break;
            case 'dots':
                $slider_arrows = false;
                $slider_dots = true;
                break;
            case 'both':
                $slider_arrows = true;
                $slider_dots = true;
                break;
        }


        $slider_settings = array( 
            'autoplay' =>  $slider_autoplay, 
            'arrows' => $slider_arrows, 
            'speed' => $animation_speed, 
            'dots' => $slider_dots,  
            'playspeed' => $slider_playspeed,  
            'slideshow' => $slider_slideshow, 
            'infinite' => $slider_infinite,  
        );


        if ( empty( $settings['slides'] ) ) {
            return;
        }

        $this->add_render_attribute( 'button_no_icon', 'class', 'custom_btn bg_default_orange btn-no-icon wow fadeInUp2' );

        ?>

        <?php if ( $settings['design_style'] === 'style_3' ):

        $this->add_render_attribute( 'button', 'class', 'z-btn z-btn-border' );
        
        ?>

        <section class="hero__area p-relative slider-settings"
                 data-settings='<?php print json_encode($slider_settings); ?>'>
            <div class="hero__shape">
                <img class="one" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-1.png" alt="img">
                <img class="two" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-2.png" alt="img">
                <img class="three" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-3.png" alt="img">
                <img class="four" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-4.png" alt="img">
                <img class="five" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-6.png" alt="img">
                <img class="six" src="<?php echo get_template_directory_uri(); ?>/assets/img/icon/slider/03/icon-7.png" alt="img">
            </div>

            <?php foreach ( $settings['slides'] as $key => $slide ) :
            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
            if ( ! $image ) {
                $image = $slide['image']['url'];
            }

            $image_two = wp_get_attachment_image_url( $slide['image_two']['id'], $settings['thumbnail_size'] );
            if ( ! $image_two ) {
                $image_two = $slide['image_two']['url'];
            }

            $image_three = wp_get_attachment_image_url( $slide['image_three']['id'], $settings['thumbnail_size'] );
            if ( ! $image_three ) {
                $image_three = $slide['image_three']['url'];
            }

            $image_four = wp_get_attachment_image_url( $slide['image_four']['id'], $settings['thumbnail_size'] );
            if ( ! $image_four ) {
                $image_four = $slide['image_four']['url'];
            }
            
            ?>
            <div class="hero__item hero__height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-5 order-last">
                            <div class="hero__thumb-wrapper ml-100 scene ">
                                <?php if( !empty($image) ): ?>
                                <div class="hero__thumb one">
                                    <img class="layers" data-depth="0.2" src="<?php print esc_url($image); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                                <?php if( !empty($image_two) ): ?>
                                <div class="hero__thumb two d-none d-md-block d-lg-none d-xl-block">
                                    <img class="layers" data-depth="0.3" src="<?php print esc_url($image_two); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                                <?php if( !empty($image_three) ): ?>
                                <div class="hero__thumb three d-none d-sm-block">
                                    <img class="layers" data-depth="0.4" src="<?php print esc_url($image_three); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                                <?php if( !empty($image_four) ): ?>    
                                <div class="hero__thumb four d-none d-md-block d-lg-none d-xl-block">
                                    <img class="layers" data-depth="0.5" src="<?php print esc_url($image_four); ?>" alt="img">
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                            <div class="hero__content">
                                <?php if( !empty($slide['subtitle']) ): ?>
                                <span class="wow fadeInUp" data-wow-delay=".2s"><?php echo elh_element_kses_basic( $slide['subtitle'] ); ?></span>
                                <?php endif; ?>

                                <?php if ( !empty($slide['title']) ) : ?>
                                <h1 class="wow fadeInUp" data-wow-delay=".4s"><?php echo elh_element_kses_basic( $slide['title'] ); ?></h1>
                                <?php endif; ?>

                                <?php if ( !empty($slide['desc']) ) : ?>
                                <p class="wow fadeInUp" data-wow-delay=".6s"><?php echo elh_element_kses_intermediate( $slide['desc'] ); ?></p>
                                <?php endif; ?>
                                <div class="slide-btn wow fadeInUp" data-wow-delay=".8s">
                                    <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                            printf( '<a %1$s href="%3$s">%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $slide['button_text'] ),
                                                esc_url($slide['button_link']['url'])
                                                );
                                        elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                            if ( $slide['button_icon_position'] === 'before' ): ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                <?php
                                            else: ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                            <?php
                                            endif;
                                    endif; ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ): 

        $this->add_render_attribute( 'button', 'class', 'z-btn z-btn-transparent' );
        
        ?>

        <div class="slider-area slider-area-02 pos-rel">
            <div class="right-border-shape">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/02.png" alt="img">
            </div>
            <div class="slider-active">
                <?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'theme_btn theme_btn2 theme_btn_bg_02' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button2_'. $key, 'class', 'theme_btn theme-border-btn theme_btn_bg_02' );
                    $this->add_render_attribute( 'button2_'. $key, 'href', $slide['button_link2']['url'] );
                ?>
                <div class="single-slider slider-height-02 pos-rel d-flex align-items-center"
                    style="background-image: url(<?php print esc_url($image); ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="slider__content slider__content__02 text-left">
                                    <?php if ( !empty($slide['title']) ) : ?>
                                    <h1 class="main-title mb-25" data-animation="fadeInUp2" data-delay=".2s"><?php echo elh_element_kses_basic( $slide['title'] ); ?></h1>
                                     <?php endif; ?> 

                                    <?php if ( !empty($slide['desc']) ) : ?>
                                    <h4><?php echo elh_element_kses_basic( $slide['desc'] ); ?></h4>
                                    <?php endif; ?> 

                                    <ul class="btn-list btn-list-02">
                                        <li>
                                            <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                    printf( '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string( 'button_'. $key ),
                                                        esc_html( $slide['button_text'] )
                                                        );
                                                elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                    <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                                <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                    if ( $slide['button_icon_position'] === 'before' ): ?>
                                                        <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                        <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                                    <?php
                                                    endif;
                                            endif; ?> 
                                        </li>
                                        <li>
                                            <?php if ( $slide['button_text2'] && ( ( empty( $slide['button_selected_icon2'] ) || empty( $slide['button_selected_icon2']['value'] ) ) && empty( $slide['button_icon2'] ) ) ) :
                                                    printf( '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string( 'button2_'. $key ),
                                                        esc_html( $slide['button_text2'] )
                                                        );
                                                elseif ( empty( $slide['button_text2'] ) && ( ( !empty( $slide['button_selected_icon2'] ) || empty( $slide['button_selected_icon2']['value'] ) ) || !empty( $slide['button_icon2'] ) ) ) : ?>
                                                    <a <?php $this->print_render_attribute_string( 'button2_'. $key ); ?>><?php elh_element_render_icon( $slide, 'button_icon2', 'button_selected_icon2' ); ?></a>
                                                <?php elseif ( $slide['button_text2'] && ( ( !empty( $slide['button_selected_icon2'] ) || empty( $slide['button_selected_icon2']['value'] ) ) || !empty($slide['button_icon2']) ) ) :
                                                    if ( $slide['button_icon_position2'] === 'before' ): ?>
                                                        <a <?php $this->print_render_attribute_string( 'button2_'. $key ); ?>><span><?php elh_element_render_icon( $slide, 'button_icon2', 'button_selected_icon2', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text2']); ?></a>
                                                        <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string( 'button2_'. $key ); ?>><?php echo esc_html($slide['button_text2']); ?> <span><?php elh_element_render_icon( $slide, 'button_icon2', 'button_selected_icon2', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                                    <?php
                                                    endif;
                                            endif; ?> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php else: 
        ?>

        <div class="slider-area pos-rel">
            <div class="slider-active">
                <?php foreach ( $settings['slides'] as $key => $slide ) :
                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }
                    $this->add_render_attribute( 'button_'. $key, 'class', 'theme_btn theme_btn_bg' );
                    $this->add_render_attribute( 'button_'. $key, 'href', $slide['button_link']['url'] );

                    $this->add_render_attribute( 'button2_'. $key, 'class', 'theme_btn theme-border-btn' );
                    $this->add_render_attribute( 'button2_'. $key, 'href', $slide['button_link2']['url'] );
                ?>
                <div class="single-slider slider-height pos-rel d-flex align-items-center"
                    style="background-image: url(<?php print esc_url($image); ?>);">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-7">
                                <div class="slider__content text-left">
                                    <?php if( !empty($slide['subtitle']) ): ?>
                                    <span class="sub-title left-line pl-80 mb-35"><?php echo elh_element_kses_basic( $slide['subtitle'] ); ?> </span>
                                    <?php endif; ?>

                                    <?php if ( !empty($slide['title']) ) : ?>
                                    <h1 class="main-title mb-35" data-animation="fadeInUp2" data-delay=".2s"><?php echo elh_element_kses_basic( $slide['title'] ); ?></h1>
                                    <?php endif; ?>

                                    <ul class="btn-list">
                                        <li>
                                            <?php if ( $slide['button_text'] && ( ( empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) && empty( $slide['button_icon'] ) ) ) :
                                                    printf( '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string( 'button_'. $key ),
                                                        esc_html( $slide['button_text'] )
                                                        );
                                                elseif ( empty( $slide['button_text'] ) && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty( $slide['button_icon'] ) ) ) : ?>
                                                    <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon' ); ?></a>
                                                <?php elseif ( $slide['button_text'] && ( ( !empty( $slide['button_selected_icon'] ) || empty( $slide['button_selected_icon']['value'] ) ) || !empty($slide['button_icon']) ) ) :
                                                    if ( $slide['button_icon_position'] === 'before' ): ?>
                                                        <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><span><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text']); ?></a>
                                                        <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string( 'button_'. $key ); ?>><?php echo esc_html($slide['button_text']); ?> <span><?php elh_element_render_icon( $slide, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                                    <?php
                                                    endif;
                                            endif; ?> 
                                        </li>
                                        <li>
                                            <?php if ( $slide['button_text2'] && ( ( empty( $slide['button_selected_icon2'] ) || empty( $slide['button_selected_icon2']['value'] ) ) && empty( $slide['button_icon2'] ) ) ) :
                                                    printf( '<a %1$s>%2$s</a>',
                                                        $this->get_render_attribute_string( 'button2_'. $key ),
                                                        esc_html( $slide['button_text2'] )
                                                        );
                                                elseif ( empty( $slide['button_text2'] ) && ( ( !empty( $slide['button_selected_icon2'] ) || empty( $slide['button_selected_icon2']['value'] ) ) || !empty( $slide['button_icon2'] ) ) ) : ?>
                                                    <a <?php $this->print_render_attribute_string( 'button2_'. $key ); ?>><?php elh_element_render_icon( $slide, 'button_icon2', 'button_selected_icon2' ); ?></a>
                                                <?php elseif ( $slide['button_text2'] && ( ( !empty( $slide['button_selected_icon2'] ) || empty( $slide['button_selected_icon2']['value'] ) ) || !empty($slide['button_icon2']) ) ) :
                                                    if ( $slide['button_icon_position2'] === 'before' ): ?>
                                                        <a <?php $this->print_render_attribute_string( 'button2_'. $key ); ?>><span><?php elh_element_render_icon( $slide, 'button_icon2', 'button_selected_icon2', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($slide['button_text2']); ?></a>
                                                        <?php
                                                    else: ?>
                                                        <a <?php $this->print_render_attribute_string( 'button2_'. $key ); ?>><?php echo esc_html($slide['button_text2']); ?> <span><?php elh_element_render_icon( $slide, 'button_icon2', 'button_selected_icon2', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                                    <?php
                                                    endif;
                                            endif; ?> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <?php endif; ?>

    <?php
    }
}
