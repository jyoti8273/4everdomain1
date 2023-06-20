<?php

    class mrk_features_feature extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mrk_features_feature';
        }

        public function get_title() {
            return __( 'Marketing  Feature', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'feature_content',
                [
                    'label' => __( 'Feature Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'feature_shape',
                [
                    'label' => __( 'Feature Shape Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'feature Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'text',
                [
                    'label' => __( 'feature Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();            

            $repeater->add_control(
                'feature_icon', [
                    'label'       => esc_html__( 'Client Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feature_title', [
                    'label'       => esc_html__( 'Feature Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feature_text', [
                    'label'       => esc_html__( 'Feature Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'feature_link', [
                    'label'       => esc_html__( 'Feature Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'icon_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pr-mark-feature-inner-icon',
                ]
            );
            $repeater->add_control(
                'icons__color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .pr-mark-feature-inner-icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'features',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ feature_title }}}',
                ]
            );
           
            $this->end_controls_section();
            
            $this->start_controls_section(
                'feature_heading_style',
                [
                    'label' => esc_html__( 'Feature Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'sb_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Style Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'main_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'maintitle_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_title_br_color',
                [
                    'label'     => esc_html__( 'Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag:before, .pr-mark-section-title .pr-mark-section-title-tag:after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'main_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'hd_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'feature_style',
                [
                    'label' => esc_html__( 'Feature Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            
            $this->add_control(
                'feature_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-feature-innerbox .pr-mark-feature-inner-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-feature-innerbox .pr-mark-feature-inner-text h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'feature_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'feature Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'h_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-feature-innerbox .pr-mark-feature-inner-text p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-feature-innerbox .pr-mark-feature-inner-text p',
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

            $settings   = $this->get_settings_for_display();
            $feature_shape   = $settings['feature_shape']['url'];
            $subtitle   = $settings['subtitle'];
            $title      = $settings['title'];
            $text      = $settings['text'];
            $features      = $settings['features'];

        ?>
        <section id="pr-mark-feature" class="pr-mark-feature-section position-relative">
            <span class="pr-mark-feature-shape position-absolute"><img src="<?php echo esc_url($feature_shape['url']);?>" alt=""></span>
            <div class="container">
                <div class="pr-mark-section-title headline pera-content text-center middle-align">
                    <span class="pr-mark-section-title-tag"><?php echo esc_html($subtitle);?></span>
                    <h2><?php echo esc_html($title);?></h2>
                    <p><?php echo __($text);?></p>
                </div>
                <div class="pr-mark-feature-content">
                    <div class="row justify-content-center">
                        <?php foreach($features as $item):?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="pr-mark-feature-innerbox position-relative headline pera-content elementor-repeater-item-<?php echo esc_attr($item['_id']);?>">
                                <div class="pr-mark-feature-inner-icon d-flex align-items-center justify-content-center  position-absolute">
                                    <i class="<?php echo esc_attr($item['feature_icon']);?>"></i>
                                </div>
                                <div class="pr-mark-feature-inner-text">
                                    <h3><a href="<?php echo esc_url($item['feature_link']['url']);?>"><?php echo esc_html($item['feature_title']);?></a></h3>
                                    <p><?php echo __($item['feature_text']);?></p>
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
