<?php
get_header();
	$prysm = get_option( 'prysm' );
$main_bg = !empty($prysm['404-background']['url']) ? !empty($prysm['404-background']['url']) : "";

$main_img = !empty($prysm['404-top-image']['url']) ? !empty($prysm['404-top-image']['url']) : get_template_directory_uri(). "/assets/img/logo/404.png";

?>
<!-- Start of 404 content section
	============================================= -->
	<section id="error" class="error-section position-relative">
		<div class="container">
			<div class="pr-error-img text-center">
				<img src="<?php echo esc_url($main_img);?>">
			</div>

			<div class="pr-error-text text-center position-relative headline pera-content">
				<?php if(!empty($prysm['404-mainsection']['404_heading'])) : ?>
				<h3><?php echo esc_html($prysm['404-mainsection']['404_heading']); ?></h3>
				<?php else : ?>
				<h3><?php echo esc_html__('Page Not Found', 'prysm'); ?></h3>
				<?php endif; ?>
				<?php if(!empty($prysm['404-mainsection']['404-main-text'])) : ?>
				<p><?php echo esc_html($prysm['404-mainsection']['404-main-text']);?></p>
				<?php else : ?>
				<p><?php echo esc_html__('Our latest thinking on the issues that matter most in business.', 'prysm'); ?></p>
				<?php endif; ?>
				<?php if(!empty($prysm['404-mainsection']['404-btn-text'])): ?>
				<div class="pr-btn">
					<a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo esc_html($prysm['404-mainsection']['404-btn-text']);?>
					</a>
				</div>
				<?php else : ?>
				<div class="pr-btn">
					<a class="d-flex justify-content-center align-items-center" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo esc_html__('Go Back Home', 'prysm'); ?>
					</a>
				</div>
				<?php endif; ?>
			</div>
		</div>

	</section>
<!-- End 404 content section
	============================================= -->
<?php if(!empty($prysm['404-contactsection']['404_bottom_section'])): ?>
<!-- Start of newslatter section
	============================================= -->
	<section id="pr-newslatter" class="pr-newslatter-section position-relative">
		<span class="pr-newslatter-img position-absolute"><img src="<?php echo esc_url($prysm['404-main-bglogo']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></span>
		<div class="container">
			<div class="pr-newslatter-content d-flex justify-content-between align-items-center">
				<div class="pr-newslatter-text headline pera-content">
					<p><?php echo wp_kses($prysm['404-contactsection']['404-bottom-title'] , prysm_expanded_alowed_tags())?></p>
				</div>
				<?php if($prysm['404-contactsection']['404_bottom_form']): ?>
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