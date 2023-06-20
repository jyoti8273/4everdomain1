<?php

    class weba_service_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'weba_service_section';
        }

        public function get_title() {
            return __( 'Web Agency Service', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-service-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'service_content',
                [
                    'label' => __( 'Service Section Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'pattern1', [
                    'label'       => esc_html__( 'Service Background', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'pattern2', [
                    'label'       => esc_html__( 'Service Image', 'prysm' ),
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

            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'service_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );
            $repeater->add_control(
                'service_img', [
                    'label'       => esc_html__( 'Service Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
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
                'service_cat', [
                    'label'       => esc_html__( 'Service Cate', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );             
            $repeater->add_control(
                'service_list',
                [
                    'label' => esc_html__( 'Service List', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => esc_html__( 'Default description', 'prysm' ),
                ]
            );          
            $this->add_control(
                'services_items',
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
                'more_link', [
                    'label'       => esc_html__( 'Button Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            ); 
            $this->end_controls_section();

            $this->start_controls_section(
                'service_style',
                [
                    'label' => esc_html__( 'Service Style', 'prysm' ),
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
                        '{{WRAPPER}} .sec-title-ten h4' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sm_title__typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-ten h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
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
                'serv_title_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-block .inner-box .lower-content h5, .digital-block .inner-box .upper-box h5',
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
                'serv_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-block .inner-box .lower-content h5' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_title_hover_color',
                [
                    'label' => esc_html__( 'Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-block .inner-box .upper-box h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'serv_cat_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service Cate Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'serv_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-block .inner-box .upper-box .designation, .digital-block .inner-box .lower-content .designation',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'service_list_item',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Service List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'service_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .digital-block .inner-box .options-list li',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Lato',
                        ]
                    ],
                ]
            );
            $this->add_control(
                'serv_list_color',
                [
                    'label' => esc_html__( 'List Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-block .inner-box .options-list li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_list_icon_color',
                [
                    'label' => esc_html__( 'List Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-block .inner-box .options-list li:before' => 'color: {{VALUE}}',
                    ],
                ]
            );
           
            $this->add_control(
                'serv_icon_style_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Icon Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'serv_icon_color',
                [
                    'label' => esc_html__( 'Icon Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-block .inner-box .lower-content .icon' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'serv_bg_icon_color',
                [
                    'label' => esc_html__( 'Icon BG Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .digital-block .inner-box .lower-content .icon' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'icon_bgbackground',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'selector' => '{{WRAPPER}} .digital-block .inner-box .upper-box .icon, .digital-block .inner-box .arrow',
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $sub_title     = $settings['sub_title'];
            $maintitle       = $settings['maintitle'];

            $pattern1   = $settings['pattern1'];
            $pattern2   = $settings['pattern2'];

            $btn_label         = $settings['btn_label'];
            $more_link        = $settings['more_link'];
            $services_items        = $settings['services_items'];

        ?>
         <!-- Digital Section Three -->
        <section class="digital-section-three">
            <div class="pattern-layer-one" style="background-image: url(<?php echo esc_url($pattern1['url']);?>)"></div>
            <div class="pattern-layer-two" style="background-image: url(<?php echo esc_url($pattern2['url']);?>)"></div>
            <div class="auto-container">
                <!-- Sec Title Ten -->
                <div class="sec-title-ten centered">
                    <div class="title"><?php echo esc_html($sub_title);?></div>
                    <h4><?php echo __($maintitle);?></h4>
                </div>
                <div class="row clearfix">
                    <?php $shape = 0; foreach($services_items as $index => $box): $shape++;?>
                    <?php  if( $box['service_id'] ) : ?>
                    <!-- Digital Block -->
                    <div class="digital-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <img src="<?php echo esc_url($box['service_img']['url']);?>" alt= "" />
                                <div class="overlay-box" style="background-image: url(<?php echo esc_url($box['service_img']['url']);?>)">
                                    <div class="overlay-inner">
                                        <div class="content">
                                            <a href="<?php echo get_the_permalink($box['service_id']);?>" class="arrow fa fa-angle-right"></a>
                                            <div class="upper-box">
                                                <div class="upper-inner">
                                                    <span class="icon <?php echo esc_attr($box['icon_name']);?>"></span>
                                                    <div class="designation"><?php echo esc_html($box['service_cat']);?></div>
                                                    <h5><a href="<?php echo get_the_permalink($box['service_id']);?>"><?php echo get_the_title($box['service_id']);?></a></h5>
                                                </div>
                                            </div>
                                            <div class="options-list">
                                                <?php echo __($box['service_list']);?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="lower-content">
                                    <div class="content">
                                        <div class="icon <?php echo esc_attr($box['icon_name']);?>"></div>
                                        <div class="designation"><?php echo esc_html($box['service_cat']);?></div>
                                        <h5><?php echo get_the_title($box['service_id']);?></h5>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
                
                <!-- Button Box -->
                <div class="btns-box text-center">
                    <a href="<?php echo esc_url($more_link['url']);?>" class="theme-btn btn-style-twentyfive"><span class="txt"><?php echo esc_html($btn_label);?> <i class="fa fa-arrow-circle-right"></i></span></a>
                </div>
                
            </div>
        </section>
        <!-- End Digital Section Three -->   
      <?php

              }

              protected function select_param_posts() {
                $args = wp_parse_args( [
                    'post_type'   => 'services',
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
