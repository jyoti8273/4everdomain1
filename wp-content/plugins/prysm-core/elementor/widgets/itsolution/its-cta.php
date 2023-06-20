<?php

    class its_cta_box extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_cta_box';
        }

        public function get_title() {
            return __( 'IT CTA', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-call-to-action';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta_info',
                [
                    'label' => __( 'CTA Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
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
                'button_link', [
                    'label'       => esc_html__( 'Button URL', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            $this->add_control(
                'cta_img', [
                    'label'       => esc_html__( 'CTA Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'cta_glob_img', [
                    'label'       => esc_html__( 'CTA Glob Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'cta_style',
                [
                    'label' => esc_html__( 'CTA Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'cta_image_postion',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Image Position', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'cta_img_pos',
                [
                    'label' => __( 'Image Position', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => -1000,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => -100,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr20-git-right .pr20-git-man' => 'top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'cta_sub_h_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-git-left span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-git-left span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_cta__title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'CTA Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cta_title_color',
                [
                    'label'     => esc_html__( 'CTA Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-git-left .pr20-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-git-left .pr20-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'button__content',
                [
                    'label' => __( 'Button Style', 'prysm' ),
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
                        '{{WRAPPER}} .pr20-primary-btn a' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a:hover, .pr20-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $subtitle             = $settings['subtitle'];
            $title                = $settings['title'];
            $button_text          = $settings['button_text'];
            $button_link          = $settings['button_link'];
            $cta_img              = $settings['cta_img']['url'];
            $cta_glob_img         = $settings['cta_glob_img']['url'];

        ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="pr20-git-left wow fadeInUp">
                        <span><?php echo esc_html($subtitle);?></span>
                        <div class="pr20-headline">
                            <h3><?php echo esc_html($title);?></h3>
                        </div>
                        <div class="pr20-primary-btn">
                            <a href="<?php echo esc_html($button_link['url']);?>"><?php echo esc_html($button_text);?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="pr20-git-right wow fadeInRight">
                        <img src="<?php echo esc_url($cta_glob_img);?>" alt="">
                        <span class="pr20-git-man">
                            <img src="<?php echo esc_url($cta_img);?>" alt="">
                        </span>
                    </div>
                </div>
            </div>
        </div>
      <?php

              }

      }
