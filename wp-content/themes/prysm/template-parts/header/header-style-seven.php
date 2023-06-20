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
<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
<!-- Start of header section
	============================================= -->
	<header id="pry-header" class="pry-main-header header-syle-two">
		<div class="container">
			<div class="pry-header-wrap d-flex justify-content-between">
				<div class="pr-brand-logo">
                    <?php prysm_logo();?>
				</div>
				<div class="header-navigation-area d-flex">
					<nav class="pr-main-navigation  clearfix ul-li">
                        <?php
                        if(true == $nav_style){
                            wp_nav_menu(
                                array(
                                    'theme_location'=> 'header_one_menu',
                                    'menu_class'=>'navbar-nav text-capitalize clearfix' ,
                                    'menu_id'=>'m-main-nav' ,
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
                                    'menu_id'=>'m-main-nav' ,
                                    'container' =>'' ,
                                    'container_class'=> '',
                                    'container_id'=> '',
                                )
                            );
                        }
                        ?>
					</nav>

                    <?php
                    if(!empty($prysm['header_language'])):
                        $headerlangs = $prysm['header_language'];
                        $i=1;
                        foreach((array)$headerlangs as $hlang):
                    if($i == 1):
                    ?>
					<div class="pr-language-select d-flex align-items-center float-right  ul-li-block position-relative">
                        <div class="pr-lang-img">
                            <img src="<?php echo esc_url($hlang['header_lan_img']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
                        </div>
                        <div class="pr-lang-text headline">
                            <span><?php echo esc_html($prysm['header_lang_title']);?></span>
                        </div>
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
                    <?php
                        if($prysm['header_button_link']):
                    ?>
					<div class="pr-an-btn text-center">
						<a href="<?php echo esc_url($prysm['header_button_link']['url']);?>"><?php echo esc_attr($prysm['header_button_link']['text']);?></a>
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
                                wp_nav_menu(
                                    array(
                                        'theme_location'=> 'header_one_menu',
                                        'menu_class'=>'navbar-nav text-capitalize clearfix' ,
                                        'menu_id'=>'m-main-nav' ,
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
                                        'menu_id'=>'m-main-nav' ,
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
				<!-- /Mobile-Menu -->
			</div>
		</div>
	</header>