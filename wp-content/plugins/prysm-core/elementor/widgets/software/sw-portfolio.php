<?php

    class sw_portfolio_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_portfolio_item';
        }

        public function get_title() {
            return __( 'Software Portfolio', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'portfolio_content',
            [
                'label' => __( 'Portfolio Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'portfolio_id', [
                'label'       => esc_html__( 'Select Portfolio', 'prysm' ),
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
            'portfolio_img', [
                'label'       => esc_html__( 'Portfolio Image', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'category', [
                'label'       => esc_html__( 'Portfolio Category', 'prysm' ),
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
                'portfolio_style_info',
                [
                    'label' => esc_html__( 'Portfolio Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'portfolio_title',
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
                        '{{WRAPPER}} .pr3-portfolio-slider .pr3-pf-item .pr3-pf-content .pr3-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-portfolio-slider .pr3-pf-item .pr3-pf-content .pr3-headline h4',
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
                'cate_color',
                [
                    'label'     => esc_html__( 'Category Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-portfolio-slider .pr3-pf-item .pr3-pf-content .pr3-pf-meta span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cate_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-portfolio-slider .pr3-pf-item .pr3-pf-content .pr3-pf-meta span',
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
            $portfolio_boxes      = $settings['portfolio_boxes'];

        ?>
        <!-- Portfolio Section -->
        <div class="container">               
            <div class="pr3-portfolio-slider">
                <?php $shape = 0; foreach($portfolio_boxes as $index => $box): $shape++;?>
                <?php  if( $box['portfolio_id'] ) : ?>
                <div class="pr3-pf-item">
                    <img src="<?php echo esc_url($box['portfolio_img']['url']);?>" alt="">
                    <div class="pr3-pf-content">
                        <div class="pr3-headline">
                            <a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><h4><?php echo get_the_title($box['portfolio_id']);?></h4></a>
                        </div>
                        <div class="pr3-pf-meta">
                            <span><?php echo esc_html($box['category']);?></span>
                        </div>
                        <a href="<?php echo get_the_permalink($box['portfolio_id']);?>" class="pr3-pf-readmore"><i class="flaticon-right-arrow"></i></a>
                    </div>
                </div>
                <?php endif; endforeach;?>
            </div>
        </div>
        <!-- End Portfolio Section -->

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
