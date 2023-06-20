<?php

    class finance_video_banner extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_video_banner';
        }

        public function get_title() {
            return __( 'Finance Video Banner', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-slider-video';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'list_icon_infos',
                [
                    'label' => __( 'Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'video_link', [
                    'label'       => esc_html__( 'Video URL', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            $this->add_control(
                'arrow_img',
                [
                    'label' => __( 'Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'feature_style',
                [
                    'label' => esc_html__( 'Content Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'sub_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_title_bg_color',
                [
                    'label'     => esc_html__( 'Sub Title BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-skills-section .pr6-skills-top .pr6-title-area .pr6-subtitle' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-subtitle',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_content_style',
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
                        '{{WRAPPER}} .pr6-skills-section .pr6-skills-top .pr6-title-area .pr6-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-skills-section .pr6-skills-top .pr6-title-area .pr6-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $arrow_img      = $settings['arrow_img']['url'];
            $video_link     = $settings['video_link'];

        ?>
        <section class="pr6-skills-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="pr6-skills-top">
                            <div class="pr6-title-area text-center wow fadeInUp">
                                <span class="pr6-subtitle"><?php echo esc_html($sub_title);?></span>
                                <div class="pr6-headline">
                                    <h3><?php echo __($title);?></h3>
                                </div>
                            </div>
                            <div class="pr6-video-btn wow fadeInUp" data-wow-delay="0.2s">
                                <span class="pr6-arrow-shape"><img src="<?php echo esc_url($arrow_img);?>" alt=""></span>
                                <div class="pr6-vd-btn">
                                    <a href="<?php echo esc_url($video_link['url']);?>"><i class="fas fa-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
