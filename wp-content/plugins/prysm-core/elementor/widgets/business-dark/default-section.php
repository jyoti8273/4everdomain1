<?php

    class bud_default_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_default_section';
        }

        public function get_title() {
            return __( 'Dark Default', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'default_content',
            [
                'label' => __( 'Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'title', [
                'label'       => esc_html__( 'Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        
        $repeater->add_control(
            'description', [
                'label'       => esc_html__( 'Description', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'accordions',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->add_control(
            'form_id', [
                'label'       => esc_html__( 'Form Shortcode', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'faq_style',
            [
                'label' => esc_html__( 'FAQ Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'faq_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'faq_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .block .acc-btn' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'faq_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .accordion-box .block .acc-btn',
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
            'faq__info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Faq Info Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'about_info_color',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .block .content .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .accordion-box .block .content .text',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '15',
						],
					],
				],
            ]
        );

        $this->add_control(
            'form_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'List Item Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'form_title',
            [
                'label'     => esc_html__( 'Form Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .default-section .form-column .title-box h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'form_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .default-section .form-column .title-box h4',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
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
            'form_text_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Form Text Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'form_text',
            [
                'label'     => esc_html__( 'Form Text Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .default-section .form-column .title-box .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'form_text__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .default-section .form-column .title-box .text',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '15',
						],
					],
				],
            ]
        );
        $this->add_control(
            'button_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Button Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'button_color',
            [
                'label'     => esc_html__( 'Button Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-style-one .txt' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'           => 'btn_bg_color',
                'label'          => __( 'Background', 'prysm' ),
                'types'          => ['classic', 'gradient'],
                'exclude'        => ['image'],
                'selector'       => '{{WRAPPER}} .btn-style-one',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'           => 'btn_bg_hover_color',
                'label'          => __( 'Background', 'prysm' ),
                'types'          => ['classic', 'gradient'],
                'exclude'        => ['image'],
                'selector'       => '{{WRAPPER}} .btn-style-one:before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'btn_typ__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .btn-style-one',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Inter',
                    ],
                    'font_weight' => [
                        'default' => '700',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '15',
                        ],
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $sub_title           = $settings['sub_title'];
            $title               = $settings['title'];
            $accordions          = $settings['accordions'];
            $form_id             = $settings['form_id'];

        ?>
        <!-- Default Section -->
		<section class="default-section">
			<div class="auto-container">
				<div class="row clearfix">
				
					<!-- Accordian Column -->
					<div class="accordion-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							
							<ul class="accordion-box">
                                <?php $index = 0; foreach($accordions as $item): $index++;
                                    if(1 == $index):
                                ?>
								<!-- Block -->
								<li class="accordion block active-block">
									<div class="acc-btn active"><?php echo esc_html($item['title']);?> <div class="icon fa fa-angle-down"></div></div>
									<div class="acc-content current">
										<div class="content">
											<div class="text"><?php echo esc_html($item['description']);?></div>
										</div>
									</div>
								</li>
                                <?php else:?>
                                <li class="accordion block">
                                    <div class="acc-btn"><?php echo esc_html($item['title']);?> <div class="icon fa fa-angle-down"></div></div>
                                    <div class="acc-content">
                                        <div class="content">
                                            <div class="text"><?php echo esc_html($item['description']);?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endif; endforeach;?>
							</ul>
							
						</div>
					</div>
					
					<!-- Form Column -->
					<div class="form-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Title Box -->
							<div class="title-box text-center">
								<h4><?php echo esc_html($sub_title);?></h4>
								<div class="text"><?php echo __($title);?></div>
							</div>
							
							<!-- Default Form -->
							<div class="default-form">
								<?php echo do_shortcode( $form_id );?>
							</div>
							<!--End Default Form-->
							
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- End Default Section -->
      <?php

            }


      }
