<?php

    class sw_about_content extends \Elementor\Widget_Base {

        public function get_name() {
            return 'sw_about_content';
        }

        public function get_title() {
            return __( 'Software About', 'prysm' );
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
                'ab_shape', [
                    'label'       => esc_html__( 'Shape 1', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'ab_shape_2', [
                    'label'       => esc_html__( 'Shape 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'about_img', [
                    'label'       => esc_html__( 'About Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );            
            
            $this->add_control(
                'title',
                [
                    'label' => __( 'About Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );

            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'list_title',
                [
                    'label' => __( 'List Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'list_text',
                [
                    'label' => __( 'List Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                ]
            );
            
            $repeater->add_control(
                'icon_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $repeater->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'icon_bg_color',
                    'label'    => __( 'Background', 'prysomn' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} {{CURRENT_ITEM}} .pr3-icon-wrapper i',
                ]
            );    
            $this->add_control(
                'lists_item',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ list_title }}}',
                ]
            );
            $this->add_control(
                'btn_one',
                [
                    'label' => __( 'Button One', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'btn_one_url',
                [
                    'label' => __( 'Button One Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
                ]
            );
            $this->add_control(
                'btn_two',
                [
                    'label' => __( 'Button Two', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'btn_two_link',
                [
                    'label' => __( 'Button Two Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'prysm' ),
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
                'sub_style_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sb_title_clr',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-title-area span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'title_style',
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
                        '{{WRAPPER}} .pr3-title-area h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-title-area .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-title-area .pr3-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            $this->add_control(
                'list_title_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Item Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'list_title_color',
                [
                    'label'     => esc_html__( 'List Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-list-content .pr3-headline h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'list_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-list-content .pr3-headline h6',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'list_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'List Item Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'list_text_color',
                [
                    'label'     => esc_html__( 'List Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-list .pr3-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'list_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr3-about-right .pr3-about-list .pr3-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
                   
            $this->end_controls_section();

            $this->start_controls_section(
                'btn_one_style',
                [
                    'label' => esc_html__( 'Button One Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->start_controls_tabs( '_banner_button_1' );
            $this->start_controls_tab(
                '_prysm_btn__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-primary-btn a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a::after',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-primary-btn a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a:hover, .pr3-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr3-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();
            $this->start_controls_section(
                'btn2_one_style',
                [
                    'label' => esc_html__( 'Button Two Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->start_controls_tabs( '_banner_button_2' );
            $this->start_controls_tab(
                '_prysm_btn2__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn2__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn2_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn::after',
                ]
            );
            $this->add_responsive_control(
                'btn2_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn::after' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn2_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn',
                ]
            );
            $this->add_responsive_control(
                'btn2_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn2_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn2__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn2_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn:hover, .pr3-about-right .pr3-about-btns .pr3-contact-btn::before',
                ]
            );
            $this->add_responsive_control(
                'btn2_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn2_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn:hover',
                ]
            );
            $this->add_responsive_control(
                'btn2_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr3-about-right .pr3-about-btns .pr3-contact-btn:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $ab_shape       = $settings['ab_shape']['url'];
            $ab_shape_2     = $settings['ab_shape_2']['url'];
            $about_img      = $settings['about_img']['url'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $description    = $settings['description'];
            $lists_item     = $settings['lists_item'];
            $btn_one        = $settings['btn_one'];
            $btn_two        = $settings['btn_one'];
            $btn_two_link   = $settings['btn_two_link'];
            $btn_one_url    = $settings['btn_one_url'];

        ?>

        <!-- About Us Section -->
        <section class="pr3-about-section">
            <span class="pr3-left-shape"><img src="<?php echo esc_url($ab_shape);?>" alt=""></span>
            <span class="pr3-right-shape"><img src="<?php echo esc_url($ab_shape_2);?>" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pr3-about-left wow fadeInLeft">
                            <img src="<?php echo esc_url($about_img);?>" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pr3-about-right">
                            <div class="pr3-title-area wow fadeInDown">
                                <span><?php echo esc_html($sub_title);?></span>
                                <div class="pr3-headline">
                                    <h3><?php echo __($title);?></h3>
                                </div>
                                <div class="pr3-pera-txt">
                                    <p><?php echo __($description);?></p>
                                </div>
                            </div>
                            <div class="pr3-about-bottom">
                                <ul>
                                    <?php foreach($lists_item as $item):?>
                                    <li class="pr3-about-list wow fadeInUp elementor-repeater-item-<?php echo esc_attr($item['_id']);?>" data-wow-delay="0.2s">
                                        <div class="pr3-icon-wrapper">
                                            <i class="<?php echo esc_attr($item['icon']);?>"></i>
		                                </div>
                                        <div class="pr3-list-content">
                                            <div class="pr3-headline">
                                                <h6><?php echo esc_html($item['list_title']);?></h6>
                                            </div>
                                            <div class="pr3-pera-txt">
                                                <p><?php echo __($item['list_text']);?></p>
                                            </div>
                                        </div>
                                    </li>
                                    <?php endforeach;?>
                                </ul>
                            </div>
                            <div class="pr3-about-btns pr3-primary-btn wow fadeInUp" data-wow-delay="0.4s">
                                <a href="<?php echo esc_url($btn_one_url['url']);?>"><?php echo esc_html($btn_one);?></a>
                                <a href="<?php echo esc_url($btn_two_link['url']);?>" class="pr3-contact-btn"><?php echo esc_html($btn_two);?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Us Section -->
      <?php

              }

      }
