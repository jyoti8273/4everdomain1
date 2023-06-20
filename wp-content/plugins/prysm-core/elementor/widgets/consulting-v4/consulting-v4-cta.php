<?php

    class constv4_cta_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_cta_section';
        }

        public function get_title() {
            return __( 'Consulting V4 CTA', 'prysm' );
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
                'icon_img',
                [
                    'label' => __( 'Icon Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
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
            
            $this->end_controls_section();

            $this->start_controls_section(
                'cta_style',
                [
                    'label' => esc_html__( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'button__style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-eighteen',
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
                    'label' => esc_html__( 'Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-eighteen' => 'color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg_color',
                [
                    'label' => esc_html__( 'Button BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-eighteen' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_hover_bg_color',
                [
                    'label' => esc_html__( 'Button Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-eighteen:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'cta__title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Cta Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .cta-section-six .title-column h3',
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
                'cta_title_color',
                [
                    'label' => esc_html__( 'CTA Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-section-six .title-column h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'cta_bg_color',
                [
                    'label' => esc_html__( 'CTA BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-section-six' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $title      = $settings['title'];
            $btn_label      = $settings['btn_label'];
            $btn_link      = $settings['btn_link'];
            

        ?>
        <!-- CTA Section Six -->
        <section class="cta-section-six">
            <div class="container">
                <div class="row clearfix">
                
                    <!-- Title Column -->
                    <div class="title-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <h3><?php echo esc_html($title);?></h3>
                        </div>
                    </div>
                    
                    <!-- Button Column -->
                    <div class="button-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-eighteen"><span class="txt"><?php echo esc_html($btn_label);?></span></a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End CTA Section Six -->
      <?php

              }

      }
