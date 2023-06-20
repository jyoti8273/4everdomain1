<?php

    class con_post_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_post_item';
        }

        public function get_title() {
            return __( 'Consulting Post Item', 'prysm' );
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
                'post_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section .news-wrapper .news-content h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'blog_title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section .news-wrapper .news-content h4 a:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-section .news-wrapper .news-content h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'post_excerpt_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Post Excerpt Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_exc_color',
                [
                    'label'     => esc_html__( 'Excerpt Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section .news-wrapper .news-content h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_exc_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-section .news-wrapper .news-content p',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                        '{{WRAPPER}} .news-section .news-wrapper .news-content .date' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_date_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-section .news-wrapper .news-content .date',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                '_blog_catew_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Blog Category', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'blog_category_color',
                [
                    'label'     => esc_html__( 'Blog Category Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-wrapper .tag a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_cat_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-section .news-wrapper .news-content .tag',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                        '{{WRAPPER}} .news-section .link .btn' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_control(
                'blog_bg_color',
                [
                    'label'     => esc_html__( 'BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section .link .btn' => 'background: {{VALUE}} '
                    ],
                ]
            );
            $this->add_control(
                'blog_more_hv_color',
                [
                    'label'     => esc_html__( 'Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section .btn-primary:hover' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_control(
                'blog_hv_bg_color',
                [
                    'label'     => esc_html__( 'Hover BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section .btn-primary:hover' => 'background: {{VALUE}} '
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
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $blog_count       = $settings['blog_count'];
            $blog_order       = $settings['blog_order'];
            $blog_btn_text    = $settings['blog_btn_text'];
            $blog_btn_link    = $settings['blog_btn_link'];

        ?>  

        <section class="news-section section-padding">
            <div class="container">
                <div class="row">
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
                    <div class="col-md-4 col-sm-6">
                        <div class="news-wrapper">
                            <img src="<?php echo esc_url($blogv_img['0']);?>" alt="">

                            <div class="news-content">
                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>

                                <?php the_excerpt();?>

                                <span class="date"><?php echo get_the_date('M m, Y');?></span>

                                <span class="tag float-right"><?php if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }?></span>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_query(); } ?>
                </div>
                <?php if($blog_btn_link['url']):?>
                <div class="link text-center">
                    <a href="<?php echo esc_url($blog_btn_link['url']);?>" class="btn con-main-btn "><?php echo esc_html($blog_btn_text);?></a>
                </div>
                <?php endif;?>
            </div>
        </section> <!-- news-section -->
      <?php

              }

      }
