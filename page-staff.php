<?php
/**
 * Template Name: All Staff
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>
<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
	<section class="staff-page-intro">
			<?php the_content(); ?>
		</section>

		<div class="page-staff-wrap">
	<?php

	$terms = get_terms(
		array(
			'taxonomy'   => 'staff',
			'hide_empty' => false, // important to show staff other than those assigned to a project.
			'orderby'    => 'name',
		)
	);


	foreach ( $terms as $the_term ) {

		$staff_name      = get_field( $the_term->taxonomy . '_first_name', 'term_' . $the_term->term_id );
		$staff_surname   = get_field( $the_term->taxonomy . '_surname', 'term_' . $the_term->term_id );
		$email           = get_field( $the_term->taxonomy . '_email', 'term_' . $the_term->term_id );
		$phone           = get_field( $the_term->taxonomy . '_phone', 'term_' . $the_term->term_id );
		$staff_image     = get_field( $the_term->taxonomy . '_pic', 'term_' . $the_term->term_id );
		$job             = get_field( $the_term->taxonomy . '_job_title', 'term_' . $the_term->term_id );
		$about           = get_field( $the_term->taxonomy . '_about', 'term_' . $the_term->term_id );
		$staff_image_url = $staff_image['sizes']['thumbnail'];

		if ( ! empty( $staff_image['url'] ) ) {
			$is_staff_pic = true;
		} else {
			$is_staff_pic = false;
		}

		// Get projects that each staff member works at.

		include locate_template( 'template-parts/content/content-staff-member-intro.php', false, false );
	}

	?>
	</div><!-- .page-staff-wrap -->
</article>
<?php get_footer(); ?>
