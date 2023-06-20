<?php

    class ag_portfolio extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_portfolio';
        }

        public function get_title() {
            return __( 'Agency portfolio', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-gallery-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'portfolio_content',
                [
                    'label' => __( 'portfolio Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'heading', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );            
            $this->add_control(
                'infos', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'list_count', [
                    'label'       => esc_html__( 'How Many portfolio List You want to Shaow', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'default'     => -1,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'list_order', [
                    'label'   => esc_html__( 'Portfolio List Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
                ]
            );
            $this->add_control(
                'all_title', [
                    'label'       => esc_html__( 'All Project Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'all_link', [
                    'label'       => esc_html__( 'All Project Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'portfolio_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
            $this->add_control(
                'portfolio_boxes',
                [
                    'label'       => __( 'Add Item', 'prysm-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'portfolio_style',
                [
                    'label' => esc_html__( 'portfolio Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'sub_heading_style',
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
                        '{{WRAPPER}} .pr-an-section-title span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_br_color',
                [
                    'label'     => esc_html__( 'Sub Heading Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title span:after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_h_typography',
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
                'heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'heading_color',
                [
                    'label'     => esc_html__( 'Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'heading_typography',
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
                'info_item_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'info_item_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_item_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'portfolio_name',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Name Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'portfolio_name_clr',
                [
                    'label'     => esc_html__( 'Name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-portfolio-inner-item .pr-an-portfolio-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'portfolio_name_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-portfolio-inner-item .pr-an-portfolio-text h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'portfolio_position_name',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Position Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'portfolio_position_clr',
                [
                    'label'     => esc_html__( 'Name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-portfolio-inner-item .pr-an-portfolio-text span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'portfolio_pose_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-portfolio-inner-item .pr-an-portfolio-text span',
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

            $settings     = $this->get_settings_for_display();
            $portfolio_boxes   = $settings['portfolio_boxes'];
            $infos        = $settings['infos'];
            $heading      = $settings['heading'];
            $sub_heading  = $settings['sub_heading'];
            $all_title  = $settings['all_title'];
            $all_link  = $settings['all_link'];
            $list_count  = $settings['list_count'];
            $list_order  = $settings['list_order'];
            $all_title  = $settings['all_title'];
            $all_link  = $settings['all_link'];

        ?>  
        <section id="pr-an-project" class="pr-an-project-section">
             <div class="container">
                <div class="pr-an-section-title headline pera-content wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                    <span><?php echo esc_html($sub_heading);?></span>
                    <h2><?php echo esc_html($heading);?></h2>
                    <div class="pr-an-project-title-text d-flex justify-content-between">
                        <p><?php echo __($infos);?></p>
                        <div class="pr-an-btn">
                            <a href="<?php echo esc_url($all_link['url']);?>"><?php echo esc_html($all_title);?></a>
                        </div>
                    </div>
                </div>
                <div class="pr-an-project-content">
                    <div class="row">
                        <div class="col-lg-2 wow fadeInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="pr-an-project-btn ul-li-block position-relative">
                                <ul>                                    
                                    <li><a href="<?php echo esc_url($all_link['url']);?>"><?php echo esc_html($all_title);?></a></li>
                                <?php

                                    $args = array(
                                        'post_type'      => array( 'portfolio' ),
                                        'post_status'    => 'publish',
                                        'posts_per_page' => $list_count,
                                        'order'          => $list_order,
                                    );
                                    $query = new WP_Query( $args );
                                    if ( $query->have_posts() ) {
                                    while ( $query->have_posts() ) {
                                    $query->the_post();
                                    $idd = get_the_ID();
                                    $blogv_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                                ?>
                                    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                                <?php } wp_reset_query(); } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-10 wow fadeInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="pr-an-project-slider-wrap position-relative">
                                <div class="carousel_nav  clearfix">
                                    <button type="button" class="project-left_arrow float-left"><i class="far fa-long-arrow-left"></i></button>
                                    <button type="button" class="project-right_arrow float-right"><i class="far fa-long-arrow-right"></i></button>
                                </div>
                                <div class="pr-an-project-slider">
                                   <?php $shape = 0; foreach($portfolio_boxes as $index => $box): $shape++;?>
                                    <?php  if( $box['portfolio_id'] ) : ?>
                                    <div class="pr-item-innerbox">
                                        <div class="pr-an-project-slider-inner-item position-relative">
                                            <div class="pr-an-project-slider-img">
                                                <img src="<?php echo get_the_post_thumbnail_url($box['portfolio_id'], 'full')?>" alt="">
                                            </div>
                                            <div class="pr-an-project-slider-text text-center headline">
                                                <h3><a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><?php echo get_the_title($box['portfolio_id']);?></a></h3>
                                                <span>UI/UX Design</span>
                                            </div>
                                            <div class="pr-an-project-link">
                                                <a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><i class="fas fa-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endif; endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>	

      <?php

        }
        protected function select_param_posts() {
            $args = wp_parse_args( [
                'post_type'   => 'portfolio',
                'numberposts' => -1,
                'orderby'     => 'title',
                'order'       => 'ASC',
            ] );
        
            $query_query = get_posts( $args );
        
            $posts = [];
            if ( $query_query ) {
                foreach ( $query_query as $query ) {
                    $posts[$query->ID] = $query->post_title;
                }
            }
        
            return $posts;
        }

      }
