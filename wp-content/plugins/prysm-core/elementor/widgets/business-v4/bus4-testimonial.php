<?php

    class bus4_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_testimonial';
        }

        public function get_title() {
            return __( 'Business 4 Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_contetn',
                [
                    'label' => __( 'Testimonial Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'testm_bg', [
                    'label'       => esc_html__( 'Section Background', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'count', [
                    'label'       => esc_html__( 'Count', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();

        
            $repeater->add_control(
                'authore_thumb',
                [
                    'label' => esc_html__( 'Authore Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
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
            $repeater->add_control(
                'feedback', [
                    'label'       => esc_html__( 'Feedback', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
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
            
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_style',
                [
                    'label' => esc_html__( 'Testimonial Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                '_sub_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title_clr',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eleven .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eleven .title',
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
                'main_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Main Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sec_main_title_colo',
                [
                    'label'     => esc_html__( 'Main Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eleven h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eleven h2',
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
                'feedback_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feedback Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'fb_text_clor',
                [
                    'label'     => esc_html__( 'Feedback Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-ten .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feedback_typo__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-ten .inner-box .text',
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
                'tes_name_color',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Name Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'auth_name_color',
                [
                    'label'     => esc_html__( 'Authore name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-ten .inner-box h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'auth_name__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-ten .inner-box h6',
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
                'tes_desig_color',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Designation Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'auth_desig_color',
                [
                    'label'     => esc_html__( 'Designation Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-ten .inner-box .designation' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'auth_design__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-ten .inner-box .designation',
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
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $testm_bg     = $settings['testm_bg']['url'];
            $count         = $settings['count'];
            $sub_title     = $settings['sub_title'];
            $maintitle       = $settings['maintitle'];
            $testimonialsitem       = $settings['testimonialsitem'];

        ?>

        <!-- Testimonial Section Ten -->
        <section class="testimonial-section-ten" style="background-image:url(<?php echo esc_url($testm_bg);?>)">
            <div class="auto-container">
                <div class="sec-title-eleven centered">
                    <div class="number"><?php echo esc_html($count);?></div>
                    <div class="title"><?php echo esc_html($sub_title);?></div>
                    <h2><?php echo __($maintitle);?></h2>
                </div>
                <div class="three-item-carousel owl-carousel owl-theme">
                    <?php foreach($testimonialsitem as $item):?>
                    <!-- Testimonial Block Ten -->
                    <div class="testimonial-block-ten">
                        <div class="inner-box">
                            <span class="quote flaticon-right-quote"></span>
                            <div class="author-image">
                                <img src="<?php echo esc_url($item['authore_thumb']['url']);?>" alt="" />
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
        <!-- End Testimonial Section Ten -->
      <?php

              }

      }
