<?php
/**
 * YWIG Theme functions and definitions
 *
 * @package ywig-theme
 */

require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/customizer/about-section.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer/heroine-section-alt.php';
require get_template_directory() . '/inc/customizer/counselling.php';
require get_template_directory() . '/inc/customizer/projects.php';
require get_template_directory() . '/inc/customizer/clubs.php';
require get_template_directory() . '/inc/customizer/programmes.php';
require get_template_directory() . '/inc/customizer/about-section-alt.php';
require get_template_directory() . '/inc/customizer/test-section.php';
require get_template_directory() . '/inc/cpt/youth-clubs-cpt.php';
require get_template_directory() . '/inc/cpt/projects-cpt.php';
require get_template_directory() . '/inc/cpt/quickposts-cpt.php';

// Handle SVG icons.
require get_template_directory() . '/inc/classes/class-ywig-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';


 add_theme_support( 'post-thumbnails' );


// temp, does this allow editors to upload files via rest-api? yes
// temp, does it stop admin having capability? No it doesn't.
$edit_admin = get_role( 'editor' );
$edit_admin->add_cap( 'unfiltered_upload' );
