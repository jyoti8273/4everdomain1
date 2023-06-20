<?php

    class its_section_heading extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_section_heading';
        }

        public function get_title() {
            return __( 'Itsolution Section Heading', 'prysm' );
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
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );            
            $this->add_control(
                'color_title', [
                    'label'       => esc_html__( 'Color Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $this->add_control(
                'heading_info', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
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
                'h_sub_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-subtitle',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'main_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
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
                        '{{WRAPPER}} .pr20-title-area h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
           
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area h3',
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
                    'label'     => esc_html__( 'Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-pera-txt p',
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

            $settings           = $this->get_settings_for_display();
            $sub_title          = $settings['sub_title'];
            $title              = $settings['title'];
            $color_title        = $settings['color_title'];
            $heading_info       = $settings['heading_info'];
            $heading_alignment  = $settings['heading_alignment'];

        ?>
    <div class="pr20-title-area text-<?php echo esc_attr($heading_alignment);?> wow fadeInUp">
        <span class="pr20-subtitle"><?php echo esc_html($sub_title);?></span>
        <div class="pr20-headline">
            <h3><?php echo esc_html($title);?> <span><?php echo esc_html($color_title);?></span></h3>
        </div>
        <?php if($heading_info):?>
        <div class="pr20-pera-txt">
            <p><?php echo __($heading_info)?></p>
        </div>
        <?php endif;?>
    </div>
      <?php

              }

      }
