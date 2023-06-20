<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
    <?php endif;?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="//gmpg.org/xfn/11">
	<?php wp_head();?>
	
</head>
<?php 
if(get_post_meta( get_the_ID(), 'prysm_pagepost', true )) {
	$prysm = get_post_meta( get_the_ID(), 'prysm_pagepost', true );
} else {
	$prysm = [];
}

if( array_key_exists( 'box_layout_enable', $prysm )) {
	$box_layout_enable = $prysm['box_layout_enable'];
} else {
	$box_layout_enable = false;
}

$box_class = '';
if(true == $box_layout_enable && !empty($box_layout_enable)){
	$box_class = 'agency-body';
}
?>
<body <?php body_class($box_class); ?>>
	<?php
	if(function_exists( 'wp_body_open' ) ){
		wp_body_open();
	}
	$prysm = get_option( 'prysm' );
	if(true == $prysm['preloader_show']):
?>
	<div class="site-wrapper">
	<!-- Preloader-->
	<div class="loading-preloader">
		<div id="loading-preloader">
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
			<div class="line_shape"></div>
		</div>
	</div>
	<!-- Preloader End -->
<?php
	endif;
	if(!empty($prysm['slidetotop_show'])):
?>
	<div class="up">
		<a href="#" class="scrollup text-center"><i class="fas fa-chevron-up"></i></a>
	</div>
<?php endif;?>
<!-- Start of header section
	============================================= -->
	<?php 
		if('header-style-one' === prysm_site_header()){
		get_template_part( 'template-parts/header/header-style', 'one');
	   }elseif('header-style-two' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'two');
	   }elseif('header-style-three' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'three');
	   }elseif('header-style-four' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'four');
	   }elseif('header-style-five' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'five');
	   }elseif('header-style-six' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'six');
	   }elseif('header-style-seven' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'seven');
	   }elseif('header-style-eight' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'eight');
	   }elseif('header-style-nine' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'nine');
	   }elseif('header-style-ten' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'ten');
	   }elseif('header-style-eleven' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'eleven');
	   }elseif('header-style-twelve' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'twelve');
	   }elseif('header-style-threeten' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'threeten');
	   }elseif('header-style-fourteen' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'fourteen');
	   }elseif('header-style-fiveteen' === prysm_site_header()){
		  get_template_part( 'template-parts/header/header-style', 'fiveteen');
	 	}elseif('header-style-sixteen' === prysm_site_header()){
			get_template_part( 'template-parts/header/header-style', 'sixteen');
		}elseif('header-style-seventeen' === prysm_site_header()){
			get_template_part( 'template-parts/header/header-style', 'seventeen');
		}elseif('header-style-eightteen' === prysm_site_header()){
			get_template_part( 'template-parts/header/header-style', 'eightteen');
		}elseif('header-style-nineteen' === prysm_site_header()){
			get_template_part( 'template-parts/header/header-style', 'nineteen');
		}else{
		  get_template_part( 'template-parts/header/header-style', 'one');
	   }
	?>