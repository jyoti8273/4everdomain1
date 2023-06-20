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
<!-- Law Header Style -->
<header class="main-header law-header-style">
				
    <!-- Header Top Two -->
    <div class="header-top">
        <div class="auto-container">
            <div class="inner-container">
                <div class="clearfix">
                    <?php if($prysm['header18_top_text']):?>
                    <!-- Top Left -->
                    <div class="top-left pull-left">
                        <div class="text"><?php echo esc_html($prysm['header18_top_text']);?></div>
                    </div>
                    <?php endif;?>
                    <!-- Top Right -->
                    <div class="top-right pull-right">
                        <ul class="info-list">
                            <?php
								if(!empty($prysm['header_18_infos'])):
								$headerinfos = $prysm['header_18_infos'];
									foreach((array)$headerinfos as $hinfo):
							?>
                            <li><span class="icon"><i class="<?php echo esc_attr($hinfo['header18-icon-class']);?>"></i></span><a href="<?php echo esc_url($hinfo['header18_info_link']);?>"><?php echo esc_attr($hinfo['header18_info_title']);?></a></li>
                            <?php 
							endforeach;
							endif;
							?>
                        </ul>
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
                    <div class="mobile-nav-toggler"><span class="icon"><img src="<?php echo get_template_directory_uri()?>/assets/img/menu-2.png" alt="" /></span></div>
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
                        <?php
                            if($prysm['header_button_18_link']):
                        ?>
                        <!-- Button Box -->
                        <div class="button-box">
                            <a href="<?php echo esc_url($prysm['header_button_18_link']['url']);?>" class="theme-btn btn-style-twenty"><span class="txt"><?php echo esc_attr($prysm['header_button_18_link']['text']);?> <i class="flaticon-right-arrow"></i></span></a>
                        </div>
                        <?php endif;?>
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
                <div class="mobile-nav-toggler"><span class="icon"><img src="<?php echo get_template_directory_uri()?>/assets/img/menu-2.png" alt="" /></span></div>
                
                <!-- Main Menu End-->
                <div class="outer-box clearfix">
                    
                    <!-- Button Box -->
                    <div class="button-box">
                        <a href="#" class="theme-btn btn-style-twenty"><span class="txt">Free Consulting <i class="flaticon-right-arrow"></i></span></a>
                    </div>
                    
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
<!-- End Business Header Style Two -->