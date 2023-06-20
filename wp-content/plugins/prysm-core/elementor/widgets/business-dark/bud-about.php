<?php

    class bud_dark_business extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_dark_business';
        }

        public function get_title() {
            return __( 'Business Dark About', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
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
            'missinevison',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
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
            'descgnation', [
                'label'       => esc_html__( 'Descgnation', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'authore_thumb', [
                'label'       => esc_html__( 'Authore Thumb', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'authore_sig', [
                'label'       => esc_html__( 'Authore Signature', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'info_title',
            [
                'label' => esc_html__( 'Title', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        
        $repeater->add_control(
            'info_text', [
                'label'       => esc_html__( 'Description', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'about_infos',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'about_style',
            [
                'label' => esc_html__( 'About Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'about_sbu_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'           => 'title_sub_color',
                'label'          => __( 'Background', 'prysm' ),
                'types'          => ['gradient'],
                'exclude'        => ['image'],
                'selector'       => '{{WRAPPER}} .sec-title .title-outer .title',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title .title-outer .title',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '600',
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
            'about_title_style',
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
                    '{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title h2',
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
            'mision_vision_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Mision Vision Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'vision_heading',
            [
                'label'     => esc_html__( 'Vision Heading Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .title-column .about-list li span' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-section .title-column .about-list li span',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
					],
				],
            ]
        );
        $this->add_control(
            'mv_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Mision Vision Text Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'mv_text_style',
            [
                'label'     => esc_html__( 'Text Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .title-column .about-list li' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-section .title-column .about-list li',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
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
            'authore_name_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Mision Vision Text Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'auth_name_clr',
            [
                'label'     => esc_html__( 'Name Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .title-column .author' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'auth_name__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-section .title-column .author',
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
            'authore_deg_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Designation Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'des_clr',
            [
                'label'     => esc_html__( 'Designation Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .title-column .author span' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'des__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-section .title-column .author span',
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
            'about_left_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'About Left Item Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_title',
            [
                'label'     => esc_html__( 'List Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .content-column h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'des_list_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-section .content-column h3',
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
        $this->add_control(
            'about_list_text_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'List Text Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_text',
            [
                'label'     => esc_html__( 'List Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-section .content-column .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_text__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-section .content-column .text',
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
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $sub_title           = $settings['sub_title'];
            $title               = $settings['title'];
            $missinevison        = $settings['missinevison'];
            $authore_name        = $settings['authore_name'];
            $descgnation         = $settings['descgnation'];
            $authore_thumb         = $settings['authore_thumb']['url'];
            $authore_sig         = $settings['authore_sig']['url'];

            $about_infos         = $settings['about_infos'];

        ?>
        <!-- About Section -->
		<section class="about-section">
			<div class="auto-container">
				<div class="row clearfix">
				
					<!-- Title Column -->
					<div class="title-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<!-- Sec Title -->
							<div class="sec-title">
								<div class="title-outer">
									<div class="title"><?php echo esc_html($sub_title);?></div>
								</div>
								<h2><?php echo esc_html($title);?></h2>
							</div>
							<!-- End Sec Title -->
							<ul class="about-list">
                                <?php foreach($missinevison as $item):?>
								<li><span><?php echo esc_html($item['title']);?></span> <?php echo __($item['description']);?></li>
                                <?php endforeach;?>
							</ul>
							<div class="author">
								<?php echo esc_html($authore_name);?>
								<span><?php echo esc_html($descgnation);?></span>
							</div>
							<div class="author-info">
								<div class="info-inner">
									<div class="author-image">
										<img src="<?php echo esc_url($authore_thumb);?>" alt="" />
									</div>
									<span class="signature"><img src="<?php echo esc_url($authore_sig);?>" alt="" /></span>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<?php foreach($about_infos as $info):?>
							<!-- Content -->
							<div class="content">
								<h3><?php echo esc_html($info['info_title']);?></h3>
								<div class="text"><?php echo esc_html($info['info_text']);?></div>
								<div class="separate"></div>
							</div>
							<?php endforeach;?>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- End About Section -->
      <?php

            }


      }
