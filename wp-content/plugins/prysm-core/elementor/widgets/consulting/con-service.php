<?php

    class con_service_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_service_item';
        }

        public function get_title() {
            return __( 'Consulting Service', 'prysm' );
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
            'service_img',
            [
                'label' => esc_html__( 'Service Image', 'prysm' ),
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
        $repeater->add_control(
            'readmore_btn', [
                'label'       => esc_html__( 'Button Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'service_icon',
            [
                'label' => esc_html__( 'Service Icon Image', 'prysm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
                    '{{WRAPPER}} .right-choice-section .section-wrapper .content h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .content h4',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '400',
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
                    '{{WRAPPER}} .right-choice-section .section-wrapper .content p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .content p',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
            ]
        );
        $this->add_control(
            'service_btn',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Btn Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Button Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label'     => esc_html__( 'Button Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'btn__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '16',
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
        <section class="right-choice-section">
            <div class="container text-center">
                <div class="row">
                    <?php $shape = 0; foreach($service_boxes as $index => $box): $shape++;?>
                    <?php  if( $box['service_id'] ) : ?>
                    <div class="col-sm-4">
                        <div class="section-wrapper">
                            <div class="caption">
                                <img src="<?php echo esc_html($box['service_img']['url']);?>" alt="">

                                <a href="<?php echo get_the_permalink($box['service_id']);?>" class="hover-view"><?php echo esc_html($box['readmore_btn']);?></a>

                                <div class="hover">
                                    <span class="hover-one"></span>
                                    <span class="hover-two"></span>
                                    <span class="hover-three"></span>
                                    <span class="hover-four"></span>
                                </div>
                            </div>

                            <div class="content">
                                <img src="<?php echo esc_html($box['service_icon']['url']);?>" alt="">
                                <h4><?php echo get_the_title($box['service_id']);?></h4>
                                <p><?php echo __($box['box_info']);?></p>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
            </div>
        </section> <!-- right-choice-section -->
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
