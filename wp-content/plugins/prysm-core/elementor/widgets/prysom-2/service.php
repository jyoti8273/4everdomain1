<?php

    class prysm2_work_service extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm2_work_service';
        }

        public function get_title() {
            return __( 'Prysm2 Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'service__content',
                [
                    'label' => __( 'Service Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'serviceinfo', [
                    'label'       => esc_html__( 'service Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater->add_control(
                'service_link', [
                    'label'       => esc_html__( 'Link Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            
            $repeater->add_control(
                'service_url',
                [
                    'label' => __( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                    'show_external' => true,
                ]
            );
            $this->add_control(
                'services',
                [
                    'label'       => __( 'Add Item', 'prysm-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->add_control(
                'service_mor_link', [
                    'label'       => esc_html__( 'More Link Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            
            $this->add_control(
                'more_url',
                [
                    'label' => __( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                    'show_external' => true,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'service_box_style',
                [
                    'label' => esc_html__( 'service Box Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Border', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr2-service-column',
                ]
            );
            
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'box_radius',
                [
                    'label' => __( 'Box Rpund', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'service_box_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-service-column',
                ]
            );
    
            $this->end_controls_section();
            $this->start_controls_section(
                'service_style',
                [
                    'label' => esc_html__( 'service Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'service_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'service Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'service_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column .pr2-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'service_title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column .pr2-headline h4:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-service-column .pr2-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_service_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'service Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-service-column .service-box-three p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_service_button_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'btn_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column .rd-btn' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'btn_hover_color',
                [
                    'label'     => esc_html__( 'Text Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column .rd-btn:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-service-column .rd-btn',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'counter_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Shape Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'countr_shape_bf_color',
                [
                    'label'     => esc_html__( 'Shape Before Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column::before' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'countr_shape_af_color',
                [
                    'label'     => esc_html__( 'Shape After Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-service-column::after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'btn_style',
                [
                    'label' => esc_html__( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'all_serv_btn_stl',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => '_btn_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-service-content .pr2-load-more-btn a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->start_controls_tabs( '_slide_button_1' );
            $this->start_controls_tab(
                '_prysm_btn__normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-primary-btn a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-primary-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr2-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-primary-btn a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-primary-btn a:hover, .pr2-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr2-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $services            = $settings['services'];
            $service_mor_link    = $settings['service_mor_link'];
            $more_url            = $settings['more_url'];

        ?>        
        <div class="pr2-service-content">
            <div class="row">
            <?php foreach($services as $item):?>
                <div class="col-lg-4 col-md-6">
                    <div class="pr2-service-column wow slideInUp" data-wow-delay="0.1s">
                        <div class="icon-container">
                            <i class="<?php echo esc_html($item['icon']);?>"></i>
                        </div>
                        <div class="pr2-headline">
                            <a href="<?php echo esc_url($item['service_url']['url']);?>"><h4><?php echo esc_html($item['title']);?></h4></a>
                        </div>
                        <div class="pr2-pera-txt">
                            <p><?php echo esc_html($item['serviceinfo']);?></p>
                        </div>
                        <a class="rd-btn" href="<?php echo esc_url($item['service_url']['url']);?>"><?php echo esc_html($item['service_link']);?> <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
            <?php if($more_url['url']):?>
            <div class="pr2-load-more-btn pr2-primary-btn wow slideInUp " data-wow-delay="0.7s">
                <a href="<?php echo esc_html($more_url['url']);?>"><?php echo esc_html($service_mor_link);?></a>
            </div>
            <?php endif;?>
        </div>

      <?php

              }

      }
