<?php

    class mgv2_pricing_table_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_pricing_table_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'content_table_list',
                [
                    'label' => __( 'Content Table List', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'pricing_bg',
                [
                    'label' => __( 'Pricing BG', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'pricing_count', [
                    'label'       => esc_html__( 'Pricing Count', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );        
            $this->add_control(
                'pricing_order', [
                    'label'   => esc_html__( 'Pricing Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'pricing_title_style',
                [
                    'label' => esc_html__( 'Pricing Title Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'pricing_title_s_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_ttil_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-three .price-column h3',
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
                'p_title_color',
                [
                    'label' => esc_html__( 'Pricing Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .price-column h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'p_price_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Price Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-three .price-column .price',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
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
                'p_price_color',
                [
                    'label' => esc_html__( 'Price Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .price-column .price' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'btn_style_p',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_pricing_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-three .price-column .purchase-btn',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'p_btn_color',
                [
                    'label' => esc_html__( 'Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .price-column .purchase-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'p_btn_bg_color',
                [
                    'label' => esc_html__( 'Button BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .price-column .purchase-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'p_btn_bg_hover_color',
                [
                    'label' => esc_html__( 'Button Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .price-column .purchase-btn:hover' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'pricing_footer_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Footer Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_footer_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-three .price-column .apply',
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
                'p_f_text_color',
                [
                    'label' => esc_html__( 'Pricing Footer Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .price-column .apply' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .price-block-three .price-column .apply',
                ]
            );
            $this->add_control(
                'pricing_right_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Right Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_right_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block-three .content-column h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '44',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'p_r_text_color',
                [
                    'label' => esc_html__( 'Pricing Right Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .content-column h2' => 'color: {{VALUE}}',
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
                    'selector'       => '{{WRAPPER}} .price-block-three .content-column .check li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'p_list_color',
                [
                    'label' => esc_html__( 'Pricing List Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .content-column .check li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'p_list_check_color',
                [
                    'label' => esc_html__( 'Pricing List Check Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-three .content-column .check li:before' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $pricing_bg   = $settings['pricing_bg'];
            $pricing_count   = $settings['pricing_count'];
            $pricing_order   = $settings['pricing_order'];
            

        ?>
            <!-- Pricing Section Two -->
            <section class="pricing-section-two">
                <div class="container">
                    <div class="inner-container">
                        <div class="image-layer" style="background-image: url(<?php echo esc_url($pricing_bg['url']);?>)"></div>
                        <div class="single-item-carousel owl-carousel owl-theme">
                            
                        <?php

                        $args = array(
                            'post_type'      => array( 'pricing_table' ),
                            'post_status'    => 'publish',
                            'posts_per_page' => $pricing_count,
                            'order'          => $pricing_order,
                        );

                        $query = new  \WP_Query($args);

                        if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        $query->the_post();
                        $idd = get_the_ID();

                        if(get_post_meta($idd, 'prysm_pricepost', true)) {
                            $pricing_meta = get_post_meta(get_the_ID(), 'prysm_pricepost', true);
                        } else {
                            $pricing_meta = array();
                        }

                        if( array_key_exists( 'monthly_price', $pricing_meta )) {
                            $monthly_price = $pricing_meta['monthly_price'];
                        } else {
                            $monthly_price = '';
                        }
                        if( array_key_exists( 'price_symble', $pricing_meta )) {
                            $price_symble = $pricing_meta['price_symble'];
                        } else {
                            $price_symble = '';
                        }
                        if( array_key_exists( 'pricing_lists', $pricing_meta )) {
                            $pricing_lists = $pricing_meta['pricing_lists'];
                        } else {
                            $pricing_lists = array();
                        }
                        if( array_key_exists( 'pricing_button', $pricing_meta )) {
                            $pricing_button = $pricing_meta['pricing_button'];
                        } else {
                            $pricing_button = '';
                        }
                        if( array_key_exists( 'pricing_link', $pricing_meta )) {
                            $pricing_link = $pricing_meta['pricing_link'];
                        } else {
                            $pricing_link = '';
                        }
                        if( array_key_exists( 'pricing_shape_img', $pricing_meta )) {
                            $pricing_shape_img = $pricing_meta['pricing_shape_img'];
                        } else {
                            $pricing_shape_img = '';
                        }
                        if( array_key_exists( 'pricing_shape2_img', $pricing_meta )) {
                            $pricing_shape2_img = $pricing_meta['pricing_shape2_img'];
                        } else {
                            $pricing_shape2_img = '';
                        }
                        if( array_key_exists( 'month_preod', $pricing_meta )) {
                            $month_preod = $pricing_meta['month_preod'];
                        } else {
                            $month_preod = '';
                        }
                        if( array_key_exists( 'bill_text', $pricing_meta )) {
                            $bill_text = $pricing_meta['bill_text'];
                        } else {
                            $bill_text = '';
                        }
                        if( array_key_exists( 'taxes_text', $pricing_meta )) {
                            $taxes_text = $pricing_meta['taxes_text'];
                        } else {
                            $taxes_text = '';
                        }
                        if( array_key_exists( 'notice_text', $pricing_meta )) {
                            $notice_text = $pricing_meta['notice_text'];
                        } else {
                            $notice_text = '';
                        }


                        ?>
                            <!-- Price Block Three -->
                            <div class="price-block-three">
                                <div class="inner-box">
                                    <div class="row clearfix">
                                    
                                        <!-- Price Column -->
                                        <div class="price-column col-lg-5 col-md-12 col-sm-12">
                                            <div class="inner-column">
                                                <div class="upper-box">
                                                    <h3><?php the_title();?></h3>
                                                    <div class="price"><sup><?php echo esc_attr($price_symble);?></sup><?php echo esc_attr($monthly_price);?><sub>/<?php echo esc_html($month_preod);?></sub></div>
                                                    <div class="text"><?php echo esc_html($bill_text);?></div>
                                                    <a href="<?php echo esc_url($pricing_link['url']);?>" class="theme-btn purchase-btn"><?php echo esc_html($pricing_button);?></a>
                                                </div>
                                                <span class="apply"><?php echo esc_html($taxes_text);?></span>
                                            </div>
                                        </div>
                                        
                                        <!-- Content Column -->
                                        <div class="content-column col-lg-7 col-md-12 col-sm-12">
                                            <div class="inner-column">
                                                <h2><?php echo esc_html($notice_text);?></h2>
                                                <ul class="check">
                                                    <?php foreach($pricing_lists as $list):?>
                                                    <li><?php echo esc_html($list['pricing_item']);?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php } wp_reset_query(); } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Pricing Section Two -->
      <?php

              }

      }
