<?php
namespace ElementHelper\Widget;

use \Elementor\Controls_Manager;
use \Elementor\Group_Control_Border;
use \Elementor\Group_Control_Box_Shadow;
use \Elementor\Group_Control_Typography;
use \Elementor\Group_Control_Image_Size;
use \Elementor\Group_Control_Text_Shadow;
use \Elementor\Core\Schemes\Typography;
use \Elementor\Repeater;
use \Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Services_Tab extends Element_El_Widget {

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
        return 'services-tab';
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
        return __( 'Services Tab', 'elementhelper' );
    }

	public function get_custom_help_url() {
		return 'http://elementor.sabber.com/widgets/contact-7-form/';
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
        return 'elh-widget-icon eicon-favorite';
    }

    public function get_keywords() {
        return [ 'services', 'tab' ];
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
                'label' => __( 'Title & Description', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_3']
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
                'type' => Controls_Manager::TEXT,
                'default' => __( 'ElhInfo Box Title', 'elementhelper' ),
                'placeholder' => __( 'Type Info Box Title', 'elementhelper' ),
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
            'sort_description',
            [
                'label' => __( 'Sort Description', 'elementhelper' ),
                'description' => elh_element_get_allowed_html_desc( 'intermediate' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Elhinfo box sort description goes here', 'elementhelper' ),
                'placeholder' => __( 'Type info box sort description', 'elementhelper' ),
                'rows' => 5,
                'condition' => [
                    'design_style' => 'style_1'
                ],
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
            '_section_slides',
            [
                'label' => __( 'Slides', 'elementhelper' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'field_condition',
            [
                'label' => __( 'Field condition', 'elementhelper' ),
                'type' => Controls_Manager::SELECT,
                'frontend_available' => true,
                'style_transfer' => true,
                'options' => [
                    'style_1' => __( 'Style 1', 'elementhelper' ),
                    'style_2' => __( 'Style 2', 'elementhelper' ),
                ],
                'default' => 'style_1',
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
                'condition' => [
                    'field_condition' => 'style_2'
                ],
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
                    'type' => 'image',
                    'field_condition' => 'style_2'
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
                    'type' => 'image',
                    'field_condition' => 'style_2'
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
                        'type' => 'icon',
                        'field_condition' => 'style_2'
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
                        'type' => 'icon',
                        'field_condition' => 'style_2'
                    ]
                ]
            );
        }

        $repeater->add_control(
            'tab_menu_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Tab Menu Title', 'elementhelper' ),
                'default' => __( 'Tab Menu Title', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );         

        
        $repeater->add_control(
            'tab_subtitle',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Tab Sub Title', 'elementhelper' ),
                'default' => __( 'Tab Sub Title', 'elementhelper' ),
                'placeholder' => __( 'Type sub-title here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        ); 

        $repeater->add_control(
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __( 'Tab Title', 'elementhelper' ),
                'default' => __( 'Tab Title', 'elementhelper' ),
                'placeholder' => __( 'Type title here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );         

        $repeater->add_control(
            'tab_content',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Tab Content', 'elementhelper' ),
                'default' => __( 'Content Here', 'elementhelper' ),
                'placeholder' => __( 'Type subtitle here', 'elementhelper' ),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );        

        $repeater->add_control(
            'tab_content_list',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => true,
                'label' => __( 'Tab Content List', 'elementhelper' ),
                'default' => __( 'Content Here', 'elementhelper' ),
                'placeholder' => __( 'Type content here', 'elementhelper' ), 
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_image',
            [
                'type' => Controls_Manager::MEDIA,
                'label' => __( 'Tab Image', 'elementhelper' ),
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        // Button
        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'Learn More',
                'placeholder' => __( 'Type button text here', 'elementhelper' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => 'style_1'
                ]
            ]
        );        

        $repeater->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'elementhelper' ),
                'type' => Controls_Manager::TEXT,
                'default' => '#',
                'placeholder' => __( 'button url', 'elementhelper' ),
                'label_block' => true,
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => 'style_1'
                ]
            ]
        );



        // REPEATER
        $this->add_control(
            'slides',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(tab_title || "Carousel Item"); #>',
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

    }




    // register_style_controls

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
            'heading_padding',
            [
                'label' => __( 'Menu Padding', 'elementhelper' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .services-tab .nav-link' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .service-content .section-title > h2, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .service-content .section-title > h2, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .service-content .section-title > h2, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .service-content .section-title span, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_control(
            'subheading_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .service-content .section-title span, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .service-conten p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .service-conten p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desccription',
                'selector' => '{{WRAPPER}} .service-conten p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desccription',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .service-conten p',
            ]
        );

        $this->add_control(
            'desc_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .service-conten p' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_btn',
            [
                'label' => __('Button', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'btn_typography',
                'selector' => '{{WRAPPER}} .service-content .thm-btn',
                'scheme' => Typography::TYPOGRAPHY_4,
            ]
        );

        $this->add_control(
            'button_bg_color',
            [
                'label' => __('Bg Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content .thm-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_bg_color',
            [
                'label' => __('Hover Bg Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content .thm-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content .thm-btn' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_hover_text_color',
            [
                'label' => __('Text Hover Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-content .thm-btn:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'btn_border',
                'selector' => '{{WRAPPER}} .service-content .thm-btn',
            ]
        );

        $this->add_control(
            'btn_border_radius',
            [
                'label' => __('Border Radius', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .service-content .thm-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'btn_box_shadow',
                'selector' => '{{WRAPPER}} .service-content .thm-btn',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display(); 
        $this->add_render_attribute( 'title_2', 'class', 'section-title' );
        $title = elh_element_kses_basic( $settings['title' ] );

        if ( empty( $settings['slides'] ) ) {
            return;
        }

        ?>


    <?php if ( $settings['design_style'] === 'style_1' ) : 
        // section_bg_image
        if (!empty($settings['section_bg_image']['id'])) {
            $section_bg_image = wp_get_attachment_image_url( $settings['section_bg_image']['id'], 'full' );
            if ( ! $section_bg_image ) {
                $section_bg_image = $settings['section_bg_image']['url'];
            } 
        } 
    ?>

    <section class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="services-tab">
                        <ul class="nav" id="myTab" role="tablist">
                            <?php foreach ( $settings['slides'] as $id => $slide ) :
                                // img 
                                $tab_image = wp_get_attachment_image_url( !empty($slide['tab_image']['id']), !empty($slide['tab_image_size']) );
                                if ( ! $tab_image ) {
                                    $tab_image = $slide['tab_image']['url'];
                                }
                                // active class
                                $active_tab = ($id == 0) ? 'active show' : '';      
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo esc_attr($active_tab); ?>" id="nav-tab-<?php echo esc_attr($id); ?>" data-toggle="tab" href="#nav-<?php echo esc_attr($id); ?>" role="tab" aria-controls="nav-<?php echo esc_attr($id); ?>" aria-selected="false"><?php echo elh_element_kses_basic( $slide['tab_menu_title'] ); ?></a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="tab-content tab-border" id="myTabContent">
                        <?php foreach ( $settings['slides'] as $id => $slide ) :

                        // img 
                        $tab_image = wp_get_attachment_image_url( !empty($slide['tab_image']['id']), !empty($slide['tab_image_size']) );
                        if ( ! $tab_image ) {
                            $tab_image = $slide['tab_image']['url'];
                        }
                        // active class
                        $active_tab = ($id == 0) ? 'active show' : '';      
                        ?>
                        <div class="tab-pane fade <?php echo esc_attr($active_tab); ?>" id="nav-<?php echo esc_attr($id); ?>" role="tabpanel" aria-labelledby="nav-tab-<?php echo esc_attr($id); ?>">
                            <div class="services-content-wrapper">
                                <div class="row align-items-center">
                                    <div class="col-lg-5">
                                        <?php if ( !empty( $tab_image ) ) : ?>
                                        <div class="services-thumb">
                                            <img src="<?php print esc_url($tab_image); ?>" alt="img">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="service-content">
                                            <div class="section-title">
                                                <?php if ( !empty( !empty($slide['tab_subtitle']) ) ) : ?>
                                                <span><?php echo elh_element_kses_basic( $slide['tab_subtitle'] ); ?></span>
                                                <?php endif; ?>
                                                <?php if ( !empty( !empty($slide['tab_title']) ) ) : ?>
                                                <h2><?php echo elh_element_kses_basic( $slide['tab_title'] ); ?></h2>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ( !empty( !empty($slide['tab_content']) ) ) : ?>
                                            <p><?php echo elh_element_kses_basic( $slide['tab_content'] ); ?></p>
                                            <?php endif; ?>
                                            <ul class="s-list pt-15">
                                                <?php echo elh_element_kses_intermediate($slide['tab_content_list']); ?>
                                            </ul>
                                            <?php if ( !empty( !empty($slide['button_url']) ) ) : ?>
                                            <div class="s-btn pt-40">
                                                <a class="thm-btn thm-btn-3" href="<?php echo esc_url( $slide['button_url'] ); ?>"><?php echo esc_html( $slide['button_text'] ); ?></a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php elseif ( $settings['design_style'] === 'style_2' ) : 
        // section_bg_image
        if (!empty($settings['section_bg_image']['id'])) {
            $section_bg_image = wp_get_attachment_image_url( $settings['section_bg_image']['id'], 'full' );
            if ( ! $section_bg_image ) {
                $section_bg_image = $settings['section_bg_image']['url'];
            } 
        } 
    ?>

    <section class="services-area services-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="services-tab">
                        <ul class="nav" id="myTab" role="tablist">
                            <?php foreach ( $settings['slides'] as $id => $slide ) :
                                // img 
                                $tab_image = wp_get_attachment_image_url( !empty($slide['tab_image']['id']), !empty($slide['tab_image_size']) );
                                if ( ! $tab_image ) {
                                    $tab_image = $slide['tab_image']['url'];
                                }
                                // active class
                                $active_tab = ($id == 0) ? 'active show' : '';      
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?php echo esc_attr($active_tab); ?>" id="nav-tab-<?php echo esc_attr($id); ?>" data-toggle="tab" href="#nav-<?php echo esc_attr($id); ?>" role="tab" aria-controls="nav-<?php echo esc_attr($id); ?>" aria-selected="false">
                                    <span class="icon service-icon">
                                    <?php if ( $slide['type'] === 'image' && ( $slide['image']['url'] || $slide['image']['id'] ) ) :
                                        $this->get_render_attribute_string( 'image' );
                                        $slide['hover_animation'] = 'disable-animation'; // hack to prevent image hover animation
                                        ?>
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html( $slide, 'thumbnail', 'image' ); ?>
                                        <?php elseif ( ! empty( $slide['icon'] ) || ! empty( $slide['selected_icon']['value'] ) ) : ?>
                                        
                                        <?php elh_element_render_icon( $slide, 'icon', 'selected_icon' ); ?>
                                        
                                    <?php endif; ?>
                                    </span>
                                    <span class="title"><?php echo elh_element_kses_basic( $slide['tab_menu_title'] ); ?></span>
                                </a>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="tab-content tab-border" id="myTabContent">
                        <?php foreach ( $settings['slides'] as $id => $slide ) :
                            // img 
                            $tab_image = wp_get_attachment_image_url( !empty($slide['tab_image']['id']), !empty($slide['tab_image_size']) );
                            if ( ! $tab_image ) {
                                $tab_image = $slide['tab_image']['url'];
                            }
                            // active class
                            $active_tab = ($id == 0) ? 'active show' : '';      
                        ?>
                        <div class="tab-pane fade <?php echo esc_attr($active_tab); ?>" id="nav-<?php echo esc_attr($id); ?>" role="tabpanel" aria-labelledby="nav-tab-<?php echo esc_attr($id); ?>">
                            <div class="services-content-wrapper">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        <?php if ( !empty( $tab_image ) ) : ?>
                                        <div class="services-thumb">
                                            <img src="<?php print esc_url($tab_image); ?>" alt="img">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="service-content">
                                            <div class="section-title">
                                                <?php if ( !empty( !empty($slide['tab_subtitle']) ) ) : ?>
                                                <span><?php echo elh_element_kses_basic( $slide['tab_subtitle'] ); ?></span>
                                                <?php endif; ?>
                                                <?php if ( !empty( !empty($slide['tab_title']) ) ) : ?>
                                                <h2><?php echo elh_element_kses_basic( $slide['tab_title'] ); ?></h2>
                                                <?php endif; ?>
                                            </div>
                                            <?php if ( !empty( !empty($slide['tab_content']) ) ) : ?>
                                            <p><?php echo elh_element_kses_basic( $slide['tab_content'] ); ?></p>
                                            <?php endif; ?>
                                            <ul class="s-list pt-15">
                                                <?php echo elh_element_kses_intermediate($slide['tab_content_list']); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
        
    <?php elseif ( $settings['design_style'] === 'style_3' ) : 
        $slider_active = !empty($settings['slider_active']) ? 'service-active' : ''; 
    ?>
             

        <?php endif; ?>


        <?php

    }
}