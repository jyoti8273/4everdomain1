<?php

    class ma_blog_post_carousel extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ma_blog_post_carousel';
        }

        public function get_title() {
            return __( 'Marketing Post Slide', 'prysm' );
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
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'main_heading', [
                    'label'       => esc_html__( 'Main Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading_info', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'blog_count', [
                    'label'       => esc_html__( 'How Many portfolio You want to Shaow', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'blog_order', [
                    'label'   => esc_html__( 'portfolio Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
                ]
            );         
            $this->add_control(
                'button_text', [
                    'label'   => esc_html__( 'Button Text', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::TEXT,
                ]
            );         
            $this->add_control(
                'button_link', [
                    'label'   => esc_html__( 'Button LInk', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::URL,
                ]
            );         

            $this->end_controls_section();

            $this->start_controls_section(
                'blog_h_style',
                [
                    'label' => esc_html__( 'Blog Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                '_blog_sub_ttl_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_sub_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_sub_title_typography',
                    'label'          => esc_html__( 'Sub Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
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
                'h_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title h2',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                '_blog_text_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'h_text_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_text_typography',
                    'label'          => esc_html__( 'Text Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title h2',
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

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $sub_heading   = $settings['sub_heading'];
            $main_heading   = $settings['main_heading'];
            $heading_info   = $settings['heading_info'];
            $button_text   = $settings['button_text'];
            $button_link   = $settings['button_link'];
            $blog_order   = $settings['blog_order'];
            $blog_count   = $settings['blog_count'];

        ?>  

    <section id="pr-mark-blog" class="pr-mark-blog-section">
		<div class="container">
			<div class="pr-mark-blog-upper-content d-flex justify-content-between align-items-center">
				<div class="pr-mark-section-title headline pera-content">
					<span class="pr-mark-section-title-tag"><?php echo esc_html($sub_heading);?></span>
					<h2><?php echo esc_html($main_heading);?></h2>
					<p><?php echo esc_html($heading_info);?></p>
				</div>
                <?php if($button_text):?>
				<div class="pr-mark-btn text-center">
					<a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url($button_link['url']);?>"><?php echo esc_html($button_text);?></a>
				</div>
                <?php endif;?>
			</div>
			<div class="pr-mark-blog-content">
				<div class="pr-mark-blog-slider">
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
                    ?>
					<div class="pr-item-innerbox">
						<div class="pr-mark-blog-innerbox">
							<div class="pr-mark-blog-inner-img position-relative">
								<img src="<?php echo esc_url($blogv_img['0']);?>" alt="">
								<span class="date-meta position-absolute"><a href="#"><?php echo get_the_date('M d, Y');?></a></span>
							</div>
							<div class="pr-mark-blog-inner-text headline">
								<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
								<div class="pr-mark-blog-meta">
									<a href="#"><i class="far fa-user"></i> <?php the_author()?></a>
									<?php 
                                    $catgorys = get_the_category();
                                    foreach( $catgorys as $key => $category):
                                
                                        $catemeta = !empty(get_term_meta( $category->term_id, '_prysm_cate-color', true )) ? get_term_meta( $category->term_id, '_prysm_cate-color', true ) : "#1f5dda"; 
                                        ?>
                                        <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><i class="fal fa-folder-open"></i> <?php echo esc_html($category->cat_name); ?>
                                        </a>
                                    <?php endforeach;?>
								</div>
								<a class="pr-mark-blog-more" href="<?php the_permalink();?>"><?php esc_html_e( 'Read more', 'prysm' )?> <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
					<?php } wp_reset_query(); } ?>
				</div>
			</div>
		</div>
	</section>
      <?php

              }

      }
