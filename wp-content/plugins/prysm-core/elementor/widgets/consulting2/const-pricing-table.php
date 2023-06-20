<?php

    class const_pricing_table extends \Elementor\Widget_Base {

        public function get_name() {
            return 'const_pricing_table';
        }

        public function get_title() {
            return __( 'Consulting V2 Pricing Table', 'prysm' );
        }

        public function get_icon() {
            return 'eicon-price-table';
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
                'description', [
                    'label'       => esc_html__( 'Description', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXTAREA,
                    'label_block' => true,
                ]
            );    
            $repeater = new \Elementor\Repeater();   
            $repeater->add_control(
                'number',
                [
                    'label' => __( 'Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'label_block' => true,
                ]
            );
            $repeater->add_control(
                'title',
                [
                    'label' => __( 'Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'progressbar',
                [
                    'label'       => __( 'Add Item', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::REPEATER,
                    'fields'      => $repeater->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );    
            $this->add_control(
                'phone_icon',
                [
                    'label' => __( 'Icon', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            
            $this->add_control(
                'call_title',
                [
                    'label' => __( 'Call Title', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'call_no',
                [
                    'label' => __( 'Phone Number', 'prysm' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'pricing_img', [
                    'label'       => esc_html__( 'Pricing Image', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::MEDIA,
                ]
            );   
            $this->add_control(
                'personal', [
                    'label'       => esc_html__( 'Personal Tab', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );   
            $this->add_control(
                'advance', [
                    'label'       => esc_html__( 'Advance Tab', 'prysm' ),
                    'type'        => \Elementor\Controls_Manager::TEXT,
                ]
            );   
            $this->add_control(
                'profesonal', [
                    'label'       => esc_html__( 'Profesonal Tab', 'prysm' ),
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
                    'label' => esc_html__( 'Pricing Style', 'prysm' ),
                    'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
                ]
            );
            $this->add_control(
                'discover_sb_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Discover Box Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_sub_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-three .title',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Inter',
                        ],
                        'font_weight' => [
                            'default' => '700',
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
                'agsection_title_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Title Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_title_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-three h2',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Oswald',
                        ],
                        'font_weight' => [
                            'default' => '700',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '60',
                            ],
                        ],
                    ],
                ]
            );
            $this->add_control(
                'agsection_text_style',
                [
                    'type'      => \Elementor\Controls_Manager::HEADING,
                    'label'     => esc_html__( 'Text Style', 'prysm' ),
                    'separator' => 'before',
                ]
            );
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name'           => 'agsection_text_typography',
                    'label'          => esc_html__( 'Typography', 'prysm' ),
                    'selector'       => '{{WRAPPER}} .sec-title-three .text',
                    'fields_options' => [
                        'font_family' => [
                            'default' => 'Roboto',
                        ],
                        'font_weight' => [
                            'default' => '400',
                        ],
                        'font_size'   => [
                            'default' => [
                                'size' => '18',
                            ],
                        ],
                    ],
                ]
            );
            $this->end_controls_section();

        }

        protected function render() {

            $settings       = $this->get_settings_for_display();
            $pricing_count  = $settings['pricing_count'];
            $pricing_order  = $settings['pricing_order'];
            $sub_title      = $settings['sub_title'];
            $title          = $settings['title'];
            $description    = $settings['description'];
            $personal       = $settings['personal'];
            $advance        = $settings['advance'];
            $profesonal     = $settings['profesonal'];
            $progressbar    = $settings['progressbar'];
            $call_no        = $settings['call_no'];
            $call_title     = $settings['call_title'];
            $phone_icon     = $settings['phone_icon'];
            $pricing_img    = $settings['pricing_img'];
        ?>
        <!-- Strike Section -->
			<section class="strike-section">
				<div class="auto-container">
					<div class="row clearfix">
					
						<!-- Content Column -->
						<div class="content-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner-column">
								<!-- Sec Title Three -->
								<div class="sec-title-three">
									<div class="title"><?php echo esc_html($sub_title);?></div>
									<h2><?php echo __($title);?></h2>
									<div class="text"><?php echo esc_html($description);?></div>
								</div>
								
								<!-- Skills -->
								<div class="skills-two">
                                    <?php foreach($progressbar as $item):?>
									<!-- Skill Item -->
									<div class="skill-item">
										<div class="skill-header clearfix">
											<div class="skill-title"><?php echo esc_html($item['title']);?></div>
											<div class="skill-percentage"><div class="count-box"><span class="count-text" data-speed="2000" data-stop="<?php echo esc_attr($item['number']);?>"><?php echo esc_attr($item['number']);?></span>%</div></div>
										</div>
										<div class="skill-bar">
											<div class="bar-inner"><div class="bar progress-line wow fadeInLeft animated" data-width="<?php echo esc_attr($item['number']);?>" style="width:<?php echo esc_attr($item['number']);?>%"></div></div>
										</div>
									</div>
									<?php endforeach;?>
								</div>
								
								<!-- Phone Box -->
								<div class="phone-box">
									<div class="box-inner">
										<span class="icon"><i class="<?php echo esc_attr($phone_icon);?>"></i></span>
										<i><?php echo esc_html($call_title);?></i>
										<strong><?php echo esc_html($call_no);?></strong>
									</div>
								</div>
								<!-- End Phone Box -->
								
							</div>
						</div>
						
						<!-- Tab Column -->
						<div class="tab-column col-lg-6 col-md-12 col-sm-12">
							<div class="inner-column">
								<div class="image">
									<img src="<?php echo esc_url($pricing_img['url']);?>" alt="" />
								</div>
								
								<!-- Strike Info Tabs -->
								<div class="strike-info-tabs">
									<!-- Strike Tabs -->
									<div class="strike-tabs tabs-box">
									
										<!--Tab Btns-->
										<ul class="tab-btns tab-buttons clearfix">
											<li data-tab="#prod-personal" class="tab-btn active-btn"><?php echo esc_html($personal);?></li>
											<li data-tab="#prod-advance" class="tab-btn"><?php echo esc_html($advance);?></li>
											<li data-tab="#prod-professional" class="tab-btn"><?php echo esc_html($profesonal);?></li>
										</ul>
										
										<!--Tabs Container-->
										<div class="tabs-content">
											
											<!-- Tab / Active Tab -->
											<div class="tab active-tab" id="prod-personal">
												<div class="content">
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
                                                    if( array_key_exists( 'month_preod', $pricing_meta )) {
                                                        $month_preod = $pricing_meta['month_preod'];
                                                    } else {
                                                        $month_preod = '';
                                                    }

                                                    ?>
													<!-- Price block Two -->
													<div class="price-block-two">
														<div class="inner-box">
															<div class="title"><?php echo esc_html($personal);?></div>
															<div class="price">
                                                                <?php echo esc_html($price_symble);?><?php echo esc_html($monthly_price);?>
																<span><?php echo esc_html($month_preod);?></span>
															</div>
															<ul class="price-list">
                                                                <?php foreach($pricing_lists as $list):?>
                                                                <li><?php echo esc_html($list['pricing_item']);?></li>
                                                                <?php endforeach;?>
															</ul>
															<div class="button-box">
																<a href="<?php echo esc_url($pricing_link['url']);?>" class="theme-btn btn-style-four"><span class="txt"><?php echo esc_html($pricing_button);?></span></a>
															</div>
														</div>
													</div>
													<?php } wp_reset_query(); } ?>
												</div>
											</div>
											
											<!-- Tab -->
											<div class="tab" id="prod-advance">
												<div class="content">
													<!-- Price block Two -->
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
                                                    if( array_key_exists( 'month_preod', $pricing_meta )) {
                                                        $month_preod = $pricing_meta['month_preod'];
                                                    } else {
                                                        $month_preod = '';
                                                    }

                                                    ?>
													<div class="price-block-two">
														<div class="inner-box">
															<div class="title"><?php echo esc_html($advance);?></div>
															<div class="price">
                                                                <?php echo esc_html($price_symble);?><?php echo esc_html($yearly_price);?>
																<span><?php echo esc_html($month_preod);?></span>
															</div>
															<ul class="price-list">
                                                                <?php foreach($pricing_lists as $list):?>
                                                                <li><?php echo esc_html($list['pricing_item']);?></li>
                                                                <?php endforeach;?>
															</ul>
															<div class="button-box">
                                                                <a href="<?php echo esc_url($pricing_link['url']);?>" class="theme-btn btn-style-four"><span class="txt"><?php echo esc_html($pricing_button);?></span></a>
															</div>
														</div>
													</div>
                                                    <?php } wp_reset_query(); } ?>
												</div>
											</div>
											
											<!-- Tab -->
											<div class="tab" id="prod-professional">
												<div class="content">
													<!-- Price block Two -->
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

                                                    if( array_key_exists( 'profesonal_price', $pricing_meta )) {
                                                        $profesonal_price = $pricing_meta['profesonal_price'];
                                                    } else {
                                                        $profesonal_price = '';
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
                                                    if( array_key_exists( 'month_preod', $pricing_meta )) {
                                                        $month_preod = $pricing_meta['month_preod'];
                                                    } else {
                                                        $month_preod = '';
                                                    }

                                                    ?>
													<div class="price-block-two">
														<div class="inner-box">
															<div class="title"><?php echo esc_html($profesonal);?></div>
															<div class="price">
                                                                <?php echo esc_html($price_symble);?><?php echo esc_html($profesonal_price);?>
																<span><?php echo esc_html($month_preod);?></span>
															</div>
															<ul class="price-list">
                                                                <?php foreach($pricing_lists as $list):?>
                                                                <li><?php echo esc_html($list['pricing_item']);?></li>
                                                                <?php endforeach;?>
															</ul>
															<div class="button-box">
                                                                <a href="<?php echo esc_url($pricing_link['url']);?>" class="theme-btn btn-style-four"><span class="txt"><?php echo esc_html($pricing_button);?></span></a>
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
						</div>
						
					</div>
				</div>
			</section>
			<!-- End Strike Section -->

      <?php

              }

      }
