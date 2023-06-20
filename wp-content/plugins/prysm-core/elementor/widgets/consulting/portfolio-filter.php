<?php

    class con_portfolio_item extends \Elementor\Widget_Base {

        public function get_name() {
            return 'con_portfolio_item';
        }

        public function get_title() {
            return __( 'Consulting Portfolio', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-gallery-grid';
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
            'portfolios',
            [
                'label'       => __( 'Add Item', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
            ]
        );
        $this->add_control(
            'project_btn', [
                'label'       => esc_html__( 'Button Label', 'prysm' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'btn_link', [
                'label'       => esc_html__( 'All Link', 'prysm' ),
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
            'title_style',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Title Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__( 'Title Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .content h4' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'sub_title_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .content h4',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Poppins',
                    ],
					'font_weight' => [
						'default' => '400',
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
            'service_info',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Info Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'desc_color',
            [
                'label'     => esc_html__( 'Description Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .content p' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'desc_typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .content p',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
                    ],
					'font_weight' => [
						'default' => '400',
					],
					'font_size'   => [
						'default' => [
							'size' => '14',
						],
					],
				],
            ]
        );
        $this->add_control(
            'service_btn',
            [
                'type'      => \Elementor\Controls_Manager::HEADING,
                'label'     => esc_html__( 'Service Btn Style', 'prysm' ),
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label'     => esc_html__( 'Button Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label'     => esc_html__( 'Button Hover Color', 'prysm' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view:hover' => 'color: {{VALUE}} ',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name'           => 'btn__typography',
                'label'          => esc_html__( 'Typography', 'prysm' ),
                'selector'       => '{{WRAPPER}} .right-choice-section .section-wrapper .caption .hover-view',
                'fields_options' => [
					'font_family' => [
                        'default' => 'Roboto',
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
        $this->end_controls_section();

        }

        protected function render() {

            $settings             = $this->get_settings_for_display();
            $filter_list          = $settings['filter_list'];
            $portfolios           = $settings['portfolios'];
            $project_btn          = $settings['project_btn'];
            $btn_link             = $settings['btn_link'];

        ?>
        <section class="project-section section-padding">
            <div class="container text-center">

                <div class="portfolio gallery-grid">
                    <ul class="portfolio-sorting gallery-button">                        
                        <li><a href="#" data-group="all" class="filter-btn active">All</a></li>

                        <?php foreach($filter_list as $filter):?>
                        <li><a class="filter-btn" href="#" data-group="<?php echo esc_attr($filter['category_slug']);?>"><?php echo esc_html($filter['categore_name']);?></a></li>
                        <?php endforeach;?>
                    </ul> 

                    <div class="row">
                        <div class="gallery-wrapper">
                            <ul class="portfolio-items list-unstyled" id="grid">
                                <?php foreach($portfolios as $item):?>
                                <li class="col-sm-4" data-groups='["<?php echo esc_attr($item['filter_cat']);?>"]'>
                                    <div class="project-wrapper">
                                        <img src="<?php echo esc_url($item['portfolio_img']['url']);?>" alt="<?php echo esc_attr($item['portfolio_img']['alt']);?>">

                                        <div class="hover-view">
                                            <a href="<?php echo esc_url($item['portfolio_link']['url']);?>" class="float-right"><i class="fa fa-link" aria-hidden="true"></i></a>

                                            <h4><?php echo esc_html($item['title']);?></h4>
                                            <p><?php echo esc_html($item['cat_name']);?></p>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>
                            </ul> 
                        </div> 
                    </div>
                </div>
                 <?php if($btn_link['url']):?>                       
                <div class="link text-center">
                    <a href="<?php echo esc_url($btn_link['url']);?>" class="btn con-main-btn"> <?php echo esc_html($project_btn);?></a>
                </div>
                <?php endif;?>
            </div> 
        </section> <!-- project-section -->
      <?php

              }



      }
