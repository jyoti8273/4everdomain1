<?php

    class constv3_hire_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_heire_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Hire', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'hire__content',
                [
                    'label' => __( 'Hire Section Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'hire_bg', [
                    'label'       => esc_html__( 'Hire BG', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .sec-title-five .title:before',
                ]
            );
            $repeater = new \Elementor\Repeater(); 

            $repeater->add_control(
                'tab_icon',
                [
                    'label' => __( 'Tab Icon', 'prysm' ),
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
                'content_title',
                [
                    'label' => __( 'Content Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $repeater->add_control(
                'tab_description',
                [
                    'label' => __( 'Content Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'btn_label',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'btn_link',
                [
                    'label' => __( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'tab_imgae',
                [
                    'label' => __( 'Tab Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'tabsitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'tab_style',
                [
                    'label' => esc_html__( 'Tab Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'section_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                        '{{WRAPPER}} .sec-title-five .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'service_heading_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'heading_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '36',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'main_heading_color',
                [
                    'label' => esc_html__( 'Heading Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-five h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Tab Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tab_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .hiring-tabs .tab-btns .tab-btn',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'counter_color',
                [
                    'label' => esc_html__( 'Counter Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hiring-tabs .tab-btns .tab-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'counter_active_color',
                [
                    'label' => esc_html__( 'Tab Active Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hiring-tabs .tab-btns .tab-btn:hover, .hiring-tabs .tab-btns .tab-btn.active-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'counter_active_bg_color',
                [
                    'label' => esc_html__( 'Tab Active Background Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hiring-tabs .tab-btns .tab-btn:hover, .hiring-tabs .tab-btns .tab-btn.active-btn' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_content_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Tab Content Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cont_main_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .hiring-tabs .tabs-content .content-column h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '30',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'conte_title_color',
                [
                    'label' => esc_html__( 'Content Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hiring-tabs .tabs-content .content-column h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'tab_content_text_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Tab Content Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cont_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .hiring-tabs .tabs-content .content-column .text',
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

            $this->add_control(
                'conte_txt_color',
                [
                    'label' => esc_html__( 'Content Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .hiring-tabs .tabs-content .content-column .text' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'about_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'about Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-eleven',
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
            $this->add_control(
                'about_btn_clr',
                [
                    'label' => esc_html__( 'about Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-eleven' => 'background: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'about_btn_hover_clr',
                [
                    'label' => esc_html__( 'about Button Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-eleven:before' => 'background: {{VALUE}}',
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $hire_bg       = $settings['hire_bg'];
            $sub_title     = $settings['sub_title'];
            $description     = $settings['description'];
            $maintitle     = $settings['maintitle'];
            $tabsitem      = $settings['tabsitem'];

        ?>
            <!-- Hiring Section -->
            <section class="hiring-section" style="background-image: url(<?php echo esc_url($hire_bg['url']);?>)">
                <div class="container">
                    <div class="sec-title-five">
                        <div class="clearfix">
                            <div class="pull-left">
                                <div class="title"><?php echo esc_html($sub_title);?></div>
                                <h2><?php echo __($maintitle);?></h2>
                            </div>
                            <div class="pull-right">
                                <div class="text"><?php echo __($description);?></div>
                            </div>
                        </div>
                    </div>
                    <!-- Hiring Info Tabs -->
                    <div class="hiring-info-tabs">
                        <!-- Hiring Tabs -->
                        <div class="hiring-tabs tabs-box">
                        
                            <!-- Tab Btns -->
                            <ul class="tab-btns tab-buttons clearfix">
                                <?php $itemIndex = 0; foreach($tabsitem as $item): $itemIndex++;
                                if(1 == $itemIndex):
                                ?>
                                <li data-tab="#prod-<?php echo esc_attr($itemIndex);?>" class="tab-btn active-btn"><span class="icon"><?php \Elementor\Icons_Manager::render_icon( $item['tab_icon'], [ 'aria-hidden' => 'true' ] ); ?></span> <?php echo esc_html($item['title']);?></li>
                                <?php else:?>

                                <li data-tab="#prod-<?php echo esc_attr($itemIndex);?>" class="tab-btn"><span class="icon"><?php \Elementor\Icons_Manager::render_icon( $item['tab_icon'], [ 'aria-hidden' => 'true' ] ); ?></span> <?php echo esc_html($item['title']);?></li>

                                <?php endif; endforeach;?>

                            </ul>
                            
                            <!-- Tabs Container -->
                            <div class="tabs-content">
                                <?php $itemIndex = 0; foreach($tabsitem as $item): $itemIndex++;
                                if(1 == $itemIndex):
                                ?>
                                <!-- Tab / Active Tab -->
                                <div class="tab active-tab" id="prod-<?php echo esc_attr($itemIndex);?>">
                                    <div class="content">
                                        <div class="row clearfix">
                                            <!-- Content Column -->
                                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                                <div class="inner-column">
                                                    <h3><?php echo esc_html($item['content_title']);?></h3>
                                                    <div class="text">
                                                        <?php echo wpautop($item['tab_description']);?>
                                                    </div>
                                                    <!-- Button Box -->
                                                    <div class="button-box">
                                                        <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn btn-style-eleven"><span class="txt"><?php echo esc_html($item['btn_label']);?></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Image Column -->
                                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                                <div class="inner-column">
                                                    <div class="image">
                                                        <img src="<?php echo esc_url($item['tab_imgae']['url']);?>" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else:?>
                                <!-- Tab -->
                                <div class="tab" id="prod-<?php echo esc_attr($itemIndex);?>">
                                    <div class="content">
                                        <div class="row clearfix">
                                            <!-- Content Column -->
                                            <div class="content-column col-lg-6 col-md-12 col-sm-12">
                                                <div class="inner-column">
                                                    <h3><?php echo esc_html($item['content_title']);?></h3>
                                                    <div class="text">
                                                    <?php echo wpautop($item['tab_description']);?>
                                                    </div>
                                                    <!-- Button Box -->
                                                    <div class="button-box">
                                                        <a href="<?php echo esc_url($item['btn_link']['url']);?>" class="theme-btn btn-style-eleven"><span class="txt"><?php echo esc_html($item['btn_label']);?></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Image Column -->
                                            <div class="image-column col-lg-6 col-md-12 col-sm-12">
                                                <div class="inner-column">
                                                    <div class="image">
                                                        <img src="<?php echo esc_url($item['tab_imgae']['url']);?>" alt="" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; endforeach;?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Hiring Section -->
      <?php

              }

      }
