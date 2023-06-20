<?php

// Categories
class prysm_categories extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_categories',
					/* Name */esc_html__('Categories (prysm)','prysm'),
					array(
						'description' => esc_html__('Show Posts Categories', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );



		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );
		?>
		<div class="pr-cat-widget position-relative">
	<?php

		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;
		$categories = get_categories();
	?>

            <ul>
            	<?php
					foreach((array)$categories as $cat) {
						 echo '<li><a href="'.get_category_link($cat->cat_ID).'" >'. $cat->cat_name . '<span> '. $cat->category_count.'</span></a></li>';
					}
				?>
            </ul>
</div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags());
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];


		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : esc_html__('Categories ', 'prysm');

?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>


		<?php
	}

}

// Blog Posts
class prysm_blog_posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_blog_posts',
					/* Name */esc_html__('Recent News (prysm)','prysm'),
					array(
						'description' => esc_html__('Showcase your Blog Posts', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$number = $instance['number'];
		$cat = $instance['cat'];
		$order_by = $instance['order_by'];
		$order_ad = $instance['order_ad'];

		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );
		?><div class="pr-rec-widget position-relative"><?php

		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;
?>
            	<?php
					$args = array('post_type' => 'post', 'posts_per_page' => $number, 'orderby' => $order_by, 'order' => $order_ad );
					if( $cat )
						$args['tax_query'] = array( array( 'taxonomy' => 'category', 'field' => 'id', 'terms' => $cat ) );

					$new_query = new WP_Query( $args );
					if( $new_query -> have_posts() ):
						while( $new_query -> have_posts() ):
							$new_query -> the_post();
							$categories = get_the_category();
						if(has_post_thumbnail()):
				?>

			<div class="pr-recent-blog-img-text clearfix">
				<div class="pr-recent-blog-img float-left">
					<?php the_post_thumbnail('prysm-58x68');?>
				</div>
				<div class="pr-recent-blog-text headline">
					<h3><a href="<?php the_permalink(); ?>"><?php print wp_trim_words(get_the_title(), 6, ''); ?></a></h3>
					<span><i class="far fa-calendar-alt"></i> <?php the_time('jS F Y'); ?></span>
				</div>
			</div>


                <?php
							endif;
						endwhile;
					endif;
					wp_reset_postdata();
				?>
            </div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags() );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		$instance['order_by'] = $new_instance['order_by'];
		$instance['order_ad'] = $new_instance['order_ad'];

		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : esc_html__('Recent News', 'prysm');
		$number = ( $instance ) ? $instance['number'] : 3;
		$cat = ( $instance ) ? $instance['cat'] : '';
		$order_by = ( $instance ) ? $instance['order_by'] : 'none';
		$order_ad = ( $instance ) ? $instance['order_ad'] : 'DESC';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" value="<?php echo esc_attr($number); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'prysm'); ?></label>
            <?php wp_dropdown_categories(
										array(
											'show_option_all'	=>	esc_html__('All Categories', 'prysm'),
											'selected'			=>	$cat,
											'class'				=>	'widefat',
											'name'				=>	$this->get_field_name('cat')
										)
				);
			?>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order_by'));?>"><?php esc_html_e('Order by: ', 'prysm'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('order_by')); ?>" name="<?php echo esc_attr($this->get_field_name('order_by')); ?>">
			  <option value="<?php echo esc_attr($order_by); ?>">--Sorting Order--</option>

			  <option value="none" <?php if($order_by=='none'){ ?> selected="selected" <?php }?>><?php esc_html_e('None', 'prysm') ?></option>
			  <option value="date" <?php if($order_by=='date'){ ?> selected="selected" <?php }?>><?php esc_html_e('Date', 'prysm') ?></option>
              <option value="title" <?php if($order_by=='title'){ ?> selected="selected" <?php }?>><?php esc_html_e('Title', 'prysm') ?></option>
			  <option value="name" <?php if($order_by=='name'){ ?> selected="selected" <?php }?>><?php esc_html_e('Name', 'prysm') ?></option>
              <option value="author" <?php if($order_by=='author'){ ?> selected="selected" <?php }?>><?php esc_html_e('Author', 'prysm') ?></option>
			  <option value="comment_count" <?php if($order_by=='comment_count'){ ?> selected="selected" <?php }?>><?php esc_html_e('Comment Count', 'prysm') ?></option>
              <option value="random" <?php if($order_by=='random'){ ?> selected="selected" <?php }?>><?php esc_html_e('Random', 'prysm') ?></option>
			</select>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order_ad'));?>"><?php esc_html_e('Order: ', 'prysm'); ?></label>
			<select class="widefat" id="<?php echo esc_attr($this->get_field_id('order_ad')); ?>" name="<?php echo esc_attr($this->get_field_name('order_ad')); ?>">
			  <option value="<?php echo esc_attr($order_ad); ?>">--Select Order--</option>

			  <option value="ASC" <?php if($order_ad=='ASC'){ ?> selected="selected" <?php }?>><?php esc_html_e('Ascending', 'prysm') ?></option>
			  <option value="DESC" <?php if($order_ad=='DESC'){ ?> selected="selected" <?php }?>><?php esc_html_e('Descending', 'prysm') ?></option>
			</select>
        </p>
		<?php
	}

}

