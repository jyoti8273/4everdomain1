<?php

    class sw_work_flow extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_workflow';
        }

        public function get_title() {
            return __( 'Software Workflow', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'workflow_content',
                [
                    'label' => __( 'Workflow Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'wf_shape', [
                    'label'       => esc_html__( 'Shape Img', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $this->add_control(
                'workflow_img', [
                    'label'       => esc_html__( 'Workflow Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );            
            
            $this->add_control(
                'title',
                [
                    'label' => __( 'About Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );

            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                'list_title',
                [
                    'label' => __( 'List Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'list_text',
                [
                    'label' => __( 'List Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-icon-wrapper i',
                ]
            );    
            $this->add_control(
                'lists_item',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ list_title }}}',
                ]
            );
           
            $this->end_controls_section();

            

            $this->start_controls_section(
                'about_style',
                [
                    'label' => esc_html__( 'About Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'sub_style_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sb_title_clr',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-title-area span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area span',
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
                        '{{WRAPPER}} .pr3-title-area h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area h3',
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
                        '{{WRAPPER}} .pr3-title-area .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area .pr3-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'list_title_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Item Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'list_title_color',
                [
                    'label'     => esc_html__( 'List Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-item-content .pr3-headline h5' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'list_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-item-content .pr3-headline h5',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'list_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Item Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'list_text_color',
                [
                    'label'     => esc_html__( 'List Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-item-content .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'list_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-item-content .pr3-pera-txt p',
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
            $wf_shape       = $settings['wf_shape']['url'];
            $workflow_img   = $settings['workflow_img']['url'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $description    = $settings['description'];
            $lists_item     = $settings['lists_item'];

        ?>
        <section class="pr3-workflow">
            <span class="pr3-workflow-shape"><img src="<?php echo esc_url($wf_shape);?>" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pr3-workflow-left">
                            <div class="pr3-title-area wow fadeInUp">
                                <span><?php echo esc_html($sub_title);?></span>
                                <div class="pr3-headline">
                                <h3><?php echo __($title);?></h3>
                                </div>
                                <div class="pr3-pera-txt">
                                    <p><?php echo __($description);?></p>
                                </div>
                            </div>
                            <div class="pr3-workflow-list">
                                <ul>
                                    <?php foreach($lists_item as $item):?>
                                    <li class="pr3-workflow-item wow fadeInUp elementor-repeater-item-<?php echo esc_attr($item['_id']);?>" data-wow-delay="0.2s">
                                        <div class="pr3-icon-wrapper">
                                            <i class="<?php echo esc_attr($item['icon']);?>"></i>
                                        </div>
                                        <div class="pr3-item-content">
                                            <div class="pr3-headline">
                                                <h5><?php echo esc_html($item['list_title']);?></h5>
                                            </div>
                                            <div class="pr3-pera-txt">
                                                <p><?php echo esc_html($item['list_text']);?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-end">
                        <div class="pr3-workflow-right wow fadeInRight" data-wow-delay="0.2s">
                            <img src="<?php echo esc_url($workflow_img);?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Section -->
      <?php

              }

      }
