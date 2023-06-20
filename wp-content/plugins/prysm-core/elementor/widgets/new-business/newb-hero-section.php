<?php

    class newb_hero_slider extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_hero_slider';
        }

        public function get_title() {
            return __( 'Business Hero', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-slider-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'hero_content',
                [
                    'label' => __( 'Hero Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'hero_bg',
                [
                    'label' => __( 'Hero Section Bg Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hero_shape1',
                [
                    'label' => __( 'Shape 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hr',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'hero_2',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'hero_2_background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic', ],
                    'selector' => '{{WRAPPER}} .banner-section .content h2 span:before',
                ]
            );
            $this->add_control(
                'hero_title',
                [
                    'label' => __( 'Hero Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'hero_text',
                [
                    'label' => __( 'Hero Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'hr_2',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'btn_label',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_url',
                [
                    'label' => __( 'Button URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
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
                'hero_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'feature Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .banner-section .content h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
                'hero_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_txt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .banner-section .content .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'hero_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_btn_typography',
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

            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $hero_bg        = $settings['hero_bg']['url'];
            $hero_shape1    = $settings['hero_shape1']['url'];

            $hero_title    = $settings['hero_title'];
            $hero_2       = $settings['hero_2'];
            $hero_text    = $settings['hero_text'];

        ?>
        <!-- Banner Section -->
		<section class="banner-section" style="background-image: url(<?php echo esc_url($hero_bg);?>)">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($hero_shape1);?>)"></div>
			<div class="auto-container">
				<div class="content">
					<h2><span><?php echo esc_html($hero_2);?></span> <?php echo __($hero_title);?></h2>
					<div class="text"><?php echo __($hero_text);?></div>
					<div class="btn-box text-center">
						<a href="#" class="theme-btn btn-style-three"><span class="txt">Contact us <i class="flaticon-right-arrow"></i></span></a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Banner Section -->
      <?php

              }

      }
