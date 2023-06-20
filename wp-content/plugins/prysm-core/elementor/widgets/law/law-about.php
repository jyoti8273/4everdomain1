<?php

    class law_about_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_about_section';
        }

        public function get_title() {
            return __( 'Law About', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'award_contetn',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'about_img',
                [
                    'label' => esc_html__( 'About Image 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'about_img2',
                [
                    'label' => esc_html__( 'About Image 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'about_img3',
                [
                    'label' => esc_html__( 'About Image 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'about_img4',
                [
                    'label' => esc_html__( 'About Image 4', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $this->add_control(
                'mainheading',
                [
                    'label' => esc_html__( 'Main Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description',
                [
                    'label' => esc_html__( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'quoteinfo',
                [
                    'label' => esc_html__( 'Quote Info', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'icon', [
                    'label'       => esc_html__( 'ICON', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::ICONS,
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
                    'label'       => esc_html__( 'Description', 'prysm' ),
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
            $this->add_control(
                'featuresitems',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
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
                'section_main_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'label'     => esc_html__( 'Section TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eight h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eight h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
                'section_desc_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Desc Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_desc',
                [
                    'label'     => esc_html__( 'Section Desc Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eight .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_desc__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eight .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
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
            $this->add_control(
                'section_quote_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Quote Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_quote_desc',
                [
                    'label'     => esc_html__( 'Section Quote Desc Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-section-twelve .content-column .styled-text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'section_quote_border',
                [
                    'label'     => esc_html__( 'Section Quote Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .services-section-twelve .content-column .styled-text' => 'border-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sec_quo__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .services-section-twelve .content-column .styled-text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
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
            $this->add_control(
                'feature_bar_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Bar Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'bar_title_clr',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-four .inner-box h4 a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'ftr_title_hover_clr',
                [
                    'label'     => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-four .inner-box h4 a:hover' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'ftr_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-four .inner-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '24',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'ftr_text_styler',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'ftr_text_color',
                [
                    'label'     => esc_html__( 'Feature Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-four .inner-box .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'ftr_txt__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .feature-block-four .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
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
            
            $this->add_control(
                'featreu_ic_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Feature Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'feature_icon_clr',
                [
                    'label'     => esc_html__( 'Feature Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .feature-block-four .inner-box .icon' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $about_img  = $settings['about_img']['url'];
            $about_img2  = $settings['about_img2']['url'];
            $about_img3  = $settings['about_img3']['url'];
            $about_img4  = $settings['about_img4']['url'];

            $featuresitems  = $settings['featuresitems'];
            $mainheading   = $settings['mainheading'];
            $description   = $settings['description'];
            $quoteinfo   = $settings['quoteinfo'];

        ?>

        <!-- Services Section Twelve -->
        <section class="services-section-twelve">
            <div class="auto-container">
                <div class="row clearfix">
                
                    <!-- Images Column -->
                    <div class="images-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo esc_url($about_img);?>" alt="" />
                            </div>
                            <div class="image-two">
                                <img src="<?php echo esc_url($about_img2);?>" alt="" />
                            </div>
                            <div class="image-three">
                                <img src="<?php echo esc_url($about_img3);?>" alt="" />
                            </div>
                            <div class="image-four">
                                <img src="<?php echo esc_url($about_img4);?>" alt="" />
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="sec-title-eight">
                                <h2><?php echo __($mainheading);?></h2>
                                <div class="text"><?php echo __($description);?></div>
                            </div>
                            <?php foreach($featuresitems as $item):?>
                            <!-- Feature Block Four -->
                            <div class="feature-block-four">
                                <div class="inner-box">
                                    <span class="icon">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </span>
                                    <h4><a href="<?php echo esc_url($item['link']);?>"><?php echo esc_html($item['title']);?></a></h4>
                                    <div class="text"><?php echo esc_html($item['description']);?></div>
                                </div>
                            </div>
                            <?php endforeach;?>
                            <div class="styled-text"><?php echo esc_html($quoteinfo);?></div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Services Section Twelve -->
      <?php

              }

      }
