<?php

    class newconsultingv2_service extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newconsultingv2_service';
        }

        public function get_title() {
            return __( 'Consulting V2 Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'service_content',
            [
                'label' => __( 'Service Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'pattern1', [
                'label'       => esc_html__( 'Pattern 1', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
                'label_block' => true,
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
            'service_id', [
                'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );
        $repeater->add_control(
            'icons_link', [
                'label'       => esc_html__( 'Icon Link', 'prysm' ),
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
            'short_info', [
                'label'       => esc_html__( 'Short Info', 'prysm' ),
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
        
        $this->end_controls_section();

        $this->start_controls_section(
            'service_style',
            [
                'label' => esc_html__( 'Service Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'agsection_sb_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'agsection_sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title-three .title',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Inter',
                    ],
                    'font_weight' => [
                        'default' => '700',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '15',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'agsection_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'agsection_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .sec-title-three h2',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
                    ],
                    'font_weight' => [
                        'default' => '700',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '60',
                        ],
                    ],
                ],
            ]
        );
        $this->add_control(
            'service_titles-stryle',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block-three .inner-box h4',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Oswald',
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
        $this->add_control(
            'service_des-stryle',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Designation Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service_deg_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block-three .inner-box .designation',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Inter',
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
            'service_text-stryle',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Text Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'service_text_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .service-block-three .inner-box .text',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Roboto',
                    ],
                    'font_weight' => [
                        'default' => '400',
                    ],
                    'font_size'   => [
                        'default' => [
                            'size' => '15',
                        ],
                    ],
                ],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings         = $this->get_settings_for_display();
            $pattern1         = $settings['pattern1'];
            $sub_title        = $settings['sub_title'];
            $title            = $settings['title'];

            $services_items   = $settings['services_items'];

        ?>
        <!-- Services Section Three -->
        <section class="services-section-three">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern1['url']);?>)"></div>
                    <!-- Sec Title Three -->
                    <div class="sec-title-three centered">
                        <div class="title"><?php echo esc_html($sub_title);?></div>
                        <h2><?php echo esc_html($title);?></h2>
                    </div>
                    <div class="row clearfix">
                    <?php foreach($services_items as $box):?>
                    <?php  if( $box['service_id'] ) :  ?>
                        <!-- Service Block Three -->
                        <div class="service-block-three col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="icon-outer">
                                    <span class="icon <?php echo esc_attr($box['icons_link']);?>"></span>
                                </div>
                                <h4><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h4>
                                <div class="designation"><?php echo esc_html($box['designation']);?></div>
                                <div class="text"><?php echo esc_html($box['short_info']);?></div>
                                <a class="arrow flaticonv10-right-arrow-1" href="<?php echo get_the_permalink($box['service_id']);?>"></a>
                            </div>
                        </div>
                        <?php endif; endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section Three -->
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
