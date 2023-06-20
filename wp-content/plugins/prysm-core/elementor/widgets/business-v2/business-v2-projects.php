<?php

    class business2_rojects_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business2_rojects_section';
        }

        public function get_title() {
            return __( 'Business V3 Projects', 'prysm' );
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

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'portfolio_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
             
            $repeater->add_control(
                'portfolio_img', [
                    'label'       => esc_html__( 'Service Icon', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'excerpt', [
                    'label'       => esc_html__( 'Button Label Icon', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
                       
            $this->add_control(
                'portfolio_items',
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
                    'label' => esc_html__( 'Project Top Heading Style', 'prysm' ),
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
                    'name'           => 'subtitle_style',
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
                'title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
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
                'project_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'proje_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-five .content-column h4',
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
                'proj_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-five .content-column h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'proj_title_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-five .content-column h4 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'boj_plus_bg',
                [
                    'label' => esc_html__( 'Buttton Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-five .inner-box:hover .plus' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'boj_plus_border_bg',
                [
                    'label' => esc_html__( 'Button Hover Border Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-five .inner-box:hover .plus' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'dot_bg_cllr',
                [
                    'label' => esc_html__( 'Slider Dot Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-section-five .owl-dots .owl-dot.active, .project-section-five .owl-dots .owl-dot:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $sub_title     = $settings['sub_title'];
            $maintitle       = $settings['maintitle'];
            $portfolio_items        = $settings['portfolio_items'];

        ?>
        <!-- Project Section Five -->
			<section class="project-section-five">
				<div class="auto-container">
					<div class="sec-title-seven style-two centered">
						<div class="title"><?php echo esc_html($sub_title);?></div>
						<h2><?php echo esc_html($maintitle);?></h2>
					</div>
					<div class="two-project-item-carousel owl-carousel owl-theme">
                    <?php $shape = 0; foreach($portfolio_items as $index => $box): $shape++;?>
                    <?php  if( $box['portfolio_id'] ) : ?>
						<!-- Gallery Block Five -->
						<div class="gallery-block-five">
							<div class="inner-box">
								<div class="row clearfix">
								
									<!-- Image Column -->
									<div class="image-column col-lg-6 col-md-6 col-sm-12">
										<div class="inner-column">
											<div class="image">
												<a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><img src="<?php echo esc_url($box['portfolio_img']['url']);?>" alt="" /></a>
											</div>
										</div>
									</div>
									
									<!-- Content Column -->
									<div class="content-column col-lg-6 col-md-6 col-sm-12">
										<div class="inner-column">
											<h4><a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><?php echo get_the_title($box['portfolio_id']);?></a></h4>
											<div class="text"><?php echo esc_html($box['excerpt']);?></div>
											<a href="<?php echo get_the_permalink($box['portfolio_id']);?>" class="plus fal fa-plus"></a>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<?php endif; endforeach;?>
					</div>
				</div>
			</section>
			<!-- End Project Section Five -->

      <?php

              }

              protected function select_param_posts() {
                $args = wp_parse_args( [
                    'post_type'   => 'portfolio',
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
