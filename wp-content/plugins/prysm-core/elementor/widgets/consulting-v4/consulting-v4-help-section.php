<?php

    class constv4_help_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_help_section';
        }

        public function get_title() {
            return __( 'Consulting V4 Help', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'help_content',
                [
                    'label' => __( 'Help Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'help_bg_img',
                [
                    'label' => __( 'help Image 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'help_shape',
                [
                    'label' => __( 'Help Shape Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );   
            $repeater->add_control(
                'help_img',
                [
                    'label' => __( 'Help Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );   
                
            $repeater->add_control(
                'help_title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );              
            $repeater->add_control(
                'help_btn',
                [
                    'label' => __( 'Help Button', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'help_link',
                [
                    'label' => __( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'helpsitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ help_title }}}',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'help_style',
                [
                    'label' => esc_html__( 'help Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'subtitle_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Subtitle Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_sub_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven .title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'about_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'help_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Help Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'help_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .help-block .inner-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'help_title_color',
                [
                    'label' => esc_html__( 'Help Box Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-block .inner-box h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'help_title_hover_color',
                [
                    'label' => esc_html__( 'Help Box Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-block .inner-box h4 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'about Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-fourteen',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'about_btn_clr',
                [
                    'label' => esc_html__( 'about Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fourteen' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_btn_hover_clr',
                [
                    'label' => esc_html__( 'about Button Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fourteen:before' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'box_bg_color',
                [
                    'label' => esc_html__( 'Box Styling BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .help-block .inner-box .image:before' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $help_bg_img   = $settings['help_bg_img'];
            
            $subtitle      = $settings['subtitle'];
            $title         = $settings['title'];

            $helpsitems      = $settings['helpsitems'];
            

        ?>
        <!-- Help Section -->
			<section class="help-section">
				<div class="pattern-layer" style="background-image: url(<?php echo esc_url($help_bg_img['url']);?>)"></div>
				<div class="auto-container">
					<!-- Sec Title Seven -->
					<div class="sec-title-seven light centered">
						<div class="title"><?php echo esc_html($subtitle);?></div>
						<h2><?php echo __($title);?></h2>
					</div>
					
					<div class="row clearfix">

						<?php foreach($helpsitems as $item):?>
						<!-- Help Block -->
						<div class="help-block col-lg-6 col-md-12 col-sm-12">
							<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="icon-layer" style="background-image: url(<?php echo esc_url($item['help_shape']['url']);?>)"></div>
								<div class="content">
									<div class="image">
										<a href="<?php echo esc_url($item['help_link']['url']);?>"><img src="<?php echo esc_url($item['help_img']['url']);?>" alt="" /></a>
									</div>
									<h4><a href="<?php echo esc_url($item['help_link']['url']);?>"><?php echo esc_html($item['help_title']);?></a></h4>
									<div class="btns-box">
										<a href="<?php echo esc_url($item['help_link']['url']);?>" class="theme-btn btn-style-fourteen"><span class="txt"><?php echo esc_html($item['help_btn']);?></span></a>
									</div>
								</div>
							</div>
						</div>
						<?php endforeach;?>
						
					</div>
					
				</div>
			</section>
			<!-- End Help Section -->
      <?php

              }

      }
