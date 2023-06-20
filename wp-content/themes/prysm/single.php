<?php
	get_header();
	while(have_posts()): the_post();
	$prysm = get_post_meta( get_the_ID(), 'prysm_blogpost', true );
	$post_title = get_the_title();

	$author_id = $post->post_author;
	$avatar_url = get_avatar_url( $author_id );

	$tags = get_the_tags();
	$categories = get_the_category();

	$breadcrumb_bg = $prysm['post_background']['url'];
?>

<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($breadcrumb_bg);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<h2><?php echo esc_html($post_title ? $post_title : 'Blog Details');?></h2>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of blog details section
	============================================= -->
	<section id="pr-blog-details" class="pr-blog-details-section pt-95 pb-85">
		<div class="container">
			<div class="blog-details-content">
				<div class="row">
					<div class="<?php echo ((is_active_sidebar('default_sidebar')) ? "col-lg-9" : "col-lg-12");?>">
						<div class="blog-details-img-text">
							<?php if ( has_post_thumbnail() ): ?>
							<div class="blog-details-img position-relative mb-20">
								<img src="<?php the_post_thumbnail_url(); ?>">
							</div>
							<?php endif; ?>
							<div class="pr-blog-details-item">
								<div class="blog-details-text headline">
									<div class="prd-blog-meta-2  position-relative text-capitalize">
										<a href="<?php the_permalink(); ?>"><i class="far fa-clock"></i><?php the_time('F d, Y'); ?></a>
										<a href="<?php get_the_author_link();?>"><i class="far fa-user"></i><?php echo esc_html__( 'by', 'prysm' )?> <?php the_author(); ?></a>
										<?php
										if($tags){
										$tagx = count($tags);
										foreach((array)$tags as $tag) {
											?>
											<a href="<?php echo esc_url(get_tag_link($tag->term_id));?>"><i class="fas fa-tags"></i> <?php echo esc_html($tag->name);?></a>
											<?php break; }}?>
									</div>
									<?php the_content(); ?>
									<?php
										wp_link_pages( [
											'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'prysm' ),
											'after'       => '</div>',
											'link_before' => '<span class="page-number">',
											'link_after'  => '</span>',
										] );
									?>
								</div>
								<div class="pr-blog-tag-share clearfix">
									<?php if($tags){?>
									<div class="pr-blog-tag float-left">
										<span><?php echo esc_html__( 'Tags:', 'prysm' )?></span>
										<?php

										$tagx = count($tags);
										foreach((array)$tags as $tag) {
											?>
											<a href="<?php echo esc_url(get_tag_link($tag->term_id));?>"><?php echo esc_html($tag->name);?></a>
											<?php }?>
									</div>
									<?php } if($prysm):?>
									<div class="pr-blog-share float-right">
										<?php if($prysm['post_socialsection']['facebook_link']['url']):?>
										<a class="fb-social" href="<?php echo esc_url($prysm['post_socialsection']['facebook_link']['url']);?>"><i class="fab fa-facebook-f"></i><span><?php echo esc_html__( 'Like Us', 'prysm' )?></span></a>
										<?php
											endif;
											if($prysm['post_socialsection']['twitter_link']['url']):
										?>
										<a class="tw-social" href="<?php echo esc_url($prysm['post_socialsection']['twitter_link']['url']);?>"><i class="fab fa-twitter"></i><span><?php echo esc_html__( 'Like Us', 'prysm' )?></span></a>
										<?php
											endif;
											if($prysm['post_socialsection']['linkdin_link']['url']):
										?>
										<a class="ln-social" href="<?php echo esc_url($prysm['post_socialsection']['linkdin_link']['url']);?>"><i class="fab fa-linkedin-in"></i><span><?php echo esc_html__( 'Like Us', 'prysm' )?></span></a>
										<?php
											endif;
											if($prysm['post_socialsection']['insta_link']['url']):
										?>
										<a class="in-social" href="<?php echo esc_url($prysm['post_socialsection']['insta_link']['url']);?>"><i class="fab fa-instagram"></i><span><?php echo esc_html__( 'Like Us', 'prysm' )?></span></a>
										<?php endif;?>
									</div>
									<?php endif;?>
								</div>
							</div>
							<?php
							$previous_post = get_previous_post();
							$next_post = get_next_post();

							if($previous_post || $next_post):
							?>
							<div class="pr-blog-next-prev d-flex justify-content-between">
								<?php
									if($previous_post):
									$p_post_id = $previous_post->ID;
									$p_title = $previous_post->post_title;
									$p_link = get_permalink($p_post_id);
									$p_image = get_the_post_thumbnail_url($p_post_id, 'prysm-60x51');
								?>
								<div class="pr-blog-next-prev-btn  ">
									<a class="np-text text-uppercase" href="<?php echo esc_url($p_link);?>"><i class="fas fa-angle-double-left"></i><?php echo esc_html__( ' Previous Post', 'prysm' )?></a>
									<div class="pr-blog-next-prev-img-text d-flex align-items-center">
										<?php if($p_image):?>
										<div class="pr-blog-np-img">
											<img src="<?php echo esc_url($p_image);?>">
										</div>
										<?php endif;?>
										<div class="pr-blog-np-text headline">
											<h3 class="prev-next-heading"><a href="<?php echo esc_url($p_link);?>"><?php echo substr($p_title , 0 , 100); ?></a></h3>
										</div>
									</div>
								</div>
								 <?php
									endif;
									if($next_post):
									$n_post_id = $next_post->ID;
									$n_title = $next_post->post_title;
									$n_link = get_permalink($n_post_id);
									$n_image = get_the_post_thumbnail_url($n_post_id, 'prysm-60x51');
								?>
								<div class="pr-blog-next-prev-btn np-text-item text-right">
									<a class="np-text  text-uppercase" href="<?php echo esc_url($n_link);?>"><?php echo esc_html__( 'Next Post ', 'prysm' )?><i class="fas fa-angle-double-right"></i></a>
									<div class="pr-blog-next-prev-img-text d-flex align-items-center">
										<div class="pr-blog-np-text  headline">
											<h3 class="prev-next-heading"><a href="<?php echo esc_url($n_link);?>"><?php echo substr($n_title , 0 , 100); ?></a></h3>
										</div>
										<?php if($n_image):?>
										<div class="pr-blog-np-img">
											<img src="<?php echo esc_url($n_image);?>">
										</div>
										<?php endif;?>
									</div>
								</div>
								<?php endif;?>
							</div>
							<?php endif;?>
						</div>
						<div class="pr-blog-comment headline mt-50">
							<?php comments_template(); ?>
						</div>
					</div>
					<?php if(is_active_sidebar('default_sidebar')): ?>
						<div class="col-lg-3 mt-none-40">
						<div class="pr-side-bar">
							<div class="pr-side-bar-widget">
								<?php dynamic_sidebar('default_sidebar');?>
							</div>
						</div>
					</div>
					<?php endif;?>
				</div>
			</div>
		</div>
	</section>
<!-- End of  blog details section
	============================================= -->
<?php if($prysm):
		if(!empty($prysm['post-contactsection']['post_bottom_section'])): ?>
<!-- Start of newslatter section
	============================================= -->
	<section id="pr-newslatter" class="pr-newslatter-section position-relative">
		<span class="pr-newslatter-img position-absolute"><img src="<?php echo esc_url($prysm['post-contactsection']['post-main-bglogo']['url']);?>"></span>
		<div class="container">
			<div class="pr-newslatter-content d-flex justify-content-between align-items-center">
				<div class="pr-newslatter-text headline pera-content">
					<p><?php echo wp_kses($prysm['post-contactsection']['post-bottom-title'] , prysm_expanded_alowed_tags())?></p>
				</div>
				<div class="pr-newslatter-form position-relative">
					<?php echo do_shortcode('[mc4wp_form]'); ?>
				</div>
			</div>
		</div>
	</section>
<!-- End of newslatter section
	============================================= -->
<?php
	endif;
	endif;
	endwhile;
	get_footer();
?>