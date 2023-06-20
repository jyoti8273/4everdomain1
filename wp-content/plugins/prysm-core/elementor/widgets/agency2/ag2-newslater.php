<?php

    class ag2_newsletter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_newsletter';
        }

        public function get_title() {
            return __( 'Agency Two Newslater', 'prysm' );
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
			'hr',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
            'description', [
                'label'       => esc_html__( 'Description', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'form_id', [
                'label'       => esc_html__( 'Shortcode', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
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
            'news_later_bg_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'newslater Section Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'nsl_background',
				'label' => esc_html__( 'Background', 'prysm' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .cta-section-four.style-two:before',
			]
		);
        $this->add_control(
            'newsl_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_title',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-section-four .title-column h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .cta-section-four .title-column h3',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
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
        $this->add_control(
            'newsl_lg_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Description Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'desc_bg_clr',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cta-section-four .title-column .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'lg_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .cta-section-four .title-column .text',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '400',
					]
				],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            
            $pattern2          = $settings['pattern2']['url'];

            $description          = $settings['description'];
            $title          = $settings['title'];
            $form_id          = $settings['form_id'];

        ?>
        <!-- CTA section Four -->
        <section class="cta-section-four style-two" style="background-image: url(<?php echo esc_url($pattern2);?>)">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Title Column -->
                    <div class="title-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h3><?php echo esc_html($title);?></h3>
                            <div class="text"><?php echo __($description);?></div>
                        </div>
                    </div>
                    
                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Subscribe Form -->
                            <div class="subscribe-form">
                                <div class="form-group">
                                    <?php echo do_shortcode( $form_id );?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End CTA section Four -->
      <?php

            }


      }
