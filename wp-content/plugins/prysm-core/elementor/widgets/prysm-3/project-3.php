<?php

    class prysm3_portfolio extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_portfolio';
        }

        public function get_title() {
            return __( 'Project Three', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'portfolio_listt',
            [
                'label' => __( 'Portfolio List', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        
        $this->add_control(
            'project_count', [
                'label'       => esc_html__( 'Project Count', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );        
        $this->add_control(
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
        $this->end_controls_section();
        $this->start_controls_section(
            'portfolio_content',
            [
                'label' => __( 'portfolio Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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

        $repeater->add_control(
            'hr',
            [
                'type'  => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        

        $repeater->add_control(
			'portfolio_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'portfolio Icon', 'prysm' ),
                'type' => \Elementor\Controls_Manager::ICONS,
            ]
        );
        $repeater->add_control(
            'category', [
                'label'       => esc_html__( 'Category', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'portfolio_boxes',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();

            $this->start_controls_section(
                'portfolio_style_list',
                [
                    'label' => esc_html__( 'Portfolio List Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'pro_list_item_color',
                [
                    'label'     => esc_html__( 'Project List Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-project-content .pr5-project-left ul li a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'pro_list_hover_item_color',
                [
                    'label'     => esc_html__( 'Project List Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-project-content .pr5-project-left ul li a:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'pro_list_item_bg',
                [
                    'label'     => esc_html__( 'Project List Background', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-project-content .pr5-project-left ul li a' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'pro_list_hover_item_bg',
                [
                    'label'     => esc_html__( 'Project List Hover BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-project-content .pr5-project-left ul li a:hover' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'project_list_item_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-project-content .pr5-project-left ul li a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'portfolio_style_info',
                [
                    'label' => esc_html__( 'Portfolio Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'portfolio_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'overlay_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr5-project-content .pr5-project-tab .pr5-project-column .pr5-project-overlay',
                ]
            );
            
            $this->add_control(
                'port_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title__color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-project-content .pr5-project-tab .pr5-project-column .pr5-project-overlay .pr5-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-project-content .pr5-project-tab .pr5-project-column .pr5-project-overlay .pr5-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__category_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Category Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tx_text_color',
                [
                    'label'     => esc_html__( 'Content Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-project-content .pr5-project-tab .pr5-project-column .pr5-project-overlay .pr5-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-project-content .pr5-project-tab .pr5-project-column .pr5-project-overlay .pr5-subtitle',
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
            $portfolio_boxes        = $settings['portfolio_boxes'];
            $project_count        = $settings['project_count'];
            $project_order        = $settings['project_order'];

        ?>
        <div class="pr5-project-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="pr5-project-left">
                        <ul class="nav">
                        <?php

                        $args = array(
                            'post_type'      => array( 'portfolio' ),
                            'post_status'    => 'publish',
                            'posts_per_page' => $project_count,
                            'order'          => $project_order,
                        );
                        $query = new  \WP_Query($args);

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
                <div class="col-lg-9">
                    <div class="pr5-project-tab">
                        <div class="tab-pane" id="business">
                            <div class="row pr5-tab-content-slider">
                            <?php $shape = 0; foreach($portfolio_boxes as $index => $box): $shape++;?>
                            <?php  if( $box['portfolio_id'] ) : ?>
                                <div class="col-lg-6 pr5-tab-single-item">
                                    <div class="pr5-project-column">
                                        <img src="<?php echo esc_url($box['portfolio_image']['url']);?>" alt="">
                                        <div class="pr5-project-overlay">
                                            <div class="pr5-project-overlay-content">
                                                <span class="pr5-subtitle"><a href="#"><?php echo esc_html($box['category']);?></a></span>
                                                <div class="pr5-headline">
                                                    <a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><h4><?php echo get_the_title($box['portfolio_id']);?></h4></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pr5-project-readmore-btn">
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
