<?php

    class const_team_member extends \Elementor\Widget_Base {

        public function get_name() {
            return 'const_team_member';
        }

        public function get_title() {
            return __( 'Consulting V2 Team', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
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
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
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
        $this->add_control(
            'team_items',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'team_style',
            [
                'label' => esc_html__( 'team Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'team_heading_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'team Heading Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'agsection_sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title-three .title',
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
        $this->add_control(
            'agsection_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'agsection_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title-three h2',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
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
                'label'     => esc_html__( 'Team Name Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'team_name_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block-two .inner-box .lower-content h4',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
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
            'team_deg_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Team Designation Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'team_deg_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .team-block-two .inner-box .lower-content .designation',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Inter',
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings         = $this->get_settings_for_display();
            $sub_title        = $settings['sub_title'];
            $title            = $settings['title'];

            $team_items   = $settings['team_items'];

        ?>
        <!-- Team Section Two -->
			<section class="team-section-two">
				<div class="auto-container">
					<div class="inner-container">
						<!-- Sec Title Three -->
						<div class="sec-title-three centered">
							<div class="title"><?php echo esc_html($sub_title);?></div>
							<h2><?php echo esc_html($title);?></h2>
						</div>
						<div class="row clearfix">
						    <?php foreach($team_items as $box):?>
                            <?php  if( $box['team_id'] ) :  
                            
                            if(get_post_meta($box['team_id'], 'prysm_teampost', true)) {
                                $team_meta = get_post_meta($box['team_id'], 'prysm_teampost', true);
                                } else {
                                    $team_meta = array();
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
							<!-- Team Block Two -->
							<div class="team-block-two col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box">
									<div class="image">
										<a href="<?php echo get_the_permalink($box['team_id']);?>"><img src="<?php echo get_the_post_thumbnail_url($box['team_id'], 'full')?>" alt="" /></a>
										<div class="social-outer">
											<!-- Social Box -->
											<ul class="social-box">
                                                <?php foreach($team_socialicons as $icon):?>
												<li><a href="<?php echo esc_url($icon['team_icon_link']['url']);?>" class="<?php echo esc_attr($icon['team_icon_class']);?>"></a></li>
                                                <?php endforeach;?>
											</ul>
										</div>
									</div>
									<div class="lower-content">
										<h4><a href="<?php echo get_the_permalink($box['team_id']);?>"><?php echo get_the_title($box['team_id']);?></a></h4>
										<div class="designation"><?php echo esc_html($team_desg);?></div>
									</div>
								</div>
							</div>
							<?php endif; endforeach;?>	
						</div>
					</div>
				</div>
			</section>
			<!-- End Team Section Two -->
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
