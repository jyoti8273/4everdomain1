<?php

    class constv4_cta2_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_cta2_section';
        }

        public function get_title() {
            return __( 'Consulting V4 CTA 2', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta_content',
                [
                    'label' => __( 'CTA Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'cta_bg',
                [
                    'label' => __( 'CTA BG Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
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
                'btn_link',
                [
                    'label' => __( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'btn_label2',
                [
                    'label' => __( 'Button 2 Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'btn_link2',
                [
                    'label' => __( 'Button 2 Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
            
            $this->end_controls_section();

            $this->start_controls_section(
                'cta_style',
                [
                    'label' => esc_html__( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'subtitle_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Subtitle Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_sub_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven .title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'about_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'button_1_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button 1 Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-fifteen',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'btn_color',
                [
                    'label' => esc_html__( 'Button 1 Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fifteen' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg_color',
                [
                    'label' => esc_html__( 'Button 1 BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fifteen' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_hover_bg_color',
                [
                    'label' => esc_html__( 'Button 1 Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fifteen:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'button_2_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button 2 Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn-2_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-sixteen',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'btn_2color',
                [
                    'label' => esc_html__( 'Button 2 Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-sixteen' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg2_color',
                [
                    'label' => esc_html__( 'Button 2 BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-sixteen' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn2_hover_bg_color',
                [
                    'label' => esc_html__( 'Button 2 Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-sixteen:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $cta_bg      = $settings['cta_bg'];
            $subtitle      = $settings['subtitle'];
            $title      = $settings['title'];
            $btn_label      = $settings['btn_label'];
            $btn_link      = $settings['btn_link'];

            $btn_label2      = $settings['btn_label2'];
            $btn_link2      = $settings['btn_link2'];
            

        ?>
       <!-- CTA Section Five -->
        <section class="cta-section-five" style="background-image:url(<?php echo esc_url($cta_bg['url']);?>)">
            <div class="auto-container">
                
                <!-- Sec Title -->
                <div class="sec-title-seven light centered">
                    <div class="title"><?php echo esc_html($subtitle);?></div>
                    <h2><?php echo __($title);?></h2>
                </div>
                
                <!-- Buttons Box -->
                <div class="buttons-box text-center">
                    <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-fifteen"><span class="txt"><?php echo esc_html($btn_label);?></span></a>
                    <a href="<?php echo esc_url($btn_link2['url']);?>" class="theme-btn btn-style-sixteen"><span class="txt"><?php echo esc_html($btn_label2);?></span></a>
                </div>
                <!-- End Buttons Box -->
                
            </div>
        </section>
        <!-- End CTA Section Five -->
      <?php

              }

      }
