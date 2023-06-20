<?php

    class ma_testimonial_content extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ma_testimonial_content';
        }

        public function get_title() {
            return __( 'Marketing  Testimonial', 'prysm' );
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
            
            $this->add_control(
                'testimonial_bg',
                [
                    'label' => __( 'Section BG', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'testimonial_shape',
                [
                    'label' => __( 'Shape Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'testimonial_shape2',
                [
                    'label' => __( 'Shape 2 Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'Hero Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'text',
                [
                    'label' => __( 'Hero Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();            

            $repeater->add_control(
                'authore_thumb', [
                    'label'       => esc_html__( 'Authore Thumb', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'rating', [
                    'label'       => esc_html__( 'Client Rating', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feedback', [
                    'label'       => esc_html__( 'Client Feedback', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'name', [
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

            $this->add_control(
                'testimonials',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ name }}}',
                ]
            );
           
            $this->end_controls_section();
            
            $this->start_controls_section(
                'testimonial_heading_style',
                [
                    'label' => esc_html__( 'testimonial Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'sb_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Style Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'main_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'maintitle_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_title_br_color',
                [
                    'label'     => esc_html__( 'Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag:before, .pr-mark-section-title .pr-mark-section-title-tag:after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'main_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'hd_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_style',
                [
                    'label' => esc_html__( 'testimonial Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            
            $this->add_control(
                'hero_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Hero Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text h1' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text h1',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'hero_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Hero Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'h_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'hero_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Hero Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'h_btn_color',
                [
                    'label'     => esc_html__( 'Button Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-btn a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'btn_background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', ],
                    'selector' => '{{WRAPPER}} .pr-mark-btn a',
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-btn a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'client_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Client Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cl_title_clr',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-client-wrapper .pr-mark-banner-client-text' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cl_title_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-client-wrapper .pr-mark-banner-client-text',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cl_number',
                [
                    'label'     => esc_html__( 'Cl Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cl_no_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'co_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cou_title',
                [
                    'label'     => esc_html__( 'Counter Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'con_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter p',
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

            $settings   = $this->get_settings_for_display();
            $testimonial_bg   = $settings['testimonial_bg']['url'];
            $testimonial_shape   = $settings['testimonial_shape']['url'];
            $testimonial_shape2   = $settings['testimonial_shape2']['url'];
            $subtitle   = $settings['subtitle'];
            $title      = $settings['title'];
            $text      = $settings['text'];
            $testimonials      = $settings['testimonials'];

        ?>
        <section id="pr-mark-testimonial" class="pr-mark-testimonial-section position-relative" data-background="<?php echo esc_url($testimonial_bg);?>">
            <span class="pr-mark-testimonial-circle-shape position-absolute"><img src="<?php echo esc_url($testimonial_shape);?>" alt=""></span>
            <div class="container">
                <div class="pr-mark-section-title headline pera-content text-center middle-align">
                    <span class="pr-mark-section-title-tag"><?php echo esc_html($subtitle);?></span>
                    <h2><?php echo esc_html($title);?></h2>
                    <p><?php echo __($text);?></p>
                </div>
                <div class="pr-mark-testimonial-content position-relative">
                    <span class="pr-mark-circle-testimoial position-absolute"><img src="<?php echo esc_url($testimonial_shape2);?>" alt=""></span>
                    <div class="pr-mark-testimonial-slider">
                        <?php foreach($testimonials as $item):?>
                        <div class="pr-item-innerbox">
                            <div class="pr-mark-testimonial-innerbox">
                                <div class="pr-mark-inner-text text-center pera-content position-relative">
                                    <span><i class="fas fa-star"></i> <?php echo esc_attr($item['rating']);?></span>
                                    <p><?php echo __($item['feedback']);?></p>
                                </div>
                                <div class="pr-mark-testimonial-author d-flex align-items-center">
                                    <div class="pr-mark-testimonial-img">
                                        <img src="<?php echo esc_url($item['authore_thumb']['url']);?>" alt="">
                                    </div>
                                    <div class="pr-mark-testimonial-name-designation headline">
                                        <h3><?php echo esc_html($item['name']);?></h3>
                                        <span><?php echo esc_html($item['position']);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
