<?php

    class law_cta extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_cta';
        }

        public function get_title() {
            return __( 'Law CTA', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-mail';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'cta_content',
            [
                'label' => __( 'CTA Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'pattern1', [
                'label'       => esc_html__( 'Pattern1', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'pattern2', [
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
            'cta_img', [
                'label'       => esc_html__( 'CTA Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'buttonLabel', [
                'label'       => esc_html__( 'Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'buttonlink', [
                'label'       => esc_html__( 'Button Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
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
                    '{{WRAPPER}} .cta-section-seven .title-column h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .cta-section-seven .title-column h3',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
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
                    '{{WRAPPER}} .cta-section-seven .title-column .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'lg_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .cta-section-seven .title-column .text',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Lato',
                    ],
					'font_weight' => [
						'default' => '400',
					]
				],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button__content',
            [
                'label' => __( 'Button Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'btn_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .btn-style-twentytwo .txt',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->start_controls_tabs( '_banner_button_1' );
        $this->start_controls_tab(
            '_prysm_btn__banner_normal',
            [
                'label' => esc_html__( 'Normal', 'prysm-extension' ),
            ]
        );
        $this->add_control(
            'btn__color',
            [
                'label'     => esc_html__( 'Color', 'prysm-extension' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-style-twentytwo .txt' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_bg_color',
                'label'    => __( 'Background', 'prysm-extension' ),
                'types'    => ['classic', 'gradient'],
                'exclude'  => ['image'],
                'selector' => '{{WRAPPER}} .btn-style-twentytwo',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radious',
            [
                'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentytwo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'btn_padding',
            [
                'label'      => esc_html__( 'Padding', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentytwo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab(
            '_prysm_btn_hover',
            [
                'label' => esc_html__( 'Hover', 'prysm-extension' ),
            ]
        );
        $this->add_control(
            'btn__hover_color',
            [
                'label'     => esc_html__( 'Color', 'prysm-extension' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-style-twentytwo .txt:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'btn_hover_bg_color',
                'label'    => __( 'Background', 'prysm-extension' ),
                'types'    => ['classic', 'gradient'],
                'exclude'  => ['image'],
                'selector' => '{{WRAPPER}} .btn-style-twentytwo:before',
            ]
        );
        $this->add_responsive_control(
            'btn_hover_border_radious',
            [
                'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentytwo .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_hover_border',
                'label' => __( 'Border', 'prysm-extension' ),
                'selector' => '{{WRAPPER}} .btn-style-twentytwo .txt:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_hover_padding',
            [
                'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentytwo:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            
            $pattern1          = $settings['pattern1']['url'];
            $pattern2          = $settings['pattern2']['url'];

            $description       = $settings['description'];
            $title             = $settings['title'];
            $cta_img           = $settings['cta_img']['url'];
            $buttonLabel       = $settings['buttonLabel'];
            $buttonlink        = $settings['buttonlink'];

        ?>
        <!-- CTA Section Seven -->
        <section class="cta-section-seven" style="background-image: url(<?php echo esc_url($pattern1);?>)">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern2);?>)"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    <!-- Title Column -->
                    <div class="title-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h3><?php echo __($title);?></h3>
                            <div class="text"><?php echo esc_html($description);?></div>
                            <!-- Button Box -->
                            <div class="button-box">
                                <a href="<?php echo esc_html($buttonlink['url']);?>" class="theme-btn btn-style-twentytwo"><span class="txt"><?php echo esc_html($buttonLabel);?> <i class="flaticon-right-arrow"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <img src="<?php echo esc_url($cta_img);?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End CTA Section Seven -->
      <?php

            }


      }
