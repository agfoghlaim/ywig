<?php
/**
 * CUSTOM POST TYPE - YouthClubs
 *
 * @package ywig-theme
 */

/**
 * Register youthclub cpt.
 */
function ywig_youth_clubs_cpt() {
	$labels = array(
		'name'          => 'Youth Clubs',
		'singular_name' => 'Youth Club',
		'plural_name'   => 'Youth Clubs',
		'add_new'       => 'Add Youth Club',
		'all_items'     => 'All Youth Clubs',
		'edit_item'     => 'Edit Youth Club',
		'view_item'     => 'View Youth Club',
		'search_item'   => 'Search Youth Clubs',
		'not_found'     => 'No Youth Clubs Found',

	);

	$args = array(
		'labels'              => $labels,
		'public'              => true,
		'has_archive'         => true,
		'publicly_queryable'  => true,
		'show_in_nav_menus'   => true,
		'query_var'           => true,
		'rewrite'             => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
		'hierarchical'        => true,
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		'menu_position'       => 5,
		'exclude_from_search' => false,
	);

	register_post_type( 'youthclub', $args );
}
add_action( 'init', 'ywig_youth_clubs_cpt' );


/**
 * ACF cannot hide Gutenberg via 'Hide on screen' checkboxes.
 *
 * We want to hide it on Youth Clubs because the content isn't output anywhere in the theme so it's confusing to leave it visible in admin.
 *
 * @link https://github.com/AdvancedCustomFields/acf/issues/112#issuecomment-577624125
 */
function remove_guttenberg_from_pages() {
	remove_post_type_support( 'youthclub', 'editor' );
}
add_action( 'init', 'remove_guttenberg_from_pages', 10 );
