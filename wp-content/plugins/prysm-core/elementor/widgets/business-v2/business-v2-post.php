<?php

    class business_v2_post_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business_v2_post_section';
        }

        public function get_title() {
            return __( 'Business V3 Post', 'prysm' );
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
                'sectionbg', [
                    'label'       => esc_html__( 'Section BG', 'prysm' ),
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

            $this->end_controls_section();

            $this->start_controls_section(
                'blog__style',
                [
                    'label' => esc_html__( 'Blog Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'post_heading_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Hading Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );   
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'subtitle_style',
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
                'title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
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
            $this->add_control(
                'post_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'post_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-eight .inner-box .lower-content h5',
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
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-eight .inner-box .lower-content h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_title_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-eight .inner-box .lower-content h5 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_cate_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Category Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'post_cate_style_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-eight .inner-box .lower-content .post-meta li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'post_cat_bg_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-eight .inner-box .lower-content .post-meta li:first-child' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_cate_color',
                [
                    'label' => esc_html__( 'Title Cate Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-eight .inner-box .lower-content .post-meta li:first-child' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $sectionbg   = $settings['sectionbg'];
            $sub_title   = $settings['sub_title'];
            $maintitle   = $settings['maintitle'];
            $blog_count       = $settings['blog_count'];
            $blog_order       = $settings['blog_order'];
            $blog_btn_text    = $settings['blog_btn_text'];

        ?>  

        <!-- News Section Eight -->
        <section class="news-section-eight" style="background-image: url(<?php echo esc_url($sectionbg['url']);?>)">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Title Column -->
                    <div class="title-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-seven style-two">
                                <div class="title"><?php echo esc_html($sub_title);?></div>
                                <h2><?php echo __($maintitle);?></h2>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="two-item-carousel owl-carousel owl-theme">
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
                                <!-- News Block Eight -->
                                <div class="news-block-eight">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="<?php the_permalink()?>"><img src="<?php echo esc_url($blogv_img['0']);?>" alt="" /></a>
                                        </div>
                                        <div class="lower-content">
                                            <ul class="post-meta">
                                            <li><?php if ( ! empty( $categories ) ) {
                                                echo '' . esc_html( $categories[0]->name ) . '';
                                            }?></li>
                                                <li><?php echo get_the_date('M m, Y');?></li>
                                            </ul>
                                            <h5><a href="<?php the_permalink()?>"><?php the_title();?></a></h5>
                                            <a href="<?php the_permalink()?>" class="more-detail theme-btn"><?php echo esc_html($blog_btn_text);?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php } wp_reset_query(); } ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End News Section Eight -->
      <?php

              }

      }
