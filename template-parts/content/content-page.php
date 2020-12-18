<?php

/**
 * Standard Post Format
 *
 * @package ywig-theme
 */
?>

<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>

	<?php if ( has_post_thumbnail() ) : ?>

	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<a href="<?php the_permalink(); ?>" class="btn">
			<?php esc_html_e( 'Read More' ); ?>
	</a>

	<footer class="entry-footer">

	</footer>
</article>
