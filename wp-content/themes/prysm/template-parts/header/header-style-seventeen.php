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
$page_light_logo = prysm_get_meta( 'prysm_pagepost', 'page_light_logo', 'default' );
?>
<!-- Agency Header Two -->
<header class="main-header agency-header-two">
				
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
                    <div class="mobile-nav-toggler"><span class="icon"><img src="<?php echo get_template_directory_uri()?>/assets/img/menu.png" alt="" /></span></div>
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
                        <div class="search-box-btn search-box-outer"><span class="icon fal fa-search"></span></div>
                        
                        <!-- Button Box -->
                        <div class="button-box">
                            <a href="contact.html" class="theme-btn btn-style-twentyfour"><span class="txt">Get Started <i class="fa fa-arrow-circle-right"></i></span></a>
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
            <?php if(!empty($page_light_logo['url'])):?>
            <div class="logo pull-left">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($page_light_logo['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a>
            </div>
            <?php endif;?>
            <!--Right Col-->
            <div class="pull-right">
            
                <!-- Main Menu -->
                <nav class="main-menu">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
                <!-- Main Menu End-->
                
                <!-- Mobile Navigation Toggler -->
                <div class="mobile-nav-toggler"><span class="icon"><img src="<?php echo get_template_directory_uri()?>/assets/img/menu-2.png" alt="" /></span></div>
                <!-- End Mobile Navigation Toggler -->
                
            </div>
        </div>
    </div><!-- End Sticky Menu -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><span class="icon fas fa-times"></span></div>
        
        <nav class="menu-box">
            <?php if(!empty($page_light_logo['url'])):?>
            <div class="nav-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($page_light_logo['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></a></div>
            <?php endif;?>
            <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        </nav>
    </div><!-- End Mobile Menu -->

</header>
<!-- End Business Header Style Two -->
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