<?php

    class con_about_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_about_item';
        }

        public function get_title() {
            return __( 'Consulting About', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

        $this->start_controls_section(
            'about_content',
            [
                'label' => __( 'About Content', 'prysm' ),
                'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title', [
                'label'       => esc_html__( 'Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'top_text', [
                'label'       => esc_html__( 'Top Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
            'list_img',
            [
                'label' => esc_html__( 'List Icon Image', 'prysm' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        
        $repeater->add_control(
            'list_title', [
                'label'       => esc_html__( 'List Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'list_item',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->add_control(
            'bottom_text', [
                'label'       => esc_html__( 'Bottom Text', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'form_title', [
                'label'       => esc_html__( 'Form Title', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'form_id', [
                'label'       => esc_html__( 'Form ID', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
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
            'about_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .about-Company-Section .content-wrapper h3' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .about-Company-Section .content-wrapper h3',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '500',
					],
					'font_size'   => [
						'default' => [
							'size' => '26',
						],
					],
				],
            ]
        );
        $this->add_control(
            'about_info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'About Info Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'about_info_color',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .homePageOne .about-Company-Section .content-wrapper p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .homePageOne .about-Company-Section .content-wrapper p',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
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
            'list_title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'List Item Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'list_title',
            [
                'label'     => esc_html__( 'List Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .homePageOne .about-Company-Section .content-wrapper .content li .single-content' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'list_title__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .homePageOne .about-Company-Section .content-wrapper .content li .single-content',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '18',
						],
					],
				],
            ]
        );
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $title           = $settings['title'];
            $top_text        = $settings['top_text'];
            $list_item       = $settings['list_item'];
            $bottom_text     = $settings['bottom_text'];
            $form_title      = $settings['form_title'];
            $form_id         = $settings['form_id'];

        ?>
        <section class="homePageOne">
            <div class="about-Company-Section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="content-wrapper">
                                <h3><?php echo __($title);?></h3>

                                <p><?php echo __($top_text);?></p>

                                <ul class="content">
                                    <?php foreach($list_item as $item):?>
                                    <li>
                                        <img src="<?php echo esc_url($item['list_img']['url']); ?>" alt="<?php echo esc_attr($item['list_img']['alt']); ?>">

                                        <div class="single-content">
                                            <?php echo esc_html($item['list_title']);?>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>

                                <p><?php echo __($bottom_text);?></p>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="quote-section">
                                <h3><?php echo esc_html($form_title);?></h3>
                                <form class="contact-form">
                                    <?php echo do_shortcode( $form_id );?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!-- about-Company-Section -->
      <?php

            }


      }
