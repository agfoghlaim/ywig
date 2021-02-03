<?php
/**
 * Standard Page Format
 *
 * @package ywig-theme
 */

if ( is_singular() ) {
	$ywig_class = 'ywig-single';
} else {
	$ywig_class = 'ywig-non-single';
}

?>
<article  id="post-<?php the_ID(); ?>" <?php post_class( $ywig_class ); ?>>

	<div class="entry-content">
			<?php the_content(); ?>	
	</div>
</article>
