<?php

    class ag2_pricing_table_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_pricing_table_section';
        }

        public function get_title() {
            return __( 'Agency Two Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-price-list';
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
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'heading', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );            
            $this->add_control(
                'heading_colord', [
                    'label'       => esc_html__( 'Color Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
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
                'icon', [
                    'label'       => esc_html__( 'ICON', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::ICONS,
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
                'pricing_heading_style',
                [
                    'label' => esc_html__( 'Pricing Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'sub_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_h_color',
                [
                    'label'     => esc_html__( 'Sub Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine .title',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'heading_color',
                [
                    'label'     => esc_html__( 'Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hdd_clr_text_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'colored_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Colored Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'colord_title_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2 span' => 'color: {{VALUE}} ',
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
                    'selector'       => '{{WRAPPER}} .price-block-five .inner-box .upper-box h5',
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
                'p_title_color',
                [
                    'label' => esc_html__( 'Pricing Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-five .inner-box .upper-box h5' => 'color: {{VALUE}}',
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
                    'selector'       => '{{WRAPPER}} .price-block-five .inner-box .price',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '52',
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
                        '{{WRAPPER}} .price-block-five .inner-box .price' => 'color: {{VALUE}}',
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
                    'selector'       => '{{WRAPPER}} .btn-style-twentythree',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                        '{{WRAPPER}} .btn-style-twentythree .txt' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'btn_background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .btn-style-twentythree',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'btn_hover_background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .btn-style-twentythree:before',
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
                    'selector'       => '{{WRAPPER}} .price-block-five .inner-box .lower-box .price-list li',
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
                'p_list_color',
                [
                    'label' => esc_html__( 'Pricing List Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-five .inner-box .lower-box .price-list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .price-block-five .inner-box .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'section_bg_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section BG Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_style_bg',
                [
                    'label' => esc_html__( 'Section BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pricing-section-four' => 'background-color: {{VALUE}}',
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

            $heading        = $settings['heading'];
            $sub_heading    = $settings['sub_heading'];
            $heading_colord = $settings['heading_colord'];
            

        ?>
            <!-- Pricing Section Four -->
			<section class="pricing-section-four" style="background-image: url(<?php echo esc_url($pricing_bg['url']);?>)">
				<div class="auto-container">
					<div class="sec-title-nine centered">
						<div class="title"><?php echo esc_html($sub_heading);?></div>
						<h2><?php echo esc_html($heading);?> <span><?php echo esc_html($heading_colord);?></span></h2>
					</div>
					<div class="row clearfix">
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
                        

                        ?>						
						<!-- Price Block Five -->
						<div class="price-block-five col-lg-4 col-md-6 col-sm-12">
							<div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="upper-box">
									<div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
									<h5><?php the_title();?></h5>
									<div class="price"><?php echo esc_attr($price_symble);?><?php echo esc_attr($monthly_price);?></div>
								</div>
								<div class="lower-box">
									<ul class="price-list">
                                        <?php foreach($pricing_lists as $list):?>
										    <li><?php echo esc_html($list['pricing_item']);?></li>
                                        <?php endforeach;?>
									</ul>
									<div class="button-box">
										<a href="<?php echo esc_url($pricing_link);?>" class="theme-btn btn-style-twentythree"><span class="txt"><?php echo esc_html($pricing_button);?></span></a>
									</div>
								</div>
							</div>
						</div>
						<?php } wp_reset_query(); } ?>
					</div>
				</div>
			</section>
			<!-- End Pricing Section Four -->
      <?php

              }

      }
