<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();
$prysm = get_option( 'prysm' );
?>
    <section id="pr-breadcrumb" class="pr-breadcrumb-section position-relative" data-background="<?php echo esc_url($prysm['shop-background']['url']);?>">
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

    <div class="woo-section-wrap">
        <div class="container content-container">
            <div class="row content-row">
                <div id="primary">
                    <main id="main" class="site-main" role="main">
                            <?php woocommerce_content(); ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>
        </div>
    </div>
<?php
get_footer();