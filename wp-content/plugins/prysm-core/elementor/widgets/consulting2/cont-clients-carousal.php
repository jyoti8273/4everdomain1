<?php

    class cont_trusted_partner extends \Elementor\Widget_Base {

        public function get_name() {
            return 'cont_trusted_partner';
        }

        public function get_title() {
            return __( 'Consulting V2 Partner', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-slider-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'partner_content',
                [
                    'label' => __( 'Partner Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();   

            $repeater->add_control(
                'partner_img',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'partner_link',
                [
                    'label' => __( 'Partner Link', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'partners',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
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
                'hero_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'feature Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hero_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .banner-section .content h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '36',
                            ],
                        ],
                    ],
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $partners       = $settings['partners'];

        ?>
        <!-- Clients Section Two -->
        <section class="clients-section-two">
            <div class="auto-container">
                <div class="sponsors-outer">
                    <!-- Sponsors Carousel -->
                    <ul class="sponsors-carousel-two owl-carousel owl-theme">
                        <?php foreach($partners as $item):?>
                        <li class="slide-item"><figure class="image-box"><a href="<?php echo esc_url($item['partner_link']['url']);?>"><img src="<?php echo esc_url($item['partner_img']['url']);?>" alt="<?php echo esc_attr($item['partner_img']['alt']);?>"></a></figure></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- Clients Section Two -->
      <?php

              }

      }
