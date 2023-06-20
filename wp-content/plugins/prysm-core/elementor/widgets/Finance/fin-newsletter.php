<?php

    class finance_newsleter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_newsleter';
        }

        public function get_title() {
            return __( 'Finance Newsleter', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'counter__content',
                [
                    'label' => __( 'Counter Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'newsleter_title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'newsleter_id', [
                    'label'       => esc_html__( 'Newsleter Shortcode', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'newsleter_text', [
                    'label'       => esc_html__( 'Newsleter Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'newsleter_img',
                [
                    'label' => __( 'Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'Counter_box_style',
                [
                    'label' => esc_html__( 'Counter Box Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Border', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column',
                ]
            );
            
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column',
                ]
            );
            $this->add_control(
                'box_radius',
                [
                    'label' => __( 'Box Rpund', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'Counter_box_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'shape_box_bg_color',
                    'label'    => __( 'Shape BG Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column::after',
                ]
            );
    
            $this->end_controls_section();
            $this->start_controls_section(
                'Counter_style',
                [
                    'label' => esc_html__( 'Counter Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'counter_icon',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Icon', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'font-size',
                [
                    'label' => __( 'Font Size', 'prysm' ),
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
                        '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl .pr5-icon-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'counter_icon_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl .pr5-icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'counter_title_stylish',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'counter_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl .pr5-subtitle span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl .pr5-subtitle span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_counter_num_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'numbert_color',
                [
                    'label'     => esc_html__( 'Number Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl .pr5-headline span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'no_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-choose-us-right .pr5-choose-us-column .pr5-ch-cl .pr5-headline span',
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
            $newsleter_title         = $settings['newsleter_title'];
            $newsleter_text          = $settings['newsleter_text'];
            $newsleter_id            = $settings['newsleter_id'];
            $newsleter_img           = $settings['newsleter_img']['url'];

        ?>  
        <div class="pr6-footer-section">
            <div class="pr6-footer-top" data-background="<?php echo esc_url($newsleter_img);?>">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="pr6-ft-left wow fadeInUp">
                            <div class="pr6-headline">
                                <h3><?php echo esc_html($newsleter_title);?></h3>
                            </div>
                            <div class="pr6-pera-txt">
                                <p><?php echo __($newsleter_text);?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pr6-ft-subscription wow fadeInUp">
                            <?php echo do_shortcode($newsleter_id);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <?php

              }

      }
