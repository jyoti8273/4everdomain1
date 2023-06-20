<?php

    class constv3_testimonial_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_testimonial_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
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
                'testimonial_img',
                [
                    'label' => __( 'Testimonial Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );  
            $repeater = new \Elementor\Repeater();           
            
            $repeater->add_control(
                'title1',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'title2',
                [
                    'label' => __( 'Title 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'title3',
                [
                    'label' => __( 'Title 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
                'authore_role',
                [
                    'label' => __( 'Authore Role', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'testimonials',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ authore }}}',
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
                'testimonial_title_style',
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
                    'selector'       => '{{WRAPPER}} .testimonial-block-three .inner-box h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '300',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '36',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_title_bold_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .testimonial-block-three .inner-box h3 span',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'title_bg_color',
                [
                    'label' => esc_html__( 'Title BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .testimonial-section-three .image-column .image:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $testimonial_img   = $settings['testimonial_img'];
            $testimonials   = $settings['testimonials'];

        ?>
        <!-- Testimonial Section Three -->
        <section class="testimonial-section-three">
            <div class="container">
                <div class="row clearfix">
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image titlt" data-tilt data-tilt-max="2">
                                <img src="<?php echo esc_url($testimonial_img['url']);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Carousel Column -->
                    <div class="carousel-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="single-item-carousel owl-carousel owl-theme">
                                <?php foreach($testimonials as $item):?>
                                <!-- Testimonial Block Three -->
                                <div class="testimonial-block-three">
                                    <div class="inner-box">
                                        <h3><span class="left-quote flaticon-straight-quotes"></span>
                                        <?php echo esc_html($item['title1']);?>
                                        <span><?php echo esc_html($item['title2']);?></span>
                                        <?php echo esc_html($item['title3']);?>
                                         <span class="right-quote flaticon-blocks-with-angled-cuts"></span>
                                        </h3>
                                        <div class="designation"><?php echo esc_html($item['authore']);?> <span><?php echo esc_html($item['authore_role']);?></span></div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Testimonial Section Three -->
      <?php

              }

      }
