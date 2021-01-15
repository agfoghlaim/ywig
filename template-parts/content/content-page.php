<?php

/**
 * Standard Page Format
 *
 * @package ywig-theme
 */
?>

<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php // get_template_part( 'template-parts/content/content-page-entry-header' ); ?>


		
		<div class="entry-content">
			<?php the_content(); ?>
		
	
	</div>


	<footer class="entry-footer">

	</footer>
</article>
