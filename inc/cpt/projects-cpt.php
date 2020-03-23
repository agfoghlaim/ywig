<?php

/*

@package ywig-theme

CUSTOM POST TYPE - Projects

*/

function ywig_projects_cpt()
{

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
    'labels'             => $labels,
    'public'             => true,
    'has_archive'        => true,
    'publicly_queryable' => true,
    'show_in_nav_menus'  => true,
    'query_var'          => true,
    'rewrite'            => true,
    'capability_type'    => 'post',
    'hierarchical'       => true, // i think
    'supports'           => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revisions'
    ),
    //'taxonomies'          => array('category', 'post_tag'),
    'menu_position'       => 5,
    'exclude_from_search' => false
  );

  register_post_type('project', $args);
}
add_action('init', 'ywig_projects_cpt');




/* ===================================================

Meta boxes for cpt -  ( this should be in it's own file but i'm not sure if I'll end up putting this all in a plugin)

==============================================*/
function ywig_add_project_cpt_meta() {
  add_meta_box(
    'ywig_cpt_meta',
    'Project Meta',
    'ywig_projects_cpt_meta_callback',
    'project'
  );
}
add_action('add_meta_boxes', 'ywig_add_project_cpt_meta');

/*

List of meta fields used in Project CPT
Should only need to edit this to add/remove text fields
key = html name, value = html label

*/
function ywig_util_list_used_meta_text_fields_projects() {
  return [
    'project_name' => 'Project Name',
    'address' => 'Address',
    'eircode' => 'Eircode',
    'phone' => 'Phone Number',
    'map_link' => 'Map Link'
  ];
}

function ywig_util_get_project_meta_if_exists( $ywig_stored_meta, $field ) {

  if ( !empty( $ywig_stored_meta[ $field ] ) ) {
    return esc_attr($ywig_stored_meta[$field][0]);
  } else {
    return '';
  }

}

function ywig_projects_cpt_meta_callback( $post ) {

  wp_nonce_field('ywig_meta_projects_nonce', 'ywig_projects_nonce');

  $ywig_stored_meta = get_post_meta( $post->ID );
  $meta_fields = ywig_util_list_used_meta_text_fields_projects();

  // html output for each post meta <input />
  foreach ($meta_fields as $meta_field => $value) {
    $this_meta_field = ywig_util_get_project_meta_if_exists($ywig_stored_meta, $meta_field);
    ?>

    <div>
      <p><?php echo $value; ?></p>
      <input type="text" name="<?php echo $meta_field; ?>" value="<?php echo $this_meta_field; ?>" />
    </div>

    <?php
  }

}

function ywig_save_project_meta($post_id) {

  // Prepare checks
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_nonce_okay = (isset($_POST['ywig_projects_nonce'])
    && wp_verify_nonce($_POST['ywig_projects_nonce'], 'ywig_meta_projects_nonce')) ? true : false;
  
  // Check is safe to save or update post meta
  if ($is_autosave) return;
  if ($is_revision) return;
  if (!$is_nonce_okay) return;

  // Update/Save post meta
  $meta_fields = ywig_util_list_used_meta_text_fields_projects();

  foreach ($meta_fields as $meta_field => $value) { 
    if ( isset( $_POST[ $meta_field ] ) ) {
      update_post_meta( $post_id, $meta_field, sanitize_text_field( $_POST[ $meta_field ] ) );
    }
  }

}
add_action('save_post', 'ywig_save_project_meta');

