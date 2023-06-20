<?php

    class constv4_post_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv4_post_section';
        }

        public function get_title() {
            return __( 'Consulting V4 Post', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-group';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'blog_content_section',
                [
                    'label' => __( 'Blog Grid', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'post_bg', [
                    'label'       => esc_html__( 'Post BG', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .sec-title-five .title:before',
                ]
            );
            $this->add_control(
                'blog_count', [
                    'label'       => esc_html__( 'How Many Post You want to Shaow', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'blog_order', [
                    'label'   => esc_html__( 'Post Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
                ]
            );    
            $this->add_control(
                'blog_btn_text', [
                    'label'       => esc_html__( 'Button Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );                   
            $this->add_control(
                'blog_btn_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );                   

            $this->end_controls_section();

            $this->start_controls_section(
                'blog__style',
                [
                    'label' => esc_html__( 'Blog Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'post_main_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );          
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'post_main_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-seven .inner-box .lower-content h5',
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
                'post_title_color',
                [
                    'label' => esc_html__( 'Post Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-seven .inner-box .lower-content h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_title_hover_color',
                [
                    'label' => esc_html__( 'Post Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-seven .inner-box .lower-content h5 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_date_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Date', 'prysm' ),
                    'separator' => 'before',
                ]
            );          
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'post_date_typo',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-seven .inner-box .image .post-date',
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
                'post_date_color',
                [
                    'label' => esc_html__( 'Post Date Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-seven .inner-box .image .post-date' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_date_bg_color',
                [
                    'label' => esc_html__( 'Post Date BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-seven .inner-box .image .post-date, .news-block-seven .inner-box .image .post-date:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'section_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
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
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
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
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $post_bg   = $settings['post_bg'];
            $sub_title   = $settings['sub_title'];
            $maintitle   = $settings['maintitle'];
            $blog_count       = $settings['blog_count'];
            $blog_order       = $settings['blog_order'];
            $blog_btn_text    = $settings['blog_btn_text'];
            $blog_btn_link    = $settings['blog_btn_link'];

        ?>  
        <!-- News Section Seven -->
			<section class="news-section-seven">
				<div class="auto-container">
					<div class="inner-container" style="background-image:url(<?php echo esc_url($post_bg['url']);?>)">
						<!-- Sec Title -->
						<div class="sec-title-seven">
							<div class="clearfix">
								<div class="pull-left">
									<div class="title"><?php echo esc_html($sub_title);?></div>
									<h2><?php echo esc_html($maintitle);?></h2>
								</div>
								<div class="pull-right">
									<a href="<?php echo esc_url($blog_btn_link['url']);?>" class="theme-btn btn-style-seventeen"><span class="txt"><?php echo esc_html($blog_btn_text);?></span></a>
								</div>
							</div>
						</div>
						
						<div class="row clearfix">
                            <?php

                            $args = array(
                                'post_type'      => array( 'post' ),
                                'post_status'    => 'publish',
                                'posts_per_page' => $blog_count,
                                'order'          => $blog_order,
                            );
                            $query = new  \WP_Query($args);

                            if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                            $query->the_post();
                            $idd = get_the_ID();
                            $blogv_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                            $categories = get_the_category();

                            ?>
							<!-- News Block Seven -->
							<div class="news-block-seven col-lg-4 col-md-6 col-sm-12">
								<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
									<div class="image">
										<a href="#"><img src="<?php echo esc_url($blogv_img['0']);?>" alt="" /></a>
										<div class="post-date"><?php echo get_the_date('M m, Y');?></div>
									</div>
									<div class="lower-content">
										<ul class="post-meta">
											<li><span class="icon flaticon-user-1"></span><?php the_author();?></li>
											<li><span class="icon flaticon-email"></span><?php esc_html_e('Comments', 'prysm-core');?> <?php echo esc_attr(get_comments_number());?></li>
										</ul>
										<h5><a href="<?php the_permalink()?>"><?php the_title();?></a></h5>
										<a href="<?php the_permalink()?>" class="more-detail theme-btn">Details More</a>
									</div>
								</div>
							</div>
							<?php } wp_reset_query(); } ?>
						</div>
						
					</div>
				</div>
			</section>
			<!-- End News Section Seven -->
      <?php

              }

      }
