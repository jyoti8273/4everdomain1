<?php

    class mgv2_content_table_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_content_table_section';
        }

        public function get_title() {
            return __( 'Marketing Content Box', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'content_table_list',
                [
                    'label' => __( 'Content Table List', 'prysm' ),
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
            
            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'item_image',
                [
                    'label' => __( 'Box Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
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
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'list_item1',
                [
                    'label' => __( 'List item 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'list_item2',
                [
                    'label' => __( 'List Item 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'list_item3',
                [
                    'label' => __( 'List Item 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'list_item4',
                [
                    'label' => __( 'List Item 4', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'list_item5',
                [
                    'label' => __( 'List Item 5', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'list_item6',
                [
                    'label' => __( 'List Item 6', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
                'btn_url',
                [
                    'label' => __( 'Button URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'businessblocks',
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
                'digital_-headins_big_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Big Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_big_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .big-letter',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '800',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '152',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'bigv_title_color',
                [
                    'label' => esc_html__( 'Big Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .big-letter' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'table_content_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Content Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'table_content_title',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block-three .inner-box .content h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'content_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-three .inner-box .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'table_content_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Content Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'table_content_text',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block-three .inner-box .content .text',
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
                'content_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-three .inner-box .content .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'table_content_list_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Content List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'table_content_list',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block-three .inner-box .check li',
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
                'content_list_color',
                [
                    'label' => esc_html__( 'List Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-three .inner-box .check li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'content_list_cjeck_color',
                [
                    'label' => esc_html__( 'List Check Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-three .inner-box .check li:before' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'table_content_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Content Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'table_content_btn',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .business-block-three .inner-box .started-btn',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '19',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'content_btn_color',
                [
                    'label' => esc_html__( 'Button Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .business-block-three .inner-box .started-btn' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .business-block-three .inner-box .started-btn',
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];
            $description   = $settings['description'];
            $businessblocks      = $settings['businessblocks'];
            

        ?>
        <!-- Business Section Four -->
        <section class="business-section-four">
            <div class="container">
                <div class="sec-title-six centered">
                    <div class="big-letter"><?php echo esc_html($subtitle);?></div>
                    <div class="title"><?php echo esc_html($title);?> </div>
                    <h2><?php echo __($description);?></h2>
                </div>
                <div class="row clearfix">
                    <?php foreach($businessblocks as $item):?>             
                    <!-- Business Block Three -->
                    <div class="business-block-three col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-box wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="image titlt" data-tilt data-tilt-max="4">
                                <img src="<?php echo esc_url($item['item_image']['url']);?>" alt="" />
                            </div>
                            <div class="content">
                                <h3><?php echo esc_html($item['title']);?></h3>
                                <div class="text"><?php echo esc_html($item['description']);?></div>
                            </div>
                            <div class="lower-box">
                                <div class="options-box">
                                    <div class="row clearfix">
                                        <div class="column col-lg-7 col-md-6 col-sm-12">
                                            <ul class="check">

                                                <?php if($item['list_item1']):?>
                                                <li><?php echo esc_html($item['list_item1']);?></li>
                                                <?php endif;?>

                                                <?php if($item['list_item2']):?>
                                                <li><?php echo esc_html($item['list_item2']);?></li>
                                                <?php endif;?>

                                                <?php if($item['list_item3']):?>
                                                <li><?php echo esc_html($item['list_item3']);?></li>
                                                <?php endif;?>

                                            </ul>
                                        </div>
                                        <div class="column col-lg-5 col-md-6 col-sm-12">
                                            <ul class="check">

                                                <?php if($item['list_item4']):?>
                                                <li><?php echo esc_html($item['list_item4']);?></li>
                                                <?php endif;?>

                                                <?php if($item['list_item5']):?>
                                                <li><?php echo esc_html($item['list_item5']);?></li>
                                                <?php endif;?>

                                                <?php if($item['list_item6']):?>
                                                <li><?php echo esc_html($item['list_item6']);?></li>
                                                <?php endif;?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo esc_url($item['btn_url']['url']);?>" class="theme-btn started-btn"><?php echo esc_html($item['btn_label']);?></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Business Section Four -->
      <?php

              }

      }
