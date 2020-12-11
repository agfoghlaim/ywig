<?php

/**
 * Standard Post Format
 *
 * @package ywig-theme
 */
?>

<style>
	.project {
		background: blue;
	}
</style>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- <h1>content-page.php</h1> -->
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title>', '</h2>' ); ?>
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