// Tags
class prysm_tags extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_tags',
					/* Name */esc_html__('Tag Cloud (prysm)','prysm'),
					array(
						'description' => esc_html__('Show Posts Tags', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );



		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );
		?><div class="pr-tag-widget position-relative"><?php

		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;
		$tags = get_tags('post_tag');
?>
            <ul>
            	<?php
					foreach((array)$tags as $tag) {
						 ?>
                         	<li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"><?php echo esc_attr( $tag->name ); ?></a></li>
						 <?php
					}
				?>
            </ul>
        </div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags());
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];


		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : esc_html__('Tags ', 'prysm');

?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>


		<?php
	}

}

// Gallery Links
class prysm_gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_gallery',
					/* Name */esc_html__('Gallery (prysm)','prysm'),
					array(
						'description' => esc_html__('Show Gallery Images', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		$txt1 = $instance['txt1'];

		$txt2 = $instance['txt2'];

		$txt3 = $instance['txt3'];

		$txt4 = $instance['txt4'];

		$txt5 = $instance['txt5'];

		$txt6 = $instance['txt6'];

		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );?>
		<div class="pr-gallery-widget position-relative">
		<?php
		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;

?>
        <ul>
        	<?php if($txt1): ?>
			<li><a href="<?php echo esc_url($txt1); ?>" data-lightbox="Image"> <img src="<?php echo $txt1; ?>" alt="Image"></a></li>
            <?php
            	endif;
				if($txt2):
			?>
            <li><a href="<?php echo esc_url($txt2); ?>" data-lightbox="Image"><img src="<?php echo $txt2; ?>" alt="Image"></a></li>
            <?php
            	endif;

				if($txt3):
			?>
            <li><a href="<?php echo esc_url($txt3); ?>" data-lightbox="Image"><img src="<?php echo $txt3; ?>" alt="Image"></a></li>
			<?php
            	endif;

				if($txt4):
			?>
            <li><a href="<?php echo esc_url($txt4); ?>" data-lightbox="Image"><img src="<?php echo $txt4; ?>" alt="Image"></a></li>
            <?php
            	endif;

				if($txt5):
			?>
            <li><a href="<?php echo esc_url($txt5); ?>" data-lightbox="Image"><img src="<?php echo $txt5; ?>" alt="Image"></a></li>
			<?php
            	endif;

				if($txt6):
			?>
            <li><a href="<?php echo esc_url($txt6); ?>" data-lightbox="Image"><img src="<?php echo $txt6; ?>" alt="Image"></a></li>
            <?php endif; ?>
        </ul>
        </div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags() );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];

		$instance['txt1'] = $new_instance['txt1'];

		$instance['txt2'] = $new_instance['txt2'];

		$instance['txt3'] = $new_instance['txt3'];

		$instance['txt4'] = $new_instance['txt4'];

		$instance['txt5'] = $new_instance['txt5'];

		$instance['txt6'] = $new_instance['txt6'];


		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : esc_html__('Gallery', 'prysm');

		$txt1 = ( $instance ) ? $instance['txt1'] : '';

		$txt2 = ( $instance ) ? $instance['txt2'] : '';

		$txt3 = ( $instance ) ? $instance['txt3'] : '';

		$txt4 = ( $instance ) ? $instance['txt4'] : '';

		$txt5 = ( $instance ) ? $instance['txt5'] : '';

		$txt6 = ( $instance ) ? $instance['txt6'] : '';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt1')); ?>"><?php esc_html_e('Image Link 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt1')); ?>" name="<?php echo esc_attr($this->get_field_name('txt1')); ?>" type="text" value="<?php echo esc_attr($txt1); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt2')); ?>"><?php esc_html_e('Image Link 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt2')); ?>" name="<?php echo esc_attr($this->get_field_name('txt2')); ?>" type="text" value="<?php echo esc_attr($txt2); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt3')); ?>"><?php esc_html_e('Image Link 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt3')); ?>" name="<?php echo esc_attr($this->get_field_name('txt3')); ?>" type="text" value="<?php echo esc_attr($txt3); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt4')); ?>"><?php esc_html_e('Image Link 4', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt4')); ?>" name="<?php echo esc_attr($this->get_field_name('txt4')); ?>" type="text" value="<?php echo esc_attr($txt4); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt5')); ?>"><?php esc_html_e('Image Link 5', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt5')); ?>" name="<?php echo esc_attr($this->get_field_name('txt5')); ?>" type="text" value="<?php echo esc_attr($txt5); ?>" />
        </p>

		<p>
            <label for="<?php echo esc_attr($this->get_field_id('txt6')); ?>"><?php esc_html_e('Image Link 6', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt6')); ?>" name="<?php echo esc_attr($this->get_field_name('txt6')); ?>" type="text" value="<?php echo esc_attr($txt5); ?>" />
        </p>
		<?php
	}

}


