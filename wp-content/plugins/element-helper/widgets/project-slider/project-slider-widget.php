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

defined('ABSPATH') || die();

class  Project_Slider extends Element_El_Widget
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
        return 'project_slider';
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
        return __('Project Slider', 'elementhelper');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.sabber.com/widgets/slider/';
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
        return 'elh-widget-icon eicon-gallery-grid';
    }

    public function get_keywords()
    {
        return ['slider', 'image', 'gallery', 'project'];
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
                    'style_2' => __('Style 2', 'elementhelper'),
                    'style_3' => __('Style 3', 'elementhelper')
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
                'condition' => [
                    'design_style' => ['style_1']
                ],
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


        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Project List', 'elementhelper'),
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
                ],
                'default' => 'style_1',
                'frontend_available' => true,
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
                'label' => __('Title', 'elementhelper'),
                'default' => __('Item List', 'elementhelper'),
                'placeholder' => __('Type title here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ]
            ]
        );

        $repeater->add_control(
            'cat_name',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Project Category', 'elementhelper'),
                'default' => __('Ux Design', 'elementhelper'),
                'placeholder' => __('Type here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => ['style_1']
                ],
            ]
        );

        $repeater->add_control(
            'slide_url',
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
                'title_field' => '<# print("Carousel Item"); #>',
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
                'label' => __('Settings', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'animation_speed',
            [
                'label' => __('Animation Speed', 'elementhelper'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 10,
                'max' => 10000,
                'default' => 300,
                'description' => __('Slide speed in milliseconds', 'elementhelper'),
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __('Autoplay?', 'elementhelper'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementhelper'),
                'label_off' => __('No', 'elementhelper'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __('Autoplay Speed', 'elementhelper'),
                'type' => Controls_Manager::NUMBER,
                'min' => 100,
                'step' => 100,
                'max' => 10000,
                'default' => 3000,
                'description' => __('Autoplay speed in milliseconds', 'elementhelper'),
                'condition' => [
                    'autoplay' => 'yes'
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'loop',
            [
                'label' => __('Infinite Loop?', 'elementhelper'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementhelper'),
                'label_off' => __('No', 'elementhelper'),
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'vertical',
            [
                'label' => __('Vertical Mode?', 'elementhelper'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'elementhelper'),
                'label_off' => __('No', 'elementhelper'),
                'return_value' => 'yes',
                'frontend_available' => true,
                'style_transfer' => true,
            ]
        );

        $this->add_control(
            'navigation',
            [
                'label' => __('Navigation', 'elementhelper'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'none' => __('None', 'elementhelper'),
                    'arrow' => __('Arrow', 'elementhelper'),
                    'dots' => __('Dots', 'elementhelper'),
                    'both' => __('Arrow & Dots', 'elementhelper'),
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
                'label' => __('Title & Sub Title', 'elementhelper'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} .portfolio-left h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-left h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .portfolio-left h2',
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
                    '{{WRAPPER}} .portfolio-left span' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .portfolio-left span' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .portfolio-left span',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $title = elh_element_kses_basic($settings['title']);
        if (empty($settings['slides'])) {
            return;
        }
        ?>

    <?php if ($settings['design_style'] === 'style_3'): ?>
    <div class="gallery-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="gallery-active owl-carousel">
                        <?php foreach ($settings['slides'] as $slide) :
                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            }
                        ?>
                        <?php if (!empty($image)) : ?>
                        <div class="gallery-s-item">
                            <div class="gallery-s-img">
                                <img src="<?php print esc_url($image); ?>" alt="img">
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php elseif ($settings['design_style'] === 'style_2'): ?>
    <div class="showcase-active owl-carousel">
        <?php foreach ($settings['slides'] as $slide) :
            if (!empty($slide['image']['id'])) {
                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
            }
        ?>
        <?php if (!empty($image)) : ?>
        <div class="layout-image">
            <img src="<?php print esc_url($image); ?>" alt="img">
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <section class="portfilo-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="portfolio-left">
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
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="portfolio-active owl-carousel">
                        <?php foreach ($settings['slides'] as $slide) :
                            if (!empty($slide['image']['id'])) {
                                $image = wp_get_attachment_image_url($slide['image']['id'], $settings['thumbnail_size']);
                            }
                        ?>
                        <div class="port-single">
                            <?php if (!empty($image)) : ?>
                            <div class="port-thumb">
                                <img src="<?php print esc_url($image); ?>" alt="img">
                            </div>
                            <?php endif; ?>
                            <div class="port-content">
                                <?php if (!empty($slide['slide_url'])) : ?>
                                <div class="port-icon">
                                    <a href="<?php echo esc_url($slide['slide_url']['url']); ?>">
                                        <i class="ti-arrow-right "></i>
                                    </a>
                                </div>
                                <?php endif; ?>
                                <div class="port-text">
                                    <?php if (!empty($slide['title'])) : ?>
                                    <span><?php echo elh_element_kses_basic($slide['cat_name']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($slide['title'])) : ?>
                                    <h4><a href="<?php echo esc_url($slide['slide_url']['url']); ?>"><?php echo elh_element_kses_basic($slide['title']); ?></a></h4>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php endif; ?>

        <?php
    }
}
