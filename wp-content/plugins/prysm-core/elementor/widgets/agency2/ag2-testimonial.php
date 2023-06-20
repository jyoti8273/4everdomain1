<?php

    class ag2_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_testimonial';
        }

        public function get_title() {
            return __( 'Agency Two Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_section',
                [
                    'label' => __( 'Testimonial Contetn', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Pricing Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $this->add_control(
                'colortitle', [
                    'label'       => esc_html__( 'Color Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'pattern_img', [
                    'label'       => esc_html__( 'Pattern Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'testimonial_img', [
                    'label'       => esc_html__( 'Testimonial Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
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
                    'title_field' => '{{{ authore_name }}}',
                ]
            );

            

            $this->end_controls_section();

            $this->start_controls_section(
                'blog_heading_style',
                [
                    'label' => esc_html__( 'Section Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'head_sub_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'hed_subtitle_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hed-subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine .title',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'head__title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'main_heading_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'head_inbfo',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color_cl',
                [
                    'label'     => esc_html__( 'Color Title', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2 span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'testimonial_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Testimonial Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'feedback_color',
                [
                    'label'     => esc_html__( 'Feedback Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-eight .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fbd_typo',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-eight .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '30',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'name_color',
                [
                    'label'     => esc_html__( 'Name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-eight .inner-box .author' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'auth_name_typo',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-eight .inner-box .author',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '22',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'designation_color',
                [
                    'label'     => esc_html__( 'Designation Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-eight .inner-box .author span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'deg_typo',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-eight .inner-box .author span',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'border_color',
                [
                    'label'     => esc_html__( 'Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-eight .inner-box .author:before' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'image_shape_bg',
                [
                    'label'     => esc_html__( 'Shape BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-section-eight .image-column .triangle-one, .testimonial-section-eight .image-column .triangle-two' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $colortitle     = $settings['colortitle'];
            $testimonialsitem    = $settings['testimonialsitem'];

        ?>  
        <!-- Testimonial Section Eight -->
        <section class="testimonial-section-eight" style="background-image: url(<?php echo esc_url($settings['pattern_img']['url']);?>)">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <div class="triangle-one"></div>
                                <div class="triangle-two"></div>
                                <img src="<?php echo esc_url($settings['testimonial_img']['url']);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-nine">
                                <div class="title"><?php echo esc_html($sub_title);?></div>
                                <h2><?php echo esc_html($title);?> <span><?php echo esc_html($colortitle);?></span></h2>
                            </div>
                            <div class="single-item-carousel owl-carousel owl-theme">
                                <?php foreach($testimonialsitem as $item):?>
                                <!-- Testimonial Block Eight -->
                                <div class="testimonial-block-eight">
                                    <div class="inner-box">
                                        <span class="quote-icon fas fa-quote-left"></span>
                                        <div class="text"><?php echo esc_html($item['feedback']);?></div>
                                        <div class="author">
                                            <?php echo esc_html($item['authore_name']);?>
                                            <span><?php echo esc_html($item['designation']);?></span>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Testimonial Section Eight -->
        <!-- End News Section Ten -->
      <?php

              }

      }
