<?php

    class bud_dark_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_dark_team';
        }

        public function get_title() {
            return __( 'Business Dark Team', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-lock-user';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'team_content',
            [
                'label' => __( 'Team Content', 'prysm' ),
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
            'readmore_label', [
                'label'       => esc_html__( 'Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'           => 'team_shapew_bg',
                'label'          => __( 'Background', 'prysm' ),
                'types'          => ['classic'],
                'exclude'        => ['color'],
                'selector'       => '{{WRAPPER}} .team-block .inner-box .image .color-layer',
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'team_id', [
                'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );
        $this->add_control(
            'teams_items',
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
            'team_name_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'List Item Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'naem_title',
            [
                'label'     => esc_html__( 'Name Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .content h4 a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'naem_hover_title',
            [
                'label'     => esc_html__( 'Name Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .content h4 a:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block .inner-box .content h4',
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
            'team_des_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Dsegnation Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'dseg_title',
            [
                'label'     => esc_html__( 'Dsegnation Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .content .designation' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'team_dseg__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block .inner-box .content .designation',
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
            'team_desc_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Bio Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'bio_color',
            [
                'label'     => esc_html__( 'Bio Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .content .text' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'team_bio__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block .inner-box .content .text',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Inter',
                    ],
					'font_weight' => [
						'default' => '400',
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
            'social_icon_stl',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Icon Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon_color',
            [
                'label'     => esc_html__( 'Icon Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .social-box li a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .social-box li a:hover' => 'Background: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'icon_border_color',
            [
                'label'     => esc_html__( 'Icon Border Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block .inner-box .social-box li a' => 'border-color: {{VALUE}} ',
                ],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $sub_title           = $settings['sub_title'];
            $title               = $settings['title'];
            $readmore_label      = $settings['readmore_label'];

            $teams_items         = $settings['teams_items'];

        ?>
        <!-- Team Section -->
		<section class="team-section">
			<div class="auto-container">
				<div class="inner-container">
					<!-- Sec Title -->
					<div class="sec-title centered">
						<div class="title-outer">
							<div class="title"><?php echo esc_html($sub_title);?></div>
						</div>
						<h2><?php echo esc_html($title);?></h2>
					</div>
					<div class="team-carousel owl-carousel owl-theme">
						<?php foreach($teams_items as $box):?>
                        <?php  if( $box['team_id'] ) : 

                            if(get_post_meta($box['team_id'], 'prysm_teampost', true)) {
                            $team_meta = get_post_meta($box['team_id'], 'prysm_teampost', true);
                            } else {
                                $team_meta = array();
                            }

                            if( array_key_exists( 'team_bio', $team_meta )) {
                                $team_bio = $team_meta['team_bio'];
                            } else {
                                $team_bio = '';
                            }  
                            if( array_key_exists( 'team_desg', $team_meta )) {
                                $team_desg = $team_meta['team_desg'];
                            } else {
                                $team_desg = '';
                            }  
                            if( array_key_exists( 'team_socialicons', $team_meta )) {
                                $team_socialicons = $team_meta['team_socialicons'];
                            } else {
                                $team_socialicons = '';
                            }  
                        ?>
						<!-- Team Block -->
						<div class="team-block">
							<div class="inner-box">
								<div class="image">
									<img src="<?php echo get_the_post_thumbnail_url($box['team_id'], 'full')?>" alt="" />
									<div class="color-layer"></div>
									<div class="read-more">
										<a href="<?php echo get_the_permalink($box['team_id']);?>" class="read"><?php echo  esc_html($readmore_label);?> <span class="fa fa-angle-right"></span></a>
									</div>
								</div>
								<div class="content">
									<h4><a href="<?php echo get_the_permalink($box['team_id']);?>"><?php echo get_the_title($box['team_id']);?></a></h4>
									<div class="designation"><?php echo esc_html($team_desg);?></div>
									<div class="text"><?php echo esc_html($team_bio);?></div>
									<!-- Social Box -->
                                    <?php if(isset($team_socialicons)):?>
									<ul class="social-box">
                                        <?php foreach($team_socialicons as $team):?>
										<li><a href="<?php echo esc_url($team['team_icon_link']['url']);?>" class="<?php echo esc_attr($team['team_icon_class']);?>"></a></li>
                                        <?php endforeach;?>
									</ul>
                                    <?php endif;?>
								</div>
							</div>
						</div>
						<?php endif; endforeach;?>
					</div>
				</div>
			</div>
		</section>
		<!-- End Team Section -->
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
