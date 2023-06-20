<?php

    class law_faq extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_faq';
        }

        public function get_title() {
            return __( 'Law FAQ', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-counter';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'faq_contetn',
                [
                    'label' => __( 'Faq Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'bg_pattern',
                [
                    'label' => esc_html__( 'Fanfact Background Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'mainheading',
                [
                    'label' => esc_html__( 'Main Heading', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'faq_img',
                [
                    'label' => esc_html__( 'FAQ Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'active',
                [
                    'label' => esc_html__( 'Active', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => esc_html__( 'YES', 'prysm' ),
                    'label_off' => esc_html__( 'NO', 'prysm' ),
                    'return_value' => 'yes',
                    'default' => 'no',
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
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'faqitems',
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
                'section_main_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'label'     => esc_html__( 'Section TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eight h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            
            
            $this->add_control(
                'faq_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'FAQ Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'faq_title_color',
                [
                    'label'     => esc_html__( 'FAQ Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-box-two.style-two .block .acc-btn' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'faq_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .accordion-box-two.style-two .block .acc-btn',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '17',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'faq_content_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Content Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'faq_text_color',
                [
                    'label'     => esc_html__( 'FAQ Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-box-two .block .content .text p' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'faq_desc_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .accordion-box-two .block .content .text p',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
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
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $bg_pattern  = $settings['bg_pattern']['url'];
            $faq_img  = $settings['faq_img']['url'];
            $faqitems  = $settings['faqitems'];
            $mainheading  = $settings['mainheading'];

        ?>
        <!-- Faq Section Two -->
        <section class="faq-section-two">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="icon-layer" style="background-image: url(<?php echo esc_url($bg_pattern);?>)"></div>
                    <div class="row clearfix">
                    
                        <!-- Image Column -->
                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="image">
                                    <img src="<?php echo esc_url($faq_img);?>" alt="" />
                                </div>
                            </div>
                        </div>
                        
                        <!-- Accordion Column -->
                        <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title-eight">
                                    <h2><?php echo __($mainheading);?></h2>
                                </div>
                                
                                <!-- Accordian Box Two -->
                                <ul class="accordion-box-two style-two">
                                    <?php foreach($faqitems as $item):?>           
                                    <!--Block-->
                                    <li class="accordion block">
                                        <div class="acc-btn <?php if('yes' == $item['active']){echo esc_attr('active');}?>"><div class="icon-outer"><span class="icon icon-plus fa fa-plus"></span> <span class="icon icon-minus fa fa-minus"></span></div><?php echo esc_html($item['title']);?></div>
                                        <div class="acc-content <?php if('yes' == $item['active']){echo esc_attr('current');}?>">
                                            <div class="content">
                                                <div class="text">
                                                    <p><?php echo esc_html($item['description']);?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End Faq Section Two -->
      <?php

              }

      }
