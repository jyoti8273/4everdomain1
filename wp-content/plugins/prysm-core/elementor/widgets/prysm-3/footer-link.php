<?php

    class prysm3_footer_link extends \Elementor\Widget_Base {

        public function get_name() {
            return 'prysm3_footer_link';
        }

        public function get_title() {
            return __( 'prysm3 Footer Link', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'footerlink__content',
                [
                    'label' => __( 'Footerlink Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $repeater = new \Elementor\Repeater();
            
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Item Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $repeater->add_control(
                'link_url', [
                    'label'       => esc_html__( 'URL', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                ]
            );
            $this->add_control(
                'items_list',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            
            
            $this->end_controls_section();

            $this->start_controls_section(
                'section_info_style',
                [
                    'label' => esc_html__( 'Footerlink Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'link_itm_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .prysm-footer-links ul li a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'link-bottom-space',
                [
                    'label' => __( 'Bottom Spaceing', 'prysm' ),
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
                        '{{WRAPPER}} .prysm-footer-links ul li:not(:last-child)' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            $this->start_controls_tabs( '_banner_button_1' );
            $this->start_controls_tab(
                '_prysm_f_link__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'item_txt__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .prysm-footer-links ul li a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_tab();
            $this->start_controls_tab(
                '_prysm_btn_hover',
                [
                    'label' => esc_html__( 'Hover', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'fter__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .prysm-footer-links ul li a:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            
            $this->end_controls_tab();
            $this->end_controls_tabs();
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings     = $this->get_settings_for_display();
            $items_list   = $settings['items_list'];

        ?>        
        <div class="prysm-footer-links">
            <ul>
                <?php foreach($items_list as $list):?>
                <li><a href="<?php echo esc_url($list['link_url']['url']);?>"><?php echo esc_html($list['title']);?></a></li>
                <?php endforeach;?>
            </ul>
        </div>
      <?php

    }

      }
