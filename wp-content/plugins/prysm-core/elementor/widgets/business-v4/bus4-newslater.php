<?php

    class bus4_newslater_widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_newslater_widget';
        }

        public function get_title() {
            return __( 'Business V4 Newslater', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta_section',
                [
                    'label' => __( 'CTA Contetn', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'newslater_img', [
                    'label'       => esc_html__( 'Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            ); 
            $this->add_control(
                'formcode', [
                    'label'       => esc_html__( 'Form Shortcode', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            ); 

            $this->end_controls_section();

            $this->start_controls_section(
                'featr_style',
                [
                    'label' => __( 'Service Style Section', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                '_sub_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsletter-section-two .form-column h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .newsletter-section-two .form-column h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '40',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'box_bg_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box BG Color Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'box_bg',
                [
                    'label'     => esc_html__( 'Box Background', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsletter-section-two .inner-container' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'elail_icon',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsletter-form-two .form-group .icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'btn_bg_color',
                [
                    'label'     => esc_html__( 'Box Background', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .newsletter-form-two .form-group .submit-btn' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_t_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .newsletter-form-two .form-group .submit-btn',
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $newslater_img     = $settings['newslater_img']['url'];
            $maintitle      = $settings['maintitle'];
            $formcode      = $settings['formcode'];

        ?>  
        <!-- Newsletter Section Two -->
        <section class="newsletter-section-two">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="row clearfix">
                    
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="<?php echo esc_url($newslater_img);?>" alt="" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Column -->
                        <div class="form-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <h3><?php echo __($maintitle);?></h3>
                                <!-- Newsletter Form -->
                                <div class="newsletter-form-two">
                                    <?php echo do_shortcode( $formcode );?>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Newsletter Section Two -->
      <?php
     }

      }
