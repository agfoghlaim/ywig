<?php

require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/customizer/about-section.php';
// require get_template_directory() . '/inc/customizer/heroine-section.php';
require get_template_directory() . '/inc/customizer/heroine-section-alt.php';
require get_template_directory() . '/inc/customizer/about-section-alt.php';
require get_template_directory() . '/inc/customizer/test-section.php';
require get_template_directory() . '/inc/cpt/youth-clubs-cpt.php';
require get_template_directory() . '/inc/cpt/projects-cpt.php';
/**
 * Register Custom Navigation Walker
 */
function register_navwalker() {
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


add_theme_support( 'post-thumbnails' );
