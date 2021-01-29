<?php
/**
 * Template Name: Frontpage
 *
 * @package ywig-theme
 */

// Get should_show_section for each section. 'What' section handles itself.
$show_heroine    = get_theme_mod( 'heroine_show_section' );
$show_about      = get_theme_mod( 'about_show_section' );
$show_what       = get_theme_mod( 'what_show_section' );
$show_finder     = get_theme_mod( 'finder_show_section' );
$show_youthclubs = get_theme_mod( 'youthclubs_show_section' );
$show_funders    = get_theme_mod( 'funders_show_section' );
$show_quickposts = get_theme_mod( 'quickposts_show_section' );

?>
<?php get_header(); ?>
	<?php
	if ( $show_heroine ) {
		get_template_part( 'ywig-frontpage-sections/heroine' );
	}
	if ( $show_about ) {
		get_template_part( 'ywig-frontpage-sections/about' );
	}
	if ( $show_what ) {
		get_template_part( 'ywig-frontpage-sections/what' );
	}
	if ( $show_finder ) {

		get_template_part( 'ywig-frontpage-sections/ywig-finder' );
	}
	if ( $show_youthclubs ) {
		get_template_part( 'ywig-frontpage-sections/youthclubs' );
	}
	if ( $show_quickposts ) {
		get_template_part( 'ywig-frontpage-sections/quickposts' );
	}
	if ( $show_funders ) {
		get_template_part( 'ywig-frontpage-sections/funders' );
	}




	get_footer();