// About Us footer
class prysm_footer_about_social extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_about_social',
					/* Name */esc_html__('About Us Footer (prysm)','prysm'),
					array(
						'description' => esc_html__('Show Site Details', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		$imglnk = $instance['imglnk'];
		$desc = $instance['desc'];

		$txt1 = $instance['txt1'];
		$lnk1 = $instance['lnk1'];

		$txt2 = $instance['txt2'];
		$lnk2 = $instance['lnk2'];

		$txt3 = $instance['txt3'];
		$lnk3 = $instance['lnk3'];

		$txt4 = $instance['txt4'];
		$lnk4 = $instance['lnk4'];

		$txt5 = $instance['txt5'];
		$lnk5 = $instance['lnk5'];

		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );?>
		<?php
		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;
?>
			<div class="pr-footer-logo">
                <a href="#"><img src="<?php echo esc_url($imglnk);?>" alt="logo"></a>
            </div>
            <p><?php echo wp_kses( $desc , prysm_expanded_alowed_tags() ); ?></p>
            <div class="pr-footer-social">
            	<?php if($txt1): ?>
                <a class="fb-icon" href="<?php echo esc_url( $lnk1 ? $lnk1 : '#'); ?>"><i class="<?php echo esc_attr($txt1); ?>"></i></a>
                 <?php
					endif;
					if($txt2):
				?>
                <a class="tw-icon" href="<?php echo esc_url( $lnk2 ? $lnk2 : '#'); ?>"><i class="<?php echo esc_attr($txt2); ?>"></i></a>
                <?php
					endif;
					if($txt3):
				?>
                <a class="dri-icon" href="<?php echo esc_url( $lnk3 ? $lnk3 : '#'); ?>"><i class="<?php echo esc_attr($txt3); ?>"></i></a>
                <?php
					endif;
					if($txt4):
				?>
                <a class="bh-icon" href="<?php echo esc_url( $lnk4 ? $lnk4 : '#'); ?>"><i class="<?php echo esc_attr($txt4); ?>"></i></a>
                 <?php
					endif;
					if($txt5):
				?>
                <a class="dri-icon" href="<?php echo esc_url( $lnk5 ? $lnk5 : '#'); ?>"><i class="<?php echo esc_attr($txt5); ?>"></i></a>
                <?php endif; ?>
            </div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags() );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];

		$instance['imglnk'] = $new_instance['imglnk'];
		$instance['desc'] 	= $new_instance['desc'];

		$instance['txt1'] = $new_instance['txt1'];
		$instance['lnk1'] = $new_instance['lnk1'];

		$instance['txt2'] = $new_instance['txt2'];
		$instance['lnk2'] = $new_instance['lnk2'];

		$instance['txt3'] = $new_instance['txt3'];
		$instance['lnk3'] = $new_instance['lnk3'];

		$instance['txt4'] = $new_instance['txt4'];
		$instance['lnk4'] = $new_instance['lnk4'];

		$instance['txt5'] = $new_instance['txt5'];
		$instance['lnk5'] = $new_instance['lnk5'];


		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : '';

		$imglnk = ( $instance ) ? $instance['imglnk'] : '';
		$desc = ( $instance ) ? $instance['desc'] : esc_html__('prysm Bagdonas Connor dimand Yauman, lecturers at Stanford’s to Graduat School Business, and hilariously explore.', 'prysm');

		$txt1 = ( $instance ) ? $instance['txt1'] : esc_html__('fab fa-facebook-f', 'prysm');
		$lnk1 = ( $instance ) ? $instance['lnk1'] : '#';

		$txt2 = ( $instance ) ? $instance['txt2'] : esc_html__('fab fa-twitter', 'prysm');
		$lnk2 = ( $instance ) ? $instance['lnk2'] : '#';

		$txt3 = ( $instance ) ? $instance['txt3'] : esc_html__('fab fa-youtube', 'prysm');
		$lnk3 = ( $instance ) ? $instance['lnk3'] : '#';

		$txt4 = ( $instance ) ? $instance['txt4'] : esc_html__('fab fa-behance', 'prysm');;
		$lnk4 = ( $instance ) ? $instance['lnk4'] : '#';

		$txt5 = ( $instance ) ? $instance['txt5'] : esc_html__('fab fa-youtube', 'prysm');;
		$lnk5 = ( $instance ) ? $instance['lnk5'] : '#';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('imglnk')); ?>"><?php esc_html_e('Image Path: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('imglnk')); ?>" name="<?php echo esc_attr($this->get_field_name('imglnk')); ?>" type="text" value="<?php echo esc_attr($imglnk); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php esc_html_e('Description: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>" type="text" value="<?php echo esc_attr($desc); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt1')); ?>"><?php esc_html_e('Icon Class 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt1')); ?>" name="<?php echo esc_attr($this->get_field_name('txt1')); ?>" type="text" value="<?php echo esc_attr($txt1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk1')); ?>"><?php esc_html_e('Link 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk1')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk1')); ?>" type="text" value="<?php echo esc_attr($lnk1); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt2')); ?>"><?php esc_html_e('Icon Class 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt2')); ?>" name="<?php echo esc_attr($this->get_field_name('txt2')); ?>" type="text" value="<?php echo esc_attr($txt2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk2')); ?>"><?php esc_html_e('Link 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk2')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk2')); ?>" type="text" value="<?php echo esc_attr($lnk2); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt3')); ?>"><?php esc_html_e('Icon Class 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt3')); ?>" name="<?php echo esc_attr($this->get_field_name('txt3')); ?>" type="text" value="<?php echo esc_attr($txt3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk3')); ?>"><?php esc_html_e('Link 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk3')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk3')); ?>" type="text" value="<?php echo esc_attr($lnk3); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt4')); ?>"><?php esc_html_e('Icon Class 4', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt4')); ?>" name="<?php echo esc_attr($this->get_field_name('txt4')); ?>" type="text" value="<?php echo esc_attr($txt4); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk4')); ?>"><?php esc_html_e('Link 4', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk4')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk4')); ?>" type="text" value="<?php echo esc_attr($lnk4); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt5')); ?>"><?php esc_html_e('Icon Class 5', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt5')); ?>" name="<?php echo esc_attr($this->get_field_name('txt5')); ?>" type="text" value="<?php echo esc_attr($txt5); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk5')); ?>"><?php esc_html_e('Link 5', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk1')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk5')); ?>" type="text" value="<?php echo esc_attr($lnk5); ?>" />
        </p>
		<?php
	}

}


