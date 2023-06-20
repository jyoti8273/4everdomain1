<?php

    class business2_testimonial_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business2_testimonial_section';
        }

        public function get_title() {
            return __( 'Business V2 Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_content',
                [
                    'label' => __( 'Testimonial Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'feedback', [
                    'label'       => esc_html__( 'Feedback', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'authore_img', [
                    'label'       => esc_html__( 'Authore Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'selector' => '{{WRAPPER}} .testimonial-block-six .inner-box .text:before',
                ]
            );
            $repeater->add_control(
                'authore_name', [
                    'label'       => esc_html__( 'Authore Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'designation', [
                    'label'       => esc_html__( 'Designation', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
                       
            $this->add_control(
                'testimonialsitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->add_control(
                'testimonialbg', [
                    'label'       => esc_html__( 'Testimonial BG', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'quoteimg', [
                    'label'       => esc_html__( 'Quote BG', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'testimonialimg', [
                    'label'       => esc_html__( 'Testimonial Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_top_heading_style',
                [
                    'label' => esc_html__( 'testimonial Top Heading Style', 'prysm' ),
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
                'title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Top Large Heading Style', 'prysm' ),
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
                'testimonial_feedback_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feedback Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'testimo_feedback_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-six .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'testimonial_feedback_color',
                [
                    'label' => esc_html__( 'Testimonial Feedback Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-six .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'authore_name_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Name Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_package_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-six .inner-box .author-box h6',
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
                'authore_name_color',
                [
                    'label' => esc_html__( 'Authore Name Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-six .inner-box .author-box h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            
            $subtitle    = $settings['subtitle'];
            $title    = $settings['title'];

            $testimonialsitem    = $settings['testimonialsitem'];

            $testimonialbg    = $settings['testimonialbg'];
            $quoteimg    = $settings['quoteimg'];
            $testimonialimg    = $settings['testimonialimg'];
            
            

        ?>
        <!-- Testimonial Section Six -->
        <section class="testimonial-section-six">
            <div class="container">
                <div class="row clearfix">
                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-seven style-two">
                                <div class="title"><?php echo esc_html($subtitle);?></div>
                                <h2><?php echo __($title);?></h2>
                            </div>
                            
                            <div class="single-item-carousel owl-carousel owl-theme">
                                <?php foreach($testimonialsitem as $item):?>
                                <!-- Testimonial Block Six -->
                                <div class="testimonial-block-six">
                                    <div class="inner-box">
                                        <div class="text"><?php echo esc_html($item['feedback']);?></div>
                                        <div class="author-box">
                                            <div class="box-inner">
                                                <span class="image">
                                                    <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="" />
                                                </span>
                                                <h6><?php echo esc_html($item['authore_name']);?></h6>
                                                <?php echo esc_html($item['designation']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            
                        </div>
                    </div>
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column" style="background-image: url(<?php echo esc_url($testimonialbg['url']);?>)">
                            <div class="image">
                                <span class="quote-icon">
                                    <img src="<?php echo esc_url($quoteimg['url']);?>" alt="" />
                                </span>
                                <img src="<?php echo esc_url($testimonialimg['url']);?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Testimonial Section Six -->
      <?php

              }

      }
