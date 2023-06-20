<?php

    class weba_video_popup extends \Elementor\Widget_Base {

        public function get_name() {
            return 'weba_video_popup';
        }

        public function get_title() {
            return __( 'Web Agency Video Popup', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'video_popup_contetn',
                [
                    'label' => __( 'Video Popup Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'video_bg',
                [
                    'label' => esc_html__( 'Fanfact Background Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'subheading',
                [
                    'label' => esc_html__( 'Sub Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'mainheading',
                [
                    'label' => esc_html__( 'Main Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'videolink',
                [
                    'label' => esc_html__( 'Video Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'popup_bg_dasg',
                    'label' => esc_html__( 'Background', 'plugin-name' ),
                    'types' => [ 'classic' ],
                    'exclude' => ['color'],
                    'selector' => '{{WRAPPER}} .cta-section-eight .content:before',
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'popup_style',
                [
                    'label' => esc_html__( 'Popup Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'sub_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-section-eight .content .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_ttl__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .cta-section-eight .content .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-section-eight .content h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'ttl__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .cta-section-eight .content h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                'popup_bg_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Play Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'ply_btn_bg',
                    'label' => esc_html__( 'Background', 'plugin-name' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .cta-section-eight .content .play-box',
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $video_bg  = $settings['video_bg']['url'];
            $subheading  = $settings['subheading'];
            $mainheading  = $settings['mainheading'];
            $videolink  = $settings['videolink'];

        ?>

            <!-- CTA Section Eight -->
			<section class="cta-section-eight" style="background-image: url(<?php echo esc_url($video_bg);?>)">
				<div class="auto-container">
					<div class="content">
						<div class="title"><?php echo esc_html($subheading);?></div>
						<h2><?php echo __($mainheading);?></h2>
						<a href="<?php echo esc_html($videolink);?>" class="lightbox-image play-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
					</div>
				</div>
			</section>
			<!-- End CTA Section Eight -->
      <?php

              }

      }
