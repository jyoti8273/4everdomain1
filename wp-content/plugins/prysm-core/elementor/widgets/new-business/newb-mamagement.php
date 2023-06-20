<?php

    class newb_business_management extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_business_management';
        }

        public function get_title() {
            return __( 'New Business Management', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'business_management',
                [
                    'label' => __( 'Management Content', 'prysm' ),
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
                'management_img',
                [
                    'label' => esc_html__( 'Management Img', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'Video_link',
                [
                    'label' => esc_html__( 'Video Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                's_heading1',
                [
                    'label' => esc_html__( 'Heading 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                's_heading2',
                [
                    'label' => esc_html__( 'Heading 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                's_heading3',
                [
                    'label' => esc_html__( 'Heading 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );

            $repeater = new \Elementor\Repeater();        
            
            $repeater->add_control(
                'fnf_icon_link',
                [
                    'label' => esc_html__( 'Fanfact Icon Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'heading', [
                    'label'       => esc_html__( 'Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'description', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'skillbars',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'management_style',
                [
                    'label' => esc_html__( 'Management Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'management_bar-title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Progress Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .skills .skill-item .skill-header .skill-title',
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
                'management_bar-content',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Progress Content Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_cont__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .skills .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'management_heading_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Heading ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_hfd__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-two h3',
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

            $settings     = $this->get_settings_for_display();
            $s_heading1  = $settings['s_heading1'];
            $s_heading2  = $settings['s_heading2'];
            $s_heading3  = $settings['s_heading3'];
            $pattern  = $settings['pattern']['url'];
            $skillbars  = $settings['skillbars'];
            $management_img  = $settings['management_img']['url'];
            $Video_link  = $settings['Video_link'];

        ?>

        <!-- Business Section -->
		<section class="business-section">
			<div class="auto-container">
				<div class="sec-title-two">
					<h3><?php echo esc_html($s_heading1);?> <span><?php echo esc_html($s_heading2);?></span> <?php echo esc_html($s_heading3);?></h3>
				</div>
				<div class="row clearfix">
				
					<!-- Video Column -->
					<div class="video-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern);?>)"></div>
							<div class="image" titlt" data-tilt data-tilt-max="4">
								<a href="<?php echo esc_url($Video_link);?>" class="lightbox-image video-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
								<img src="<?php echo esc_url($management_img);?>" alt="" />
							</div>
						</div>
					</div>
					
					<!-- Skill Column -->
					<div class="skill-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							
							<!-- Skills -->
							<div class="skills">
                                <?php foreach($skillbars as $item):?>
								<!-- Skill Item -->
								<div class="skill-item">
									<span class="icon">
                                        <lord-icon
                                            src="<?php echo esc_url($item['fnf_icon_link']);?>"
                                            trigger="loop"
                                            colors="primary:#005ef9,secondary:#005ef9"
                                            style="width:80px;height:80px">
                                        </lord-icon>
                                    </span>
									<div class="text"><strong><?php echo esc_html($item['heading']);?>:</strong> <?php echo esc_html($item['description']);?></div>
									<div class="skill-bar">
										<div class="bar-inner"><div class="bar progress-line" data-width="90" style="width:<?php echo esc_attr($item['number']);?>%"></div></div>
									</div>
									<div class="skill-header clearfix">
										<div class="skill-title"><?php echo esc_html($item['title']);?></div>
										<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($item['number']);?>"><?php echo esc_attr($item['number']);?></span>%</div></div>
									</div>
								</div>
								<?php endforeach;?>
                                
								
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- End Business Section -->
      <?php

              }

      }
