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
<!-- Main Header -->
<header class="main-header">
			
			<!-- Header Upper -->
			<div class="header-upper">
				<div class="auto-container">
					<div class="inner-container clearfix">
					
						<!-- Logo -->
						<div class="pull-left logo-box">
							<div class="logo"><?php prysm_logo();?></div>
						</div>
					
						<div class="nav-outer clearfix">
							<!-- Mobile Navigation Toggler -->
							<div class="mobile-nav-toggler"><span class="icon"><img src="<?php echo get_template_directory_uri();?>/assets/img/menu.png" alt="" /></span></div>
							<!-- Main Menu -->
							<nav class="main-menu navbar-expand-md">
								<div class="navbar-header">
									<!-- Toggle Button -->    	
									<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								
								<div class="navbar-collapse collapse clearfix" id="navbarSupportedContent">
								<?php
								if(true == $nav_style){
									
                                    wp_nav_menu(
                                        array(
                                            'theme_location'=> 'header_one_menu',
                                            'menu_class'=>'navigation clearfix' ,
                                        )
                                    );
								}else{
									wp_nav_menu(
                                        array(
                                            'theme_location'=> 'header_menu',
                                            'menu_class'=>'navigation clearfix' ,
                                        )
                                    );
								}	
                                   
                                ?>
									
								</div>
							</nav>
							
							<!-- Main Menu End-->
							<div class="outer-box clearfix">
								
								<!-- Search Btn -->
								<div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>
								<?php
									if($prysm['header_button_link']):
								?>
								<!-- Btn Box -->
								<div class="btn-box">
									<a href="<?php echo esc_url($prysm['header_button_link']['url']);?>" class="theme-btn btn-style-one"><span class="txt"><?php echo esc_attr($prysm['header_button_link']['text']);?></span></a>
								</div>
								<?php endif;?>
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<!--End Header Upper-->
			
		
			<!-- Mobile Menu  -->
			<div class="mobile-menu">
				<div class="menu-backdrop"></div>
				<div class="close-btn"><span class="icon fas fa-times"></span></div>
				
				<nav class="menu-box">
					<div class="nav-logo"><?php prysm_logo();?></div>
					<div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
				</nav>
			</div><!-- End Mobile Menu -->
		
		</header>
		<!-- End Main Header -->

		<!-- Search Popup -->
		<div class="search-popup-drk hm-v-9">
			<button class="close-search style-two"><span class="flaticon-cancel-1"></span></button>
			<button class="close-search"><span class="fa fa-arrow-up"></span></button>
			<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<div class="form-group">
					<input type="search" name="s" id="search" value="<?php the_search_query();?>" placeholder="<?php esc_html_e( 'Search Here', 'prysm' )?>" required="">
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
			</form>
		</div>
		<!-- End Header Search -->