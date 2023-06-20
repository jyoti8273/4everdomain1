<?php

    class bud_blog_grid extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bud_blog_grid';
        }

        public function get_title() {
            return __( 'Dark Blog Blog', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
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
                'blog_count', [
                    'label'       => esc_html__( 'How Many Blog You want to Shaow', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'blog_order', [
                    'label'   => esc_html__( 'Blog Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
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
                'blog__style',
                [
                    'label' => esc_html__( 'Blog Style', 'prysm' ),
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

            $this->add_control(
                '_blog_title_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block .inner-box h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block .inner-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
                '_blog_meta_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Blog Meta', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_meta_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block .inner-box .post-info li a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_meta_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block .inner-box .post-info li a',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                '_blog_text_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Blog Meta', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_text_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block .inner-box .text',
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
            $blog_order     = $settings['blog_order'];
            $blog_count     = $settings['blog_count'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $button_label   = $settings['button_label'];
            $button_link    = $settings['button_link'];

        ?>  
        <!-- News Section -->
		<section class="news-section">
			<div class="auto-container">
				<div class="inner-container">
					<!-- Sec Title -->
					<div class="sec-title centered">
						<div class="title-outer">
							<div class="title">Latest blog</div>
						</div>
						<h2>Learn more from blog</h2>
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
						<!-- News Block -->
						<div class="news-block col-lg-4 col-md-6 col-sm-12">
							<div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
								<div class="image-layer" style="background-image: url(<?php echo esc_url($blogv_img['0']);?>)"></div>
								<ul class="post-info">
									<li><?php if ( ! empty( $categories ) ) {
                                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                                    }?></li>
									<li><a href="#"><?php echo get_the_date('F m, Y');?></a></li>
								</ul>
								<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
								<div class="text"><?php the_excerpt();?></div>
								<a href="<?php the_permalink();?>" class="arrow flaticon-right-arrow"></a>
							</div>
						</div>
						<?php } wp_reset_query(); } ?>
						
					</div>
					<?php if($button_link['url']):?>
					<div class="button-box text-center">
						<a href="<?php echo esc_url($button_link['url']);?>" class="theme-btn btn-style-one"><span class="txt"><?php echo esc_html($button_label);?></span></a>
					</div>
					<?php endif;?>
				</div>
			</div>
		</section>
		<!-- End News Section -->
      <?php

              }

      }
