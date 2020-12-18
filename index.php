<?php
/**
 * YWIG Theme
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">

	<?php
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content', get_post_type() );
		}
	} else {

		// If no content, include the "No posts found" template.
		get_template_part( 'template-parts/content/content', 'none' );

	}
	?>
</div>

<h1>index.php</h1>
<?php
get_footer();
