<?php

    class ag2_fanfact extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_fanfact';
        }

        public function get_title() {
            return __( 'Agency Two Fanfact', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'fanfact_contetn',
                [
                    'label' => __( 'Fanfact Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'fnf_bg_img',
                [
                    'label' => esc_html__( 'Fanfact Background Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater = new \Elementor\Repeater();

        
            $repeater->add_control(
                'fnf_img',
                [
                    'label' => esc_html__( 'Fanfact Icon Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'symbole', [
                    'label'       => esc_html__( 'Symbole', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'fanfacts',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'fnf_style',
                [
                    'label' => esc_html__( 'Fanfact Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'section_bg_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section BG Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_bg_clr',
                [
                    'label'     => esc_html__( 'Section BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .counter-section-six' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'fnf_icon_bg_stryl',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon BG Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-eight .column .inner .icon' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'fnf_number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'number_color',
                [
                    'label'     => esc_html__( 'Number Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-eight .column .inner .count-outer' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'number__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-eight .column .inner .count-outer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '50',
                            ],
                        ],
                    ],
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
                        '{{WRAPPER}} .fact-counter-eight .column .inner .counter-title' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'desc__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-eight .column .inner .counter-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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

            $settings     = $this->get_settings_for_display();
            $fnf_bg_img  = $settings['fnf_bg_img']['url'];
            $fanfacts  = $settings['fanfacts'];

        ?>

        <!-- Counter Section Six -->
        <section class="counter-section-six" style="background-image: url(<?php echo esc_url($fnf_bg_img);?>)">
            <div class="auto-container">
                <div class="inner-container">
                    <!-- Fact Counter Eight -->
                    <div class="fact-counter-eight">
                        <div class="row clearfix">
                            <?php foreach($fanfacts as $item):?>
                            <!-- Column -->
                            <div class="column counter-column col-lg-4 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="icon"><img src="<?php echo esc_url($item['fnf_img']['url']);?>" alt="" /></div>
                                    <div class="count-outer count-box">
                                        <span class="count-text counter" data-speed="3500"><?php echo esc_html($item['number']);?></span><?php echo esc_html($item['symbole']);?>
                                    </div>
                                    <div class="counter-title"><?php echo esc_html($item['title']);?></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Counter Section Six -->
      <?php

              }

      }
