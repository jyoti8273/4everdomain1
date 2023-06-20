<?php

    class con_cta extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_cta';
        }

        public function get_title() {
            return __( 'Consulting CTA', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-call-to-action';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta__content',
                [
                    'label' => __( 'CTA Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                ]
            );   
            $this->add_control(
                'form_id', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );   
            $this->add_control(
                'cta_img', [
                    'label'       => esc_html__( 'CTA Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );   
            
            $this->end_controls_section();

            $this->start_controls_section(
                'cta_style',
                [
                    'label' => esc_html__( 'CTA Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'c_title',
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
                        '{{WRAPPER}} .signup-section .contact-wrapper h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .signup-section .contact-wrapper h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '30',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'btn_color',
                [
                    'label'     => esc_html__( 'Button Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .signup-section .contact-wrapper .signupForm .form-wrapper .subscribeBtn.btn-primary' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'desc__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .signup-section .contact-wrapper .signupForm .form-wrapper .subscribeBtn.btn-primary',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $title        = $settings['title'];
            $form_id      = $settings['form_id'];
            $cta_img      = $settings['cta_img'];

        ?>

        <section class="signup-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-7">
                        <div class="contact-wrapper">
                            <h3><?php echo __($title);?></h3>
                            <div class="signupForm">
                                <div class="form-wrapper">
                                    <?php echo do_shortcode( $form_id );?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5 hidden-xs">
                        <div class="caption text-right wow slideInRight">
                            <img src="<?php echo esc_url($cta_img['url']);?>" alt="<?php echo esc_attr($cta_img['alt']);?>">
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
