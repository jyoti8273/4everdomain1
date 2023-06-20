<?php
/*
  Plugin Name: Prysm Core
  Plugin URI: https://themexriver.com/wp/prysm/
  Description: Required plugin for the theme.
  Version: 2.5
  Author: Themexriver
  Author URI: https://themeforest.net/user/themexriver/
  License: GPLv2
 */

 

 if (!function_exists('prysm_widget_call')) {
	function prysm_widget_call()
	{
		register_widget("prysm_categories");
		register_widget("prysm_blog_posts");
		register_widget("prysm_tags");
		register_widget("prysm_gallery");
		register_widget("prysm_footer_about_social");
		register_widget("prysm_footer_post_links");
		register_widget("prysm_footer_contact_info");
	}
}
if (!function_exists('prysm_social_share')) {
	function prysm_social_share()
	{
		?>
        <!-- AddToAny BEGIN -->
            <a class="a2a_dd share-button" href="https://www.addtoany.com/share">Share</a>
            <script>
            var a2a_config = a2a_config || {};
            a2a_config.num_services = 10;
            </script>
            <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->
        <?php
	}
}

if (!function_exists('map_api')) {
	function map_api()
	{
		echo("<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDfpGBFn5yRPvJrvAKoGIdj1O1aO9QisgQ'></script>");
	}
}
if(!function_exists('prysm_social_share_output'))
{
	function prysm_social_share_output($shares = array(), $color = false) {

        $permalink = get_permalink(get_the_ID());
        $titleget = get_the_title();

        if (in_array('facebook', $shares)) {
            $fb = ( $color == 1 ) ? 'style="background:#3b5998"' : '';
            ?>
            <li>
            	<a itemprop="url" <?php echo esc_attr($fb); ?> onClick="window.open('https://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>', 'Facebook', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + ''); return false;" href="http://www.facebook.com/sharer.php?u=<?php echo esc_url($permalink); ?>" class="fab fa-facebook-f"></a>
            </li>

        <?php } ?>

        <?php
        if (in_array('twitter', $shares)) {
            $twitter = ( $color == 1 ) ? 'style="background:#00aced"' : '';
            ?>
            <li>
            	<a itemprop="url" <?php echo esc_attr($twitter); ?> onClick="window.open('https://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Twitter share', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
                    return false;" href="http://twitter.com/share?url=<?php echo esc_url($permalink); ?>&amp;text=<?php echo str_replace(" ", "%20", $titleget); ?>" class="fab fa-twitter"></a>
            </li>
        <?php } ?>

        <?php
        if (in_array('gplus', $shares)) {
            $gplus = ( $color == 1 ) ? 'style="background:#dd4b39"' : '';
            ?>
            <li>
            	<a itemprop="url" <?php echo esc_attr($gplus); ?> onClick="window.open('https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>', 'Google plus', 'width=585,height=666,left=' + (screen.availWidth / 2 - 292) + ',top=' + (screen.availHeight / 2 - 333) + '');
                    return false;" href="https://plus.google.com/share?url=<?php echo esc_url($permalink); ?>" class="goo fab fa-google-plus-g"></a>
            </li>
        <?php } ?>

        <?php
        if (in_array('linkdin', $shares)) {
            $linkeding = ( $color == 1 ) ? 'style="background:#007bb6"' : '';
            ?>
            <li><a itemprop="url" <?php echo esc_attr($linkeding); ?> onClick="window.open('http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>', 'Linkedin', 'width=863,height=500,left=' + (screen.availWidth / 2 - 431) + ',top=' + (screen.availHeight / 2 - 250) + '');
                    return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo esc_url($permalink); ?>">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
        <?php } ?>
        <?php
        if (in_array('pinterest', $shares)) {
            $pinterest = ( $color == 1 ) ? 'style="background:#cb2027"' : '';
            ?>
            <li>
            	<a itemprop="url" class="pin fab fa-pinterest-p" <?php echo esc_attr($pinterest); ?> href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'></a>
            </li>
        <?php } ?>

        <?php
        if (in_array('tumblr', $shares)) {
            $tumblr = ( $color == 1 ) ? 'style="background:#32506d"' : '';
            $str = $permalink;
            $str = preg_replace('#^https?://#', '', $str);
            ?>
            <li>
            	<a itemprop="url" <?php echo esc_attr($tumblr); ?> onClick="window.open('http://www.tumblr.com/share/link?url=<?php echo esc_url($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>', 'Tumblr', 'width=600,height=300,left=' + (screen.availWidth / 2 - 300) + ',top=' + (screen.availHeight / 2 - 150) + '');
                    return false;" href="http://www.tumblr.com/share/link?url=<?php echo esc_url($str); ?>&amp;name=<?php echo str_replace(" ", "%20", $titleget); ?>">
                    <i class="fab fa-tumblr"></i>
                </a>
            </li>
        <?php }
    }
}

add_action('init', 'create_tw_custom_post');


