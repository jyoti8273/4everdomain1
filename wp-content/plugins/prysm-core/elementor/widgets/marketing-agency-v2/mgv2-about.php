<?php

    class mgv2_about_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_about_section';
        }

        public function get_title() {
            return __( 'Marketing V2 About', 'prysm' );
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
                'about_bg_img',
                [
                    'label' => __( 'About Bg', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'shape',
                [
                    'label' => __( 'Shape', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'shape1',
                [
                    'label' => __( 'Shape 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'shape2',
                [
                    'label' => __( 'Shape 2', 'prysm' ),
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
                'counter',
                [
                    'label' => __( 'Counter', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'exptitle',
                [
                    'label' => __( 'Exprience Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'listitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
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
                'about_sub-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Sub Title Style', 'prysm' ),
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
                    'label' => esc_html__( 'About Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
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
                    'label' => esc_html__( 'About Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_-headins_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'serv_text_color',
                [
                    'label' => esc_html__( 'About Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_-list_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-section .content-column .business-list li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '20',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_list_text_color',
                [
                    'label' => esc_html__( 'About List Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section .content-column .business-list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_list_icon_color',
                [
                    'label' => esc_html__( 'About List Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section .content-column .business-list li:before' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_exp_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Exprience Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'exp_number_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-section .content-column .count-box',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '130',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_counter_color',
                [
                    'label' => esc_html__( 'About Counter Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section .content-column .count-box' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_exp_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Exprience Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'exp_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-section .content-column .inner-column h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
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
                'about_exp_title_color',
                [
                    'label' => esc_html__( 'About Exp Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section .content-column .inner-column h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $about_bg_img   = $settings['about_bg_img'];

            $shape   = $settings['shape'];
            $shape1   = $settings['shape1'];
            $shape2   = $settings['shape2'];
            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];
            $description   = $settings['description'];
            $counter   = $settings['counter'];
            $exptitle   = $settings['exptitle'];


            $listitems      = $settings['listitems'];
            

        ?>
        <!-- Digital Section -->
        <section class="digital-section">
            <div class="container">
                <div class="row clearfix">
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo esc_url($about_bg_img['url']);?>" alt="" />
                            </div>
                            <div class="color-layer"></div>
                            <div class="icons-outer parallax-scene-2">
                                <div data-depth="0.20" class="color-layer-two"></div>
                                <div data-depth="0.30" class="color-layer-three"></div>
                                <div data-depth="0.50" class="icon-one">
                                    <img src="<?php echo esc_url($shape['url']);?>" alt="" />
                                </div>
                                <div data-depth="0.20" class="icon-two">
                                    <img src="<?php echo esc_url($shape1['url']);?>" alt="" />
                                </div>
                                <div data-depth="0.20" class="icon-three">
                                    <img src="<?php echo esc_url($shape2['url']);?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-six">
                                <div class="title"><?php echo esc_html($subtitle);?> </div>
                                <h2><?php echo __($title);?></h2>
                                <div class="text"><?php echo esc_html($description);?></div>
                            </div>
                            <div class="row clearfix">
                                <!-- Column -->
                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <div class="count-outer count-box">
                                        <span class="count-text counter" data-speed="3500" data-stop="24"><?php echo esc_html($counter);?></span>
                                    </div>
                                    <h3><?php echo __($exptitle);?></h3>
                                </div>
                                <!-- Column -->
                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <ul class="business-list">
                                        <?php foreach($listitems as $item):?>
                                        <li><?php echo esc_html($item['title']);?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Digital Section -->
      <?php

              }

      }
