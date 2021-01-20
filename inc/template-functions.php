<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ywig-theme
 */

/**
 * Determines if post thumbnail can be displayed.
 *
 * @return bool
 */
function ywig_can_show_post_thumbnail() {
	return apply_filters(
		'ywig_can_show_post_thumbnail',
		! post_password_required() && ! is_attachment() && has_post_thumbnail()
	);
}


if ( ! function_exists( 'ywig_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 * Adapted from twenty-twentyone theme.
	 *
	 * @since 1.0.0
	 * @param string $size size of post thumbnail 'thumb', 'medium', 'medium_large' etc.
	 * @return void
	 */
	function ywig_post_thumbnail( $size = 'medium' ) {
		if ( ! ywig_can_show_post_thumbnail() ) {
			return;
		}
		?>

		<?php if ( is_singular() ) : ?>

			<figure class="post-thumbnail">
				<?php
				// Thumbnail is loaded eagerly because it's going to be in the viewport immediately.
				the_post_thumbnail( $size, array( 'loading' => 'eager' ) );
				?>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure><!-- .post-thumbnail -->

		<?php else : ?>

			<figure class="post-thumbnail">
				<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<?php the_post_thumbnail( $size ); ?>
				</a>
				<?php if ( wp_get_attachment_caption( get_post_thumbnail_id() ) ) : ?>
					<figcaption><?php echo wp_kses_post( wp_get_attachment_caption( get_post_thumbnail_id() ) ); ?></figcaption>
				<?php endif; ?>
			</figure>

		<?php endif; ?>
		<?php
	}
}
