<?php
/**
 * YWIG Single Post
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>

	<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>

		<div class="single-content-wrap ywig-content-wrap">
	<?php
	if ( have_posts() ) {

		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/content/content-single' );

		}
	}
	?>

</div>

<?php

	get_template_part( 'template-parts/ywig-components/post-preview-navigation' );

	// If comments are open or there is at least one comment, load up the comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
get_footer();

