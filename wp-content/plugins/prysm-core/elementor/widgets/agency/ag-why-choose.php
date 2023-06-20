<?php

    class ag_about extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag_about';
        }

        public function get_title() {
            return __( 'Agency Why Choose', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'about__content',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'text', [
                    'label'       => esc_html__( 'Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater->add_control(
                'link',
                [
                    'label' => __( 'Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'icon_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}',
                ]
            );  
            $repeater->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}} i' => 'color: {{VALUE}} ',
                    ],
                ]
            );  
            $this->add_control(
                'choose_box',
                [
                    'label'       => __( 'Add Item', 'prysm-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'about_right_content',
                [
                    'label' => __( 'About Right Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_heading', [
                    'label'       => esc_html__( 'Sub Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'heading', [
                    'label'       => esc_html__( 'Heading', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'infos', [
                    'label'       => esc_html__( 'Infos', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'list_title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'lists_item',
                [
                    'label'       => __( 'Add Item', 'prysm-extension' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ list_title }}}',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'icon_img',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic'],
                    'exclude'  => ['video'],
                    'selector' => '{{WRAPPER}} .pr-an-why-choose-list li:after',
                ]
            );
            $this->add_control(
                'button_text', [
                    'label'       => esc_html__( 'Button Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'button_link',
                [
                    'label' => __( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'choose_box_style',
                [
                    'label' => esc_html__( 'Choos Item Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'item_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Item Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'itm_title_color',
                [
                    'label'     => esc_html__( 'Item Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-why-choose-feature-item .pr-an-why-choose-ft-text h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'itm_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-why-choose-feature-item .pr-an-why-choose-ft-text h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'itm_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'itm_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-an-why-choose-ft-text p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'itm_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-an-why-choose-ft-text p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'about_style',
                [
                    'label' => esc_html__( 'About Style', 'prysm' ),
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
                'list_item_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Item Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'list_item_clr',
                [
                    'label'     => esc_html__( 'List Item Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .ul-li-block ul li' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'lst_item_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .ul-li-block ul li',
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
            $choose_box            = $settings['choose_box'];
            $lists_item            = $settings['lists_item'];
            $infos                 = $settings['infos'];
            $heading                = $settings['heading'];
            $sub_heading            = $settings['sub_heading'];
            $button_text            = $settings['button_text'];
            $button_link            = $settings['button_link'];

        ?>  
        
        <section id="pr-an-why-choose" class="pr-an-why-choose-section">
		<div class="container">
			<div class="pr-an-why-choose-content">
				<div class="row">
					<div class="col-lg-6">
						<div class="pr-an-why-choose-feature">
							<div class="row">
                                <?php foreach($choose_box as $box):?>
								<div class="col-md-6 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
									<div class="pr-an-why-choose-feature-item">
										<div class="pr-an-why-choose-ft-icon d-flex justify-content-center align-items-center elementor-repeater-item-<?php echo esc_attr($box['_id']);?>">
                                            <?php \Elementor\Icons_Manager::render_icon( $box['icon'], [ 'aria-hidden' => 'true' ] ); ?>
										</div>
										<div class="pr-an-why-choose-ft-text headline pera-content">
											<h3><a href="<?php echo esc_url($box['link']['url']);?>"><?php echo esc_html($box['title']);?></a></h3>
											<p><?php echo __($box['text']);?>  </p>
										</div>
									</div>
								</div>
								<?php endforeach;?>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="pr-an-why-choose-text-wrapper">
							<div class="pr-an-section-title headline pera-content wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
								<span><?php echo esc_html($sub_heading);?></span>
								<h2><?php echo esc_html($heading);?></h2>
								<p><?php echo __($infos);?></p>
							</div>
							<div class="pr-an-why-choose-list ul-li-block wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
								<ul>
                                    <?php foreach($lists_item as $item):?>
									<li><?php echo __($item['list_title']);?></li>
                                    <?php endforeach;?>
								</ul>
							</div>
							<div class="pr-an-btn wow fadeInUp" data-wow-delay="300ms" data-wow-duration="1500ms">
								<a href="<?php echo esc_html($button_link['url']);?>"><?php echo esc_html($button_text);?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
      <?php

              }

      }
