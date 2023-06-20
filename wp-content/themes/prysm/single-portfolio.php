<?php
	get_header();
	while(have_posts()): the_post();
	$id = get_the_ID();
	$prysm = get_post_meta( $id, 'prysm_portfoliopost', true );
	//print_r($prysm);die;
	$breadcrumb_bg = !empty($prysm['portfolio_background']['url']) ? !empty($prysm['portfolio_background']['url']) : "";
?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($prysm['portfolio_background']['url']);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<h2><?php echo esc_html($prysm['portfolio_heading'] ? $prysm['portfolio_heading'] : 'Portfolio Details');?></h2>
				<?php if(!empty($prysm['portfolio_breadcrumb'])): ?>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<?php
	the_content();
endwhile;
	get_footer();
?>