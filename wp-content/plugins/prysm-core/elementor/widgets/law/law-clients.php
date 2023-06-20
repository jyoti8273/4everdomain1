<?php

    class law_partner_carousle extends \Elementor\Widget_Base {

        public function get_name() {
            return 'law_partner_carousle';
        }

        public function get_title() {
            return __( 'Law Agency Partner', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-posts-grid';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'testimonial_section',
                [
                    'label' => __( 'Testimonial Contetn', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'partner_img', [
                    'label'       => esc_html__( 'Partner Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            ); 

            $repeater->add_control(
                'link', [
                    'label'       => esc_html__( 'Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
            
            $this->add_control(
                'partneritem',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'client_style_section',
                [
                    'label' => __( 'Client Style Section', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                '_cli_title_box_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'clic_title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eight h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cli_title_typography',
                    'label'          => esc_html__( 'Title Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eight h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
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
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $title    = $settings['title'];
            $partneritem    = $settings['partneritem'];

        ?>  

        <!-- Clients Section Six -->
        <section class="clients-section-six">
            <div class="auto-container">
                <div class="sec-title-eight centered">
                    <h2><?php echo esc_html($title);?></h2>
                </div>
                <div class="inner-container">
                    <div class="sponsors-outer">
                        <!-- Sponsors Carousel -->
                        <ul class="sponsors-carousel owl-carousel owl-theme">
                            <?php foreach($partneritem as $item):?>
                            <li class="slide-item">
                                <figure class="image-box">
                                    <a href="<?php echo esc_url($item['link']['url']);?>"><img src="<?php echo esc_url($item['partner_img']['url']);?>" alt=""></a>
                                </figure>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Clients Section Six -->
      <?php

              }

      }
