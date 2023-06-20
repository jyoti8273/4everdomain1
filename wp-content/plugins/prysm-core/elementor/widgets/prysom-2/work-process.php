<?php

    class prysm2_work_process extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm2_work_process';
        }

        public function get_title() {
            return __( 'Work Process', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'process__content',
                [
                    'label' => __( 'Process Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'process_image',
                [
                    'label' => __( 'Shape Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'processinfo', [
                    'label'       => esc_html__( 'Process Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater->add_control(
                'process_link', [
                    'label'       => esc_html__( 'Link Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            
            $repeater->add_control(
                'process_url',
                [
                    'label' => __( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                    'show_external' => true,
                ]
            );
            $this->add_control(
                'processes',
                [
                    'label'       => __( 'Add Item', 'datanext-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'process_box_style',
                [
                    'label' => esc_html__( 'process Box Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Border', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr2-process-column:hover',
                ]
            );
            
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr2-process-column' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'process_box_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-process-column',
                ]
            );
    
            $this->end_controls_section();
            $this->start_controls_section(
                'process_style',
                [
                    'label' => esc_html__( 'Process Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'process_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'process Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'process_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column .pr2-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'process_title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column .pr2-headline h4:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-process-column .pr2-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_process_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Process Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-process-column .process-box-three p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_process_button_title_',
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
                        '{{WRAPPER}} .pr2-process-column .rd-btn' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'btn_hover_color',
                [
                    'label'     => esc_html__( 'Text Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column .rd-btn:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-process-column .rd-btn',
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
                    'label'     => esc_html__( 'Counter Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'countr_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'ctn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-process-column span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'countr_shape_bf_color',
                [
                    'label'     => esc_html__( 'Shape Before Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column::before' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'countr_shape_af_color',
                [
                    'label'     => esc_html__( 'Shape After Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-process-column::after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $process_image        = $settings['process_image']['url'];
            $processes            = $settings['processes'];

        ?>
        <div class="pr2-process-content">
            <span class="pr2-circle-shape-1" data-parallax='{"y": -80}'><img src="<?php echo esc_url($process_image);?>" ></span>
            <div class="row">
                <?php foreach($processes as $item):?>
                <div class="col-lg-4 col-md-6">
                    <div class="pr2-process-column wow slideInUp">
                        <div class="text-right">
                            <span><?php echo esc_attr($item['number']);?></span>
                        </div>
                        <div class="pr2-headline">
                            <a href="<?php echo esc_url($item['process_url']['url']);?>"><h4><?php echo esc_html($item['title']);?></h4></a>
                        </div>
                        <div class="pr2-pera-txt">
                            <p><?php echo esc_html($item['processinfo']);?></p>
                        </div>
                        <a class="rd-btn" href="<?php echo esc_url($item['process_url']['url']);?>"><?php echo esc_html($item['process_link']);?> <i class="fas fa-long-arrow-alt-right"></i></a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
      <?php

              }

      }
