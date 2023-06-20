<?php

    class mgv2_postrolfio_section extends \Elementor\Widget_Base {

        public function get_name() {
            return 'mgv2_postrolfio_section';
        }

        public function get_title() {
            return __( 'Marketing V2 Portfolio', 'prysm' );
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
            
            $this->add_control(
                'description',
                [
                    'label' => __( 'Description', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
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
                    'selector'       => '{{WRAPPER}} .sec-title-six h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '50',
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
                        '{{WRAPPER}} .sec-title-six h2' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'portfolio_sub_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'portfolio Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'sub_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-six .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '15',
                            ],
                        ],
                    ],
                ]
            );

            $this->add_control(
                'portfolio_sub_color',
                [
                    'label' => esc_html__( 'portfolio Text Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .sec-title-six .title' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'portfolio_main_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pportfolio Main Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .gallery-block-three .overlay-box h4',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Fira Sans',
                        ],
                        'font_weight' => [
                            'default' => '600',
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
                'portfolio_m_ttlb_color',
                [
                    'label' => esc_html__( 'Portfolio Main Title Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-three .overlay-box h4 a' => 'color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'portfolio_m_hover_ttlb_color',
                [
                    'label' => esc_html__( 'Portfolio Main Title Hover Color', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .gallery-block-three .overlay-box h4 a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .gallery-block-three .overlay-box:before',
                ]
            );
            
            $this->end_controls_section();

        }

        protected function render() {

            $settings      = $this->get_settings_for_display();
            $subtitle   = $settings['subtitle'];
            $title   = $settings['title'];
            $description   = $settings['description'];

            $filter_list   = $settings['filter_list'];            
            $portfolio_items        = $settings['portfolio_items'];

        ?>

        <!-- Project Section Three -->
        <section class="project-section-three">
            <div class="container">
                <div class="sec-title-six">
                    <div class="big-letter"><?php echo esc_html($subtitle);?></div>
                    <div class="title"><?php echo esc_html($title);?></div>
                    <h2><?php echo __($description);?></h2>
                </div>
                
                <!-- MixitUp Galery -->
                <div class="mixitup-gallery">
                    
                    <!--Filter-->
                    <div class="filters clearfix">
                        
                        <ul class="filter-tabs filter-btns clearfix">
                            <li class="active filter" data-role="button" data-filter="all"><?php esc_html_e( 'All', 'prysm' );?></li>
                            <?php foreach($filter_list as $filter):?>
                            <li class="filter" data-role="button" data-filter=".<?php echo esc_attr($filter['category_slug']);?>"><?php echo esc_attr($filter['categore_name']);?></li>
                            <?php endforeach;?>
                        </ul>
                        
                    </div>
                    
                    <div class="filter-list row clearfix">
                    <?php foreach($portfolio_items as $item):?>
                        <!-- Gallery Block -->
                        <div class="gallery-block-three all mix <?php echo esc_attr($item['filter_cat']);?>  <?php echo esc_attr($item['portfolio_column']);?>">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="<?php echo esc_url($item['portfolio_img']['url']);?>" alt="">
                                    <!-- Overlay Box -->
                                    <div class="overlay-box">
                                        <div class="overlay-inner">
                                            <div class="content">
                                                <div class="content-inner">
                                                    <div class="category"><?php echo esc_html($item['cat_name']);?></div>
                                                    <h4><a href="<?php echo esc_url($item['portfolio_link']['url']);?>"><?php echo esc_html($item['title']);?></a></h4>
                                                    <ul class="options">
                                                        <a href="<?php echo esc_url($item['portfolio_img']['url']);?>" class="lightbox-image link"><span class="icon fa fa-play"></span></a>
                                                        <a href="<?php echo esc_url($item['portfolio_link']['url']);?>" class="link"><span class="icon fa fa-link"></span></a>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        <?php endforeach;?>
                        
                    </div>
                    
                </div>
                
            </div>
        </section>
        <!-- End Project Section Three -->

        
      <?php

              }


      }
