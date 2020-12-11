<?php
/**
 * YWIG Theme
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main main-content"  class="site-main" role="main"> 
		<h1>index.php</h1>

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
	</main>

</div>

<?php
get_footer();
