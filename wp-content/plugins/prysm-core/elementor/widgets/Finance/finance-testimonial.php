<?php

    class finance_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_testimonial';
        }

        public function get_title() {
            return __( 'Finance Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-testimonial';
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
			'testimonial_image',
			[
				'label' => __( 'Authore Image', 'prysm' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
				'default' => 4,
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
            'testimonial_boxes',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'authore_right_info',
            [
                'label' => __( 'Authore Right Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'sub_heading', [
                'label'       => esc_html__( 'Sub Heading', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'heading', [
                'label'       => esc_html__( 'Heading', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'short_info', [
                'label'       => esc_html__( 'Short Info', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'quote_info', [
                'label'       => esc_html__( 'Quote Info', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'authore_name', [
                'label'       => esc_html__( 'Authore Name', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'authore_bio', [
                'label'       => esc_html__( 'Authore Position', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'authore_img', [
                'label'       => esc_html__( 'Authore Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_style_info',
            [
                'label' => esc_html__( 'Testimonial Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'testimonial_box_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Box Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'test_box_shadow',
                'label' => __( 'Box Shadow', 'prysm' ),
                'selector' => '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item-wrapper',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'prysm' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item',
            ]
        );
        $this->add_control(
            'border-round',
            [
                'label' => __( 'Border Radius', 'prysm' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'padding',
            [
                'label' => __( 'Padding', 'prysm' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        
        $this->add_control(
            'test_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title__color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-title .pr6-headline h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-testimonial-title .pr6-headline h4',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            '__position_content_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Position', 'prysm' ),
                'separator' => 'before',
            ]
        );
        
        
        $this->add_control(
            'tx_text_color',
            [
                'label'     => esc_html__( 'Content Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item .pr6-testimonial-top .pr6-testimonial-title .pr6-designation span' => 'color: {{VALUE}} ',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'position_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item .pr6-testimonial-top .pr6-testimonial-title .pr6-designation span',
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
            'feedback_colr',
            [
                'label'     => esc_html__( 'Feedback Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-single-item .pr6-pera-txt p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'feedback__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-single-item .pr6-pera-txt p',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            '__ratting_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Rating Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        
        
        $this->add_control(
            'rating_colr',
            [
                'label'     => esc_html__( 'Rating Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item .pr6-rating' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'rating_bg_colr',
            [
                'label'     => esc_html__( 'Rating BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item .pr6-rating' => 'background: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'rating__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-testimonial-slider .pr6-single-item .pr6-rating',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );        
        $this->end_controls_section();

        $this->start_controls_section(
            'testimonial_right_info',
            [
                'label' => esc_html__( 'Testimonial Right Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            '__sub_title_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'sub_title_colr',
            [
                'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'sub_title_bg_colr',
            [
                'label'     => esc_html__( 'Sub Title BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'background: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-subtitle',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );    
        $this->add_control(
            '___title_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_colr',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-right .pr6-headline h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
     
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-testimonial-right .pr6-headline h4',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );    
        $this->add_control(
            '___scection_content_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Content Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'content_colr',
            [
                'label'     => esc_html__( 'Content Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-pera-txt p' => 'color: {{VALUE}} ',
                ],
            ]
        );
     
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'content__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-pera-txt p',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );    
        $this->add_control(
            '___authore_quote_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Authore Quote', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'quote_colr',
            [
                'label'     => esc_html__( 'Quote Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-quote p' => 'color: {{VALUE}} ',
                ],
            ]
        );
     
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'quote__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-quote p',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );    
        $this->add_control(
            '___authore_name_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Authore Name', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'a_name_colr',
            [
                'label'     => esc_html__( 'Authore Name Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-clients-title .pr6-headline h5' => 'color: {{VALUE}} ',
                ],
            ]
        );
     
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'a_name__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-clients-title .pr6-headline h5',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );  
        $this->add_control(
            '___authore_position_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Authore Position', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'a_position_colr',
            [
                'label'     => esc_html__( 'Authore Position Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-testimonial-right .pr6-featured-clients .pr6-designation span' => 'color: {{VALUE}} ',
                ],
            ]
        );
     
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'a_position__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-testimonial-right .pr6-featured-clients .pr6-designation span',
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
            $testimonial_boxes        = $settings['testimonial_boxes'];
            $authore_bio        = $settings['authore_bio'];
            $sub_heading        = $settings['sub_heading'];
            $heading        = $settings['heading'];
            $short_info        = $settings['short_info'];
            $authore_img        = $settings['authore_img']['url'];
            $quote_info        = $settings['quote_info'];
            $authore_name        = $settings['authore_name'];

        ?>
        <!-- Testimonial Section -->
		<section class="pr6-testimonial-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 order-lg-1 order-12">
						<div class="pr6-testimonial-slider">
                            <?php foreach($testimonial_boxes as $box):?>
							<div class="pr6-single-item-wrapper">
								<div class="pr6-single-item">
									<span class="pr6-rating"><?php echo esc_attr($box['rating']);?><i class="fas fa-star"></i></span>
									<div class="pr6-testimonial-top">
										<div class="pr6-client-thumb">
											<img src="<?php echo esc_url($box['testimonial_image']['url']);?>" alt="">
										</div>
										<div class="pr6-testimonial-title">
											<div class="pr6-headline">
												<h4><?php echo esc_html($box['name']);?></h4>
											</div>
											<div class="pr6-designation">
												<span><?php echo esc_html($box['designation']);?></span>
											</div>
										</div>
									</div>
									<div class="pr6-pera-txt">
										<p><q><?php echo __($box['feedback']);?></q></p>
									</div>
								</div>
							</div>
							<?php endforeach;?>
						</div>
					</div>
					<div class="col-lg-6 order-lg-12 order-1">
						<div class="pr6-testimonial-right">
							<div class="pr6-title-area wow fadeInUp">
								<span class="pr6-subtitle"><?php echo esc_html($sub_heading);?></span>
								<div class="pr6-headline">
									<h4><?php echo esc_html($heading);?></h4>
								</div>
								<div class="pr6-pera-txt">
									<p><?php echo __($short_info);?></p>
								</div>
								<div class="text-center pr6-quote">
									<p><q><?php echo __($quote_info);?></q></p>
								</div>
								<div class="pr6-featured-clients">
									<div class="pr6-clients-thumb">
										<img src="<?php echo esc_url($authore_img);?>" alt="">
									</div>
									<div class="pr6-clients-title">
										<div class="pr6-headline">
											<h5><?php echo esc_html($authore_name);?></h5>
										</div>
										<div class="pr6-designation">
											<span><?php echo esc_html($authore_bio);?></span>
										</div>
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
