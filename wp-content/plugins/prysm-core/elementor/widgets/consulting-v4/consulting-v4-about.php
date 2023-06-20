<?php

    class constv4_about_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_about_section';
        }

        public function get_title() {
            return __( 'Consulting V4 About', 'prysm' );
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
                'about_bg_img2',
                [
                    'label' => __( 'About Image 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'about_bg_img3',
                [
                    'label' => __( 'About Image 3', 'prysm' ),
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

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'icon_img',
                [
                    'label' => __( 'Icon Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );   
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .feature-block-three .inner-box .icon',
                ]
            );       
            $repeater->add_control(
                'f_title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'f_content',
                [
                    'label' => __( 'Content', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'f_link',
                [
                    'label' => __( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'featuresitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ f_title }}}',
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
                'about_text_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'about Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_tx_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven .text',
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
                'ab_text_color',
                [
                    'label' => esc_html__( 'List Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_feature_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Feature Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_fa-title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-three .inner-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '22',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'ab_f_title_color',
                [
                    'label' => esc_html__( 'Feature Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-three .inner-box h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'ab_fa-title_hover_color',
                [
                    'label' => esc_html__( 'Feature Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-three .inner-box h5 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'about_fa-text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-three .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'ab_f_text_color',
                [
                    'label' => esc_html__( 'Feature Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-three .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_control(
                'about_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'about Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-fourteen',
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
                'about_btn_clr',
                [
                    'label' => esc_html__( 'about Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fourteen' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_btn_hover_clr',
                [
                    'label' => esc_html__( 'about Button Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-fourteen:before' => 'background: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $shape   = $settings['shape'];
            $shape2   = $settings['shape2'];
            $about_bg_img   = $settings['about_bg_img'];
            $about_bg_img2   = $settings['about_bg_img2'];
            $about_bg_img3   = $settings['about_bg_img3'];
            
            $subtitle      = $settings['subtitle'];
            $title         = $settings['title'];
            $description   = $settings['description'];

            $btn_label      = $settings['btn_label'];
            $btn_link       = $settings['btn_link'];

            $featuresitems      = $settings['featuresitems'];
            

        ?>
        <!-- Company Section -->
        <section class="company-section">
            <div class="container">
                <div class="row clearfix">
                
                    <!-- Image Column -->
                    <div class="images-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="icon-layer" style="background-image: url(<?php echo esc_url($shape['url']);?>)"></div>
                            <div class="icon-layer-two" style="background-image: url(<?php echo esc_url($shape2['url']);?>)"></div>
                            <div class="image">
                                <img src="<?php echo esc_url($about_bg_img['url']);?>" alt="" />
                            </div>
                            <div class="image-two">
                                <img src="<?php echo esc_url($about_bg_img2['url']);?>" alt="" />
                            </div>
                            <div class="image-three">
                                <img src="<?php echo esc_url($about_bg_img3['url']);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-seven">
                                <div class="title"><?php echo esc_html($subtitle);?> </div>
                                <h2><?php echo esc_html($title);?></h2>
                                <div class="text"><?php echo esc_html($description);?></div>
                            </div>
                            <div class="blocks-outer">
                                <?php foreach($featuresitems as $item):?>
                                <!-- Feature Block Three -->
                                <div class="feature-block-three">
                                    <div class="inner-box">
                                        <div class="icon"><img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="" /></div>
                                        <h5><a href="<?php echo esc_url($item['f_link']);?>"><?php echo esc_html($item['f_title']);?></a></h5>
                                        <div class="text"><?php echo esc_html($item['f_content']);?></div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                
                            </div>
                            
                            <div class="btns-box">
                                <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-fourteen"><span class="txt"><?php echo esc_html($btn_label);?></span></a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Company Section -->
      <?php

              }

      }
