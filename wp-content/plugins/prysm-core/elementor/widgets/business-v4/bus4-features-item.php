<?php

    class bus4_feature_widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_feature_widget';
        }

        public function get_title() {
            return __( 'Business V4 Feature', 'prysm' );
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

            $this->add_control(
                'section_bg', [
                    'label'       => esc_html__( 'Section BG Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'feature_img', [
                    'label'       => esc_html__( 'Feature Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'ICON', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
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
                'link', [
                    'label'       => esc_html__( 'Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
            
            
            $this->add_control(
                'featuresitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'featr_style',
                [
                    'label' => __( 'Feature Style Section', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'section_spacing_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section-spacing',
                [
                    'label' => esc_html__( 'Margin Top', 'plugin-name' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .featured-section-two' => 'margin-top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'service_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'service_title',
                [
                    'label'     => esc_html__( 'Service Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'service_title_hvr',
                [
                    'label'     => esc_html__( 'Service Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box h4 a:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-seven .inner-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '24',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'service_desc_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Description Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'desc_txt_colo',
                [
                    'label'     => esc_html__( 'Description Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'desc_txt_hover_colo',
                [
                    'label'     => esc_html__( 'Description Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box:hover .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-seven .inner-box .text',
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
                'icon_stylw',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box .icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon_hover_color',
                [
                    'label'     => esc_html__( 'Icon Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box:hover .icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'box_overlay_bg',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Overlay BG Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'bg_color_overlay',
                [
                    'label'     => esc_html__( 'BG Overlay Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-seven .inner-box .image-layer:before' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $section_bg    = $settings['section_bg'];
            $featuresitem    = $settings['featuresitem'];

        ?>  
        <!-- Featured Section Two -->
        <section class="featured-section-two">
            <div class="pattern-layer" style="background-image:url(<?php echo esc_url($section_bg['url']);?>)"></div>
            <div class="auto-container">
                <div class="inner-container">
                    <div class="clearfix">
                        <?php foreach($featuresitem as $item):?>
                        <!-- Feature Block Seven -->
                        <div class="feature-block-seven col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box wow fadeInRight" data-wow-delay="300ms" data-wow-duration="1500ms">
                                <div class="image-layer" style="background-image:url(<?php echo esc_url($item['feature_img']['url']);?>)"></div>
                                <div class="content">
                                    <div class="upper-box">
                                        <span class="post-number"><?php echo esc_html($item['number']);?></span>
                                        <span class="icon"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                        <h4><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo __($item['title']);?></a></h4>
                                    </div>
                                    <div class="text"><?php echo __($item['description']);?></div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Featured Section Two -->
      <?php

              }

      }
