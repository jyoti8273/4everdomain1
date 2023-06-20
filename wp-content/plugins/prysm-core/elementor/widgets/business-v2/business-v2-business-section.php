<?php

    class business2_business_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business2_business_section';
        }

        public function get_title() {
            return __( 'Business V2 Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'business_content',
                [
                    'label' => __( 'Business Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            ); 

            $this->add_control(
                'business_img',
                [
                    'label' => __( 'About Bg', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon_img', [
                    'label'       => esc_html__( 'Icon Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'box_title', [
                    'label'       => esc_html__( 'Box Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'box_link', [
                    'label'       => esc_html__( 'Box URL', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );             
                       
            $this->add_control(
                'businessitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'about_style',
                [
                    'label' => esc_html__( 'Section Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'subtitle_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Subtitle Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'subtitle_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven .title',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven .title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'right_section_bg',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Right Section BG Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'section_bg_color',
                [
                    'label' => esc_html__( 'Section BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-section-five .carousel-column .inner-column, .business-section-five .carousel-column .inner-column:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_control(
                'title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'box_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block-four .inner-box h6',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'box_title_color',
                [
                    'label' => esc_html__( 'Box Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-four .inner-box h6 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_title_hover_color',
                [
                    'label' => esc_html__( 'Box Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-four .inner-box h6 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'box_bg_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Bg Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'bg_bg_color',
                [
                    'label' => esc_html__( 'Box BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-four .inner-box' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_dot',
                [
                    'label' => esc_html__( 'Box Dot Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-section-five .carousel-column .owl-dots .owl-dot' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_active_dot',
                [
                    'label' => esc_html__( 'Box Dot Active Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-section-five .carousel-column .owl-dots .owl-dot.active, .business-section-five .carousel-column .owl-dots .owl-dot:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $business_img   = $settings['business_img'];
            
            $subtitle    = $settings['subtitle'];
            $title    = $settings['title'];
            $businessitems    = $settings['businessitems'];
            

        ?>
        <!-- Business Section Five -->
        <section class="business-section-five">
            <div class="container">
                <div class="inner-container">
                    <div class="row clearfix">
                    
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="<?php echo esc_url($business_img['url']);?>" alt="" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Carousel Column -->
                        <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title-seven light style-two">
                                    <div class="title"><?php echo esc_html($subtitle);?></div>
                                    <h2><?php echo __($title);?></h2>
                                </div>
                                <div class="two-item-carousel owl-carousel owl-theme">
                                    <?php foreach($businessitems as $item):?>
                                    <!-- Business Block Four -->
                                    <div class="business-block-four">
                                        <div class="inner-box">
                                            <h6><a href="<?php echo esc_url($item['box_link']['url']);?>"><?php echo __($item['box_title']);?></a></h6>
                                            <span class="icon"><img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="" /></span>
                                        </div>
                                    </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Business Section Five -->
      <?php

              }

      }
