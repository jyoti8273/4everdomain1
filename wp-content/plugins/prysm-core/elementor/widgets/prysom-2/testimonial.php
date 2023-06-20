<?php

    class prysm2_work_testimonial extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm2_work_testimonial';
        }

        public function get_title() {
            return __( 'Prysm2 Testimonial', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial__content',
                [
                    'label' => __( 'testimonial Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'item_active',
                [
                    'label' => __( 'Active Item', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Show', 'your-plugin' ),
                    'label_off' => __( 'Hide', 'your-plugin' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            
            $repeater->add_control(
                'authore_img',
                [
                    'label' => __( 'Authore Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $repeater->add_control(
                'authore_sm_img',
                [
                    'label' => __( 'Authore Small Thumb', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $repeater->add_control(
                'feedback', [
                    'label'       => esc_html__( 'AUthore Feedback', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater->add_control(
                'auth_name', [
                    'label'       => esc_html__( 'Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'position', [
                    'label'       => esc_html__( 'Position', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            $this->add_control(
                'testimonials',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ auth_name }}}',
                ]
            );
            $this->add_control(
                'section_img',
                [
                    'label' => __( 'Map Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'section_ttl_style',
                [
                    'label' => esc_html__( 'testimonial Section Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'section_hd_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-headline h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sectitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-headline h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'section_sub_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Sub Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_sub_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-testimonial-section .pr2-headline span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sectitle_sub_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-testimonial-section .pr2-headline span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'section_cont_content',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_conte_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} section.pr2-testimonial-section .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sectitle_cont_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} section.pr2-testimonial-section .pr2-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'testimonial_box_style',
                [
                    'label' => esc_html__( 'testimonial Box Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'box_border',
                    'label' => __( 'Border', 'prysm' ),
                    'selector' => '{{WRAPPER}} #pr2-tst-slider .clients-info',
                ]
            );
            
            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Box Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} #pr2-tst-slider .clients-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'box_radius',
                [
                    'label' => __( 'Box Rpund', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} #pr2-tst-slider .clients-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'testimonial_box_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} #pr2-tst-slider .clients-info',
                ]
            );
    
            $this->end_controls_section();
            $this->start_controls_section(
                'testimonial_style',
                [
                    'label' => esc_html__( 'testimonial Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'testimonial_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'testimonial Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'testimonial_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-testimonial-section .pr2-headline h5' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-testimonial-section .pr2-headline h5',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_testimonial_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'testimonial Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} #pr2-tst-slider .clients-info .pr2-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} #pr2-tst-slider .clients-info .pr2-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_testimonial_button_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Position Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'btn_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr2-testimonial-section .pr2-headline span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
           
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr2-testimonial-section .pr2-headline span',
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
            $section_img        = $settings['section_img'];
            $testimonials        = $settings['testimonials'];

        ?>        
        <!-- Testimonial Section -->
        <section class="pr2-testimonial-section">
            <img src="<?php echo esc_url($section_img['url']);?>" class="pr2-map-bg" alt="">
            <div class="container">  
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="pr2-title-area text-center wow fadeInUp">
                            <div class="title-top pr2-headline">
                                <span class="pr2-subtitle">Customer Testimonial</span>
                                <h2>What's our clients <span>say</span></h2>
                            </div>
                            <div class="pr2-pera-txt">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            </div>
                        </div>
                    </div>
                </div>              
                <div id="pr2-tst-slider" class="carousel slide">
                    
                    <div class="carousel-inner">
                        <?php $itemID = 0; foreach($testimonials as $item): $itemID++;
                        
                         if($itemID == 1):   
                        ?>
                        <div class="carousel-item active">
                            <div class="pr2-tst-content">
                                <div class="clients-img">
                                    <div class="client_thumb">
                                        <div class="gr-overlay">
                                            <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="clients-info">
                                    <div class="pr2-pera-txt">
                                        <q><?php echo __($item['feedback']);?></q>
                                    </div>
                                    <div class="pr2-headline">
                                        <h5><?php echo esc_html($item['auth_name']);?></h5>
                                        <span><?php echo esc_html($item['position']);?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php else:?>
                            <div class="carousel-item">
                                <div class="pr2-tst-content">
                                    <div class="clients-img">
                                        <div class="client_thumb">
                                            <div class="gr-overlay">
                                                <img src="<?php echo esc_url($item['authore_img']['url']);?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clients-info">
                                        <div class="pr2-pera-txt">
                                            <q><?php echo __($item['feedback']);?></q>
                                        </div>
                                        <div class="pr2-headline">
                                            <h5><?php echo esc_html($item['auth_name']);?></h5>
                                            <span><?php echo esc_html($item['position']);?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; endforeach;?>
                    </div>
                    <div class="pr2-slider-arrows">
                        <a href="#pr2-tst-slider" class="pr2-arrows prev-arrow" data-slide="prev"><i class="fas fa-arrow-left"></i></a>
                        <a href="#pr2-tst-slider" class="pr2-arrows next-arrow" data-slide="next"><i class="fas fa-arrow-right"></i></a>
                    </div>
                    <ol class="carousel-indicators">
                        <?php $i = 0; foreach($testimonials as $item):
                            $i++;
                            $act_cls = '';
                            if('yes' == $item['item_active']){
                                $act_cls = 'active';
                            }       
                        ?>
                            <li data-target="#pr2-tst-slider" data-slide-to="<?php echo esc_attr($i);?>" class="<?php echo esc_attr($act_cls);?>"><img src="<?php echo esc_url($item['authore_sm_img']['url']);?>" ></li>
                        <?php endforeach;?>
                    </ol>
                </div>
                </div>
            </div>
        </section>

      <?php

              }

      }
