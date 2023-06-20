<?php

    class mrk_hero_slider extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mrk_hero_slider';
        }

        public function get_title() {
            return __( 'Marketing  Hero', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-slider-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'hero_content',
                [
                    'label' => __( 'Hero Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'hero_bg',
                [
                    'label' => __( 'Hero Section Bg Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hero_shape1',
                [
                    'label' => __( 'Shape 1', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hero_shape2',
                [
                    'label' => __( 'Shape 2', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hero_shape3',
                [
                    'label' => __( 'Shape 3', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hero_shape4',
                [
                    'label' => __( 'Shape 4', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'hr',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'sub_title',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            $this->add_control(
                'hero_title',
                [
                    'label' => __( 'Hero Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'hero_text',
                [
                    'label' => __( 'Hero Text', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'hr_2',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'btn_label',
                [
                    'label' => __( 'Button Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'btn_url',
                [
                    'label' => __( 'Button URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'video_label',
                [
                    'label' => __( 'Video Label', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'video_url',
                [
                    'label' => __( 'Video URL', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'hr_3',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'hero_img',
                [
                    'label' => __( 'Hero Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'client_title',
                [
                    'label' => __( 'Client Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'client_count',
                [
                    'label' => __( 'Client Count', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $repeater = new \Elementor\Repeater();            

            $repeater->add_control(
                'client_img', [
                    'label'       => esc_html__( 'Client Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'clients_images',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->add_control(
                'hr_5',
                [
                    'type' => \Elementor\Controls_Manager::DIVIDER,
                ]
            );
            $this->add_control(
                'counter_title',
                [
                    'label' => __( 'Counter Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'counter_number',
                [
                    'label' => __( 'Counter Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'counter_symbole',
                [
                    'label' => __( 'Counter Symbole', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'hero_shape5',
                [
                    'label' => __( 'Hero Image', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
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
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text .banner-sub-tag',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'sub_title_clr',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text .banner-sub-tag b',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sb_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text .banner-sub-tag b',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'hero_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Hero Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'title_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text h1' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text h1',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                'hero_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Hero Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'h_text_color',
                [
                    'label'     => esc_html__( 'Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-text p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'hero_btn_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Hero Button Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'h_btn_color',
                [
                    'label'     => esc_html__( 'Button Text Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-btn a' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'btn_background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', ],
                    'selector' => '{{WRAPPER}} .pr-mark-btn a',
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-btn a',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'client_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Client Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cl_title_clr',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-client-wrapper .pr-mark-banner-client-text' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cl_title_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-client-wrapper .pr-mark-banner-client-text',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'number_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Number Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cl_number',
                [
                    'label'     => esc_html__( 'Cl Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cl_no_btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'co_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Counter Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'cou_title',
                [
                    'label'     => esc_html__( 'Counter Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter p' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'con_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr-mark-banner-content .pr-mark-banner-counter p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings   = $this->get_settings_for_display();
            $hero_bg        = $settings['hero_bg']['url'];
            $hero_shape1    = $settings['hero_shape1']['url'];
            $hero_shape2    = $settings['hero_shape2']['url'];
            $hero_shape3    = $settings['hero_shape3']['url'];
            $hero_shape4    = $settings['hero_shape4']['url'];

            $sub_title    = $settings['sub_title'];
            $hero_title    = $settings['hero_title'];
            $hero_text    = $settings['hero_text'];

            $btn_label    = $settings['btn_label'];
            $btn_url      = $settings['btn_url'];
            $video_label  = $settings['video_label'];
            $video_url  = $settings['video_url'];


            $hero_img  = $settings['hero_img']['url'];
            $client_title  = $settings['client_title'];
            $client_count  = $settings['client_count'];

            $clients_images  = $settings['clients_images'];

            $counter_title   = $settings['counter_title'];
            $counter_number  = $settings['counter_number'];
            $counter_symbole = $settings['counter_symbole'];
            $hero_shape5     = $settings['hero_shape5']['url'];

        ?>
        <section id="pr-mark-banner" class="pr-mark-banner-section position-relative" data-background="<?php echo esc_url($hero_bg);?>">
            <span class="pr-mark-banner-shape2 position-absolute"><img src="<?php echo esc_url($hero_shape1);?>" alt=""></span>
            <span class="pr-mark-banner-shape3 position-absolute"><img src="<?php echo esc_url($hero_shape2);?>" alt=""></span>
            <span class="pr-mark-banner-shape5 position-absolute"><img src="<?php echo esc_url($hero_shape3);?>" alt=""></span>
            <span class="pr-mark-banner-shape4 position-absolute"><img src="<?php echo esc_url($hero_shape4);?>" alt=""></span>
            <div class="pr-mark-banner-content-wrapper">
                <div class="container">
                    <div class="pr-mark-banner-content position-relative">
                        <div class="pr-mark-banner-text headline pera-content">
                            <span class="banner-sub-tag"><b><?php echo esc_html($sub_title);?></b></span>
                            <h1><?php echo esc_html($hero_title);?></h1>
                            <p><?php echo __($hero_text);?></p>
                            <div class="pr-mark-banner-btn d-flex">
                                <div class="pr-mark-btn text-center">
                                    <a class="d-flex justify-content-center align-items-center" href="<?php echo esc_html($btn_url['url']);?>"><?php echo esc_html($btn_label);?></a>
                                </div>
                                <div class="pr-mark-banner-video d-flex align-items-center">
                                    <a class="video_box d-flex justify-content-center align-items-center" href="<?php echo esc_url($video_url);?>"><i class="far fa-video"></i></a>
                                    <span><?php echo esc_html($video_label);?></span>
                                </div>
                            </div>
                        </div>
                        <div class="pr-mark-banner-img">
                            <img src="<?php echo esc_url($hero_img);?>" alt="">
                            <div class="pr-mark-banner-client-wrapper d-flex align-items-center">
                                <div class="pr-mark-banner-client-text">
                                    <?php echo esc_html($client_title);?>
                                </div>
                                <div class="pr-mark-banner-client-img ul-li position-relative">
                                    <ul>
                                        <?php foreach($clients_images as $item):?>
                                        <li><img src="<?php echo $item['client_img']['url'];?>" alt=""></li>
                                        <?php endforeach;?>
                                    </ul>
                                    <div class="pr-mark-tc-counter"><span class="counter"><?php echo esc_html($client_count);?></span>+</div>
                                </div>
                            </div>
                            <div class="pr-mark-banner-counter headline pera-content text-center">
                                <h3><span class="counter"><?php echo esc_html($counter_number);?></span><?php echo esc_html($counter_symbole);?></h3>
                                <p><?php echo esc_html($counter_title);?></p>
                            </div>
                            <div class="pr-mark-banner-shape1 position-absolute"><img src="<?php echo esc_url($hero_shape5)?>"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
      <?php

              }

      }
