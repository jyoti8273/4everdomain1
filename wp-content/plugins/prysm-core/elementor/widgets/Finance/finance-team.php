<?php

    class finance_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_team';
        }

        public function get_title() {
            return __( 'Finance Team', 'prysm' );
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
            'section_shape',
            [
                'label' => __( 'Team Shape', 'prysm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
            'button_text', [
                'label'       => esc_html__( 'Button Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'button_link', [
                'label'       => esc_html__( 'Button URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_id', [
                'label'       => esc_html__( 'Select team', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );

        $repeater->add_control(
            'hr',
            [
                'type'  => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        

        $repeater->add_control(
			'team_circle_shape',
			[
				'label' => __( 'Team Shape Image', 'prysm' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $repeater->add_control(
			'team_image',
			[
				'label' => __( 'Choose Image', 'prysm' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        
        $repeater->add_control(
            'position', [
                'label'       => esc_html__( 'Team Position', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'social_icon',
			[
				'label' => __( 'Disable Social Icon', 'prysm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'prysm' ),
				'label_off' => __( 'Hide', 'prysm' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $repeater->add_control(
            'fb_link', [
                'label'       => esc_html__( 'Facebook URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );
        
        $repeater->add_control(
            'twi_link', [
                'label'       => esc_html__( 'Twitter URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );
        $repeater->add_control(
            'linkd_link', [
                'label'       => esc_html__( 'Linkedin URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );
        $repeater->add_control(
            'inst_link', [
                'label'       => esc_html__( 'Instagram URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );
        
        $repeater->add_control(
            'beh_link', [
                'label'       => esc_html__( 'Behance URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );
        $repeater->add_control(
            'drib_link', [
                'label'       => esc_html__( 'Dribbble URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );
        $repeater->add_control(
            'pint_link', [
                'label'       => esc_html__( 'Pinterest URL', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'condition' => ['social_icon' => 'yes'],
            ]
        );

        $this->add_control(
            'team_boxes',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        
        
        $this->end_controls_section();

            $this->start_controls_section(
                'section_style_info',
                [
                    'label' => esc_html__( 'Section Title Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
           
            $this->add_control(
                'sec_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sec_sub_title__color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_title_bg_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sec_subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-subtitle',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'sec_main_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sec_title__color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-title-area .pr6-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sectitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'team_style_info',
                [
                    'label' => esc_html__( 'team Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'team_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'team_box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr6-team-members .pr6-ld-member',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr6-team-members .pr6-ld-member',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'hover_background',
                    'label' => __( 'Hover Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr6-team-members .pr6-ld-member::before',
                ]
            );
            $this->add_control(
                'border-round',
                [
                    'label' => __( 'Border Radius', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr6-team-members .pr6-ld-member' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
    
            $this->add_control(
                'srvh_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title__color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-team-members .pr6-ld-member .pr6-team-content .pr6-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-team-members .pr6-ld-member:hover .pr6-team-content .pr6-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-team-members .pr6-ld-member .pr6-team-content .pr6-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tx_text_color',
                [
                    'label'     => esc_html__( 'Position Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-team-members .pr6-ld-member .pr6-team-content .pr6-designation span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'tx_hover_text_color',
                [
                    'label'     => esc_html__( 'Position Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-team-members .pr6-ld-member:hover .pr6-team-content .pr6-designation span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-team-members .pr6-ld-member .pr6-team-content .pr6-designation span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
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
                    'selector'       => '{{WRAPPER}} .pr6-primary-btn a',
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
                        '{{WRAPPER}} .pr6-primary-btn a' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr6-primary-btn a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a:hover, .pr6-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings           = $this->get_settings_for_display();
            $sub_title          = $settings['sub_title'];
            $title              = $settings['title'];
            $button_text        = $settings['button_text'];
            $button_link        = $settings['button_link'];
            $team_boxes         = $settings['team_boxes'];
            $section_shape      = $settings['section_shape'];

        ?>
        <!-- team Section -->
		<!-- Team Section -->
		<section class="pr6-leadership-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-7">
						<div class="pr6-title-area wow fadeInUp">
							<span class="pr6-subtitle"><?php echo __($sub_title);?></span>
							<div class="pr6-headline">
								<h3><?php echo __($title);?></h3>
							</div>
						</div>
					</div>
					<div class="col-lg-5 align-self-end wow fadeInRight">
						<div class="pr6-primary-btn">
							<span class="pr6-ld-arrow"><img src="<?php echo esc_url($section_shape['url']);?>" alt=""></span>
							<a href="<?php echo esc_url($button_link['url']);?>"><?php echo esc_html($button_text);?><i class="fas fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="pr6-team-members">
					<div class="row">
                    <?php $shape = 0; foreach($team_boxes as $index => $box): $shape++;?>
                        <?php  if( $box['team_id'] ) : ?>
						<div class="col-lg-3 col-sm-6">
							<div class="pr6-team-column wow fadeInUp">
								<div class="pr6-ld-member">
									<div class="pr6-img-wrapper">
										<span class="pr6-ld-img-circle"><img src="<?php echo esc_url($box['team_circle_shape']['url']);?>" alt=""></span>
										<div class="client-thumb">
											<img src="<?php echo esc_url($box['team_image']['url']);?>" alt="">
										</div>
									</div>
									<div class="pr6-team-content">
										<div class="pr6-headline">
											<a href="<?php echo get_the_permalink($box['team_id']);?>"><h4><?php echo get_the_title($box['team_id']);?></h4></a>
										</div>
										<div class="pr6-designation">
											<span><?php echo esc_html($box['position']);?></span>
										</div>
                                        <?php if('yes' == $box['social_icon']):?>
										<div class="pr6-team-socials">
                                            <?php if($box['fb_link']['url']){ ?>
                                                <a href="<?php echo esc_url($box['fb_link']['url']);?>"><i class="fab fa-facebook-f"></i></a>
                                            <?php }?>

                                            <?php if($box['twi_link']['url']){ ?>
                                                <a href="<?php echo esc_url($box['twi_link']['url']);?>"><i class="fab fa-twitter"></i></a>
                                            <?php }?>

                                            <?php if($box['linkd_link']['url']){ ?>
                                                <a href="<?php echo esc_url($box['linkd_link']['url']);?>"><i class="fab fa-linkedin"></i></a>
                                            <?php }?>

                                            <?php if($box['inst_link']['url']){ ?>
                                                <a href="<?php echo esc_url($inst_link['box']['url']);?>"><i class="fab fa-instagram"></i></a>
                                            <?php }?>

                                            <?php if($box['beh_link']['url']){ ?>
                                                <a href="<?php echo esc_url($box['beh_link']['url']);?>"><i class="fab fa-behance"></i></a>
                                            <?php }?>

                                            <?php if($box['drib_link']['url']){ ?>
                                                <a href="<?php echo esc_url($box['drib_link']['url']);?>"><i class="fab fa-dribbble"></i></a>
                                            <?php }?>

                                            <?php if($box['pint_link']['url']){ ?>
                                                <a href="<?php echo esc_url($box['pint_link']['url']);?>"><i class="fab fa-pinterest"></i></a>
                                            <?php }?>
											
										</div>
                                        <?php endif;?>
									</div>
								</div>
							</div>
						</div>
						<?php endif; endforeach;?>

					</div>
				</div>
			</div>
		</section>

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
