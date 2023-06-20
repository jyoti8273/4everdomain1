<?php
	get_header();
	while(have_posts()): the_post();
	$id = get_the_ID();
	$prysm = get_post_meta( $id, 'prysm_servicepost', true );
	//print_r($prysm);die;
	$breadcrumb_bg = !empty($prysm['service_background']['url']) ? !empty($prysm['service_background']['url']) : "";
?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($prysm['service_background']['url']);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<?php if(!empty($prysm['service_heading'])) : ?>
				<h2><?php echo esc_html($prysm['service_heading'] ? $prysm['service_heading'] : 'service List');?></h2>
				<?php endif; ?>
				<?php if($prysm['service_breadcrumb']): ?>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of service single section
	============================================= -->
	<section id="pr-service-details" class="pr-service-details-section">
		<div class="container">
			<div class="pr-service-details-content">
				<div class="row">
					<div class="col-lg-4">
						<div class="service-side-bar">
							<?php if($prysm['service_recent_show']):?>
								<div class="service-category ul-li-block">
									<ul>
										<?php
											$args = array('post_type' => 'services' , 'posts_per_page' => $prysm['service_recent_limit'], 'post__not_in' => array( $post->ID ) );
											$new_query = new WP_Query( $args );
											if( $new_query -> have_posts() ):
												while( $new_query -> have_posts() ):
													$new_query -> the_post();
										?>
											<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
										<?php
											endwhile ;
											endif;
											wp_reset_postdata();
										?>
									</ul>
								</div>
							<?php
								endif;
							if($prysm['service_sidebar_img']):
							?>
							<div class="service-add">
								<a href="<?php echo esc_url($prysm['service-sidebar_img_lnk']['url']);?>">
									<img src="<?php echo esc_url($prysm['service_sidebar_img']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
								</a>
							</div>
							<?php endif;?>
						</div>
					</div>
					<div class="col-lg-8">
						<div class="pr-service-details-text">
							 <?php if ( has_post_thumbnail() ): ?>
							<div class="pr-service-details-img">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
							</div>
							<?php
								endif;
								the_content();
								if($prysm['service_slider']['service_bottom_slider']):
							?>
							<div class="pr-service-details-slider-wrapper">
									<div class="pr-service-details-slider">
										<?php
											$args = array('post_type' => 'services' , 'posts_per_page' => $prysm['service_slider']['service_bottom_slider_limit'], 'post__not_in' => array( $post->ID ) );
											$new_query = new WP_Query( $args );
											if( $new_query -> have_posts() ):
												while( $new_query -> have_posts() ):
													$new_query -> the_post();
											if ( has_post_thumbnail() ):
											$idz = get_the_ID();
											$prysm_slider = get_post_meta( $idz, 'prysm_servicepost', true );
										?>

										<div class="pr-item-innerbox">
											<div class="pr-service-details-slider-inner position-relative">
												<div class="pr-ser-d-img position-relative">
													<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
													<div class="pr-ser-d-icon position-absolute">
														<img src="<?php echo esc_url($prysm_slider['service_icon_img']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
													</div>
												</div>
												<div class="pr-ser-d-text">
													<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
												</div>
												<div class="pr-ser-d-hover">
													<div class="pr-ser-d-icon-hv clearfix">
														<div class="pr-ser-d-icon">
															<img src="<?php echo esc_url($prysm_slider['service_icon_img']['url']);?>" alt="<?php print esc_attr__( 'img', 'prysm' ); ?>">
														</div>
													</div>
													<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<p><?php echo substr(strip_tags(get_the_content()) , 0 , 70); ?></p>
													<div class="pr-btn text-center">
														<a class="d-flex justify-content-center align-items-center" href="<?php the_permalink(); ?>" tabindex="0"><?php echo esc_html__( 'Read More', 'prysm' )?></a>
													</div>
												</div>
											</div>
										</div>
										<?php
											endif;
											endwhile ;
											endif;
											wp_reset_postdata();
										?>

									</div>
									<div class="carousel_nav clearfix">
										<button type="button" class="srd-left_arrow"><i class="far fa-long-arrow-left"></i></button>
										<button type="button" class="srd-right_arrow"><i class="far fa-long-arrow-right"></i></button>
									</div>
								</div>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of service single section
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
endwhile;
	get_footer();
?>