<?php

    class constv3_feature_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_feature_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Feature', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'solution_content',
                [
                    'label' => __( 'Hero Feature Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater(); 

            $repeater->add_control(
                'feature_icon',
                [
                    'label' => __( 'Features Icon', 'prysm' ),
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
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $repeater->add_control(
                'feature_link',
                [
                    'label' => __( 'Feature Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'features',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'feature_style',
                [
                    'label' => esc_html__( 'Hero Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'feature_title_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-five .inner-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box:hover h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'feature_text_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_text_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-five .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'text_color',
                [
                    'label' => esc_html__( 'Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'text_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box:hover .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'feature_icon_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_hover_color',
                [
                    'label' => esc_html__( 'Icon Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box:hover .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'feature_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'f_box_color',
                [
                    'label' => esc_html__( 'BoX background Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-five .inner-box:before' => 'background: {{VALUE}}',
                    ],
                ]
            );

            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $features   = $settings['features'];

        ?>
            <!-- Services Section Five -->
            <section class="services-section-five">
                <div class="container">
                    <div class="inner-container">
                        <div class="row clearfix">
                            <?php foreach($features as $item):?>
                            <!-- Service Block Five -->
                            <div class="service-block-five col-lg-4 col-md-6 col-sm-12">
                                <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <div class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                    <h5><a href="<?php echo esc_url($item['feature_link']['url']);?>"><?php echo esc_html($item['title']);?></a></h5>
                                    <div class="text"><?php echo esc_html($item['description']);?></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Services Section Five -->
      <?php

              }

      }
