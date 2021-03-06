<?php
/**
 * Standard Post Format
 *
 * @package ywig-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
		(content.phddp)
	</header>
	<div class="entry-content">

		<?php if ( has_post_thumbnail() ) : ?>
			<div class="standard-featured">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php endif; ?>

		<div class="entry-excerpt">
			<?php the_excerpt(); ?>
		</div>
	</div>

	<a href="<?php the_permalink(); ?>" class="btn">
			<?php esc_html_e( 'Read More' ); ?>
	</a>

	<footer class="entry-footer">
			footer
	</footer>
</article>
