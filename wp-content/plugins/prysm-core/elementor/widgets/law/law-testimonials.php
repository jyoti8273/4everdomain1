<?php

    class law_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_testimonial';
        }

        public function get_title() {
            return __( 'Law Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'law_testimonial_contetn',
                [
                    'label' => __( 'Testimonial Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'section_bg_t',
                [
                    'label' => esc_html__( 'Background Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'section_bg_2',
                [
                    'label' => esc_html__( 'Background Image 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'subheading',
                [
                    'label' => esc_html__( 'Sub Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'mainheading',
                [
                    'label' => esc_html__( 'Main Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();

        
            $repeater->add_control(
                'authore_img',
                [
                    'label' => esc_html__( 'Authore Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
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
                'designation', [
                    'label'       => esc_html__( 'Designation', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feedback', [
                    'label'       => esc_html__( 'Feedback', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'testimonialsitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->add_control(
                'authore_thumb',
                [
                    'label' => esc_html__( 'Authore Thumb 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'authore_thumb2',
                [
                    'label' => esc_html__( 'Authore Thumb 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'authore_thumb3',
                [
                    'label' => esc_html__( 'Authore Thumb 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'authore_thumb4',
                [
                    'label' => esc_html__( 'Authore Thumb 4', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'authore_thumb5',
                [
                    'label' => esc_html__( 'Authore Thumb 5', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'authore_thumb6',
                [
                    'label' => esc_html__( 'Authore Thumb 6', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_style',
                [
                    'label' => esc_html__( 'Testimonial Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'section_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_sub_title',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eight h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eight h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'feedback_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feedback Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'fb_text_clor',
                [
                    'label'     => esc_html__( 'Feedback Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-seven .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feedback_typo__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-seven .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
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
                'tes_name_color',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Name Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'auth_name_color',
                [
                    'label'     => esc_html__( 'Authore name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-seven .inner-box h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'auth_name__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-seven .inner-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '24',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'tes_desig_color',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Designation Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'auth_desig_color',
                [
                    'label'     => esc_html__( 'Authore Designation Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-seven .inner-box .designation' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'auth_desig__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-seven .inner-box .designation',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
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
                'tes_bg-style_color',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Background Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section-bg-color',
                [
                    'label'     => esc_html__( 'Section BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-section-seven' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $section_bg_t  = $settings['section_bg_t']['url'];
            $section_bg_2  = $settings['section_bg_2']['url'];
            $testimonialsitem  = $settings['testimonialsitem'];
            $mainheading  = $settings['mainheading'];

        ?>

        <!-- Testimonial Section Seven -->
        <section class="testimonial-section-seven" style="background-image: url(<?php echo esc_url($section_bg_t);?>)">
            <div class="auto-container">
                <div class="sec-title-eight light centered">
                    <h2><?php echo __($mainheading);?></h2>
                </div>
                <div class="inner-container">
                    <div class="thumbs-outer">

                        <?php if($settings['authore_thumb']['url']):?>
                            <span class="thumb-one"><img src="<?php echo esc_url($settings['authore_thumb']['url']);?>" alt="" /></span>
                        <?php endif;?>
                        
                        <?php if($settings['authore_thumb2']['url']):?>
                            <span class="thumb-two"><img src="<?php echo esc_url($settings['authore_thumb2']['url']);?>" alt="" /></span>
                        <?php endif;?>

                        <?php if($settings['authore_thumb3']['url']):?>
                            <span class="thumb-three"><img src="<?php echo esc_url($settings['authore_thumb3']['url']);?>" alt="" /></span>
                        <?php endif;?>

                        <?php if($settings['authore_thumb4']['url']):?>
                            <span class="thumb-four"><img src="<?php echo esc_url($settings['authore_thumb4']['url']);?>" alt="" /></span>
                        <?php endif;?>

                        <?php if($settings['authore_thumb5']['url']):?>
                            <span class="thumb-five"><img src="<?php echo esc_url($settings['authore_thumb5']['url']);?>" alt="" /></span>
                        <?php endif;?>

                        <?php if($settings['authore_thumb6']['url']):?>
                            <span class="thumb-six"><img src="<?php echo esc_url($settings['authore_thumb6']['url']);?>" alt="" /></span>
                        <?php endif;?>

                    </div>
                    
                    <div class="carousel-box">
                        <div class="circle-layer" style="background-image: url(<?php echo esc_url($section_bg_2);?>)"></div>
                        <div class="single-item-carousel owl-carousel owl-theme">
                            <?php foreach($testimonialsitem as $item):?>
                            <!-- Testimonial Block Seven -->
                            <div class="testimonial-block-seven">
                                <div class="inner-box">
                                    <div class="author-image">
                                        <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="" />
                                    </div>
                                    <h4><?php echo esc_html($item['authore_name']);?></h4>
                                    <div class="designation"><?php echo esc_html($item['designation']);?></div>
                                    <div class="text"><?php echo esc_html($item['feedback']);?></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Testimonial Section Seven -->
      <?php

              }

      }
