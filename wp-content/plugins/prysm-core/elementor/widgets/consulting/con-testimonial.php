<?php

    class con_testimonial_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_testimonial_item';
        }

        public function get_title() {
            return __( 'Consulting Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
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

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'feedback', [
                'label'       => esc_html__( 'Feedback', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name', [
                'label'       => esc_html__( 'Name', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'position',
            [
                'label' => esc_html__( 'Position', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'testimonials',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'service_style',
            [
                'label' => esc_html__( 'Service Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_style',
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
                    '{{WRAPPER}} .right-choice-section .section-wrapper .content h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .content h4',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '400',
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
            'service_info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Info Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .content p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .content p',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
            ]
        );
        $this->add_control(
            'service_btn',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Btn Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Button Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label'     => esc_html__( 'Button Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'btn__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view',
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

            $settings             = $this->get_settings_for_display();
            $testimonials         = $settings['testimonials'];

        ?>
       <section class="testimonial-section section-padding">
            <div class="container text-center">
                <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php $index = 0; foreach($testimonials as $item): $index++;
                            if(1 == $index):
                        ?>
                        <div class="item carousel-item active">
                            <div class="carousel-wrapper">
                                <p><?php echo __($item['feedback']);?></p>

                                <div class="reviewer">
                                    <h5><?php echo esc_html($item['name']);?></h5>
                                    <span class="position"><?php echo esc_html($item['position']);?></span>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <div class="item carousel-item">
                                <div class="carousel-wrapper">
                                    <p><?php echo __($item['feedback']);?></p>

                                    <div class="reviewer">
                                        <h5><?php echo esc_html($item['name']);?></h5>
                                        <span class="position"><?php echo esc_html($item['position']);?></span>
                                    </div>
                                </div>
                            </div>
                         <?php endif; endforeach;?>   
                    </div>

                    <a class="left carousel-control" href="#testimonial-carousel" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>

                    <a class="right carousel-control" href="#testimonial-carousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </section> <!-- testimonial-section -->
      <?php

        }


      }
