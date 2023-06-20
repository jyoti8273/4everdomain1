<?php

    class bud_dark_newsletter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_dark_newsletter';
        }

        public function get_title() {
            return __( 'Business Dark Newsletter', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-mail';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'newsletter_content',
            [
                'label' => __( 'Newsletter Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'pattern2', [
                'label'       => esc_html__( 'Pattern1', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'pattern3', [
                'label'       => esc_html__( 'Pattern2', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );

        $this->add_control(
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        $this->add_control(
            'sb_title', [
                'label'       => esc_html__( 'Sub Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label'       => esc_html__( 'Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'form_id', [
                'label'       => esc_html__( 'Left Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'newsletter_img', [
                'label'       => esc_html__( 'Newsletter Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'newsletter_style',
            [
                'label' => esc_html__( 'Newsletter Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'newsl_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_title',
            [
                'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-section .form-column .title-box .title' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .newsletter-section .form-column .title-box .title',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
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
            'newsl_lg_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'box_bg_clr',
            [
                'label'     => esc_html__( 'Box BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-section .inner-container' => 'background: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'lg_title',
            [
                'label'     => esc_html__( 'List Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .newsletter-section .form-column .title-box h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'lg_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .newsletter-section .form-column .title-box h3',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
					],
					'font_size'   => [
						'default' => [
							'size' => '36',
						],
					],
				],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            
            $pattern2          = $settings['pattern2']['url'];
            $pattern3          = $settings['pattern3']['url'];

            $sb_title          = $settings['sb_title'];
            $title          = $settings['title'];
            $form_id          = $settings['form_id'];
            $newsletter_img          = $settings['newsletter_img']['url'];

        ?>
        <!-- Newsletter Section -->
		<section class="newsletter-section">
			<div class="auto-container">
				<div class="inner-container">
					<div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern2);?>)"></div>
					<div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern3);?>)"></div>
					<div class="row clearfix">
					
						<!-- Form Column -->
						<div class="form-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner-column">
								<div class="title-box">
									<div class="title"><?php echo esc_html($sb_title);?></div>
									<h3><?php echo esc_html($title);?></h3>
								</div>
								
								<!-- Newsletter Form -->
								<div class="newsletter-form">
									<form method="post" action="contact.html">
										<div class="form-group">
                                            <?php echo do_shortcode( $form_id );?>
										</div>
									</form>
								</div>
								
							</div>
						</div>
						
						<!-- Image Column -->
						<div class="image-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner-column">
								<div class="image">
									<img src="<?php echo esc_url($newsletter_img);?>" alt="" />
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- End Newsletter Section -->
      <?php

            }


      }
