<?php

    class newb_pricing_table extends \Elementor\Widget_Base {

        public function get_name() {
            return 'newb_pricing_table';
        }

        public function get_title() {
            return __( 'New Business Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-price-table';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'pricing_table',
                [
                    'label' => __( 'Pricing Content', 'prysm' ),
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
                'show_active',
                [
                    'label' => esc_html__( 'Show Active', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'YES', 'prysm' ),
                    'label_off' => esc_html__( 'NO', 'prysm' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );
            $repeater->add_control(
                'populer_text',
                [
                    'label' => esc_html__( 'Populer Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'title',
                [
                    'label' => esc_html__( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'package_type',
                [
                    'label' => esc_html__( 'Package Type', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'package_list', [
                    'label'       => esc_html__( 'Package List', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::WYSIWYG,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'price', [
                    'label'       => esc_html__( 'Price', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'preiod', [
                    'label'       => esc_html__( 'Preiod', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'btn_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'pricingstable',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'pricing_style',
                [
                    'label' => esc_html__( 'Pricing Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'pricing_heading',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-two h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '36',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'pricing_-content',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Progress Content Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_cont__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-two .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'pricing_title_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Title ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_hfd__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block .inner-box h4',
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
                'pricing_list_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing List Title ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'prog_list__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block .inner-box .plan-list li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'pricing_price_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Price ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block .inner-box .price-box .price',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '38',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'pricing_month_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Month Price ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price__mont_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block .inner-box .price-box .price span',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
                'pricing_btn_sty',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Button Price ', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price__btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .price-block .inner-box .price-box .purchase-btn',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $s_heading1  = $settings['s_heading1'];
            $s_heading2  = $settings['s_heading2'];
            $s_heading3  = $settings['s_heading3'];
            $description  = $settings['description'];
            $pattern  = $settings['pattern']['url'];
            $pattern2  = $settings['pattern2']['url'];
            $pricingstable  = $settings['pricingstable'];

        ?>
<!-- Pricing Section -->
<section class="pricing-section">
			<div class="pattern-layer" style="background-image: url(<?php echo esc_url($pattern);?>)"></div>
			<div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2);?>)"></div>
			<div class="auto-container">
				<div class="sec-title-two centered">
					<h3><?php echo esc_html($s_heading1);?> <span><?php echo esc_html($s_heading2);?></span> <?php echo __($s_heading3);?></h3>
					<div class="text"><?php echo __($description);?></div>
				</div>
				<div class="clearfix">
				
					<?php foreach($pricingstable as $pricing):?>
					<!-- Price Block -->
					<div class="price-block <?php if('yes' == $pricing['show_active']){echo esc_attr('active');}?>  col-lg-4 col-md-6 col-sm-12">
						<div class="inner-box">
                            <?php if('yes' == $pricing['show_active']):?>
                            <div class="title"><?php echo esc_html($pricing['populer_text']);?></div>
                            <?php endif;?>
							<h4><span><?php echo esc_html($pricing['title']);?></span><br> <?php echo esc_html($pricing['package_type']);?></h4>
                            <div class="plan-list">
                            <?php echo __($pricing['package_list']);?>
                            </div>							
							<div class="price-box">
								<div class="price"><?php echo esc_html($pricing['price']);?> <span><?php echo esc_html($pricing['preiod']);?></span></div>
								<a href="<?php echo esc_url($pricing['btn_link']['url']);?>" class="theme-btn purchase-btn"><?php echo esc_html($pricing['btn_label']);?></a>
							</div>
						</div>
					</div>
					<?php endforeach;?>
					
				</div>
			</div>
		</section>
		<!-- End Pricing Section -->
      <?php

              }

      }
