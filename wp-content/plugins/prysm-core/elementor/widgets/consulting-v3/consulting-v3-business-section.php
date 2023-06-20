<?php

    class constv3_business_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_business_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Business', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'business_content',
                [
                    'label' => __( 'Business Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .sec-title-five .title:before',
                ]
            );
            $repeater = new \Elementor\Repeater(); 

            $repeater->add_control(
                'feature_img',
                [
                    'label' => __( 'Features Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feature_icon',
                [
                    'label' => __( 'Features Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
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
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
                'section_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five .title',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-five .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'service_heading_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'heading_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'main_heading_color',
                [
                    'label' => esc_html__( 'Heading Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-five h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'f_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'count_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block-two .inner-box h5',
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
                'counter_color',
                [
                    'label' => esc_html__( 'Counter Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-two .inner-box h5 span' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'counter_title_color',
                [
                    'label' => esc_html__( 'Counter Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-two .inner-box h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bg_color',
                [
                    'label' => esc_html__( 'Background Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-two .inner-box .lower-content .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $sub_title   = $settings['sub_title'];
            $maintitle   = $settings['maintitle'];
            $features   = $settings['features'];

        ?>
        <!-- Business Section Three -->
        <section class="business-section-three">
            <div class="auto-container">
                <div class="sec-title-five centered">
                    <div class="title"><?php echo esc_html($sub_title);?> </div>
                    <h2><?php echo __($maintitle);?></h2>
                </div>
                
                <div class="row clearfix">
                    <?php foreach($features as $item):?>
                    <!-- Business Block Two -->
                    <div class="business-block-two col-lg-3 col-md-4 col-sm-12">
                        <div class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image">
                                <a href="<?php echo esc_url($item['feature_link']['url']);?>"><img src="<?php echo esc_url($item['feature_img']['url']);?>" alt="" /></a>
                            </div>
                            <div class="lower-content">
                                <span class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $item['feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </span>
                                <h5><a href="<?php echo esc_url($item['feature_link']['url']);?>"><span><?php echo esc_html($item['number']);?></span> <?php echo esc_html($item['title']);?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Business Section Three -->
      <?php

              }

      }
