<?php

    class ag_pricing_table extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_pricing_table';
        }

        public function get_title() {
            return __( 'Agency Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-price-list';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'pricing_table_content',
                [
                    'label' => __( 'Pricing Table', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            
            $this->add_control(
                'vector_img', [
                    'label'       => esc_html__( 'Vector Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'vector_shape', [
                    'label'       => esc_html__( 'Shape Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Pricing Sub Title', 'prysm' ),
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
                'monthly_text', [
                    'label'       => esc_html__( 'Month Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );   
            $this->add_control(
                'yearly_text', [
                    'label'       => esc_html__( 'Yearly Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
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
                    'label' => esc_html__( 'Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'head_sub_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'hed_subtitle_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'br_color',
                [
                    'label'     => esc_html__( 'Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title.middle-align-title span:before, .pr-an-section-title span:after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hed-subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'head__title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'main_heading_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'head_inbfo',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'h_info_color',
                [
                    'label'     => esc_html__( 'Info Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
           
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_info_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'pricing_style',
                [
                    'label' => esc_html__( 'Pricing Style Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'pricing-title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'p_itle_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-price-table h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-price-table h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_price_cur_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Price Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'price_color',
                [
                    'label'     => esc_html__( 'Price Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-value span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-price-table .pr-an-price-value span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_price_preod_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Preod Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'preod_color',
                [
                    'label'     => esc_html__( 'Preod Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-value' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'preod_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-price-table .pr-an-price-value',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_pricing_list_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'pricing_list',
                [
                    'label'     => esc_html__( 'Pricing List Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-list li' => 'color: {{VALUE}} ',
                    ],
                ]
            );    
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-price-table .pr-an-price-list li',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );       
            
            $this->end_controls_section();

            $this->start_controls_section(
                'button__content',
                [
                    'label' => __( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->start_controls_tabs( '_banner_button_1' );
            $this->start_controls_tab(
                '_prysm_btn__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr-an-price-table .pr-an-price-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $vector_img     = $settings['vector_img']['url'];
            $vector_shape   = $settings['vector_shape']['url'];
            $pricing_count  = $settings['pricing_count'];
            $pricing_order  = $settings['pricing_order'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $description    = $settings['description'];
            $monthly_text   = $settings['monthly_text'];
            $yearly_text    = $settings['yearly_text'];

        ?>
        <section id="pr-an-pricing" class="pr-an-pricing-section position-relative">
		<span class="pr-an-price-shape1 position-absolute"><img src="<?php echo esc_url($vector_img);?>" alt=""></span>
		<span class="pr-an-price-shape2 position-absolute"><img src="<?php echo esc_url($vector_shape);?>" alt=""></span>
		<div class="container">
			<div class="pr-an-section-title middle-align-title text-center headline pera-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
				<span><?php echo esc_html($sub_title);?></span>
				<h2><?php echo esc_html($title);?></h2>
				<p><?php echo __($description);?></p>
			</div>
			<div class="pr-an-pricing-content">
				<div class="pr-an-pricing-btn ul-li wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
					<ul class="nav nav-pills  text-center text-capitalize" id="pills-tab" role="tablist">
						<li class="nav-item"  role="presentation">
							<a class="nav-link  active"  data-bs-toggle="pill" href="#tb1" role="tab"  aria-selected="true"><?php echo esc_html($monthly_text);?></a>
						</li>
						<li class="nav-item"  role="presentation">
							<a class="nav-link year-btn"  data-bs-toggle="pill" href="#tb2" role="tab"  aria-selected="true"><?php echo esc_html($yearly_text);?></a>
						</li>
					</ul>
				</div>
				<div class="pr-an-price-tab-content">
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade active show" id="tb1" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="row justify-content-center">
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

                            ?>
								<div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
									<div class="pr-an-price-table headline ul-li-block">
										<h3><?php the_title();?></h3>
										<div class="pr-an-price-img">
											<img src="<?php echo esc_url($pricing_shape_img['url']);?>" alt="">
										</div>
										<div class="pr-an-price-value">
											<span><sup><?php echo esc_html($price_symble);?></sup><?php echo esc_html($monthly_price);?>/</span> <?php echo esc_html($month_preod);?>
										</div>
										<div class="pr-an-price-list">
											<ul>
                                                <?php foreach($pricing_lists as $list):?>
                                                    <li><?php echo esc_html($list['pricing_item']);?></li>
                                                <?php endforeach;?>
											</ul>
										</div>
										<div class="pr-an-price-btn">
											<a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url($pricing_link['url']);?>"><?php echo esc_html($pricing_button);?></a>
										</div>
									</div>
								</div>
								<?php } wp_reset_query(); } ?>
							</div>
						</div>
						<div class="tab-pane fade" id="tb2" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="row justify-content-center">
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

                            if( array_key_exists( 'yearly_price', $pricing_meta )) {
                                $yearly_price = $pricing_meta['yearly_price'];
                            } else {
                                $yearly_price = '';
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
                            if( array_key_exists( 'yr_preod', $pricing_meta )) {
                                $yr_preod = $pricing_meta['yr_preod'];
                            } else {
                                $yr_preod = '';
                            }
                            ?>
								<div class="col-lg-4 col-md-6">
									<div class="pr-an-price-table headline ul-li-block">
                                        <h3><?php the_title();?></h3>
										<div class="pr-an-price-img">
											<img src="<?php echo esc_url($pricing_shape_img['url']);?>" alt="">
										</div>
										<div class="pr-an-price-value">
											<span><sup><?php echo esc_html($price_symble);?></sup><?php echo esc_html($yearly_price);?>/</span> <?php echo esc_html($yr_preod);?>
										</div>
										<div class="pr-an-price-list">
											<ul>
                                                <?php foreach($pricing_lists as $list):?>
                                                <li><?php echo esc_html($list['pricing_item']);?></li>
                                                <?php endforeach;?>
											</ul>
										</div>
										<div class="pr-an-price-btn">
											<a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url($pricing_link['url']);?>"><?php echo esc_html($pricing_button);?></a>
										</div>
									</div>
								</div>
                                <?php } wp_reset_query(); } ?> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
      <?php

              }

      }