// Footer Links
class prysm_footer_post_links extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_footer_links',
					/* Name */esc_html__('Footer Links (prysm)','prysm'),
					array(
						'description' => esc_html__('Show five Links', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		$txt1 = $instance['txt1'];
		$lnk1 = $instance['lnk1'];

		$txt2 = $instance['txt2'];
		$lnk2 = $instance['lnk2'];

		$txt3 = $instance['txt3'];
		$lnk3 = $instance['lnk3'];

		$txt4 = $instance['txt4'];
		$lnk4 = $instance['lnk4'];

		$txt5 = $instance['txt5'];
		$lnk5 = $instance['lnk5'];

		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );?>
		<div class="menu-widget">
		<?php
		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;
?>
        <ul>
        	<?php if($txt1): ?>
            <li><a href="<?php echo esc_url( $lnk1 ? $lnk1 : '#'); ?>"><?php echo esc_html($txt1); ?></a></li>
            <?php
            	endif;

				if($txt2):
			?>
            <li><a href="<?php echo esc_url( $lnk2 ? $lnk2 : '#'); ?>"><?php echo esc_html($txt2); ?></a></li>
            <?php
            	endif;

				if($txt3):
			?>
            <li><a href="<?php echo esc_url( $lnk3 ? $lnk3 : '#'); ?>"><?php echo esc_html($txt3); ?></a></li>
			<?php
            	endif;

				if($txt4):
			?>
            <li><a href="<?php echo esc_url( $lnk4 ? $lnk4 : '#'); ?>"><?php echo esc_html($txt4); ?></a></li>
            <?php
            	endif;

				if($txt5):
			?>
            <li><a href="<?php echo esc_url( $lnk5 ? $lnk5 : '#'); ?>"><?php echo esc_html($txt5); ?></a></li>
            <?php endif; ?>
        </ul>
        </div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags() );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];

		$instance['txt1'] = $new_instance['txt1'];
		$instance['lnk1'] = $new_instance['lnk1'];

		$instance['txt2'] = $new_instance['txt2'];
		$instance['lnk2'] = $new_instance['lnk2'];

		$instance['txt3'] = $new_instance['txt3'];
		$instance['lnk3'] = $new_instance['lnk3'];

		$instance['txt4'] = $new_instance['txt4'];
		$instance['lnk4'] = $new_instance['lnk4'];

		$instance['txt5'] = $new_instance['txt5'];
		$instance['lnk5'] = $new_instance['lnk5'];


		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : esc_html__('Quick link', 'prysm');

		$txt1 = ( $instance ) ? $instance['txt1'] : esc_html__('Home', 'prysm');
		$lnk1 = ( $instance ) ? $instance['lnk1'] : '#';

		$txt2 = ( $instance ) ? $instance['txt2'] : esc_html__('Services', 'prysm');
		$lnk2 = ( $instance ) ? $instance['lnk2'] : '#';

		$txt3 = ( $instance ) ? $instance['txt3'] : esc_html__('About us', 'prysm');
		$lnk3 = ( $instance ) ? $instance['lnk3'] : '#';

		$txt4 = ( $instance ) ? $instance['txt4'] : esc_html__('Testimonials', 'prysm');;
		$lnk4 = ( $instance ) ? $instance['lnk4'] : '#';

		$txt5 = ( $instance ) ? $instance['txt5'] : esc_html__('News', 'prysm');;
		$lnk5 = ( $instance ) ? $instance['lnk5'] : '#';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt1')); ?>"><?php esc_html_e('Text 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt1')); ?>" name="<?php echo esc_attr($this->get_field_name('txt1')); ?>" type="text" value="<?php echo esc_attr($txt1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk1')); ?>"><?php esc_html_e('Link 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk1')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk1')); ?>" type="text" value="<?php echo esc_attr($lnk1); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt2')); ?>"><?php esc_html_e('Text 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt2')); ?>" name="<?php echo esc_attr($this->get_field_name('txt2')); ?>" type="text" value="<?php echo esc_attr($txt2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk2')); ?>"><?php esc_html_e('Link 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk2')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk2')); ?>" type="text" value="<?php echo esc_attr($lnk2); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt3')); ?>"><?php esc_html_e('Text 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt3')); ?>" name="<?php echo esc_attr($this->get_field_name('txt3')); ?>" type="text" value="<?php echo esc_attr($txt3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk3')); ?>"><?php esc_html_e('Link 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk3')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk3')); ?>" type="text" value="<?php echo esc_attr($lnk3); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt4')); ?>"><?php esc_html_e('Text 4', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt4')); ?>" name="<?php echo esc_attr($this->get_field_name('txt4')); ?>" type="text" value="<?php echo esc_attr($txt4); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk4')); ?>"><?php esc_html_e('Link 4', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk4')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk4')); ?>" type="text" value="<?php echo esc_attr($lnk4); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt5')); ?>"><?php esc_html_e('Text 5', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt5')); ?>" name="<?php echo esc_attr($this->get_field_name('txt5')); ?>" type="text" value="<?php echo esc_attr($txt5); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk5')); ?>"><?php esc_html_e('Link 5', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk1')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk5')); ?>" type="text" value="<?php echo esc_attr($lnk5); ?>" />
        </p>
		<?php
	}

}

