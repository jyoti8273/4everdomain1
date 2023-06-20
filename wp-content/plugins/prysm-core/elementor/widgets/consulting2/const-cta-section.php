<?php

    class cont_cta_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'cont_cta_item';
        }

        public function get_title() {
            return __( 'Consulting V2 CTA', 'prysm' );
        } 

        public function get_icon() {
            return 'eicon-call-to-action';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'cta_info_content',
                [
                    'label' => __( 'cta Info Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            ); 

            $this->add_control(
                'cta_bg',
                [
                    'label' => __( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'cta_img',
                [
                    'label' => __( 'CTA Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'sub_title',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_label',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_link',
                [
                    'label' => __( 'Button Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
           
            
            $this->end_controls_section();

            $this->start_controls_section(
                'slider_style',
                [
                    'label' => esc_html__( 'Hero Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'cta_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta_subt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .cta-section .inner-container .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'cta_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cta_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .cta-section .inner-container h3',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '45',
                            ],
                        ],
                    ],
                ]
            );
            
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $cta_bg = $settings['cta_bg'];
            $cta_img = $settings['cta_img'];
            $sub_title = $settings['sub_title'];
            $title = $settings['title'];
            $btn_label = $settings['btn_label'];
            $btn_link = $settings['btn_link'];

        ?>
        <!-- CTA Section -->
        <section class="cta-section" style="background-image: url(<?php echo esc_url($cta_bg['url']);?>)">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="image">
                        <img src="<?php echo esc_url($cta_img['url']);?>" alt="" />
                    </div>
                    <div class="title"><?php echo esc_html($sub_title);?></div>
                    <h3><?php echo __($title);?></h3>
                    <div class="button-box">
                        <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn appointment-btn"><?php echo esc_html($btn_label);?> <i class="flaticonv10-right-arrow-2"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End CTA Section -->
      <?php

              }

      }
