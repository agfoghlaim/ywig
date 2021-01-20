<?php
/**
 * Related to Youthclub CPT ('/youthclub').
 * Displays youthclub intro/excerpt whereas single-youthclub displays all info about youthclubs.
 *
 * @package ywig-theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="youthclubs-wrap">
		<?php get_template_part( 'template-parts/content/content', 'youthclub-intro' ); ?>
	</div>

</article>
