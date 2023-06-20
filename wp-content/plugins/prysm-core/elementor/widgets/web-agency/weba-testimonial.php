<?php

    class weba_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'weba_testimonial';
        }

        public function get_title() {
            return __( 'Web Agency Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_contetn',
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
                    'label'     => esc_html__( 'Section Sub TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-ten .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'section_main_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'label'     => esc_html__( 'Section TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-ten h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                        '{{WRAPPER}} .testimonial-block-nine .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feedback_typo__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-nine .inner-box .text',
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
                        '{{WRAPPER}} .testimonial-block-nine .inner-box .author-name' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'auth_name__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-nine .inner-box .author-name',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '20',
                            ],
                        ],
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $section_bg_t  = $settings['section_bg_t']['url'];
            $testimonialsitem  = $settings['testimonialsitem'];
            $subheading  = $settings['subheading'];
            $mainheading  = $settings['mainheading'];

        ?>

        <!-- Testimonial Section Nine -->
        <section class="testimonial-section-nine" style="background-image: url(<?php echo esc_url($section_bg_t);?>)">
            <div class="auto-container">
                <div class="sec-title-ten centered">
                    <div class="title"><?php echo esc_html($subheading);?></div>
                    <h2><?php echo esc_html($mainheading);?></h2>
                </div>
                <div class="testimonial-outer">
                
                    <!--Product Thumbs Carousel-->
                    <div class="client-thumb-outer">
                        <div class="client-thumbs-carousel-two owl-carousel owl-theme">
                            <?php foreach($testimonialsitem as $item):?>
                            <div class="thumb-item">
                                <figure class="thumb-box"><img src="<?php echo esc_url($item['authore_img']['url']);?>" alt=""></figure>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                
                    <!--Client Testimonial Carousel-->
                    <div class="client-testimonial-carousel-two owl-carousel owl-theme">

                        <?php foreach($testimonialsitem as $item):?>
                        <!-- Testimonial Block Nine -->
                        <div class="testimonial-block-nine">
                            <div class="inner-box">
                                <div class="text"><?php echo esc_html($item['feedback']);?></div>
                                <div class="author-name"><?php echo esc_html($item['authore_name']);?></div>
                            </div>
                        </div>
                        <?php endforeach;?>

                        
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Testimonial Section Nine -->
      <?php

              }

      }
