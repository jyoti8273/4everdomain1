<?php

    class sw_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_testimonial';
        }

        public function get_title() {
            return __( 'Software Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-testimonial-carousel';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {
        $this->start_controls_section(
            'heading__content',
            [
                'label' => __( 'Heading Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'sub_title', [
                'label'       => esc_html__( 'Sub Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'title', [
                'label'       => esc_html__( 'Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );            
        $this->add_control(
            'heading_info', [
                'label'       => esc_html__( 'Heading Info', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'testimonial_content',
            [
                'label' => __( 'Testimonial Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
       
        $repeater = new \Elementor\Repeater();
        
        
        $repeater->add_control(
            'authore_img', [
                'label'       => esc_html__( 'Authore Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'authore_name', [
                'label'       => esc_html__( 'Authore Name', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'position', [
                'label'       => esc_html__( 'Position', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $repeater->add_control(
			'rating',
			[
				'label' => __( 'Rating', 'prysm' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 5,
				'step' => 1,
				'default' => 5,
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
            'testimonials',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ authore_name }}}',
            ]
        );
       
        $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_style_info',
                [
                    'label' => esc_html__( 'testimonial Style Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'testimonial_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'test_name__color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-testimonial-single .pr3-headline h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'test_name_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-testimonial-single .pr3-headline h6',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__position_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Position Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'position_color',
                [
                    'label'     => esc_html__( 'Position Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-testimonial-single .pr3-tst-top span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'position_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-testimonial-single .pr3-tst-top span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__feedback_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feedback Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'feedback_color',
                [
                    'label'     => esc_html__( 'Feedback Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-testimonial-single .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feedback_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-testimonial-single .pr3-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
                     
            $this->end_controls_section();
            $this->start_controls_section(
                'section_heading_style',
                [
                    'label' => esc_html__( 'Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'h_stylish_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Stylish itle Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                's_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-title-area span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'h_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-title-area h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            

            $this->add_control(
                '_info_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-title-area .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area .pr3-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $testimonials             = $settings['testimonials'];
            $sub_title        = $settings['sub_title'];
            $title            = $settings['title'];
            $heading_info            = $settings['heading_info'];

        ?>
        <!-- Testimonial Section -->
        <section class="pr3-testimonial-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="pr3-tst-slider-wrapper">
                            <?php foreach($testimonials as $item):?>
                            <div class="pr3-testimonial-single">
                                <div class="pr3-tst-top">
                                    <div class="img-container">
                                        <div class="img-thumb">
                                            <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="">
                                        </div>
                                    </div>
                                    <div class="pr3-test-clients-info">
                                        <div class="pr3-headline">
                                            <h6><?php echo esc_html($item['authore_name']);?></h6>
                                            <span><?php echo esc_html($item['position']);?></span>
                                            <div class="star-rating">
                                                <?php for($i = 0; $i < $item['rating']; $i++):?>
                                                <i class="fas fa-star"></i>
                                                <?php endfor;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="pr3-pera-txt">
                                    <p><?php echo __($item['feedback']);?></p>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="pr3-testimonial-content">
                            <div class="pr3-title-area wow fadeInUp">
                                <div class="pr3-headline">
                                    <span><?php echo esc_html($sub_title);?></span>
                                    <div class="pr3-headline">
                                        <h3><?php echo __($title);?></h3>
                                    </div>
                                    <div class="pr3-pera-txt">
                                        <p><?php echo __($heading_info);?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

      <?php

              }

      }
