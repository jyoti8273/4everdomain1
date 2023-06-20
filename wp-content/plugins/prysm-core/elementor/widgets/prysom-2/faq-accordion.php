<?php

    class prysm_accordion extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm_accordion_item';
        }

        public function get_title() {
            return __( 'Prysm2 Accordion', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-accordion';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'section_title_content',
                [
                    'label' => __( 'Section Title', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'active_enable',
                [
                    'label' => __( 'Active', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'YES', 'prysm' ),
                    'label_off' => __( 'NO', 'prysm' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );   
            
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Accordion Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'a_description', [
                    'label'       => esc_html__( 'Accordion Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'accordions',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'accordion_style',
                [
                    'label' => esc_html__( 'Accordion Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'accordion_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Accordion Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'actitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-accordion .card .card-header a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->start_controls_tabs( '_accordion_head_1' );
            $this->start_controls_tab(
                '_prysm_acc_head__normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm' ),
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'count_bg_color',
                    'label'    => __( 'Count Background', 'prysm' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-accordion .card .card-header',
                ]
            );
            $this->add_control(
                'text__color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-accordion .card .card-header a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-accordion .card .card-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr2-accordion .card .card-header',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-accordion .card .card-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_acc_head__active',
                [
                    'label' => esc_html__( 'Active', 'prysm' ),
                ]
            );
            
            $this->add_control(
                'text_activ_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-accordion .card-active .card-header a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'bar_activ_bg_color',
                    'label'    => __( 'Background', 'prysm' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-accordion .card-active .card-header',
                ]
            );
            $this->add_responsive_control(
                'btn_border_activ_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-accordion .card-active .card-header' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border_activ',
                    'label' => __( 'Border', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr2-accordion .card-active .card-header',
                ]
            );
            $this->add_responsive_control(
                'btn_activ_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-accordion .card-active .card-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();

            $this->add_control(
                'accordion_info',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'accordion Info', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'short_info_color',
                [
                    'label'     => esc_html__( 'Info Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-accordion .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'short_info_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-accordion .pr2-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_responsive_control(
                'info_paddinf_',
                [
                    'label'      => esc_html__( 'Padding', 'prysm' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr2-accordion .card-body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'box_activ_bg_color',
                    'label'    => __( 'Background', 'prysm' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-accordion .card-body',
                ]
            );
           
            $this->end_controls_section();

           
        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $accordions    = $settings['accordions'];

        ?>
        <div class="pr2-faq-accordion">
            <div class="pr2-accordion">
                    <div class="accordion" id="pr2_accordion">
                    <?php $itemId = 0; foreach($accordions as $item): $itemId++; 
                        
                        
                    ?>  
                        <?php if($itemId == 1):?>
                        <div class="card card-active wow fadeInUp">
                            <div class="card-header">
                                <a data-toggle="collapse" data-target="#card_<?php echo esc_attr($itemId);?>"> <?php echo esc_html($item['title']);?></a>
                            </div>

                            <div id="card_<?php echo esc_attr($itemId);?>" class="collapse show" data-parent="#pr2_accordion">
                                <div class="card-body">
                                    <div class="pr2-pera-txt">
                                        <?php echo __($item['a_description']);?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <div class="card wow fadeInUp">
                                <div class="card-header">
                                    <a data-toggle="collapse" data-target="#card_<?php echo esc_attr($itemId);?>"> <?php echo esc_html($item['title']);?></a>
                                </div>

                                <div id="card_<?php echo esc_attr($itemId);?>" class="collapse" data-parent="#pr2_accordion">
                                    <div class="card-body">
                                        <div class="pr2-pera-txt">
                                            <?php echo __($item['a_description']);?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; endforeach;?>        

                    </div>
                </div>
        </div>
      <?php

        }

      }
