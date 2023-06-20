<?php
	get_header();
	while(have_posts()): the_post();
	$id = get_the_ID();
	$prysm = get_post_meta( $id, 'prysm_teampost', true );
	$breadcrumb_bg = $prysm['team_background']['url'];
?>
<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($breadcrumb_bg);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<?php if(!empty($prysm['team_heading'])) : ?>
				<h2><?php echo esc_html($prysm['team_heading'] ? $prysm['team_heading'] : 'team List');?></h2>
				<?php endif; ?>
				<?php if($prysm['team_breadcrumb']): ?>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
				<?php endif;?>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->

<!-- Start of team details section
	============================================= -->
	<section id="pr-team-details" class="pr-team-details-section">
		<div class="container">
			<div class="pr-team-details-content">
				<div class="row">
					<div class="col-lg-3">
						<div class="pr-team-details-sidebar">
							<div class="pr-team-details-sidebar-item">
								<div class="pr-team-member-inner-item">
									<div class="pr-team-member-img text-center position-relative">
										<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
									</div>
									<div class="pr-team-member-text headline text-center pera-content">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<span><?php echo esc_html($prysm['team_desg']);?></span>
									</div>
									<div class="pr-team-member-contact ul-li-block">
										<ul>
											<li><i class="flaticon-phone-call-1"></i><?php echo esc_html($prysm['team_numbe']);?></li>
											<li><i class="flaticon-email"></i><?php echo esc_html($prysm['team_mail']);?></li>
											<li><i class="flaticon-pin"></i><?php echo esc_html($prysm['team_add']);?></li>
										</ul>
									</div>
									<div class="pr-team-member-social">
										<span><?php echo esc_html__( 'Follow Me:', 'prysm' )?></span>
										<div class="social-item">
											<?php
												$socials = $prysm['team_socialicons'];
												foreach((array)$socials as $social):
											?>
											<a class="<?php echo esc_attr($social['team_icon_clr']);?>" href="<?php echo esc_url($social['team_icon_link']['url']);?>"><i class="<?php echo esc_attr($social['team_icon_class']);?>"></i></a>
											<?php endforeach;?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-9">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- End of team details  section
	============================================= -->
<?php if(true == $prysm['team_blog_section']): ?>
<section id="pr-blog" class="pr-blog-section">
		<div class="container">
			<div class="pr-blog-top-content d-flex justify-content-between align-items-center">
				<div class="pr-section-title headline pera-content pr-text-in">
					<h3 class="title-tag d-inline-block">
						<span class="pr-text-in_item1">
							<span class="pr-text-in_item2">
								<span class="pr-text-in_item3">
									<?php echo esc_html($prysm['team_blog_heading']);?>
								</span>
							</span>
						</span>
					</h3>
					<h2>
						<span class="pr-text-in_item1">
							<span class="pr-text-in_item2">
								<span class="pr-text-in_item3">
									<?php echo esc_html($prysm['team_blog_title']);?>
								</span>
							</span>
						</span>
					</h2>
				</div>
				<div class="carousel_nav clearfix">
					<button type="button" class="blg-left_arrow"><i class="far fa-long-arrow-left"></i></button>
					<button type="button" class="blg-right_arrow"><i class="far fa-long-arrow-right"></i></button>
				</div>
			</div>
			<div class="pr-blog-content">
				<div class="pr-blog-slider-area">
					<?php
						$args = array('post_type' => 'post' , 'posts_per_page' => $prysm['team_blog_post'] );
						$new_query = new WP_Query( $args );
						if( $new_query -> have_posts() ):
							while( $new_query -> have_posts() ):
							$new_query -> the_post();
					$author_id = $post->post_author;
					$avatar_url = get_avatar_url( $author_id );
					?>

					<div class=" pr-item-innerbox">
						<div class="pr-blog-inner-item">
							<?php if ( has_post_thumbnail() ):?>
							<div class="pr-blog-img-item">
								<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
							</div>
							<?php endif;?>
							<div class="pr-blog-text-item headline pera-content">
								<div class="item-meta">
									<a href="<?php the_permalink(); ?>"><i class="fal fa-calendar-alt"></i><?php the_time('F d, Y'); ?></a>
								</div>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<p><?php echo substr(strip_tags(get_the_content()) , 0 , 70); ?></p>
								<div class="item-author-meta d-flex justify-content-between align-items-center">
									<div class="b-item-img">
										<img src="<?php echo esc_url($avatar_url);?>" alt="<?php the_title(); ?>">
										<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><?php the_author(); ?></a>
									</div>
									<div class="pr-blog-more">
										<a href="<?php the_permalink(); ?>"> <?php echo esc_html__( 'More Details', 'prysm' )?><i class="fal fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php
						endwhile ;
						endif;
						wp_reset_postdata();
					?>

				</div>
			</div>
		</div>
	</section>

<?php
endif;
endwhile;
	get_footer();
?>