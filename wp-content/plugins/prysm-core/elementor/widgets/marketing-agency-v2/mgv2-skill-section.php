<?php

    class mgv2_skill_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_skill_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Skill', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'skill_content',
                [
                    'label' => __( 'Skill Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'icon',
                [
                    'label' => __( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'phone_text',
                [
                    'label' => __( 'Phone Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'phone',
                [
                    'label' => __( 'Phone', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'phone_link',
                [
                    'label' => __( 'Phone Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button_label',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Button URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'skill_img',
                [
                    'label' => __( 'SKill Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'icon',
                [
                    'label' => __( 'ICON', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
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
                'number',
                [
                    'label' => __( 'Progress Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'skillitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            
            $this->add_control(
                'video_img',
                [
                    'label' => __( 'Video Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );  
            $this->add_control(
                'video_link',
                [
                    'label' => __( 'Video Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );  
            $this->end_controls_section();

            $this->start_controls_section(
                'about_style',
                [
                    'label' => esc_html__( 'about Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'about_sub-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Sub Title Style', 'prysm' ),
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
                    'label' => esc_html__( 'About Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_-headins_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Title Style', 'prysm' ),
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
                    'label' => esc_html__( 'About Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_-headins_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'About Text Style', 'prysm' ),
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
                    'label' => esc_html__( 'About Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'phone_info_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Phone Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'phone_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .skill-section .phone-box .box-inner',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '17',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'serv_list_text_color',
                [
                    'label' => esc_html__( 'About List Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .skill-section .phone-box .box-inner' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'phone_no_text',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Phone No Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'phone_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .skill-section .phone-box .box-inner a',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                'phone_no_color',
                [
                    'label' => esc_html__( 'Phone No Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .skill-section .phone-box .box-inner a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'phone_hover_no_color',
                [
                    'label' => esc_html__( 'Phone No Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .skill-section .phone-box .box-inner a:hover' => 'color: {{VALUE}}',
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
            $this->add_control(
                'skill_bar_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Skill Bar Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'skill_bar_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .skills-three .skill-item .skill-header .skill-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                'skill_color',
                [
                    'label' => esc_html__( 'Skill Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .skills-three .skill-item .skill-header .skill-title' => 'color: {{VALUE}} !important' ,
                    ],
                ]
            );
            
            $this->add_control(
                'skill_br_color',
                [
                    'label' => esc_html__( 'Skill Bar Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .skills-three .skill-item .skill-bar .bar-inner .bar' => 'border-bottom: 10px solid {{VALUE}}' ,
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];
            $description   = $settings['description'];
            $phone_text   = $settings['phone_text'];
            $phone   = $settings['phone'];
            $phone_link   = $settings['phone_link'];
            $button_label   = $settings['button_label'];
            $button_link   = $settings['button_link'];


            $skill_img      = $settings['skill_img'];
            $skillitems      = $settings['skillitems'];
            $video_img      = $settings['video_img'];
            $video_link      = $settings['video_link'];
            

        ?>
            <!-- Skill Section -->
            <section class="skill-section">
                <div class="container">
                    <div class="row clearfix">
                        
                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title-six">
                                    <div class="title"><?php echo esc_html($subtitle);?></div>
                                    <h2><?php echo esc_html($title);?></h2>
                                    <div class="text"><?php echo esc_html($description);?></div>
                                </div>
                                <div class="phone-box">
                                    <div class="box-inner">
                                        <span class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </span>
                                        <?php echo esc_html($phone_text);?><br>
                                        <a class="phone" href="<?php echo __($phone_link);?>"><?php echo esc_html($phone);?></a>
                                    </div>
                                </div>
                                <div class="buttons-box">
                                    <a href="<?php echo esc_url($button_link['url']);?>" class="theme-btn btn-style-thirteen"><span class="txt"><?php echo esc_html($button_label);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                                    <img src="<?php echo esc_url($skill_img['url']);?>" alt="" />
                                </div>
                                <div class="lower-box wow fadeInRight" data-wow-delay="150ms" data-wow-duration="1500ms">
                                    <div class="box-inner">
                                        <div class="skill-box">
                                            
                                            <!-- Skills -->
                                            <div class="skills-three">
                                                <?php foreach($skillitems as $item):?>
                                                <!-- Skill Item -->
                                                <div class="skill-item">
                                                    <div class="skill-header clearfix">
                                                        <span class="icon">
                                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                                        </span>
                                                        <div class="skill-title"><?php echo esc_html($item['title']);?></div>
                                                    </div>
                                                    <div class="skill-bar">
                                                        <div class="bar-inner">
                                                            <div class="bar progress-line wow fadeInLeft animated" data-width="<?php echo esc_attr($item['number']);?>" style="width:<?php echo esc_attr($item['number']);?>%">
                                                                <div class="skill-percentage">
                                                                    <div class="count-box">
                                                                        <span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($item['number']);?>">0</span>%
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach;?>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="video-box">
                                            <img src="<?php echo esc_url($video_img['url']);?>" alt="" />
                                            <div class="overlay-box">
                                                <a href="<?php echo esc_url($video_link);?>" class="lightbox-image play-box"><span class="fa fa-play"><i class="ripple"></i></span></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            <!-- End Skill Section -->
      <?php

              }

      }
