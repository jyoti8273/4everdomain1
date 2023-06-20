<?php

    class constv3_service_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_service_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-service-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'solution_content',
                [
                    'label' => __( 'Hero Section Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'service_bg_img', [
                    'label'       => esc_html__( 'Service Image BG', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
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
                'service_img', [
                    'label'       => esc_html__( 'Service Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );            
            $repeater->add_control(
                'service_escerpt', [
                    'label'       => esc_html__( 'Service Excerpt', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
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
            $this->add_control(
                'mor_text', [
                    'label'       => esc_html__( 'More Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'more_link_label', [
                    'label'       => esc_html__( 'More Button Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'more_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
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
                'service_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );           
            $this->add_control(
                'box_bg_color',
                [
                    'label' => esc_html__( 'Box BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-six .inner-box .image' => 'background-color: {{VALUE}}',
                    ],
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
                'service_content_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-six .inner-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'service_title_clr',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-six .inner-box h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'service_title_hover_clr',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-six .inner-box:hover h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'service_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_txt_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-six .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'service_txt_clr',
                [
                    'label' => esc_html__( 'Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-six .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'icon_style_cl',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'icon_style',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-six .inner-box .lower-content .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $sub_title   = $settings['sub_title'];
            $maintitle   = $settings['maintitle'];
            $service_bg_img   = $settings['service_bg_img'];
            $mor_text         = $settings['mor_text'];
            $more_link_label  = $settings['more_link_label'];
            $more_link        = $settings['more_link'];
            $services_items        = $settings['services_items'];

        ?>
            <!-- Services Section Six -->
            <section class="services-section-six" style="background-image: url(<?php echo esc_url($service_bg_img['url']);?>)">
                <div class="container">
                    <div class="sec-title-five light centered">
                        <div class="title"><?php echo esc_html($sub_title);?></div>
                        <h2><?php echo __($maintitle);?></h2>
                    </div>
                    <div class="inner-container">
                        <div class="services-carousel owl-carousel owl-theme">
                            <?php $shape = 0; foreach($services_items as $index => $box): $shape++;?>
                            <?php  if( $box['service_id'] ) : ?>
                            <!-- Service Block Six -->
                            <div class="service-block-six">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="<?php echo get_the_permalink($box['service_id']);?>"><img src="<?php echo esc_url($box['service_img']['url']);?>" alt="" /></a>
                                    </div>
                                    <div class="lower-content">
                                        <span class="icon"> <?php \Elementor\Icons_Manager::render_icon( $box['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
                                        <h5><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h5>
                                        <div class="text"><?php echo $box['service_escerpt'];?></div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; endforeach;?>
                        </div>
                        
                        <div class="lower-text">
                            <?php echo esc_html($mor_text);?> <a href="<?php echo esc_url($more_link['url']);?>"><?php echo esc_html($more_link_label);?></a>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Services Section Six -->
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
