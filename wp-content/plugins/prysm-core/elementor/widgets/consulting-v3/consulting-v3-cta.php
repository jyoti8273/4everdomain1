<?php

    class constv3_cta_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_cta_section';
        }

        public function get_title() {
            return __( 'Consulting V3 CTA', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-call-to-action';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'business_content',
                [
                    'label' => __( 'Business Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'cta_bg1', [
                    'label'       => esc_html__( 'CTA bg 1', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'cta_bg2', [
                    'label'       => esc_html__( 'CTA BG 2', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'cta_bg3', [
                    'label'       => esc_html__( 'CTA BG 3', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'cta_title', [
                    'label'       => esc_html__( 'CTA Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_link', [
                    'label'       => esc_html__( 'Button LInk', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
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
                'cta_style_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Cta Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .cta-section-three .content h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'cta_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .cta-section-three .content h3' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $cta_bg1   = $settings['cta_bg1'];
            $cta_bg2   = $settings['cta_bg2'];
            $cta_bg3   = $settings['cta_bg3'];
            $cta_title   = $settings['cta_title'];
            $btn_label   = $settings['btn_label'];
            $btn_link   = $settings['btn_link'];

        ?>
       <!-- Cta Section Three -->
        <section class="cta-section-three">
            <div class="left-layer" style="background-image: url(<?php echo esc_url($cta_bg1['url']);?>)"></div>
            <div class="right-layer" style="background-image: url(<?php echo esc_url($cta_bg2['url']);?>)"></div>
            <div class="container">
                <div class="content" style="background-image: url(<?php echo esc_url($cta_bg3['url']);?>)">
                    <h3><?php echo __($cta_title);?></h3>
                    <!-- Button Box -->
                    <div class="button-box">
                        <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-eleven"><span class="txt"><?php echo esc_html($btn_label);?></span></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Cta Section Three -->
      <?php

              }

      }
