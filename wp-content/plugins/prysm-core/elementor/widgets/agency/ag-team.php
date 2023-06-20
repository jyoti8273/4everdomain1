<?php

    class ag_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_team';
        }

        public function get_title() {
            return __( 'Agency Team', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-lock-user';
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
                'infos', [
                    'label'       => esc_html__( 'Heading Info', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $this->add_control(
                'team_shape', [
                    'label'       => esc_html__( 'Team Shape Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'team_id', [
                    'label'       => esc_html__( 'Select Team', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
            $this->add_control(
                'team_boxes',
                [
                    'label'       => __( 'Add Item', 'prysm-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'team_style',
                [
                    'label' => esc_html__( 'team Style', 'prysm' ),
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
                        '{{WRAPPER}} .pr-an-section-title span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'sub_br_color',
                [
                    'label'     => esc_html__( 'Sub Heading Border Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title span:after' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title span',
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
                        '{{WRAPPER}} .pr-an-section-title h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'heading_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'info_item_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'info_item_clr',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-section-title p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'info_item_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-section-title p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'team_name',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Name Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'team_name_clr',
                [
                    'label'     => esc_html__( 'Name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-team-inner-item .pr-an-team-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'team_name_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-team-inner-item .pr-an-team-text h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'team_position_name',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Position Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'team_position_clr',
                [
                    'label'     => esc_html__( 'Name Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-team-inner-item .pr-an-team-text span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'team_pose_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-team-inner-item .pr-an-team-text span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $team_shape  = $settings['team_shape']['url'];
            $team_boxes   = $settings['team_boxes'];
            $infos        = $settings['infos'];
            $heading      = $settings['heading'];
            $sub_heading  = $settings['sub_heading'];

        ?>  
        <section id="pr-an-team" class="pr-an-team-section">
            <div class="container">
                <div class="pr-an-section-title middle-align-title text-center headline pera-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                    <span><?php echo esc_html($sub_heading);?></span>
                    <h2><?php echo esc_html($heading);?></h2>
                    <p><?php echo __($infos);?></p>
                </div>
                <div class="pr-an-team-content position-relative">
                    <div class="carousel_nav text-right clearfix">
                        <button type="button" class="team-left_arrow"><i class="far fa-long-arrow-left"></i></button>
                        <button type="button" class="team-right_arrow"><i class="far fa-long-arrow-right"></i></button>
                    </div>
                    <span class="pr-an-team-shape position-absolute"><img src="<?php echo esc_url($team_shape);?>" alt=""></span>
                    <div class="pr-an-team-slider">
                    <?php $shape = 0; foreach($team_boxes as $index => $box): $shape++;?>
                    <?php  if( $box['team_id'] ) : 

                        if(get_post_meta($box['team_id'], 'prysm_teampost', true)) {
                        $team_meta = get_post_meta($box['team_id'], 'prysm_teampost', true);
                        } else {
                            $team_meta = array();
                        }
                    
                        if( array_key_exists( 'team_desg', $team_meta )) {
                            $team_desg = $team_meta['team_desg'];
                        } else {
                            $team_desg = '';
                        }    
                        if( array_key_exists( 'team_socialicons', $team_meta )) {
                            $team_socialicons = $team_meta['team_socialicons'];
                        } else {
                            $team_socialicons = '';
                        }    
                    ?>
                        <div class="pr-item-innerbox wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <div class="pr-an-team-inner-item position-relative">
                                <div class="pr-an-team-img position-relative">
                                    <img src="<?php echo get_the_post_thumbnail_url($box['team_id'], 'full')?>" alt="">
                                    <span class="pr-an-team-btn position-absolute"></span>
                                    <div class="pr-an-team-social">
                                        <?php foreach($team_socialicons as $icon):?>
                                        <a href="<?php echo esc_url($icon['team_icon_link']);?>"><i class="<?php echo esc_attr($icon['team_icon_class']);?>"></i></a>
                                        <?php endforeach;?>
                                    </div>
                                </div>
                                <div class="pr-an-team-text text-center headline">
                                    <h3><a href="<?php echo get_the_permalink($box['team_id']);?>"><?php echo get_the_title($box['team_id']);?></a></h3>
                                    <span><?php echo esc_html($team_desg);?></span>
                                </div>
                            </div>
                        </div>
                        <?php endif; endforeach;?>
                    </div>
                </div>
            </div>
        </section>
      <?php

        }
        protected function select_param_posts() {
            $args = wp_parse_args( [
                'post_type'   => 'team',
                'numberposts' => -1,
                'orderby'     => 'title',
                'order'       => 'ASC',
            ] );
        
            $query_query = get_posts( $args );
        
            $posts = [];
            if ( $query_query ) {
                foreach ( $query_query as $query ) {
                    $posts[$query->ID] = $query->post_title;
                }
            }
        
            return $posts;
        }

      }