// Contact Infos
class prysm_footer_contact_info extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct(
					/* Base ID */'prysm_contact_infos',
					/* Name */esc_html__('Conatct Info (prysm)','prysm'),
					array(
						'description' => esc_html__('Show Contact Info', 'prysm' )
					)
		);
	}

	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		$txt1 = $instance['txt1'];
		$lnk1 = $instance['lnk1'];

		$txt2 = $instance['txt2'];
		$lnk2 = $instance['lnk2'];

		$txt3 = $instance['txt3'];
		$lnk3 = $instance['lnk3'];

		echo wp_kses( $before_widget , prysm_expanded_alowed_tags() );

		if($title):
			echo wp_kses( $before_title.$title.$after_title , prysm_expanded_alowed_tags() );
		endif;
?>
		<div class="address-widget">


			<ul>
				<?php if($txt1): ?>
					<li><i class="<?php echo esc_attr( $lnk1 ); ?>"></i><span> <?php echo wp_kses( $txt1 , prysm_expanded_alowed_tags())?> </span>  </li>
				<?php
            	endif;

				if($txt2):
			?>
					<li><i class="<?php echo esc_attr( $lnk2 ); ?>"></i><span> <?php echo wp_kses( $txt2 , prysm_expanded_alowed_tags())?> </span> </li>
				 <?php
            	endif;

				if($txt3):
			?>
					<li><i class="<?php echo esc_attr( $lnk3 ); ?>"></i> <span> <?php echo wp_kses( $txt3 , prysm_expanded_alowed_tags())?></span></li>
				<?php endif; ?>
			</ul>
        </div>
