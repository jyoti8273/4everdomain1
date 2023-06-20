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
<!-- Header Section -->
<!-- ScrollTop Button -->
<a href="#" class="pr2-scroll-top"><i class="fas fa-angle-double-up"></i></a>

<!-- Header Top -->
<div class="pr2-header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="pr2-top-left">
                <?php
                    if(!empty($prysm['header_two_infos'])):
                        $headerinfos = $prysm['header_two_infos'];
                            foreach((array)$headerinfos as $hinfo):
                    ?>
                    <span><i class="<?php echo esc_attr($hinfo['header2-icon-class']);?>"></i><?php echo esc_html($hinfo['header2_infotxt']);?></span>
                    <?php
                    endforeach;
                endif;?>
                </div>
            </div>
            <div class="col-lg-4">
                <?php if(!empty($prysm['header_social_icon'])):?>
                <div class="pr2-top-right">
                    <?php foreach($prysm['header_social_icon'] as $icon):?>
                    <a href="<?php echo esc_url($icon['h2_link']['url']);?>"><i class="<?php echo esc_attr($icon['h2-social-icon']);?>"></i></a>
                    <?php endforeach;?>
                </div>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<!-- End of Header Top -->
<div style="height: 100px"></div>
<header id="main-header" class="main-header-area header-style-five">
            <div class="container">
                <div class="header-main-menu  clearfix">
                    <div class="site-logo float-left">
                        <?php prysm_logo();?>
                    </div>
                    <div class="main-header-menu-item float-right">
                        <nav class="main-navigation-area clearfix ul-li">
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
                        
                        <div class="header-cta-btn text-center float-right">
                        <?php if(!empty($prysm['header2_button'])):?>
                            <a href="<?php echo esc_url($prysm['header2_link']['url']);?>" class="cta"><?php echo esc_html($prysm['header2_button']);?></a>
                        <?php endif;?>
                            <a href="#" class="sidemenu-btn"><i class="fas fa-bars"></i></a>
                        </div>
                    </div>
                </div>
                <div class="str-mobile_menu relative-position">
                    <div class="str-mobile_menu_button str-open_mobile_menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <div class="str-mobile_menu_wrap">
                        <div class="mobile_menu_overlay str-open_mobile_menu"></div>
                        <div class="str-mobile_menu_content">
                            <div class="str-mobile_menu_close str-open_mobile_menu">
                                <span><i class="fas fa-times"></i></span>
                            </div>
                            <div class="m-brand-logo text-center">
                                <?php if($prysm['header_mobile_logo']['url']):?>
                                <div class="m-brand-logo text-center">
                                    <img src="<?php echo esc_url($prysm['header_mobile_logo']['url']);?>" alt="">
                                </div>
                                <?php endif;?>
                            </div>
                            <nav class="str-mobile-main-navigation clearfix ul-li">
                                <?php
                                if(true == $nav_style){
                                    wp_nav_menu(
                                        array(
                                            'theme_location'=> 'header_one_menu',
                                            'menu_class'=>'navbar-nav text-capitalize clearfix' ,
                                            'menu_id'=>'main-nav' ,
                                            'container' =>'' ,
                                            'container_class'=> '',
                                            'container_id'=> '',
                                        )
                                    );
                                }else{
                                    wp_nav_menu(
                                        array(
                                            'theme_location'=> 'header_menu',
                                            'menu_class'=>'navbar-nav text-capitalize clearfix' ,
                                            'menu_id'=>'main-nav' ,
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
                </div>
                <!-- /mobile-menu -->
            </div>
        </header>
        <!-- End of Header Section -->

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