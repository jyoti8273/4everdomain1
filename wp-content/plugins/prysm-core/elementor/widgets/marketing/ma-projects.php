<?php

    class ma_projects_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ma_projects_item';
        }

        public function get_title() {
            return __( 'Marketing Projects', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'projects_content',
            [
                'label' => __( 'Projects Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'sub_title', [
                'label'       => esc_html__( 'Sub Heading', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'title', [
                'label'       => esc_html__( 'Heading', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'project_tb_title', [
                'label'       => esc_html__( 'Project Tab Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'project_count', [
                'label'       => esc_html__( 'How Many Project You want to Shaow', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => -1,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'project_order', [
                'label'   => esc_html__( 'Project Order', 'prysm' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'asc',
                'options' => [
                    'asc'  => esc_html__( 'ASC ', 'prysm' ),
                    'desc' => esc_html__( 'DESC', 'prysm' ),
                ],
            ]
        ); 
        $this->add_control(
            'projects_tabs',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();

            $this->start_controls_section(
                'projects_style_info',
                [
                    'label' => esc_html__( 'projects Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'pro_tab_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Tab Item Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'tab-title__color',
                [
                    'label'     => esc_html__( 'Tab Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-case-content .pr-mark-tab-btn .nav-tabs .nav-link' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tab_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-case-content .pr-mark-tab-btn .nav-tabs .nav-link',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'project_title_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'project_title',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-case-innerbox .pr-mark-inner-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'project_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-case-innerbox .pr-mark-inner-text h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__project_tag_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Category', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tag_color',
                [
                    'label'     => esc_html__( 'Tag Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-case-innerbox .pr-mark-inner-text span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'tag_bg_color',
                [
                    'label'     => esc_html__( 'Tag BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-case-innerbox .pr-mark-inner-text span' => 'background: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cate_tag_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-case-innerbox .pr-mark-inner-text span',
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

            $settings             = $this->get_settings_for_display();
            $projects_tabs        = $settings['projects_tabs'];

            $sub_title        = $settings['sub_title'];
            $title            = $settings['title'];

        ?>
        <section id="pr-mark-case" class="pr-mark-case-section">
            <div class="container">
                <div class="pr-mark-section-title headline pera-content text-center middle-align">
                    <span class="pr-mark-section-title-tag"><?php echo esc_html($sub_title);?></span>
                    <h2><?php echo esc_html($title);?></h2>
                </div>
                <div class="pr-mark-case-content">
                    <div class="pr-mark-case-tab-area">
                        <div class="pr-mark-tab-btn">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $item = 0; foreach($projects_tabs as $tab): $item++;
                                 if(1 == $item):
                                ?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pro-tab-<?php echo esc_attr($item);?>" data-bs-toggle="tab" data-bs-target="#home-<?php echo esc_attr($item);?>" type="button" role="tab" aria-controls="home" aria-selected="true"><?php echo esc_html($tab['project_tb_title']);?></button>
                                </li>
                                <?php else:?>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pro-tab-<?php echo esc_attr($item);?>" data-bs-toggle="tab" data-bs-target="#home-<?php echo esc_attr($item);?>" type="button" role="tab" aria-controls="home" aria-selected="true"><?php echo esc_html($tab['project_tb_title']);?></button>
                                </li>
                                <?php endif; endforeach;?>                               
                            </ul>
                        </div>
                        <div class="pr-mark-case-tab-inner-content">
                            <div class="tab-content" id="myTabContent">
                            <?php $item = 0; foreach($projects_tabs as $tab): $item++;
                                 if(1 == $item):
                                ?>    
                                <div class="tab-pane fade show active" id="home-<?php echo esc_attr($item);?>" role="tabpanel" aria-labelledby="pro-tab-<?php echo esc_attr($item);?>">
                                    <div class="pr-mark-tab-content-area">
                                        <div class="pr-mark-case-slider">
                                            <?php

                                            $args = array(
                                                'post_type'      => array( 'portfolio' ),
                                                'post_status'    => 'publish',
                                                'posts_per_page' => $item['project_count'],
                                                'order'          => $item['project_order'],
                                            );
                                            $query = new  \WP_Query($args);

                                            if ( $query->have_posts() ) {
                                            while ( $query->have_posts() ) {
                                            $query->the_post();
                                            $idd = get_the_ID();
                                            $project_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

                                            $portfoliocates = get_the_terms( $idd, 'portfolio_category' );
                                            if ( $portfoliocates && !is_wp_error( $portfoliocates ) ) {
                                                $portfolio_category_list = array();
                                                foreach ( $portfoliocates as $cate ) {
                                                    $portfolio_category_list[] = $cate->slug;
                                                }
                                                $portfolio_categorye_asign_list = join( ' ', $portfolio_category_list );
                                            } else {
                                                $portfolio_categorye_asign_list = '';
                                            }
                                            ?>
                                            <div class="pr-item-innerbox">
                                                <div class="pr-mark-case-innerbox wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                    <div class="pr-mark-inner-img position-relative">
                                                        <img src="<?php echo esc_url($project_img['0']); ?>" alt="">
                                                        <div class="pr-mark-case-link d-flex justify-content-center align-items-center position-absolute">
                                                            <a href="<?php the_permalink();?>"><i class="flaticonv7-chain"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="pr-mark-inner-text headline position-relative">
                                                        <span><a href="#"><?php echo esc_html($cate->name);?></a></span>
                                                        <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } wp_reset_query(); } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php else:?>
                                    <div class="tab-pane fade" id="home-<?php echo esc_attr($item);?>" role="tabpanel" aria-labelledby="pro-tab-<?php echo esc_attr($item);?>">
                                        <div class="pr-mark-tab-content-area">
                                            <div class="pr-mark-case-slider">
                                                <?php

                                                $args = array(
                                                    'post_type'      => array( 'portfolio' ),
                                                    'post_status'    => 'publish',
                                                    'posts_per_page' => $item['project_count'],
                                                    'order'          => $item['project_order'],
                                                );
                                                $query = new  \WP_Query($args);

                                                if ( $query->have_posts() ) {
                                                while ( $query->have_posts() ) {
                                                $query->the_post();
                                                $idd = get_the_ID();
                                                $project_img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

                                                $portfoliocates = get_the_terms( $idd, 'portfolio_category' );
                                                if ( $portfoliocates && !is_wp_error( $portfoliocates ) ) {
                                                    $portfolio_category_list = array();
                                                    foreach ( $portfoliocates as $cate ) {
                                                        $portfolio_category_list[] = $cate->slug;
                                                    }
                                                    $portfolio_categorye_asign_list = join( ' ', $portfolio_category_list );
                                                } else {
                                                    $portfolio_categorye_asign_list = '';
                                                }
                                                ?>
                                                <div class="pr-item-innerbox">
                                                    <div class="pr-mark-case-innerbox wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                                                        <div class="pr-mark-inner-img position-relative">
                                                            <img src="<?php echo esc_url($project_img['0']); ?>" alt="">
                                                            <div class="pr-mark-case-link d-flex justify-content-center align-items-center position-absolute">
                                                                <a href="<?php the_permalink();?>"><i class="flaticonv7-chain"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="pr-mark-inner-text headline position-relative">
                                                            <span><a href="#"><?php echo esc_html($cate->name);?></a></span>
                                                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } wp_reset_query(); } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; endforeach;?> 
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
        'post_type'   => 'projectss',
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
