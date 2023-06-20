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
<!-- ScrollTop Button -->
<a href="#" class="pr3-scroll-top"><i class="fas fa-angle-double-up"></i></a>


<!-- Header Section -->
<header class="pr3-header-section">
    <div class="pr3-info-bar-container">
        <div class="container">
            <div class="pr3-info-bar">
                <div class="row align-items-center">
                    <div class="col-lg-8 col-md-7">
                        <?php if(!empty($prysm['header6_top_text'])):?>
                        <div class="pr3-info-bar-left pr3-pera-txt">
                            <p><?php echo esc_html($prysm['header6_top_text']);?></p>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="col-lg-4 col-md-5">
                        <div class="pr3-info-bar-right">
                            <?php if(!empty($prysm['reg_link']['url'])):?>
                            <a href="<?php echo esc_url($prysm['reg_link']['url']);?>"><?php echo esc_html($prysm['reg_text']);?></a>
                            <?php endif;?>

                            <?php if(!empty($prysm['login_link']['url'])):?>
                            <a href="<?php echo esc_url($prysm['login_link']['url']);?>"><?php echo esc_html($prysm['login_text']);?></a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="pr3-header-wrapper">
            <!-- Desktop Menu -->
            <div class="row align-items-center">
                <div class="col-lg-2 pr3-header-logo">
                    <?php prysm_logo();?>
                </div>
                <div class="col-lg-10 pr3-desktop-menu">
                    <div class="pr3-navigation-menu">
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
                    <div class="pr3-header-right">
                        <?php if(true == $prysm['enable-sidebar-nav']):?>
                            <span class="pr3-sidebar-btn"><i class="fal fa-list"></i></span>
                        <?php endif;?>
                        <a href="#" class="pr3-git-btn">Get in touch</a>
                    </div>
                </div>
            </div>
            <!-- Desktop Menu End -->
            
            <!-- Mobile Menu -->
            <span class="pr3-mobile-menu-open"><i class="fas fa-bars"></i></span>
            <div class="row pr3-mobile-menu">
                <nav>
                    <span class="pr3-mobile-menu-close"><i class="fas fa-times"></i></span>
                    <?php prysm_logo();?>
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
    </div>
</header>
<!-- End of Header Section -->

<!-- Sidebar Info -->
<div class="pr3-sidebar-info">
    <div class="pr3-overlay-bg"></div>
    <div class="pr3_sidebar_info_content">
        <span class="close-menu"><i class="fas fa-times"></i></span>
        <?php if(!empty($prysm['sidebar_logo']['url'])):?>
        <div class="pr3_sidebar_logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($prysm['sidebar_logo']['url']);?>" alt=""></a>
        </div>
        <?php endif;?>

        <?php if(!empty($prysm['sidebar_text'])):?>
        <div class="pr3-pera-txt">
            <p><?php echo esc_html($prysm['sidebar_text']);?></p>
        </div>
        <?php endif;?>
        <?php if(!empty($prysm['sidebar-gall-item'])):?>

        <?php 
            $gallery_opt = $prysm['sidebar-gall-item']; // for eg. 15,50,70,125
            $gallery_ids = explode( ',', $gallery_opt );
        ?>
        <div class="pr3-sidebar-gallery">
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
        <div class="pr3-sidebar-social">
            <?php if(!empty($prysm['social_title'])):?>
            <div class="pr3-headline">
                <h5><?php echo esc_html( $prysm['social_title'] );?></h5>
            </div>
            <?php endif;?>

            <?php if(!empty($prysm['sidebar_social_info'])):?>
            <div class="pr3-social-links">
                <?php foreach($prysm['sidebar_social_info'] as $item):?>
                <a href="<?php echo esc_url($item['sidebar_icon_link']['url'])?>"><i class="<?php echo esc_attr($item['sidebar_icon'])?>"></i></a>
                <?php endforeach;?>
            </div>
            <?php endif;?>
        </div>
        <?php if(!empty($prysm['footer_copyright'])):?>
        <div class="pr3-sidebar-copyright">
            <p><?php echo __($prysm['footer_copyright']);?></p>
        </div>
        <?php endif;?>
    </div>  
</div>
<!-- Sidebar Info End -->