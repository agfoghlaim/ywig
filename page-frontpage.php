<?php
/**
 * Template Name: Frontpage
 *
 * @package ywig-theme
 */
?>
<?php get_header(); ?>
<main>
	<?php // get_template_part( 'template-parts/sections/heroine-section-2' ); ?>
	<?php get_template_part( 'template-parts/sections/heroine-section-3' ); ?>
	<?php // get_template_part( 'template-parts/sections/heroine-section' ); ?>
	<?php // get_template_part( 'template-parts/sections/about-section' ); ?>
	<!-- <section class="about-anything" id="about"> -->
	<?php get_template_part( 'template-parts/sections/about-section-2' ); ?>
	<?php// get_template_part( 'template-parts/sections/what-section' ); ?>
	<!-- </section> -->
	<?php // get_template_part( 'template-parts/sections/feature-2-section' ); ?>
	<?php // get_template_part( 'template-parts/sections/about-section-alt' ); ?>
	<?php get_template_part( 'template-parts/sections/locations-section' ); ?>
	<?php get_template_part( 'template-parts/sections/youth-clubs-section' ); ?>
	<?php get_template_part( 'template-parts/sections/quickposts-section' ); ?>
	<?php get_template_part( 'template-parts/sections/funders-section' ); ?>
</main>
<?php
get_footer();
