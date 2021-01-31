<?php
/**
 * The template for displaying comments (Adapted from Twenty_Twenty_One theme)
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @package ywig
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$ywig_comment_count = get_comments_number();
?>

<div id="comments" class="ywig-comments-wrap default-max-width <?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>">

	<?php
	if ( have_comments() ) :
		;
		?>
		<h2 class="comments-title">
			<?php if ( '1' === $ywig_comment_count ) : ?>
				<?php esc_html_e( '1 comment', 'ywig' ); ?>
			<?php else : ?>
				<?php
				printf(
					/* translators: %s: comment count number. */
					esc_html( _nx( '%s comment', '%s comments', $ywig_comment_count, 'Comments title', 'ywig' ) ),
					esc_html( number_format_i18n( $ywig_comment_count ) )
				);
				?>
			<?php endif; ?>
		</h2><!-- .comments-title -->

		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ul',
					'short_ping'  => true,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<?php
		the_comments_pagination(
			array(
				'class' => 'ywig-pagination',
			)
		);
		?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ywig' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'logged_in_as'       => null,
			'title_reply'        => esc_html__( 'Leave a comment', 'ywig' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
	?>

</div><!-- #comments -->
