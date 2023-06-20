<?php

    class constv4_fanfact_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_fanfact_section';
        }

        public function get_title() {
            return __( 'Consulting V4 fanfact', 'prysm' );
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

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'icon_img',
                [
                    'label' => __( 'Icon Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );  
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .fact-counter-five .column .inner .icon',
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
                    'label' => __( 'Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'symbole',
                [
                    'label' => __( 'Symbole', 'prysm' ),
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
                    'name'           => 'fnf_number_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-five .column .inner .count-outer',
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
                'fnf_no_color',
                [
                    'label' => esc_html__( 'Number Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-five .column .inner .count-outer' => 'color: {{VALUE}}',
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
                    'selector'       => '{{WRAPPER}} .fact-counter-five .column .inner .counter-title',
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
            $this->add_control(
                'serv_title_color',
                [
                    'label' => esc_html__( 'fanfact Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-five .column .inner .counter-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $fanfactitems      = $settings['fanfactitems'];
            

        ?>
        <!-- Counter Section Four -->
        <section class="counter-section-four">
            <div class="container">
                <!-- Fact Counter Five -->
                <div class="fact-counter-five">
                    <div class="row clearfix">
                        <?php foreach($fanfactitems as $item):?>
                        <!-- Column -->
                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="icon"><img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="" /></div>
                                <div class="count-outer count-box">
                                    <span class="count-text counter" data-speed="3500" data-stop="334"><?php echo esc_html($item['number']);?></span><?php echo esc_html($item['symbole']);?>
                                </div>
                                <div class="counter-title"><?php echo esc_html($item['title']);?></div>
                            </div>
                        </div>
                        <?php endforeach;?>                        
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Counter Section Two -->
      <?php

              }

      }
