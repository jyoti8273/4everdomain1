<?php
namespace ElementHelper\Widget;

use \Elementor\Repeater;
use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Group_Control_Background;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Utils;


defined( 'ABSPATH' ) || die();

class CTA extends Element_El_Widget {


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
        return 'cta';
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
        return __( 'CTA', 'elementhelper' );
    }

    public function get_custom_help_url() {
        return 'http://elementor.sabber.com/widgets/gradient-heading/';
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
        return 'elh-widget-icon eicon-t-letter';
    }

    public function get_keywords() {
        return [ 'gradient', 'advanced', 'heading', 'title', 'colorful' ];
    }

    protected function register_content_controls() {

        //Settings
        $this->start_controls_section(
            '_section_settings',
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();
        
        //desc
        $this->start_controls_section(
            '_section_title',
            [
                'label' => __( 'Title & Desccription', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __( 'Sub Title', 'elementhelper' ),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __( 'Heading Sub Text', 'elementhelper' ),
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
                'default' => 'Heading Title',
                'placeholder' => __( 'Heading Text', 'elementhelper' ),
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
                ],
                'condition' => [
                    'design_style' => ['style_2']
                ],
            ]
        );

        $this->add_control(
            'bg_image',
            [
                'label' => __( 'Image', 'elementhelper' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
        'video_url',
        [
            'label' => __( 'Video Url', 'elementhelper' ),
            'description' => elh_element_get_allowed_html_desc( 'intermediate' ),
            'type' => Controls_Manager::TEXT,
            'default' => __( '#', 'elementhelper' ),
            'placeholder' => __( 'Enter video url', 'elementhelper' ),
            'rows' => 5,
            'dynamic' => [
                'active' => true,
            ],
            'condition' => [
                'design_style' => ['style_4']
            ],
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

        //listview with icon
        $this->start_controls_section(
            '_section_list',
            [
                'label' => __( 'Items List', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_2', 'style_3']
                ]
            ]
        );

        $repeater = new Repeater();

        
        $repeater->add_control(
            'title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Title', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );



        $this->add_control(
            'items_list',
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

        
        //button
        $this->start_controls_section(
            '_section_button',
            [
                'label' => __( 'Button', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1','style_2','style_3', 'style_4', 'style_5']
                ],
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementhelper' ),
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


        // 2nd btn
        $this->add_control(
            'button_text2',
            [
                'label' => __( 'Button Text 2', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Button Text',
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'design_style' => ['style_1']
                ],
            ]
        );

        $this->add_control(
            'button_link2',
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
            $this->add_control(
                'button_selected_icon2',
                [
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'button_icon',
                    'label_block' => true,
                ]
            );
            $condition = ['button_selected_icon[value]!' => ''];
        }

        $this->add_control(
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

        $this->add_control(
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

        $this->end_controls_section();


    }

    protected function register_style_controls() {
        $this->start_controls_section(
            '_section_style_title',
            [
                'label' => __( 'Title & Desccription', 'elementhelper' ),
                'tab'   => Controls_Manager::TAB_STYLE,
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
            'heading_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-area .cta-bg .cta-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-area .cta-bg .cta-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .cta-text .section-title h2',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .cta-text .section-title h2',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .cta-text .section-title h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'blend_mode',
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
                    '{{WRAPPER}} .cta-text .section-title h2' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        // subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Sub Title', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-text .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .cta-text .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .cta-text .section-title span',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subtitle',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .cta-text .section-title span',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .cta-text .section-title span' => 'color: {{VALUE}};',
                ],
            ]
        );

        // content

        $this->add_control(
            '_heading_description',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __( 'Content', 'elementhelper' ),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_desc_margin',
            [
                'label' => __( 'Margin', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_desc_padding',
            [
                'label' => __( 'Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desccription',
                'selector' => '{{WRAPPER}} .section-heading p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desccription',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .section-heading p',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .section-heading p' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $title = elh_element_kses_basic( $settings['title' ] );

        if( !empty($settings['bg_image']['id']) ) {
            $bg_image = wp_get_attachment_image_url( $settings['bg_image']['id'], $settings['thumbnail_size'] );
        }
                     
        ?>

        <?php if ( $settings['design_style'] === 'style_5' ): 

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', '' );

        $this->add_render_attribute( 'button', 'class', 'theme_btn theme_btn_bg' );
        $this->add_render_attribute( 'button', 'data-wow-delay', '.3s' );
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes( 'button', $settings['button_link'] );
        } 

        ?>

        <div class="widget custom-cta-widget wow fadeInUp2 animated" data-wow-delay='.1s'>
            <div class="widget-donate-box pos-rel text-center" style="background-image:url(<?php echo esc_url( $settings['bg_image']['url'] ); ?>);">
                <?php if ( $settings['sub_title'] ) : ?>
                    <h5><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></h5>
                <?php endif; ?>

                <?php if ( $settings['title'] ) : ?>
                    <h3><?php echo elh_element_kses_intermediate( $settings['title'] ); ?></h3>
                <?php endif; ?>

                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                    printf( '<a %1$s>%2$s</a>',
                        $this->get_render_attribute_string( 'button' ),
                        esc_html( $settings['button_text'] )
                        );
                elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                    if ( $settings['button_icon_position'] === 'before' ): ?>
                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                        <?php
                    else: ?>
                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                    <?php
                    endif;
                 endif; ?>
            </div>
        </div>

        <section class="donation-area d-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-7">
                        <div class="donation-wrapper donation-wrapper-02">
                            <div class="section-title white-title text-left mb-45 wow fadeInUp2 animated"
                                data-wow-delay='.2s'>

                                <?php if ( $settings['sub_title'] ) : ?>
                                    <h6 class="left-line pl-75 pr-75"><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></h6>
                                <?php endif; ?>

                                <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>


                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                        printf( '<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string( 'button' ),
                                            esc_html( $settings['button_text'] )
                                            );
                                    elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                    <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                        if ( $settings['button_icon_position'] === 'before' ): ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                            <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                        <?php
                                        endif;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-4 col-md-4 col-sm-5">
                        <?php if ( $settings['video_url'] ) : ?>
                        <div class="video-wrapper text-left text-md-right">
                            <div class="video-area pos-rel mr-15">
                                <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_4' ): 

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', '' );

        $this->add_render_attribute( 'button', 'class', 'theme_btn theme_btn_bg mt-45' );
        $this->add_render_attribute( 'button', 'data-wow-delay', '.3s' );
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes( 'button', $settings['button_link'] );
        } 

        if ( !empty($image) ) {
            $image = $settings['image']['url'];
        }

        ?>

        <section class="donation-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-8 col-md-8 col-sm-7">
                        <div class="donation-wrapper donation-wrapper-02">
                            <div class="section-title white-title text-left mb-45 wow fadeInUp2 animated"
                                data-wow-delay='.2s'>

                                <?php if ( $settings['sub_title'] ) : ?>
                                    <h6 class="left-line pl-75 pr-75"><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></h6>
                                <?php endif; ?>

                                <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>


                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                        printf( '<a %1$s>%2$s</a>',
                                            $this->get_render_attribute_string( 'button' ),
                                            esc_html( $settings['button_text'] )
                                            );
                                    elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                        <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                    <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                        if ( $settings['button_icon_position'] === 'before' ): ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                            <?php
                                        else: ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                        <?php
                                        endif;
                                endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-4 col-md-4 col-sm-5">
                        <?php if ( $settings['video_url'] ) : ?>
                        <div class="video-wrapper text-left text-md-right">
                            <div class="video-area pos-rel mr-15">
                                <a href="<?php echo esc_url( $settings['video_url'] ); ?>" class="popup-video"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_3' ): 

        $this->add_inline_editing_attributes( 'title', 'basic' );
        $this->add_render_attribute( 'title', 'class', '' );

        $this->add_render_attribute( 'button', 'class', 'theme_btn theme_btn_bg_02' );
        $this->add_render_attribute( 'button', 'data-wow-delay', '.5s' );
        if (!empty($settings['button_link'])) {
            $this->add_link_attributes( 'button', $settings['button_link'] );
        }

        ?>

        <section class="cta-area cta-area-02">
            <div class="container">
                <div class="row align-items-md-center">
                    <div class="col-xl-9 col-lg-9 col-md-8">
                        <div class="cta-wrapper wow fadeInUp2 animated" data-wow-delay='.1s'>
                            <div class="section-title mb-30">
                                <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4">
                        <div class="cta-wrapper">
                            <div class="cta-btn text-md-right wow fadeInUp2 animated" data-wow-delay='.1s'>
                                <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                            printf( '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $settings['button_text'] )
                                                );
                                        elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                            if ( $settings['button_icon_position'] === 'before' ): ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                                <?php
                                            else: ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                            <?php
                                            endif;
                                    endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <section class="cta_section sec_ptb_130 bg_default_blue deco_wrap clearfix d-none">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">

                    <div class="col-lg-5 col-md-7 col-sm-9 col-xs-12">
                        <?php if ( !empty($image) ): ?>
                        <div class="cta_image_2 wow fadeIn" data-wow-delay=".1s">
                            <img src="<?php echo esc_url($settings['image']['url']); ?>" alt="image_not_found" />
                        </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-6 col-md-7 col-sm-9 col-xs-12">
                        <div class="cta_content ml__30 text-white">
                            <div class="section_title mb_30 wow fadeInUp2" data-wow-delay=".2s">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <h4 class="small_title"><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></h4>
                                <?php endif; ?>
                                <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                tag_escape( $settings['title_tag'] ),
                                $this->get_render_attribute_string( 'title' ),
                                $title
                                ); ?>
                                <span class="biggest_title">Quote</span>
                            </div>
                            <?php if( $settings['desccription'] ): ?>
                            <p class="mb_30 border_left_yellow text-white wow fadeInUp2" data-wow-delay=".3s"><?php echo elh_element_kses_intermediate( $settings['desccription'] ); ?></p>
                            <?php endif; ?>
                            <?php if( !empty($settings['items_list']) ): ?>
                            <ul class="check_info_list ul_li_block clearfix mb_50 wow fadeInUp2" data-wow-delay=".4s">
                                <?php foreach ( $settings['items_list'] as $key => $item ) : ?>
                                <li><?php echo elh_element_kses_basic( $item['title'] ); ?></li>
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                            <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ):
                                printf( '<a %1$s href="%3$s">%2$s</a>',
                                    $this->get_render_attribute_string( 'button' ),
                                    esc_html( $settings['button_text'] ),
                                    esc_url($settings['button_link']['url']));
                            elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                            <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                if ( $settings['button_icon_position'] === 'before' ): ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                    <?php
                                else: ?>
                                    <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                <?php
                                endif;
                            endif; ?>
                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="deco_image deco_image_1 wow fadeInUp2" data-wow-delay=".1s">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cta/shape_01.png" alt="shape_not_found">
            </div>
        </section>

        <?php elseif ( $settings['design_style'] === 'style_2' ): 

            $this->add_render_attribute( 'button', 'class', 'theme_btn theme_btn_bg' );
            $this->add_render_attribute( 'button', 'data-wow-delay', '.4s' );
            if (!empty($settings['button_link'])) {
                $this->add_link_attributes( 'button', $settings['button_link'] );
            }

            ?>

            <section class="cta-area">
                <div class="container">
                    <div class="row align-items-md-center">
                        <div class="col-xl-9 col-lg-9 col-md-8">
                            <div class="cta-wrapper wow fadeInUp2 animated" data-wow-delay='.1s'>
                                <div class="section-title mb-30">
                                    <?php printf( '<%1$s %2$s>%3$s<span>.</span></%1$s>',
                                        tag_escape( $settings['title_tag'] ),
                                        $this->get_render_attribute_string( 'title' ),
                                        $title
                                    ); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4">
                            <div class="cta-wrapper">
                                <div class="cta-btn text-md-right wow fadeInUp2 animated" data-wow-delay='.1s'>
                                     <?php if ( $settings['button_text'] && ( ( empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) && empty( $settings['button_icon'] ) ) ) :
                                            printf( '<a %1$s>%2$s</a>',
                                                $this->get_render_attribute_string( 'button' ),
                                                esc_html( $settings['button_text'] )
                                                );
                                        elseif ( empty( $settings['button_text'] ) && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty( $settings['button_icon'] ) ) ) : ?>
                                            <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon' ); ?></a>
                                        <?php elseif ( $settings['button_text'] && ( ( !empty( $settings['button_selected_icon'] ) || empty( $settings['button_selected_icon']['value'] ) ) || !empty($settings['button_icon']) ) ) :
                                            if ( $settings['button_icon_position'] === 'before' ): ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span> <?php echo esc_html($settings['button_text']); ?></a>
                                                <?php
                                            else: ?>
                                                <a <?php $this->print_render_attribute_string( 'button' ); ?>><?php echo esc_html($settings['button_text']); ?> <span><?php elh_element_render_icon( $settings, 'button_icon', 'button_selected_icon', ['class' => 'elh-btn-icon'] ); ?></span></a>
                                            <?php
                                            endif;
                                    endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php else: 

            $this->add_inline_editing_attributes( 'title', 'basic' );
            $this->add_render_attribute( 'title', 'data-wow-delay', '.4s' );
        ?>


    <section class="cta-area">
        <div class="container">
            <div class="cta-bg">
                <div class="row">
                    <div class="col-xl-7 offset-xl-1 col-lg-8 col-md-8">
                        <div class="cta-text">
                            <div class="section-title">
                                <?php if ( $settings['sub_title'] ) : ?>
                                <span><?php echo elh_element_kses_intermediate( $settings['sub_title'] ); ?></span>
                                <?php endif; ?>
                                <?php printf( '<%1$s %2$s>%3$s</%1$s>',
                                    tag_escape( $settings['title_tag'] ),
                                    $this->get_render_attribute_string( 'title' ),
                                    $title
                                ); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="cta-app">
                            <img src="<?php echo esc_url($bg_image); ?>" alt="img">
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
