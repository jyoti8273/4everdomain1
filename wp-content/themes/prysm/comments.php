<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
	
if ( ! comments_open() && !get_comments_number() ) return;
?>
<div class="pr-blog-comment headline">
	<?php if ( have_comments() ) : ?>
		<h3><?php comments_number( 'Comments (0)', 'Comment (1)', 'Comments (%)' ); ?></h3>
		<div class="pr-blog-comment-block-wrapper">
			<?php
				wp_list_comments( array(
					'style'       => 'div',
					'short_ping'  => true,
					'avatar_size' => 90,
					'callback'=>'prysm_list_comments',

				) );
			?>
		</div>
		 <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :?>

		<nav class="comments-pagination clearfix">
			<span class="comments-pagination-link-left">
			<?php next_comments_link( esc_html__( '&laquo; Newer Comments', 'prysm' ) ); ?>
			</span>
			<span class="comments-pagination-link-right">
			<?php previous_comments_link( esc_html__( 'Older Comments &raquo;', 'prysm' ) ); ?> 
			</span>
		</nav>
			<!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
			<p class="no-comments text-center"><strong><?php esc_html_e( 'Comments are closed.' , 'prysm' ); ?></strong></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php prysm_comment_form(); ?>
</div>