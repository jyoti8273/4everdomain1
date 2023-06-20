<?php

    class constv4_testimonial_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_testimonial_section';
        }

        public function get_title() {
            return __( 'Consulting V4 Testimonial', 'prysm' );
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
            $this->add_control(
                'pattern1_img',
                [
                    'label' => __( 'Pattern 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'pattern_img',
                [
                    'label' => __( 'Pattern Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );  
            $repeater->add_control(
                'authore_img',
                [
                    'label' => __( 'Authore Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );  
                
            $repeater->add_control(
                'authore_name',
                [
                    'label' => __( 'Authore Name', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'feedback',
                [
                    'label' => __( 'FeedBack', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );          
                   
            $repeater->add_control(
                'designation',
                [
                    'label' => __( 'Designation', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
                'testimonial_style',
                [
                    'label' => esc_html__( 'Testimonial Style', 'prysm' ),
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
                    'name'           => 'about_sub_title_style',
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
                'about_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_title_typography',
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
                'tesatimonial_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_number_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-five .inner-box h6',
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
                'testimonial_heading_color',
                [
                    'label' => esc_html__( 'Testimonial Heading Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-five .inner-box h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'fanfact Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-five .column .inner .counter-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'serv_title_color',
                [
                    'label' => esc_html__( 'fanfact Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-five .column .inner .counter-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $subtitle      = $settings['subtitle'];
            $title         = $settings['title'];
            $testimonialsitem      = $settings['testimonialsitem'];
            

        ?>
        <!-- Testimonial Section Five -->
        <section class="testimonial-section-five">
            <div class="auto-container">
                <!-- Sec Title Seven -->
                <div class="sec-title-seven">
                    <div class="title"><?php echo esc_html($subtitle);?></div>
                    <h2><?php echo __($title);?></h2>
                </div>
                <div class="color-layer"></div>
                <div class="pattern-layer" style="background-image: url(<?php echo esc_url($settings['pattern1_img']['url']);?>)"></div>
                <div class="testimonial-carousel owl-carousel owl-theme">
                    <?php foreach($testimonialsitem as $item):?>
                    <!-- Testimonial Block Five -->
                    <div class="testimonial-block-five">
                        <div class="inner-box" style="background-image: url(<?php echo esc_url($item['pattern_img']['url']);?>)">
                            <div class="quote flaticon-right-quote"></div>
                            <div class="image">
                                <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="" />
                            </div>
                            <div class="text"><?php echo esc_html($item['feedback']);?></div>
                            <h6><?php echo esc_html($item['authore_name']);?></h6>
                            <div class="designation"><?php echo esc_html($item['designation']);?></div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </div>
        </section>
        <!-- End Testimonial Section Five -->
      <?php

              }

      }
