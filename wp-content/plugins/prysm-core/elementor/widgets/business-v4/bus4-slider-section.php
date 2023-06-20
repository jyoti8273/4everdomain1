<?php

    class bus4_slider_widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_slider_widget';
        }

        public function get_title() {
            return __( 'Business V4 Slider', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'slider_section',
                [
                    'label' => __( 'Slider Contetn', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );


            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'sliderbg', [
                    'label'       => esc_html__( 'Slider BG Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'slider_thumb', [
                    'label'       => esc_html__( 'Slider Thumb Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'subtitle', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 

            $repeater->add_control(
                'btn_link', [
                    'label'       => esc_html__( 'Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'video_link', [
                    'label'       => esc_html__( 'Video Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'video_label', [
                    'label'       => esc_html__( 'Video Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            
            $this->add_control(
                'slidersitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'client_style_section',
                [
                    'label' => __( 'Slider Style Section', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'section_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_sub_title',
                [
                    'label'     => esc_html__( 'Sub TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author-slider-block .inner-box .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .author-slider-block .inner-box .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'section_heading_main_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_main_title',
                [
                    'label'     => esc_html__( 'TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author-slider-block .inner-box h1' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .author-slider-block .inner-box h1',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '72',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'section_desc_main_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Description Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'slider_desc_style',
                [
                    'label'     => esc_html__( 'Description Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author-slider-block .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'desc_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .author-slider-block .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'video_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Video Play Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'video_text_colr',
                [
                    'label'     => esc_html__( 'Video Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author-slider-block .inner-box .play-box i' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'video_btn_bg_colr',
                [
                    'label'     => esc_html__( 'Video Button BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author-slider-block .inner-box .play-box .fa' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'video_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .author-slider-block .inner-box .play-box i',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'authore_thumb_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Thumb Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'auth_thumb_clr',
                [
                    'label'     => esc_html__( 'Authore Thumb Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .author-slider-section .client-thumb-outer .owl-item.active .thumb-box' => 'border-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'button__content',
                [
                    'label' => __( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-twentyseven .txt',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->start_controls_tabs( '_banner_button_1' );
            $this->start_controls_tab(
                '_prysm_btn__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-twentyseven .txt' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-twentyseven',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyseven' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyseven' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-twentyseven .txt:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-twentyseven:before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyseven .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .btn-style-twentyseven .txt:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyseven:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $slidersitems    = $settings['slidersitems'];

        ?>  
        <!-- Author Slider Section -->
        <section class="author-slider-section">
            <!-- Client Testimonial Carousel -->
            <div class="client-testimonial-carousel owl-carousel owl-theme">
                <?php foreach($slidersitems as $item):?>
                <!-- Author Slider Block -->
                <div class="author-slider-block" style="background-image:url(<?php echo esc_url($item['sliderbg']['url']);?>)">
                    <div class="auto-container">
                        <div class="inner-box">
                            <div class="title"><?php echo esc_html($item['subtitle']);?></div>
                            <h1><?php echo __($item['title']);?></h1>
                            <div class="text"><?php echo __($item['description']);?></div>
                            <div class="options-box clearfix">
                                <div class="pull-left">
                                    <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn btn-style-twentyseven"><span class="txt"><?php echo esc_html($item['btn_label']);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                                </div>
                                <div class="pull-left">
                                    <a href="<?php echo esc_url($item['video_link']);?>" class="lightbox-image play-box"><span class="fa fa-play"></span><i><?php echo esc_html($item['video_label']);?></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            
            <!-- Product Thumbs Carousel -->
            <div class="client-thumb-outer">
                <div class="client-thumbs-carousel owl-carousel owl-theme">
                    <?php foreach($slidersitems as $item):?>
                    <div class="thumb-item">
                        <figure class="thumb-box"><img src="<?php echo esc_url($item['slider_thumb']['url']);?>" alt=""></figure>
                    </div>
                    <?php endforeach;?>                    
                </div>
            </div>
        </section>
        <!-- End Author Slider Section -->
      <?php

              }

      }
