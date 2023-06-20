<?php

    class prysm2_section_heading extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm2_section_heading';
        }

        public function get_title() {
            return __( 'Section Heading', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-heading';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'heading__content',
                [
                    'label' => __( 'Heading Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'styled_title', [
                    'label'       => esc_html__( 'Stylish Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'heading_info', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'heading_alignment',
                [
                    'label' => __( 'Alignment', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'prysm' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'prysm' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'prysm' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'section_heading_style',
                [
                    'label' => esc_html__( 'Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'sub_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sb_title__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-title-area .pr2-subtitle' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-title-area .pr2-subtitl',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            
            $this->add_control(
                'h_title',
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
                        '{{WRAPPER}} .pr2-headline h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-headline h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'h_stylish_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Stylish itle Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                's_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-title-area h2 span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 's_titte_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-title-area h2 span::after',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 's_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-title-area h2 span',
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
                        '{{WRAPPER}} .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-pera-txt p',
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

            $settings     = $this->get_settings_for_display();
            $sub_title        = $settings['sub_title'];
            $title            = $settings['title'];
            $styled_title            = $settings['styled_title'];
            $heading_info            = $settings['heading_info'];
            $heading_alignment            = $settings['heading_alignment'];

        ?>
        <div class="pr2-title-area pr2-headline text-<?php echo esc_attr($heading_alignment);?> wow fadeInDown">
            <div class="title-top">
                <span class="pr2-subtitle"><?php echo esc_html($sub_title);?></span>
                <h2><?php echo esc_html($title);?> <?php if($styled_title):?><span><?php echo esc_html($styled_title);?></span><?php endif;?></h2>
            </div>
            <div class="pr2-pera-txt">
                <p><?php echo __($heading_info)?></p>
            </div>
        </div>
      <?php

              }

      }
