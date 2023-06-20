<?php

    class con_fanfact extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_fanfact';
        }

        public function get_title() {
            return __( 'Consulting Fanfact', 'prysm' );
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
                        '{{WRAPPER}} .counting-section .counting-pusher .counting-wrapper .content .count-description .timer' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'number__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .counting-section .counting-pusher .counting-wrapper .content .count-description .timer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
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
                        '{{WRAPPER}} .counting-section .counting-pusher .counting-wrapper .content p' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'desc__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .counting-section .counting-pusher .counting-wrapper .content p',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $fanfacts  = $settings['fanfacts'];

        ?>

        <section class="counting-section section-padding">
            <div class="container">
                <div class="counting-pusher">
                    <?php foreach($fanfacts as $item):?>
                    <div class="counting-wrapper">
                        <span class="icon pull-left"><img src="<?php echo esc_url($item['fnf_img']['url']);?>" alt=""></span>

                        <div class="content">
                            <div class="count-description">
                                <span class="timer"><?php echo esc_attr($item['number']);?></span>
                            </div>
                            <p><?php echo esc_attr($item['title']);?></p>
                        </div>
                    </div>  
                    <?php endforeach;?>
                </div> 
            </div>
        </section> <!-- counting-section -->
      <?php

              }

      }
