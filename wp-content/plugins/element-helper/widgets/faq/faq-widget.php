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

defined('ABSPATH') || die();

class FAQ extends Element_El_Widget
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
        return 'faq';
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
        return __('FAQ', 'elementhelper');
    }

    public function get_custom_help_url()
    {
        return 'http://elementor.sabber.com/widgets/contact-7-form/';
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
        return 'elh-widget-icon eicon-edit';
    }

    public function get_keywords()
    {
        return ['services', 'tab'];
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
                    'style_3' => __('Style 3', 'elementhelper'),
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
                'label' => __('Title ', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'elementhelper'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Heading Sub Title',
                'placeholder' => __('Heading Sub Text', 'elementhelper'),
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
                'default' => 'Heading Title',
                'placeholder' => __('Heading Text', 'elementhelper'),
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
            '_section_image',
            [
                'label' => __('Image', 'elementhelper'),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'design_style' => ['style_1', 'style_2'],
                ],
            ]
        );

        $this->add_control(
            'faq_image',
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

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_slides',
            [
                'label' => __('Faq List', 'elementhelper'),
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
            'tab_title',
            [
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'label' => __('Tab Title', 'elementhelper'),
                'default' => __('Tab Title', 'elementhelper'),
                'placeholder' => __('Type title here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'tab_content_image',
            [
                'label' => __('Image', 'elementhelper'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ],
                'condition' => [
                    'field_condition' => 'style_2'
                ],
            ]
        );

        $repeater->add_control(
            'tab_content_info',
            [
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'show_label' => false,
                'default' => __('Content Here', 'elementhelper'),
                'placeholder' => __('Type subtitle here', 'elementhelper'),
                'dynamic' => [
                    'active' => true,
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

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title',
                'selector' => '{{WRAPPER}} .faq-right .section-title h2, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2',
                'scheme' => Typography::TYPOGRAPHY_1,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .faq-right .section-title h2, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2',
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .faq-right .section-title h2, {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .faq-right .section-title h2 , {{WRAPPER}} .about3__wrapper h2, {{WRAPPER}} .about2__right h2' => 'mix-blend-mode: {{VALUE}};',
                ],
                'separator' => 'none',
            ]
        );

        // subtitle
        $this->add_control(
            '_heading_subtitle',
            [
                'type' => Controls_Manager::HEADING,
                'label' => __('Sub Title', 'elementhelper'),
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_margin',
            [
                'label' => __('Margin', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .faq-right .section-title span, {{WRAPPER}} .section-title span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'heading_subtitle_padding',
            [
                'label' => __('Padding', 'elementhelper'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .faq-right .section-title span, {{WRAPPER}} .section-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle',
                'selector' => '{{WRAPPER}} .faq-right .section-title span, {{WRAPPER}} .section-title span',
                'scheme' => Typography::TYPOGRAPHY_2,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'subtitle',
                'label' => __('Text Shadow', 'elementhelper'),
                'selector' => '{{WRAPPER}} .faq-right .section-title span, {{WRAPPER}} .section-title span',
            ]
        );

        $this->add_control(
            'heading_subtitle_color',
            [
                'label' => __('Text Color', 'elementhelper'),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .faq-right .section-title span, {{WRAPPER}} .section-title span' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .accordion-box .block .content .text ,{{WRAPPER}} .about3__content p, {{WRAPPER}} .about2__right p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .accordion-box .block .content .text ,{{WRAPPER}} .about3__content p, {{WRAPPER}} .about2__right p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desccription',
                'selector' => '{{WRAPPER}} .accordion-box .block .content .text ,{{WRAPPER}} .about3__content p, {{WRAPPER}} .about2__right p',
                'scheme' => Typography::TYPOGRAPHY_3,
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'desccription',
                'label' => __( 'Text Shadow', 'elementhelper' ),
                'selector' => '{{WRAPPER}} .accordion-box .block .content .text ,{{WRAPPER}} .about3__content p, {{WRAPPER}} .about2__right p',
            ]
        );

        $this->add_control(
            'heading_desc_color',
            [
                'label' => __( 'Text Color', 'elementhelper' ),
                'type' => Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .block .content .text ,{{WRAPPER}} .about3__content p, {{WRAPPER}} .about2__right p' => 'color: {{VALUE}};',
                ],
            ]
        );        

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title', 'class', '');
        $title = elh_element_kses_basic($settings['title']);

        // img 
        if (!empty($settings['faq_image']['id'])) {
            $faq_image = wp_get_attachment_image_url(!empty($settings['faq_image']['id']), !empty($settings['faq_image']));
            if (!$faq_image) {
                $faq_image = $settings['faq_image']['url'];
            }
        }

        if (empty($settings['slides'])) {
            return;
        }
        if ($settings['design_style'] === 'style_3'): ?>

    <div class="faq-3">
        <div class="faq-left-wrapper mb-40">
            <ul class="accordion-box clearfix">
                <?php foreach ($settings['slides'] as $id => $slide) :
                    // active class
                    $collapsed_tab = ($id == 0) ? 'active-block' : '';
                    $area_expanded = ($id == 0) ? 'true' : 'false';
                    $active_show_tab = ($id == 0) ? 'current' : '';
                    $tab_content_image = wp_get_attachment_image_url( !empty($slide['tab_content_image']['id']), !empty($slide['tab_image_size']) );
                    if ( ! $tab_content_image ) {
                        $tab_content_image = $slide['tab_content_image']['url'];
                    }
                ?>
                <li class="accordion block <?php echo esc_attr($collapsed_tab); ?>">
                    <div class="acc-btn">
                        <?php echo elh_element_kses_basic($slide['tab_title']); ?>
                    </div>
                    <div class="acc-content <?php echo esc_attr($active_show_tab); ?>">
                        <div class="content">
                            <?php if(!empty($slide['tab_content_image'])) : ?>
                            <div class="acc-thumb">
                                <img src="<?php echo $tab_content_image; ?>" alt="img">
                            </div>
                            <?php endif; ?>
                            <div class="acc-text">
                                <p><?php echo elh_element_kses_basic($slide['tab_content_info']); ?></p>
                            </div>  
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <?php elseif ($settings['design_style'] === 'style_2'): ?>
    <section class="faq-area faq-2">
        <div class="container-fluid">
            <div class="row no-gutters flex-row-reverse">
                <div class="col-lg-6">
                    <div class="faq-bg">
                        <img src="<?php echo esc_url($faq_image); ?>" alt="img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="faq-content pt-120 pb-120">
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
                        <div class="faq-block">
                            <ul class="accordion-box clearfix">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $collapsed_tab = ($id == 0) ? 'active-block' : '';
                                    $area_expanded = ($id == 0) ? 'true' : 'false';
                                    $active_show_tab = ($id == 0) ? 'current' : '';
                                ?>
                                <li class="accordion block <?php echo esc_attr($collapsed_tab); ?>">
                                    <div class="acc-btn">
                                        <?php echo elh_element_kses_basic($slide['tab_title']); ?>
                                    </div>
                                    <div class="acc-content <?php echo esc_attr($active_show_tab); ?>">
                                        <div class="content">
                                            <div class="text">
                                                <?php echo elh_element_kses_basic($slide['tab_content_info']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php else: ?>

    <section class="faq-area pt-115">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="faq-left mb-30">
                        <div class="faq-img duxin-animate">
                            <img src="<?php echo esc_url($faq_image); ?>" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="faq-right mb-30">
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
                        <div class="faq-block">
                            <ul class="accordion-box clearfix">
                                <?php foreach ($settings['slides'] as $id => $slide) :
                                    // active class
                                    $collapsed_tab = ($id == 0) ? 'active-block' : '';
                                    $area_expanded = ($id == 0) ? 'true' : 'false';
                                    $active_show_tab = ($id == 0) ? 'current' : '';
                                ?>
                                <li class="accordion block <?php echo esc_attr($collapsed_tab); ?>">
                                    <div class="acc-btn">
                                        <?php echo elh_element_kses_basic($slide['tab_title']); ?>
                                    </div>
                                    <div class="acc-content <?php echo esc_attr($active_show_tab); ?>">
                                        <div class="content">
                                            <div class="text">
                                                <?php echo elh_element_kses_basic($slide['tab_content_info']); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; ?>
                            </ul>
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