<?php

namespace ElementHelper\Widget;

use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Repeater;
use \Elementor\Control_Media;
use \Elementor\Utils;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;

defined('ABSPATH') || die();

class Pricing_Table extends Element_El_Widget
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
        return 'pricing_table';
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
        return __('Pricing Table', 'elementhelper');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.sabber.com/widgets/pricing-table/';
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
        return 'elh-widget-icon eicon-table-of-contents';
    }

    public function get_keywords()
    {
        return ['pricing', 'price', 'table', 'package', 'product', 'plan'];
    }

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
                    'style_2' => __('Style 2', 'elementhelper')
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'active_price',
            [
                'label' => __('Active Price', 'elementhelper'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Show', 'elementhelper'),
                'label_off' => __('Hide', 'elementhelper'),
                'return_value' => 'yes',
                'default' => false,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_media',
            [
                'label' => __('Icon / Image', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->add_control(
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

        $this->add_control(
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

        if (elh_element_is_elementor_version('<', '2.6.0')) {
            $this->add_control(
                'icon',
                [
                    'label' => __('Icon', 'elementhelper'),
                    'label_block' => true,
                    'type' => Controls_Manager::ICON,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-smile-o',
                    'condition' => [
                        'type' => 'icon'
                    ]
                ]
            );
        } else {
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_header',
            [
                'label' => __('Header', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Basic', 'elementhelper'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'default' => __('Sub Title', 'elementhelper'),
                'dynamic' => [
                    'active' => true
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'elementhelper'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default' => __('description', 'elementhelper'),
                'dynamic' => [
                    'active' => true
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_pricing',
            [
                'label' => __('Pricing', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'currency',
            [
                'label' => __('Currency', 'elementhelper'),
                'type' => Controls_Manager::SELECT,
                'label_block' => false,
                'options' => [
                    '' => __('None', 'elementhelper'),
                    'baht' => '&#3647; ' . _x('Baht', 'Currency Symbol', 'elementhelper'),
                    'bdt' => '&#2547; ' . _x('BD Taka', 'Currency Symbol', 'elementhelper'),
                    'dollar' => '&#36; ' . _x('Dollar', 'Currency Symbol', 'elementhelper'),
                    'euro' => '&#128; ' . _x('Euro', 'Currency Symbol', 'elementhelper'),
                    'franc' => '&#8355; ' . _x('Franc', 'Currency Symbol', 'elementhelper'),
                    'guilder' => '&fnof; ' . _x('Guilder', 'Currency Symbol', 'elementhelper'),
                    'krona' => 'kr ' . _x('Krona', 'Currency Symbol', 'elementhelper'),
                    'lira' => '&#8356; ' . _x('Lira', 'Currency Symbol', 'elementhelper'),
                    'peseta' => '&#8359 ' . _x('Peseta', 'Currency Symbol', 'elementhelper'),
                    'peso' => '&#8369; ' . _x('Peso', 'Currency Symbol', 'elementhelper'),
                    'pound' => '&#163; ' . _x('Pound Sterling', 'Currency Symbol', 'elementhelper'),
                    'real' => 'R$ ' . _x('Real', 'Currency Symbol', 'elementhelper'),
                    'ruble' => '&#8381; ' . _x('Ruble', 'Currency Symbol', 'elementhelper'),
                    'rupee' => '&#8360; ' . _x('Rupee', 'Currency Symbol', 'elementhelper'),
                    'indian_rupee' => '&#8377; ' . _x('Rupee (Indian)', 'Currency Symbol', 'elementhelper'),
                    'shekel' => '&#8362; ' . _x('Shekel', 'Currency Symbol', 'elementhelper'),
                    'won' => '&#8361; ' . _x('Won', 'Currency Symbol', 'elementhelper'),
                    'yen' => '&#165; ' . _x('Yen/Yuan', 'Currency Symbol', 'elementhelper'),
                    'custom' => __('Custom', 'elementhelper'),
                ],
                'default' => 'dollar',
            ]
        );

        $this->add_control(
            'currency_custom',
            [
                'label' => __('Custom Symbol', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'condition' => [
                    'currency' => 'custom',
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'price',
            [
                'label' => __('Price', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'default' => '9.99',
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'period',
            [
                'label' => __('Period', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Per Month', 'elementhelper'),
                'dynamic' => [
                    'active' => true
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_features',
            [
                'label' => __('Features', 'elementhelper'),
            ]
        );

        $this->add_control(
            'features_title',
            [
                'label' => __('Title', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Features', 'elementhelper'),
                'separator' => 'after',
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ],
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'text',
            [
                'label' => __('Text', 'elementhelper'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Exciting Feature', 'elementhelper'),
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $repeater->add_control(
            'disable',
			[
				'label' => __( 'Disable', 'elementhelper' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'your-plugin' ),
				'label_off' => __( 'Hide', 'your-plugin' ),
				'return_value' => 'Show',
				'default' => 'Show',
			]
        );

        if (elh_element_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'icon',
                [
                    'label' => __('Icon', 'elementhelper'),
                    'type' => Controls_Manager::ICON,
                    'label_block' => false,
                    'options' => elh_element_get_elh_element_icons(),
                    'default' => 'fa fa-check',
                    'include' => [
                        'fa fa-check',
                        'fa fa-close',
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'selected_icon',
                [
                    'label' => __('Icon', 'elementhelper'),
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'default' => [
                        'value' => 'fas fa-check',
                        'library' => 'fa-solid',
                    ],
                    'recommended' => [
                        'fa-regular' => [
                            'check-square',
                            'window-close',
                        ],
                        'fa-solid' => [
                            'check',
                        ]
                    ]
                ]
            );
        }

        $this->add_control(
            'features_list',
            [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(text || "Carousel Item"); #>',
                'show_label' => false,
                'default' => [
                    [
                        'text' => __('Standard Feature', 'elementhelper'),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __('Another Great Feature', 'elementhelper'),
                        'icon' => 'fa fa-check',
                    ],
                    [
                        'text' => __('Obsolete Feature', 'elementhelper'),
                        'icon' => 'fa fa-close',
                    ],
                    [
                        'text' => __('Exciting Feature', 'elementhelper'),
                        'icon' => 'fa fa-check',
                    ],
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_footer',
            [
                'label' => __('Price Footer', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __('Button Text', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Subscribe', 'elementhelper'),
                'placeholder' => __('Type button text here', 'elementhelper'),
                'label_block' => true,
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __('Link', 'elementhelper'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'placeholder' => 'http://elementor.sabber.com/',
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_badge',
            [
                'label' => __('Badge', 'elementhelper'),
                'condition' => [
                    'design_style' => ['style_3']
                ],
            ]
        );

        $this->add_control(
            'show_badge',
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
            'badge_position',
            [
                'label' => __('Position', 'elementhelper'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => __('Left', 'elementhelper'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __('Right', 'elementhelper'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'toggle' => false,
                'default' => 'left',
                'style_transfer' => true,
                'condition' => [
                    'show_badge' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'badge_text',
            [
                'label' => __('Badge Text', 'elementhelper'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Recommended', 'elementhelper'),
                'placeholder' => __('Type badge text', 'elementhelper'),
                'condition' => [
                    'show_badge' => 'yes'
                ],
                'dynamic' => [
                    'active' => true
                ]
            ]
        );

        $this->end_controls_section();
    }

    protected function register_style_controls()
    {
        $this->start_controls_section(
            '_section_style_general',
            [
                'label' => __('General', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-title,'
                    . '{{WRAPPER}} .elementhelper-pricing-table-currency,'
                    . '{{WRAPPER}} .elementhelper-pricing-table-period,'
                    . '{{WRAPPER}} .elementhelper-pricing-table-features-title,'
                    . '{{WRAPPER}} .elementhelper-pricing-table-features-list li,'
                    . '{{WRAPPER}} .elementhelper-pricing-table-price-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_header',
            [
                'label' => __('Header', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'title_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-title',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_pricing',
            [
                'label' => __('Pricing', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_heading_price',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Price', 'elementhelper'),
            ]
        );

        $this->add_responsive_control(
            'price_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-price-tag' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'price_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-price-text' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'price_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-price-text',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            '_heading_currency',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Currency', 'elementhelper'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'currency_spacing',
            [
                'label' => __('Side Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-currency' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'currency_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-currency' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'currency_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-currency',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_control(
            '_heading_period',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Period', 'elementhelper'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'period_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-price' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'period_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-period' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'period_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-period',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_features',
            [
                'label' => __('Features', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'features_container_spacing',
            [
                'label' => __('Container Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-body' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            '_heading_features_title',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Title', 'elementhelper'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'features_title_spacing',
            [
                'label' => __('Bottom Spacing', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-features-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_title_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-features-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_title_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-features-title',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            '_heading_features_list',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('List', 'elementhelper'),
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'features_list_spacing',
            [
                'label' => __('Spacing Between', 'elementhelper'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-features-list > li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'features_list_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-features-list > li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'features_list_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-features-list > li',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_footer',
            [
                'label' => __('Footer', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            '_heading_button',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Button', 'elementhelper'),
            ]
        );

        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-btn',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-btn',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_control(
            'hr',
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
            'button_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Background Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn' => 'background-color: {{VALUE}};',
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
            'button_hover_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn:hover, {{WRAPPER}} .elementhelper-pricing-table-btn:focus' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Background Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn:hover, {{WRAPPER}} .elementhelper-pricing-table-btn:focus' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_border_color',
            [
                'label' => __('Border Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'button_border_border!' => '',
                ],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-btn:hover, {{WRAPPER}} .elementhelper-pricing-table-btn:focus' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_badge',
            [
                'label' => __('Badge', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'badge_padding',
            [
                'label' => __('Padding', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-badge' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'badge_bg_color',
            [
                'label' => __('Background Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-badge' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'badge_border',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-badge',
            ]
        );

        $this->add_responsive_control(
            'badge_border_radius',
            [
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .elementhelper-pricing-table-badge' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'badge_box_shadow',
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-badge',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'badge_typography',
                'label' => __('Typography', 'elementhelper'),
                'selector' => '{{WRAPPER}} .elementhelper-pricing-table-badge',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();
    }

    private static function get_currency_symbol($symbol_name)
    {
        $symbols = [
            'baht' => '&#3647;',
            'bdt' => '&#2547;',
            'dollar' => '&#36;',
            'euro' => '&#128;',
            'franc' => '&#8355;',
            'guilder' => '&fnof;',
            'indian_rupee' => '&#8377;',
            'pound' => '&#163;',
            'peso' => '&#8369;',
            'peseta' => '&#8359',
            'lira' => '&#8356;',
            'ruble' => '&#8381;',
            'shekel' => '&#8362;',
            'rupee' => '&#8360;',
            'real' => 'R$',
            'krona' => 'kr',
            'won' => '&#8361;',
            'yen' => '&#165;',
        ];

        return isset($symbols[$symbol_name]) ? $symbols[$symbol_name] : '';
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        $this->add_inline_editing_attributes('title', 'basic');
        $this->add_render_attribute('title', 'class', 'item_title');
        $this->add_render_attribute('sub_title', 'class', 'sub_title');

        $this->add_inline_editing_attributes('price', 'basic');
        $this->add_render_attribute('price', 'class', 'pricing_text');

        $this->add_inline_editing_attributes('period', 'basic');
        $this->add_render_attribute('period', 'class', 'price-period');

        $this->add_inline_editing_attributes('features_title', 'basic');
        $this->add_render_attribute('features_title', 'class', 'price-featured mb-20');

        if ($settings['currency'] === 'custom') {
            $currency = $settings['currency_custom'];
        } else {
            $currency = self::get_currency_symbol($settings['currency']);
        }

        ?>

        <?php if ($settings['design_style'] === 'style_2'): ?>
        <div class="pricing_plan pricing_plan-2">
            <?php if ($settings['show_badge']) : ?>
                <div class="badge-price">
                    <span <?php $this->print_render_attribute_string('badge_text'); ?>><?php echo esc_html($settings['badge_text']); ?></span>
                </div>
            <?php endif; ?>
            <div class="pricing-header">
                <?php if (!empty($settings['image']['id']) && $settings['type'] === 'image') : ?>
                    <div class="item_icon-2 f-left">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                    </div>
                <?php else: ?>
                    <div class="item_icon-2 f-left">
                        <?php elh_element_render_icon($settings, 'icon', 'selected_icon'); ?>
                    </div>
                <?php endif; ?>
                <div class="item_header fix">
                    <?php if ($settings['sub_title']) : ?>
                        <span <?php $this->print_render_attribute_string('sub_title'); ?>><?php echo elh_element_kses_basic($settings['sub_title']); ?></span>
                    <?php endif; ?>
                    <?php if ($settings['title']) : ?>
                        <h3 <?php $this->print_render_attribute_string('title'); ?>><?php echo elh_element_kses_basic($settings['title']); ?></h3>
                    <?php endif; ?>
                </div>
            </div>

            <div class="item_body">
                <div class="price-bg bg_default_blue mb-40"
                     data-background="<?php echo get_template_directory_uri(); ?>/assets/images/pricing/pt.png">
                    <strong <?php $this->print_render_attribute_string('price'); ?>><sup><?php echo esc_html($currency); ?></sup><?php echo elh_element_kses_basic($settings['price']); ?>
                    </strong>
                </div>
                <?php if ($settings['description']) : ?>
                    <p class="mb-15"><?php echo elh_element_kses_basic($settings['description']); ?></p>
                <?php endif; ?>
                <?php if (!empty($settings['features_switch'])) : ?>
                    <?php if ($settings['features_title']) : ?>
                        <h4 <?php $this->print_render_attribute_string('features_title'); ?>>
                            <b><u><?php echo elh_element_kses_basic($settings['features_title']); ?></u></b>
                        </h4>
                    <?php endif; ?>
                    <ul class="price-list">
                        <?php foreach ($settings['features_list'] as $index => $feature) :
                            $name_key = $this->get_repeater_setting_key('text', 'features_list', $index);
                            $this->add_inline_editing_attributes($name_key, 'intermediate');
                            $this->add_render_attribute($name_key, 'class', 'price-feature-text');
                            ?>
                            <li class="<?php echo esc_attr('elementor-repeater-item-' . $feature['_id']); ?>">
                                <?php if (!empty($feature['icon']) || !empty($feature['selected_icon']['value'])) :
                                    elh_element_render_icon($feature, 'icon', 'selected_icon');
                                endif; ?>
                                <span <?php $this->print_render_attribute_string($name_key); ?>><?php echo elh_element_kses_intermediate($feature['text']); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>

            <?php if ($settings['button_text']) : ?>
                <div class="item_footer">
                    <a <?php $this->print_render_attribute_string('button_footer'); ?>>
                        <?php echo esc_html($settings['button_text']); ?> <span><i
                                    class="fal fa-arrow-right"></i></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>

        <?php else:
            if ($settings['active_price'] == true) {
                $class_name = " active";
            }
            $this->add_inline_editing_attributes('button_footer', 'none');
            $this->add_render_attribute('button_footer', 'class', 'thm-btn thm-btn-3');
            $this->add_link_attributes('button_footer', $settings['button_link']);
        ?>
        <div class="pp-single <?php if( true == $settings['active_price'] ) : ?> active<?php endif ?>">
            <div class="price-head mb-30">
                <?php if ($settings['title']) : ?>
                <span><?php echo elh_element_kses_basic($settings['title']); ?></span>
                <?php endif; ?>
                <h3><?php echo esc_html($currency); ?><?php echo elh_element_kses_basic($settings['price']); ?></h3>
            </div>
            <?php if (!empty($settings['features_list'])) : ?>
            <ul class="price-list">
                <?php foreach ($settings['features_list'] as $index => $feature) :
                    $name_key = $this->get_repeater_setting_key('text', 'features_list', $index);
                    $this->add_inline_editing_attributes($name_key, 'intermediate');
                    $this->add_render_attribute($name_key, 'class', 'price-feature-text');
                    
                ?>
                <li <?php if( false == $feature['disable'] ) : ?> class="disable" <?php endif ?>>
                    <?php if (!empty($feature['icon']) || !empty($feature['selected_icon']['value'])) :
                        elh_element_render_icon($feature, 'icon', 'selected_icon');
                    endif; ?>
                    <?php echo elh_element_kses_intermediate($feature['text']); ?>
                 </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if ($settings['button_text']) : ?>
            <div class="price-btn pt-40">
                <a <?php $this->print_render_attribute_string('button_footer'); ?>><?php echo esc_html($settings['button_text']); ?></a>
            </div>
            <?php endif; ?>
            <?php if( true == $settings['active_price'] ) : ?>
            <div class="pp-shape">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/shape/pp-shape.png" alt="">
            </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

        <?php
    }
}
