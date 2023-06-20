<?php

    class prysm2_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm2_team';
        }

        public function get_title() {
            return __( 'Prysm2 Team', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-user-circle-o';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'heading__content',
                [
                    'label' => __( 'Heading Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'memberImg',
                [
                    'label' => __( 'Team Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'membername', [
                    'label'       => esc_html__( 'Team Member Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'memberposition', [
                    'label'       => esc_html__( 'Team Position', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'detailsmember', [
                    'label'       => esc_html__( 'Details URL', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'datanext-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            ); 
            $repeater->add_control(
                'social_link', [
                    'label'       => esc_html__( 'Social LINK', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            $this->add_control(
                'socials',
                [
                    'label'       => __( 'Add Item', 'datanext-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'team_style',
                [
                    'label' => esc_html__( 'Team Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .designation h6' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-members-column .designation h6',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            
            $this->add_control(
                'h_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Position Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'position_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .designation span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'position_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-members-column .designation span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
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
                'icon_style_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .designation .social-info a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'icon_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic','gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-members-column .designation .social-info a',
                ]
            );
            $this->add_control(
                'width',
                [
                    'label' => __( 'Width', 'prysomn' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .designation .social-info a' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'height',
                [
                    'label' => __( 'Height', 'prysomn' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .designation .social-info a' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'lineheight',
                [
                    'label' => __( 'Line Height', 'prysomn' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .designation .social-info a' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'team_box_style',
                [
                    'label' => esc_html__( 'Team Box Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'box_round',
                [
                    'label' => __( 'Box Radius', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr2-members-column .img-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'box_bg_overlay',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic','gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr2-members-column .img-container::before',
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $memberImg         = $settings['memberImg']['url'];
            $membername        = $settings['membername'];
            $memberposition    = $settings['memberposition'];
            $detailsmember     = $settings['detailsmember'];
            $socials           = $settings['socials'];

        ?>
        <div class="pr2-members-column wow slideInUp">
            <a href="<?php echo esc_url($item['detailsmember']['url']);?>" class="view-details">+</a>
            <div class="img-container">
                <img src="<?php echo esc_url($memberImg);?>" alt="<?php echo esc_html($membername);?>">
            </div>
            <div class="designation pr2-headline">
                <a href="<?php echo esc_url($item['detailsmember']['url']);?>"><h6><?php echo esc_html($membername);?></h6></a>
                <span><?php echo esc_html($memberposition);?></span>
                <div class="social-info">
                    <?php foreach($socials as $item):?>
                    <a href="<?php echo esc_url($item['social_link']['url']);?>">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </a>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
      <?php

              }

      }
