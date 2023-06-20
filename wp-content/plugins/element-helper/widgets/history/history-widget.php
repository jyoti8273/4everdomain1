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

defined( 'ABSPATH' ) || die();

class History extends Element_El_Widget {

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
        return 'history';
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
        return __( 'History', 'elementhelper' );
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
        return 'elh-widget-icon eicon-button';
    }

    public function get_keywords() {
        return [ 'info', 'blurb', 'box', 'text', 'content' ];
    }

    /**
     * Register content related controls
     */
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


		$this->start_controls_section(
			'_section_media',
			[
				'label' => __( 'Icon / Image', 'elementhelper' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
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

        $this->add_control(
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
                ],
                'condition' => [
                    'type' => 'image'
                ]
            ]
        );

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $this->add_control(
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
            $this->add_control(
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

        $this->add_control(
            'show_exp',
            [
                'label' => __( 'Show Experience Box?', 'elementhelper' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'elementhelper' ),
                'label_off' => __( 'No', 'elementhelper' ),
                'return_value' => 'yes',
                'style_transfer' => true,
                'condition' => [
                    'design_style' => 'style_2',
                ],
            ]
        );  

        $this->add_control(
            'count_number',
            [
                'label' => __( 'Number', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( '25', 'elementhelper' ),
                'placeholder' => __( 'Type Number', 'elementhelper' ),
                'condition' => [
                    'design_style' => 'style_2',
                    'show_exp' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );         

        $this->add_control(
            'exp_title',
            [
                'label' => __( 'Experience Title', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Years Of Experience', 'elementhelper' ),
                'placeholder' => __( 'Type Number', 'elementhelper' ),
                'condition' => [
                    'design_style' => 'style_2',
                    'show_exp' => 'yes',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );      

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features_list',
            [
                'label' => __( 'Features List', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        if ( elh_element_is_elementor_version( '<', '2.6.0' ) ) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'elementhelper' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-smile-o'
                 
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
                    ]
                ]
            );
        }

        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title & Subtitle', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
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
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Description', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'ElhInfo Box Title', 'elementhelper' ),
                'placeholder' => __( 'Type Info Box Title', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
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
            'description',
            [
                'label' => __( 'Description', 'elementhelper' ),
                'description' => elh_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Elhinfo box description goes here', 'elementhelper' ),
                'placeholder' => __( 'Type info box description', 'elementhelper' ),
                'rows' => 5,
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
            '_section_profile',
            [
                'label' => __( 'Profile', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => 'style_1'
                ],
            ]
        );

        $this->add_control(
            'profile_image',
            [
                'label' => __( 'Profile Image', 'elementhelper' ),
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
                'name' => 'profile_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control (
            'profile_position',
            [
                'label' => __( 'Profile Position', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementhelper' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'elementhelper' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementhelper' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'top',
                'prefix_class' => 'elh-sign--',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'name',
            [
                'label' => __( 'Name', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Name Here', 'elementhelper' ),
                'placeholder' => __( 'Type Name Title', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => __( 'Designation', 'elementhelper' ),
                'description' => elh_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'designation', 'elementhelper' ),
                'placeholder' => __( 'Type designation', 'elementhelper' ),
                'rows' => 5,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'sign_image',
            [
                'label' => __( 'Signature Image', 'elementhelper' ),
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
                'name' => 'sign_thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control (
            'sign_position',
            [
                'label' => __( 'Signature Position', 'elementhelper' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'elementhelper' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'top' => [
                        'title' => __( 'Top', 'elementhelper' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'elementhelper' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'top',
                'prefix_class' => 'elh-sign--',
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'name_tag',
            [
                'label' => __( 'Name HTML Tag', 'elementhelper' ),
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
            'profile_align',
            [
                'label' => __( 'Profile Alignment', 'elementhelper' ),
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

        $this->add_control(
            'button2_text',
            [
                'label' => __( 'Text', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button 2 Text',
                'placeholder' => __( 'Type button 2 text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'button2_link',
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
                'button2_icon',
                [
                    'label' => __( 'Icon', 'elementhelper' ),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-angle-right',
                ]
            );

            $condition = ['button2_icon!' => ''];
        } else {
            $this->add_control(
                'button2_selected_icon',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button2_selected_icon[value]!' => ''];
        }

        $this->add_control(
            'button2_icon_position',
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
            'button2_icon_spacing',
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
                'label' => __( 'Offset', 'elementhelper' ),
                'type' => Controls_Manager::POPOVER_TOGGLE,
                'label_off' => __( 'None', 'elementhelper' ),
                'label_on' => __( 'Custom', 'elementhelper' ),
                'return_value' => 'yes',
            ]
        );

        $this->start_popover();

        $this->add_responsive_control(
            'media_offset_x',
            [
                'label' => __( 'Offset Left', 'elementhelper' ),
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
                'label' => __( 'Offset Top', 'elementhelper' ),
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
                    '(desktop){{WRAPPER}} .about-thumb-wrap img' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x.SIZE || 0}}{{UNIT}}, {{media_offset_y.SIZE || 0}}{{UNIT}});',
                    '(tablet){{WRAPPER}} .about-thumb-wrap img' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_tablet.SIZE || 0}}{{UNIT}}, {{media_offset_y_tablet.SIZE || 0}}{{UNIT}});',
                    '(mobile){{WRAPPER}} .about-thumb-wrap img' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}}); transform: translate({{media_offset_x_mobile.SIZE || 0}}{{UNIT}}, {{media_offset_y_mobile.SIZE || 0}}{{UNIT}});',
                    // Body text styles
                    '{{WRAPPER}} .about-thumb-wrap' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_popover();

        $this->add_responsive_control(
            'media_spacing',
            [
                'label' => __( 'Bottom Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .about-thumb-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'media_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elh-infobox-figure--image img, {{WRAPPER}} .about-thumb-wrap i' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'media_border',
                'selector' => '{{WRAPPER}} .elh-infobox-figure--image img, {{WRAPPER}} .about-thumb-wrap i',
            ]
        );

        $this->add_responsive_control(
            'media_border_radius',
            [
                'label' => __( 'Border Radius', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .about-thumb-wrap img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .about-thumb-wrap i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .about-thumb-wrap img, {{WRAPPER}} .about-thumb-wrap i'
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => __( 'Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-thumb-wrap i' => 'color: {{VALUE}}',
                ],
                'condition' => [
                    'type' => 'icon'
                ]
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-thumb-wrap i' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'type' => 'icon'
                ]
            ]
        );

        $this->add_control(
            'icon_bg_rotate',
            [
                'label' => __( 'Background Rotate', 'elementhelper' ),
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
                    // Icon rotate styles
                    '{{WRAPPER}} .about-thumb-wrap img i' => '-ms-transform: rotate(-{{SIZE}}{{UNIT}}); -webkit-transform: rotate(-{{SIZE}}{{UNIT}}); transform: rotate(-{{SIZE}}{{UNIT}});',
                    // Icon box transform styles
                    '(desktop){{WRAPPER}} .about-thumb-wrap i' => '-ms-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x.SIZE || 0}}px, {{media_offset_y.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(tablet){{WRAPPER}} .about-thumb-wrap i' => '-ms-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_tablet.SIZE || 0}}px, {{media_offset_y_tablet.SIZE || 0}}px) rotate({{SIZE}}deg);',
                    '(mobile){{WRAPPER}} .about-thumb-wrap i' => '-ms-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); -webkit-transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg); transform: translate({{media_offset_x_mobile.SIZE || 0}}px, {{media_offset_y_mobile.SIZE || 0}}px) rotate({{SIZE}}deg);',
                ],
            ]
        );

        $this->end_controls_section();

        // profile style
        $this->start_controls_section(
            '_section_profile_style',
            [
                'label' => __( 'Profile', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'profile_magin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'profile_h_color',
            [
                'label' => __( 'Title Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .name' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->add_control(
            'profile_desig_color',
            [
                'label' => __( 'Title Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .designation' => 'color: {{VALUE}};',
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
                'label' => __( 'Content Box Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .about-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_heading',
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
                    '{{WRAPPER}} .section-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .section-title',
                'scheme' => Typography::TYPOGRAPHY_2
            ]
        );

        $this->add_control(
            'description_heading',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Description', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'description_spacing',
            [
                'label' => __( 'Bottom Spacing', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __( 'Typography', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .section-heading p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_button',
            [
                'label' => __( 'List Item', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => __( 'Size', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 300,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-list .single-item .icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                     'type' => 'icon'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .about-list .single-item span',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .about-list .single-item .icon',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __( 'Border Radius', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .single-item .icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .about-list .single-item .icon',
            ]
        );

        $this->add_control(
            'hr',
            [
                'type' => Controls_Manager::DIVIDER,
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
            'link_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-item .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => __( 'Border Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-item .icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-item .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_translate',
            [
                'label' => __( 'Icon Translate X', 'elementhelper' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .single-item .icon' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .single-item .icon' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
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
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-item:hover .icon, {{WRAPPER}} .single-item:focus .icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'border_hover_color',
            [
                'label' => __( 'Border Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .single-item:hover .icon' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __( 'Background Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-item:hover .icon, {{WRAPPER}} .single-item:focus .icon' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_icon_translate',
            [
                'label' => __( 'Icon Translate X', 'elementhelper' ),
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
                    '{{WRAPPER}} .single-item:hover .icon' => '-webkit-transform: translateX(calc(-1 * {{SIZE}}{{UNIT}})); transform: translateX(calc(-1 * {{SIZE}}{{UNIT}}));',
                    '{{WRAPPER}} .single-item:hover .icon' => '-webkit-transform: translateX({{SIZE}}{{UNIT}}); transform: translateX({{SIZE}}{{UNIT}});',
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
        $this->add_render_attribute( 'title', 'class', 'section-title' );

        $this->add_inline_editing_attributes( 'name', 'basic' );
        $this->add_render_attribute( 'name', 'class', 'name' );

        $this->add_inline_editing_attributes( 'description', 'intermediate' );
        $this->add_render_attribute( 'description', 'class', 'elh-infobox-text' );

        $this->add_inline_editing_attributes( 'button_text', 'none' );
        $this->add_render_attribute( 'button_text', 'class', 'elh-btn-text' );
        $this->add_render_attribute( 'button', 'class', 'elh-btn' );
        $this->add_link_attributes( 'button', $settings['button_link'] );

        $this->add_inline_editing_attributes( 'button2_text', 'none' );
        $this->add_render_attribute( 'button2_text', 'class', 'elh-btn-text' );
        $this->add_render_attribute( 'button2', 'class', 'elh-btn' );
        $this->add_link_attributes( 'button2', $settings['button2_link'] );

        ?>


        <?php if ( $settings['design_style'] === 'style_1' ): ?>
        <section class="about-area pb-160">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-thumb-wrap">
                        <?php if ( $settings['image']['url'] || $settings['image']['id'] ) :
                            $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                            $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                            $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                            ?>
                            <div class="about-thumb-shape-circle">
                                <figure>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                                </figure>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content mt-50">
                            <div class="section-heading mb-55">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <h4 class="sub-title"><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></h4>
                                <?php endif; ?>
                                <?php if ( $settings['title' ] ) :
                                    printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        elh_element_kses_basic( $settings['title' ] )
                                    );
                                endif; ?>
                                <?php if ( $settings['description'] ) : ?>
                                <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="about-list mt-none-20">
                                <?php foreach ( $settings['slides'] as $slide ) : ?>
                                    <div class="single-item d-flex align-items-center mt-20">
                                    <?php if ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                    <div class="icon">
                                        <?php elh_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                    </div>
                                    <?php endif; ?>
                             
                                    <?php if ( $slide['title'] ) : ?>
                                        <span><?php echo elh_element_kses_basic( $slide['title'] ); ?></span>
                                    <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        
                            <div class="about-founder d-flex align-items-center">
                                <div class="founder-detals d-flex align-items-center">
                                    <?php if ( $settings['profile_image']['url'] || $settings['profile_image']['id'] ) :
                                        $this->add_render_attribute( 'profile_image', 'src', $settings['profile_image']['url'] );
                                        $this->add_render_attribute( 'profile_image', 'alt', Control_Media::get_image_alt( $settings['profile_image'] ) );
                                        $this->add_render_attribute( 'profile_image', 'title', Control_Media::get_image_title( $settings['profile_image'] ) );
                                        ?>
                                        <div class="thumb">
                                            <figure>
                                                <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'profile_thumbnail', 'profile_image' ); ?>
                                            </figure>
                                        </div>
                                    <?php endif; ?>
                                    <div class="content">
                                        <?php if ( $settings['name' ] ) :
                                            printf( '<%1$s %2$s>%3$s</%1$s>',
                                                tag_escape( $settings['name_tag'] ),
                                                $this->get_render_attribute_string( 'name' ),
                                                elh_element_kses_basic( $settings['name' ] )
                                            );
                                        endif; ?>
                                        <?php if ( $settings['designation'] ) : ?>
                                        <span class="designation"><?php echo elh_element_kses_intermediate( $settings['designation'] ); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ( $settings['sign_image']['url'] || $settings['sign_image']['id'] ) :
                                    $this->add_render_attribute( 'sign_image', 'src', $settings['sign_image']['url'] );
                                    $this->add_render_attribute( 'sign_image', 'alt', Control_Media::get_image_alt( $settings['sign_image'] ) );
                                    $this->add_render_attribute( 'sign_image', 'title', Control_Media::get_image_title( $settings['sign_image'] ) );
                                    ?>
                                    <div class="founder-signature">
                                        <figure>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'sign_thumbnail', 'sign_image' ); ?>
                                        </figure>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ): ?>

        <section class="about-area about-area-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-thumb-wrap">
                            <div class="about-thumb">
                            <?php if ( $settings['image']['url'] || $settings['image']['id'] ) :
                                $this->add_render_attribute( 'image', 'src', $settings['image']['url'] );
                                $this->add_render_attribute( 'image', 'alt', Control_Media::get_image_alt( $settings['image'] ) );
                                $this->add_render_attribute( 'image', 'title', Control_Media::get_image_title( $settings['image'] ) );
                                ?>
                                <figure>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); ?>
                                </figure>
                            <?php endif; ?>
                            </div>
                            <?php if( !empty($settings['show_exp'] ) ) : ?>
                            <div class="about-content">
                                <div class="icon">
                                    <i class="fal fa-hospital"></i>
                                </div>
                                <div class="content">
                                    <?php if ( $settings['count_number'] ) : ?>
                                    <h2 class="title"><span class="counter"><?php echo elh_element_kses_intermediate( $settings['count_number'] ); ?></span> +</h2>
                                    <?php endif; ?>
                                    <?php if ( $settings['exp_title'] ) : ?>
                                    <p><?php echo elh_element_kses_intermediate( $settings['exp_title'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="dots">
                                    <span></span>
                                    <span></span>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-content mt-40">
                            <div class="section-heading mb-50">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <h4 class="sub-title"><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></h4>
                                <?php endif; ?>
                                <?php if ( $settings['title' ] ) :
                                    printf( '<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        elh_element_kses_basic( $settings['title' ] )
                                    );
                                endif; ?>
                                <?php if ( $settings['description'] ) : ?>
                                <p><?php echo elh_element_kses_intermediate( $settings['description'] ); ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="about-list mt-none-20">
                                <?php foreach ( $settings['slides'] as $slide ) : ?>
                                    <div class="single-item d-flex align-items-center mt-20">
                                    <?php if ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                    <div class="icon">
                                        <?php elh_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                    </div>
                                    <?php endif; ?>
                             
                                    <?php if ( $slide['title'] ) : ?>
                                        <span><?php echo elh_element_kses_basic( $slide['title'] ); ?></span>
                                    <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="about-btns">
                                <!-- button one  -->
                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn' );
                                    printf( '<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button_text'] )
                                        );
                                elseif ( empty( $settings['button_text'] ) && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                <?php elseif ( $settings['button_text'] && ( ! ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || ! empty( $settings['button_icon'] ) ) ) :
                                    if ( $settings['button_icon_position'] === 'before' ) :
                                        $this->add_render_attribute( 'button', 'class', 'site-btn elh-btn--icon-before' );
                                        $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                        ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?> <?php echo $button_text; ?></a>
                                        <?php
                                    else :
                                        $this->add_render_attribute( 'button', 'class', 'elh-btn--icon-after' );
                                        $button_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button_text' ), esc_html( $settings['button_text'] ) );
                                        ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button_text; ?> <?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></a>
                                    <?php
                                    endif;
                                endif; ?>

                                <!-- button two  -->
                                <?php if ( $settings['button2_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                    $this->add_render_attribute( 'button', 'class', 'site-btn  transparent' );
                                    printf( '<a %1$s>%2$s</a>',
                                        $this->get_render_attribute_string( 'button' ),
                                        esc_html( $settings['button2_text'] )
                                        );
                                elseif ( empty( $settings['button2_text'] ) && ( ! ( empty( $settings['button2_selected_icon'] ) || empty( $settings['button2_selected_icon']['value'] ) ) || ! empty( $settings['button2_icon'] ) ) ) : ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button2_icon', 'button2_selected_icon' ); ?></a>
                                <?php elseif ( $settings['button2_text'] && ( ! ( empty( $settings['button2_selected_icon'] ) || empty( $settings['button2_selected_icon']['value'] ) ) || ! empty( $settings['button2_icon'] ) ) ) :
                                    if ( $settings['button2_icon_position'] === 'before' ) :
                                        $this->add_render_attribute( 'button', 'class', 'site-btn transparent elh-btn--icon-before' );
                                        $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $settings['button2_text'] ) );
                                        ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button2_selected_icon', ['class' => 'elh-btn-icon'] ); ?> <?php echo $button2_text; ?></a>
                                        <?php
                                    else :
                                        $this->add_render_attribute( 'button', 'class', ' transparent elh-btn--icon-after' );
                                        $button2_text = sprintf( '<span %1$s>%2$s</span>', $this->get_render_attribute_string( 'button2_text' ), esc_html( $settings['button2_text'] ) );
                                        ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo $button2_text; ?> <?php elh_element_render_icon( $settings, 'button2_icon', 'button2_selected_icon', ['class' => 'elh-btn-icon'] ); ?></a>
                                    <?php
                                    endif;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php endif; ?>


        <?php
    }
}
