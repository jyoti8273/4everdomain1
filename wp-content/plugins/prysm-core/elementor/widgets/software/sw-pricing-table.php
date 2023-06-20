<?php

    class sw_pricing_table extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_pricing_table';
        }

        public function get_title() {
            return __( 'Software Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-price-table';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'pricing_content',
            [
                'label' => __( 'Pricing Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'shape1', [
                'label'       => esc_html__( 'Shape 1', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->add_control(
            'shape2', [
                'label'       => esc_html__( 'Shape 2', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $repeater = new \Elementor\Repeater();
        
        
        $repeater->add_control(
            'pricing_title', [
                'label'       => esc_html__( 'Pricing Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'pricie', [
                'label'       => esc_html__( 'Price', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'period', [
                'label'       => esc_html__( 'Period', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'price_icon', [
                'label'       => esc_html__( 'Icon', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
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
            'pricing_list', [
                'label'       => esc_html__( 'Price List', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::WYSIWYG,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
			'active',
			[
				'label' => __( 'Active', 'prysm' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'prysm' ),
				'label_off' => __( 'Hide', 'prysm' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        $repeater->add_control(
            'pricing_btn',
            [
                'label' => __( 'Button Text', 'prysm' ),
                'type' => \Elementor\Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'pricing_btn_link',
            [
                'label' => __( 'Button Link', 'prysm' ),
                'type' => \Elementor\Controls_Manager::URL,
                'placeholder' => __( 'https://your-link.com', 'prysm' ),
            ]
        );
        $repeater->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name'     => 'icon2_bg_color',
                'label'    => __( 'Background', 'prysm-extension' ),
                'types'    => ['classic', 'gradient'],
                'exclude'  => ['image'],
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-icon-wrapper i',
            ]
        );
        
        $this->add_control(
            'pricings',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ pricing_title }}}',
            ]
        );
       
        $this->end_controls_section();

            $this->start_controls_section(
                'pricing_style_info',
                [
                    'label' => esc_html__( 'Pricing Style Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'pricing_title',
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
                        '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-headline h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-headline h4',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__price_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Price Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'price_color',
                [
                    'label'     => esc_html__( 'Price Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__preod_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Period Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'period_color',
                [
                    'label'     => esc_html__( 'Period Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-headline h3 span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'period_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-headline h3 span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '__p_list_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'list_color',
                [
                    'label'     => esc_html__( 'List Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-pricing-features ul li' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-pricing-contents .pr3-pricing-column .pr3-pricing-features ul li',
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

            $settings             = $this->get_settings_for_display();
            $shape1               = $settings['shape1']['url'];
            $shape2               = $settings['shape2']['url'];
            $pricings             = $settings['pricings'];

        ?>
        <section class="pr3-pricing-section">
            <span class="pr3-object-1"><img src="<?php echo esc_url($shape1);?>" alt=""></span>
            <div class="container">
                <div class="pr3-pricing-contents">
                    <span class="pr3-object-2"><img src="<?php echo esc_url($shape2);?>" alt=""></span>
                    <div class="row">
                        <?php foreach($pricings as $item):?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="pr3-pricing-column wow fadeInUp elementor-repeater-item-<?php echo esc_attr($item['_id']);?>" data-wow-delay="0.2s">
                                <div class="pr3-headline">
                                    <h4><?php echo esc_html($item['pricing_title']);?></h4>
                                    <h3><?php echo esc_attr($item['pricie']);?>/<span><?php echo esc_html($item['period']);?></span></h3>
                                </div>
                                <div class="pr3-icon-wrapper">
                                    <i class="<?php echo esc_attr($item['price_icon']);?>"></i>
                                </div>
                                <div class="pr3-pricing-features">
                                    <?php echo __($item['pricing_list']);?>
                                </div>
                                <div class="pr3-pricing-btn <?php if('yes' == $item['active']){echo esc_attr('active');}?>">
                                    <a href="<?php echo esc_url($item['pricing_btn_link']['url']);?>"><?php echo esc_html($item['pricing_btn']);?></a>
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
