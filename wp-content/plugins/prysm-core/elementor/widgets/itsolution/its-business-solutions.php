<?php

    class its_business_solution extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_business_solution';
        }

        public function get_title() {
            return __( 'IT Business Solution', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-image-box';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'solutionbox_box_content',
                [
                    'label' => __( 'solutionbox Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'solutionbox_shape_img',
                [
                    'label' => __( 'Shape Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
            

            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Box Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'solutions_left',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            $this->add_control(
                'solution_img',
                [
                    'label' => __( 'Solution Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hr',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'icon',
                [
                    'label' => esc_html__( 'Box Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
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
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'solutions_right',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'solutionbox_style',
                [
                    'label' => esc_html__( 'solutionbox Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'content_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr20-business-item',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr20-business-item',
                ]
            );
            $this->add_control(
                'padding',
                [
                    'label' => __( 'Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr20-business-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'content_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Box Content Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-business-item-content .pr20-headline h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-business-item-content .pr20-headline h6',
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
                        '{{WRAPPER}} .pr20-business-item .pr20-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-business-item .pr20-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_solutionbox_icon_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'solutionbox Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );            
            
            $this->add_control(
                'icon_color',
                [
                    'label'     => esc_html__( 'Icon Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-business-item .pr20-icon-wrapper i' => 'color: {{VALUE}} ',
                    ],
                ]
            );           
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $solutionbox_shape_img  = $settings['solutionbox_shape_img']['url'];
            $solution_img  = $settings['solution_img']['url'];
            $solutions_left  = $settings['solutions_left'];
            $solutions_right = $settings['solutions_right'];

        ?>
        <section class="pr20-business-section">
            <div class="container">
                <div class="pr20-business-content" data-background="<?php echo esc_url($solutionbox_shape_img);?>">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="pr20-business-column">
                                <div class="pr20-business-list">
                                    <?php foreach($solutions_left as $item):?>
                                        <div class="pr20-business-item wow fadeInUp">
                                            <div class="pr20-icon-wrapper">
                                                <i class="<?php echo esc_html($item['icon']);?>"></i>
                                            </div>
                                            <div class="pr20-business-item-content">
                                                <div class="pr20-headline">
                                                    <h6><?php echo esc_html($item['title']);?></h6>
                                                </div>
                                                <div class="pr20-pera-txt">
                                                    <p><?php echo __($item['description']);?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pr20-business-middle">
                                <img src="<?php echo esc_url($solution_img);?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="pr20-business-column">
                                <div class="pr20-business-list">
                                    <?php foreach($solutions_right as $item):?>
                                        <div class="pr20-business-item wow fadeInUp">
                                            <div class="pr20-icon-wrapper">
                                                <i class="<?php echo esc_html($item['icon']);?>"></i>
                                            </div>
                                            <div class="pr20-business-item-content">
                                                <div class="pr20-headline">
                                                    <h6><?php echo esc_html($item['title']);?></h6>
                                                </div>
                                                <div class="pr20-pera-txt">
                                                    <p><?php echo __($item['description']);?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
