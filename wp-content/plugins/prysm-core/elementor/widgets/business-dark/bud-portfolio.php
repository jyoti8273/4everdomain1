<?php

    class bud_dark_portfolio extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_dark_portfolio';
        }

        public function get_title() {
            return __( 'Dark Portfolio Filter', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-filter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'portfolio_content_section',
                [
                    'label' => __( 'Portfolio', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sb_title', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
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
                'portfolio_settings',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Portfolio', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'portfolioo_count', [
                    'label'       => esc_html__( 'How Many portfolio You want to Shaow', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'portfolio_order', [
                    'label'   => esc_html__( 'portfolio Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'           => 'flt_shapew_bg',
                    'label'          => __( 'Background', 'prysm' ),
                    'types'          => ['classic'],
                    'exclude'        => ['color'],
                    'selector'       => '{{WRAPPER}} .gallery-block .inner-box .image .overlay-box:before',
                ]
            );
            
            $this->add_control(
                'button_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'portfolio_heading',
                [
                    'label' => esc_html__( 'portfolio Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'about_sbu_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'           => 'title_sub_color',
                    'label'          => __( 'Background', 'prysm' ),
                    'types'          => ['gradient'],
                    'exclude'        => ['image'],
                    'selector'       => '{{WRAPPER}} .sec-title .title-outer .title',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title .title-outer .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
                'about_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '60',
                            ],
                        ],
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'portfolio_filter',
                [
                    'label' => esc_html__( 'portfolio Filter', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_responsive_control(
                'filter_btm_space',
                [
                    'label'      => esc_html__( 'Buttom Space', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => ['px'],
                    'range'      => [
                        'px' => [
                            'min' => 1,
                            'max' => 1000,
                        ],
                    ],
                    'selectors'  => [
                        '{{WRAPPER}} .portfolio-section .filters' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'show_filter',
                [
                    'label' => __( 'Show Filter', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'prysm' ),
                    'label_off' => __( 'Hide', 'prysm' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            $this->add_control(
                'portfolio_filter_typography',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Filter Typography', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'filter_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .portfolio-section .filters li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
            $this->start_controls_tabs( '_portfolio_filter_clr' );
            $this->start_controls_tab(
                '_portfolio_flt__normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm' ),
                ]
            );
            $this->add_control(
                'filter_txt_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .portfolio-section .filters li' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'           => 'flt_bg_color',
                    'label'          => __( 'Background', 'prysm' ),
                    'types'          => ['classic', 'gradient'],
                    'exclude'        => ['image'],
                    'selector'       => '{{WRAPPER}} .portfolio-section .filters li',
                ]
            );
            $this->add_responsive_control(
                'flt_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .portfolio-section .filters li' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );
            $this->add_responsive_control(
                'flt_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .portfolio-section .filters li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_portfolio_filter__ac_hover',
                [
                    'label' => esc_html__( 'Hover/Active', 'prysm' ),
                ]
            );
            $this->add_control(
                'filter_active_txt_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .portfolio-section .filters .filter.active, .portfolio-section .filters .filter:hover' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'           => 'flt_act_bg_color',
                    'label'          => __( 'Background', 'prysm' ),
                    'types'          => ['classic', 'gradient'],
                    'exclude'        => ['image'],
                    'selector'       => '{{WRAPPER}} .portfolio-section .filters .filter.active, .portfolio-section .filters .filter:hover',
                ]
            );
            $this->add_responsive_control(
                'flt_act_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .portfolio-section .filters .filter.active, .portfolio-section .filters .filter:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );
            $this->add_responsive_control(
                'flt_act_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .portfolio-section .filters .filter.active, .portfolio-section .filters .filter:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ]
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs(); 
            $this->end_controls_section();
            $this->start_controls_section(
                'portfolio_style',
                [
                    'label' => esc_html__( 'portfolio Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
           
            $this->add_control(
                'portfolio_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'portfolio Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'pro_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block .inner-box .content h5',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'portfolio_title_clr',
                [
                    'label'     => esc_html__( 'portfolio Overlay', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block .inner-box .content h5 a' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_control(
                'portfolio_categorye_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'portfolio Cate Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'pro_cat_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block .inner-box .content .category',
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
                'portfolio_cate_clr',
                [
                    'label'     => esc_html__( 'portfolio Category', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block .inner-box .content .category' => 'color: {{VALUE}}',
                    ]
                ]
            );
            $this->add_control(
                'button_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'button_color',
                [
                    'label'     => esc_html__( 'Button Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-one .txt' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'           => 'btn_bg_color',
                    'label'          => __( 'Background', 'prysm' ),
                    'types'          => ['classic', 'gradient'],
                    'exclude'        => ['image'],
                    'selector'       => '{{WRAPPER}} .btn-style-one',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'           => 'btn_bg_hover_color',
                    'label'          => __( 'Background', 'prysm' ),
                    'types'          => ['classic', 'gradient'],
                    'exclude'        => ['image'],
                    'selector'       => '{{WRAPPER}} .btn-style-one:before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typ__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-one',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $sb_title            = $settings['sb_title'];
            $title               = $settings['title'];
            $show_filter         = $settings['show_filter'];
            $portfolio_order     = $settings['portfolio_order'];
            $portfolioo_count    = $settings['portfolioo_count'];
            $button_label        = $settings['button_label'];
            $button_link         = $settings['button_link'];

        ?>

        <!-- Portfolio Section -->
		<section class="portfolio-section">
			<div class="auto-container">
				<div class="inner-container">
					<!-- Sec Title -->
					<div class="sec-title centered">
						<div class="title-outer">
							<div class="title"><?php echo esc_html($sb_title);?></div>
						</div>
						<h2><?php echo __($title);?></h2>
					</div>
					
					<!--Isotope Galery-->
					<div class="sortable-masonry">
						<?php if('yes' == $show_filter):?>
						<!--Filter-->
						<div class="filters clearfix">
                            <?php
                                $portfolioCate = get_terms( 'portfolio_category' );
                            ?>
							<ul class="filter-tabs filter-btns text-center clearfix">
								<li class="active filter" data-role="button" data-filter="*">All</li>
                                <?php 
                                if(!empty($portfolioCate) && !is_wp_error($portfolioCate)):
                                foreach($portfolioCate as $cate):
                                ?>
								    <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($cate->slug)?>"><?php echo esc_html($cate->name)?></li>
                                <?php endforeach; endif;?>
							</ul>
							
						</div>
                        <?php endif;?>
						
						<div class="items-container row clearfix">
                        <?php

                        $args = array(
                            'post_type'      => array( 'portfolio' ),
                            'post_status'    => 'publish',
                            'posts_per_page' => $portfolioo_count,
                            'order'          => $portfolio_order,
                        );

                        $query = new WP_Query( $args );
                        if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        $query->the_post();
                        $idd = get_the_ID();
                        $posrtfolio_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
                        $portfoliocates = get_the_terms( $idd, 'portfolio_category' );
                        if ( $portfoliocates && !is_wp_error( $portfoliocates ) ) {
                            $portfolio_category_list = array();
                            foreach ( $portfoliocates as $cate ) {
                                $portfolio_category_list[] = $cate->slug;
                            }
                            $portfolio_categorye_asign_list = join( ' ', $portfolio_category_list );
                        } else {
                            $portfolio_categorye_asign_list = '';
                        }
                        ?>
							
							<!-- Gallery Block -->
							<div class="gallery-block masonry-item <?php echo esc_attr($portfolio_categorye_asign_list)?> col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box">
									<div class="image">
										<img src="<?php echo esc_url($posrtfolio_img['0']);?>" alt="" />
										<div class="overlay-box">
											<ul class="options-link">
												<li><a href="<?php the_permalink();?>" class="fa fa-link"></a></li>
												<li><a data-fancybox="gallery" data-caption="" href="<?php echo esc_url($posrtfolio_img['0']);?>" class="fa fa-search"></a></li>
											</ul>
											<div class="content">
												<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
												<div class="category"><?php echo esc_attr($cate->name);?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } wp_reset_query(); } ?>
						</div>
						<?php if($button_link['url']):?>
						<div class="button-box text-center">
							<a href="<?php echo esc_html($button_link['url']);?>" class="theme-btn btn-style-one"><span class="txt"><?php echo esc_html($button_label);?><i class="fa fa-refresh"></i></span></a>
						</div>
						<?php endif;?>
					</div>
					
				</div>
			</div>
		</section>
		<!-- End Portfolio Section -->
      <?php

              }

      }
