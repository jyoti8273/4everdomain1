<?php

    class ag2_choose_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_choose_section';
        }

        public function get_title() {
            return __( 'Agency Two Choose', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'about__content',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'heading', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );            
            $this->add_control(
                'heading_colord', [
                    'label'       => esc_html__( 'Color Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );            
            
            $this->add_control(
                'choose_img', [
                    'label'       => esc_html__( 'About Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'shapoe_pbackground',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .choose-section-two .image-column .image:before',
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'icon_img', [
                    'label'       => esc_html__( 'Icon Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'description', [
                    'label'       => esc_html__( 'Designation', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
            $repeater->add_control(
                'link', [
                    'label'       => esc_html__( 'Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'indivisual_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Indivisual Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $repeater->add_control(
                'title_hover_color',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} .inner-box:hover h5 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'icon_bgbackground',
                    'label' => esc_html__( 'Icon Indivisual BG', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .inner-box .icon:after',
                ]
            );
            $this->add_control(
                'featurelists',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
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
                'sub_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_h_color',
                [
                    'label'     => esc_html__( 'Sub Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine .title',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'heading_color',
                [
                    'label'     => esc_html__( 'Heading Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hdd_clr_text_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'colored_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Colored Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'colord_title_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2 span' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_control(
                'feature_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'f_title_style',
                [
                    'label'     => esc_html__( 'Feature Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-five .inner-box h5 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feature_title_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-five .inner-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '22',
                            ],
                        ],
                    ],
                ]
            );     
            $this->add_control(
                'f_text_style',
                [
                    'label'     => esc_html__( 'Feature Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-five .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            ); 
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'feature_text_style',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-five .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );  
            $this->end_controls_section();            

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $choose_img     = $settings['choose_img']['url'];
            $heading        = $settings['heading'];
            $sub_heading    = $settings['sub_heading'];
            $heading_colord = $settings['heading_colord'];
            $featurelists   = $settings['featurelists'];

        ?>  
        
       <!-- Choose Section Two -->
        <section class="choose-section-two">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-nine">
                                <div class="title"><?php echo esc_html($sub_heading);?></div>
                                <h2><?php echo esc_html($heading);?> <span><?php echo esc_html($heading_colord);?></span></h2>
                            </div>
                            
                            <div>
                                <?php foreach($featurelists as $item):?>                                   
                                <!-- Feature Block Five -->
                                <div class="feature-block-five elementor-repeater-item-<?php echo esc_attr($item['_id']);?>">
                                    <div class="inner-box">
                                        <div class="icon"><img src="<?php echo esc_url($item['icon_img']['url']);?>" alt="" /></div>
                                        <h5><a href="<?php echo esc_url($item['link']['url']);?>"><?php echo esc_html($item['title']);?></a></h5>
                                        <div class="text"><?php echo esc_html($item['description']);?></div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo esc_url($choose_img);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Choose Section Two -->
      <?php

              }

      }
