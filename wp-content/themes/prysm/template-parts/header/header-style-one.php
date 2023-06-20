<?php

$prysm = get_option( 'prysm' );

if(!empty($prysm['header_logo']) ){
    $sitelogo = $prysm['header_logo']['url'];
 } else{
     $sitelogo =  get_template_directory_uri(). "/assets/img/logo/logo1.png";
} if(!empty($prysm['header_mobile_logo'])){
    $sitemobilelogo = $prysm['header_mobile_logo']['url'];
} else{
    $sitemobilelogo = get_template_directory_uri(). "/assets/img/logo/logo2.png";
}

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
<div class="up-top">
	<a href="#" class="scrollup-one text-center"><i class="fas fa-chevron-up"></i></a>
</div>
<header id="pry-header" class="pry-main-header header-syle-one">
		<?php if(!empty($prysm['topbar_show']) == 1 ) : ?>
		<div class="header-top">
			<div class="container">
				<div class="header-top-content d-flex justify-content-between pera-content align-items-center">
					<?php if($prysm['topbar_text']):?>
						<div class="header-top-text">
							<p><?php echo esc_html($prysm['topbar_text']);?></p>
						</div>
					<?php
						endif;
						if($prysm['topbar_socialicons']):

					?>
						<div class="social-item">
							<?php
								$socials = $prysm['topbar_socialicons'];
								foreach((array)$socials as $social):
							?>
									<a class="fb-icon" href="<?php echo esc_url($social['topbar-icon-link']['url']);?>"><i class="<?php echo esc_attr($social['topbar-icon-class']);?>"></i></a>
							<?php endforeach;?>
						</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php endif;?>
		<div class="header-cta-content">
			<div class="container">
				<div class="header-logo-cta-area d-flex">
					<div class="brand-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sitelogo);?>" alt="logo"></a>
					</div>
					<div class="header-cta-wrapper d-flex">
						<?php
							if(!empty($prysm['header_infos'])):
							$headerinfos = $prysm['header_infos'];
								foreach((array)$headerinfos as $hinfo):
						?>
						<div class="pr-header-info-item d-flex align-items-center position-relative">
							<div class="hd-item-icon">
								<i class="<?php echo esc_attr($hinfo['header-icon-class']);?>"></i>
							</div>
							<div class="hd-item-meta">
								<label><?php echo esc_html($hinfo['header_infotitle']);?></label>
								<span><?php echo esc_html($hinfo['header_infotxt']);?></span>
							</div>
						</div>
						<?php
							endforeach;
							endif;
							if(!empty($prysm['header_language'])):
								$headerlangs = $prysm['header_language'];
								$i=1;
								foreach((array)$headerlangs as $hlang):
						?>
						<?php if($i == 1):?>
						<div class="pr-language-select d-flex align-items-center  ul-li-block position-relative">

								<div class="pr-lang-img">
									<img src="<?php echo esc_url($hlang['header_lan_img']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
								</div>
								<div class="pr-lang-text headline">
									<span><?php echo esc_html($prysm['header_lang_title']);?></span>
									<h3><?php echo esc_html($hlang['header_lan_lnk']['text']);?></h3>
								</div>
							<?php
								endif;
								if($i == 2):
							?>
							<ul>
							<?php
								endif;
								if($i > 1):
							?>
								<li>
									<a href="<?php echo esc_url($hlang['header_lan_lnk']['url']);?>"><img src="<?php echo esc_url($hlang['header_lan_img']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>" ><?php echo esc_html($hlang['header_lan_lnk']['text']);?></a>
								</li>
								<?php endif; $i=$i+1; endforeach; endif;?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if(has_nav_menu( 'header_menu' )) : ?>
		<div class="header-navigation-area">
			<div class="container">
				<div class="header-navigation-content align-items-center d-flex">
					<nav class="pr-main-navigation clearfix ul-li">
						<?php
							if(true == $nav_style){
								wp_nav_menu(
									array(
										'theme_location'=> 'header_one_menu',
										'menu_class'=>'nav navbar-nav clearfix' ,
										'container' =>'' ,
										'container_class'=> '',
										'container_id'=> '',
									)
								);
							}else{
								wp_nav_menu(
									array(
										'theme_location'=> 'header_menu',
										'menu_class'=>'nav navbar-nav clearfix' ,
										'container' =>'' ,
										'container_class'=> '',
										'container_id'=> '',
									)
								);
							}
							
						?>
					</nav>
					<?php if( !empty($prysm['header_right_show']) ): ?>
					<div class="pr-header-cta-btn-search align-items-center d-flex">
						<?php if( !empty($prysm['header_search_show'] )) : ?>
						<div class="pr-h-search">
							<button class="search-box-outer"><i class="far fa-search"></i></button>
						</div>
						<?php
							endif;
							if($prysm['header_button_link']):
						?>
							<div class="pr-h-cta-btn d-flex justify-content-center align-items-center">
								<a href="<?php echo esc_url($prysm['header_button_link']['url']);?>">
									<?php echo esc_attr($prysm['header_button_link']['text']);?>
									<i class="far fa-long-arrow-right"></i>
								</a>
							</div>
						<?php endif;?>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="mobile_menu position-relative">
			<div class="mobile_menu_button open_mobile_menu">
				<i class="fal fa-bars"></i>
			</div>
			<div class="mobile_menu_wrap">
				<div class="mobile_menu_overlay open_mobile_menu"></div>
				<div class="mobile_menu_content">
					<div class="mobile_menu_close open_mobile_menu">
						<i class="fal fa-times"></i>
					</div>
					<div class="m-brand-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sitemobilelogo);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a>
					</div>
					<nav class="mobile-main-navigation  clearfix ul-li">

						<?php
									if(true == $nav_style){
										if(has_nav_menu( 'header_one_menu' )){
											$pas_one_menu = wp_nav_menu(
												array(
													'theme_location'=> 'header_one_menu',
													'menu_class'=>'nav navbar-nav clearfix' ,
													'container' =>'' ,
													'container_class'=> '',
													'container_id'=> '',
													'echo' => false
												)
											);
											$pas_one_menu = str_replace('<a', '<a class=""', $pas_one_menu);
											$pas_one_menu = str_replace('<li', '<li class=""', $pas_one_menu);
											echo wp_kses_post($pas_one_menu);
										}
										elseif(is_user_logged_in()){
											echo '<ul class="navbar-nav text-capitalize clearfix">
													<li>
														<a href="'.site_url().'/wp-admin/nav-menus.php">Set Menu</a>
													</li>
												  </ul>';
										}
									}else{
										if(has_nav_menu( 'header_one_menu' )){
										$pas_one_menu = wp_nav_menu(
											array(
												'theme_location'=> 'header_menu',
												'menu_class'=>'nav navbar-nav clearfix' ,
												'container' =>'' ,
												'container_class'=> '',
												'container_id'=> '',
												'echo' => false
											)
										);
										$pas_one_menu = str_replace('<a', '<a class=""', $pas_one_menu);
										$pas_one_menu = str_replace('<li', '<li class=""', $pas_one_menu);
										echo wp_kses_post($pas_one_menu);
										}
										elseif(is_user_logged_in()){
											echo '<ul class="navbar-nav text-capitalize clearfix">
													<li>
														<a href="'.site_url().'/wp-admin/nav-menus.php">Set Menu</a>
													</li>
												  </ul>';
										}
									}
									
								?>
					</nav>
				</div>
			</div>
			<!-- /Mobile-Menu -->
		</div>
		<?php if(!empty($sitemobilelogo)) : ?>
		<div class="mobile_logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sitemobilelogo);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a>
		</div>
		<?php endif; ?>
	</header>
	<?php if(!empty($prysm['header_search_show'])):?>
	<div class="search-popup">
		<button class="close-search style-two d-none"><span class="fal fa-times"></span></button>
		<button class="close-search"><span class="fa fa-arrow-up"></span></button>
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
			<div class="form-group">
				<input name="s" value="<?php echo get_search_query(); ?>" class="search-form__input" type="text" placeholder="<?php esc_attr_e('Search Here', 'prysm'); ?>" required />
				<button type="submit"><i class="fa fa-search"></i></button>
			</div>
		</form>
	</div>
	<?php endif;?>

<!-- End of header section
	============================================= -->