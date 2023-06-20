<?php

    class weba_project_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'weba_project_section';
        }

        public function get_title() {
            return __( 'Web Agency Project', 'prysm' );
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
                'project_bg', [
                    'label'       => esc_html__( 'Section Background', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'maintitle', [
                    'label'       => esc_html__( 'Main Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
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
            $this->end_controls_section();

            $this->start_controls_section(
                'project_style',
                [
                    'label' => esc_html__( 'project Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'section_sub_title',
                [
                    'label'     => esc_html__( 'Section Sub TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-ten .title' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'section_main_heading_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'section_title',
                [
                    'label'     => esc_html__( 'Section TItle Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-ten h2' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '42',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'project_style_opt',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Style Settings', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'project_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-seven .inner-box .lower-content h5, .gallery-block-seven .inner-box .info-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '22',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'project_title_color',
                [
                    'label' => esc_html__( 'Project Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-seven .inner-box .lower-content h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_title_hover_color',
                [
                    'label' => esc_html__( 'Project Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-seven .inner-box .info-box h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'project_cate_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Category  Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'proj_cate_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-seven .inner-box .lower-content .designation, .gallery-block-seven .inner-box .info-box .designation',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'project_icon_and_link',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Project Link/Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-seven .inner-box .lower-content .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'icon_bg_color',
                [
                    'label' => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-seven .inner-box .lower-content .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .gallery-block-seven .inner-box .info-box .icon, .gallery-block-seven .inner-box .arrow',
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
                    'selector'       => '{{WRAPPER}} .btn-style-twentyfive .txt',
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
                        '{{WRAPPER}} .btn-style-twentyfive .txt' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .btn-style-twentyfive',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .btn-style-twentyfive' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .btn-style-twentyfive .txt:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .btn-style-twentyfive:before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive .txt:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .btn-style-twentyfive .txt:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .btn-style-twentyfive:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $project_bg     = $settings['project_bg']['url'];
            $sub_title     = $settings['sub_title'];
            $maintitle       = $settings['maintitle'];
            $description       = $settings['description'];
            $projects_items        = $settings['projects_items'];

        ?>
        <!-- Project Section Seven -->
        <section class="project-section-seven" style="background-image: url(<?php echo esc_url($project_bg['url']);?>)">
            <div class="auto-container">
                <div class="sec-title-ten centered">
                    <div class="title"><?php echo esc_html($sub_title);?></div>
                    <h2><?php echo esc_html($maintitle);?></h2>
                    <div class="text"><?php echo __($description);?></div>
                </div>
                
                <div class="row clearfix">
                    <?php $shape = 0; foreach($projects_items as $index => $box): $shape++;?>
                    <?php  if( $box['project_id'] ) : ?>	               
                    <!-- Gallery Block Seven -->
                    <div class="gallery-block-seven col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo esc_url($box['project_img']['url']);?>" alt= "" />
                                <div class="overlay-box" style="background-image: url(<?php echo esc_url($box['project_img']['url']);?>)">
                                    <a href="<?php echo get_the_permalink($box['project_id']);?>" class="arrow fa fa-angle-right"></a>
                                    <div class="info-box">
                                        <div class="info-inner">
                                            <span class="icon <?php echo esc_attr($box['icon_name']);?>"></span>
                                            <div class="designation"><?php echo esc_html($box['category_name']);?></div>
                                            <h5><a href="<?php echo get_the_permalink($box['project_id']);?>"><?php echo get_the_title($box['project_id']);?></a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="lower-content">
                                    <div class="content">
                                        <div class="icon <?php echo esc_attr($box['icon_name']);?>"></div>
                                        <div class="designation"><?php echo esc_html($box['category_name']);?></div>
                                        <h5><?php echo get_the_title($box['project_id']);?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
                
                <!-- Button Box -->
                <div class="btns-box text-center">
                    <a href="<?php echo esc_url($settings['btn_link']['url']);?>" class="theme-btn btn-style-twentyfive"><span class="txt"><?php echo esc_html($settings['btn_label']);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                </div>
                
            </div>
        </section>
        <!-- End Project Section Seven -->

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
