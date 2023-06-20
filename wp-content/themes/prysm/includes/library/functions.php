<?php

function _WSH()
{
	return $GLOBALS['_sh_base'];
}
function prysm_get_categories($arg = false, $by_slug = false, $show_all = true)
{
	global $wp_taxonomies;


	$categories = get_terms(prysm_set( $arg, 'taxonomy', 'category' ), $arg);
	$cats = array();

	if( $show_all ) $cats[] = esc_html__( 'All Categories', 'prysm' );

	if( !is_wp_error( $categories ) ) {
	foreach($categories as $category)
	{
		if( $by_slug ) $cats[$category->slug] = $category->name;
		else $cats[$category->term_id] = $category->name;
	}
	}
	return $cats;
}

function prysm_the_pagination($args = array(), $echo = 1)
{
	global $wp_query;

	$default =  array(
					'base' 		=> str_replace( 99999, '%#%', esc_url( get_pagenum_link( 99999 ) ) ),
					'format' 	=> '?paged=%#%',
					'current'	=> max( 1, get_query_var('paged') ),
					'total' 	=> $wp_query->max_num_pages,
					'next_text' => '<i class="fas fa-angle-double-right"></i>',
					'prev_text' => '<i class="fas fa-angle-double-left"></i>',
					'type'		=>'list',
					"add_args" => false
				);
	$args = wp_parse_args($args, $default);

	$paginat = paginate_links($args);

		$pagination= str_replace("ul class='page-numbers" , "ul class='prysm-pagination pagination d-flex justify-content-center" , $paginat);


	if(paginate_links(array_merge(array('type'=>'array'),$args)))
	{
		if($echo)
			echo wp_kses( $pagination , prysm_expanded_alowed_tags() );

		return $pagination;
	}
}

// Breadcrumbs
function prysm_breadcrumb() {

    // Settings
    $separator          = "";
    $breadcrums_id      = '';
    $breadcrums_class   = 'breadcrumb d-flex justify-content-center';
    $home_title         = esc_html__("Home", 'prysm');



    // Get the query & post information
    global $post;

    // Do not display on the homepage
    if ( !is_home() ) {

        // Build the breadcrums
        echo '<ul class="' . $breadcrums_class . '">';

        // Home page
        echo '<li><a class="breadcrumbs__link" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() && !is_author() ) {

            echo '<li><a class="breadcrumbs__link">' . post_type_archive_title('', false) . '</a></li>';

        }
		else if ( is_archive() && is_tax() && !is_category() && !is_tag() && !is_author()  ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li><a class="breadcrumbs__link" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li><a class="breadcrumbs__link">' . $custom_tax_name . '</a></li>';

        }
		else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li><a class="breadcrumbs__link" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

				$arr_valux = array_values($category);

                // Get last category post is in
                $last_category = end($arr_valux);

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
					$parent= str_replace("a href=" , "a class='breadcrumbs__link' href=" , $parents);
                    $cat_display .= '<li>'.$parent.'</li>';
                }

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo wp_kses( $cat_display , prysm_expanded_alowed_tags());
                echo '<li class="breadcrumb-item active"><span class="breadcrumbs__link">' . get_the_title() . '</span></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li><a class="breadcrumbs__link" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';

                echo '<li class="breadcrumb-item active"><span class="breadcrumbs__link">' . get_the_title() . '</span></li>';

            } else {

                echo '<li class="breadcrumb-item active"><span class="breadcrumbs__link">' . get_the_title() . '</span></li>';

            }

        }
		else if ( is_category() ) {

            // Category page
            echo '<li><a class="breadcrumbs__link>"' . single_cat_title('', false) . '</a></li>';

        }
		else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li><a class="breadcrumbs__link" href="' . get_permalink($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                }

                // Display parent pages
				echo wp_kses( $parents , prysm_expanded_alowed_tags());

                // Current page
                echo '<li class="breadcrumb-item active"><span>' . get_the_title() . '</span></li>';

            } else {

                // Just display current page if not parents
                echo '<li class="breadcrumb-item active"><span>' . get_the_title() . '</span></li>';

            }

        }
		else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li><a class="breadcrumbs__link">' . $get_term_name . '</a></li>';

        }
		elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li><a class="breadcrumbs__link" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month link
            echo '<li><a class="breadcrumbs__link" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';

            // Day display
            echo '<li><a class="breadcrumbs__link">' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</a></li>';

        }
		else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li><a class="breadcrumbs__link bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';

            // Month display
            echo '<li><a class="breadcrumbs__link">' . get_the_time('M') . ' Archives</a></li>';

        }
		else if ( is_year() ) {

            // Display year archive
            echo '<li><a class="breadcrumbs__link">' . get_the_time('Y') . ' Archives</a></li>';

        }
		else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li><a class="breadcrumbs__link">' . 'Author: ' . $userdata->display_name . '</a></li>';

        }
		else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li><a class="breadcrumbs__link">'.__('Page', 'prysm') . ' ' . get_query_var('paged') . '</a></li>';

        }
		else if ( is_search() ) {

            // Search results page
            echo '<li><a class="breadcrumbs__link">Search results for: ' . get_search_query() . '</a></li>';

        }
		elseif ( is_404() ) {

            // 404 page
            echo '<li><a class="breadcrumbs__link">' . '404' . '</a></li>';
        }

        echo '</ul>';

    }

	else{
		echo '<ul class="' . $breadcrums_class . '">
				<li><a href="'.esc_url( home_url( '/' ) ).'" class="breadcrumbs__link">'.esc_html__('Home', 'prysm').'</a></li>
				<li class="breadcrumb-item active"><span class="breadcrumbs__link">'.esc_html__("Blog" , 'prysm').'</span></li>
			  </ul>';
	}

}
function prysm_list_comments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	$current_comment = get_comment_text();
	$new = str_replace("<p>","",$current_comment);
	$new_one = str_replace("</p>","",$new);
