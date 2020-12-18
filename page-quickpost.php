<?php
/**
 * Template Name: Quickposts
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>
<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
	<section class="quickposts-page-intro">
		<?php
			//the_title( '<h1>', '</h1>' );
			the_content();
		//the_post_thumbnail();
		?>
	</section>
		<?php // get_template_part( 'template-parts/sections/locations-section' ); ?>
		<?php // require_once get_template_directory() . '/ywig-frontpage-sections/quickposts.php'; ?>
		<?php get_template_part( 'template-parts/sections/quickposts-section' ); ?>
</article>
<?php get_footer(); ?>
