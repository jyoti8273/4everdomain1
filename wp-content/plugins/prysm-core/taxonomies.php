<?php

class SH_Taxonomies {

    function __construct() {
        // Hook into the 'init' action
        add_action('init', array($this, 'taxonomies'), 0);
    }

    // Register Custom Taxonomy
    function taxonomies() {
		
		// Portfolio
		$labels		= array(
			'name'                       => _x( 'Portfolio Category', 'Portfolio Category', 'multix' ),
			'singular_name'              => _x( 'Category', 'Category', 'multix' ),
			'menu_name'                  => esc_attr__( 'Category', 'multix' ),
			'all_items'                  => esc_attr__( 'All Categories', 'multix' ),
			'parent_item'                => esc_attr__( 'Parent Category', 'multix' ),
			'parent_item_colon'          => esc_attr__( 'Parent Category:', 'multix' ),
			'new_item_name'              => esc_attr__( 'New Category Name', 'multix' ),
			'add_new_item'               => esc_attr__( 'Add New Category', 'multix' ),
			'edit_item'                  => esc_attr__( 'Edit Category', 'multix' ),
			'update_item'                => esc_attr__( 'Update Category', 'multix' ),
			'separate_items_with_commas' => esc_attr__( 'Separate Categories with commas', 'multix' ),
			'search_items'               => esc_attr__( 'Search Categories', 'multix' ),
			'add_or_remove_items'        => esc_attr__( 'Add or remove Categories', 'multix' ),
			'choose_from_most_used'      => esc_attr__( 'Choose from the most used Categories', 'multix' ),
		);
		$rewrite	= array(
			'slug'                       => 'portfolio_category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args 		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy('portfolio_category', 'portfolio', $args );
		
		// Services
		$labels		= array(
			'name'                       => _x( 'Service Category', 'Service Category', 'multix' ),
			'singular_name'              => _x( 'Category', 'Category', 'multix' ),
			'menu_name'                  => esc_attr__( 'Category', 'multix' ),
			'all_items'                  => esc_attr__( 'All Categories', 'multix' ),
			'parent_item'                => esc_attr__( 'Parent Category', 'multix' ),
			'parent_item_colon'          => esc_attr__( 'Parent Category:', 'multix' ),
			'new_item_name'              => esc_attr__( 'New Category Name', 'multix' ),
			'add_new_item'               => esc_attr__( 'Add New Category', 'multix' ),
			'edit_item'                  => esc_attr__( 'Edit Category', 'multix' ),
			'update_item'                => esc_attr__( 'Update Category', 'multix' ),
			'separate_items_with_commas' => esc_attr__( 'Separate Categories with commas', 'multix' ),
			'search_items'               => esc_attr__( 'Search Categories', 'multix' ),
			'add_or_remove_items'        => esc_attr__( 'Add or remove Categories', 'multix' ),
			'choose_from_most_used'      => esc_attr__( 'Choose from the most used Categories', 'multix' ),
		);
		$rewrite	= array(
			'slug'                       => 'service_category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args 		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy('service_category', 'services', $args );
		
		// Team
		$labels		= array(
			'name'                       => _x( 'Team Category', 'Team Category', 'multix' ),
			'singular_name'              => _x( 'Category', 'Category', 'multix' ),
			'menu_name'                  => esc_attr__( 'Category', 'multix' ),
			'all_items'                  => esc_attr__( 'All Categories', 'multix' ),
			'parent_item'                => esc_attr__( 'Parent Category', 'multix' ),
			'parent_item_colon'          => esc_attr__( 'Parent Category:', 'multix' ),
			'new_item_name'              => esc_attr__( 'New Category Name', 'multix' ),
			'add_new_item'               => esc_attr__( 'Add New Category', 'multix' ),
			'edit_item'                  => esc_attr__( 'Edit Category', 'multix' ),
			'update_item'                => esc_attr__( 'Update Category', 'multix' ),
			'separate_items_with_commas' => esc_attr__( 'Separate Categories with commas', 'multix' ),
			'search_items'               => esc_attr__( 'Search Categories', 'multix' ),
			'add_or_remove_items'        => esc_attr__( 'Add or remove Categories', 'multix' ),
			'choose_from_most_used'      => esc_attr__( 'Choose from the most used Categories', 'multix' ),
		);
		$rewrite	= array(
			'slug'                       => 'team_category',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args 		= array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy('team_category', 'team', $args );
		
    }

}

new SH_Taxonomies();
