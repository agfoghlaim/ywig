<?php

/*
@package ywig-theme

CUSTOM POST TYPE - Locations

*/

function ywig_locations_cpt() {
	$labels = array(
		'name'          => 'Location',
		'singular_name' => 'Location',
		'plural_name'   => 'Locations',
		'add_new'       => 'Add Location',
		'all_items'     => 'All Locations',
		'edit_item'     => 'Edit Location',
		'view_item'     => 'View Location',
		'search_item'   => 'Search Locations',
		'not_found'     => 'No Locations Found',

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
		'hierarchical'        => true, // i think
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
		),
		// 'taxonomies'          => array('category', 'post_tag'),
		'menu_position'       => 5,
		'exclude_from_search' => false,
	);

	register_post_type( 'location', $args );
}
add_action( 'init', 'ywig_locations_cpt' );

// heirarchal
function ywig_custom_taxonomies() {
	$labels = array(
		'name'          => 'Project Locations',
		'singular_name' => 'Project Location',
		'search_items'  => 'Search Project Locations',
		'menu_name'     => 'Project Locations',
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'loc' ),
	);
	// ie show 'loc' only for location cpts
	register_taxonomy( 'loc', array( 'location' ), $args );
}

add_action( 'init', 'ywig_custom_taxonomies' );


/*
 ===================================================

Meta boxes for cpt -  ( this should be in it's own file but i'm not sure if I'll end up putting this all in a plugin)

==============================================*/
function ywig_add_cpt_meta() {
	add_meta_box(
		'ywig_cpt_meta',
		'Location Meta',
		'ywig_cpt_meta_callback',
		'location'
	);
}
add_action( 'add_meta_boxes', 'ywig_add_cpt_meta' );

/*
List of meta fields used in Location CPT
Should only need to edit this to add/remove text fields
key = html name, value = html label

*/
function ywig_util_list_used_meta_text_fields() {
	return array(
		'location_name' => 'Location Name',
		'address'       => 'Address',
		'eircode'       => 'Eircode',
		'phone'         => 'Phone Number',
		'map_link'      => 'Map Link',
	);
}

function ywig_util_get_meta_if_exists( $ywig_stored_meta, $field ) {

	if ( ! empty( $ywig_stored_meta[ $field ] ) ) {
		return esc_attr( $ywig_stored_meta[ $field ][0] );
	} else {
		return '';
	}

}

function ywig_cpt_meta_callback( $post ) {

	wp_nonce_field( 'ywig_meta_locations_nonce', 'ywig_locations_nonce' );

	$ywig_stored_meta = get_post_meta( $post->ID );
	$meta_fields      = ywig_util_list_used_meta_text_fields();

	// html output for each post meta <input />.
	foreach ( $meta_fields as $meta_field => $value ) {
		$this_meta_field = ywig_util_get_meta_if_exists( $ywig_stored_meta, $meta_field );
		?>

	<div>
	<p><?php echo esc_html( $value ); ?></p>
	<input type="text" name="<?php echo esc_attr( $meta_field ); ?>" value="<?php echo esc_attr( $this_meta_field ); ?>" />
	</div>

		<?php
	}

}

function ywig_save_meta( $post_id ) {

	// Prepare checks.
	$is_autosave   = wp_is_post_autosave( $post_id );
	$is_revision   = wp_is_post_revision( $post_id );
	$is_nonce_okay = ( isset( $_POST['ywig_locations_nonce'] )
	&& wp_verify_nonce( $_POST['ywig_locations_nonce'], 'ywig_meta_locations_nonce' ) ) ? true : false;

	// Check is safe to save or update post meta.
	if ( $is_autosave ) {
		return;
	}
	if ( $is_revision ) {
		return;
	}
	if ( ! $is_nonce_okay ) {
		return;
	}

	// Update/Save post meta.
	$meta_fields = ywig_util_list_used_meta_text_fields();

	foreach ( $meta_fields as $meta_field ) {

		if ( isset( $_POST[ $meta_field ] ) ) {

			update_post_meta( $post_id, $meta_field, sanitize_text_field( wp_unslash( $_POST[ $meta_field ] ) ) );
		}
	}

}
add_action( 'save_post', 'ywig_save_meta' );

