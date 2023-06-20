<?php

    class weba_partner_carousle extends \Elementor\Widget_Base {

        public function get_name() {
            return 'weba_partner_carousle';
        }

        public function get_title() {
            return __( 'Web Agency Partner', 'prysm' );
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
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'client_background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .clients-section-seven .inner-container',
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $partneritem    = $settings['partneritem'];

        ?>  
        <!-- Clients Section Seven -->
        <section class="clients-section-seven">
            <div class="auto-container">
                <div class="inner-container">
                    <div class="sponsors-outer">
                        <!-- Sponsors Carousel -->
                        <ul class="sponsors-carousel-four owl-carousel owl-theme">

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
        <!-- End Clients Section Seven -->
      <?php

              }

      }
