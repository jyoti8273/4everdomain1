<?php

    class finance_service extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_service';
        }

        public function get_title() {
            return __( 'Finance Service Three', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['Prysm'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'service_heading_content',
            [
                'label' => __( 'Service Heading', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'sub_title',
            [
                'label' => esc_html__( 'Sub Title', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'more_text', [
                'label'       => esc_html__( 'More Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $this->add_control(
            'more_link', [
                'label'       => esc_html__( 'More Link', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::URL,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'service_content',
            [
                'label' => __( 'Service Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Tab Icon', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'service_count', [
                'label'       => esc_html__( 'Service Count', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => -1,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'service_order', [
                'label'   => esc_html__( 'Service Order', 'prysm' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'asc',
                'options' => [
                    'asc'  => esc_html__( 'ASC ', 'prysm' ),
                    'desc' => esc_html__( 'DESC', 'prysm' ),
                ],
            ]
        );

        $this->add_control(
            'service_boxes',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();
        
        $this->start_controls_section(
            'service_heading_info',
            [
                'label' => esc_html__( 'Service Heading Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'service_sub_heading_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            's_sub_title_color',
            [
                'label'     => esc_html__( 'Sub Title Color', 'exodus-extension' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            's_sub_title_bg_color',
            [
                'label'     => esc_html__( 'Sub Title BG Color', 'exodus-extension' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-subtitle' => 'background: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'exodus-extension' ),
                'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-subtitle',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            'service_main_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Heading Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            's_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'exodus-extension' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-headline h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 's_title_typography',
                'label'          => esc_html__( 'Typography', 'exodus-extension' ),
                'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-headline h3',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            'service_heading_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Heading Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            's_text_color',
            [
                'label'     => esc_html__( 'Text Color', 'exodus-extension' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-title-area .pr6-pera-txt p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 's_text_typography',
                'label'          => esc_html__( 'Typography', 'exodus-extension' ),
                'selector'       => '{{WRAPPER}} .pr6-title-area .pr6-pera-txt p',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'service_style_info',
            [
                'label' => esc_html__( 'Service Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
                
        $this->add_control(
            'service_icon',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Icon Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'icon__color',
            [
                'label'     => esc_html__( 'Icon Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-left .pr6-service-tabs li a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'icon_active_color',
            [
                'label'     => esc_html__( 'Icon Active Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-left .pr6-service-tabs li a.active i' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'icon__bg_color',
            [
                'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-left .pr6-service-tabs li a' => 'background: {{VALUE}} ',
                ],
            ]
        );
        
        $this->add_control(
            'srvh_title',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title__color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-content .pr6-headline h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-service-content .pr6-headline h4',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            '__content_title_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Text Content', 'prysm' ),
                'separator' => 'before',
            ]
        );
        
        
        $this->add_control(
            'tx_text_color',
            [
                'label'     => esc_html__( 'Content Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-content .pr6-pera-txt p' => 'color: {{VALUE}} ',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'text_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .pr6-service-content .pr6-pera-txt p',
                'fields_options' => [
                    'typography' => [
                        'default' => 'custom',
                    ],
                ],
            ]
        );
        $this->add_control(
            '__service_icon_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Icon', 'prysm' ),
                'separator' => 'before',
            ]
        );
        
        
        $this->add_control(
            'service_main_icon',
            [
                'label'     => esc_html__( 'Service Icon Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-right .pr6-single-item .pr6-icon-wrapper i' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'service_main_bg_icon',
            [
                'label'     => esc_html__( 'Service Icon BG Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pr6-service-right .pr6-single-item .pr6-icon-wrapper i' => 'background: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            '__service_btn_style_',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Button Style', 'prysm' ),
                'separator' => 'before',
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
                        '{{WRAPPER}} .pr6-primary-btn a' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr6-primary-btn a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a:hover, .pr6-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr6-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr6-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
           
            $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $service_boxes        = $settings['service_boxes'];
            $title                = $settings['title'];
            $sub_title            = $settings['sub_title'];
            $description          = $settings['description'];
            $more_text            = $settings['more_text'];
            $more_link            = $settings['more_link'];

        ?>
        <!-- Service Section -->
		<section class="pr6-service-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="pr6-service-left">
							<div class="pr6-title-area wow fadeInUp">
								<span class="pr6-subtitle"><?php echo esc_html($sub_title);?></span>
								<div class="pr6-headline">
									<h3><?php echo esc_html($title);?></h3>
								</div>
								<div class="pr6-pera-txt">
									<p><?php echo __($description);?></p>
								</div>
							</div>
							<div class="pr6-service-tabs wow fadeInUp" data-wow-delay="0.2s">
								<ul class="nav nav-pills">
                                    <?php $itemID = 0; foreach($service_boxes as $item): $itemID++?>
                                    <?php if(1 == $itemID):?>
									<li><a href="#tabId-<?php echo esc_attr($itemID);?>" data-toggle="pill" class="active">
                                    <i class="<?php echo esc_attr($item['icon']);?>"></i>
                        <?php echo esc_html($item['tb_title']);?>
                                    </a></li>
                                    <?php else:?>
									<li><a href="#tabId-<?php echo esc_attr($itemID);?>" data-toggle="pill"><i class="<?php echo esc_attr($item['icon']);?>"></i></a></li>
                                    <?php endif;?>
                                    <?php endforeach;?>
								</ul>
							</div>
							<div class="pr6-secondary-btn wow fadeInUp" data-wow-delay="0.3s">
								<a href="<?php echo esc_html($more_link['url']);?>"><?php echo esc_html($more_text);?> <i class="fas fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="pr6-service-right wow fadeInUp">
							<div class="tab-content">
                            <?php $itemID = 0; foreach($service_boxes as $item): $itemID++;?>
                                <?php if(1 == $itemID):?>             
								<div class="tab-pane fade show active" id="tabId-<?php echo esc_attr($itemID);?>">
									<div class="pr6-service-slider">
                                        <?php

                                        $args = array(
                                            'post_type'      => array( 'services' ),
                                            'post_status'    => 'publish',
                                            'posts_per_page' => $item['service_count'],
                                            'order'          => $item['service_order'],
                                        );
                                        $query = new  \WP_Query($args);

                                        if ( $query->have_posts() ) {
                                        while ( $query->have_posts() ) {
                                        $query->the_post();
                                        $idd = get_the_ID();
                                        ?>
										<div class="pr6-single-item">
											<div class="pr6-img-wrapper">
												<img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'finance_post_570_228')); ?>" alt="">
											</div>
											<div class="pr6-icon-wrapper">
												<i class="<?php echo esc_attr($item['icon']);?>"></i>
											</div>
											<div class="pr6-service-content">
												<div class="pr6-headline">
													<h4><?php the_title();?></h4>
												</div>
												<div class="pr6-pera-txt">
													<p><?php echo wp_trim_words(get_the_excerpt(), 14, '')?></p>
												</div>
												<div class="pr6-primary-btn">
													<a href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'prysm' );?> <i class="fas fa-arrow-right"></i></a>
												</div>
											</div>
										</div>
                                        
                                        <?php } wp_reset_query(); } ?>
									</div>
								</div>
                                <?php else:?>
                                    <div class="tab-pane fade" id="tabId-<?php echo esc_attr($itemID);?>">
                                        <div class="pr6-service-slider">
                                            <?php

                                            $args = array(
                                                'post_type'      => array( 'services' ),
                                                'post_status'    => 'publish',
                                                'posts_per_page' => $item['service_count'],
                                                'order'          => $item['service_order'],
                                            );
                                            $query = new  \WP_Query($args);

                                            if ( $query->have_posts() ) {
                                            while ( $query->have_posts() ) {
                                            $query->the_post();
                                            $idd = get_the_ID();
                                            ?>
                                            <div class="pr6-single-item">
                                                <div class="pr6-img-wrapper">
                                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'finance_post_570_228')); ?>" alt="">
                                                </div>
                                                <div class="pr6-icon-wrapper">
                                                    <i class="<?php echo esc_attr($item['icon']);?>"></i>
                                                </div>
                                                <div class="pr6-service-content">
                                                    <div class="pr6-headline">
                                                        <h4><?php the_title();?></h4>
                                                    </div>
                                                    <div class="pr6-pera-txt">
                                                        <p><?php echo wp_trim_words(get_the_excerpt(), 14, '')?></p>
                                                    </div>
                                                    <div class="pr6-primary-btn">
                                                        <a href="<?php the_permalink();?>"><?php esc_html_e( 'Read More', 'prysm' );?> <i class="fas fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <?php } wp_reset_query(); } ?>
                                        </div>
                                    </div>
                                <?php endif;?>
                                <?php endforeach;?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

      <?php

            }


      }
