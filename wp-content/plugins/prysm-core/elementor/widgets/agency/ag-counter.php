<?php

    class ag_counter_counter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_counter_counter';
        }

        public function get_title() {
            return __( 'Agency Counter', 'prysm' );
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
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );
            
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
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
                'symbole', [
                    'label'       => esc_html__( 'Symbole', 'prysm' ),
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
                        '{{WRAPPER}} .pr-an-funfact-inner-item .pr-an-funfact-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'counter_icon_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-funfact-inner-item .pr-an-funfact-icon i' => 'color: {{VALUE}} ',
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
                        '{{WRAPPER}} .pr-an-funfact-inner-item .pr-an-funfact-text p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-funfact-inner-item .pr-an-funfact-text p',
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
                        '{{WRAPPER}} .pr-an-funfact-inner-item .pr-an-funfact-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'no_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-funfact-inner-item .pr-an-funfact-text h3',
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
        
        <section id="pr-an-funfact" class="pr-an-funfact-section">
            <div class="container">
                <div class="pr-an-funfact-content">
                    <div class="row">
                        <?php foreach($counters as $item):?>
                        <div class="col-lg-4 col-md-6">
                            <div class="pr-an-funfact-inner-item d-flex">
                                <div class="pr-an-funfact-icon d-flex align-items-center justify-content-center">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </div>
                                <div class="pr-an-funfact-text headline pera-content">
                                    <h3><span class="counter"><?php echo esc_attr($item['number']);?></span><?php echo esc_attr($item['symbole']);?></h3>
                                    <p><?php echo esc_html($item['title']);?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
