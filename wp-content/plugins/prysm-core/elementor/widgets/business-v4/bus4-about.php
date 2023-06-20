<?php

    class bus4_about_widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_about_widget';
        }

        public function get_title() {
            return __( 'Business V4 About', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'about_section',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'section_bg', [
                    'label'       => esc_html__( 'Section BG Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'aboutimg1', [
                    'label'       => esc_html__( 'About Image 1', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'aboutimg2', [
                    'label'       => esc_html__( 'About Image 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'aboutimg3', [
                    'label'       => esc_html__( 'About Image 3', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'count', [
                    'label'       => esc_html__( 'Count', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'mission_img', [
                    'label'       => esc_html__( 'Mission Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'mission_title', [
                    'label'       => esc_html__( 'Mission Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'mission_txt', [
                    'label'       => esc_html__( 'Mission Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            
            $this->end_controls_section();

            $this->start_controls_section(
                'about_style',
                [
                    'label' => __( 'About Style Section', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'about_count_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Counter Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'counter_clr',
                [
                    'label'     => esc_html__( 'Counter Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-five .content-column .count-outer' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'count_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .about-section-five .content-column .count-outer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '64',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'ab_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_colo',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-five .content-column h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'ab_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .about-section-five .content-column h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'desc_style_stylw',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Description Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'desc_txt_clr',
                [
                    'label'     => esc_html__( 'Desc Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-five .content-column p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'clr_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .about-section-five .content-column p',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'mission_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Mission Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'm_icon_clr',
                [
                    'label'     => esc_html__( 'Mission Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-five .content-column .mission .icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'm_box_title_clr',
                [
                    'label'     => esc_html__( 'Mission Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-five .content-column .mission h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'mis_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .about-section-five .content-column .mission h6',
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
            $this->add_control(
                'bg_color_overlay',
                [
                    'label'     => esc_html__( 'BG Overlay Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .about-section-five .content-column .mission:before' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $section_bg     = $settings['section_bg'];
            $aboutimg1      = $settings['aboutimg1'];
            $aboutimg2      = $settings['aboutimg2'];
            $aboutimg3      = $settings['aboutimg3'];
            $count          = $settings['count'];
            $title          = $settings['title'];
            $description          = $settings['description'];
            $mission_title          = $settings['mission_title'];
            $mission_txt          = $settings['mission_txt'];
            $mission_img          = $settings['mission_img'];

        ?>  
        <!-- About Section Five -->
        <section class="about-section-five" style="background-image:url(<?php echo esc_url($section_bg['url']);?>">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="row clearfix">
                                <!-- Column -->
                                <div class="column col-lg-5 col-md-6 col-sm-12">
                                    <div class="image">
                                        <img src="<?php echo esc_url($aboutimg1['url']);?>" alt="" />
                                    </div>
                                    <div class="image">
                                        <img src="<?php echo esc_url($aboutimg2['url']);?>" alt="" />
                                    </div>
                                </div>
                                <!-- Column -->
                                <div class="column col-lg-7 col-md-6 col-sm-12">
                                    <div class="image">
                                        <img src="<?php echo esc_url($aboutimg3['url']);?>" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="upper-box">
                                <div class="count-outer count-box">
                                    <span class="count-text counter" data-speed="3500"><?php echo esc_html($count);?></span>+
                                </div>
                                <h3><?php echo esc_html($title);?></h3>
                            </div>
                            <p><?php echo esc_html($description);?></p>
                            <div class="lower-box">
                                <div class="mission" style="background-image:url(<?php echo esc_url($mission_img['url']);?>)">
                                    <span class="icon fal fa-bullseye-arrow"></span>
                                    <h6><?php echo esc_html($mission_title);?></h6>
                                </div>
                                <p><?php echo esc_html($mission_txt);?></p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End About Section Five -->
      <?php

              }

      }
