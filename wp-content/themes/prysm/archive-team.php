<?php
	get_header();
	$prysm = get_option( 'prysm' );
	$breadcrumb_bg = !empty($prysm['service-background']['url']) ? !empty($prysm['service-background']['url']) : "";
?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($breadcrumb_bg);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<h2><?php echo esc_html($prysm['service_heading'] ? $prysm['service_heading'] : 'service List');?></h2>
				<?php if(!empty($prysm['service_breadcrumb'])): ?>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->
<!-- Start of service list section
	============================================= -->
	<section id="pr-service-list" class="pr-service-list-section">
		<div class="container">
			<div class="pr-section-title headline text-center middle-align pera-content pr-text-in">
				<h3 class="title-tag d-inline-block">
					<span class="pr-text-in_item1">
						<span class="pr-text-in_item2">
							<span class="pr-text-in_item3">
								<?php echo esc_html($prysm['service-mainsection']['service_maion_heading']);?>
							</span>
						</span>
					</span>
				</h3>
				<h2>
					<span class="pr-text-in_item1">
						<span class="pr-text-in_item2">
							<span class="pr-text-in_item3">
								<?php echo esc_html($prysm['service-mainsection']['service_maion_title']);?>
							</span>
						</span>
					</span>
				</h2>
			</div>
			<div class="pr-service-list-content">
				<div class="row mt-none-40">
					<?php
					if(have_posts()){
						while(have_posts()):
							the_post();
							$post_title = get_the_title();
							$id = get_the_ID();
							$prysm_post = get_post_meta( $id, 'prysm_servicepost', true );
				?>
				<div class="col-lg-3 col-md-6">
					<div class="pr-service-item-inner pr-single-team text-center">
						<div class="pr-service-item-icon d-flex align-items-center justify-content-center">
							<i class="<?php echo esc_attr($prysm_post['service_icon'] );?>"></i>
						</div>
						<div class="pr-service-item-text headline pera-content position-relative">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo wp_kses($prysm_post['service_text'] , prysm_expanded_alowed_tags())?></p>
							<div class="pr-btn text-center">
								<a class="d-flex justify-content-center align-items-center" href="<?php the_permalink(); ?>">
									<?php echo esc_html($prysm['service-mainsection']['service_maion_button']);?>
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php
						endwhile;
					}
				?>

				</div>
			<div class="pr-pagination-wrap text-center ul-li">
				<?php prysm_the_pagination();?>
			</div>
		</div>
	</div>
</section>
<!-- End of service list section
============================================= -->
<?php if(!empty($prysm['service-contactsection']['service_bottom_section'])): ?>
<!-- Start of newslatter section
	============================================= -->
	<section id="pr-newslatter" class="pr-newslatter-section position-relative">
		<span class="pr-newslatter-img position-absolute"><img src="<?php echo esc_url($prysm['service-contactsection']['service-main-bglogo']['url']);?>"></span>
		<div class="container">
			<div class="pr-newslatter-content d-flex justify-content-between align-items-center">
				<div class="pr-newslatter-text headline pera-content">
					<p><?php echo wp_kses($prysm['service-contactsection']['service-bottom-title'] , prysm_expanded_alowed_tags())?></p>
				</div>
				<?php if($prysm['service-contactsection']['service_bottom_form']): ?>
				<div class="pr-newslatter-form position-relative">
					<?php echo do_shortcode('[mc4wp_form]'); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<!-- End of newslatter section
	============================================= -->
<?php
	endif;
	get_footer();
?>