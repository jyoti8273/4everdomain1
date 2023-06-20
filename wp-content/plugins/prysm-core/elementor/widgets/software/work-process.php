<?php

    class sw_work_process extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_work_process';
        }

        public function get_title() {
            return __( 'Software Work Process', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'workprocess_content',
                [
                    'label' => __( 'Work Process Content', 'prysm' ),
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
                'count',
                [
                    'label' => __( 'Count', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'step_text',
                [
                    'label' => __( 'Step Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'process_text',
                [
                    'label' => __( 'Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $repeater->add_control(
                'icon_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'icon_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-wk-column-top .icon-wrapper',
                ]
            );   
            $repeater->add_control(
                'shape_color',
                [
                    'label'     => esc_html__( 'Triangle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-wk-column-top .wk-column-left::after' => 'border-left: 20px solid {{VALUE}}',
                    ],
                ]
            ); 
            $repeater->add_control(
                'border_color',
                [
                    'label'     => esc_html__( 'Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-wk-column-top .wk-column-right h4::after' => 'border-bottom: 2px dashed {{VALUE}}',
                    ],
                ]
            ); 
            $repeater->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-wk-column-top .icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            ); 
            $this->add_control(
                'processes',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
           
            $this->end_controls_section();

            

            $this->start_controls_section(
                'process_style',
                [
                    'label' => esc_html__( 'Process Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'number_clr',
                [
                    'label'     => esc_html__( 'Number Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-work-content .pr3-work-column .pr3-wk-column-top .wk-column-right h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'number_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-work-content .pr3-work-column .pr3-wk-column-top .wk-column-right h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-work-content .pr3-work-column .pr3-wk-column-top .wk-column-right span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-work-content .pr3-work-column .pr3-wk-column-top .wk-column-right span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-work-column .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-work-column .pr3-pera-txt p',
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

            $settings       = $this->get_settings_for_display();
            $processes     = $settings['processes'];

        ?>
        <!-- Work Process -->
        <section class="pr3-work-process">
            <div class="container">
                <div class="pr3-work-content">
                    <div class="row">
                        <?php foreach($processes as $item):?>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="pr3-work-column wow fadeInUp elementor-repeater-item-<?php echo esc_attr($item['_id']);?>">
                                <div class="pr3-wk-column-top">
                                    <div class="wk-column-left">
                                        <div class="icon-wrapper">
                                            <i class="<?php echo esc_attr($item['icon']);?>"></i>
                                        </div>
                                    </div>
                                    <div class="wk-column-right pr3-headline">
                                        <h4><?php echo esc_attr($item['count']);?><span><?php echo esc_html($item['step_text']);?></span></h4>
                                        <span><?php echo esc_html($item['title']);?></span>
                                    </div>
                                </div>
                                <div class="pr3-pera-txt">
                                    <p><?php echo __($item['process_text']);?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
