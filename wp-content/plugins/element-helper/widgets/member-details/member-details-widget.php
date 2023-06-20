<?php

namespace ElementHelper\Widget;

use Elementor\Control_Media;
use \Elementor\Group_Control_Background;
use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Utils;

defined('ABSPATH') || die();

class Member_Details extends Element_El_Widget
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
        return 'member-details';
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
        return __('Member Details', 'elementhelper');
    }

    public function get_custom_help_url()
    {
        return '';
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
        return 'elh-widget-icon eicon-lock-user';
    }

    public function get_keywords()
    {
        return ['slider', 'memeber', 'map', 'details'];
    }

    protected static function get_profile_names()
    {
        return [
            'fal fa-comments' => __('Comments', 'elementhelper'),
            'apple' => __('Apple', 'elementhelper'),
            'behance' => __('Behance', 'elementhelper'),
            'bitbucket' => __('BitBucket', 'elementhelper'),
            'codepen' => __('CodePen', 'elementhelper'),
            'delicious' => __('Delicious', 'elementhelper'),
            'deviantart' => __('DeviantArt', 'elementhelper'),
            'digg' => __('Digg', 'elementhelper'),
            'dribbble' => __('Dribbble', 'elementhelper'),
            'email' => __('Email', 'elementhelper'),
            'facebook-f' => __('Facebook', 'elementhelper'),
            'flickr' => __('Flicker', 'elementhelper'),
            'foursquare' => __('FourSquare', 'elementhelper'),
            'github' => __('Github', 'elementhelper'),
            'houzz' => __('Houzz', 'elementhelper'),
            'instagram' => __('Instagram', 'elementhelper'),
            'jsfiddle' => __('JS Fiddle', 'elementhelper'),
            'linkedin' => __('LinkedIn', 'elementhelper'),
            'medium' => __('Medium', 'elementhelper'),
            'pinterest' => __('Pinterest', 'elementhelper'),
            'product-hunt' => __('Product Hunt', 'elementhelper'),
            'reddit' => __('Reddit', 'elementhelper'),
            'slideshare' => __('Slide Share', 'elementhelper'),
            'snapchat' => __('Snapchat', 'elementhelper'),
            'soundcloud' => __('SoundCloud', 'elementhelper'),
            'spotify' => __('Spotify', 'elementhelper'),
            'stack-overflow' => __('StackOverflow', 'elementhelper'),
            'tripadvisor' => __('TripAdvisor', 'elementhelper'),
            'tumblr' => __('Tumblr', 'elementhelper'),
            'twitch' => __('Twitch', 'elementhelper'),
            'twitter' => __('Twitter', 'elementhelper'),
            'vimeo' => __('Vimeo', 'elementhelper'),
            'vk' => __('VK', 'elementhelper'),
            'website' => __('Website', 'elementhelper'),
            'whatsapp' => __('WhatsApp', 'elementhelper'),
            'wordpress' => __('WordPress', 'elementhelper'),
            'xing' => __('Xing', 'elementhelper'),
            'yelp' => __('Yelp', 'elementhelper'),
            'youtube' => __('YouTube', 'elementhelper'),
        ];
    }

    protected function register_content_controls()
    {
        $this->start_controls_section(
            '_section_info',
            [
                'label' => __('Information', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'photo',
            [
                'label' => __('Photo', 'elementhelper'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
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

        $this->add_control(
            'title',
            [
                'label' => __('Name', 'elementhelper'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Happy Member Name',
                'placeholder' => __('Type Member Name', 'elementhelper'),
                'separator' => 'before',
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
                'separator' => 'before',
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

        $this->start_controls_section(
            '_section_content_info',
            [
                'label' => __('Info List', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'label',
            [
                'label' => __('Label', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Speciality', 'elementhelper'),
                'placeholder' => __('Type label here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __('Title', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Features Title', 'elementhelper'),
                'placeholder' => __('Type Icon Box Title', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );



        $this->add_control(
            'info_lists',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social',
            [
                'label' => __('Social Profiles', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label' => __('Profile Name', 'elementhelper'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => __('Profile Link', 'elementhelper'),
                'placeholder' => __('Add your profile link', 'elementhelper'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'autocomplete' => false,
                'show_external' => false,
                'condition' => [
                    'name!' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'profiles',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default' => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ]
                ],
            ]
        );

        $this->add_control(
            'show_profiles',
            [
                'label' => __('Show Profiles', 'elementhelper'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementhelper'),
                'label_off' => __('Hide', 'elementhelper'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_extra_info',
            [
                'label' => __('Extra Information', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'extra_title',
            [
                'label' => __('Title', 'elementhelper'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'placeholder' => __('Type Extra Title', 'elementhelper'),
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'extra_description1',
            [
                'label' => __('Description', 'elementhelper'),
                'description' => elh_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => __('Write something amazing about the happy member', 'elementhelper'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'video_bg',
            [
                'label' => __('Video Bg', 'elementhelper'),
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
            'video_url',
            [
                'label'       => __( 'Video Url', 'elementhelper' ),
                'type'        => Controls_Manager::URL,
                'placeholder' => __( 'https://www.youtube.com/watch?v=cRXm1p-CNyk', 'elementhelper' ),
                'dynamic'     => [
                    'active' => true,
                ],
                'default' => [
					'url' => 'https://www.youtube.com/watch?v=cRXm1p-CNyk',
					'is_external' => true,
					'nofollow' => true,
				],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Feature item', 'elementhelper' ),
                'default' => __( 'Dedicated team member', 'elementhelper' ),
                'placeholder' => __( 'Type text here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'feature_lists',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(title || "Carousel Item"); #>',
            ]
        );

        $this->add_control(
            'image2',
            [
                'label' => __('Image', 'elementhelper'),
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
            'extra_description2',
            [
                'label' => __('Description', 'elementhelper'),
                'description' => elh_element_get_allowed_html_desc('intermediate'),
                'type' => Controls_Manager::WYSIWYG,
                'placeholder' => __('Write something amazing about the happy member', 'elementhelper'),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => __('Slider Item', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elh-slick-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_content',
            [
                'label' => __('Slide Content', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => __('Content Padding', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
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
                    '{{WRAPPER}} .elh-slick-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'elementhelper'),
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
                'label' => __('Subtitle', 'elementhelper'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'subtitle_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
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
                'label' => __('Text Color', 'elementhelper'),
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
                'label' => __('Navigation - Arrow', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'arrow_position_toggle',
            [
                'label' => __('Position', 'elementhelper'),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __('None', 'elementhelper'),
                'label_on' => __('Custom', 'elementhelper'),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'arrow_position_y',
            [
                'label' => __('Vertical', 'elementhelper'),
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
                'label' => __('Horizontal', 'elementhelper'),
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
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slick-prev, {{WRAPPER}} .slick-next' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}; overflow: hidden;',
                ],
            ]
        );

        $this->start_controls_tabs('_tabs_arrow');

        $this->start_controls_tab(
            '_tab_arrow_normal',
            [
                'label' => __('Normal', 'elementhelper'),
            ]
        );

        $this->add_control(
            'arrow_color',
            [
                'label' => __('Text Color', 'elementhelper'),
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
                'label' => __('Background Color', 'elementhelper'),
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
                'label' => __('Hover', 'elementhelper'),
            ]
        );

        $this->add_control(
            'arrow_hover_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_bg_color',
            [
                'label' => __('Background Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slick-prev:hover, {{WRAPPER}} .slick-next:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'arrow_hover_border_color',
            [
                'label' => __('Border Color', 'elementhelper'),
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
                'label' => __('Navigation - Dots', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'dots_nav_position_y',
            [
                'label' => __('Vertical Position', 'elementhelper'),
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
                'label' => __('Spacing', 'elementhelper'),
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
                'label' => __('Alignment', 'elementhelper'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'elementhelper'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __('Center', 'elementhelper'),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __('Right', 'elementhelper'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .slick-dots' => 'text-align: {{VALUE}}'
                ]
            ]
        );

        $this->start_controls_tabs('_tabs_dots');
        $this->start_controls_tab(
            '_tab_dots_normal',
            [
                'label' => __('Normal', 'elementhelper'),
            ]
        );

        $this->add_control(
            'dots_nav_color',
            [
                'label' => __('Color', 'elementhelper'),
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
                'label' => __('Hover', 'elementhelper'),
            ]
        );

        $this->add_control(
            'dots_nav_hover_color',
            [
                'label' => __('Color', 'elementhelper'),
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
                'label' => __('Active', 'elementhelper'),
            ]
        );

        $this->add_control(
            'dots_nav_active_color',
            [
                'label' => __('Color', 'elementhelper'),
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

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'title');
        $this->add_render_attribute('title', 'data-wow-delay', '');
        if (!empty($settings['video_bg']['id'])) {
            $video_bg = wp_get_attachment_image_url($settings['video_bg']['id'], $settings['thumbnail_size']);
        }
        if (!empty($settings['image2']['id'])) {
            $image2 = wp_get_attachment_image_url($settings['image2']['id'], $settings['thumbnail_size']);
        }
        ?>
        <section class="team-details-area">
            <div class="container">
                <div class="td-bg">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <?php if ($settings['photo']['url'] || $settings['photo']['id']) :
                                $this->add_render_attribute('photo', 'src', $settings['photo']['url']);
                                $this->add_render_attribute('photo', 'alt', Control_Media::get_image_alt($settings['photo']));
                                $this->add_render_attribute('photo', 'title', Control_Media::get_image_title($settings['photo']));
                                $settings['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                            ?>
                            <div class="td-thumb">
                                <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'photo'); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="td-content">
                                <?php if ($settings['title']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['title_tag']),
                                        $this->get_render_attribute_string('title'),
                                        elh_element_kses_basic($settings['title'])
                                    );
                                endif; ?>
                                <ul class="td-info-list mb-40">
                                    <?php foreach ( $settings['info_lists'] as $key => $info_list ) : ?>
                                    <li>
                                        <span><?php echo esc_html( $info_list['label'] ); ?></span> 
                                        <?php echo esc_html( $info_list['title'] ); ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                                <div class="td-social">
                                    <?php
                                        foreach ($settings['profiles'] as $profile) :
                                        $icon = !empty($profile['name']) ? $profile['name'] : '';
                                        $url = !empty($profile['link']['url']) ? $profile['link']['url'] : '';

                                        if ($profile['name'] === 'website') {
                                            $icon = 'globe';
                                        } elseif ($profile['name'] === 'email') {
                                            $icon = 'envelope';
                                            $url = 'mailto:' . antispambot($profile['email']);
                                        }

                                        printf('<a target="_blank" rel="noopener" data-tooltip="hello" href="%s" class="elementor-repeater-item-%s comments-btn"><i class="fab fa-%s" aria-hidden="true"></i></a>',
                                            $url,
                                            esc_attr($profile['_id']),
                                            esc_attr($icon)
                                        );
                                    endforeach; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-70">
                    <div class="col-12">
                        <div class="td-bottom-content">
                            <?php if(!empty($settings['extra_title'])) : ?>
                            <h3 class="title"><?php echo elh_element_kses_basic($settings['extra_title']); ?></h3>
                            <?php endif; ?>
                            <?php if(!empty($settings['extra_description1'])) : ?>
                            <div class="text mb-45">
                                <?php echo elh_element_kses_basic($settings['extra_description1']); ?>
                            </div>
                            <?php endif; ?>
                            <div class="td-list-wrapper mb-60">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="td-list mb-20">
                                            <?php foreach ( $settings['feature_lists'] as $key => $feature_list ) : ?>
                                            <li><i class="ti-check"></i> <?php echo elh_element_kses_basic( $feature_list['title'] ); ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="td-image-wrapper mb-40">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="td-image mb-30">
                                            <?php if (!empty($video_bg)): ?>
                                            <img src="<?php echo esc_url($video_bg); ?>" alt="img">
                                            <?php endif; ?>
                                            <?php if (!empty($settings['video_url'])): ?>
                                            <div class="video-play-icon">
                                                <a class="popup-video video-icon" href="<?php echo esc_url($settings['video_url']['url']); ?>"><i class="fas fa-play"></i></a>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <?php if (!empty($image2)): ?>
                                        <div class="td-image mb-30">
                                            <img src="<?php echo esc_url($image2); ?>" alt="img">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if(!empty($settings['extra_description2'])) : ?>
                            <div class="text mb-30">
                                <?php echo elh_element_kses_basic($settings['extra_description2']); ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}
