<?php

    class sw_service_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_service_item';
        }

        public function get_title() {
            return __( 'Software Service', 'prysm' );
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
        $this->add_control(
            'service_shape',
            [
                'label' => esc_html__( 'Service Shape', 'prysm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
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
            'icon',
            [
                'label' => esc_html__( 'Service Icon', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
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
            'btn_text', [
                'label'       => esc_html__( 'Button Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon_bg_color',
                'label'    => __( 'Background', 'prysomn' ),
                'types'    => ['classic', 'gradient'],
                'exclude'  => ['image'],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-icon-wrapper i',
            ]
        );
        $repeater->add_responsive_control(
			'item_top_space',
			[
				'label' => __( 'Margin Top', 'prysm' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => -500,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => -100,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'margin-top: {{SIZE}}{{UNIT}};',
				],
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
        $this->add_control(
            'more_btn', [
                'label'       => esc_html__( 'Service Button', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'more_btn_link',
            [
                'label' => __( 'Button Link', 'prysm' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'prysm' ),
            ]
        );
        $this->end_controls_section();

            $this->start_controls_section(
                'service_style_info',
                [
                    'label' => esc_html__( 'Service Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
                        '{{WRAPPER}} .pr3-service-column .pr3-headline h5' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-service-column .pr3-headline h5',
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
                        '{{WRAPPER}} .pr3-service-column .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-service-column .pr3-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__link_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Link Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'more_text_color',
                [
                    'label'     => esc_html__( 'More Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-service-content .pr3-service-column a' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'more_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-service-content .pr3-service-column a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
           
            $this->end_controls_section();

            $this->start_controls_section(
                'btn_one_style',
                [
                    'label' => esc_html__( 'Button One Style', 'prysm' ),
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
                        '{{WRAPPER}} .pr3-primary-btn a' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a::after',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr3-primary-btn a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a:hover, .pr3-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $service_shape        = $settings['service_shape']['url'];
            $service_boxes        = $settings['service_boxes'];
            $more_btn             = $settings['more_btn'];
            $more_btn_link        = $settings['more_btn_link'];

        ?>
        <section class="pr3-service-section">
            <div class="container">
                <div class="pr3-service-content">
                    <span class="pr3-sr-shape-1"><img src="<?php echo esc_url($service_shape);?>" alt=""></span>
                    <div class="row">
                    <?php $shape = 0; foreach($service_boxes as $index => $box): $shape++;?>
                    <?php  if( $box['service_id'] ) : ?>
                        <div class="col-lg-4 col-md-6 elementor-repeater-item-<?php echo esc_attr($box['_id']);?>">
                            <div class="pr3-service-column wow fadeInUp">
                                <div class="pr3-icon-wrapper">
                                    <i class="<?php echo esc_attr($box['icon']);?>"></i>
                                </div>
                                <div class="pr3-headline">
                                    <h5><?php echo get_the_title($box['service_id']);?></h5>
                                </div>
                                <div class="pr3-pera-txt">
                                    <p><?php echo __($box['box_info']);?></p>
                                </div>
                                <a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo __($box['btn_text']);?> <i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                        <?php endif; endforeach;?>
                    </div>
                    <div class="pr3-primary-btn mt-60 wow fadeInUp" data-wow-delay="0.6s">
                        <a href="<?php echo esc_url($more_btn_link['url']);?>"><?php echo esc_html($more_btn);?></a>
                    </div>
                </div>
            </div>
        </section>

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
