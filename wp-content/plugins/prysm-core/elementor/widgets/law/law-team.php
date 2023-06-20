<?php

    class law_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_team';
        }

        public function get_title() {
            return __( 'Law Team', 'prysm' );
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
                'label' => esc_html__( 'Team Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_sec_title_style',
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
            'team_name_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Team Name Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'team_name_color',
            [
                'label'     => esc_html__( 'Team Name Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block-four .inner-box h4 a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'team_name_hover_color',
            [
                'label'     => esc_html__( 'Team Name Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block-four .inner-box h4 a:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'team_name_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block-four .inner-box h4',
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
            'team_desig_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Designation Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'designation_color_title',
            [
                'label'     => esc_html__( 'Designation Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block-four .inner-box .designation' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'tem_desi__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block-four .inner-box .designation',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Lato',
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
                    '{{WRAPPER}} .team-block-four .inner-box .social-box li a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'icon_bg_color',
            [
                'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block-four .inner-box .social-box li a:hover' => 'Background: {{VALUE}} ',
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
            'overlay_bg_color',
            [
                'label'     => esc_html__( 'Team Overlay BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-block-four .inner-box .image:before' => 'background:radial-gradient(circle farthest-corner at center center, rgba(255,255,255,0) 0%, {{VALUE}} 100%)',
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
            $link      = $settings['link'];

            $teams_items         = $settings['teams_items'];

        ?>
        <!-- Team Section Five -->
        <section class="team-section-five">
            <div class="auto-container">
                <div class="sec-title-eight centered">
                    <h2><?php echo __($title);?></h2>
                </div>
                <div class="row clearfix">
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
                    <!-- Team Block Four -->
                    <div class="team-block-four col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo get_the_post_thumbnail_url($box['team_id'], 'full')?>" alt="" />
                                <!-- Social Box -->
                                <?php if(isset($team_socialicons)):?>
                                <ul class="social-box">
                                    <?php foreach($team_socialicons as $team):?>
                                        <li><a href="<?php echo esc_url($team['team_icon_link']['url']);?>" class="<?php echo esc_attr($team['team_icon_class']);?>"></a></li>
                                    <?php endforeach;?>
                                </ul>
                                <?php endif;?>
                            </div>
                            <div class="lower-content">
                                <h4><a href="<?php echo get_the_permalink($box['team_id']);?>"><?php echo get_the_title($box['team_id']);?></a></h4>
                                <div class="designation"><?php echo esc_html($team_desg);?></div>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
                
                <div class="btns-box text-center">
                    <a href="<?php echo esc_url($link['url']);?>" class="theme-btn btn-style-twentyone"><span class="txt"><?php echo esc_html($readmore_label);?> <i class="flaticon-right-arrow"></i></span></a>
                </div>
                
            </div>
        </section>
        <!-- End Team Section Five -->
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
