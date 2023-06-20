<?php

    class mgv2_clients_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_clients_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Clients', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'sponsors_content',
                [
                    'label' => __( 'sponsors Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'gallery',
                [
                    'label' => esc_html__( 'Add Images', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::GALLERY,
                    'default' => [],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $gallery   = $settings['gallery'];

        ?>
        <!-- Clients Section Four -->
        <section class="clients-section-four">
            <div class="container">
                <div class="sponsors-outer">
                    <!-- Sponsors Carousel -->
                    <ul class="sponsors-carousel-three owl-carousel owl-theme">
                        <?php foreach($gallery as $gal):?>
                            <li class="slide-item"><figure class="image-box"><a href="#"><img src="<?php echo esc_url($gal['url']);?>" alt=""></a></figure></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Clients Section Four -->
      <?php

              }

      }
