<?php

    class constv3_video_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_video_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Video', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'video_content',
                [
                    'label' => __( 'video Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'video_bg_img',
                [
                    'label' => __( 'video Bg', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'video_title',
                [
                    'label' => __( 'Video Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'video_title2',
                [
                    'label' => __( 'Video Title2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'video_link',
                [
                    'label' => __( 'video Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'video_style',
                [
                    'label' => esc_html__( 'video Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'subtitle_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'video_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .video-section .image .overlay-box h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-section .image .overlay-box h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'sub_title_bg_color',
                [
                    'label' => esc_html__( 'Title BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-section .image .overlay-box h3' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'video_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'video Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'video_bg_color',
                [
                    'label' => esc_html__( 'Video Button BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .video-section .image .overlay-box .play-box' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $video_bg_img   = $settings['video_bg_img'];
            $video_title    = $settings['video_title'];
            $video_title2   = $settings['video_title2'];
            $video_link     = $settings['video_link'];
            

        ?>
        <!-- Video Section -->
        <section class="video-section">
            <div class="container">
                <div class="image titlt" data-tilt data-tilt-max="1">
                    <img src="<?php echo esc_url( $video_bg_img['url'] );?>" alt="" />
                    <div class="overlay-box">
                        <div class="content">
                            <h3><?php echo esc_html($video_title);?></h3>
                            <h3><?php echo esc_html($video_title2);?></h3>
                        </div>
                        <a href="<?php echo esc_url($video_link);?>" class="lightbox-image play-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Video Section -->
      <?php

              }

      }
