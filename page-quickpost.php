<?php
/**
 * Template Name: Quickposts (project news)
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>

<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>

	<section class="quickposts-page-intro">
		<?php the_content(); ?>
	</section>

	<?php get_template_part( 'ywig-frontpage-sections/quickposts' ); ?>

</article>

<?php get_footer(); ?>
