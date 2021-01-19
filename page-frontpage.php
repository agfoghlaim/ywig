<?php
/**
 * Template Name: Frontpage
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>

	<?php get_template_part( 'ywig-frontpage-sections/heroine' ); ?>
	<?php get_template_part( 'ywig-frontpage-sections/about' ); ?>
	<?php get_template_part( 'ywig-frontpage-sections/what' ); ?>
	<?php get_template_part( 'ywig-frontpage-sections/ywig-finder' ); ?>
	<?php get_template_part( 'ywig-frontpage-sections/youthclubs' ); ?>
	<?php get_template_part( 'ywig-frontpage-sections/quickposts' ); ?>
	<?php get_template_part( 'ywig-frontpage-sections/funders' ); ?>
<?php
get_footer();
