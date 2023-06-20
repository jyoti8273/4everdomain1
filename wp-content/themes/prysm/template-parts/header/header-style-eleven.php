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
<!-- Consult Header Style -->
<header class="main-header consult-header-style">
				
	<!-- Header Top Two -->
	<div class="header-top">
		<div class="auto-container">
			<div class="inner-container">
				<div class="clearfix">
					<!--Top Left-->
					<div class="top-left pull-left">
						<ul class="info-list">
							<?php
								if(!empty($prysm['header_11_infos'])):
								$headerinfos = $prysm['header_11_infos'];
									foreach((array)$headerinfos as $hinfo):
							?>
							<li><span class="icon"><i class="<?php echo esc_attr($hinfo['header11-icon-class']);?>"></i></span><?php echo esc_html($hinfo['header11_info_title']);?> <a href="<?php echo esc_url($hinfo['header11_infolink']);?>"><?php echo esc_html($hinfo['header11_infotxt']);?></a></li>
							<?php 
							endforeach;
							endif;
							?>
						</ul>
					</div>
					<?php
						if($prysm['topbar_socialicons']):

					?>
					<!--Top Right-->
					<div class="top-right pull-right">
						<!-- Social Box -->
						<ul class="social-box">
							<?php
								$socials = $prysm['topbar_socialicons'];
								foreach((array)$socials as $social):
							?>
							<li><a href="<?php echo esc_url($social['topbar-icon-link']['url']);?>" class="<?php echo esc_attr($social['topbar-icon-class']);?>"></a></li>
							<?php endforeach;?>
						</ul>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Header Upper -->
	<div class="header-upper">
		<div class="auto-container">
			<div class="inner-container clearfix">
			
				<!-- Logo -->
				<div class="pull-left logo-box">
					<div class="logo">
						<?php prysm_logo();?>
					</div>
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
											'container' =>'' ,
											'container_class'=> '',
											'container_id'=> '',
										)
									);
								}else{
									wp_nav_menu(
										array(
											'theme_location'=> 'header_menu',
											'menu_class'=>'navigation clearfix' ,
											'container' =>'' ,
											'container_class'=> '',
											'container_id'=> '',
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
						
						<!-- Nav Btn -->
						<div class="nav-btn navSidebar-button sidemenu-btn"><span class="icon flaticonv10-menu"></span></div>
						
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<!--End Header Upper-->
	
	<!-- Sticky Header  -->
	<div class="sticky-header">
		<div class="auto-container clearfix">
			<!--Logo-->
			<div class="logo pull-left">
				<?php prysm_logo();?>
			</div>
			<!--Right Col-->
			<div class="pull-right">
			
				<!-- Main Menu -->
				<nav class="main-menu">
					<!--Keep This Empty / Menu will come through Javascript-->
				</nav>
				<!-- Main Menu End-->
				
				<!-- Mobile Navigation Toggler -->
				<div class="mobile-nav-toggler"><span class="icon"><img src="<?php echo get_template_directory_uri();?>/assets/img/menu-2.png" alt="" /></span></div>
				
				<!-- Main Menu End-->
				<div class="outer-box clearfix">
					
					<!-- Search Btn -->
					<div class="search-box-btn search-box-outer"><span class="icon fa fa-search"></span></div>
					
					<!-- Nav Btn -->
					<div class="nav-btn navSidebar-button sidemenu-btn"><span class="icon flaticonv10-menu"></span></div>
					
				</div>
				
			</div>
		</div>
	</div><!-- End Sticky Menu -->

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
<!-- End Consult Header Style -->
<div class="search-popup">
	<button class="close-search style-two"><span class="flaticon-cancel-1"></span></button>
	<button class="close-search"><span class="fa fa-arrow-up"></span></button>
	<form method="post" action="blog.html">
		<div class="form-group">
			<input type="search" name="search-field" value="" placeholder="Search Here" required="">
			<button type="submit"><i class="fa fa-search"></i></button>
		</div>
	</form>
</div>
<!-- Sidebar Info -->
<div class="pr2-sidebar-info">
	<div class="pr2-overlay-bg"></div>
	<div class="pr2_sidebar_info_content">
		<span class="close-menu"><i class="fas fa-times"></i></span>

		<?php if(!empty($prysm['sidebar_logo']['url'])):?>
		<div class="pr2_sidebar_logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($prysm['sidebar_logo']['url']);?>" alt=""></a>
		</div>
		<?php endif;?>

		<?php if(!empty($prysm['sidebar_text'])):?>
		<div class="pr2-pera-txt">
			<p><?php echo esc_html($prysm['sidebar_text']);?></p>
		</div>
		<?php endif;?>

		<?php if(!empty($prysm['sidebar-gall-item'])):?>

			<?php 
				$gallery_opt = $prysm['sidebar-gall-item']; // for eg. 15,50,70,125
				$gallery_ids = explode( ',', $gallery_opt );
			?>
		<div class="pr2-sidebar-gallery">
			<ul>
				<?php 
						if ( ! empty( $gallery_ids ) ) {
						foreach ( $gallery_ids as $gallery_item_id ) { ?>
						<li>
							<a href="<?php echo esc_url(wp_get_attachment_url( $gallery_item_id ));?>"><?php echo wp_get_attachment_image( $gallery_item_id, 'full' );?></a>
						</li>
						
						<?php
						}
						}
				?>
			</ul>
		</div>
		<?php endif;?>
		<div class="pr2-sidebar-social">
			<div class="pr2-headline">
				<h5><?php esc_html_e( 'Follow us on', 'prysm' );?></h5>
			</div>
			<?php if(!empty($prysm['sidebar_social_info'])):?>
			<div class="pr2-social-links">
				<?php foreach($prysm['sidebar_social_info'] as $item):?>
				<a href="<?php echo esc_url($item['sidebar_icon_link']['url'])?>"><i class="<?php echo esc_attr($item['sidebar_icon'])?>"></i></a>
				<?php endforeach;?>
			</div>
			<?php endif;?>
		</div>
		<?php if(!empty($prysm['footer_copyright'])):?>
		<div class="pr2-sidebar-copyright">
			<p><?php echo __($prysm['footer_copyright']);?></p>
		</div>
		<?php endif;?>
	</div>  
</div>
<!-- Sidebar Info End -->