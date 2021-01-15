<?php
/**
 * YWIG Single Post
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>

	<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
	<h2>This is single.php for regular posts</h2>
<?php

		// Start the loop.
while ( have_posts() ) :
	the_post();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	get_template_part( 'template-parts/content/content-single');



	?>

	</article>
	
	<?php

	// Previous/next post navigation.
	the_post_navigation(
		array(
			'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
			'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
				'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
				'<span class="post-title">%title</span>',
		)
	);

	// End the loop.
		endwhile;
?>

<?php
get_footer();

