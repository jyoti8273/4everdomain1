<?php
$prysm = get_option( 'prysm' );
?>
<!-- Start of footer section
	============================================= -->
	<?php if(is_active_sidebar('fsidebar_1') || is_active_sidebar('fsidebar_2') || is_active_sidebar('fsidebar_3') || is_active_sidebar('fsidebar_4') || $prysm['footer_copyright']): ?>
	<section id="pr-footer" class="pr-footer-section footer-stye-1">
		<div class="container">
			<?php if(is_active_sidebar('fsidebar_1') || is_active_sidebar('fsidebar_2') || is_active_sidebar('fsidebar_3') || is_active_sidebar('fsidebar_4')) : ?>
			<div class="pr-footer-content">
				<div class="row mt-none-30">
					<div class="col-lg-3 col-md-6">
						<?php
							if(is_active_sidebar('fsidebar_1') ||   $prysm[ 'footer_widget1']){
								dynamic_sidebar('fsidebar_1');
							}
						?>
					</div>
					<div class="col-lg-3 col-md-6">
						<?php
							if(is_active_sidebar('fsidebar_2') || !empty($prysm[ 'footer_widget2'])){
								dynamic_sidebar('fsidebar_2');
							}
						?>
					</div>
					<div class="col-lg-3 col-md-6">
						<?php
							if(is_active_sidebar('fsidebar_3') || !empty($prysm[ 'footer_widget3'])){
								dynamic_sidebar('fsidebar_3');
							}
						?>
					</div>
					<div class="col-lg-3 col-md-6">
						<?php
							if(is_active_sidebar('fsidebar_4') ||  !empty($prysm[ 'footer_widget4'])){
								dynamic_sidebar('fsidebar_4');
							}
						?>
					</div>
				</div>
			</div>
			<?php endif; ?>

			<?php if(!empty($prysm['footer_copyright']) || !empty($prysm['footer_menu'])): ?>
			<div class="pr-copyright-wrap pera-content d-flex justify-content-between align-items-center <?php if($prysm['footer_menu'] == 0) : ?> prs-jcc <?php endif ?>">
				<?php if( !empty($prysm['footer_copyright']) ) : ?>
				<div class="pr-copyright-text">
					<p><?php echo wp_kses($prysm['footer_copyright'] , prysm_expanded_alowed_tags())?></p>
				</div>
				<?php
					endif;
					if($prysm['footer_menu']):
				?>
				<div class="pr-copyright-menu ul-li">
					<ul>
						<?php
							$foomenus = $prysm['footer_menu'];
							foreach((array)$foomenus as $foomenu):
						?>
						<li><a href="<?php echo esc_url($foomenu['opt-text']['url']);?>"><?php echo esc_html($foomenu['opt-text']['text']);?></a></li>
						<?php endforeach;?>
					</ul>
				</div>
				<?php endif;?>
			</div>
		<?php endif;?>

		</div>
	</section>
	<?php endif; ?>
<!-- End of footer section
	============================================= -->


<?php
 wp_footer();
if(function_exists('map_api'))
	{
		map_api();
    }
?>
</body>
</html>