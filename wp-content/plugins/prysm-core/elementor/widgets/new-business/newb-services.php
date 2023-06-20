<?php

    class newb_service extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_service';
        }

        public function get_title() {
            return __( 'New Business Service', 'prysm' );
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
            'pattern2', [
                'label'       => esc_html__( 'Pattern 2', 'prysm' ),
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
        $this->add_control(
            'text', [
                'label'       => esc_html__( 'Title Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'description', [
                'label'       => esc_html__( 'Description', 'prysm' ),
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
            'btn_link', [
                'label'       => esc_html__( 'Button Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'service_id', [
                'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );
        $repeater->add_control(
            'icons_link', [
                'label'       => esc_html__( 'Icon Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'excerpt', [
                'label'       => esc_html__( 'Excerpt', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'services_items',
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
                'name'           => 'service__hd_title__typography',
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
        $this->add_control(
            'service_heading_text_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Heading Text Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service__hd_txt__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .services-section-two .sec-title-two .pull-right .text',
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
            'service_btn_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Button Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service__btn__typography',
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
            'service_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block-two .inner-box h5',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Inter',
                    ],
                    'font_weight' => [
                        'default' => '700',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '22',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'service_excerpt_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Excerpt Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service_exc__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block-two .inner-box .text',
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
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $pattern1           = $settings['pattern1'];
            $pattern2           = $settings['pattern2'];
            $sub_title           = $settings['sub_title'];
            $title               = $settings['title'];
            $text                   = $settings['text'];
            $description         = $settings['description'];
            $readmore_label      = $settings['readmore_label'];
            $btn_link            = $settings['btn_link']['url'];

            $services_items         = $settings['services_items'];

        ?>
        <!-- Services Section Two -->
		<section class="services-section-two">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern1['url']);?>)"></div>
			<div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2['url']);?>)"></div>
			<div class="auto-container">
					
				<!-- Sec Title Two -->
				<div class="sec-title-two clearfix">
					<div class="pull-left">
						<h3><?php echo esc_html($sub_title);?> <span><?php echo esc_html($title);?></span> <br> <?php echo esc_html($text);?></h3>
					</div>
					<div class="pull-right clearfix">
						<div class="text"><?php echo __($description);?></div>
						<div class="btn-box">
							<a href="<?php echo esc_url($btn_link);?>" class="theme-btn btn-style-three"><span class="txt"><?php echo esc_html($readmore_label);?> <i class="flaticonv10-right-arrow"></i></span></a>
						</div>
					</div>
				</div>
				
				<div class="row clearfix">
                    <?php foreach($services_items as $box):?>
                    <?php  if( $box['service_id'] ) :  ?>
					<!-- Service Block Two -->
					<div class="service-block-two col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
							<div class="color-layer"></div>
							<div class="icon">								
								<lord-icon
								    src="<?php echo esc_url($box['icons_link']);?>"
								    trigger="loop"
								    colors="primary:#121331,secondary:#005ef9"
								    style="width:150px;height:150px">
								</lord-icon>
							</div>
							<h5><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h5>
							<div class="text"><?php echo __($box['excerpt']);?></div>
							<a class="arrow flaticonv10-right-arrow" href="<?php echo get_the_permalink($box['service_id']);?>"></a>
						</div>
					</div>
					<?php endif; endforeach;?>
				</div>
				
			</div>
		</section>
		<!-- End Services Section Two -->
      <?php

            }

        protected function select_param_posts() {
            $args = wp_parse_args( [
                'post_type'   => 'services',
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
