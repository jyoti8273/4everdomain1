<?php
$prysm = get_option( 'prysm' );

if(get_post_meta(get_the_ID(), 'prysm_pagepost', true)) {
$page_meta = get_post_meta(get_the_ID(), 'prysm_pagepost', true);
} else {
	$page_meta = array();
}

if( array_key_exists( 'nav_style', $page_meta )) {
	$nav_style = $page_meta['nav_style'];
} else {
	$nav_style = false;
}
?>
<header class="pr5-header-section">
			<div class="container position-relative">
				<div class="pr5-main-header">
					<div class="pr5-header-info-bar">
						<div class="row">
							<div class="col-lg-6 col-sm-8">
								<div class="pr5-info-left">
                                <?php
                                    if(!empty($prysm['header_three_infos'])):
                                        $headerinfos = $prysm['header_three_infos'];
                                            foreach((array)$headerinfos as $hinfo):
                                    ?>
									<span><i class="<?php echo esc_attr($hinfo['header3-icon-class']);?>"></i><?php echo esc_html($hinfo['header3_infotxt']);?></span>
                                    <?php
                                    endforeach;
                                endif;?>
								</div>
							</div>
							<div class="col-lg-6 col-sm-4">
								<div class="pr5-info-right">
                                    <?php if(!empty($prysm['login3_link']['url'])):?>
									<a href="<?php esc_url($prysm['login3_link']['url']);?>"><?php echo esc_html($prysm['login3_text']);?></a>
                                    <?php endif;?>

                                    <?php if(!empty($prysm['reg3_link']['url'])):?>
									<a href="<?php esc_url($prysm['reg3_link']['url']);?>"><?php echo esc_html($prysm['reg3_text']);?></a>
                                    <?php endif;?>
								</div>
							</div>
						</div>
					</div>
					<div class="pr5-header-navigation">
						<div class="row align-items-center">
							<div class="col-lg-3 col-6">
								<div class="pr5-logo-wrapper">
                                    <?php prysm_logo();?>
								</div>
							</div>
							<div class="col-lg-7 pr5-desktop-menu">
								<div class="pr5-main-navigation">
                                <?php
								if(true == $nav_style){
                                    wp_nav_menu(
                                        array(
                                            'theme_location'=> 'header_one_menu',
                                            'menu_class'=>'' ,
                                            'container' =>'' ,
                                            'container_class'=> '',
                                            'container_id'=> '',
                                        )
                                    );
								}else{
									wp_nav_menu(
                                        array(
                                            'theme_location'=> 'header_menu',
                                            'menu_class'=>'' ,
                                            'container' =>'' ,
                                            'container_class'=> '',
                                            'container_id'=> '',
                                        )
                                    );
								}
                                ?>
								</div>
							</div>
							<div class="col-lg-2 col-6">
								<div class="pr5-header-right">
                                    <?php if(!empty($prysm['header3_link']['url']) || !empty($prysm['header3_button'])):?>
									<div class="pr5-primary-btn">
										<a href="<?php echo esc_url($prysm['header3_link']['url']);?>"><?php echo esc_html($prysm['header3_button']);?> <i class="flaticon-right-arrow"></i></a>
									</div>
                                    <?php endif;?>
									<div class="pr5-mobile-menu-open">
										<a href="#" class="pr5-mobile-menu-open"><i class="fas fa-bars"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</header>
		<!-- Header Section End -->

		<!-- Mobile Navigation -->
		<div class="pr5-mobile-navigation">
			<div class="pr5-mobile-menu-wrapper">
				<a href="#" class="pr5-mobile-menu-close"><i class="fas fa-times"></i></a>
				<nav>
                    <?php
					if(true == $nav_style){
                        wp_nav_menu(
                            array(
                                'theme_location'=> 'header_one_menu',
                                'menu_class'=>'' ,
                                'container' =>'' ,
                                'container_class'=> '',
                                'container_id'=> '',
                            )
                        );
					}else{
						wp_nav_menu(
                            array(
                                'theme_location'=> 'header_menu',
                                'menu_class'=>'' ,
                                'container' =>'' ,
                                'container_class'=> '',
                                'container_id'=> '',
                            )
                        );
					}
                    ?>
				</nav>
			</div>
		</div>
		<!-- Mobile Navigation End -->