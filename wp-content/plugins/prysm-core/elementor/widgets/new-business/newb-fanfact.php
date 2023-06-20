<?php

    class newb_con_fanfact extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_con_fanfact';
        }

        public function get_title() {
            return __( 'New Business Fanfact', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'fanfact_contetn',
                [
                    'label' => __( 'Fanfact Content', 'prysm' ),
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
                'pattern2',
                [
                    'label' => esc_html__( 'Pattern 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'pattern3',
                [
                    'label' => esc_html__( 'Pattern 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater = new \Elementor\Repeater();

        
            
            $repeater->add_control(
                'fnf_icon_link',
                [
                    'label' => esc_html__( 'Fanfact Icon Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'number', [
                    'label'       => esc_html__( 'Number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'symbole', [
                    'label'       => esc_html__( 'Symbole', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'fanfacts',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'fnf_style',
                [
                    'label' => esc_html__( 'Fanfact Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'counter_no_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'no__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter .column .inner .count-outer',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'counter_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .fact-counter .column .inner .counter-title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '20',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $pattern  = $settings['pattern']['url'];
            $pattern2  = $settings['pattern2']['url'];
            $pattern3  = $settings['pattern3']['url'];
            $fanfacts  = $settings['fanfacts'];

        ?>

        <!-- Counter Section -->
		<section class="counter-section">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern);?>)"></div>
			<div class="auto-container">
				<div class="inner-container">
					<div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2);?>)"></div>
					<div class="pattern-layer-three" style="background-image: url(<?php echo esc_url($pattern3);?>)"></div>
					<!-- Fact Counter -->
					<div class="fact-counter">
						<div class="row clearfix">
							<?php foreach($fanfacts as $item):?>
							<!-- Column -->
							<div class="column counter-column col-lg-3 col-md-6 col-sm-12">
								<div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
									<div class="content">
										<div class="icon">
                                        <lord-icon
                                            src="<?php echo esc_url($item['fnf_icon_link']);?>"
                                            trigger="loop"
                                            colors="primary:#ffffff,secondary:#ffffff"
                                            style="width:125px;height:125px">
                                        </lord-icon>
                                        </div>
										<div class="count-outer count-box">
											<span class="count-text counter"><?php echo esc_attr($item['number']);?></span><?php echo esc_attr($item['symbole']);?>
										</div>
										<div class="counter-title"><?php echo esc_html($item['title']);?></div>
									</div>
								</div>
							</div>
							<?php endforeach;?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Counter Section -->
      <?php

              }

      }
