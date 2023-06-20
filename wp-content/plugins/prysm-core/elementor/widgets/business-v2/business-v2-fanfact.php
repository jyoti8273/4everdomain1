<?php

    class business2_fanfact_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business2_fanfact_section';
        }

        public function get_title() {
            return __( 'Business V2 Fanfact', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'fanfact_content',
                [
                    'label' => __( 'Fanfact Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            ); 

            $this->add_control(
                'fanfact_img',
                [
                    'label' => __( 'Pattern Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'fanfact_img2',
                [
                    'label' => __( 'Pattern Image 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
                        
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'vudeio_link',
                [
                    'label' => __( 'Video Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'vudeio_img',
                [
                    'label' => __( 'Video Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'Icon Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'symbole', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
                       
            $this->add_control(
                'fanfactitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'fnf_style',
                [
                    'label' => esc_html__( 'Fanfact Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'fanfact_left_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact Left Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_heading_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'left_title_color',
                [
                    'label' => esc_html__( 'Heading Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_heading_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Fanfact Heading text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_heading_text_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
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
                'heading_text_color',
                [
                    'label' => esc_html__( 'Heading Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_counter_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_cou_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-six .column .inner .counter-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'fnf_cou_title_color',
                [
                    'label' => esc_html__( 'Counter Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-six .column .inner .counter-title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_counter_number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fnf_cou_number_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter-six .column .inner .count-outer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '50',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'fnf_cou_number_color',
                [
                    'label' => esc_html__( 'Counter Number Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-six .column .inner .count-outer' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'fanfact_counter_icon_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'fnf_cou_icon_color',
                [
                    'label' => esc_html__( 'Counter Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .fact-counter-six .column .inner .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $fanfact_img   = $settings['fanfact_img'];
            $fanfact_img2   = $settings['fanfact_img2'];
            
            $title    = $settings['title'];
            $description    = $settings['description'];
            $vudeio_link    = $settings['vudeio_link'];
            $vudeio_img    = $settings['vudeio_img'];
            $fanfactitem    = $settings['fanfactitem'];
            

        ?>
       <!-- Services Section Nine -->
        <section class="services-section-ten">
            <div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($fanfact_img['url']);?>)"></div>
            <div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($fanfact_img2['url']);?>)"></div>
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Title Column -->
                    <div class="title-column col-lg-8 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-seven light style-two">
                                <h2><?php echo __($title);?></h2>
                                <div class="text"><?php echo __($description);?></div>
                            </div>
                            <a href="<?php echo esc_url($vudeio_link);?>" class="lightbox-image play-box clearfix">
                                <span class="fa fa-play"><i class="ripple"></i></span>
                                <i><img src="<?php echo esc_url($vudeio_img['url']);?>" alt="" /></i>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Counter Column -->
                    <div class="counter-column col-lg-4 col-md-12 col-sm-12">
                        <div class="inner-column">
                            
                            <!-- Fact Counter Six -->
                            <div class="fact-counter-six">
                                <?php foreach($fanfactitem as $item):?>
                                <!-- Column -->
                                <div class="column counter-column">
                                    <div class="inner">
                                        <div class="content">
                                            <div class="icon">
                                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            </div>
                                            <div class="count-outer count-box">
                                                <span class="count-text counter" data-speed="3500" data-stop="123"><?php echo esc_html($item['number']);?></span><?php echo esc_html($item['symbole']);?>
                                            </div>
                                            <div class="counter-title"><?php echo esc_html($item['title']);?></div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Services Section Nine -->
      <?php

              }

      }
