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
<header class="pr20-header-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-sm-6">
                        <div class="pr20-logo-wrapper">
                            <?php prysm_logo();?>
                        </div>
                    </div>
                    <div class="col-lg-6 pr20-desktop-menu">
                        <div class="pr20-nav-menu">
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
                    <div class="col-lg-3 col-sm-6">
                        <div class="pr20-header-right">
                            <?php if(true == $prysm['enable-sidebar-nav']):?>
                            <div class="pr20-sidebar-btn">
                                <span class="pr20-sidebar-menu-open"><i class="fas fa-bars"></i></span>
                            </div>
                            <?php endif;?>
                            
                            <?php
							if($prysm['header_button_link']):
						    ?>
                            <div class="pr20-primary-btn">
                                <a href="<?php echo esc_url($prysm['header_button_link']['url']);?>"><?php echo esc_attr($prysm['header_button_link']['text']);?></a>
                            </div>
                            <?php endif;?>
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
                            <?php if($prysm['header_mobile_logo']['url']):?>
                            <div class="m-brand-logo text-center">
                                <img src="<?php echo esc_url($prysm['header_mobile_logo']['url']);?>" alt="">
                            </div>
                            <?php endif;?>
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
            </div>
        </header>
        <?php if( true == $prysm['enable-sidebar-nav']):?>
        <!-- Sidebar Info -->
        <div class="pr20-sidebar-info">
            <div class="pr20_sidebar_info_content">
                <span class="close-menu"><i class="fas fa-times"></i></span>

                <?php if(!empty($prysm['sidebar_logo']['url'])):?>
                <div class="pr20_sidebar_logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($prysm['sidebar_logo']['url']);?>" alt=""></a>
                </div>
                <?php endif;?>

                <?php if(!empty($prysm['sidebar_text'])):?>
                <div class="pr20-pera-txt">
                    <p><?php echo esc_html($prysm['sidebar_text']);?></p>
                </div>
                <?php endif;?>

                <?php if(!empty($prysm['sidebar-gall-item'])):?>

                <?php 
                    $gallery_opt = $prysm['sidebar-gall-item']; // for eg. 15,50,70,125
                    $gallery_ids = explode( ',', $gallery_opt );
                ?>
                <div class="pr20-sidebar-gallery">
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
                <div class="pr20-sidebar-social">

                    <?php if(!empty($prysm['footer_copyright'])):?>
                    <div class="pr20-headline">
                        <h5><?php esc_html_e( 'Follow us on', 'prysm' )?></h5>
                    </div>
                    <?php endif;?>
                    <?php if(!empty($prysm['sidebar_social_info'])):?>
                    <div class="pr20-social-links">
                        <?php foreach($prysm['sidebar_social_info'] as $item):?>
                        <a href="<?php echo esc_url($item['sidebar_icon_link']['url'])?>"><i class="<?php echo esc_attr($item['sidebar_icon'])?>"></i></a>
                        <?php endforeach;?>
                    </div>
                    <?php endif;?>
                </div>
                <?php if(!empty($prysm['footer_copyright'])):?>
                <div class="pr20-sidebar-copyright">
                    <p><?php echo __($prysm['footer_copyright']);?></p>
                </div>
                <?php endif;?>
            </div>  
        </div>
        <?php endif;?>
        <!-- Sidebar Info End -->