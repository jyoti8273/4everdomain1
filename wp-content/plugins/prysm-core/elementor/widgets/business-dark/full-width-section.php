<?php

    class bud_dark_fullwidth_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_dark_fullwidth_section';
        }

        public function get_title() {
            return __( 'Business Dark Fullwidth Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-slider-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'left_sb_title', [
                'label'       => esc_html__( 'Sub Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'left_title', [
                'label'       => esc_html__( 'Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'left_btn', [
                'label'       => esc_html__( 'Left Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'left_btn_link', [
                'label'       => esc_html__( 'Button Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'left_section_bg', [
                'label'       => esc_html__( 'Section Bg Left', 'prysm' ),
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
            'right_sb_title', [
                'label'       => esc_html__( 'Sub Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_title', [
                'label'       => esc_html__( 'Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_btn', [
                'label'       => esc_html__( 'Left Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_btn_link', [
                'label'       => esc_html__( 'Button Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_section_bg', [
                'label'       => esc_html__( 'Section Bg Left', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_shape', [
                'label'       => esc_html__( 'Section Bg Left', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'right_shape2', [
                'label'       => esc_html__( 'Section Bg Left', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'flw_lft_section_style',
            [
                'label' => esc_html__( 'Left Section Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'sb_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullwidth-section .left-column .title' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .fullwidth-section .left-column .title',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '400',
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
            'title_style_info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Left Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'lft_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullwidth-section .left-column h2' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'lft_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .fullwidth-section .left-column h2',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
					],
					'font_size'   => [
						'default' => [
							'size' => '60',
						],
					],
				],
            ]
        );
        $this->add_control(
            'right_section_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Right Sub title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'ri_sub_title',
            [
                'label'     => esc_html__( 'Right Sub Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullwidth-section .right-column .title' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'ri_sub_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .fullwidth-section .right-column .title',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '400',
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
            'right_section_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Right title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'ri_title',
            [
                'label'     => esc_html__( 'Right Sub Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fullwidth-section .right-column h2' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'ri_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .fullwidth-section .right-column h2',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
					],
					'font_size'   => [
						'default' => [
							'size' => '60',
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
            $left_sb_title        = $settings['left_sb_title'];
            $left_title           = $settings['left_title'];
            $left_btn             = $settings['left_btn'];
            $left_btn_link        = $settings['left_btn_link'];
            $left_section_bg      = $settings['left_section_bg'];

            $right_sb_title       = $settings['right_sb_title'];
            $right_title          = $settings['right_title'];
            $right_btn            = $settings['right_btn'];
            $right_btn_link       = $settings['right_btn_link'];
            $right_section_bg     = $settings['right_section_bg'];
            $right_shape          = $settings['right_shape'];
            $right_shape2         = $settings['right_shape2'];

        ?>
        <!-- Full Width Section -->
		<section class="fullwidth-section">
			<div class="outer-container">
				<div class="clearfix">
					<!-- Left Column -->
					<div class="left-column" style="background-image: url(<?php echo esc_url($left_section_bg['url']);?>)">
						<div class="inner-column clearfix">
							<div class="content">
								<div class="title"><?php echo esc_html($left_sb_title);?></div>
								<h2><?php echo __($left_title);?></h2>
								<div class="button-box">
									<a href="<?php echo esc_url($left_btn_link['url']);?>" class="theme-btn btn-style-one"><span class="txt"><?php echo esc_html($left_btn);?></span></a>
								</div>
							</div>
						</div>
					</div>
					<!-- Right Column -->
					<div class="right-column" style="background-image: url(<?php echo esc_url($right_section_bg['url']);?>)">
						<div class="circle-one" style="background-image: url(<?php echo esc_url($right_shape['url']);?>)"></div>
						<div class="circle-two" style="background-image: url(<?php echo esc_url($right_shape2['url']);?>)"></div>
						<div class="inner-column clearfix">
							<div class="content">
								<div class="title"><?php echo esc_html($right_sb_title);?></div>
								<h2><?php echo __($right_title);?></h2>
								<div class="button-box">
									<a href="<?php echo esc_url($right_btn_link['url']);?>" class="theme-btn btn-style-one"><span class="txt"><?php echo esc_html($right_btn);?></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Full Width Section -->
      <?php

            }


      }
