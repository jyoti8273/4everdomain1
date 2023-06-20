<?php
	get_header();
	$prysm = get_option( 'prysm' );	

?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($prysm['portfolio-background']['url']);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<h2><?php echo esc_html($prysm['portfolio_heading'] ? $prysm['portfolio_heading'] : 'Portfolio');?></h2>
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
<!-- Start of portfolio section
	============================================= -->
	<section id="pr-portfolio" class="pr-portfolio-section">
		<div class="container">
			<div class="pr-portfolio-content">
				<div class="row">
					<?php
					if(have_posts()){
						while(have_posts()):
							the_post();
						if(has_post_thumbnail()){
							$categories = get_the_category();
					?>
					<div class="col-lg-3 col-md-6">
						<div class="pr-portfolio-inner-item position-relative">
							<span class="pr-item-bg1 position-absolute"><img src="<?php  get_template_directory_uri(). 'assets/img/bg/pr-bg.png' ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></span>
							<span class="pr-item-bg2 position-absolute"><img src="<?php  get_template_directory_uri(). 'assets/img/bg/pr2-bg.png' ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>"></span>
							<div class="pr-portfolio-img">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
							</div>
							<div class="pr-portfolio-text headline pera-content">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php
									foreach((array)$categories as $cat) {
											echo '<span ><a href="'.get_category_link($cat->cat_ID).'" >'. $cat->cat_name . '</a></span>';
											break;
								}
								?>
								<div class="pr-portfolio-btn">
									<a href="<?php the_permalink(); ?>"><i class="far fa-long-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<?php
						}
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
<!-- End of portfolio section
	============================================= -->


<?php if(!!empty($prysm['portfolio-contactsection']['portfolio_bottom_section'])): ?>
<!-- Start of newslatter section
	============================================= -->
	<section id="pr-newslatter" class="pr-newslatter-section position-relative">
		<span class="pr-newslatter-img position-absolute"><img src="<?php echo esc_url($prysm['portfolio-contactsection']['portfolio-main-bglogo']['url']);?>"></span>
		<div class="container">
			<div class="pr-newslatter-content d-flex justify-content-between align-items-center">
				<div class="pr-newslatter-text headline pera-content">
					<p><?php echo wp_kses($prysm['portfolio-contactsection']['portfolio-bottom-title'] , prysm_expanded_alowed_tags())?></p>
				</div>
				<?php if($prysm['portfolio-contactsection']['portfolio_bottom_form']): ?>
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