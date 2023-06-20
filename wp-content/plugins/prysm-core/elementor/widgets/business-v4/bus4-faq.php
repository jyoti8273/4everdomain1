<?php

    class bus4_faq_widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_faq_widget';
        }

        public function get_title() {
            return __( 'Business V4 FAQ', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'about_section',
                [
                    'label' => __( 'About Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'count', [
                    'label'       => esc_html__( 'Count', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            ); 
            $this->add_control(
                'subtitle', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 

            $this->add_control(
                'cricle_img', [
                    'label'       => esc_html__( 'Pattern', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'faq_img_1', [
                    'label'       => esc_html__( 'FAQ Image 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'faq_img_2', [
                    'label'       => esc_html__( 'FAQ Image 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'faq_img_3', [
                    'label'       => esc_html__( 'FAQ Image 3', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            
            $this->add_control(
                'phone_img', [
                    'label'       => esc_html__( 'phone Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'phone_title', [
                    'label'       => esc_html__( 'phone Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'phone_txt', [
                    'label'       => esc_html__( 'phone Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'is_active',
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
                'about_style',
                [
                    'label' => __( 'About Style Section', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                '_sub_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eleven .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eleven .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
            $this->add_control(
                'main_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Main Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sec_main_title_colo',
                [
                    'label'     => esc_html__( 'Main Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eleven h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eleven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'faq_accor_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'FAq Accordion Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'accordion_title',
                [
                    'label'     => esc_html__( 'Accordion Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-box-three .block .acc-btn' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_control(
                'accordion_active_title',
                [
                    'label'     => esc_html__( 'Accordion Active Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-box-three .block .acc-btn.active' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'faq_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .accordion-box-three .block .acc-btn',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'accordion_txt',
                [
                    'label'     => esc_html__( 'Accordion Txt Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-box-three .block .content .text' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'faq_txt__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .accordion-box-three .block .content .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
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
                'accordion_active_bg',
                [
                    'label'     => esc_html__( 'Accordion Active BG Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .accordion-box-three .block.active-block' => 'background-color: {{VALUE}} ',
                    ],
                ]
            );
            $this->end_controls_section();
        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $cricle_img     = $settings['cricle_img']['url'];
            $faq_img_1      = $settings['faq_img_1']['url'];
            $faq_img_2      = $settings['faq_img_2']['url'];
            $faq_img_3      = $settings['faq_img_3']['url'];

            $count          = $settings['count'];
            $subtitle       = $settings['subtitle'];
            $maintitle      = $settings['maintitle'];
            
            $phone_title          = $settings['phone_title'];
            $phone_txt          = $settings['phone_txt'];
            $phone_img          = $settings['phone_img']['url'];
            $faqitems          = $settings['faqitems'];

        ?>  
        <!-- Faq Section Three -->
        <section class="faq-section-three">
            <div class="auto-container">
                <div class="sec-title-eleven centered">
                    <div class="number"><?php echo esc_attr($count);?></div>
                    <div class="title"><?php echo esc_html($subtitle);?></div>
                    <h2><?php echo __($maintitle);?></h2>
                </div>
                <div class="row clearfix">
                
                    <!-- Image Column -->
                    <div class="image-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            <div class="circle-layer" style="background-image:url(<?php echo esc_url($cricle_img);?>)"></div>
                            <div class="image">
                                <img src="<?php echo esc_url($faq_img_1);?>" alt="" />
                            </div>
                            <div class="image">
                                <img src="<?php echo esc_url($faq_img_2);?>" alt="" />
                            </div>
                            <div class="image-two">
                                <img src="<?php echo esc_url($faq_img_3);?>" alt="" />
                            </div>
                            <div class="mail-box">
                                <div class="box-inner">
                                    <span class="icon"><img src="<?php echo esc_url($phone_img);?>" alt="" /></span>
                                    <?php echo esc_html($phone_title);?><br>
                                    <a href="tel:<?php echo esc_url($phone_txt);?>"><?php echo esc_html($phone_txt);?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Accordion Column -->
                    <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                        <div class="inner-column">
                            
                            <!-- Accordion Box Three -->
                            <ul class="accordion-box-three">
                                <?php foreach($faqitems as $item):?>
                                <!-- Block -->
                                <li class="accordion block <?php if('yes' == $item['is_active']){echo esc_attr('active-block');}?>">
                                    <div class="acc-btn <?php if('yes' == $item['is_active']){echo esc_attr('active');}?> "><?php echo esc_html($item['title']);?> <div class="icon fal fa-arrow-to-bottom"></div></div>
                                    <div class="acc-content <?php if('yes' == $item['is_active']){echo esc_attr('current');}?> ">
                                        <div class="content">
                                            <div class="text"><?php echo __($item['description']);?></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>                            
                            </ul>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End Faq Section Three -->
      <?php

              }

      }
