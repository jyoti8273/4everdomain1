<?php

    class ag2_main_about extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_main_about';
        }

        public function get_title() {
            return __( 'Agency Two About', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'about__content',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'heading', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );            
            $this->add_control(
                'heading_tx_color', [
                    'label'       => esc_html__( 'Color Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );            
            $this->add_control(
                'infos_bold', [
                    'label'       => esc_html__( 'Heading Info Bold', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'infos', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'about_img', [
                    'label'       => esc_html__( 'About Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'video_link', [
                    'label'       => esc_html__( 'Video Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'shapoe_pbackground',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .about-section-four .image-column .image:before',
                ]
            );
            $this->add_control(
                'button_text', [
                    'label'       => esc_html__( 'Button Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'about_style',
                [
                    'label' => esc_html__( 'About Style', 'prysm' ),
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
                'sub_h_color',
                [
                    'label'     => esc_html__( 'Sub Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine .title',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'heading_color',
                [
                    'label'     => esc_html__( 'Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hdd_clr_text_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'info_item_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'info_item_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-four .content-column .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_item_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .about-section-four .content-column .text',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'info_bold_item_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Bold Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'info_b_item_clr',
                [
                    'label'     => esc_html__( 'Bold Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-four .content-column .bold-text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_b_item_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .about-section-four .content-column .bold-text',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'btn_video_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Video Btn Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'video_btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .about-section-four .image-column .play-box',
                ]
            );
            $this->end_controls_section();
            

            $this->start_controls_section(
                'button__content',
                [
                    'label' => __( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-twentythree .txt',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->start_controls_tabs( '_banner_button_1' );
            $this->start_controls_tab(
                '_prysm_btn__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-twentythree .txt' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-twentythree',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentythree' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentythree' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-twentythree .txt:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-twentythree:before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentythree .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .btn-style-twentythree .txt:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentythree:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $about_img    = $settings['about_img']['url'];
            $infos        = $settings['infos'];
            $infos_bold        = $settings['infos_bold'];
            $video_link        = $settings['video_link'];
            $heading      = $settings['heading'];
            $heading_tx_color      = $settings['heading_tx_color'];
            $sub_heading  = $settings['sub_heading'];
            $button_text  = $settings['button_text'];
            $button_link  = $settings['button_link'];

        ?>  
        
        <!-- About Section Four -->
        <section class="about-section-four">
            <div class="container">
                <div class="row clearfix">
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo esc_url($about_img);?>" alt="" />
                                <a href="<?php echo esc_url($video_link);?>" class="lightbox-image play-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-nine">
                                <div class="title"><?php echo esc_html($sub_heading);?></div>
                                <h2><?php echo __($heading);?> <span><?php echo __($heading_tx_color);?></span></h2>
                            </div>
                            <div class="bold-text"><?php echo __($infos_bold);?></div>
                            <div class="text"><?php echo __($infos);?></div>
                            <!-- Button Box -->
                            <div class="button-box">
                                <a href="<?php echo esc_url($button_link['url']);?>" class="theme-btn btn-style-twentythree"><span class="txt"><?php echo esc_html($button_text);?></span></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End About Section Four -->
      <?php

              }

      }
