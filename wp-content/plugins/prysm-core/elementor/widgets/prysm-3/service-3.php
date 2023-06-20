<?php

    class prysm3_service extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_service';
        }

        public function get_title() {
            return __( 'Service Three', 'prysm' );
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
			'service_image',
			[
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'serv_box_shadow',
                    'label' => __( 'Box Shadow', 'plugin-domain' ),
                    'selector' => '{{WRAPPER}} .pr5-feature-column::after',
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
                        '{{WRAPPER}} .pr5-feature-column .pr5-ft-cl .pr5-ft-icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon__bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-feature-column .pr5-ft-cl .pr5-ft-icon-wrapper i' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'icon__hover_bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-feature-column:hover .pr5-ft-icon-wrapper i' => 'background: {{VALUE}} ',
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
                        '{{WRAPPER}} .pr5-ft-cl-wrapper .pr5-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-ft-cl-wrapper .pr5-headline h4',
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
                        '{{WRAPPER}} .pr5-ft-cl-wrapper .pr5-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-ft-cl-wrapper .pr5-pera-txt p',
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
        <div class="pr5-feature-content">
            <div class="row">
                <?php $shape = 0; foreach($service_boxes as $index => $box): $shape++;?>
                  <?php  if( $box['service_id'] ) : ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="pr5-feature-column wow fadeInUp" data-wow-delay="0.4s">
                            <div class="pr5-ft-cl shape-<?php echo esc_attr($shape);?>">
                                <div class="pr5-img-wrapper">
                                    <img src="<?php echo esc_url($box['service_image']['url']);?>" alt="">
                                </div>
                                <span class="pr5-ft-icon-wrapper">
                                    <i class="<?php echo $box['icon'];?>"></i>
                                </span>
                                <div class="pr5-ft-cl-wrapper">
                                    <div class="pr5-headline">
                                        <a href="<?php echo get_the_permalink($box['service_id']);?>"><h4><?php echo get_the_title($box['service_id']);?></h4></a>
                                    </div>
                                    <div class="pr5-pera-txt">
                                        <p><?php echo __($box['content_info']);?></p>
                                    </div>
                                </div>
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
