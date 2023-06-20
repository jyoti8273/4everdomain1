<?php

    class con_faq_and_brand_logo extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_faq_and_brand_logo';
        }

        public function get_title() {
            return __( 'Consulting FAQ & Logo', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-accordion';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'faq_content',
            [
                'label' => __( 'FAQ Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'faq_title', [
                'label'       => esc_html__( 'Faq Heading Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'title', [
                'label'       => esc_html__( 'Faq Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'description', [
                'label'       => esc_html__( 'Faq Description', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'faq_items',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->add_control(
            'logo_title', [
                'label'       => esc_html__( 'Logo Heading Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
			'logos_item',
			[
				'label' => __( 'Add Brand Logo Images', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::GALLERY,
				'default' => [],
			]
		);
        $this->end_controls_section();

        $this->start_controls_section(
            'faq_style',
            [
                'label' => esc_html__( 'FAQ Style', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'faq_setitle_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Section Titlle Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'se_title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .multi-section .faq-content h2, .multi-section .client-section h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sec_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .multi-section .faq-content h2, .multi-section .client-section h3',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '500',
					],
					'font_size'   => [
						'default' => [
							'size' => '30',
						],
					],
				],
            ]
        );
        $this->add_control(
            'faq_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Faq Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'faq_title_clr',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .multi-section .faq-content .accordion-content .ui-accordion-header' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'faq_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .multi-section .faq-content .accordion-content .ui-accordion-header',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '500',
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
            'faq_desc-style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Faq Description Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'faq_desc_clr',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .multi-section .faq-content .accordion-content .ui-accordion-content p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .multi-section .faq-content .accordion-content .ui-accordion-content p',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
                    ],
					'font_weight' => [
						'default' => '300',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $faq_title        = $settings['faq_title'];
            $faq_items        = $settings['faq_items'];
            $logos_item       = $settings['logos_item'];
            $logo_title       = $settings['logo_title'];

        ?>
        <section class="multi-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="faq-content">
                            <h2><?php echo esc_html($faq_title);?></h2>

                            <div id="accordion" class="accordion-content">
                                <?php foreach($faq_items as $item):?>
                                <h3><?php echo esc_html($item['title']);?></h3>
                                <div>
                                    <p><?php echo __($item['description']);?></p>
                                </div>
                                <?php endforeach;?>
                            </div>
                        </div> <!-- research-content -->
                    </div>

                    <div class="col-md-6">
                        <div class="client-section">
                            <h3><?php echo esc_html($logo_title);?></h3>

                            <ul class="logo">
                                <?php $ct = 0; foreach($logos_item as $item): $ct++;?>
                                <?php if(1 == $ct):?>
                                <li class="wow fadeIn"><img src="<?php echo esc_url($item['url'])?>" alt=""></li>
                                <?php else:?>
                                <li class="wow fadeIn" data-wow-delay="0.<?php echo esc_attr($ct); ?>s"><img src="<?php echo esc_url($item['url'])?>" alt=""></li>
                                <?php endif;?>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- multi-section -->
      <?php

              }

      }
