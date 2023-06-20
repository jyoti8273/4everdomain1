<?php

    class finance_brand_carousel extends \Elementor\Widget_Base {

        public function get_name() {
            return 'finance_brand_carousel';
        }

        public function get_title() {
            return __( 'Finance Brand Carousel', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'brand_gall',
                [
                    'label' => __( 'Brand Gallery', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'brand_gallery',
                [
                    'label' => __( 'Add Images', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::GALLERY,
                    'default' => [],
                ]
            );           
            
            $this->end_controls_section();

            $this->start_controls_section(
                'gall_style',
                [
                    'label' => __( 'Gallery Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr6-brand-slider-area .pr6-brand-slider .pr6-brand-item',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr6-brand-slider-area .pr6-brand-slider .pr6-brand-item',
                ]
            );
            $this->add_control(
                'height',
                [
                    'label' => __( 'Height', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr6-brand-slider-area .pr6-brand-slider .pr6-brand-item' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'line-height',
                [
                    'label' => __( 'Line Height', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .pr6-brand-slider-area .pr6-brand-slider .pr6-brand-item' => 'line-height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $brand_gallery   = $settings['brand_gallery'];

        ?>        
            <div class="pr6-brand-slider-area">
                <div class="container">
                    <div class="pr6-brand-slider">
                        <?php foreach($brand_gallery as $gall):?>
                            <div class="pr6-brand-item">
                                <img src="<?php echo esc_url($gall['url']);?>" alt="">
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
      <?php

    }

      }
