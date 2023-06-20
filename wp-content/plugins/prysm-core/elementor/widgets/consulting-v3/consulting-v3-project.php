<?php

    class constv3_casestudy_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'constv3_casestudy_section';
        }

        public function get_title() {
            return __( 'Consulting V3 Case Study', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-project-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'case_content',
                [
                    'label' => __( 'Case Study Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Sub Main Title', 'prysm' ),
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
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'classic' ],
                    'exclude'  => ['color'],
                    'selector' => '{{WRAPPER}} .sec-title-five .title:before',
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'portfolio_id', [
                    'label'       => esc_html__( 'Select portfolio', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'label_block' => true,
                    'options'     => $this->select_param_posts(),
                ]
            );            
            $repeater->add_control(
                'portfolio_img', [
                    'label'       => esc_html__( 'Portfolio Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );            
            $repeater->add_control(
                'cate_name', [
                    'label'       => esc_html__( 'project Excerpt', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );            
            $this->add_control(
                'portfolio_items',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                ]
            );
            $this->add_control(
                'mor_text', [
                    'label'       => esc_html__( 'More Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            ); 
            $this->add_control(
                'more_link_label', [
                    'label'       => esc_html__( 'More Button Text', 'prysm' ),
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
                'casestydy_style',
                [
                    'label' => esc_html__( 'Casestudy Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'section_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Section Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'project_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'sub_title_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-five .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_heading_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'heading_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '36',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'main_heading_color',
                [
                    'label' => esc_html__( 'Heading Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-five h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_text_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'heading_txt_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-five .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'hd_text_color',
                [
                    'label' => esc_html__( 'Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-five .text' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_cate_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Category Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'project_cat_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .case-block .inner-box .overlay-box h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '20',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'hd_cat_color',
                [
                    'label' => esc_html__( 'Cate Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-block .inner-box .overlay-box h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'project_title_clr',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'project_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .case-block .inner-box .overlay-box .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '400',
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
                'hd_title_color',
                [
                    'label' => esc_html__( 'Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .case-block .inner-box .overlay-box .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings         = $this->get_settings_for_display();
            $sub_title        = $settings['sub_title'];
            $maintitle        = $settings['maintitle'];
            $mor_text         = $settings['mor_text'];
            $more_link_label  = $settings['more_link_label'];
            $more_link        = $settings['more_link'];
            $portfolio_items   = $settings['portfolio_items'];

        ?>
        <!-- Case Section -->
        <section class="case-section">
            <div class="container">
                <div class="sec-title-five">
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="title">Case studies</div>
                            <h2>We Have Completed More <br> Than 34,000+ Projects </h2>
                        </div>
                        <div class="pull-right">
                            <div class="text">On the other hand we denounce with righteous indignation and dislike <br> men who are so beguiled and demoralized by & charms of pleasure of <br> the moment so blinded. Lorem ipsum dolor</div>
                        </div>
                    </div>
                </div>
                <div class="case-carousel owl-carousel owl-theme">
                <?php $shape = 0; foreach($portfolio_items as $index => $box): $shape++;?>
                <?php  if( $box['portfolio_id'] ) : ?>
                    <!-- Case Block -->
                    <div class="case-block">
                        <div class="inner-box">
                            <div class="image">
                                <a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><img src="<?php echo esc_url($box['portfolio_img']['url']);?>" alt="" /></a>
                            </div>
                            <div class="overlay-box">
                                <a href="<?php echo get_the_permalink($box['portfolio_id']);?>" class="arrow flaticon-right-arrow-2"></a>
                                <div class="title"><?php echo get_the_title($box['portfolio_id']);?></div>
                                <h5><a href="<?php echo get_the_permalink($box['portfolio_id']);?>"><?php echo $box['cate_name'];?></a></h5>
                            </div>
                        </div>
                    </div>
                    <?php endif; endforeach;?>
                </div>
            </div>
        </section>
        <!-- End Case Section -->
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
