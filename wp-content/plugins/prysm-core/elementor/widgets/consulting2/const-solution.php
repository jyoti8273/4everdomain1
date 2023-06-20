<?php

    class const_solution_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'const_solution_section';
        }

        public function get_title() {
            return __( 'Consulting Solution', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-slider-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'solution_content',
                [
                    'label' => __( 'Solution Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'solution_bg',
                [
                    'label' => __( 'Solution Bg', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'solution_img',
                [
                    'label' => __( 'Solution Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'sub_heading',
                [
                    'label' => __( 'Sub Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading',
                [
                    'label' => __( 'Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'form_id',
                [
                    'label' => __( 'Form Shortcode', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'form_bg1',
                [
                    'label' => __( 'Form BG 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'form_bg2',
                [
                    'label' => __( 'Form BG 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'slider_style',
                [
                    'label' => esc_html__( 'Hero Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'discover_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Discover Box Style', 'prysm' ),
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
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $solution_bg   = $settings['solution_bg'];
            $solution_img  = $settings['solution_img'];
            $sub_heading = $settings['sub_heading'];
            $heading     = $settings['heading'];
            $form_id    = $settings['form_id'];
            $form_bg1   = $settings['form_bg1'];
            $form_bg2   = $settings['form_bg2'];

        ?>
        <!-- Solution Section -->
			<section class="solution-section">
				<div class="auto-container">
					<div class="inner-container">
						<div class="solution_bg-layer-one" style="background-image: url(<?php echo esc_url($solution_bg['url']);?>)"></div>
						<div class="clearfix">
							
							<!-- Image Column -->
							<div class="image-column col-lg-5 col-md-12 col-sm-12">
								<div class="inner-column">
									<div class="image">
										<img src="<?php echo esc_url($solution_img['url']);?>" alt="" />
									</div>
								</div>
							</div>
							
							<!-- Form Column -->
							<div class="form-column col-lg-7 col-md-12 col-sm-12">
								<div class="inner-column" style="background-image: url(<?php echo esc_url($form_bg1['url']);?>)">
									<div class="map-layer" style="background-image: url(<?php echo esc_url($form_bg2['url']);?>)"></div>
									<!-- Sec Title Three -->
									<div class="sec-title-three">
										<div class="title"><?php echo esc_html($sub_heading);?></div>
										<h2><?php echo esc_html($heading);?></h2>
									</div>
									
									<!-- Solution Form -->
									<div class="solution-form">
										<?php echo do_shortcode( $form_id );?>
									</div>
									<!--End Default Form-->
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</section>
			<!-- End Solution Section -->
      <?php

              }

      }
