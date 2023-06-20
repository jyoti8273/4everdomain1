<?php

    class ag2_partner_carousle extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_partner_carousle';
        }

        public function get_title() {
            return __( 'Agency Two Partner', 'prysm' );
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

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $partneritem    = $settings['partneritem'];

        ?>  
        <!-- Clients Section Three -->
        <section class="clients-section-three style-two">
            <div class="auto-container">
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
        </section>
        <!-- End Clients Section Three -->
      <?php

              }

      }
