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

class Member_Slider extends Element_El_Widget {

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
        return 'member_slider';
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
        return __( 'Member Slider', 'elementhelper' );
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
        return 'elh-widget-icon eicon-lock-user';
    }

    public function get_keywords() {
        return [ 'slider', 'memeber', 'gallery', 'carousel' ];
    }


    protected function register_content_controls() {

        // member icon switch
        $this->start_controls_section(
            '_member_more_icon',
            [
                'label' => __( 'Team Link Switch', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'team_more_switch',
            [
                'label' => __( 'Team More Show', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'elementhelper' ),
                'label_off' => __( 'Hide', 'elementhelper' ),
                'return_value' => 'yes',
                'default' => 'yes',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'team_slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __( 'Type link here', 'elementhelper' ),
                'default' => __( '#', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();

        // member list
        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __( 'Members List', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->start_controls_tabs(
            '_tab_style_member_box_slider'
        );

        $repeater->start_controls_tab(
            '_tab_member_info',
            [
                'label' => __( 'Information', 'elementhelper' ),
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
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'elementhelper' ),
                'default' => __( 'ElhMember Title', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Job Title', 'elementhelper' ),
                'default' => __( 'ElhOfficer', 'elementhelper' ),
                'placeholder' => __( 'Type designation here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );   

        $repeater->add_control(
            'slide_url',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'show_label' => false,
                'placeholder' => __( 'Type link here', 'elementhelper' ),
                'default' => __( '#', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->end_controls_tab();

        $repeater->start_controls_tab(
            '_tab_member_links',
            [
                'label' => __( 'Links', 'elementhelper' ),
            ]
        );

        $repeater->add_control(
            'show_social',
            [
                'label' => __( 'Show Options?', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementhelper' ),
                'label_off' => __( 'No', 'elementhelper' ),
                'return_value' => 'yes',
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'web_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Website Address', 'elementhelper' ),
                'placeholder' => __( 'Add your profile link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'email_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Email', 'elementhelper' ),
                'placeholder' => __( 'Add your email link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );           

        $repeater->add_control(
            'phone_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Phone', 'elementhelper' ),
                'placeholder' => __( 'Add your phone link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'facebook_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Facebook', 'elementhelper' ),
                'default' => __( '#', 'elementhelper' ),
                'placeholder' => __( 'Add your facebook link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );                

        $repeater->add_control(
            'twitter_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Twitter', 'elementhelper' ),
                'default' => __( '#', 'elementhelper' ),
                'placeholder' => __( 'Add your twitter link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'instagram_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Instagram', 'elementhelper' ),
                'default' => __( '#', 'elementhelper' ),
                'placeholder' => __( 'Add your instagram link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );       

        $repeater->add_control(
            'linkedin_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'LinkedIn', 'elementhelper' ),
                'default' => __( '#', 'elementhelper' ),
                'placeholder' => __( 'Add your linkedin link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'youtube_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Youtube', 'elementhelper' ),
                'placeholder' => __( 'Add your youtube link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'googleplus_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Google Plus', 'elementhelper' ),
                'placeholder' => __( 'Add your Google Plus link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'flickr_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Flickr', 'elementhelper' ),
                'placeholder' => __( 'Add your flickr link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'vimeo_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Vimeo', 'elementhelper' ),
                'placeholder' => __( 'Add your vimeo link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'behance_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Behance', 'elementhelper' ),
                'placeholder' => __( 'Add your hehance link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'dribble_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Dribbble', 'elementhelper' ),
                'placeholder' => __( 'Add your dribbble link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'pinterest_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Pinterest', 'elementhelper' ),
                'placeholder' => __( 'Add your pinterest link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'gitub_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => false,
                'label' => __( 'Github', 'elementhelper' ),
                'placeholder' => __( 'Add your github link', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $repeater->end_controls_tab();
        $repeater->end_controls_tabs();

        // REPEATER
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
                'default' => 'h5',
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
                    '{{WRAPPER}} .single-carousel-item' => 'text-align: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_settings',
            [
                'label' => __( 'Design Style', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );
        $this->add_control(
            'slider_active',
            [
                'label' => __( 'Slider active on/off', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'default' =>true,
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                    'autoplay' => 'yes',
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
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
                'condition' => [
                    'design_style' => ['style_10']
                ],
            ]
        );

        $this->end_controls_section();


    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __( 'Slider Item', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .elh-slick-item',
            ]
        );

        $this->add_responsive_control(
            'item_border_radius',
            [
                'label' => __( 'Border Radius', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .elh-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

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
                    '{{WRAPPER}} .elh-slick-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'content_background',
                'selector' => '{{WRAPPER}} .elh-slick-content',
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
                    '{{WRAPPER}} .elh-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elh-slick-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .elh-slick-title',
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
                    '{{WRAPPER}} .elh-slick-subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elh-slick-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .elh-slick-subtitle',
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
                    '{{WRAPPER}} .slick-dots li button:before' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-dots li button:hover:before' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .slick-dots .slick-active button:before' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', 'team-title' );
        $this->add_render_attribute( 'name', 'class', 'name' );

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'elh-card-text' );

        if (!empty($title)) {
            $title = elh_element_kses_basic( $settings['title' ] );
        }
        
        if ( empty( $settings['slides'] ) ) {
            return;
        }
        ?>

    <?php if ( $settings['design_style'] === 'style_1' ): 

        // bg_image
        if (!empty($settings['bg_shape_image']['id'])) {
            $bg_shape_image = wp_get_attachment_image_url( $settings['bg_shape_image']['id'], $settings['shape_size'] );
            if ( ! $bg_shape_image ) {
                $bg_shape_image = $settings['bg_shape_image']['url'];
            }  
        }  

        $slider_active = !empty($settings['slider_active']) ? 'team1__carousel owl-carousel' : '';
    ?>


        <section class="team-area">
            <div class="container">
                <div class="row">
                    <?php foreach ( $settings['slides'] as $slide ) :
                        $title = elh_element_kses_basic( $slide['title' ] );
                        $slide_url = esc_url($slide['slide_url']);
                        
                        if (!empty($slide['image']['id'])) {
                            $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                            if ( ! $image ) {
                                $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                            }  
                        }          
                    ?>
                    <div class="col-xl-3 col-lg-3 col-md-6 wow fadeInUp2 animated" data-wow-delay='.1s'>
                        <div class="team text-center mb-30">
                            <?php if( !empty( $image ) ) : ?>
                            <div class="team__thumb mb-25 pos-rel">
                                <div class="team-avatar">
                                        <img src="<?php print esc_url($image); ?>" alt="team">
                                </div>
                                <a class="msg-me" href="#"><i class="far fa-envelope-open"></i></a>
                            </div>
                             <?php endif; ?>

                            <div class="team__content">

                                <?php if( !empty( $slide['designation'] ) ) : ?>
                                    <p><?php echo elh_element_kses_basic( $slide['designation'] ); ?></p>
                                <?php endif; ?>

                                <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        $title,
                                        $slide_url
                                    ); ?>

                                <a class="more_btn" href="#"><i class="far fa-plus"></i></a>

                                <?php if( !empty($slide['show_social'] ) ) : ?>
                                    <ul class="team__social mt-10">
                                        <?php if( !empty($slide['web_title'] ) ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $slide['web_title'] ); ?>">
                                                <i class="far fa-globe"></i>
                                                <i class="far fa-globe"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['email_title'] ) ) : ?>
                                        <li>    
                                            <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>">
                                                <i class="fal fa-envelope"></i>
                                                <i class="fal fa-envelope"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['phone_title'] ) ) : ?>
                                        <li>    
                                            <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>">
                                                <i class="fas fa-phone"></i>
                                                <i class="fas fa-phone"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>  

                                        <?php if( !empty($slide['facebook_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>">
                                                <i class="fab fa-facebook-f"></i>
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['twitter_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>">
                                                <i class="fab fa-twitter"></i>
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['instagram_title'] ) ) : ?>
                                        <li>     
                                            <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>">
                                                <i class="fab fa-instagram"></i>
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>">
                                                <i class="fab fa-linkedin-in"></i>
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['youtube_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>">
                                                <i class="fab fa-youtube"></i>
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>">
                                                <i class="fab fa-google-plus-g"></i>
                                                <i class="fab fa-google-plus-g"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['flickr_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>">
                                                <i class="fab fa-flickr"></i>
                                                <i class="fab fa-flickr"></i>
                                            </a>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>">
                                                <i class="fab fa-vimeo-v"></i>
                                                <i class="fab fa-vimeo-v"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['behance_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['behance_title'] ); ?>">
                                                <i class="fab fa-behance"></i>
                                                <i class="fab fa-behance"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['dribble_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>">
                                                <i class="fab fa-dribbble"></i>
                                                <i class="fab fa-dribbble"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                                        <li>    
                                            <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>">
                                                <i class="fab fa-pinterest-p"></i>
                                                <i class="fab fa-pinterest-p"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                        <?php if( !empty($slide['gitub_title'] ) ) : ?>
                                        <li>   
                                            <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>">
                                                <i class="fab fa-github"></i>
                                                <i class="fab fa-github"></i>
                                            </a>
                                        </li>
                                        <?php endif; ?>

                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>

    <!-- style 2 -->
    <?php elseif ( $settings['design_style'] === 'style_2' ): ?>
    <section class="team1">
        <div class="container">
            <div class="row">
                <?php foreach ( $settings['slides'] as $slide ) :
                    $title = elh_element_kses_basic( $slide['title' ] );
                    $slide_url = esc_url($slide['slide_url']);
                    
                    if (!empty($slide['image']['id'])) {
                        $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                        if ( ! $image ) {
                            $image = !empty($slide['image']['url']) ? $slide['image']['url'] : '' ;
                        }  
                    }          
                ?>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="team1__item mb-50">
                        <?php if( !empty( $image ) ) : ?>
                        <div class="team1__thumb">
                            <a href="<?php echo esc_url($slide_url); ?>"><img src="<?php print esc_url($image); ?>" alt="img"></a>
                        </div>
                        <?php endif; ?>
                        <!-- socials -->
                        <?php if( !empty($slide['show_social'] ) ) : ?>
                        <div class="team1__social text-center">
                            <?php if( !empty($slide['web_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['web_title'] ); ?>"><i class="far fa-globe"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['email_title'] ) ) : ?>
                            <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>"><i class="fal fa-envelope"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['phone_title'] ) ) : ?>
                            <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>"><i class="fas fa-phone"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['facebook_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['twitter_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['instagram_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['youtube_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>"><i class="fab fa-youtube"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>"><i class="fab fa-google-plus-g"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['flickr_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>"><i class="fab fa-flickr"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>"><i class="fab fa-vimeo-v"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['behance_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['behance_title'] ); ?>"><i class="fab fa-behance"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['dribble_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>"><i class="fab fa-dribbble"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['gitub_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>"><i class="fab fa-github"></i></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        <div class="team1__content text-center">
                            <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title,
                                $slide_url
                            ); ?>
                            <?php if( !empty( $slide['designation'] ) ) : ?>
                            <p class="m-0"><?php echo elh_element_kses_basic( $slide['designation'] ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

        <!-- style 2 -->
    <?php elseif ( $settings['design_style'] === 'style_3' ): ?>
    <section class="our-expert-area our-expert-area-2 our-expert-area-3">
        <div class="container">
            <div class="row mt-none-30 team-center-active">
                <?php foreach ( $settings['slides'] as $slide ) :
                    $title = elh_element_kses_basic( $slide['title' ] );
                    $slide_url = esc_url($slide['slide_url']);

                    $image = wp_get_attachment_image_url( $slide['image']['id'], $settings['thumbnail_size'] );
                    if ( ! $image ) {
                        $image = $slide['image']['url'];
                    }            

                ?>
                <div class="col-xl-4 col-lg-6 col-sm-12 mt-30">
                    <div class="single-carousel-item">
                        <div class="thumb">
                            <?php if( !empty($image) ) : ?>
                            <img src="<?php print esc_url($image); ?>" alt="">
                            <?php endif; ?>

                            <?php if( !empty($badge_image) ) : ?>
                            <span class="icon">
                                <img src="<?php print esc_url($badge_image); ?>" alt="">
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="content">
                            <?php printf( '<%1$s %2$s><a href="%4$s">%3$s</a></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title,
                                $slide_url
                            ); ?>
                            <span class="sub-title"><?php echo elh_element_kses_basic( $slide['designation'] ); ?></span>
                            <p><?php echo elh_element_kses_basic( $slide['description'] ); ?></p>
                        </div>                        
                        <!-- socials -->
                        <?php if( !empty($slide['show_social'] ) ) : ?>
                        <div class="social-links">
                            <?php if( !empty($slide['web_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['web_title'] ); ?>"><i class="far fa-globe"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['email_title'] ) ) : ?>
                            <a href="mailto:<?php echo esc_url( $slide['email_title'] ); ?>"><i class="fal fa-envelope"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['phone_title'] ) ) : ?>
                            <a href="tell:<?php echo esc_url( $slide['phone_title'] ); ?>"><i class="fas fa-phone"></i></a>
                            <?php endif; ?>  

                            <?php if( !empty($slide['facebook_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['facebook_title'] ); ?>"><i class="fab fa-facebook-f"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['twitter_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['twitter_title'] ); ?>"><i class="fab fa-twitter"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['instagram_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['instagram_title'] ); ?>"><i class="fab fa-instagram"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['linkedin_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['linkedin_title'] ); ?>"><i class="fab fa-linkedin-in"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['youtube_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['youtube_title'] ); ?>"><i class="fab fa-youtube"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['googleplus_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['googleplus_title'] ); ?>"><i class="fab fa-google-plus-g"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['flickr_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['flickr_title'] ); ?>"><i class="fab fa-flickr"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['vimeo_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['vimeo_title'] ); ?>"><i class="fab fa-vimeo-v"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['behance_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['behance_title'] ); ?>"><i class="fab fa-behance"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['dribble_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['dribble_title'] ); ?>"><i class="fab fa-dribbble"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['pinterest_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['pinterest_title'] ); ?>"><i class="fab fa-pinterest-p"></i></a>
                            <?php endif; ?>

                            <?php if( !empty($slide['gitub_title'] ) ) : ?>
                            <a href="<?php echo esc_url( $slide['gitub_title'] ); ?>"><i class="fab fa-github"></i></a>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
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
