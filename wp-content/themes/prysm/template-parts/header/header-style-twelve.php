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
<!-- Business Header Style Two -->
<header class="main-header business-header-style-two">
				
    <!-- Header Top Two -->
    <div class="header-top-two">
        <div class="auto-container">
            <div class="inner-container">
                <div class="clearfix">
                    <!--Top Left-->
                    <div class="top-left pull-left">
                        <ul class="info-list">
                            <?php
								if(!empty($prysm['header_12_infos'])):
								$headerinfos = $prysm['header_12_infos'];
									foreach((array)$headerinfos as $hinfo):
							?>
                            <li><span class="icon"><i class="<?php echo esc_attr($hinfo['header12-icon-class']);?>"></i></span><a href="<?php echo esc_url($hinfo['header12_info_link']);?>"><?php echo esc_html($hinfo['header12_info_title']);?></a></li>
                            <?php 
							endforeach;
							endif;
							?>
                        </ul>
                    </div>

                    <!--Top Right-->
                    <div class="top-right pull-right">
                        <?php if(!empty($prysm['sidebar_social_info_12'])):?>
                        <!-- Social Box -->
                        <ul class="social-box">
                        <?php foreach($prysm['sidebar_social_info_12'] as $icon):?>
                            <li><a href="<?php echo esc_url($icon['sidebar_icon_link']['url']);?>"><i class="<?php echo esc_attr($icon['sol_icon']);?>"></i></a></li>
                        <?php endforeach;?>
                        </ul>
                        <?php endif;?>
                    </div>
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
                        
                        <!-- Button Box -->
                        <div class="button-box">
                            <a href="#" class="theme-btn btn-style-ten"><span class="txt">Get A Quote</span></a>
                        </div>
                        
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
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sitemobilelogo);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a>
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
                    
                </div>
                
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fas fa-times"></span></div>
        
        <nav class="menu-box">
            <div class="nav-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($sitemobilelogo);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a></div>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
<!-- End Business Header Style Two -->
<!-- Search Popup -->
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
<!-- End Header Search -->