<?php

    class its_blog_grid extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_blog_grid';
        }

        public function get_title() {
            return __( 'IT Blog', 'prysm' );
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
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'main_heading', [
                    'label'       => esc_html__( 'Main Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'color_heading', [
                    'label'       => esc_html__( 'Color Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button_text', [
                    'label'       => esc_html__( 'Button Text', 'prysm' ),
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
            $this->add_responsive_control(
                'bottom_space',
                [
                    'label' => __( 'Bottom Space', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 50,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr20-blog-content .pr20-blog-column' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr20-blog-column .pr20-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-blog-column .pr20-headline h4',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'blog_hover_title_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-blog-column .pr20-headline h4:hover' => 'color: {{VALUE}} ',
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
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'date_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic'],
                    'selector' => '{{WRAPPER}} .pr20-blog-content .pr20-blog-column .pr20-blog-meta span',
                ]
            );
            $this->add_control(
                'blog_meta_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-blog-content .pr20-blog-column .pr20-blog-meta span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_meta_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-blog-content .pr20-blog-column .pr20-blog-meta span',
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
                        '{{WRAPPER}} .pr20-blog-content .pr20-blog-column .pr20-readmore-btn a' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_control(
                'blog_more_hover_color',
                [
                    'label'     => esc_html__( 'Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-blog-content .pr20-blog-column:hover .pr20-readmore-btn a' => 'color: {{VALUE}} '
                    ],
                ]
            );
            
            $this->add_control(
                'section_sub_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_h_color',
                [
                    'label'     => esc_html__( 'Sub Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_heading_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-subtitle',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'section_hed_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'main_h_color',
                [
                    'label'     => esc_html__( 'Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-blog-section .pr20-title-area h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_heading_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-blog-section .pr20-title-area h3',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'color_hed_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Color Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'main_clr_h_color',
                [
                    'label'     => esc_html__( 'Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area h3 span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_clr_heading_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area h3 span',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
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
                        '{{WRAPPER}} .pr20-primary-btn a' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a:hover, .pr20-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $sub_heading    = $settings['sub_heading'];
            $main_heading   = $settings['main_heading'];
            $color_heading  = $settings['color_heading'];
            $button_text    = $settings['button_text'];
            $button_link    = $settings['button_link'];
            $blog_order     = $settings['blog_order'];
            $blog_count     = $settings['blog_count'];

        ?>  

        <section class="pr20-blog-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pr20-title-area wow fadeInUp">
                            <span class="pr20-subtitle"><?php echo esc_html($sub_heading);?></span>
                            <div class="pr20-headline">
                                <h3><?php echo esc_html($main_heading);?> <span><?php echo esc_html($color_heading);?></span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-end">
                        <div class="pr20-blog-top-right">
                            <div class="pr20-primary-btn wow fadeInRight">
                                <a href="<?php echo esc_url($button_link['url']);?>"><?php echo esc_html($button_text);?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pr20-blog-content">
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
                        ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="pr20-blog-column wow fadeInUp">
                                <div class="pr20-thumb-wrapper">
                                    <img src="<?php echo esc_url($blogv_img['0']);?>" alt="">
                                    <div class="pr20-blog-date pr20-headline">
                                        <h4><?php echo get_the_date('m');?></h4>
                                        <span><?php echo get_the_date('F');?></span>
                                    </div>
                                </div>
                                <div class="pr20-blog-meta">
                                    <span><a href="#"><i class="fas fa-tags"></i><?php prysm_category_name();?></a></span>
                                    <span><i class="fas fa-user"></i><?php the_author()?></span>
                                </div>
                                <div class="pr20-blog-title pr20-headline">
                                    <a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
                                </div>
                                <div class="pr20-readmore-btn">
                                    <a href="<?php the_permalink();?>"><?php esc_html_e( 'Read more', 'prysm' )?> <i class="fas fa-arrow-right"></i></a>
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
