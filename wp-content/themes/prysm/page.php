<?php
	get_header();

	if(get_post_meta( get_the_ID(), 'prysm_pagepost', true )) {
		$prysm = get_post_meta( get_the_ID(), 'prysm_pagepost', true );
	} else {
		$prysm = [];
	}
	$post_title = get_the_title();
if($prysm){
	$breadcrumb_bg = $prysm['page_background']['url'] ? $prysm['page_background']['url'] : ""; }
else{ $breadcrumb_bg = "";}



?>
	<!-- Start of Breadcrumb section
	============================================= -->
	<section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($breadcrumb_bg);?>">
		<span class="background_overlay"></span>
		<div class="container">
			<div class="pr-breadcrumb-content  text-center headline">
				<?php if(!empty($prysm['page_heading'])) : ?>
				<h2><?php echo esc_html($prysm['page_heading'] ? $prysm['page_heading'] : ($post_title ? $post_title : 'Page') );?></h2>
				<?php endif; ?>
				<div class="pr-breadcrumb-item ul-li">
					<?php prysm_breadcrumb(); ?>
				</div>
			</div>
		</div>
	</section>
<!-- End of Breadcrumb section
	============================================= -->
<?php
	while(have_posts()): the_post();
?>
<div class="section secion-item-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            	<div class="single_page_content inner-content prysm-page-wrapper">
				<?php the_content(); ?>
				</div><!-- .col -->
				<?php if ( get_comments_number() >= 1 ): ?>
                <div class="blog_comment_box page-comment-box mt-40">
                <?php
					comments_template();

				wp_link_pages( [
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'prysm' ),
					'after'       => '</div>',
					'link_before' => '<span class="page-number">',
					'link_after'  => '</span>',
				] );
				?>
				<?php endif; ?>
                </div>
            </div><!-- .col -->

        </div><!-- .row -->
    </div><!-- .container -->
</div>


<!-- ====== END PAGE CONTENT ======  -->

<?php endwhile; ?>
<?php
	get_footer();
?>