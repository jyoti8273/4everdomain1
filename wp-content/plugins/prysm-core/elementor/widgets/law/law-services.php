<?php

    class law_service_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_service_section';
        }

        public function get_title() {
            return __( 'Law Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-service-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'service_content',
                [
                    'label' => __( 'Service Section Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'service_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );           
            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'Icon', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );             
                        
            $repeater->add_control(
                'service_escerpt',
                [
                    'label' => esc_html__( 'Service List', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'default' => esc_html__( 'Default description', 'prysm' ),
                ]
            );          
            $this->add_control(
                'services_items',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'service_style',
                [
                    'label' => esc_html__( 'Service Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
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
                        '{{WRAPPER}} .sec-title-eight h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_title__typography',
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
                'serv_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-ten .inner-box .upper-box h4',
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
                'serv_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box .upper-box h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_title_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box .upper-box h4 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'serv_cat_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-ten .inner-box .text',
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
                'serv_txt_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_control(
                'service_icon_item',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon-normal-color',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box .upper-box .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon-normal-hovcer-color',
                [
                    'label' => esc_html__( 'Icon Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box:hover .upper-box .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_hover-bg-color',
                [
                    'label' => esc_html__( 'Icon Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box:hover .upper-box .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'link_bg',
                [
                    'label' => esc_html__( 'Link Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box .arrow' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'link_hover_bg',
                [
                    'label' => esc_html__( 'Link Hover BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box:hover .arrow' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_control(
                'service_box-style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'serv_box_bg_color',
                [
                    'label' => esc_html__( 'Box BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-ten .inner-box' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings        = $this->get_settings_for_display();
            $maintitle       = $settings['maintitle'];
            $services_items  = $settings['services_items'];

        ?>
         <!-- Services Section Eleven -->
        <section class="services-section-eleven">
            <div class="auto-container">
                <div class="sec-title-eight centered">
                    <h2><?php echo __($maintitle);?></h2>
                </div>
                <div class="row clearfix">
                    <?php $shape = 0; foreach($services_items as $index => $box): $shape++;?>
                    <?php  if( $box['service_id'] ) : ?>                 
                    <!-- Service Block Ten -->
                    <div class="service-block-ten col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="upper-box">
                                <span class="icon">
                                    <?php \Elementor\Icons_Manager::render_icon( $box['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </span>
                                <h4><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h4>
                            </div>
                            <div class="text"><?php echo __($box['service_escerpt']);?></div>
                            <a class="arrow" href="<?php echo get_the_permalink($box['service_id']);?>"><span class="fal fa-long-arrow-right"></span></a>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Services Section Eleven --> 
      <?php

              }

              protected function select_param_posts() {
                $args = wp_parse_args( [
                    'post_type'   => 'services',
                    'numberposts' => -1,
                    'orderby'     => 'title',
                    'order'       => 'ASC',
                ] );
            
                $query_query = get_posts( $args );
            
                $posts = [];
                if ( $query_query ) {
                    foreach ( $query_query as $query ) {
                        $posts[$query->ID] = $query->post_title;
                    }
                }
            
                return $posts;
            }

      }
