<?php

    class const_testimonials extends \Elementor\Widget_Base {

        public function get_name() {
            return 'const_testimonials';
        }

        public function get_title() {
            return __( 'Consulting V2 Testimonial', 'prysm' );
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
                'label' => __( 'testimonial Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'sub_title', [
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
        
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'authore_thumb', [
                'label'       => esc_html__( 'Authore Thumb', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater->add_control(
            'rating', [
                'label'       => esc_html__( 'Rating', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
            ]
        );
        $repeater->add_control(
            'authore_name', [
                'label'       => esc_html__( 'Authore Name', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'designation', [
                'label'       => esc_html__( 'Designation', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'feedback', [
                'label'       => esc_html__( 'Feedback', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
        $this->add_control(
            'testimonial_items',
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
                'label' => esc_html__( 'testimonial Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'testimonial_heading_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'testimonial Heading Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'test_feedback_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .testimonial-block-one .inner-box .text',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_weight' => [
                        'default' => '400',
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
            'testimonial_name_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Authore Name Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'test_name_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .testimonial-block-one .inner-box .author-name span',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_weight' => [
                        'default' => '400',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '20',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'testimonial_dsg_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Authore Name Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'test_deg_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .testimonial-block-one .inner-box .author-name',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_weight' => [
                        'default' => '400',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '14',
                        ],
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings         = $this->get_settings_for_display();
            $testimonial_items   = $settings['testimonial_items'];

        ?>
        <!--Testimonial Section-->
        <section class="testimonial-section">
            <div class="auto-container">
                <div class="testimonial-outer">
                
                    <!--Product Thumbs Carousel-->
                    <div class="client-thumb-outer">
                        <div class="client-thumbs-carousel owl-carousel owl-theme">
                            <?php foreach($testimonial_items as $item):?>
                            <div class="thumb-item">
                                <figure class="thumb-box"><img src="<?php echo esc_url($item['authore_thumb']['url']);?>" alt=""></figure>
                                <div class="quote-icon">
                                    <span class="icon fa fa-quote-left"></span>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                
                    <!--Client Testimonial Carousel-->
                    <div class="client-testimonial-carousel owl-carousel owl-theme">
                        <?php foreach($testimonial_items as $item):?>
                        <!--Testimonial Block One-->
                        <div class="testimonial-block-one">
                            <div class="inner-box">
                                <div class="text"><?php echo esc_html($item['feedback']);?> </div>
                                <div class="rating">
                                    <?php for($i = 0; $i < $item['rating']; $i++):?>
                                    <span class="fa fa-star"></span>
                                    <?php endfor;?>
                                </div>
                                <div class="author-name"><span><?php echo esc_html($item['authore_name']);?></span>. <?php echo esc_html($item['designation']);?></div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                    
                </div>
            </div>
        </section>
        <!--End Testimonial Section-->
      <?php

            }

      }
