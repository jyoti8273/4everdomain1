<?php
	get_header();
	$prysm = get_option( 'prysm' );
	$top_heading 		= get_the_author();
	$breadcrumb_bg = !empty($prysm['author-background']['url']) ? !empty($prysm['author-background']['url']) : "";
?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($breadcrumb_bg);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<h2><?php echo esc_html( $top_heading ) ? $top_heading : esc_html__("author" , 'prysm'); ?></h2>
				<?php if(!empty($prysm['author_breadcrumb'])): ?>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of author feed section
	============================================= -->
	<section id="pr-blog-feed" class="pr-blog-feed-section pt-80 pb-100">
		<div class="container">
			<div class="pr-blog-feed-content">
				<div class="row">
					<div class="<?php echo ((is_active_sidebar('default_sidebar')) ? "col-lg-9 mt-none-30" : "col-lg-12"); ?>">
					<?php
						if(have_posts()) :
							while(have_posts()):
								the_post();
								$author_id = $post->post_author;
								$post_title = get_the_title();
								$avatar_url = get_avatar_url( $author_id );

								$categories = get_the_category();
								$prysmz = get_post_meta( get_the_ID(), 'prysm_blogpost', true );
					?>
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="pr-blog-inner-item mt-30">
								<?php if($prysmz):
								if($prysmz['post_background']): ?>
								<div class="pr-blog-img-item">
									<?php the_post_thumbnail("large");?>
								</div>
								<?php endif; endif;?>
								<div class="pr-blog-text-item headline pera-content">
									<div class="item-meta">
										<a href="<?php the_permalink(); ?>"><i class="fal fa-calendar-alt"></i><?php the_time('F d, Y'); ?></a>
									</div>
									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="blog-content">
										<?php print the_excerpt(  ); ?>
									</div>
									<div class="item-author-meta d-flex justify-content-between align-items-center">
										<div class="b-item-img">
											<img src="<?php echo esc_url($avatar_url);?>" alt="<?php the_author(); ?>">
											<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php the_author(); ?></a>
										</div>
										<div class="pr-blog-more">
											<a href="<?php the_permalink(); ?>"><?php echo esc_html__( 'More Details', 'prysm' )?> <i class="fal fa-long-arrow-right"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php
							endwhile;
							endif;
						?>
						<div class="pr-pagination-wrap text-center ul-li mt-30">
							<?php prysm_the_pagination();?>
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
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<!-- End of author feed section
	============================================= -->
<?php if(!empty($prysm['author-contactsection']['author_bottom_section'])): ?>
<!-- Start of newslatter section
	============================================= -->
	<section id="pr-newslatter" class="pr-newslatter-section position-relative">
		<span class="pr-newslatter-img position-absolute"><img src="<?php echo esc_url($prysm['author-contactsection']['author-main-bglogo']['url']);?>"></span>
		<div class="container">
			<div class="pr-newslatter-content d-flex justify-content-between align-items-center">
				<div class="pr-newslatter-text headline pera-content">
					<p><?php echo wp_kses($prysm['author-contactsection']['author-bottom-title'] , prysm_expanded_alowed_tags())?></p>
				</div>
				<?php if($prysm['author-contactsection']['author_bottom_form']): ?>
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