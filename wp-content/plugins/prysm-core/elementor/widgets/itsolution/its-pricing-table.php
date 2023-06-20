<?php

    class its_pricing_table extends \Elementor\Widget_Base {

        public function get_name() {
            return 'its_pricing_table';
        }

        public function get_title() {
            return __( 'IT Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-price-list';
        }

        public function get_categories() {
            return ['prysm-category'];
        }

        protected function register_controls() {

            $this->start_controls_section(
                'pricing_table_content',
                [
                    'label' => __( 'Pricing Table', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            
            $this->add_control(
                'vector_img', [
                    'label'       => esc_html__( 'Vector Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'vector_shape', [
                    'label'       => esc_html__( 'Shape Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'sub_title', [
                    'label'       => esc_html__( 'Pricing Sub Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'title', [
                    'label'       => esc_html__( 'Title', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );        
            $this->add_control(
                'colortitle', [
                    'label'       => esc_html__( 'Color Title', 'prysm' ),
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
            $this->add_control(
                'monthly_text', [
                    'label'       => esc_html__( 'Month Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );   
            $this->add_control(
                'yearly_text', [
                    'label'       => esc_html__( 'Yearly Text', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );   
            $this->add_control(
                'pricing_count', [
                    'label'       => esc_html__( 'Pricing Count', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );        
            $this->add_control(
                'pricing_order', [
                    'label'   => esc_html__( 'Pricing Order', 'prysm' ),
                    'type'    => \Elementor\Controls_Manager::SELECT,
                    'default' => 'asc',
                    'options' => [
                        'asc'  => esc_html__( 'ASC ', 'prysm' ),
                        'desc' => esc_html__( 'DESC', 'prysm' ),
                    ],
                ]
            );
            
            
            $this->end_controls_section();

            $this->start_controls_section(
                'pricing_info_style',
                [
                    'label' => esc_html__( 'Pricing Info Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'head_sub_title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Sub Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'hed_subtitle_color',
                [
                    'label'     => esc_html__( 'Sub Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-subtitle' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'hed-subtitle_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-subtitle',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'head__title',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Heading Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'main_heading_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'main_h_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                'head_inbfo',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Info Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'h_info_color',
                [
                    'label'     => esc_html__( 'Info Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-title-area .pr20-pera-txt p' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'h_info_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-title-area .pr20-pera-txt p',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

            $this->start_controls_section(
                'pricing_style',
                [
                    'label' => esc_html__( 'Pricing Style Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            
            $this->add_control(
                'content_box_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'list Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'prysm' ),
                    'selector' => '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Background::get_type(),
                [
                    'name' => 'background',
                    'label' => __( 'Background', 'prysm' ),
                    'types' => [ 'classic', 'gradient', 'video' ],
                    'selector' => '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column',
                ]
            );
            $this->add_control(
                'padding',
                [
                    'label' => __( 'Padding', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_control(
                'pricing-title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_control(
                'p_itle_color',
                [
                    'label'     => esc_html__( 'Title Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column .pr20-pr-column-top .pr20-headline h6' => 'color: {{VALUE}} ',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'p_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column .pr20-pr-column-top .pr20-headline h6',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            
            $this->add_control(
                '_price_cur_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Price Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'price_color',
                [
                    'label'     => esc_html__( 'Price Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column .pr20-pr-column-top .pr20-headline h3' => 'color: {{VALUE}} ',
                    ],
                ]
            );


            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column .pr20-pr-column-top .pr20-headline h3',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
                        ],
                    ],
                ]
            );
            $this->add_control(
                '_pricing_list_style_',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Pricing List Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            
            
            $this->add_control(
                'pricing_list',
                [
                    'label'     => esc_html__( 'Pricing List Color', 'prysm' ),
                    'type'      => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column .pr20-pr-table-list ul li' => 'color: {{VALUE}} ',
                    ],
                ]
            );    
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'price_list_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .pr20-pricing-right .pr20-pricing-column .pr20-pr-table-list ul li',
                    'fields_options' => [
                        'typography' => [
                            'default' => 'custom',
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
                        '{{WRAPPER}} .pr20-primary-btn a' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a',
                ]
            );
            $this->add_responsive_control(
                'btn_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'color: {{VALUE}}',
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
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a:hover, .pr20-primary-btn a::before',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_border_radious',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Border::get_type(),
                [
                    'name' => 'btn_hover_border',
                    'label' => __( 'Border', 'prysm-extension' ),
                    'selector' => '{{WRAPPER}} .pr20-primary-btn a:hover',
                ]
            );
            $this->add_responsive_control(
                'btn_hover_padding',
                [
                    'label'      => esc_html__( 'Border Radius', 'prysm-extension' ),
                    'type'       => \Elementor\Controls_Manager::DIMENSIONS,
                    'size_units' => ['px', '%'],
                    'selectors'  => [
                        '{{WRAPPER}} .pr20-primary-btn a:hover' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );
            $this->end_controls_tab();
            $this->end_controls_tabs();
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $vector_img     = $settings['vector_img']['url'];
            $vector_shape   = $settings['vector_shape']['url'];
            $pricing_count  = $settings['pricing_count'];
            $pricing_order  = $settings['pricing_order'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $colortitle     = $settings['colortitle'];
            $description    = $settings['description'];
            $monthly_text   = $settings['monthly_text'];
            $yearly_text    = $settings['yearly_text'];

        ?>
        <section class="pr20-pricing-table">
            <span class="pr20-pr-shape-1"><img src="<?php echo esc_url($vector_img);?>" alt=""></span>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="pr20-pricing-left">
                            <span class="pr20-pr-shape-2"><img src="<?php echo esc_url($vector_shape);?>" alt=""></span>
                            <div class="pr20-title-area wow fadeInUp">
                                <span class="pr20-subtitle"><?php echo esc_html($sub_title);?></span>
                                <div class="pr20-headline">
                                    <h3><?php echo esc_html($title);?> <span><?php echo esc_html($colortitle);?></span></h3>
                                </div>
                                <div class="pr20-pera-txt">
                                    <p><?php echo __($description);?></p>
                                </div>
                            </div>
                            <div class="pr20-pricing-btns wow fadeInUp" data-wow-delay="0.2s">
                                <ul class="nav nav-pills">
                                    <li>
                                        <a href="#monthly" data-toggle="pill" class="active"><?php echo esc_html($monthly_text);?></a>
                                    </li>
                                    <li>
                                        <a href="#yearly" data-toggle="pill" ><?php echo esc_html($yearly_text);?></a>
                                    </li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pr20-pricing-right tab-content">
                            <div class="tab-pane show active" id="monthly">
                                <div class="row">
                                    <?php

                                    $args = array(
                                        'post_type'      => array( 'pricing_table' ),
                                        'post_status'    => 'publish',
                                        'posts_per_page' => $pricing_count,
                                        'order'          => $pricing_order,
                                    );

                                    $query = new  \WP_Query($args);

                                    if ( $query->have_posts() ) {
                                    while ( $query->have_posts() ) {
                                    $query->the_post();
                                    $idd = get_the_ID();

                                    if(get_post_meta($idd, 'prysm_pricepost', true)) {
                                        $pricing_meta = get_post_meta(get_the_ID(), 'prysm_pricepost', true);
                                    } else {
                                        $pricing_meta = array();
                                    }

                                    if( array_key_exists( 'monthly_price', $pricing_meta )) {
                                        $monthly_price = $pricing_meta['monthly_price'];
                                    } else {
                                        $monthly_price = '';
                                    }
                                    if( array_key_exists( 'price_symble', $pricing_meta )) {
                                        $price_symble = $pricing_meta['price_symble'];
                                    } else {
                                        $price_symble = '';
                                    }
                                    if( array_key_exists( 'pricing_lists', $pricing_meta )) {
                                        $pricing_lists = $pricing_meta['pricing_lists'];
                                    } else {
                                        $pricing_lists = array();
                                    }
                                    if( array_key_exists( 'pricing_button', $pricing_meta )) {
                                        $pricing_button = $pricing_meta['pricing_button'];
                                    } else {
                                        $pricing_button = '';
                                    }
                                    if( array_key_exists( 'pricing_link', $pricing_meta )) {
                                        $pricing_link = $pricing_meta['pricing_link'];
                                    } else {
                                        $pricing_link = '';
                                    }
                                    if( array_key_exists( 'pricing_shape_img', $pricing_meta )) {
                                        $pricing_shape_img = $pricing_meta['pricing_shape_img'];
                                    } else {
                                        $pricing_shape_img = '';
                                    }
                                    if( array_key_exists( 'pricing_shape2_img', $pricing_meta )) {
                                        $pricing_shape2_img = $pricing_meta['pricing_shape2_img'];
                                    } else {
                                        $pricing_shape2_img = '';
                                    }

                                    ?>
                                    <div class="col-lg-6 col-sm-5">
                                        <div class="pr20-pricing-column">
                                            <div class="pr20-pr-column-top">
                                                <span class="pr20-pr-table-shape-1"><img src="<?php echo esc_url($pricing_shape_img['url']);?>" alt=""></span>
                                                <span class="pr20-pr-table-shape-2"><img src="<?php echo esc_url($pricing_shape2_img['url']);?>" alt=""></span>
                                                <div class="pr20-headline">
                                                    <h6><?php the_title();?></h6>
                                                    <h3><?php echo esc_html($monthly_price);?><?php echo esc_html($price_symble);?></h3>
                                                </div>
                                            </div>
                                            <div class="pr20-pr-table-list">
                                                <ul>
                                                    <?php foreach($pricing_lists as $list):?>
                                                    <li><?php echo esc_html($list['pricing_item']);?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                            <div class="pr20-primary-btn">
                                                <a href="<?php echo esc_url($pricing_link['url']);?>"><?php echo esc_html($pricing_button);?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } wp_reset_query(); } ?>
                                </div>
                            </div>
                            <div class="tab-pane" id="yearly">
                                <div class="row">
                                    <?php

                                    $args = array(
                                        'post_type'      => array( 'pricing_table' ),
                                        'post_status'    => 'publish',
                                        'posts_per_page' => $pricing_count,
                                        'order'          => $pricing_order,
                                    );

                                    $query = new  \WP_Query($args);

                                    if ( $query->have_posts() ) {
                                    while ( $query->have_posts() ) {
                                    $query->the_post();
                                    $idd = get_the_ID();
                                    if(get_post_meta($idd, 'prysm_pricepost', true)) {
                                        $pricing_meta = get_post_meta(get_the_ID(), 'prysm_pricepost', true);
                                    } else {
                                        $pricing_meta = array();
                                    }

                                    if( array_key_exists( 'yearly_price', $pricing_meta )) {
                                        $yearly_price = $pricing_meta['yearly_price'];
                                    } else {
                                        $yearly_price = '';
                                    }
                                    if( array_key_exists( 'price_symble', $pricing_meta )) {
                                        $price_symble = $pricing_meta['price_symble'];
                                    } else {
                                        $price_symble = '';
                                    }
                                    if( array_key_exists( 'pricing_lists', $pricing_meta )) {
                                        $pricing_lists = $pricing_meta['pricing_lists'];
                                    } else {
                                        $pricing_lists = array();
                                    }
                                    if( array_key_exists( 'pricing_button', $pricing_meta )) {
                                        $pricing_button = $pricing_meta['pricing_button'];
                                    } else {
                                        $pricing_button = '';
                                    }
                                    if( array_key_exists( 'pricing_link', $pricing_meta )) {
                                        $pricing_link = $pricing_meta['pricing_link'];
                                    } else {
                                        $pricing_link = '';
                                    }
                                    if( array_key_exists( 'pricing_shape_img', $pricing_meta )) {
                                        $pricing_shape_img = $pricing_meta['pricing_shape_img'];
                                    } else {
                                        $pricing_shape_img = '';
                                    }
                                    if( array_key_exists( 'pricing_shape2_img', $pricing_meta )) {
                                        $pricing_shape2_img = $pricing_meta['pricing_shape2_img'];
                                    } else {
                                        $pricing_shape2_img = '';
                                    }
                                    ?>
                                    <div class="col-lg-6 col-sm-5">
                                        <div class="pr20-pricing-column">
                                            <div class="pr20-pr-column-top">
                                                <span class="pr20-pr-table-shape-1"><img src="<?php echo esc_url($pricing_shape_img['url']);?>" alt=""></span>
                                                <span class="pr20-pr-table-shape-2"><img src="<?php echo esc_url($pricing_shape2_img['url']);?>" alt=""></span>
                                                <div class="pr20-headline">
                                                    <h6><?php the_title();?></h6>
                                                    <h3><?php echo esc_html($yearly_price);?><?php echo esc_html($price_symble);?></h3>
                                                </div>
                                            </div>
                                            <div class="pr20-pr-table-list">
                                                <ul>
                                                    <?php foreach($pricing_lists as $list):?>
                                                    <li><?php echo esc_html($list['pricing_item']);?></li>
                                                    <?php endforeach;?>
                                                </ul>
                                            </div>
                                            <div class="pr20-primary-btn">
                                                <a href="<?php echo esc_url($pricing_link['url']);?>"><?php echo esc_html($pricing_button);?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } wp_reset_query(); } ?> 
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
