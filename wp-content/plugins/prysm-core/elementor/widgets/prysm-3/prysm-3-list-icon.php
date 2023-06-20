<?php

    class prysm3_list_icon_box extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_list_icon_box';
        }

        public function get_title() {
            return __( 'List Icon Box 3', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-list';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'list_icon_infos',
                [
                    'label' => __( 'Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'description', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'list_icon_box_style',
                [
                    'label' => esc_html__( 'Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'icon_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'icon_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_size',
                [
                    'label' => __( 'Icon Size', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'width',
                [
                    'label' => __( 'Width', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'height',
                [
                    'label' => __( 'Height', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'line-height',
                [
                    'label' => __( 'Line Height', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'ic_color_',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'ic_box_bg',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'box_radius',
                [
                    'label' => __( 'Box Rpund', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-left .pr5-list-area ul li .pr5-icon-wrapper i' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            

            
            $this->add_control(
                'content_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Content Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-list-area .pr5-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-list-area .pr5-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_info_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-list-area .pr5-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-list-area .pr5-pera-txt p',
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
            $title   = $settings['title'];
            $description   = $settings['description'];
            $icon   = $settings['icon'];

        ?>
            <div class="pr5-choose-us-left">
                <div class="pr5-list-area">
                    <ul>
                        <li class="wow fadeInUp">
                            <div class="pr5-icon-wrapper">
                                <i class="<?php echo esc_attr($icon);?>"></i>
                            </div>
                            <div class="pr5-list-content">
                                <div class="pr5-headline">
                                    <h4><?php echo esc_html($title);?></h4>
                                </div>
                                <div class="pr5-pera-txt">
                                    <p><?php echo __($description);?></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
      <?php

              }

      }
