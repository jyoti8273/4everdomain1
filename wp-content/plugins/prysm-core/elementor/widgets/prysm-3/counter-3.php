<?php

    class prysm3_fan_counter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_fan_counter';
        }

        public function get_title() {
            return __( 'prysm3 Counter', 'prysm' );
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
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            $this->add_control(
                'counters',
                [
                    'label'       => __( 'Add Item', 'prysm-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
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
            $counters            = $settings['counters'];

        ?>  
        
        <div class="pr5-choose-us-right">
            <div class="row">
                <?php foreach($counters as $count):?>
                <div class="col-sm-6">
                    <div class="pr5-choose-us-column wow fadeInUp">
                        <div class="pr5-ch-cl">
                            <div class="pr5-icon-wrapper">
                                <i class="<?php echo esc_attr($count['icon']);?>"></i>
                            </div>
                            <div class="pr5-headline">
                                <span class="count-text"><?php echo esc_attr($count['number']);?></span>
                            </div>
                            <div class="pr5-subtitle">
                                <span><?php echo esc_html($count['title']);?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
      <?php

              }

      }