<?php
		echo wp_kses( $after_widget , prysm_expanded_alowed_tags() );
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = $new_instance['title'];

		$instance['txt1'] = $new_instance['txt1'];
		$instance['lnk1'] = $new_instance['lnk1'];

		$instance['txt2'] = $new_instance['txt2'];
		$instance['lnk2'] = $new_instance['lnk2'];

		$instance['txt3'] = $new_instance['txt3'];
		$instance['lnk3'] = $new_instance['lnk3'];


		return $instance;
	}

	function form($instance)
	{
		$title = ( $instance ) ? $instance['title'] : esc_html__("Contact info", 'prysm');

		$txt1 = ( $instance ) ? $instance['txt1'] : esc_html__('+123 (4567) 890', 'prysm');
		$lnk1 = ( $instance ) ? $instance['lnk1'] : esc_html__("fas fa-phone-alt", 'prysm');;

		$txt2 = ( $instance ) ? $instance['txt2'] : esc_html__('info@envato.com', 'prysm');
		$lnk2 = ( $instance ) ? $instance['lnk2'] : esc_html__("fas fa-envelope", 'prysm');;

		$txt3 = ( $instance ) ? $instance['txt3'] : esc_html__('380 St Kilda Road, Melbourne VIC 3004, Australia', 'prysm');
		$lnk3 = ( $instance ) ? $instance['lnk3'] : esc_html__("far fa-map-marker-alt", 'prysm');;
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt1')); ?>"><?php esc_html_e('Text 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt1')); ?>" name="<?php echo esc_attr($this->get_field_name('txt1')); ?>" type="text" value="<?php echo esc_attr($txt1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk1')); ?>"><?php esc_html_e('Icon 1', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk1')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk1')); ?>" type="text" value="<?php echo esc_attr($lnk1); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt2')); ?>"><?php esc_html_e('Text 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt2')); ?>" name="<?php echo esc_attr($this->get_field_name('txt2')); ?>" type="text" value="<?php echo esc_attr($txt2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk2')); ?>"><?php esc_html_e('Icon 2', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk2')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk2')); ?>" type="text" value="<?php echo esc_attr($lnk2); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('txt3')); ?>"><?php esc_html_e('Text 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('txt3')); ?>" name="<?php echo esc_attr($this->get_field_name('txt3')); ?>" type="text" value="<?php echo esc_attr($txt3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('lnk3')); ?>"><?php esc_html_e('Icon 3', 'prysm'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('lnk3')); ?>" name="<?php echo esc_attr($this->get_field_name('lnk3')); ?>" type="text" value="<?php echo esc_attr($lnk3); ?>" />
        </p>

		<?php
	}

}