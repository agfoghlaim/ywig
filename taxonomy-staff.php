<?php
/**
 * Staff Taxonomy Template
 *
 * @package ywig-theme
 */

get_header();
$this_term = get_queried_object();
set_query_var( 'taxonomy_loc_term', $this_term );
get_template_part( 'template-parts/content/content-taxonomy-entry-header' );
$the_term                            = get_queried_object();
$this_taxonomys_associated_post_type = get_taxonomy( $the_term->taxonomy )->object_type[0];
$this_terms_taxonomy                 = $the_term->taxonomy;


// $the_term->taxonomy will be 'staff' or 'club_contact'
$staff_name      = get_field( $the_term->taxonomy . '_first_name', 'term_' . $the_term->term_id );
$staff_surname   = get_field( $the_term->taxonomy . '_surname', 'term_' . $the_term->term_id );
$email           = get_field( $the_term->taxonomy . '_email', 'term_' . $the_term->term_id );
$phone           = get_field( $the_term->taxonomy . '_phone', 'term_' . $the_term->term_id );
$staff_image     = get_field( $the_term->taxonomy . '_pic', 'term_' . $the_term->term_id );
$job             = get_field( $the_term->taxonomy . '_job_title', 'term_' . $the_term->term_id );
$staff_image_url = $staff_image['sizes']['thumbnail'];
$about           = get_field( $the_term->taxonomy . '_about', 'term_' . $the_term->term_id );
?>

<div id="primary" class="content-area">

	<?php

	if ( ! empty( $staff_image['url'] ) ) {
		$is_staff_pic = true;
	} else {
		$is_staff_pic = false;
	}

	// wrap to get the css classes for page-staff.php
	?>

	<div class="taxonomy-staff-wrap">
		<?php require locate_template( 'template-parts/content/content-staff-member-intro.php', false, false ); ?>
	</div><!-- .page-staff-wrap -->

	<?php
	// For staff the associated post type will be 'project'.
	// for club-contacts the associated post type will be 'youthclub'.
	// $this_terms_taxonomy will be 'staff' or 'club-contact' where somebody's name eg marie will be $the_term->name.
	if ( ! empty( $this_taxonomys_associated_post_type ) && ! empty( $this_terms_taxonomy ) ) {

		// Get projects or youthclubs where this staff member works.
		$post_args = array(
			'post_type'   => $this_taxonomys_associated_post_type, // 'project' or 'youthclub'.
			'post_status' => 'publish',
			// @codingStandardsIgnoreStart WordPress.VIP.SlowDBQuery.slow_db_query
			'tax_query'   => array(
				array(
					'taxonomy' => $this_terms_taxonomy, // 'staff' or 'club-contacts'
					'field'    => $the_term->term_id, // id of a person eg marie a staff member
					'terms'    => $the_term->term_id,
				),
			),
		);

		set_query_var( 'proj_args', $post_args );
		set_query_var( 'terms_taxonomy', $this_terms_taxonomy );

		?>

		<div class="page-staff-wrap">
			<?php
				// this is not necesserary here but would make a good widget so not deleting yet.
				//get_template_part( 'template-parts/projects-wrap' );
			?>
		</div>
<?php
	}
get_footer();
