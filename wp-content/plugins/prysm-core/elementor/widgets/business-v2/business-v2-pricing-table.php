<?php

    class business2_pricing_table_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business2_pricing_table_section';
        }

        public function get_title() {
            return __( 'Business V2 Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'pricing_content',
                [
                    'label' => __( 'Pricing Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );            

            $this->add_control(
                'pattern1',
                [
                    'label' => __( 'Pattern 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'pattern2',
                [
                    'label' => __( 'Pattern 2', 'prysm' ),
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
                'active',
                [
                    'label' => esc_html__( 'Active', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'YES', 'prysm' ),
                    'label_off' => esc_html__( 'NO', 'prysm' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'package_text', [
                    'label'       => esc_html__( 'Package Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'price', [
                    'label'       => esc_html__( 'Price', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'preiod', [
                    'label'       => esc_html__( 'Preiod', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'pricing_list', [
                    'label'       => esc_html__( 'Pricing List', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Btn Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'btn_link', [
                    'label'       => esc_html__( 'Btn Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
                       
            $this->add_control(
                'pricingtable',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'pricing_top_heading_style',
                [
                    'label' => esc_html__( 'Pricing Top Heading Style', 'prysm' ),
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
                    'name'           => 'subtitle_style',
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
                'title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
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
                'pricing_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_title_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-four .inner-box .upper-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '24',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'pricing_title_color',
                [
                    'label' => esc_html__( 'Pricing Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four .inner-box .upper-box h4' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_active_title_color',
                [
                    'label' => esc_html__( 'Pricing Active Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four.active .inner-box .upper-box h4' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Package Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_package_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-four .inner-box .upper-box .off',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '14',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'pricing_package_color',
                [
                    'label' => esc_html__( 'Pricing Package Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four .inner-box .upper-box .off' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_active_package_color',
                [
                    'label' => esc_html__( 'Pricing Active Package Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four.active .inner-box .upper-box .off' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_price_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Price Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_price_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-four .inner-box .price',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '800',
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
                'pricing_price_color',
                [
                    'label' => esc_html__( 'Pricing Price Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four .inner-box .price' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_active_price_color',
                [
                    'label' => esc_html__( 'Pricing Active Price Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four.active .inner-box .price' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_list_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-four .inner-box .lower-box .price-list li',
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
                'pricing_list_color',
                [
                    'label' => esc_html__( 'Pricing Price Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four .inner-box .lower-box .price-list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_active_bg_color',
                [
                    'label' => esc_html__( 'Pricing List Active BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four.active .inner-box .lower-box' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-four .inner-box .button-box .buy-btn',
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
                'pricing_btn_border_color',
                [
                    'label' => esc_html__( 'Pricing Border Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four .inner-box .button-box .buy-btn' => 'border-color: {{VALUE}} !important',
                    ],
                ]
            );
            $this->add_control(
                'pricing_btn_bg_color',
                [
                    'label' => esc_html__( 'Pricing Button BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four .inner-box .button-box .buy-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_box_active_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Box Active Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
           
            $this->add_control(
                'pricing_box_active_bg_clr',
                [
                    'label' => esc_html__( 'Box Active BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-four.active .inner-box' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $pattern1   = $settings['pattern1'];
            $pattern2   = $settings['pattern2'];
            
            $subtitle    = $settings['subtitle'];
            $title    = $settings['title'];

            $pricingtable    = $settings['pricingtable'];
            
            

        ?>
        <!-- Pricing Section Three -->
        <section class="pricing-section-three">
            <div class="pattern-layers">
                <div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern1['url']);?>)"></div>
                <div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2['url']);?>)"></div>
            </div>
            <div class="auto-container">
                <div class="sec-title-seven style-two centered">
                    <div class="title"><?php echo esc_html($subtitle);?></div>
                    <h2><?php echo esc_html($title);?></h2>
                </div>
                <div class="row clearfix">
                
                    <?php foreach($pricingtable as $item):?> 
                    <!-- Price Block Four -->
                    <div class="price-block-four <?php if( 'yes' == $item['active']){echo esc_html('active');}?>  col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="upper-box">
                                <h4><?php echo esc_html($item['title']);?></h4>
                                <div class="off"><?php echo esc_html($item['package_text']);?></div>
                            </div>
                            <div class="price"><?php echo esc_html($item['price']);?> <sub>/ <?php echo esc_html($item['preiod']);?></sub></div>
                            <div class="lower-box">
                                <?php echo $item['pricing_list'];?>
                                <div class="button-box">
                                    <a href="<?php echo esc_html($item['btn_link']['url']);?>" class="theme-btn buy-btn"><?php echo esc_html($item['btn_label']);?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Pricing Section Three -->
      <?php

              }

      }
