<?php

    class its_footer_contact_info extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_footer_contact_info';
        }

        public function get_title() {
            return __( 'IT Footer Contact Info', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-info-circle-o';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'contact_info_content',
                [
                    'label' => __( 'Contact Info', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
            

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Icon', 'datanext-extension' ),
                    'type' => \Elementor\Controls_Manager::ICONS,
                ]
            ); 
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'content', [
                    'label'       => esc_html__( 'Content', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'contact_infos',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'coninfo_style',
                [
                    'label' => esc_html__( 'Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'info_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-footer-widget .pr20-footer-address li span strong' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-footer-widget .pr20-footer-address li span strong',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_info_content_title_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Content', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'content_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-footer-widget .pr20-footer-address li span' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-footer-widget .pr20-footer-address li span',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_list_icon_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'list Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-footer-widget .pr20-footer-address li i' => 'color: {{VALUE}} ',
                    ],
                ]
            );        
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $contact_infos  = $settings['contact_infos'];

        ?>
            <div class="pr20-footer-widget">
                <div class="pr20-footer-address">
                    <ul>
                        
                        <?php foreach($contact_infos as $infos):?>
                        <li>
                            <?php \Elementor\Icons_Manager::render_icon( $infos['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            <span>
                                <strong><?php echo esc_html($infos['title']);?></strong>
                                <br>
                                <?php echo __($infos['content']);?>
                            </span>
                    </li>                        
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            
      <?php

              }

      }
