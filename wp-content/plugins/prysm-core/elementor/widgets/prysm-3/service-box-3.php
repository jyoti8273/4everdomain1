<?php

    class prysm3_service_box extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_service_box';
        }

        public function get_title() {
            return __( 'Service Box Three', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
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

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'service_id', [
                'label'       => esc_html__( 'Select Service', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );

        $repeater->add_control(
            'hr',
            [
                'type'  => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
        
        $repeater->add_control(
            'icon',
            [
                'label' => esc_html__( 'Service Icon', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'content_info', [
                'label'       => esc_html__( 'Service Excerpt', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'service_boxes',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();

            $this->start_controls_section(
                'service_style_info',
                [
                    'label' => esc_html__( 'Service Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'service_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'serv_box_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr5-service-content .pr5-service-column .pr5-sr-cl',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'serv_box_shadow',
                    'label' => __( 'Box Shadow', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .pr5-service-content .pr5-service-column::after',
                ]
            );
            $this->add_control(
                'srvh_icon',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'service_icon',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon__color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-service-content .pr5-service-column .pr5-sr-cl .pr5-icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon__bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-service-content .pr5-service-column .pr5-sr-cl .pr5-icon-wrapper i' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon__hover_bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-service-content .pr5-service-column:hover .pr5-sr-cl .pr5-icon-wrapper i' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon_hover_color',
                [
                    'label'     => esc_html__( 'Icon Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-service-content .pr5-service-column:hover .pr5-sr-cl .pr5-icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'srvh_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title__color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-sr-cl .pr5-headline h5' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-sr-cl .pr5-headline h5',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tx_text_color',
                [
                    'label'     => esc_html__( 'Content Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-service-column .pr5-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-service-column .pr5-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
           
            $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $service_boxes        = $settings['service_boxes'];

        ?>
        <div class="pr5-service-content">
            <div class="row">
                <?php $shape = 0; foreach($service_boxes as $index => $box): $shape++;?>
                  <?php  if( $box['service_id'] ) : ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="pr5-service-column wow fadeInUp">
                            <div class="pr5-sr-cl">
                                <div class="pr5-icon-wrapper">
                                    <i class="<?php echo esc_attr($box['icon']);?>"></i>
                                </div>
                                <div class="pr5-headline">
                                    <a href="<?php echo get_the_permalink($box['service_id']);?>"><h5><?php echo get_the_title($box['service_id']);?></h5></a>
                                </div>
                                <div class="pr5-pera-txt">
                                    <p><?php echo __($box['content_info']);?></p>
                                </div>
                            </div>
                            <div class="pr5-primary-btn">
                                <a href="<?php echo get_the_permalink($box['service_id']);?>"><?php esc_html_e('Read More', 'prysm');?> <i class="flaticonv8-right-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endif; endforeach;?>
            </div>
        </div>
		<!-- Get In Touch End -->

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
