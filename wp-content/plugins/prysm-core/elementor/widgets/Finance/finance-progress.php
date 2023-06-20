<?php

    class finance_skill_bar extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_skill_bar';
        }

        public function get_title() {
            return __( 'Finance Skill Bar', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-skill-bar';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'portfolio_content',
            [
                'label' => __( 'portfolio Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'section_bg',
            [
                'label' => __( 'Image', 'prysm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title', [
                'label'       => esc_html__( 'Progress Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'number', [
                'label'       => esc_html__( 'Number', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'skill_bars',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->end_controls_section();

            $this->start_controls_section(
                'portfolio_style_info',
                [
                    'label' => esc_html__( 'portfolio Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'portfolio_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            $this->add_control(
                'bar_bg_color',
                [
                    'label'     => esc_html__( 'Bar BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'default' => '#001790',
                    'selectors' => [
                        '{{WRAPPER}} {{WRAPPER}} {{CURRENT_ITEM}}.pr6-skills-list .progress-wrapper .progress' => 'background: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_control(
                'srvh_title',
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
                        '{{WRAPPER}} .pr6-skills-bar .pr6-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-skills-bar .pr6-headline h4',
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

            $settings          = $this->get_settings_for_display();
            $section_bg        = $settings['section_bg']['url'];
            $skill_bars        = $settings['skill_bars'];

        ?>
        
        <section class="pr6-skills-section">
			<div class="container">
				<div class="pr6-skills-bottom" data-background="<?php echo esc_url($section_bg);?>">
					<div class="row">
                        <?php foreach($skill_bars as $bar):?>
						<div class="col-lg-6">
							<div class="pr6-skills-list elementor-repeater-item-<?php echo esc_attr($bar['_id']);?>">
								<div class="pr6-skills-bar wow fadeInUp" data-wow-delay="0.2s">
									<div class="pr6-headline">
										<h4><?php echo esc_html($bar['title']);?></h4>
									</div>
									<div class="progress-bar">
										<div class="progress-wrapper">
											<div style="width:<?php echo esc_attr($bar['number']);?>%" class="progress" data-percent="<?php echo esc_attr($bar['number']);?>" data-color="#001790">
												<span><?php echo esc_attr($bar['number']);?>%</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>						
                        <?php endforeach;?>
					</div>
				</div>
			</div>
		</section>

      <?php

              }



      }
