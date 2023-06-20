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
<a href="#" class="scrollup-mr text-center"><i class="fas fa-chevron-up"></i></a>

	
<!-- Start of header section
	============================================= -->
	<header id="pr-mark-header" class="pr-mark-main-header">
		<div class="container">
			<div class="pr-mark-header-top d-flex justify-content-between align-items-center position-relative">
                <?php
                    if(!empty($prysm['header_infos'])):
                    $headerinfos = $prysm['header_infos'];
                ?>
				<div class="pr-mark-header-top-cta ul-li">
					<ul>
                        <?php  foreach((array)$headerinfos as $hinfo):?>
						<li><i class="<?php echo esc_attr($hinfo['header-icon-class']);?>"></i> <?php echo esc_html($hinfo['header_infotxt']);?></li>
                        <?php endforeach;?>
					</ul>
				</div>
                <?php
                    endif;
                ?>
                <?php
                    if($prysm['topbar_socialicons']):
                ?>
				<div class="pr-mark-header-social d-flex">
                    <?php
                        $socials = $prysm['topbar_socialicons'];
                        foreach((array)$socials as $social):
                    ?>
                            <a class="fb-icon" href="<?php echo esc_url($social['topbar-icon-link']['url']);?>"><i class="<?php echo esc_attr($social['topbar-icon-class']);?>"></i></a>
                    <?php endforeach;?>
				</div>
                <?php endif;?>
			</div>
			<div class="pr-mark-main-navigation-wrapper d-flex justify-content-between position-relative">
				<div class="pr-mark-brand-logo">
                    <?php prysm_logo();?>
				</div>
				<div class="pr-mark-navigation-menu d-flex align-items-center">
					<nav class="pr-main-navigation  clearfix ul-li">                        
                        <?php
                            if(true == $nav_style){
                                wp_nav_menu(
                                    array(
                                        'theme_location'=> 'header_one_menu',
                                        'menu_class'=>'nav navbar-nav clearfix' ,
                                        'menu_id'=>'pr-main-nav' ,
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
                                        'menu_id'=>'pr-main-nav' ,
                                        'container' =>'' ,
                                        'container_class'=> '',
                                        'container_id'=> '',
                                    )
                                );
                            }
                            ?>
					</nav>
                    <?php
                        if($prysm['header_button_link']):
                    ?>
					<div class="pr-mark-btn text-center">
                        <a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url($prysm['header_button_link']['url']);?>">
                            <?php echo esc_attr($prysm['header_button_link']['text']);?>
                        </a>
					</div>
                    <?php endif;?>
				</div>
			</div>
            
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
                            <?php prysm_logo();?>
						</div>
						<nav class="mobile-main-navigation  clearfix ul-li">
                            <?php
                            if(true == $nav_style){
                                
                                $pas_m_menu = wp_nav_menu(
                                    
                                    array(
                                        'theme_location'=> 'header_one_menu',
                                        'menu_class'=>'navbar-nav text-capitalize clearfix' ,
                                        'menu_id'=>'m-main-nav' ,
                                        'container' =>'' ,
                                        'container_class'=> '',
                                        'container_id'=> '',
                                        'echo' => false
                                    )
                                );
                                $pas_m_menu = str_replace('<a', '<a class=""', $pas_m_menu);
                                $pas_m_menu = str_replace('<li', '<li class=""', $pas_m_menu);
                                echo wp_kses_post($pas_m_menu);
                                
                            }else{
                                $pas_m_menu = wp_nav_menu(
                                    
                                    array(
                                        'theme_location'=> 'header_menu',
                                        'menu_class'=>'navbar-nav text-capitalize clearfix' ,
                                        'menu_id'=>'m-main-nav' ,
                                        'container' =>'' ,
                                        'container_class'=> '',
                                        'container_id'=> '',
                                        'echo' => false
                                    )
                                );
                                $pas_m_menu = str_replace('<a', '<a class=""', $pas_m_menu);
                                $pas_m_menu = str_replace('<li', '<li class=""', $pas_m_menu);
                                echo wp_kses_post($pas_m_menu);
                            }
                            ?>
						</nav>
					</div>
				</div>
				<!-- /Mobile-Menu -->
			</div>
		</div>
	</header>