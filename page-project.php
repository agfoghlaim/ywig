<?php
/**
 * Template Name: Projects
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>
<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
	<section class="projects-page-intro">
		<?php
	
			the_content();
			//the_post_thumbnail();
		?>
	</section>
		<?php get_template_part( 'template-parts/sections/locations-section' ); ?>
</article>
<?php get_footer(); ?>
