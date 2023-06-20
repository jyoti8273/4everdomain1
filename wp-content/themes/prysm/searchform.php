<div class="pr-widget-wrap">
	<div class="pr-search-widget position-relative">
		<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
        <input class="search-input"  name="s" value="<?php echo get_search_query(); ?>"  type="search" placeholder="<?php esc_attr_e('Search...  ', 'prysm'); ?>"  required>
        <button type="submit"><i class="fas fa-search"></i> </button>
    </form>
	</div>
</div>