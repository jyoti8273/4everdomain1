<?php

    class cont_fanfact_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'cont_fanfact_item';
        }

        public function get_title() {
            return __( 'Consulting V2 Fanfact', 'prysm' );
        } 

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'agency_info_content',
                [
                    'label' => __( 'Agency Info Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $repeater = new \Elementor\Repeater();   
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'Icon', 'prysm' ),
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
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'fanfacts',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
           
            
            $this->end_controls_section();

            $this->start_controls_section(
                'slider_style',
                [
                    'label' => esc_html__( 'Hero Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'fnf_number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_count_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-two .column .inner .count-outer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
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
                'fnf_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact Title  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-two .column .inner .counter-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $fanfacts = $settings['fanfacts'];

        ?>
        <!-- Counter Section Two -->
        <section class="counter-section-two">
            <div class="auto-container">
                <!-- Fact Counter Two -->
                <div class="fact-counter-two">
                    <div class="row clearfix">
                        <?php foreach($fanfacts as $item):?>
                        <!-- Column -->
                        <div class="column counter-column col-lg-3 col-md-6 col-sm-12">
                            <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <div class="icon"><i class="<?php echo esc_attr($item['icon']);?>"></i></div>
                                <div class="count-outer count-box">
                                    <span class="count-text counter"><?php echo esc_html($item['number']);?></span><?php echo esc_html($item['symbole']);?>
                                </div>
                                <div class="counter-title"><?php echo __($item['title']);?></div>
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
