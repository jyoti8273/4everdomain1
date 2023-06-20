<?php

    class constv3_sponcore_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_sponcore_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Sponsors', 'prysm' );
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
                'section_bg',
                [
                    'label' => esc_html__( 'Section BG', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [],
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
            $section_bg   = $settings['section_bg'];
            $gallery   = $settings['gallery'];

        ?>
            <!-- Clients Section Three -->
			<section class="clients-section-three" style="background-image: url(<?php echo esc_url($section_bg['url']);?>)">
				<div class="container">
					<div class="sponsors-outer">
						<!-- Sponsors Carousel -->
						<ul class="sponsors-carousel owl-carousel owl-theme">
                            <?php foreach($gallery as $gal):?>
							<li class="slide-item"><figure class="image-box"><a href="#"><img src="<?php echo esc_url($gal['url']);?>" alt=""></a></figure></li>
                            <?php endforeach;?>
						</ul>
					</div>
				</div>
			</section>
			<!-- End Clients Section Three -->
      <?php

              }

      }
