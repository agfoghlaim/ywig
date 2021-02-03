<?php
/**
 * CUSTOM POST TYPE - Projects
 *
 * @package ywig
 */

/**
 * Register youthclub cpt.
 */
function ywig_projects_cpt() {
	$labels = array(
		'name'          => 'Projects',
		'singular_name' => 'Project',
		'plural_name'   => 'Projects',
		'add_new'       => 'Add Project',
		'all_items'     => 'All Projects',
		'edit_item'     => 'Edit Project',
		'view_item'     => 'View Project',
		'search_item'   => 'Search Projects',
		'not_found'     => 'No Projects Found',

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

	register_post_type( 'project', $args );
}
add_action( 'init', 'ywig_projects_cpt' );

