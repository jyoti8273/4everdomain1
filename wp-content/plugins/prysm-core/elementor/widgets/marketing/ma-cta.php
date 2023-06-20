<?php

    class ma_cta_content extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ma_cta_content';
        }

        public function get_title() {
            return __( 'Marketing CTA', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-post-content';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta_content',
                [
                    'label' => __( 'CTA Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'cta_shape_bg',
                [
                    'label' => __( 'CTA Section Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $this->add_control(
                'subtitle', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'btn_text', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'btn_url', [
                    'label'       => esc_html__( 'Button LInk', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            
            
            $this->end_controls_section();

            $this->start_controls_section(
                'about_left_style',
                [
                    'label' => esc_html__( 'About Left Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );

            $this->add_control(
                'cta_title_sub_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'CTA Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'cta_title_sub_color',
                [
                    'label'     => esc_html__( 'CTA Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta__subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-section-title .pr-mark-section-title-tag',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'cta_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'CTA Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'cta_title__color',
                [
                    'label'     => esc_html__( 'CTA Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-cta-section .pr-mark-section-title h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-cta-section .pr-mark-section-title h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'cta_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'CTA Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'cta_btn__color',
                [
                    'label'     => esc_html__( 'CTA Button Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-btn a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-btn a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .pr-mark-btn a',
                ]
            );
            $this->end_controls_section();


        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $cta_shape_bg   = $settings['cta_shape_bg']['url'];
            $subtitle       = $settings['subtitle'];
            $title          = $settings['title'];
            $btn_text       = $settings['btn_text'];
            $btn_url        = $settings['btn_url'];

        ?>
        <section id="pr-mark-cta" class="pr-mark-cta-section" data-background="<?php echo esc_url($cta_shape_bg);?>">
            <div class="container">
                <div class="pr-mark-cta-content d-flex justify-content-between align-items-center">
                    <div class="pr-mark-section-title headline pera-content">
                        <span class="pr-mark-section-title-tag"><?php echo esc_html($subtitle);?></span>
                        <h2><?php echo esc_html($title);?></h2>
                    </div>
                    <div class="pr-mark-btn text-center">
                        <a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url($btn_url['url']);?>"><?php echo esc_html($btn_text);?></a>
                    </div>
                </div>
            </div>
        </section>	
      <?php

              }

      }
