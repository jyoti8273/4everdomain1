<?php

    class business2_contact_info_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'business2_contact_info_section';
        }

        public function get_title() {
            return __( 'Business V2 Contact Info', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'contact_info_content',
                [
                    'label' => __( 'Contact Info Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            ); 

            $this->add_control(
                'section_bg',
                [
                    'label' => __( 'Pattern Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
                        
            $this->add_control(
                'sub_title',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'Icon', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'info_title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'info_value', [
                    'label'       => esc_html__( 'Info Value', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $repeater->add_control(
                'info_url', [
                    'label'       => esc_html__( 'LInk', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
                       
            $this->add_control(
                'contactinfos',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->add_control(
                'info_img', [
                    'label'       => esc_html__( 'Contact Info Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );   
            $this->end_controls_section();

            $this->start_controls_section(
                'fnf_style',
                [
                    'label' => esc_html__( 'Fanfact Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'subtitle_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Subtitle Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'subtitle_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven .title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-seven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-seven h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'icon_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-section .info-column .list li .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bg_color',
                [
                    'label' => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-section .info-column .list li .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'info_bot_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .contact-info-section .info-column .list li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'info_title_color',
                [
                    'label' => esc_html__( 'Info Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-section .info-column .list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'info_val_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Value Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_value_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .contact-info-section .info-column .list li a, .contact-info-section .info-column .list li strong',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'info_value_color',
                [
                    'label' => esc_html__( 'Info Value Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-section .info-column .list li a, .contact-info-section .info-column .list li strong' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'info_value_hover_color',
                [
                    'label' => esc_html__( 'Info Value Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-section .info-column .list li a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'info_imga_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Image Background', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'info_image_bg_color',
                [
                    'label' => esc_html__( 'Info Image BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .contact-info-section .image-column .image:before' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $section_bg   = $settings['section_bg'];
            
            $sub_title   = $settings['sub_title'];
            $maintitle   = $settings['maintitle'];

            $contactinfos    = $settings['contactinfos'];
            $info_img    = $settings['info_img'];
            

        ?>
        <!-- Contact Info Section -->
            <section class="contact-info-section" style="background-image: url(<?php echo esc_url($section_bg['url']);?>)">
                <div class="auto-container">
                    <div class="row clearfix">
                    
                        <!-- Info Column -->
                        <div class="info-column col-lg-7 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title-seven style-two">
                                    <div class="title"><?php echo esc_html($sub_title);?></div>
                                    <h2><?php echo __($maintitle);?></h2>
                                </div>
                                <ul class="list">
                                    <?php foreach($contactinfos as $item):?>
                                    <li>
                                        <span class="icon">
                                            <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </span>
                                        <?php echo esc_html($item['info_title']);?>
                                        <a href="<?php echo esc_url($item['info_url']);?>"><?php echo esc_html($item['info_value']);?></a>
                                    </li>
                                    <?php endforeach;?>
                                    
                                </ul>
                            </div>
                        </div>
                        
                        <!-- Image Column -->
                        <div class="image-column col-lg-5 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image titlt" data-tilt-max="4">
                                    <img src="<?php echo esc_url($info_img['url']);?>" alt="" />
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Contact Info Section -->
      <?php

              }

      }
