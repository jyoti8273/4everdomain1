<?php

    class ag2_feature_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_feature_section';
        }

        public function get_title() {
            return __( 'Agency Two Feature', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'feature_contetn',
                [
                    'label' => __( 'Feature Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater(); 

            $repeater->add_control(
                'feature_icon',
                [
                    'label' => __( 'Features Icon Img', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
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
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'icon_bg_color',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .icon:after',
                ]
            );

            $repeater->add_control(
                'title_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}:hover h5 a' => 'color: {{VALUE}}',
                    ],
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
                    'label' => esc_html__( 'Feature Style', 'prysm' ),
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
                    'selector'       => '{{WRAPPER}} .service-block-eleven .inner-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '22',
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
                        '{{WRAPPER}} .service-block-eleven .inner-box h5 a' => 'color: {{VALUE}}',
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
                    'selector'       => '{{WRAPPER}} .service-block-eleven .inner-box .text',
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
                        '{{WRAPPER}} .service-block-eleven .inner-box .text' => 'color: {{VALUE}}',
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
                        '{{WRAPPER}} .service-block-eleven .inner-box' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => esc_html__( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .service-block-eleven .inner-box',
                ]
            );

            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $features   = $settings['features'];

        ?>
        <!-- Services Section Fourteen -->
        <section class="services-section-fourteen">
            <div class="auto-container">
                
                <div class="row clearfix">
                    <?php foreach($features as $item):?>
                    <!-- Service Block Eleven -->
                    <div class="service-block-eleven col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInLeft elementor-repeater-item-<?php echo esc_attr($item['_id']);?>" data-wow-delay="0ms" data-wow-duration="1500ms" >
                            <div class="icon"><img src="<?php echo esc_url($item['feature_icon']['url']);?>" alt="" /></div>
                            <h5><a href="<?php echo esc_url($item['feature_link']['url']);?>"><?php echo esc_html($item['title']);?></a></h5>
                            <div class="text"><?php echo esc_html($item['description']);?></div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </div>
        </section>
        <!-- End Services Section Five -->
      <?php

              }

      }
