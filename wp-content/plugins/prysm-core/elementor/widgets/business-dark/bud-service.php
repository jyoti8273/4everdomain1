<?php

    class bud_dark_service extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_dark_service';
        }

        public function get_title() {
            return __( 'Business Dark service', 'prysm' );
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
        $this->add_control(
            'description', [
                'label'       => esc_html__( 'Description', 'prysm' ),
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
            'btn_link', [
                'label'       => esc_html__( 'Button Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
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
            'icons', [
                'label'       => esc_html__( 'Choose Service Icon', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::ICONS,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'btn_text', [
                'label'       => esc_html__( 'Readmore Link Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
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
            'about_info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'About Info Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'about_info_color',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .sec-title .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title .text',
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
            'service_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'serv_title',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-block .inner-box h5 a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block .inner-box h5',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '700',
					],
					'font_size'   => [
						'default' => [
							'size' => '22',
						],
					],
				],
            ]
        );
        $this->add_control(
            'service_info_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'serv_info',
            [
                'label'     => esc_html__( 'Info Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-block .inner-box .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_info_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block .inner-box .text',
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
            'service_btn_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Btn Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'serv_btn_info',
            [
                'label'     => esc_html__( 'Btn Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-block .inner-box .read-more' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'serv_btn_hover_info',
            [
                'label'     => esc_html__( 'Btn Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .service-block .inner-box:hover .read-more, .service-block .inner-box:hover .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'btn_info_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block .inner-box .read-more',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '600',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
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
            $description         = $settings['description'];
            $readmore_label      = $settings['readmore_label'];
            $btn_link            = $settings['btn_link']['url'];

            $services_items         = $settings['services_items'];

        ?>
        <!-- Services Section -->
		<section class="services-section">
			<div class="auto-container">
				<div class="inner-container">
					<!-- Sec Title -->
					<div class="sec-title centered">
						<div class="title-outer">
							<div class="title"><?php echo esc_html($sub_title);?></div>
						</div>
						<h2><?php echo __($title);?></h2>
						<div class="text"><?php echo __($description);?></div>
					</div>
					<div class="row clearfix">
                        <?php foreach($services_items as $box):?>
                        <?php  if( $box['service_id'] ) :

                            if(get_post_meta($box['service_id'], 'prysm_servicepost', true)) {
                            $serv_meta = get_post_meta($box['service_id'], 'prysm_servicepost', true);
                            } else {
                                $serv_meta = array();
                            }

                            if( array_key_exists( 'service_text', $serv_meta )) {
                                $service_text = $serv_meta['service_text'];
                            } else {
                                $service_text = '';
                            }     
                        ?>
						<!-- Service Block -->
						<div class="service-block col-lg-3 col-md-6 col-sm-12">
							<div class="inner-box">
								<div class="image-layer" style="background-image: url(<?php echo get_the_post_thumbnail_url($box['service_id'], 'full')?>)"></div>
								<div class="icon">
                                <?php \Elementor\Icons_Manager::render_icon( $box['icons'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
								<h5><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h5>
								<div class="text"><?php echo $service_text;?></div>
								<a href="<?php echo get_the_permalink($box['service_id']);?>" class="read-more"><?php echo esc_html($box['btn_text']);?></a>
							</div>
						</div>
						<?php endif; endforeach;?>
						
					</div>
					<?php if($btn_link):?>
					<div class="button-box text-center">
						<a href="<?php echo esc_url($btn_link);?>" class="theme-btn btn-style-one"><span class="txt"><?php echo esc_html($readmore_label);?> <i class="fa fa-refresh"></i></span></a>
					</div>
					<?php endif;?>
				</div>
			</div>
		</section>
		<!-- End Services Section -->
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
