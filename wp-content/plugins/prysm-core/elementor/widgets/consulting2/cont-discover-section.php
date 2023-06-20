<?php

    class cont_discover_info extends \Elementor\Widget_Base {

        public function get_name() {
            return 'cont_discover_info';
        }

        public function get_title() {
            return __( 'Consulting Discover Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-discover-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'discover_info_content',
                [
                    'label' => __( 'Discover Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'sub_heading',
                [
                    'label' => __( 'Sub Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading',
                [
                    'label' => __( 'Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                'year_img',
                [
                    'label' => __( 'Year Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'exprience_title',
                [
                    'label' => __( 'Exprience Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_text',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_link',
                [
                    'label' => __( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'list_title',
                [
                    'label' => __( 'List Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'listsitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ list_title }}}',
                ]
            );
            
            $this->add_control(
                'seperator_agence',
                [
                    'label' => esc_html__( 'Right Content', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'agency_img',
                [
                    'label' => __( 'Agency Image', 'prysm' ),
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
                'shape2',
                [
                    'label' => __( 'Shape 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'shape3',
                [
                    'label' => __( 'Shape 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'shape4',
                [
                    'label' => __( 'Shape 4', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'discover_style',
                [
                    'label' => esc_html__( 'Discover Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'discover_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Discover Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-three .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'agsection_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-three h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '60',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'agsection_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-three .text',
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
                'exp_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Experiance Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'exp_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .discover-section .content-column .experiance',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '28',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'list_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'list_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .discover-section .content-column .discover-list li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'agsection_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Btn Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-four',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $sub_heading = $settings['sub_heading'];
            $heading     = $settings['heading'];
            $description = $settings['description'];
            $year_img   = $settings['year_img'];
            $exprience_title  = $settings['exprience_title'];
            $btn_text    = $settings['btn_text'];
            $btn_link    = $settings['btn_link'];
            $listsitem    = $settings['listsitem'];

            $agency_img    = $settings['agency_img'];
            $shape1    = $settings['shape1'];
            $shape2    = $settings['shape2'];
            $shape3    = $settings['shape3'];
            $shape4    = $settings['shape4'];

        ?>
        <!-- Discover Section -->
        <section class="discover-section">
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title Three -->
                            <div class="sec-title-three">
                                <div class="title"><?php echo esc_html($sub_heading);?></div>
                                <h2><?php echo __($heading);?></h2>
                                <div class="text"><?php echo esc_html($description);?></div>
                            </div>
                            <div class="row clearfix">
                                <!-- Column -->
                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <div class="years">
                                        <img src="<?php echo esc_url($year_img['url']);?>" alt="" />
                                    </div>
                                    <div class="experiance"><?php echo __($exprience_title);?></div>
                                </div>
                                <!-- Column -->
                                <div class="column col-lg-6 col-md-6 col-sm-12">
                                    <ul class="discover-list">
                                        <?php foreach($listsitem as $item):?>
                                        <li><?php echo esc_html($item['list_title']);?></li>
                                        <?php endforeach;?>
                                    </ul>
                                </div>
                            </div>
                            <div class="button-box">
                                <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-four"><span class="txt"><?php echo esc_html($btn_text);?></span></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo esc_html($agency_img['url']);?>" alt="" />
                            </div>
                            <div class="icons-outer parallax-scene-1">
                                <div data-depth="0.50" class="icon-one">
                                    <img src="<?php echo esc_html($shape1['url']);?>" alt="" />
                                </div>
                                <div data-depth="0.20" class="icon-two">
                                    <img src="<?php echo esc_html($shape2['url']);?>" alt="" />
                                </div>
                                <div data-depth="0.30" class="icon-three">
                                    <img src="<?php echo esc_html($shape3['url']);?>" alt="" />
                                </div>
                                <div data-depth="0.70" class="icon-four">
                                    <img src="<?php echo esc_html($shape4['url']);?>" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Discover Section -->
      <?php

              }

      }
