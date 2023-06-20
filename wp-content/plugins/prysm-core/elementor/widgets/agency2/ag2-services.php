<?php

    class ag2_service_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_service_section';
        }

        public function get_title() {
            return __( 'Agency Two Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-service-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'service_content',
                [
                    'label' => __( 'Service Section Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'service_bg_img', [
                    'label'       => esc_html__( 'Service Background', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'colortitle', [
                    'label'       => esc_html__( 'Main Color Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'service_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'Icon Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'service_escerpt', [
                    'label'       => esc_html__( 'Service Excerpt', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );    
            
            $repeater->add_control(
                'box_item_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Indivisual Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude' => ['image'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .inner-box:before',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Block Hover BG Color', 'prysm' ),
                        ],
                    ]
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'box_icon_bg',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude' => ['image'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .inner-box .icon-outer:before',
                    'fields_options' => [
                        'background' => [
                            'label' => esc_html__( 'Icon BG Color', 'prysm' ),
                        ],
                    ]
                ]
            );     
            $this->add_control(
                'services_items',
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
                    'name'           => 'service_sub_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine .title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'service_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'srv_color_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Color Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'clr_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2 span',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'srv_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2 span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'service_m_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Main Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_main_ttl_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-twelve .inner-box h4',
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
                'serv_m_title_color',
                [
                    'label' => esc_html__( 'Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-twelve .inner-box h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'service_text_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'service Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_tx_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-twelve .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'serv_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-twelve .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'service_section_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Section BG Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'service_section_bg',
                [
                    'label' => esc_html__( 'Section BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-section-fifteen' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $sub_title     = $settings['sub_title'];
            $maintitle       = $settings['maintitle'];
            $colortitle       = $settings['colortitle'];

            $service_bg_img   = $settings['service_bg_img'];

            $services_items        = $settings['services_items'];

        ?>
            <!-- Services Section Fifteen -->
			<section class="services-section-fifteen" style="background-image: url(<?php echo esc_url($service_bg_img['url']);?>)">
				<div class="auto-container">
					<div class="sec-title-nine centered">
                        <div class="title"><?php echo esc_html($sub_title);?></div>
						<h2><?php echo __($maintitle);?> <span><?php echo esc_html($colortitle);?></span></h2>
					</div>
					<div class="row clearfix">
						
                       <?php $shape = 0; foreach($services_items as $index => $box): $shape++;?>
                       <?php  if( $box['service_id'] ) : ?>
						<!-- Service Block Twelve -->
						<div class="service-block-twelve col-lg-4 col-md-6 col-sm-12 elementor-repeater-item-<?php echo esc_attr($box['_id']);?>">
							<div class="inner-box">
								<div class="icon-outer">
									<span class="icon"><img src="<?php echo esc_url($box['icon']['url']);?>" alt="" /></span>
								</div>
								<h4><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h4>
								<div class="text"><?php echo $box['service_escerpt'];?></div>
							</div>
						</div>
						<?php endif; endforeach;?>
					</div>
				</div>
			</section>
			<!-- End Services Section Fifteen -->
      <?php

              }

              protected function select_param_posts() {
                $args = wp_parse_args( [
                    'post_type'   => 'services',
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
