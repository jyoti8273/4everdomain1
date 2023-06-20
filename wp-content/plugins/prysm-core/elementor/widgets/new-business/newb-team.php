<?php

    class newb_team_member extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_team_member';
        }

        public function get_title() {
            return __( 'New Business Team', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-lock-user';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'team_member',
                [
                    'label' => __( 'Team Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'pattern',
                [
                    'label' => esc_html__( 'Pattern 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );           
            $this->add_control(
                's_heading1',
                [
                    'label' => esc_html__( 'Heading 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                's_heading2',
                [
                    'label' => esc_html__( 'Heading 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                's_heading3',
                [
                    'label' => esc_html__( 'Heading 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'description',
                [
                    'label' => esc_html__( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );

            $repeater = new \Elementor\Repeater(); 
            $repeater->add_control(
                'team_image',
                [
                    'label' => esc_html__( 'Team Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'member_name',
                [
                    'label' => esc_html__( 'Member Name', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'desiegnation',
                [
                    'label' => esc_html__( 'Designation', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'team_bio', [
                    'label'       => esc_html__( 'Team Bio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'link_label', [
                    'label'       => esc_html__( 'Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'link_url', [
                    'label'       => esc_html__( 'LInk', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'teammembers',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->add_control(
                'all_btn',
                [
                    'label' => esc_html__( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'btn_link',
                [
                    'label' => esc_html__( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'team_style',
                [
                    'label' => esc_html__( 'Team Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'team_title_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Team Title Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-two .inner-box h4',
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
                'team_deg_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Team Designation Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_deg_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-two .inner-box .designation',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'team_text_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Team Text Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_txt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-two .inner-box .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'team_btn_stly',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Team Btn Style ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'tm_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .news-block-two .inner-box .read-more',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings    = $this->get_settings_for_display();
            $s_heading1  = $settings['s_heading1'];
            $s_heading2  = $settings['s_heading2'];
            $s_heading3  = $settings['s_heading3'];
            $description = $settings['description'];
            $pattern     = $settings['pattern']['url'];
            $teammembers = $settings['teammembers'];
            $all_btn     = $settings['all_btn'];
            $btn_link     = $settings['btn_link'];

        ?>
        <!-- News Section -->
        <section class="news-section">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern);?>)"></div>
			<div class="auto-container">
				<div class="sec-title-two centered">
					<h3><?php echo esc_html($s_heading1);?> <span><?php echo esc_html($s_heading2);?></span> <?php echo __($s_heading3);?></h3>
					<div class="text"><?php echo esc_html($description);?></div>
				</div>
				<div class="row clearfix">
					<?php foreach($teammembers as $team):?>
					<!-- News Block Two -->
					<div class="news-block-two col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box wow fadeInLeft" data-wow-delay="300ms" data-wow-duration="1500ms">
							<div class="image">
								<a href="<?php echo esc_url($team['link_url']['url']);?>"><img src="<?php echo esc_url($team['team_image']['url']);?>" alt="" /></a>
							</div>
							<div class="upper-box">
								<h4><a href="<?php echo esc_url($team['link_url']['url']);?>"><?php echo esc_html($team['member_name']);?></a></h4>
								<div class="designation"><?php echo esc_html($team['desiegnation']);?></div>
								<a href="<?php echo esc_url($team['link_url']['url']);?>" class="plus-icon fa fa-plus"></a>
							</div>
							<div class="text"><?php echo esc_html($team['team_bio']);?></div>
							<a href="<?php echo esc_url($team['link_url']['url']);?>" class="theme-btn read-more"><?php echo esc_html($team['link_label']);?></a>
						</div>
					</div>
					<?php endforeach;?>					
				</div>
				
				<div class="btn-box text-center">
					<a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-three"><span class="txt"><?php echo esc_html($all_btn);?> <i class="flaticonv10-right-arrow"></i></span></a>
				</div>
				
			</div>
		</section>
		<!-- End News Section -->
      <?php

              }

      }
