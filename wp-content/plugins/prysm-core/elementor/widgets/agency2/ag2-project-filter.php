<?php

    class ag2_project_filter extends \Elementor\Widget_Base {

        public function get_name() {
            return 'ag2_project_filter';
        }

        public function get_title() {
            return __( 'Agency Two Project Filter', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-portfolio-full-screen';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'portfolio_content',
                [
                    'label' => __( 'Portfolio Content', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );
            $this->add_control(
                'subtitle',
                [
                    'label' => __( 'Sub Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $repeater = new \Elementor\Repeater();
        
            $repeater->add_control(
                'categore_name',
                [
                    'label' => esc_html__( 'Category Name', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                ]
            );
            
            $repeater->add_control(
                'category_slug', [
                    'label'       => esc_html__( 'Category Slug', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'filter_list',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ categore_name }}}',
                ]
            );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'portfolio_column', [
                    'label'       => esc_html__( 'Column', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'filter_cat', [
                    'label'       => esc_html__( 'Filter Category', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'cat_name', [
                    'label'       => esc_html__( 'Category', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
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
                'portfolio_link', [
                    'label'       => esc_html__( 'Link', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                ]
            );           
            $this->add_control(
                'portfolio_items',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
            
            $this->end_controls_section();

            $this->start_controls_section(
                'heading_styl',
                [
                    'label' => esc_html__( 'Portfolio Heading Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'section_it_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'fsub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
                        ],
                        'font_weight' => [
                            'default' => '500',
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
                'sub_ttl_color',
                [
                    'label' => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'main_s_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-nine h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                'main_titler_clr',
                [
                    'label' => esc_html__( 'Main Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-nine h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'portfolio_fil_style',
                [
                    'label' => esc_html__( 'portfolio Filter Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'portfolio_filter',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'portfolio Filter Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'filter_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .project-section-six .filters li',
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
                'portfolio_fl_color',
                [
                    'label' => esc_html__( 'Filter Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-section-six .filters li' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'portfolio_fl_active_color',
                [
                    'label' => esc_html__( 'Filter Acticve/Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .project-section-six .filters .filter.active, .project-section-six .filters .filter:hover' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'filter_bg_clr',
                    'label' => esc_html__( 'Active/Hover BG Color', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .project-section-six .filters li:before',
                ]
            );
            $this->end_controls_section();
            $this->start_controls_section(
                'portfolio_style',
                [
                    'label' => esc_html__( 'portfolio Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            

            $this->add_control(
                'portfolio_s_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'portfolio Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'portfolio_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-six h5',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Poppins',
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
                    'label' => esc_html__( 'portfolio Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-six h5 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'portfolio_sub_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'portfolio Category Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'cate_s_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-six .designation',
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
                'portfolio_cat_color',
                [
                    'label' => esc_html__( 'Portfolio Category Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-six .designation' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'posrtfolio_overlay_box',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Portfolio Overlay', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => esc_html__( 'Background', 'prysm' ),
                    'types' => [ 'gradient' ],
                    'exclude'  => ['image'],
                    'selector' => '{{WRAPPER}} .gallery-block-six .overlay-box:before',
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];

            $filter_list   = $settings['filter_list'];            
            $portfolio_items        = $settings['portfolio_items'];

        ?>
        <!-- Project Section Six -->
        <section class="project-section-six">
            <div class="auto-container">
                <div class="sec-title-nine centered">
                    <div class="title"><?php echo esc_html($subtitle);?></div>
                    <h2><?php echo esc_html($title);?></h2>
                </div>
                <!--Isotope Galery-->
                <div class="sortable-masonry">
                    
                    <!--Filter-->
                    <div class="filters clearfix">
                        
                        <ul class="filter-tabs filter-btns text-center clearfix">
                            <li class="active filter" data-role="button" data-filter=".all">All</li>
                            <?php foreach($filter_list as $filter):?>
                                <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($filter['category_slug']);?>"><?php echo esc_attr($filter['categore_name']);?></li>
                            <?php endforeach;?>
                        </ul>
                        
                    </div>
                    
                    <div class="items-container row clearfix">
                        
                    <?php foreach($portfolio_items as $item):?>
                        <!-- Gallery Block Six -->
                        <div class="gallery-block-six masonry-item all col-lg-4 col-md-6 col-sm-12 <?php echo esc_attr($item['filter_cat']);?>">
                            <div class="inner-box">
                                <div class="image">
                                    <img src="<?php echo esc_url($item['portfolio_img']['url']);?>" alt="" />
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <h5><a href="<?php echo esc_url($item['portfolio_link']['url']);?>"><?php echo esc_html($item['title']);?></a></h5>
                                                <div class="designation"><?php echo esc_html($item['cat_name']);?></div>
                                            </div>
                                        </div>
                                        <a href="<?php echo esc_url($item['portfolio_link']['url']);?>" class="arrow fal fa-arrow-right"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Project Section Six -->

        
      <?php

              }


      }
