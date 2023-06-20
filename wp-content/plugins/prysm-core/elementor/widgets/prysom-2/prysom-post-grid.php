<?php

    class prysm_blog_grid extends \Elementor\Widget_Base {

        public function get_name() {
            return 'blog-grid-slide-id';
        }

        public function get_title() {
            return __( 'Blog Grid', 'prysm' );
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
                        '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .pr2-blog-content .pr2-blog-title h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .pr2-blog-content .pr2-blog-title h4',
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
                        '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .pr2-blog-content .pr2-blog-title h4:hover' => 'color: {{VALUE}} ',
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
                    'selector' => '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .date',
                ]
            );
            $this->add_control(
                'blog_meta_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .date' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_meta_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .date',
                    'fields_options' => [
                        'typography'  => [
                            'default' => 'custom',
                        ]
                    ],
                ]
            );
            $this->add_control(
                '_blog_excerpt_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Blog Excerpt', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'blog_excrpt_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-blog-content .pr2-pera-txt p' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_excrpt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-blog-content .pr2-pera-txt p',
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
                        '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .pr2-blog-content .pr2-blog-readmore a' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_more_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-blog-slider .pr2-blog-single-item .pr2-blog-content .pr2-blog-readmore a',
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
            $blog_order     = $settings['blog_order'];
            $blog_count    = $settings['blog_count'];

        ?>  
            <div class="pr2-blog-section">
                <div class="container">
                    <div class="pr2-blog-slider">
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
                            <div class="pr2-blog-single-item">
                                <a href="<?php the_permalink();?>" class="date">
                                    <h5><?php echo get_the_date('m');?></h5>
                                    <span><?php echo get_the_date('F');?></span>
                                </a>
                                <div class="img-container">
                                    <a href="<?php the_permalink();?>"><img src="<?php echo esc_url($blogv_img['0']);?>" alt="<?php the_title_attribute();?>"></a>
                                </div>
                                <div class="pr2-blog-content">
                                    <div class="pr2-blog-title pr2-headline">
                                        <a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
                                    </div>
                                    <div class="pr2-blog-txt pr2-pera-txt">
                                        <p><?php the_excerpt();?></p>
                                    </div>
                                    <div class="pr2-blog-readmore">
                                        <a href="<?php the_permalink();?>">Explore More <i class="fas fa-long-arrow-alt-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php } wp_reset_query(); } ?>
                        </div>
                    </div>
                </div>
      <?php

              }

      }
