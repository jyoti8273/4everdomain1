<?php

    class mgv2_post_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_post_section';
        }

        public function get_title() {
            return __( 'Marketing V3 Post', 'prysm' );
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
                'bigtitle', [
                    'label'       => esc_html__( 'Big Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
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
            
            
            $this->add_control(
                'blog_text', [
                    'label'       => esc_html__( 'Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'blog_text2', [
                    'label'       => esc_html__( 'Text 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'blog_text3', [
                    'label'       => esc_html__( 'Text 3', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'blog_text_link', [
                    'label'       => esc_html__( 'Text Link', 'prysm' ),
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
                'digital_sub-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_sub_title_color',
                [
                    'label' => esc_html__( 'digital Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'digital_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '50',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_title_color',
                [
                    'label' => esc_html__( 'digital Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'digital_-headins_big_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Big Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_big_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .big-letter',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '152',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'bigv_title_color',
                [
                    'label' => esc_html__( 'Big Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .big-letter' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_title_style',
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
                    'selector'       => '{{WRAPPER}} .news-block-six .inner-box .lower-content h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                        '{{WRAPPER}} .news-block-six .inner-box .lower-content h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'post_title_hover_color',
                [
                    'label' => esc_html__( 'Post Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-six .inner-box .lower-content h5 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'mgv2_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-thirteen',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'mgv2_btn_color',
                [
                    'label' => esc_html__( 'Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-thirteen' => 'color: {{VALUE}} !important' ,
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'btn_background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-thirteen',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background_hover',
                    'label' => esc_html__( 'Background Hover', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-thirteen:before',
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $bigtitle   = $settings['bigtitle'];
            $sub_title   = $settings['sub_title'];
            $maintitle   = $settings['maintitle'];
            $blog_count       = $settings['blog_count'];
            $blog_order       = $settings['blog_order'];
            $blog_btn_text    = $settings['blog_btn_text'];
            $blog_btn_link    = $settings['blog_btn_link'];
            $blog_text    = $settings['blog_text'];
            $blog_text2    = $settings['blog_text2'];
            $blog_text3    = $settings['blog_text3'];
            $blog_text_link    = $settings['blog_text_link'];

        ?>  
        <!-- News Section Six -->
        <section class="news-section-six">
            <div class="auto-container">
                <div class="sec-title-six centered">
                    <div class="big-letter"><?php echo esc_html($bigtitle);?></div>
                    <div class="title"><?php echo esc_html($sub_title);?></div>
                    <h2><?php echo esc_html($maintitle);?></h2>
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
                    <!-- News Block Six -->
                    <div class="news-block-six col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <a href="<?php the_permalink()?>"><img src="<?php echo esc_url($blogv_img['0']);?>" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <h5><a href="<?php the_permalink()?>"><?php the_title();?></a></h5>
                                <ul class="post-meta">
                                    <li><span class="icon flaticon-calendar"></span><?php echo get_the_date('M m, Y');?></li>
                                    <li><span class="icon flaticon-user-1"></span><i><?php esc_html_e( 'Posted by', 'prysm-core' );?></i> <?php the_author();?></li>
                                </ul>
                                <div class="text"><?php the_excerpt();?></div>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_query(); } ?>
                </div>
                
                <!-- Button Box -->
                <div class="btns-box">
                    <div class="text"><?php echo esc_html($blog_text);?> <a href="<?php echo esc_url($blog_text_link['url']);?>"><?php echo esc_html($blog_text2);?></a> <?php echo esc_html($blog_text3);?> </div>
                    <a href="<?php echo esc_html($blog_btn_link['url']);?>" class="theme-btn btn-style-thirteen"><span class="txt"><?php echo esc_html($blog_btn_text);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                </div>
                
            </div>
        </section>
        <!-- End News Section Six -->
      <?php

              }

      }
