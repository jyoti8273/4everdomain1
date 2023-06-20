<?php

    class law_service_tab extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_service_tab';
        }

        public function get_title() {
            return __( 'Law Service Tab', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-lock-user';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'service_content',
            [
                'label' => __( 'Service Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
            'readmore_label', [
                'label'       => esc_html__( 'Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'link', [
                'label'       => esc_html__( 'Button Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
			'active',
			[
				'label' => esc_html__( 'Active Tab', 'prysm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'YES', 'prysm' ),
				'label_off' => esc_html__( 'NO', 'prysm' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
        $repeater->add_control(
            'service_img', [
                'label'       => esc_html__( 'Service Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tabicon', [
                'label'       => esc_html__( 'Tab Icon Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'title', [
                'label'       => esc_html__( 'Service Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'content', [
                'label'       => esc_html__( 'Service Excerpt', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'link', [
                'label'       => esc_html__( 'Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabsitems',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'service_src_style',
            [
                'label' => esc_html__( 'Service Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'serv_sec_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'sec_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title-eight h2' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title-eight h2',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
					],
					'font_size'   => [
						'default' => [
							'size' => '42',
						],
					],
				],
            ]
        );
        $this->add_control(
            'serv_tb_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Tab Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'tab_title_color',
            [
                'label'     => esc_html__( 'Ttitle Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tab-btns .tab-btn' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'serv_title_hover_color',
            [
                'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tab-btns .tab-btn:hover, .services-tabs .tab-btns .tab-btn.active-btn' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'team_name_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .services-tabs .tab-btns .tab-btn',
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
            'serv_title_bg',
            [
                'label'     => esc_html__( 'Service Title BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tab-btns .tab-btn' => 'background-color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'serv_title_hover_bg',
            [
                'label'     => esc_html__( 'Service Title Hover BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tab-btns .tab-btn:hover, .services-tabs .tab-btns .tab-btn.active-btn' => 'background-color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'srv_icon_bg_color',
            [
                'label'     => esc_html__( 'Service Icon BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tab-btns .tab-btn .icon' => 'background-color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'srv_main_box_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Box Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'srv-box_color_title',
            [
                'label'     => esc_html__( 'Service Box Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tabs-content .image h3 a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'srv_box__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .services-tabs .tabs-content .image h3',
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
            'srv_main_box_txt_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Box TExt Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'srv-box_text_color_title',
            [
                'label'     => esc_html__( 'Service Box Text Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tabs-content .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'srv_box_txt_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .services-tabs .tabs-content .text',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Lato',
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
            'section_bg_overly',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Overlay BG Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'serv_icon_bo_bg',
            [
                'label'     => esc_html__( 'Box Link Icon BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tabs-content .plus' => 'background:{{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'overlay_bg_color',
            [
                'label'     => esc_html__( 'Team Overlay BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-tabs .tabs-content .image .overlay-box' => 'background:{{VALUE}}',
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
                'selector'       => '{{WRAPPER}} .btn-style-twentyone .txt',
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
                    '{{WRAPPER}} .btn-style-twentyone .txt' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .btn-style-twentyone',
            ]
        );
        $this->add_responsive_control(
            'btn_border_radious',
            [
                'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentyone' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .btn-style-twentyone' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .btn-style-twentyone .txt:hover' => 'color: {{VALUE}}',
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
                'selector' => '{{WRAPPER}} .btn-style-twentyone:before',
            ]
        );
        $this->add_responsive_control(
            'btn_hover_border_radious',
            [
                'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentyone .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'btn_hover_border',
                'label' => __( 'Border', 'prysm-extension' ),
                'selector' => '{{WRAPPER}} .btn-style-twentyone .txt:hover',
            ]
        );
        $this->add_responsive_control(
            'btn_hover_padding',
            [
                'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors'  => [
                    '{{WRAPPER}} .btn-style-twentyone:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $title               = $settings['title'];
            $readmore_label      = $settings['readmore_label'];
            $link         = $settings['link'];

            $tabsitems         = $settings['tabsitems'];
        ?>
        <!-- Services Section Thirteen -->
			<section class="services-section-thirteen">
				<div class="auto-container">
					<!-- Sec Title -->
					<div class="sec-title-eight">
						<div class="clearfix">
							<div class="pull-left">
								<h2><?php echo __($title);?></h2>
							</div>
							<div class="pull-right">
								<div class="btns-box">
									<a href="<?php echo esc_url($link['url']);?>" class="theme-btn btn-style-twentyone"><span class="txt"><?php echo esc_html($readmore_label);?> <i class="flaticon-right-arrow"></i></span></a>
								</div>
							</div>
						</div>
					</div>
					<!-- End Sec Title -->
					
					<!-- Services Info Tabs -->
					<div class="services-info-tabs">
						<!-- Services Tabs -->
						<div class="services-tabs tabs-box">
							
							<!-- Tab Btns -->
							<ul class="tab-btns tab-buttons clearfix">

                                <?php $index = 0; foreach($tabsitems as $item): $index++;?>
								<li data-tab="#prod-<?php echo esc_attr($index);?>" class="tab-btn <?php if('yes' == $item['active']){echo esc_attr('active-btn');}?>"><span class="icon"><img src="<?php echo esc_url($item['tabicon']['url']);?>" alt="" /></span> <?php echo esc_html($item['title']);?></li>
                                <?php endforeach;?>

							</ul>
							
							<!-- Tabs Container -->
							<div class="tabs-content">
                            <?php $index = 0; foreach($tabsitems as $item): $index++;?>
								<!-- Tab / Active Tab -->
								<div class="tab <?php if("yes" == $item['active']){echo esc_attr('active-tab');}?> " id="prod-<?php echo esc_attr($index);?>">
									<div class="content">
										<div class="image">
											<img src="<?php echo esc_url($item['service_img']['url']);?>" alt="" />
											<div class="overlay-box">
												<h3><a href="<?php echo esc_html($item['link']['url']);?>"><?php echo esc_html($item['title']);?></a></h3>
												<div class="text"><?php echo esc_html($item['content']);?></div>
												<a href="<?php echo esc_html($item['link']['url']);?>" class="plus fa fa-plus"></a>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- End Services Section Thirteen -->
      <?php

            }

        protected function select_param_posts() {
            $args = wp_parse_args( [
                'post_type'   => 'team',
                'numberposts' => -1,
                'orderby'     => 'title',
                'order'       => 'ASC',
            ] );
        
            $query_query = get_posts( $args );
        
            $posts = [];
            if ( $query_query ) {
                foreach ( $query_query as $query ) {
                    $posts[$query->ID] = $query->post_title;
                }
            }
        
            return $posts;
        }


      }
