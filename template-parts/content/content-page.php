<?php

/**
 * Standard Post Format
 *
 * @package ywig-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<h1>content-page.php</h1>
	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title>', '</h1>' ); ?>

		<div class="entry-meta">
	
		</div>
		</header>
		<div class="entry-content">
			
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="standard-featured">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<div class="entry-excerpt">
				<?php the_content(); ?>
			</div>
		</div>

		<a href="<?php the_permalink(); ?>" class="btn">
				<?php esc_html_e( 'Read More' ); ?>
		</a>

		<footer class="entry-footer">

		</footer>

	
</article>
