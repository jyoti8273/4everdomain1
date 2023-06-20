<?php

    class bus4_project_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'bus4_project_section';
        }

        public function get_title() {
            return __( 'Business 4 Project', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-project-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'project_content',
                [
                    'label' => __( 'Project Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            
            $this->add_control(
                'count', [
                    'label'       => esc_html__( 'Count', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            ); 
            $this->add_control(
                'subtitle', [
                    'label'       => esc_html__( 'Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'btn_label', [
                    'label'       => esc_html__( 'Button Label', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'btn_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();
                
            $repeater->add_control(
                'project_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
            $repeater->add_control(
                'icon_name', [
                    'label'       => esc_html__( 'Icon Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'project_img', [
                    'label'       => esc_html__( 'Project Img', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );             
                             
            $repeater->add_control(
                'category_name', [
                    'label'       => esc_html__( 'Category Name', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );               
            $this->add_control(
                'projects_items',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'project_style',
                [
                    'label' => esc_html__( 'project Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                '_sub_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sub_title',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eleven .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eleven .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '16',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'main_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Main Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'sec_main_title_colo',
                [
                    'label'     => esc_html__( 'Main Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-eleven h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-eleven h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '48',
                            ],
                        ],
                    ],
                ]
            );
            
            
            $this->add_control(
                'project_settings',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Settings Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'broject_box_shape_bg',
                [
                    'label' => esc_html__( 'Project Shape BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-block-two .inner-box .overlay-box .triangle-layer' => 'border-bottom:270px solid {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_title_clrt',
                [
                    'label' => esc_html__( 'Project Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-block-two .inner-box .overlay-box .content h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'projctt_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .project-block-two .inner-box .overlay-box .content h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '24',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'project_cat_clrt',
                [
                    'label' => esc_html__( 'Project Cate Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-block-two .inner-box .overlay-box .content .designation' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'projctt_catr_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .project-block-two .inner-box .overlay-box .content .designation',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '14',
                            ],
                        ],
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'button__content',
                [
                    'label' => __( 'Button Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'btn_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .btn-style-twentysix .txt',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->start_controls_tabs( '_banner_button_1' );
            $this->start_controls_tab(
                '_prysm_btn__banner_normal',
                [
                    'label' => esc_html__( 'Normal', 'prysm-extension' ),
                ]
            );
            $this->add_control(
                'btn__color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-twentysix .txt' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-twentysix',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentysix' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Padding', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentysix' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'btn__hover_color',
                [
                    'label'     => esc_html__( 'Color', 'prysm-extension' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .btn-style-twentysix .txt:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name'     => 'btn_hover_bg_color',
                    'label'    => __( 'Background', 'prysm-extension' ),
                    'types'    => ['classic', 'gradient'],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .btn-style-twentysix:before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentysix .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .btn-style-twentysix .txt:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentysix:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $count          = $settings['count'];
            $subtitle       = $settings['subtitle'];
            $maintitle      = $settings['maintitle'];
            $btn_label      = $settings['btn_label'];
            $btn_link      = $settings['btn_link'];
            $projects_items = $settings['projects_items'];

        ?>

        <!-- Portfolio Section Two -->
        <section class="portfolio-section-two">
            <div class="bottom-color-layer"></div>
            <div class="auto-container">
                <div class="sec-title-eleven">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="number"><?php echo esc_attr($count);?></div>
                            <div class="title"><?php echo esc_html($subtitle);?></div>
                            <h2><?php echo __($maintitle);?></h2>
                        </div>
                        <div class="pull-right">
                            <!-- Button Box -->
                            <div class="button-box">
                                <a href="<?php echo esc_url($btn_link['url']);?>" class="theme-btn btn-style-twentysix"><span class="txt"><?php echo esc_html($btn_label);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-carousel-two owl-carousel owl-theme">
                    <?php $shape = 0; foreach($projects_items as $index => $box): $shape++;?>
                    <?php  if( $box['project_id'] ) : ?>	
                    <!-- Project Block Two -->
                    <div class="project-block-two">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo esc_url($box['project_img']['url']);?>" alt="" />
                                <div class="overlay-box">
                                    <div class="triangle-layer"></div>
                                    <div class="content">
                                        <a href="<?php echo get_the_permalink($box['project_id']);?>" class="arrow fal fa-long-arrow-right"></a>
                                        <h4><a href="<?php echo get_the_permalink($box['project_id']);?>"><?php echo get_the_title($box['project_id']);?></a></h4>
                                        <div class="designation"><?php echo esc_html($box['category_name']);?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Portfolio Section Two -->

      <?php

              }

              protected function select_param_posts() {
                $args = wp_parse_args( [
                    'post_type'   => 'portfolio',
                    'numberposts' => -1,
                    'orderby'     => 'title',
                    'order'       => 'ASC',
                ] );
            
                $query_query = get_posts( $args );
            
                $posts = [];
                if ( $query_query ) {
                    foreach ( $query_query as $query ) {
                        $posts[$query->ID] = $query->post_title;
                    }
                }
            
                return $posts;
            }

      }
