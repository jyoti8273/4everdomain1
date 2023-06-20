<?php

    class constv4_choose_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_choose_section';
        }

        public function get_title() {
            return __( 'Consulting V4 Choose', 'prysm' );
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
                'shape',
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
                'about_bg_img',
                [
                    'label' => __( 'About Image 1', 'prysm' ),
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

            $repeater = new \Elementor\Repeater(); 
                   
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'description',
                [
                    'label' => __( 'Content', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );         
            
            $this->add_control(
                'chooseitems',
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
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
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
                'icon_box_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_tx_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .choose-block .inner-box h6',
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
                'icon_box_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-block .inner-box h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_box_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Box Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'icon_box_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .choose-block .inner-box .text',
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
                'icon_box_text',
                [
                    'label' => esc_html__( 'Icon Box Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .choose-block .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $shape   = $settings['shape'];
            $shape2   = $settings['shape2'];
            $choose_bg_img   = $settings['about_bg_img'];
            
            $subtitle      = $settings['subtitle'];
            $title         = $settings['title'];

            $chooseitems      = $settings['chooseitems'];
            

        ?>
        <!-- Choose Section -->
        <section class="choose-section">
            <div class="pattern-layer" style="background-image: url(<?php echo esc_url($shape['url']);?>)"></div>
            <div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($shape2['url']);?>)"></div>
            <div class="container">
                <div class="row clearfix">
                
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="circle-layer"></div>
                            <div class="image">
                                <img src="<?php echo esc_url($choose_bg_img['url']);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-seven">
                                <div class="title"><?php echo esc_html($subtitle);?></div>
                                <h2><?php echo __($title);?></h2>
                            </div>

                            <?php foreach($chooseitems as $item):?>
                            <!-- Choose Block -->
                            <div class="choose-block">
                                <div class="inner-box">
                                    <div class="icon flaticon-checked"></div>
                                    <h6><?php echo esc_html($item['title']);?></h6>
                                    <div class="text"><?php echo esc_html($item['description']);?></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Choose Section -->
      <?php

              }

      }
