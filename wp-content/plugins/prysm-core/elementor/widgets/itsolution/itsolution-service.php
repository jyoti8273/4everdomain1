<?php

    class its_service_box extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_service_box';
        }

        public function get_title() {
            return __( 'IT Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-list';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'service_box_content',
                [
                    'label' => __( 'Service Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'shape1',
                [
                    'label' => esc_html__( 'Shape 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'shape2',
                [
                    'label' => esc_html__( 'Shape 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'description', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'services',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
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
                'content_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr20-service-column',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr20-service-column',
                ]
            );
            $this->add_control(
                'padding',
                [
                    'label' => __( 'Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr20-service-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'content_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-service-column .pr20-headline h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-service-column .pr20-headline h6',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_info_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-service-column .pr20-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-service-column .pr20-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_service_icon_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-service-column .pr20-icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            
            $this->add_control(
                'icon_bg_color',
                [
                    'label'     => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-service-column .pr20-icon-wrapper i' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $shape1         = $settings['shape1']['url'];
            $shape2         = $settings['shape2']['url'];
            $services       = $settings['services'];

        ?>
        <div class="pr20-service-section">
            <div class="pr20-service-top">
                <span class="pr20-sr-shape-1"><img src="<?php echo esc_url($shape1);?>" alt=""></span>
                <span class="pr20-sr-shape-2"><img src="<?php echo esc_url($shape2);?>" alt=""></span>
                <div class="row">
                    <?php foreach($services as $service):?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="pr20-service-column">
                            <div class="pr20-icon-wrapper">
                                <i class="<?php echo esc_attr($service['icon']);?>"></i>
                            </div>
                            <div class="pr20-headline">
                                <h6><?php echo esc_html($service['title']);?></h6>
                            </div>
                            <div class="pr20-pera-txt">
                                <p><?php echo __($service['description']);?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>


           
      <?php

              }

      }
