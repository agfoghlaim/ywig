<?php
/*
@package ywig-theme

CUSTOM POST TYPE - Quick Posts

*/

function ywig_quickposts_cpt() {
	$labels = array(
		'name'          => 'Quickposts',
		'singular_name' => 'Quickpost',
		'plural_name'   => 'Quickposts',
		'add_new'       => 'Add Quickpost',
		'all_items'     => 'All Quickposts',
		'edit_item'     => 'Edit Quickpost',
		'view_item'     => 'View Quickpost',
		'search_item'   => 'Search Quickposts',
		'not_found'     => 'No Quickposts Found',

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
		'hierarchical'        => false,
		'taxonomies'          => array( 'category' ),
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'revisions',
			'categories',
			'author',
			'page-attributes',
			'custom-fields', // this is an important one!
		),
		// 'taxonomies'          => array('category', 'post_tag'),
		'menu_position'       => 6,
		'exclude_from_search' => false,
	);

	register_post_type( 'quickpost', $args );
}
add_action( 'init', 'ywig_quickposts_cpt' );




/**
 *
 * Quickpost metabox - This adds the 'meta box', not any of the fields inside it.
 */
function ywig_add_quickpost_cpt_meta() {
	add_meta_box(
		'ywig_cpt_quickpost_meta',
		'Quickpost Meta',
		'ywig_quickposts_cpt_meta_callback',
		'quickpost'
	);
}
add_action( 'add_meta_boxes', 'ywig_add_quickpost_cpt_meta' );


/**
 *
 * List of meta fields used in Quickpost CPT
 */
function ywig_util_list_used_meta_text_fields_quickposts() {
	return array(
		'quickpost_link' => 'Quickpost Link',
		// 'quickpost_link_text' => 'Link Text',
		// 'featured_media_src'  => 'Featured Image src url',
	);
}

/**
 *
 * So meta fields show up in rest api
 */
$meta_args = array(
	'type'         => 'string',
	'single'       => true,
	'show_in_rest' => true,
);

register_post_meta( 'quickpost', 'quickpost_link', $meta_args );
register_post_meta( 'quickpost', 'quickpost_link_text', $meta_args );
register_post_meta( 'quickpost', 'featured_media_src', $meta_args );
register_post_meta( 'quickpost', 'related_project_id', $meta_args );

/**
 * Get saved Quickpost Meta values
 *
 * @param string $ywig_stored_meta Meta for this post.
 * @param string $field Name of meta field.
 */
function ywig_util_get_quickpost_meta_if_exists( $ywig_stored_meta, $field ) {

	if ( ! empty( $ywig_stored_meta[ $field ] ) ) {
		return esc_attr( $ywig_stored_meta[ $field ][0] );
	} else {
		return '';
	}

}

/**
 * Get saved Quickpost Meta values, show html fields.
 *
 * @param WP_Post $post This post.
 */
function ywig_quickposts_cpt_meta_callback( $post ) {

	wp_nonce_field( 'ywig_meta_quickposts_nonce', 'ywig_quickposts_nonce' );

	$ywig_stored_meta = get_post_meta( $post->ID );

	$meta_fields = ywig_util_list_used_meta_text_fields_quickposts();

	// html output for each post meta <input />
	foreach ( $meta_fields as $meta_field => $value ) {
		$this_meta_field = ywig_util_get_quickpost_meta_if_exists( $ywig_stored_meta, $meta_field );
		?>

	<div>

		<p><label><?php echo esc_attr( $value ); ?></label></p>

		<input type="text" name="<?php echo esc_attr( $meta_field ); ?>" value="<?php echo esc_attr( $this_meta_field ); ?>" />

		<?php
	}
	// End of foreach. Now add html for 'featured_media_src'.
	$saved_featured_image_url = ywig_util_get_quickpost_meta_if_exists( $ywig_stored_meta, 'featured_media_src' );
	$related_project_id       = ywig_util_get_quickpost_meta_if_exists( $ywig_stored_meta, 'related_project_id' );

	// Add input for featured media.
	?>
	
		<p ><label for="featured_media_src">Featured Image Url (updates automatically)</label></p>
		<input disabled type="text" id="featured_media_src" name="featured_media_src" value="<?php echo esc_attr( $saved_featured_image_url ); ?>" />
	<?php
		// Add input (dropdown) for parent/related_project_id
		$pages = wp_dropdown_pages(
			array(
				'post_type'        => 'project',
				'selected'         => $post->post_parent,
				'name'             => 'related_project_id',
				'show_option_none' => __( '(no related proect)' ),
				'sort_column'      => 'menu_order, post_title',
				'echo'             => 0,
			)
		);
	if ( ! empty( $pages ) ) {
		echo $pages;
	}
	?>
		
	</div>
	<?php

}

/**
 * Save quickpost meta. Note 'featured_media_src' <input> is disabled for user. Before saving it's updated with the thumbnail url of the featured image. This is needed for the wp-news app.
 *
 * @param int $post_id This post's ID.
 */
function ywig_save_quickpost_meta( $post_id ) {

	// Prepare checks.
	$is_autosave   = wp_is_post_autosave( $post_id );
	$is_revision   = wp_is_post_revision( $post_id );
	$is_nonce_okay = ( isset( $_POST['ywig_quickposts_nonce'] )
	&& wp_verify_nonce( $_POST['ywig_quickposts_nonce'], 'ywig_meta_quickposts_nonce' ) ) ? true : false;

	$featured_media_src = get_the_post_thumbnail_url( $post_id, 'thumbnail' );

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
	$meta_fields = ywig_util_list_used_meta_text_fields_quickposts();

	// NOT USED: Sanitize and save 'quickpost_link_text'.
	// if ( isset( $_POST['quickpost_link_text'] ) ) {
	// $safe_text = sanitize_text_field( $_POST['quickpost_link'] );
	// update_post_meta( $post_id, 'quickpost_link', $safe_text );
	// }

	// Sanitize and save 'quickpost_link'.
	if ( isset( $_POST['quickpost_link'] ) ) {
		$safe_url = esc_url_raw( wp_unslash( $_POST['quickpost_link'] ) );
		update_post_meta( $post_id, 'quickpost_link', $safe_url );
	}

	// Save featured media url.
	if ( isset( $featured_media_src ) && trim( $featured_media_src ) !== '' ) {
		update_post_meta( $post_id, 'featured_media_src', sanitize_text_field( $featured_media_src ) );
	}

	// NOT USED: Save related project.
	if ( isset( $_POST['related_project_id'] ) ) {
		update_post_meta( $post_id, 'related_project_id', wp_unslash( $_POST['related_project_id'] ) );
	}

}
add_action( 'save_post', 'ywig_save_quickpost_meta' );


