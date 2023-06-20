<?php

    class newb_business_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_business_section';
        }

        public function get_title() {
            return __( 'New Business Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-lock-user';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'project_member',
                [
                    'label' => __( 'project Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'pattern',
                [
                    'label' => esc_html__( 'Pattern 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );           
            $this->add_control(
                'pattern2',
                [
                    'label' => esc_html__( 'Pattern 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );           
            $this->add_control(
                'bg_img',
                [
                    'label' => esc_html__( 'Background Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                's_heading1',
                [
                    'label' => esc_html__( 'Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title_link',
                [
                    'label' => esc_html__( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                ]
            );

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'project_img',
                [
                    'label' => esc_html__( 'Project Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'category',
                [
                    'label' => esc_html__( 'Category', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'btn_label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'project_link', [
                    'label'       => esc_html__( 'Project', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'projectsslider',
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
                    'label' => esc_html__( 'Project Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'project_title_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'project Title Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block .inner-box .content-box h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
            $this->add_control(
                'project_cate_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'project Cat Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_title2_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block .inner-box .content-box .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '12',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'project_text_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'project Text Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_title3_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block .inner-box .content-box .text',
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
                'project_btn_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'project Button Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-three',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'project_heading_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_hid_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-section-two .sample-box h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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

            $settings    = $this->get_settings_for_display();
            $s_heading1  = $settings['s_heading1'];
            $pattern     = $settings['pattern']['url'];
            $pattern2    = $settings['pattern2']['url'];
            $bg_img      = $settings['bg_img']['url'];
            $title_link      = $settings['title_link']['url'];
            $projectsslider = $settings['projectsslider'];

        ?>
       <!-- Business Section Two -->
		<section class="business-section-two">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern);?>)"></div>
			<div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2);?>)"></div>
			<div class="auto-container">
				<div class="sample-box titlt" data-tilt data-tilt-max="4" style="background-image: url(<?php echo esc_url($bg_img);?>)">
					<a href="<?php echo esc_url($title_link);?>" class="plus flaticonv10-plus-symbol"></a>
					<h3><a href="<?php echo esc_url($title_link);?>"><?php echo __($s_heading1);?></a></h3>
				</div>
				<div class="inner-container">
					<div class="single-item-carousel owl-carousel owl-theme">
                        <?php foreach($projectsslider as $slide):?>
						<!-- Business Block -->
						<div class="business-block">
							<div class="inner-box">
								<div class="image">
									<img src="<?php echo esc_url($slide['project_img']['url']);?>" alt="" />
								</div>
								<div class="content-box">
									<div class="title"><?php echo esc_html($slide['category']);?></div>
									<h3><a href="<?php echo esc_url($slide['project_link']['url']);?>"><?php echo esc_html($slide['title']);?></a></h3>
									<div class="text"><?php echo __($slide['description']);?></div>
									<div class="btn-box">
										<a href="<?php echo esc_url($slide['project_link']['url']);?>" class="theme-btn btn-style-three"><span class="txt"><?php echo esc_html($slide['btn_label']);?> <i class="flaticonv10-right-arrow"></i></span></a>
									</div>
								</div>
							</div>
						</div>
						<!-- End Business Block -->
						<?php endforeach;?>
					</div>
				</div>
			</div>
		</section>
		<!-- End Business Section Two -->
      <?php

              }

      }