function create_tw_custom_post() {

	//Portfolio
    register_post_type( 'portfolio', array(
		'labels' => array(
			'name' => 'Portfolio',
			'singular_name' => 'Portfolio',
			'add_new' => 'Add New Portfolio',
			'add_new_item' => 'Add New Portfolio',
			'edit' => 'Edit',
			'edit_item' => 'Edit Portfolio',
			'new_item' => 'New Portfolio',
			'view' => 'View',
			'view_item' => 'View Portfolio',
			'search_items' => 'Search Portfolio',
			'not_found' => 'No Portfolio found',
			'not_found_in_trash' => 'No Portfolio found in Trash',
			'parent' => 'Parent Portfolio'
		),
		'public' => true,
		'publicly_queriable' => true,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus' => true,
		'has_archive' => true,
		'rewrite' => true,
		'menu_position' => 5,
		'show_in_rest' => true,
		'supports' => array('title' , 'thumbnail', 'editor'),
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-images-alt2',
		'has_archive' => true
	));

	//Services
    register_post_type( 'services', array(
										'labels' => array(
														'name' => 'Services',
														'singular_name' => 'Service',
														'add_new' => 'Add New Service',
														'add_new_item' => 'Add New Service',
														'edit' => 'Edit',
														'edit_item' => 'Edit Service',
														'new_item' => 'New Service',
														'view' => 'View',
														'view_item' => 'View Service',
														'search_items' => 'Search Service',
														'not_found' => 'No Service found',
														'not_found_in_trash' => 'No Service found in Trash',
														'parent' => 'Parent Service'
													),
										'public' => true,
										'publicly_queriable' => true,
										'show_ui' => true,
										'exclude_from_search' => true,
										'show_in_nav_menus' => true,
										'has_archive' => true,
										'rewrite' => true,
										'menu_position' => 5,
										'show_in_rest' => true,
										'supports' => array('title' , 'thumbnail', 'editor'),
										'taxonomies' => array(''),
										'menu_icon' => 'dashicons-admin-generic',
										'has_archive' => true
									));


	//Team
	register_post_type( 'team', array(
										'labels' => array(
														'name' => 'Team',
														'singular_name' => 'Member',
														'add_new' => 'Add New Member',
														'add_new_item' => 'Add New Member',
														'edit' => 'Edit',
														'edit_item' => 'Edit Member',
														'new_item' => 'New Member',
														'view' => 'View',
														'view_item' => 'View Member',
														'search_items' => 'Search Member',
														'not_found' => 'No Member found',
														'not_found_in_trash' => 'No Member found in Trash',
														'parent' => 'Parent Member'
													),
										'public' => true,
										'publicly_queriable' => true,
										'show_ui' => true,
										'exclude_from_search' => true,
										'show_in_nav_menus' => true,
										'has_archive' => true,
										'rewrite' => true,
										'menu_position' => 6,
										'show_in_rest' => false,
										'supports' => array('title' , 'thumbnail'),
										'taxonomies' => array(''),
										'menu_icon' => 'dashicons-groups',
										'has_archive' => true
									));
		//Testimonial
	register_post_type( 'testimonial', array(
		'labels' => array(
						'name' => 'Testimonials',
						'singular_name' => 'Testimonial',
						'add_new' => 'Add New Testimonial',
						'add_new_item' => 'Add New Testimonial',
						'edit' => 'Edit',
						'edit_item' => 'Edit Testimonial',
						'new_item' => 'New Testimonial',
						'view' => 'View',
						'view_item' => 'View Testimonial',
						'search_items' => 'Search Testimonial',
						'not_found' => 'No Member Testimonial',
						'not_found_in_trash' => 'No Testimonial found in Trash',
						'parent' => 'Parent Testimonial'
					),
		'public' => true,
		'publicly_queriable' => true,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus' => true,
		'has_archive' => true,
		'rewrite' => true,
		'menu_position' => 6,
		'show_in_rest' => false,
		'supports' => array('title' , 'thumbnail'),
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-format-status',
		'has_archive' => true
	));

	register_post_type( 'pricing_table', array(
		'labels' => array(
			'name' => 'Pricing Table',
			'singular_name' => 'Pricing Table',
			'add_new' => 'Add New Pricing Table',
			'add_new_item' => 'Add New Pricing Table',
			'edit' => 'Edit',
			'edit_item' => 'Edit Pricing Table',
			'new_item' => 'New Pricing Table',
			'view' => 'View',
			'view_item' => 'View Pricing Table',
			'search_items' => 'Search Pricing Table',
			'not_found' => 'No Pricing Table found',
			'not_found_in_trash' => 'No Pricing Table found in Trash',
			'parent' => 'Parent Pricing Table'
		),
		'public' => true,
		'publicly_queriable' => true,
		'show_ui' => true,
		'exclude_from_search' => true,
		'show_in_nav_menus' => true,
		'has_archive' => true,
		'rewrite' => true,
		'menu_position' => 5,
		'show_in_rest' => true,
		'supports' => array('title'),
		'taxonomies' => array(''),
		'menu_icon' => 'dashicons-table-col-after',
		'has_archive' => true
	));
}

/**
 * Category Badge With Color
 *
 * @return loop
 */
function prysm_category_name(){
    $catgorys = get_the_category();
    foreach( $catgorys as $key => $category):

        $catemeta = !empty(get_term_meta( $category->term_id, '_prysm_cate-color', true )) ? get_term_meta( $category->term_id, '_prysm_cate-color', true ) : "#1f5dda"; 
        ?>
        <a class="prysm-cate-name" href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
        <span><?php echo esc_html($category->cat_name); ?></span> 
        </a>
    <?php endforeach;
}

include ( plugin_dir_path(__FILE__) . 'taxonomies.php' );


include_once( plugin_dir_path(__FILE__) . 'library/widgets.php' );

include_once( plugin_dir_path(__FILE__) . "/library/elementor-icon.php");

include_once plugin_dir_path(__FILE__) . "/elementor/widget-core.php";
include_once plugin_dir_path(__FILE__) . "/elementor/index.php";
// SVG Support
function add_file_types_to_uploads($file_types){
$new_filetypes = array();
$new_filetypes['svg'] = 'image/svg+xml';
$file_types = array_merge($file_types, $new_filetypes );
return $file_types;
}
add_filter('upload_mimes', 'add_file_types_to_uploads');

define('ALLOW_UNFILTERED_UPLOADS', true);
function prysm_theme_support() {
    remove_theme_support( 'widgets-block-editor' );
}
add_action( 'after_setup_theme', 'prysm_theme_support' );
