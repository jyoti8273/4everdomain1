<?php

    class cont_consulting_section_info extends \Elementor\Widget_Base {

        public function get_name() {
            return 'cont_consulting_section_info';
        }

        public function get_title() {
            return __( 'Consulting V2 Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-consulting-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'agency_info_content',
                [
                    'label' => __( 'Agency Info Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'pattern',
                [
                    'label' => __( 'Pattern', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'consulting_img',
                [
                    'label' => __( 'Agency Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'consulting_shape',
                [
                    'label' => __( 'Video Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
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
            $repeater = new \Elementor\Repeater();   

            $repeater->add_control(
                'number',
                [
                    'label' => __( 'Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
            $this->add_control(
                'conlistitem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ number }}} - {{{ title }}}',
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'consulting_style',
                [
                    'label' => esc_html__( 'Consulting Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'consulting_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'feature Box Style', 'prysm' ),
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
                'agsection_list_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .consulting-section .content-column .consult-list li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '21',
                            ],
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $pattern         = $settings['pattern'];
            $consulting_img  = $settings['consulting_img'];
            $consulting_shape   = $settings['consulting_shape'];
            $sub_heading = $settings['sub_heading'];
            $heading     = $settings['heading'];
            $description = $settings['description'];
            $conlistitem = $settings['conlistitem'];

        ?>
        <!-- Consulting Section -->
        <section class="consulting-section">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern['url']);?>)"></div>
                    <div class="row clearfix">
                        
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column parallax-scene-2">
                                <div data-depth="0.20" class="image">
                                    <img src="<?php echo esc_url($consulting_img['url']);?>" alt="" />
                                </div>
                                <div data-depth="0.50" class="graph-image">
                                    <img src="<?php echo esc_url($consulting_shape['url']);?>" alt="" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <!-- Sec Title Three -->
                                <div class="sec-title-three">
                                    <div class="title"><?php echo esc_html($sub_heading);?></div>
                                    <h2><?php echo __($heading);?></h2>
                                    <div class="text"><?php echo esc_html($description);?></div>
                                </div>
                                <ul class="consult-list">
                                    <?php foreach($conlistitem as $item):?>
                                    <li>
                                        <span><?php echo esc_attr($item['number']);?></span>
                                        <?php echo esc_html($item['title']);?>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Consulting Section -->
      <?php

              }

      }
