<?php

    class ag_blog_grid extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_blog_grid';
        }

        public function get_title() {
            return __( 'Agency Blog', 'prysm' );
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
            

            $this->end_controls_section();

            $this->start_controls_section(
                'blog__style',
                [
                    'label' => esc_html__( 'Blog Style', 'prysm' ),
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
                        '{{WRAPPER}} .pr-an-blog-inner-item .pr-an-blog-inner-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-blog-inner-item .pr-an-blog-inner-text h3',
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
                        '{{WRAPPER}} .pr-an-blog-inner-item .pr-an-blog-inner-text .blog-meta' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_meta_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-blog-inner-item .pr-an-blog-inner-text .blog-meta',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'blog_heading_style',
                [
                    'label' => esc_html__( 'Section Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
                    'name'           => 'info_h_typography',
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

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $blog_order     = $settings['blog_order'];
            $blog_count     = $settings['blog_count'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $description    = $settings['description'];

        ?>  
        <section id="pr-an-blog" class="pr-an-blog-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                        <div class="pr-an-section-title headline pera-content">
                            <span><?php echo esc_html($sub_title);?></span>
                            <h2><?php echo esc_html($title);?></h2>
                            <p><?php echo __($description);?></p>
                        </div>
                    </div>
                </div>
                <div class="pr-an-blog-content position-relative">
                    <div class="carousel_nav  clearfix">
                        <button type="button" class="blg-an-left_arrow float-left"><i class="far fa-long-arrow-left"></i></button>
                        <button type="button" class="blg-an-right_arrow float-right"><i class="far fa-long-arrow-right"></i></button>
                    </div>
                    <div class="pr-an-blog-slider">
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
                        <div class="pr-item-innerbox wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="pr-an-blog-inner-item position-relative">
                                <div class="pr-an-blog-inner-img">
                                    <img src="<?php echo esc_url($blogv_img['0']);?>" alt="">
                                </div>
                                <div class="pr-an-blog-inner-text headline">
                                    <h3><a href="<?php the_permalink();?>"><?php the_title()?></a></h3>
                                    <div class="blog-meta">
                                        <i class="far fa-calendar-alt"></i> <?php echo get_the_date('M m, Y');?>
                                    </div>
                                </div>
                                <div class="pr-an-blog-link position-absolute">
                                    <a class="d-flex justify-content-center align-items-center" href="<?php the_permalink();?>" tabindex="0"><i class="fas fa-plus"></i></a>
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
