<?php

    class prysm3_team extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_team';
        }

        public function get_title() {
            return __( 'Team Three', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'service_content',
            [
                'label' => __( 'Service Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'team_id', [
                'label'       => esc_html__( 'Select Service', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::SELECT,
                'label_block' => true,
                'options'     => $this->select_param_posts(),
            ]
        );

        $repeater->add_control(
            'hr',
            [
                'type'  => \Elementor\Controls_Manager::DIVIDER,
                'style' => 'thick',
            ]
        );
       
        $repeater->add_control(
			'team_image',
			[
				'label' => __( 'Team Image', 'prysm' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $repeater->add_control(
			'team_thumb',
			[
				'label' => __( 'Team Tuhmb Image', 'prysm' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);
        $repeater->add_control(
            'team_position', [
                'label'       => esc_html__( 'Position', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        
        $this->add_control(
            'teames',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->add_control(
			'team_single',
			[
				'label' => __( 'Link Button ON/OFF', 'prysm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'prysm' ),
				'label_off' => __( 'Hide', 'prysm' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $this->end_controls_section();

            $this->start_controls_section(
                'service_style_info',
                [
                    'label' => esc_html__( 'Service Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'team_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'team_box_color',
                [
                    'label'     => esc_html__( 'Team Box Background', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-team-column .pr5-tm-cl .pr5-tm-cl-content' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'team_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title__color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-team-column .pr5-tm-cl .pr5-tm-cl-content .pr5-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-team-column .pr5-tm-cl .pr5-tm-cl-content .pr5-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'tx_text_color',
                [
                    'label'     => esc_html__( 'Position Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-team-column .pr5-tm-cl .pr5-tm-cl-content .pr5-designation span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'postion_txt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr5-team-column .pr5-tm-cl .pr5-tm-cl-content .pr5-designation span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__link_btn_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Link Button', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'link_color',
                [
                    'label'     => esc_html__( 'Link Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-team-column .pr5-readmore-btn a' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_control(
                'link_bg_color',
                [
                    'label'     => esc_html__( 'Link BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr5-team-column .pr5-readmore-btn a' => 'background: {{VALUE}} ',
                    ],
                ]
            );

           
            $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $teames        = $settings['teames'];
            $team_single        = $settings['team_single'];

        ?>
        <div class="pr5-team-content">
            <div class="row">
                <?php $shape = 0; foreach($teames as $index => $box): $shape++;?>
                  <?php  if( $box['team_id'] ) : ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="pr5-team-column wow fadeInUp">
                            <div class="pr5-tm-cl">
                                <div class="pr5-img-wrapper">
                                    <img src="<?php echo esc_url($box['team_image']['url']);?>" alt="">
                                </div>
                                <div class="pr5-tm-cl-content">
                                    <div class="pr5-tm-img-wrapper">
                                        <img src="<?php echo esc_url($box['team_thumb']['url']);?>" alt="">
                                    </div>
                                    <div class="pr5-headline">
                                        <a href="<?php echo get_the_permalink($box['team_id']);?>"><h4><?php echo get_the_title($box['team_id']);?></h4></a>
                                    </div>
                                    <div class="pr5-designation">
                                        <span><?php echo esc_html($box['team_position']);?></span>
                                    </div>
                                </div>
                            </div>
                            <?php if('yes' == $team_single):?>
                            <div class="pr5-readmore-btn">
                                <a href="<?php echo get_the_permalink($box['team_id']);?>"><i class="fas fa-link"></i></a>
                            </div>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endif; endforeach;?>
            </div>
        </div>
		<!-- Get In Touch End -->

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
