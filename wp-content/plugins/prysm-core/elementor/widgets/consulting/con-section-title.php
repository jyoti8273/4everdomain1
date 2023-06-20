<?php

    class con_item_heading extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_item_heading';
        }

        public function get_title() {
            return __( 'Consulting Heading Title', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-heading';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'heading__content',
                [
                    'label' => __( 'Heading Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );   
            $this->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );   
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'border_shape',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic'],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .section-title .border-3',
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'section_heading_style',
                [
                    'label' => esc_html__( 'Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'h_title',
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
                        '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .section-title h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '36',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'desc_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Desc Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'desc_color',
                [
                    'label'     => esc_html__( 'Description Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'desc__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .section-title p',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
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

            $settings     = $this->get_settings_for_display();
            $title        = $settings['title'];
            $description  = $settings['description'];

        ?>

        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <h2><?php echo esc_html($title);?></h2>
                        <div class="border-3"></div>
                        <p><?php echo __($description);?></p>
                    </div> <!-- section-title -->
                </div>
            </div>
        </div>
      <?php

              }

      }
