<?php

/**
 * Project CPT
 *
 * @package ywig-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- <h1>content-project.php</h1> -->
	<header class="entry-header">
		<?php // the_title( '<h1 class="entry-title>', '</h1>' ); ?>
		<div class="entry-meta">
			<?php
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title heading-size-1"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			}
			?>
			
			(content-project.php)
			</div>
		</header>
		<div class="entry-content">
			
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="standard-featured">
					<?php the_post_thumbnail(); ?>
				</div>
				<?php endif; ?>
				
				<div class="entry-excerpt">
					The excerpt: 
					<?php the_excerpt(); ?>
				</div>
		</div>

		<a href="<?php the_permalink(); ?>" class="btn">
				<?php esc_html_e( 'Read More' ); ?>
		</a>

		<footer class="entry-footer">
				
		</footer>

	
</article>
