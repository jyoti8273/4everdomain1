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

<!-- Header Section Starts -->
<header class="pr6-header-section">
			<div class="pr6-info-top">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-8">
                            <?php if(!empty($prysm['header4_top_text'])):?>
							<div class="pr6-info-left">
								<p><?php echo esc_html($prysm['header4_top_text']);?></p>
							</div>
                            <?php endif;?>
						</div>
						<div class="col-md-4">
							<div class="pr6-info-right">
                                <?php if(!empty($prysm['login_link']['url'])):?>
								<a href="<?php echo esc_url($prysm['login_link']['url']);?>"><?php echo esc_html($prysm['login_text']);?></a>
                                <?php endif;?>

                                <?php if(!empty($prysm['reg_link']['url'])):?>
								<a href="<?php echo esc_url($prysm['reg_link']['url']);?>"><?php echo esc_html($prysm['reg_text']);?></a>
                                <?php endif;?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="pr6-info-content">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-2 rs-logo">
							<div class="pr6-logo-wrapper">
                                <?php prysm_logo();?>
							</div>
						</div>
						<div class="col-lg-9 col-11">
							<div class="pr6-info-area">
                            <?php
							if(!empty($prysm['header_four_infos'])):
                                $headerinfos = $prysm['header_four_infos'];
                                    foreach((array)$headerinfos as $hinfo):
                            ?>
								<div class="pr6-info-item">
									<div class="pr6-icon-wrapper">
										<i class="<?php echo esc_attr($hinfo['header4-icon-class']);?>"></i>
									</div>
									<div class="pr6-info-item-content">
										<span class="title"><?php echo esc_html($hinfo['header4_infotitle']);?></span>
										<span><?php echo esc_html($hinfo['header4_infotxt']);?></span>
									</div>
								</div>
                                <?php
								endforeach;
							endif;?>
							</div>
						</div>
						<div class="col-lg-1 col-1">
							<div class="pr6-sidebar-btn">
								<a href="#"><i class="far fa-list-ul"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="pr6-main-menu">
				<div class="container">
					<div class="pr6-header-menu">
						<div class="row align-items-center">
							<div class="col-lg-8 col-6">
								<div class="pr6-nav-menu">
                                    <?php $header_mobile_logo = $prysm['header_mobile_logo']['url']?>
                                <?php if(!empty($header_mobile_logo)) : ?>
                                    <div class="pr6-rs-logo">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($header_mobile_logo);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a>
									</div>
                                <?php endif; ?>
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
							<div class="col-lg-4 col-6">
								<div class="pr6-nav-btns">
                                    <?php if(!empty($prysm['header4_button']) || !empty($prysm['header4_link']['url'])):?>
									<div class="pr6-primary-btn">
										<a href="<?php echo esc_url($prysm['header4_link']['url']);?>"><?php echo esc_html($prysm['header4_button']);?></a>
									</div>
                                    <?php endif;?>
									<a href="#" class="pr6-mobile-menu-btn"><i class="fas fa-bars"></i></a>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Section End -->
        <!-- Mobile Navigation -->
		<div class="pr6-mobile-navigation">
			<div class="pr6-mobile-menu-wrapper">
				<a href="#" class="pr6-mobile-menu-close"><i class="fas fa-times"></i></a>
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