<?php

    class mgv2_testimonial_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_testimonial_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_content',
                [
                    'label' => __( 'testimonial Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'testimonialbg',
                [
                    'label' => __( 'Testimonial BG', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'authore_img',
                [
                    'label' => __( 'Authore Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'authore_quate',
                [
                    'label' => __( 'Quate Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'feedback',
                [
                    'label' => __( 'Feedback', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'signature',
                [
                    'label' => __( 'Signature', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'authore',
                [
                    'label' => __( 'Authore', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'designation',
                [
                    'label' => __( 'Designation', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
                    
            
            $this->add_control(
                'testimonialsitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ authore }}}',
                ]
            ); 
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_infos_style',
                [
                    'label' => esc_html__( 'testimonial Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'testimonial_feedback',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feedback Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feedback_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-four .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '30',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'feedback_color',
                [
                    'label' => esc_html__( 'Feedback Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-four .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'authore_name_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Authore Name Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'autohre_naem_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-four .inner-box .lower-box',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
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
                'authore_name_color',
                [
                    'label' => esc_html__( 'Authore Name Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-block-four .inner-box .lower-box' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $testimonialbg        = $settings['testimonialbg'];
            $testimonialsitem     = $settings['testimonialsitem'];
            

        ?>
            <!-- Testimonial Section Four -->
            <section class="testimonial-section-four" style="background-image: url(<?php echo esc_url($testimonialbg['url']);?>)">
                <div class="auto-container">
                    <div class="inner-container">
                    <div class="single-item-carousel-testimonial owl-carousel owl-theme">
                        <?php foreach($testimonialsitem as $item):?>
                        <!-- Testimonial Block Four -->
                        <div class="testimonial-block-four">
                            <div class="inner-box">
                                <div class="author-outer">
                                    <div class="author-image">
                                        <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="" />
                                    </div>
                                    <span class="quote-icon">
                                        <img src="<?php echo esc_url($item['authore_quate']['url']);?>" alt="" />
                                    </span>
                                </div>
                                <div class="text"><?php echo esc_html($item['feedback']);?></div>
                                <div class="lower-box">
                                    <span class="signature">
                                        <img src="<?php echo esc_url($item['signature']['url']);?>" alt="" />
                                    </span>
                                    <?php echo esc_html($item['authore']);?>
                                    <i><?php echo esc_html($item['designation']);?></i>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    </div>
                </div>
            </section>
            <!-- End Testimonial Section Four -->
      <?php

              }

      }
