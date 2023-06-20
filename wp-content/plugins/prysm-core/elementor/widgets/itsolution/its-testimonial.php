<?php

    class its_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_testimonial';
        }

        public function get_title() {
            return __( 'IT Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-testimonial';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_content',
                [
                    'label' => __( 'Testimonial Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'quote_img', [
                    'label'       => esc_html__( 'Quote Img', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'authore_img', [
                    'label'       => esc_html__( 'Authore Img', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'authore_name', [
                    'label'       => esc_html__( 'Authore Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'position', [
                    'label'       => esc_html__( 'Position', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feedback', [
                    'label'       => esc_html__( 'FeedBack', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'testimonials',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ authore_name }}}',
                ]
            );
            
            $this->add_control(
                'subtitle', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'colortitle', [
                    'label'       => esc_html__( 'Color Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonials_heading_style',
                [
                    'label' => esc_html__( 'Section Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                '_s_sub_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                's_sub_title',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_sub_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-subtitle',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_s__title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                's_title',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-testimonial-content .pr20-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-testimonial-content .pr20-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_s_color_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Color Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                's_styl_title',
                [
                    'label'     => esc_html__( 'Stylish Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area h3 span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_sltylish_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area h3 span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_s__info__style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Description Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                's_info_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr2-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonials_style',
                [
                    'label' => esc_html__( 'testimonials Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'testimonial_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Testimonials Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item',
                ]
            );
            $this->add_control(
                'padding',
                [
                    'label' => __( 'Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'test_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Testimonials Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'name_color',
                [
                    'label'     => esc_html__( 'Name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item .pr20-tt-top .pr20-tt-title h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'name_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item .pr20-tt-top .pr20-tt-title h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_position_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Position Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tes_position_color',
                [
                    'label'     => esc_html__( 'Position Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item .pr20-tt-top .pr20-tt-title span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'position_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-testimonial-slider .pr20-tt-item .pr20-tt-top .pr20-tt-title span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_testimonials_feedback_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feedback Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'feedback_color',
                [
                    'label'     => esc_html__( 'Feedback Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-tt-item .pr20-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );          
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feedback_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-tt-item .pr20-pera-txt p',
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

            $settings       = $this->get_settings_for_display();
            $testimonials       = $settings['testimonials'];
            $subtitle           = $settings['subtitle'];
            $title              = $settings['title'];
            $colortitle         = $settings['colortitle'];
            $description        = $settings['description'];

        ?>
        <section class="pr20-testimonial-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pr20-testimonial-slider">
                            <?php foreach($testimonials as $item):?>
                            <div class="pr20-tt-item">
                                <span class="quote"><img src="<?php echo esc_url($item['quote_img']['url']);?>" alt=""></span>
                                <div class="pr20-tt-top">
                                    <div class="pr20-img-container">
                                        <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="">
                                    </div>
                                    <div class="pr20-tt-title pr20-headline">
                                        <h4><?php echo esc_html($item['authore_name']);?></h4>
                                        <span><?php echo esc_html($item['position']);?></span>
                                    </div>
                                </div>
                                <div class="pr20-tst-bottom">
                                    <div class="pr20-pera-txt">
                                        <p><?php echo __($item['feedback']);?></p>
                                    </div>  
                                </div>
                            </div>
                            <?php endforeach;?>    
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pr20-testimonial-content">
                            <div class="pr20-title-area">
                                <span class="pr20-subtitle"><?php echo esc_html($subtitle);?></span>
                                <div class="pr20-headline">
                                    <h3><?php echo esc_html($title);?> <span><?php echo esc_html($colortitle);?></span></h3>
                                </div>
                                <div class="pr2-pera-txt">
                                    <p><?php echo __($description);?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
