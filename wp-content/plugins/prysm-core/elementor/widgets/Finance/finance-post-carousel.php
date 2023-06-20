<?php

    class finance_post_slider extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_post_slider';
        }

        public function get_title() {
            return __( 'Finance Post Slide', 'prysm' );
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
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'blog_count', [
                    'label'       => esc_html__( 'How Many Post You want to Shaow', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
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
                'post_sliders',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );            

            $this->end_controls_section();

            $this->start_controls_section(
                'blog__style',
                [
                    'label' => esc_html__( 'Blog Left Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'blog_title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-column:hover .pr6-blog-column-content .pr6-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-headline h4',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            
            $this->add_control(
                '_blog_meta_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Blog Date', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'blog_date_color',
                [
                    'label'     => esc_html__( 'Date Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-meta span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_date_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-meta span',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            
            
            $this->add_control(
                '_blog_readmore_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Blog Read More Button', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_more_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-bottom .pr6-blog-readmore-btn a' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_link_typography',
                    'label'          => esc_html__( 'Link Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-bottom .pr6-blog-readmore-btn a',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                '_blog_authore_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'authore_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-bottom .pr6-author .pr6-author-name span' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'authore_typography',
                    'label'          => esc_html__( 'Link Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-bottom .pr6-author .pr6-author-name span',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'authore_box',
                [
                    'label'     => esc_html__( 'Box Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-column .pr6-blog-column-content .pr6-blog-bottom .pr6-author .pr6-client-wrapper' => 'background: {{VALUE}} '
                    ],
                ]
            );
            
            
            $this->end_controls_section();
            $this->start_controls_section(
                'blog_list_style',
                [
                    'label' => esc_html__( 'Blog Right List Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                '_blog_sm_title_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Right Post Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'ri_blog_title_color',
                [
                    'label'     => esc_html__( 'Right Post Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-blog-content .pr6-blog-list .pr6-blog-column .pr6-headline h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_sm_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-blog-content .pr6-blog-list .pr6-blog-column .pr6-headline h6',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $post_sliders   = $settings['post_sliders'];

        ?>  

            <!-- Blog Section -->
		<section class="pr6-blog-section">
			<div class="container">
				<div class="pr6-blog-content pr6-blog-slider">

                    <?php foreach($post_sliders as $item):?>
					<div class="pr6-blog-slider-item">
						<div class="row">
                        <?php

                            $args = array(
                                'post_type'      => array( 'post' ),
                                'post_status'    => 'publish',
                                'posts_per_page' => $item['blog_count'],
                                'order'          => $item['blog_order'],
                            );
                            $query = new  \WP_Query($args);

                            if ( $query->have_posts() ) {
                            while ( $query->have_posts() ) {
                            $query->the_post();
                            $idd = get_the_ID();
                            $blogv_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'finance_post_572_237');
                            $blogv_img_th = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'finance_post_200_132');
                            ?>
                            <?php if(0 == $query->current_post):?>
							<div class="col-lg-6">
								<div class="pr6-blog-column">
									<div class="pr6-img-wrapper">
										<a href="<?php the_permalink();?>"><img src="<?php echo esc_url($blogv_img['0']);?>" alt="<?php the_title_attribute();?>"></a>
									</div>
									<div class="pr6-blog-column-content">
										<div class="pr6-blog-meta">
											<span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date('M m, Y');?></span>
										</div>
										<div class="pr6-headline">
											<a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
										</div>
										<div class="pr6-blog-bottom">
											<div class="pr6-author">
												<div class="pr6-client-wrapper">
                                                    <?php echo get_avatar(get_the_author_meta('email'), 40);?>
												</div>
												<div class="pr6-author-name">
													<span><?php the_author()?></span>
												</div>
											</div>
											<div class="pr6-blog-readmore-btn">
												<a href="<?php the_permalink();?>"><?php esc_html_e('More Details', 'prysm');?> </a>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <?php else:?>
                            <?php if ( 1 ==  $query->current_post ): ?>
							<div class="col-lg-6">                            
								<div class="pr6-blog-list">
                                <?php endif;?>

									<div class="pr6-blog-column">
										<div class="pr6-img-wrapper">
                                            <img src="<?php echo esc_url($blogv_img_th['0']);?>" alt="<?php the_title_attribute();?>">
										</div>
										<div class="pr6-blog-column-content">
											<div class="pr6-blog-meta">
												<span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date('M m, Y');?></span>
											</div>
											<div class="pr6-headline">
												<a href="<?php the_permalink();?>"><h6><?php the_title();?></h6></a>
											</div>
											<div class="pr6-blog-bottom">
												<div class="pr6-author">
													<div class="pr6-client-wrapper">
														<?php echo get_avatar(get_the_author_meta('email'), 40);?>
													</div>
													<div class="pr6-author-name">
														<span><?php the_author()?></span>
													</div>
												</div>
												<div class="pr6-blog-readmore-btn">
													<a href="<?php the_permalink();?>"><?php esc_html_e('More Details', 'prysm');?> </a>
												</div>
											</div>
										</div>
									</div>
                                    <?php if (($query->current_post + 1) == ($query->post_count)):?>
								</div>
							</div>
                            <?php endif; endif;?>
                            <?php } wp_reset_query(); } ?>
						</div>
					</div>
                    <?php endforeach;?>
                    
				</div>
			</div>
		</section>
      <?php

              }

      }
