<?php

    class const_project_slider extends \Elementor\Widget_Base {

        public function get_name() {
            return 'const_project_slider';
        }

        public function get_title() {
            return __( 'Consulting V2 Project Carousel', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
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
            'pattern1', [
                'label'       => esc_html__( 'Pattern 1', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
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
            'portfolio_id', [
                'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );
        $repeater->add_control(
            'project_img', [
                'label'       => esc_html__( 'Icon Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'project_title', [
                'label'       => esc_html__( 'Designation', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
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
                'label' => esc_html__( 'Service Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'service_heading_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Heading Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'project_sub_title_typography',
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
            'project_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'project_title_typography',
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
            'project_main_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Project Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'project_text_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .gallery-block-two .inner-box .content h3',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
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
        
        $this->end_controls_section();

        }

        protected function render() {

            $settings         = $this->get_settings_for_display();
            $pattern1         = $settings['pattern1'];
            $sub_title        = $settings['sub_title'];
            $title            = $settings['title'];

            $portfolio_items   = $settings['portfolio_items'];

        ?>
        <!-- Project Section -->
			<section class="project-section">
				<div class="auto-container">
					<div class="inner-container">
						<div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern1['url']);?>)"></div>
						<!-- Sec Title Three -->
						<div class="sec-title-three light">
							<div class="title"><?php echo esc_html($sub_title);?></div>
							<h2><?php echo esc_html($title);?></h2>
						</div>
						<div class="gallery-carousel owl-carousel owl-theme">
                            <?php foreach($portfolio_items as $box):?>
                            <?php  if( $box['portfolio_id'] ) :  ?>	
							<!-- Gallery Block -->
							<div class="gallery-block-two">
								<div class="inner-box">
									<div class="color-layer"></div>
									<div class="image">
										<img src="<?php echo esc_url($box['project_img']['url']);?>" alt="" />
										<div class="gradient-layer"></div>
										<div class="content">
											<div class="title"><?php echo esc_html($box['project_title']);?></div>
											<h3><a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><?php echo get_the_title($box['portfolio_id']);?></a></h3>
											<a href="<?php echo get_the_permalink($box['portfolio_id']);?>" class="arrow flaticonv10-arrow-pointing-to-right"></a>
										</div>
									</div>
								</div>
							</div>
							<?php endif; endforeach;?>							
						</div>
					</div>
				</div>
				
			</section>
			<!-- End Project Section -->
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
