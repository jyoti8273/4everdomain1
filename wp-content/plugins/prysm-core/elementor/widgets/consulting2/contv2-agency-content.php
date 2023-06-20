<?php

    class cont_ag_content_info extends \Elementor\Widget_Base {

        public function get_name() {
            return 'cont_ag_content_info';
        }

        public function get_title() {
            return __( 'Consulting Agency Section', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-agency_section-full-screen';
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
                'pattern2',
                [
                    'label' => __( 'Pattern 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
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
                'video_img',
                [
                    'label' => __( 'Video Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'video_text',
                [
                    'label' => __( 'Video Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
            $this->add_control(
                'seperator_agence',
                [
                    'label' => esc_html__( 'Agency Right Content', 'prysm' ),
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
                'column',
                [
                    'label' => __( 'Column', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'counter',
                [
                    'label' => __( 'Counter', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'symbole',
                [
                    'label' => __( 'Symbole', 'prysm' ),
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
                'agencylists',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
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
            
            $this->end_controls_section();

            $this->start_controls_section(
                'agency_section_style',
                [
                    'label' => esc_html__( 'Agency Section Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'agsection_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
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
                    'selector'       => '{{WRAPPER}} .agent-list-column .agent-list',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
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
            $pattern     = $settings['pattern'];
            $pattern2    = $settings['pattern2'];
            $agency_img  = $settings['agency_img'];
            $video_img   = $settings['video_img'];
            $video_text  = $settings['video_text'];
            $video_link  = $settings['video_link'];
            $sub_heading = $settings['sub_heading'];
            $heading     = $settings['heading'];
            $description = $settings['description'];
            $agencylists = $settings['agencylists'];
            $btn_text    = $settings['btn_text'];
            $btn_link    = $settings['btn_link'];

        ?>
        <section class="agency-section">
            <div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern['url']);?>)"></div>
            <div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2['url']);?>)"></div>
            <div class="auto-container">
                <div class="row clearfix">
                    
                    <!-- Image Column -->
                    <div class="image-column col-lg-5 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="image">
                                <img src="<?php echo esc_url($agency_img['url']);?>" alt="" />
                            </div>
                            <div class="video-image">
                                <img src="<?php echo esc_url($video_img['url']);?>" alt="" />
                                <div class="overlay-box">
                                    <a href="<?php echo esc_url($video_link);?>" class="lightbox-image play-box"><span class="fa fa-play"><i class="ripple"></i></span>
                                    <?php echo esc_html($video_text);?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Column -->
                    <div class="content-column col-lg-7 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <!-- Sec Title Three -->
                            <div class="sec-title-three">
                                <div class="title"><?php echo esc_html($sub_heading);?></div>
                                <h2><?php echo esc_html($heading);?></h2>
                                <div class="text"><?php echo esc_html($description);?></div>
                            </div>
                            <div class="row clearfix">
                                <?php foreach($agencylists as $list):?>
                                <!-- Column -->
                                <div class="agent-list-column col-lg-<?php echo esc_attr($list['column']);?> col-md-6 col-sm-12">
                                    <div class="agent-list">
                                        <span class="count-outer count-box">
                                            <i class="count-text counter"><?php echo esc_html($list['counter']);?></i><?php echo esc_html($list['symbole']);?>
                                        </span>
                                        <?php echo esc_html($list['title']);?>
                                    </div>
                                </div>
                                <!-- Column -->
                                <?php endforeach;?>
                            </div>
                            <div class="button-box">
                                <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-four"><span class="txt"><?php echo esc_html($btn_text);?></span></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
      <?php

              }

      }
