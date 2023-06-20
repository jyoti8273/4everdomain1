<?php

    class prysm3_blog_grid extends \Elementor\Widget_Base {

        public function get_name() {
            return 'blog-grid-slide-3';
        }

        public function get_title() {
            return __( 'Blog Grid 3', 'prysm' );
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
                        '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-blog-column-content .pr5-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-blog-column-content .pr5-headline h4',
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
                        '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-blog-column-content .pr5-headline h4:hover' => 'color: {{VALUE}} ',
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
                    'selector' => '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-blog-column-content .pr5-blog-meta span',
                ]
            );
            $this->add_control(
                'blog_meta_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-blog-column-content .pr5-blog-meta span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'blog_meta_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-blog-column-content .pr5-blog-meta span',
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
                        '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-img-wrapper .pr5-blog-overlay a' => 'color: {{VALUE}} '
                    ],
                ]
            );
            $this->add_control(
                'more_bg_color',
                [
                    'label'     => esc_html__( 'BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-img-wrapper .pr5-blog-overlay a' => 'background: {{VALUE}} '
                    ],
                ]
            );
            $this->add_control(
                'bg_overlay',
                [
                    'label'     => esc_html__( 'Overlay BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-blog-content .pr5-blog-slider .pr5-blog-item .pr5-img-wrapper .pr5-blog-overlay' => 'background: {{VALUE}} '
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
                <div class="pr5-blog-content">
                <div class="pr5-blog-slider">
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
                <div class="pr5-blog-item">
                    <div class="pr5-img-wrapper">
                         <img src="<?php echo esc_url($blogv_img['0']);?>" alt="<?php the_title_attribute();?>">
                        <div class="pr5-blog-overlay">
                            <a href="<?php the_permalink();?>"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="pr5-blog-column-content">
                        <div class="pr5-headline">
                            <a href="<?php the_permalink();?>"><h4><?php the_title();?></h4></a>
                        </div>
                        <div class="pr5-blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> <?php echo get_the_date('m M Y');?></span>
                            <span><i class="far fa-comments"></i> Comments(<?php echo esc_attr(get_comments_number());?>)</span>
                        </div>
                    </div>
                </div>
            <?php } wp_reset_query(); } ?>
            </div>
        </div>
      <?php

              }

      }
