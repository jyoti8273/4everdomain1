<?php

    class finance_about_banner extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_about_banner';
        }

        public function get_number() {
            return __( 'About Banner', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-banner';
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
                'year', [
                    'label'       => esc_html__( 'Year', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'exp_number', [
                    'label'       => esc_html__( 'Exprience number', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );            
            
            $this->add_control(
                'about_img',
                [
                    'label' => __( 'About Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'about_img2',
                [
                    'label' => __( 'About Image 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $this->end_controls_section();

            

            $this->start_controls_section(
                'about_right_style',
                [
                    'label' => esc_html__( 'About Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'h_number',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'NUmber Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'number_color',
                [
                    'label'     => esc_html__( 'Number Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-about-section .pr6-about-left .pr6-about-count h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'number_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-about-section .pr6-about-left .pr6-about-count h2',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'ex_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Exprience Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'ex_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr6-about-section .pr6-about-left .pr6-about-count span' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'exp_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr6-about-section .pr6-about-left .pr6-about-count span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'exp_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Exprience Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr6-about-section .pr6-about-left .pr6-about-count',
                ]
            );
            $this->add_control(
                'box_round',
                [
                    'label' => __( 'Round', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr6-about-section .pr6-about-left .pr6-about-count' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $year           = $settings['year'];
            $exp_number     = $settings['exp_number'];
            $about_img      = $settings['about_img']['url'];
            $about_img2     = $settings['about_img2']['url'];

        ?>

        <div class="pr6-about-section">
            <div class="pr6-about-left">
                <div class="pr6-img-wrapper-1 wow fadeInLeft">
                    <img src="<?php echo esc_url($about_img);?>" alt="">
                </div>
                <div class="pr6-about-count wow fadeInLeft" data-wow-delay="0.2s">
                    <h2><?php echo esc_html($year);?></h2>
                    <span><?php echo esc_html($exp_number);?></span>
                </div>
                <div class="pr6-img-wrapper-2 wow fadeInRight" data-wow-delay="0.3s">
                    <div class="pr6-img-wrapper">
                        <img src="<?php echo esc_url($about_img2);?>" alt="">
                    </div>
                </div>
            </div>
        </div>
      <?php

              }

      }
