<?php

    class con_service_v2_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_service_v2_item';
        }

        public function get_title() {
            return __( 'Consulting Service V2', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'service_content',
            [
                'label' => __( 'Service Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_id', [
                'label'       => esc_html__( 'Select Service', 'prysm' ),
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
            'service_icon',
            [
                'label' => esc_html__( 'Service Icon Image', 'prysm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        
        $repeater->add_control(
            'box_info', [
                'label'       => esc_html__( 'Service Excerpt', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'service_boxes',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'service_style',
            [
                'label' => esc_html__( 'Service Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finance-service-section .finance-carousel .finance-wrapper .wrapper-content h4 a' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'title_hover_color',
            [
                'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .homePageOne .finance-service-section .finance-carousel .finance-wrapper:hover .wrapper-content h4 a:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .finance-service-section .finance-carousel .finance-wrapper .wrapper-content h4',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '500',
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
            'service_info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Info Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .finance-service-section .finance-carousel .finance-wrapper .wrapper-content p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'desc_hover_color',
            [
                'label'     => esc_html__( 'Description Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .homePageOne .finance-service-section .finance-carousel .finance-wrapper:hover .wrapper-content p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'border_color',
            [
                'label'     => esc_html__( 'Border Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .homePageOne .finance-service-section .finance-carousel .finance-wrapper .wrapper-content' => 'border-bottom: 4px solid {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .finance-service-section .finance-carousel .finance-wrapper .wrapper-content p',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
                    ],
					'font_weight' => [
						'default' => '300',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
            ]
        );
       
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $service_boxes        = $settings['service_boxes'];

        ?>
        <section class="homePageOne">
            <div class="finance-service-section">
                <div class="container text-center">
                    <div class="finance-carousel owl-carousel owl-theme">
                        <?php $shape = 0; foreach($service_boxes as $index => $box): $shape++;?>
                        <?php  if( $box['service_id'] ) : ?>
                        <div class="finance-wrapper item">
                            <div class="icon"><img src="<?php echo esc_html($box['service_icon']['url']);?>" alt=""></div>

                            <div class="wrapper-content">
                                <h4><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h4>
                                <p><?php echo __($box['box_info']);?></p>
                            </div>

                            <div class="hover">
                                <span class="hover-one"></span>
                                <span class="hover-two"></span>
                                <span class="hover-three"></span>
                                <span class="hover-four"></span>
                            </div>
                        </div>
                        <?php endif; endforeach;?>
                    </div>
                </div>
            </div>
        </section> <!-- finance-service-section -->
      <?php

              }

    protected function select_param_posts() {
    $args = wp_parse_args( [
        'post_type'   => 'services',
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
