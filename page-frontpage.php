<?php
/**
 * Template Name: Frontpage
 *
 * @package ywig-theme
 */

?>
<?php get_header( ); ?>
<!-- <main id="main"> -->
	<?php get_template_part( 'template-parts/sections/heroine-section-3' ); ?>
	<?php get_template_part( 'template-parts/sections/about-section-2' ); ?>
	<?php get_template_part( 'template-parts/sections/locations-section' ); ?>
	<?php get_template_part( 'template-parts/sections/youth-clubs-section' ); ?>
	<?php get_template_part( 'template-parts/sections/quickposts-section' ); ?>
	<?php get_template_part( 'template-parts/sections/funders-section' ); ?>
<!-- </main> -->
<?php
get_footer();
