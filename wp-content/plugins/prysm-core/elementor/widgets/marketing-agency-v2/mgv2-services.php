<?php

    class mgv2_service_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_service_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Service', 'prysm' );
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
                'service_bg_img', [
                    'label'       => esc_html__( 'Service Image BG', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
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
                'service_icon', [
                    'label'       => esc_html__( 'Service Icon', 'prysm' ),
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
            $this->end_controls_section();

            $this->start_controls_section(
                'service_style',
                [
                    'label' => esc_html__( 'Service Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            

            $this->add_control(
                'service_s_title',
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
                    'selector'       => '{{WRAPPER}} .service-block-seven .inner-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                    'label' => esc_html__( 'Service Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-seven .inner-box h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_title_hover_color',
                [
                    'label' => esc_html__( 'Service Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-seven .inner-box h4 a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'service_text_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .service-block-seven .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'service_text_color',
                [
                    'label' => esc_html__( 'Service Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .service-block-seven .inner-box .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $service_bg_img   = $settings['service_bg_img'];
            $services_items        = $settings['services_items'];

        ?>
        <!-- Services Section Seven -->
        <section class="services-section-seven">
            <div class="container">
                <div class="inner-container" style="background-image: url(<?php echo esc_url($service_bg_img['url']);?>)">
                    <div class="line-one"></div>
                    <div class="line-two"></div>
                    <div class="services-carousel-two owl-carousel owl-theme">
                        <?php $shape = 0; foreach($services_items as $index => $box): $shape++;?>
                        <?php  if( $box['service_id'] ) : ?>
                        <!-- Service Block Seven -->
                        <div class="service-block-seven">
                            <div class="inner-box">
                                <div class="icon-box">
                                    <span class="icon"><img src="<?php echo esc_url($box['service_icon']['url']);?>" alt="" /></span>
                                </div>
                                <h4><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h4>
                                <div class="text"><?php echo $box['service_escerpt'];?></div>
                            </div>
                        </div>
                        <?php endif; endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Services Section Seven -->
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
