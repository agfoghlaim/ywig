<?php

/**
 * Standard Post Format (eg <site-url>/category/uncategorised/ via index.php)
 *
 * @package ywig-theme
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



<?php the_title( '<h2>', '</h2>' ); ?>
<div class="entry-meta">
By <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y'); ?>  in <?php the_category(', '); ?> 
	</div>
	
	<div class="entry-content">
		
		<?php if ( has_post_thumbnail() ) : ?>
			<div class="standard-featured">
				<?php the_post_thumbnail( 'medium' ); ?>
				
			</div>
			<?php endif; ?>
			
			<div class="entry-excerpt">
				<?php the_content(); ?>
				<h6>(content-post.php)</h6>
			</div>
		</div>

		
		<footer class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="btn btn-dark">
					<?php esc_html_e( 'Read More' ); ?>
			</a>

		</footer>

	
</article>
