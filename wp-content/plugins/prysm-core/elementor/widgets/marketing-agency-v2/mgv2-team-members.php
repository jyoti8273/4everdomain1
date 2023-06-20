<?php

    class mgv2_team_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_team_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Team', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'team_content',
                [
                    'label' => __( 'Team Content', 'prysm' ),
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
                'bigtitle',
                [
                    'label' => __( 'BIG Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading',
                [
                    'label' => __( 'Main Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'team_image',
                [
                    'label' => __( 'Team Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'membername',
                [
                    'label' => __( 'Name', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'designation',
                [
                    'label' => __( 'Designation', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'team_link',
                [
                    'label' => __( 'Team Single Page', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'fb_icon',
                [
                    'label' => __( 'Facebook Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'fb_link',
                [
                    'label' => __( 'Facebook URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'twi_icon',
                [
                    'label' => __( 'Twitter Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );   
            $repeater->add_control(
                'twi_link',
                [
                    'label' => __( 'Twitter URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $repeater->add_control(
                'you_icon',
                [
                    'label' => __( 'YouTube Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'you_link',
                [
                    'label' => __( 'YouTube Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'rss_icon',
                [
                    'label' => __( 'RSS Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                    'label_block' => true,
                ]
            );          
            $repeater->add_control(
                'rss_link',
                [
                    'label' => __( 'RSS Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );          
            
            $this->add_control(
                'teammembers',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ membername }}}',
                ]
            ); 
            $this->end_controls_section();

            $this->start_controls_section(
                'team_infos_style',
                [
                    'label' => esc_html__( 'Team Style', 'prysm' ),
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
                'team_member_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Team Member Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'team_member_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .team-block-three .inner-box .lower-content h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                'team_member_color',
                [
                    'label' => esc_html__( 'Team Member Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team-block-three .inner-box .lower-content h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'team_deg_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Designation Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'team_designation_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .team-block-three .inner-box .lower-content .designation',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '14',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'designation_color',
                [
                    'label' => esc_html__( 'Designation Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .team-block-three .inner-box .lower-content .designation' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $subtitle        = $settings['subtitle'];
            $bigtitle        = $settings['bigtitle'];
            $heading         = $settings['heading'];
            $teammembers      = $settings['teammembers'];
            

        ?>
        <!-- Team Section Four -->
        <section class="team-section-four">
            <div class="container">
                <div class="sec-title-six centered">
                    <div class="big-letter"><?php echo esc_html($bigtitle);?></div>
                    <div class="title"><?php echo esc_html($subtitle);?> </div>
                    <h2><?php echo esc_html($heading);?></h2>
                </div>
                <div class="row clearfix">
                    
                    <?php foreach($teammembers as $item):?>
                    <!-- Team Block Three -->
                    <div class="team-block-three col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="<?php echo esc_url($item['team_link']['url']);?>"><img src="<?php echo esc_url($item['team_image']['url']);?>" alt="" /></a>
                                <!-- Social Box -->
                                <ul class="social-box">
                                    <?php if($item['fb_icon'] && $item['fb_link']):?>
                                    <li class="facebook"><a href="<?php echo esc_url($item['fb_link']);?>" ><?php \Elementor\Icons_Manager::render_icon( $item['fb_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
                                    <?php endif;?>

                                    <?php if($item['twi_icon'] && $item['twi_link']):?>
                                    <li class="twitter"><a href="<?php echo esc_url($item['twi_link']);?>" ><?php \Elementor\Icons_Manager::render_icon( $item['twi_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
                                    <?php endif;?>

                                    <?php if($item['you_icon'] && $item['you_link']):?>
                                    <li class="youtube"><a href="<?php echo esc_url($item['you_link']);?>" ><?php \Elementor\Icons_Manager::render_icon( $item['you_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
                                    <?php endif;?>

                                    <?php if($item['rss_icon'] && $item['rss_link']):?>
                                    <li class="rss"><a href="<?php echo esc_url($item['rss_link']);?>" ><?php \Elementor\Icons_Manager::render_icon( $item['rss_icon'], [ 'aria-hidden' => 'true' ] ); ?></a></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <div class="lower-content">
                                <h4><a href="<?php echo esc_url($item['team_link']['url']);?>"><?php echo esc_html($item['membername']);?></a></h4>
                                <div class="designation"><?php echo esc_html($item['designation']);?></div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Team Section Four -->
      <?php

              }

      }
