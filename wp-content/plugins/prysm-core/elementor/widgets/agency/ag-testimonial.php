<?php

    class ag_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_testimonial';
        }

        public function get_title() {
            return __( 'Agency Testimonial', 'prysm' );
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
       
        $this->add_control(
            'authore_circle_img', [
                'label'       => esc_html__( 'Authore Circle Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater = new \Elementor\Repeater();
        
        
        $repeater->add_control(
            'authore_sm_img', [
                'label'       => esc_html__( 'Authore Small Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
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
        $repeater->add_control(
            'quote_img', [
                'label'       => esc_html__( 'Quote Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
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
                        '{{WRAPPER}} .pr-an-section-title span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title span',
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
                        '{{WRAPPER}} .pr-an-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title h2',
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
                        '{{WRAPPER}} .pr-an-section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title p',
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
            $authore_circle_img            = $settings['authore_circle_img'];

        ?>
        <section id="pr-an-testimonial" class="pr-an-testimonial-section position-relative">
            <div class="container">
                <div class="pr-an-section-title middle-align-title text-center headline pera-content wow fadeInUp" data-wow-delay="100ms" data-wow-duration="1500ms">
                    <span><?php echo esc_html($sub_title);?></span>
                    <h2><?php echo esc_html($title);?></h2>
                    <p><?php echo __($heading_info);?></p>
                </div>
                <div class="pr-an-testimonial-content">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <?php $i = 0; foreach($testimonials as $item): $i++;?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo esc_attr($i);?>" class="active" aria-current="true" aria-label="Slide 1"><img src="<?php echo esc_url($item['authore_sm_img']['url']);?>" alt=""></button>
                            <?php endforeach;?>    
                        </div>
                        <div class="pr-an-testimonial-inner-item position-relative">
                            <span class="pr-an-testimonial-shape position-absolute"><img src="<?php echo esc_url($authore_circle_img['url']);?>" alt=""></span>
                            <div class="carousel-inner">
                                <?php $i = 0; foreach($testimonials as $item): $i++;
                                    if($i == 1):
                                ?>
                                <div class="carousel-item active">
                                    <div class="pr-an-testimonial-content-area">
                                        <div class="pr-an-testimonial-img float-left">
                                            <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="">
                                        </div>
                                        <div class="pr-an-testimonial-text headline pera-content position-relative">
                                            <span class="pr-an-testimonial-quote position-absolute"><img src="<?php echo esc_url($item['quote_img']['url']);?>" alt=""></span>
                                            <div class="pr-an-testimonial-text-wrap">
                                                <p><?php echo __($item['feedback']);?></p>
                                            </div>
                                            <div class="pr-an-testimonial-author">
                                                <h3><?php echo esc_html($item['authore_name']);?></h3>
                                                <span><?php echo esc_html($item['position']);?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else:?>
                                    <div class="carousel-item">
                                        <div class="pr-an-testimonial-content-area">
                                            <div class="pr-an-testimonial-img float-left">
                                            <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="">
                                            </div>
                                            <div class="pr-an-testimonial-text headline pera-content position-relative">
                                                <span class="pr-an-testimonial-quote position-absolute"><img src="<?php echo esc_url($item['quote_img']['url']);?>" alt=""></span>
                                                <div class="pr-an-testimonial-text-wrap">
                                                    <p><?php echo __($item['feedback']);?></p>
                                                </div>
                                                <div class="pr-an-testimonial-author">
                                                    <h3><?php echo esc_html($item['authore_name']);?></h3>
                                                    <span><?php echo esc_html($item['position']);?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; endforeach;?>
                            </div>
                            <div class="pr-an-testimonial-carousel">
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <i class="far fa-long-arrow-left"></i>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <i class="far fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>	

      <?php

              }

      }
