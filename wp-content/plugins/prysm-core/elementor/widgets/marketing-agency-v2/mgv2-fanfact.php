<?php

    class mgv2_fanfact_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_fanfact_section';
        }

        public function get_title() {
            return __( 'Marketing V2 fanfact', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'fanfact_content',
                [
                    'label' => __( 'fanfact Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'fanfact_img',
                [
                    'label' => __( 'fanfact Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'ICON', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'number',
                [
                    'label' => __( 'Progress Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'symbole',
                [
                    'label' => __( 'Progress Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'fanfactitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            ); 
            $this->end_controls_section();

            $this->start_controls_section(
                'fanfact_style',
                [
                    'label' => esc_html__( 'Fanfact Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'fanfact_number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-four .column .inner .count-outer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
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
                'serv_sub_title_color',
                [
                    'label' => esc_html__( 'fanfact Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-four .column .inner .count-outer' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'fanfact Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-four .column .inner .counter-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_title_color',
                [
                    'label' => esc_html__( 'fanfact Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-four .column .inner .counter-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_icon_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'fnf_icon_color',
                [
                    'label' => esc_html__( 'FanFact Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-four .column .inner .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $fanfact_img        = $settings['fanfact_img'];
            $fanfactitems      = $settings['fanfactitems'];
            

        ?>
            <!-- Counter Section Three -->
            <section class="counter-section-three">
                <div class="image-layer" style="background-image: url(<?php echo esc_url($fanfact_img['url']);?>)"></div>
                <div class="container">
                    <!-- Fact Counter Two -->
                    <div class="fact-counter-four">
                        <div class="row clearfix">
                            <?php foreach($fanfactitems as $item):?>
                            <!-- Column -->
                            <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                                <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                    <div class="count-outer count-box">
                                        <span class="count-text counter" data-speed="3587" data-stop="10"><?php echo esc_html($item['number']);?></span><?php echo esc_html($item['symbole']);?>
                                    </div>
                                    <div class="counter-title"><?php echo esc_html($item['title']);?></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Counter Section Three -->
      <?php

              }

      }