?>
<div id="comment-<?php echo comment_ID(); ?>" class="pr-blog-comment-block comment-<?php echo comment_ID(); ?>">
	<?php if( get_avatar($comment) ): ?>
	<div class="pr-blog-comment-img float-left">
		<?php echo get_avatar($comment, 90); ?>
	</div>
	<?php endif; ?>
	<div class="pr-blog-comment-text headline pera-content position-relative">
		<h4><?php echo get_comment_author_link(); ?></h4>
		<span><?php echo get_comment_time( 'F m, Y' ).' at '.get_comment_time( 'h:i a' ) ; ?> </span>
		<p><?php echo wp_kses($new_one, prysm_expanded_alowed_tags()); ?></p>
		<?php
			$myclass = 'prd-reply-btn text-center text-uppercase';
			echo preg_replace( '/comment-reply-link/', 'comment-reply-link ' . $myclass,
				get_comment_reply_link(array_merge( $args, array(
					'depth' => $depth,
					'reply_text' => __("Reply <i class='fas fa-chevron-right'></i>" , 'prysm'),
					'max_depth' => $args['max_depth']))), 1 );
		?>
	</div>
<?php
}

function prysm_comment_form( $args = array(), $post_id = null, $review = false )
{

	if ( null === $post_id )
		$post_id = get_the_ID();
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) )
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html5    = 'html5' === $args['format'];
	$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$fields   =  array(
					'author'=> '<div class="prd-comment-input-wrap d-flex">
									<input id="author" name="author" type="text" placeholder="'.esc_attr__("Name" , 'prysm').'" required/>',

					'email'	=>	'	<input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="'.esc_attr__("Email" , 'prysm').'" required/>',

					'url'	=> '	<input id="url" name="url" type="text" placeholder="'.esc_attr__("Website" , 'prysm').'" />
								</div>',

					'cookies'=> '<span class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" class="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' . '<label for="wp-comment-cookies-consent">' . esc_html__( ' Save my details in this browser for the next time I comment.' , 'prysm' ) . '</label></span>',
				);

	$required_text = sprintf( ' ' . esc_html__('Required fields are marked %s', 'prysm'), '<span class="required">*</span>' );

	$fields		= apply_filters( 'comment_form_default_fields', $fields );
	$defaults	= array(
					'fields'		=> $fields,
					'comment_field'	=>	'<textarea id="comment" name="comment" placeholder="'. esc_html__( 'Your Comment here...', 'prysm' ).'" required></textarea>',

					'must_log_in'	=> '<div class="col-sm-12 log-text no-pad">' . sprintf( wp_kses( 'You must be <a href="%s">logged in</a> to post a comment.' , prysm_expanded_alowed_tags() ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',

					'logged_in_as'	=> '<div class="col-sm-12 log-text no-pad">' . sprintf( wp_kses( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' , prysm_expanded_alowed_tags() ), get_edit_user_link(), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</div>',

					'comment_notes_before' => '<label>' . esc_html__('Your email address will not be published *', 'prysm' ) . '</label>',

					'comment_notes_after'  => '',

					'id_form'              => 'respond-form',
					'id_submit'            => 'submit',
					'title_reply'          => esc_html__( 'Post A Comment', 'prysm' ),
					'title_reply_to'       => esc_html__( 'Leave a Reply to %s', 'prysm' ),
					'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'prysm' ),
					'label_submit'         => esc_html__( 'Post Comment', 'prysm' ),
					'format'               => 'xhtml',
				  );

	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	if ( comments_open( $post_id ) ) :

        do_action( 'comment_form_before' );
?>
		<div id="respond" class="comment-respond">
        	<h3>
            	<?php comment_form_title( $args['title_reply'], $args['title_reply_to'] ); ?>
                <small><?php cancel_comment_reply_link( $args['cancel_reply_link'] ); ?></small>
            </h3>
           <div class="prd-blog-comment-form">
<?php
		if ( get_option( 'comment_registration' ) && !is_user_logged_in() ) :

            echo prysm_set($args, 'must_log_in');

            do_action( 'comment_form_must_log_in_after' );
		else :
?>
			<form action="<?php echo site_url( '/wp-comments-post.php' ); ?>" method="post" id="<?php echo esc_attr( $args['id_form'] ); ?>" class="comment-form" novalidate>
				<div class="prd-comment-form-input">
				<?php
					echo '' . $args['comment_notes_before'];

					do_action( 'comment_form_top' );

					if ( is_user_logged_in() ) {

						echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

						do_action( 'comment_form_logged_in_after', $commenter, $user_identity );
					}
					else {

						do_action( 'comment_form_before_fields' );

						foreach ( (array) $args['fields'] as $name => $field ) {

							echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

						}
						do_action( 'comment_form_after_fields' );

					}

					echo apply_filters( 'comment_form_field_comment', $args['comment_field'] );

					echo prysm_set($args, 'comment_notes_after');
?>
					<button id="<?php echo esc_attr( $args['id_submit'] ); ?>" name="submit" type="submit"><?php echo esc_html( $args['label_submit'] ); ?></button>

                    <?php comment_id_fields( $post_id ); ?>
                    <?php do_action( 'comment_form', $post_id ); ?>
				</div>
			</form>
				<?php endif; ?>
            </div>
			</div><!-- #respond -->
			<?php
			do_action( 'comment_form_after' );
		else :
			do_action( 'comment_form_comments_closed' );
		endif;
}

function prysm_expanded_alowed_tags() {
	$my_allowed = wp_kses_allowed_html( 'post' );

	// Comment
	$my_allowed['abbr']		= array('title' => array());
	$my_allowed['acronym']	= array('title' => array());
	$my_allowed['b'] 		= array('style' => array());
	$my_allowed['br'] 		= array('class' => array(), 'style' => array());
	$my_allowed['s'] 		= array('style' => array());
	$my_allowed['strike'] 	= array('style' => array());
	$my_allowed['strong'] 	= array('style' => array());
	$my_allowed['em'] 		= array('style' => array());
	$my_allowed['i'] 		= array('class' => array(),'style' => array());
	$my_allowed['cite'] 	= array('style' => array());
	$my_allowed['code'] 	= array('style' => array());
	$my_allowed['blockquote'] = array('cite' => array());
	$my_allowed['q'] 		= array('cite' => array());
	$my_allowed['del'] 		= array('datetime' => array());
	$my_allowed['img'] 		= array('src' => array(),'height' => array(),'width' => array(),'class' => array(),'alt' => array(),'srcset' => array());
	// iframe
	$my_allowed['iframe'] 	= array('src' => array(),'height' => array(),'width' => array(),'frameborder' => array(),'allowfullscreen' => array());

	// form fields - input
	$my_allowed['input'] 	= array('class' => array(),'id' => array(),'name' => array(),'value' => array(),'type' => array());

	// select
	$my_allowed['select'] 	= array('class' => array(),'id' => array(),'name' => array(),'value' => array(),'type' => array());

	// select options
	$my_allowed['option'] 	= array('selected' => array());

	// style
	$my_allowed['style'] 	= array('types' => array());

	// span
	$my_allowed['span'] 	= array('class' => array());

	$my_allowed['h1'] 		= array('class' => array());
	$my_allowed['h2'] 		= array('class' => array());
	$my_allowed['h3'] 		= array('class' => array());
	$my_allowed['h4'] 		= array('class' => array());
	$my_allowed['h5'] 		= array('class' => array());
	$my_allowed['h6'] 		= array('class' => array());
	$my_allowed['hr'] 		= array('class' => array(),'style' => array());

	// Anchor
	$my_allowed['a'] 		= array('class' => array(),'href' => array(),'title' => array(),'style' => array());

	// Listing
	$my_allowed['ul'] 		= array('id' => array(),'class' => array(),'style' => array());
	$my_allowed['ol'] 		= array('id' => array(),'class' => array(),'style' => array());
	$my_allowed['li'] 		= array('id' => array(),'class' => array(),'style' => array());

	return $my_allowed;
}

//add_filter('deprecated_constructor_trigger_error', '__return_false');

function prysm_tgm_style() {
        wp_register_style( 'custom-wp-admin-css', get_template_directory_uri() . '/css/site-options.css', false, '1.0.0' );
        wp_enqueue_style( 'custom-wp-admin-css' );
}
add_action( 'admin_enqueue_scripts', 'prysm_tgm_style' );

function prysm_conditional_scripts() {

	// Load the html5 shiv for IE9.
	wp_enqueue_script( 'prysm-shive-html', get_template_directory_uri() . '/js/html5shiv.min.js');
	wp_script_add_data( 'prysm-shive-html', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'prysm_conditional_scripts' );



function prysm_grabing_vid_ID($link) {
  $pattern = '%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i';
  if (preg_match($pattern, $link, $match)) {
    return $match[1];
  }
  return false;
}
function wp_get_menu_array($array_menu) {

    $menu = array();
    foreach ( (array)$array_menu as $m) {
        if (empty($m->menu_item_parent)) {
            $menu[$m->ID] = array();
            $menu[$m->ID]['ID']          =   $m->ID;
            $menu[$m->ID]['title']       =   $m->title;
            $menu[$m->ID]['url']         =   $m->url;
            $menu[$m->ID]['children']    =   array();
        }
    }
    $submenu = array();
    foreach ( (array)$array_menu as $m) {
        if ($m->menu_item_parent) {
            $submenu[$m->ID] = array();
            $submenu[$m->ID]['ID']       =   $m->ID;
            $submenu[$m->ID]['title']    =   $m->title;
            $submenu[$m->ID]['url']      =   $m->url;
            $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
        }
    }

    return $menu;
}
function prysm_popup_form(){
	global $prysm;

	$heading 		= prysm_set($prysm, 'popup_heading');
	$text 		= prysm_set($prysm, 'popup_text');
	$form 		= prysm_set($prysm, 'popup_form');
	?>
	<!-- BEGIN TRIAL POPUP -->
	<div class="popup js-popup" id="trial-popup">
		<div class="popup__row">
			<div class="popup__cell">
				<div class="popup__window popup__window_bg">
                    <button class="popup__close close-button js-popup-close"></button>
                    <div class="popup__content">
                    <?php if($heading && $text):?>
                    	<div class="trial-form">
                        	<?php if($heading):?>
                        	<span class="trial-form__title"><?php echo wp_kses( $heading , prysm_expanded_alowed_tags());?></span>
                            <?php
								endif;
								if($text):
							?>
                            <span class="trial-form__text"><?php echo esc_html($text);?></span>
                            <?php endif;?>
                        </div>
                    <?php
						endif;
						if($form){
							$checkone = str_replace("`{`","[",$form);
							$checktwo = str_replace("`}`","]",$checkone);
							$cf7_code = str_replace("``","\"",$checktwo);
							echo do_shortcode($cf7_code);
						}
					?>
                    </div>
                    <span class="popup__pseudotitle" data-title="<?php echo esc_attr (strip_tags($heading));?>"></span>
				</div>
            </div>
            <div class="popup__mask js-popup-close"></div>
        </div>
	</div>
	<!-- TRIAL POPUP END -->
    <?php
}

// function to display number of posts.

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

function prysm_fonts_url() {
    $font_url = '';
    /**
    * Translators: If there are characters in your language that are not supported
    * by chosen font(s), translate this to 'off'. Do not translate into your own language.
    */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'prysm' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@400;500;600;700&display=swap';
    }
    return $font_url;
}

function prysm_scripts() {
	wp_enqueue_style( 'prysm-fonts', prysm_fonts_url(), [], null );
}
add_action( 'wp_enqueue_scripts', 'prysm_scripts' );