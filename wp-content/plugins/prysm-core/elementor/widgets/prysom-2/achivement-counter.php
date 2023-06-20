<?php

    class prysm2_achivement_counter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm2_achivement_counter';
        }

        public function get_title() {
            return __( 'Prysm2 Counter', 'prysm' );
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
                'shape_1',
                [
                    'label' => __( 'Shape Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape_2',
                [
                    'label' => __( 'Shape Image Two', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater->add_control(
                'symbol', [
                    'label'       => esc_html__( 'Symbol', 'prysm' ),
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
                    'selector' => '{{WRAPPER}} .pr2-achivement-column',
                ]
            );
            
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-achivement-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr2-achivement-column',
                ]
            );
            $this->add_control(
                'box_radius',
                [
                    'label' => __( 'Box Rpund', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-achivement-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    'selector' => '{{WRAPPER}} .pr2-achivement-column',
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
                'counter_icon_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} ..pr2-achivement-column .icon-container i' => 'color: {{VALUE}} ',
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
                        '{{WRAPPER}} ..pr2-achivement-column .tagline span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} ..pr2-achivement-column .tagline span',
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
                        '{{WRAPPER}} ..pr2-achivement-column .pr2-headline h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'no_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} ..pr2-achivement-column .pr2-headline h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_counter_sm_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Symbol Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'symbol_color',
                [
                    'label'     => esc_html__( 'Symbol Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} ..pr2-achivement-column .pr2-headline span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'symbl_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} ..pr2-achivement-column .pr2-headline span',
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
            $shape_1            = $settings['shape_1']['url'];
            $shape_2            = $settings['shape_2']['url'];

        ?>        
        <div class="pr2-achivement-contents">
            <span class="pr2-circle-shape-2" data-parallax='{"scale": 1.3}'><img src="<?php echo esc_url($shape_1);?>" alt=""></span>
            <span class="pr2-circle-shape-3" data-parallax='{"x": 80}'><img src="<?php echo esc_url($shape_2);?>" alt=""></span>
            <div class="row">
                <?php foreach($counters as $count):?>
                <div class="col-lg-3 col-md-4">
                    <div class="pr2-achivement-column wow slideInUp" data-wow-delay="0.1s">
                        <div class="icon-container">
                        <?php \Elementor\Icons_Manager::render_icon( $count['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="pr2-headline">
                            <h2 class="counterup"><?php echo esc_attr($count['number']);?></h2><span><?php echo esc_attr($count['symbol']);?></span>
                        </div>
                        <div class="tagline">
                            <span><?php echo esc_html($count['title']);?></span>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>

      <?php

              }

      }
