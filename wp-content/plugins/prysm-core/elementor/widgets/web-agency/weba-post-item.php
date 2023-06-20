<?php

    class weba_blog_grid extends \Elementor\Widget_Base {

        public function get_name() {
            return 'weba_blog_grid';
        }

        public function get_title() {
            return __( 'Web Agency Post', 'prysm' );
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
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'btn_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
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
                        '{{WRAPPER}} .news-block-eleven .inner-box .lower-content h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'blog_title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-eleven .inner-box .lower-content h4 a:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-eleven .inner-box .lower-content h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                        '{{WRAPPER}} .news-block-eleven .inner-box .lower-content .post-meta li' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'blog_meta_icn_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-block-eleven .inner-box .lower-content .post-meta li .icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_meta_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-eleven .inner-box .lower-content .post-meta li',
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
                        '{{WRAPPER}} .sec-title-ten .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hed-subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten .title',
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
                        '{{WRAPPER}} .sec-title-ten h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
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
                'title_color_cl',
                [
                    'label'     => esc_html__( 'Color Title', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-ten .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_txt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-eleven .inner-box .lower-content .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'nav_dot_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Dote Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'dot_bg_color',
                [
                    'label'     => esc_html__( 'Dot Background Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .news-section-eleven .owl-dots .owl-dot.active, .news-section-eleven .owl-dots .owl-dot:hover' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();
            
            $this->start_controls_section(
                'button__content',
                [
                    'label' => __( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-twentyfive .txt',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
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
                        '{{WRAPPER}} .btn-style-twentyfive .txt' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .btn-style-twentyfive',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .btn-style-twentyfive .txt:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .btn-style-twentyfive:before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .btn-style-twentyfive .txt:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $blog_order     = $settings['blog_order'];
            $blog_count     = $settings['blog_count'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $description    = $settings['description'];
            $btn_label      = $settings['btn_label'];
            $btn_link       = $settings['btn_link'];

        ?>  
        <!-- News Section Eleven -->
        <section class="news-section-eleven">
            <div class="auto-container">
                <!-- Sec Title Ten -->
                <div class="sec-title-ten clearfix">
                    <div class="pull-left">
                        <div class="title"><?php echo esc_html($sub_title);?></div>
                        <h2><?php echo esc_html($title);?></h2>
                        <div class="text"><?php echo __($description);?></div>
                    </div>
                    <div class="pull-right">
                        <!-- Button Box -->
                        <div class="btn-box">
                            <a href="<?php echo esc_html($btn_link['url']);?>" class="theme-btn btn-style-twentyfive"><span class="txt"><?php echo esc_html($btn_label);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <!-- End Sec Title Ten -->
                
                <div class="news-carousel owl-carousel owl-theme">
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
                    <!-- News Block -->
                    <div class="news-block-eleven">
                        <div class="inner-box">
                            <?php if(has_post_thumbnail()):?>
                            <div class="image">
                                <a href="<?php the_permalink();?>"><img src="<?php echo esc_url($blogv_img['0']);?>" alt="" /></a>
                            </div>
                            <?php endif;?>
                            <div class="lower-content">
                                <ul class="post-meta">
                                    <li><span class="icon fal fa-user-alt"></span><?php the_author();?></li>
                                    <li><span class="icon fal fa-clock"></span><?php echo get_the_date('M m, Y');?></li>
                                    <li><span class="icon far fa-comments"></span><?php echo esc_attr(get_comments_number());?> <?php esc_html_e( 'Comments', 'prysm-core' );?></li>
                                </ul>
                                <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                                <div class="text"><?php the_excerpt();?></div>
                                <a href="<?php the_permalink();?>" class="arrow fa fa-arrow-right"></a>
                            </div>
                        </div>
                    </div>
                    <?php } wp_reset_query(); } ?>
                </div>
            </div>
        </section>
        <!-- End News Section Eleven -->
      <?php

              }

      }
