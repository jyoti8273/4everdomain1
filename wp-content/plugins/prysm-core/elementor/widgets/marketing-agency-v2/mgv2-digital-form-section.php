<?php

    class mgv2_digital_form_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_digital_form_section';
        }

        public function get_title() {
            return __( 'Digital Form', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'about_content',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'form_bg',
                [
                    'label' => __( 'Form BG', 'prysm' ),
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
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'sponsors',
                [
                    'label' => __( 'sponsors Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'form_id',
                [
                    'label' => __( 'Form ID', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
           
            $this->end_controls_section();

            $this->start_controls_section(
                'about_style',
                [
                    'label' => esc_html__( 'about Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'digital_sub-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'serv_sub_title_color',
                [
                    'label' => esc_html__( 'digital Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'digital_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '50',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_title_color',
                [
                    'label' => esc_html__( 'digital Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'mgv2_btn_style',
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
                    'selector'       => '{{WRAPPER}} .btn-style-thirteen',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                'mgv2_btn_color',
                [
                    'label' => esc_html__( 'Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-thirteen' => 'color: {{VALUE}} !important' ,
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-thirteen',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background_hover',
                    'label' => esc_html__( 'Background Hover', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-thirteen:before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'form_background_hover',
                    'label' => esc_html__( 'Background Hover', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .digital-form:before',
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $form_bg   = $settings['form_bg'];

            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];
            $description   = $settings['description'];
            $sponsors   = $settings['sponsors'];
            $form_id   = $settings['form_id'];
            

        ?>
        <!-- Digital Form Section -->
        <section class="digital-form-section" style="background-image: url(<?php echo esc_url($form_bg['url']);?>)">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Form Column -->
                    <div class="form-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Digital Form -->
                            <div class="digital-form">
                                <?php echo do_shortcode( $form_id );?>
                            </div>
                            <!-- End Consult Form -->
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-six">
                                <div class="title"><?php echo esc_html($subtitle);?> </div>
                                <h2><?php echo esc_html($title);?></h2>
                                <div class="text"><?php echo esc_html($description);?></div>
                            </div>
                            <div class="sponsors">
                                <img src="<?php echo esc_url($sponsors['url']);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Digital Form Section -->
      <?php

              }

      }
