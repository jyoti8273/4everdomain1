<?php

    class finance_portfolio_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_portfolio_item';
        }

        public function get_title() {
            return __( 'Finance portfolio', 'prysm' );
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
            'item_cate', [
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
                'portfolio_style_info',
                [
                    'label' => esc_html__( 'portfolio Style', 'prysm' ),
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
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content',
                ]
            );
            
            $this->add_control(
                'srvh_title',
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
                        '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content .pr6-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content .pr6-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tx_text_color',
                [
                    'label'     => esc_html__( 'Content Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__more_icon_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'More Icon', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content .pr6-case-readmore-btn a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon_bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-case-slider .pr6-case-single .pr6-case-content .pr6-case-readmore-btn a' => 'background: {{VALUE}} ',
                    ],
                ]
            );

           
            $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $portfolio_boxes        = $settings['portfolio_boxes'];

        ?>
        <!-- portfolio Section -->
		<section class="pr6-case-studies">
			<div class="container">
				<div class="pr6-case-slider">
					<div class="choose_slider">
						<div class="choose_slider_items">
							<ul class="pr6-case-vh-slider">
                            <?php $shape = 0; foreach($portfolio_boxes as $index => $box): $shape++;?>
                             <?php  if( $box['portfolio_id'] ) : ?>
								<li class="current_item">
									<div class="pr6-case-single">
										<div class="pr6-img-wrapper">
											<img src="<?php echo esc_url($box['portfolio_image']['url']);?>" alt="">
										</div>
										<div class="pr6-case-content">
											<span><?php echo $box['item_cate'];?></span>
											<div class="pr6-headline">
												<h4><?php echo get_the_title($box['portfolio_id']);?></h4>
											</div>
											<div class="pr6-case-readmore-btn">
												<a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><i class="fas fa-plus"></i></a>
											</div>
										</div>
									</div>
								</li>
                                <?php endif; endforeach;?>
							</ul>
						</div>
					</div>
					<div class="pr6-slider-btn">
						<div><a class="prev-btn btn-arrow" href="#"><i class="fas fa-angle-left"></i></a></div>
						<div><a class="next-btn btn-arrow" href="#"><i class="fas fa-angle-right"></i></a></div>
					</div>
				</div>
				<div class="pr6-primary-btn text-center wow fadeInUp">
					<a href="#">More works <i class="fas fa-arrow-right"></i></a>
				</div>
			</div>
		</section>
		<!-- Get In Touch End -->

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
