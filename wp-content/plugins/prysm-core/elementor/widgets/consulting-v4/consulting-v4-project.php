<?php

    class constv4_project_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_project_section';
        }

        public function get_title() {
            return __( 'Consulting V4 Project', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-project-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'project_content',
                [
                    'label' => __( 'Project Content', 'prysm' ),
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
                'project_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
            $repeater->add_control(
                'project_img', [
                    'label'       => esc_html__( 'Project Img', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'shape1', [
                    'label'       => esc_html__( 'Shape 1', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'shape2', [
                    'label'       => esc_html__( 'Shape 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );                 
            $repeater->add_control(
                'tagline', [
                    'label'       => esc_html__( 'Tag Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $repeater->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $this->add_control(
                'projects_items',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'project_style',
                [
                    'label' => esc_html__( 'project Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'project_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'project Box Style', 'prysm' ),
                    'separator' => 'before',
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
                    'name'           => 'project_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-four .inner-box .lower-content h4',
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
                'project_title_color',
                [
                    'label' => esc_html__( 'Project Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-four .inner-box .lower-content h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_title_hover_color',
                [
                    'label' => esc_html__( 'Project Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-four .inner-box .lower-content h4 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'project_tag_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Tag  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'proj_tag_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-four .inner-box .lower-content .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'proje_tag_color',
                [
                    'label' => esc_html__( 'Tag Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-four .inner-box .lower-content .text' => 'color: {{VALUE}}',
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
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-four .inner-box .lower-content .more',
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
                'project_more_color',
                [
                    'label' => esc_html__( 'Button More Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-four .inner-box .lower-content .more' => 'color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $sub_title     = $settings['sub_title'];
            $maintitle       = $settings['maintitle'];
            $projects_items        = $settings['projects_items'];

        ?>
            <!-- Project Section Four -->
			<section class="project-section-four">
				<div class="container">
					<!-- Sec Title Seven -->
					<div class="sec-title-seven centered">
						<div class="title"><?php echo esc_html($sub_title);?></div>
						<h2><?php echo esc_html($maintitle);?></h2>
					</div>
				</div>
				
				<!-- Outer Container -->
				<div class="outer-container">
					<div class="gallery-carousel-two owl-carousel owl-theme">
                        <?php $shape = 0; foreach($projects_items as $index => $box): $shape++;?>
                        <?php  if( $box['project_id'] ) : ?>						
						<!-- Gallery Block Four -->
						<div class="gallery-block-four">
							<div class="inner-box">
								<div class="image"> 
									<a href="<?php echo get_the_permalink($box['project_id']);?>"><img src="<?php echo esc_url($box['project_img']['url']);?>" alt="" /></a>
								</div>
								<div class="lower-content">
									<div class="pattern-layer" style="background-image: url(<?php echo esc_url($box['shape1']['url']);?>)"></div>
									<div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($box['shape2']['url']);?>)"></div>
									<h4><a href="<?php echo get_the_permalink($box['project_id']);?>"><?php echo get_the_title($box['project_id']);?></a></h4>
									<div class="text"><?php echo esc_html($box['tagline']);?></div>
									<a href="<?php echo get_the_permalink($box['project_id']);?>" class="more"><?php echo esc_html($box['btn_label']);?></a>
								</div>
							</div>
						</div>
						<?php endif; endforeach;?>
					</div>
				</div>
			</section>
			<!-- End Project Section Four -->

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
