<?php
/**
 * Template to display single posts and attachments
 *
 * @package ywig-theme
 */

if ( is_singular() ) {
	$ywig_class = 'ywig-single';
} else {
	$ywig_class = 'ywig-non-single';
}

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $ywig_class ); ?>>
<div class="entry-header">

	<?php ywig_post_thumbnail( 'medium_large' ); ?>
</div>

	<div class="entry-content">

			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
	</div>
	<footer class="entry-footer">
	<div class="entry-meta">


	<span>Posted </span>
	<span class="entry-meta-date">
		<?php the_time( 'F jS, Y' ); ?>
	</span>
	<span> In </span>
	<span class="entry-meta-category">
		<?php the_category( ', ' ); ?>
	</span>
</div>


	</footer>
</article>

