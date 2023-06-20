<?php

    class mgv2_digital_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_digital_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Digital Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'digital_content',
                [
                    'label' => __( 'digital Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'shape',
                [
                    'label' => __( 'Shape', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'shape1',
                [
                    'label' => __( 'Shape 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'parallax_screen',
                [
                    'label' => __( 'Parralax Screen', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'btn_label',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $this->add_control(
                'btn_url',
                [
                    'label' => __( 'Button URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'listitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'digital_style',
                [
                    'label' => esc_html__( 'digital Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'digital_sub-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_sub_title_color',
                [
                    'label' => esc_html__( 'digital Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'digital_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '50',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_title_color',
                [
                    'label' => esc_html__( 'digital Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'digital_-headins_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'digital Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_text_color',
                [
                    'label' => esc_html__( 'digital Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'digital_-list_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Digital List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-section-two .content .checked li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '20',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_list_text_color',
                [
                    'label' => esc_html__( 'digital List Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section-two .content .checked li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_list_icon_color',
                [
                    'label' => esc_html__( 'Digital List BG Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section-two .content .checked li:hover::before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_list_br_icon_color',
                [
                    'label' => esc_html__( 'Digital List Icon Border Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-section-two .content .checked li:hover::before' => 'border-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'mgv2_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-thirteen',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'mgv2_btn_color',
                [
                    'label' => esc_html__( 'Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-thirteen' => 'color: {{VALUE}} !important' ,
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-thirteen',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background_hover',
                    'label' => esc_html__( 'Background Hover', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-thirteen:before',
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();

            $shape   = $settings['shape'];
            $shape1   = $settings['shape1'];

            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];
            $description   = $settings['description'];
            $parallax_screen   = $settings['parallax_screen'];
            $btn_label   = $settings['btn_label'];
            $btn_url   = $settings['btn_url'];
            $listitems      = $settings['listitems'];
            

        ?>
        <!-- Digital Section Two -->
        <section class="digital-section-two" style="background-image: url(<?php echo esc_url($shape['url']);?>)">
            <div class="auto-container">
                <div class="content">
                    <div class="pattern-layer" style="background-image: url(<?php echo esc_url($shape1['url']);?>)"></div>
                    <div class="sec-title-six">
                        <div class="title"><?php echo esc_html($subtitle);?></div>
                        <h2><?php echo esc_html($title);?></h2>
                        <div class="text"><?php echo esc_html($description);?></div>
                    </div>
                    <ul class="checked">
                        <?php foreach($listitems as $item):?>
                        <li><?php echo esc_html($item['title']);?></li>
                        <?php endforeach;?>
                    </ul>
                    <div class="btns-box">
                        <a href="<?php echo esc_url($btn_url['url']);?>" class="theme-btn btn-style-thirteen"><span class="txt"><?php echo esc_html($btn_label);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                    </div>
                    
                    <div class="side-box parallax-scene-3">
                        <img data-depth="0.40" src="<?php echo esc_url($parallax_screen['url']);?>" alt="" />
                    </div>
                </div>
            </div>
        </section>
        <!-- End Digital Section Two -->
      <?php

              }

      }
