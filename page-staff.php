<?php
/**
 * Template Name: All Staff
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>
	<main>
		<h1>page-staff.php</h1>
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

		$staff_fname     = get_field( $the_term->taxonomy . '_first_name', 'term_' . $the_term->term_id );
		$staff_lname     = get_field( $the_term->taxonomy . '_surname', 'term_' . $the_term->term_id );
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


		// try to get projects for each staff.
		$projects = get_posts(
			array(
				'post_type'   => 'project',
				'numberposts' => -1,
				// @codingStandardsIgnoreStart WordPress.VIP.SlowDBQuery.slow_db_query
				'tax_query'   => array(
					array(
						'taxonomy' => 'staff',
						'field'    => $the_term->term_id,
						'terms'    => $the_term->term_id, // Where term_id of Term 1 is "1".
					),
				),
			)
		);
		if ( is_array( $projects ) || is_object( $projects ) ) {

			$projects_for_this_staff_member = wp_list_pluck( $projects, 'post_title' );
		}


		?>
	
		<div class="page-staff-item">
				<?php

				if ( $is_staff_pic ) {

					?>
	
				<img  
					src="<?php echo esc_html( $staff_image_url ); ?>" 
					alt="<?php echo esc_html( $staff_image['alt'] ); ?>" 
					description="<?php echo esc_html( $staff_image['description'] ); ?>" 
				/>
	
					<?php

				} else {

					get_template_part( 'template-parts/svgs/svg-user' );

				}

				?>

			<h3><?php echo isset( $staff_fname ) ? esc_html( $staff_fname ) : ''; ?> <?php echo isset( $staff_lname ) ? esc_html( $staff_lname ) : ''; ?> </h3> 
			<?php echo isset( $job ) ? '<p class="ywig-staff-subtext">' . esc_html( $job ) . '<p>' : null; ?> 
			<?php echo isset( $email ) ? '<span>' . esc_html( $email ) . '</span>' : null; ?> 
			<?php echo isset( $phone ) ? '<span>' . esc_html( $phone ) . '</span>' : null; ?> 
			<?php echo isset( $about ) ? '<p>' . esc_html( $about ) . '</p>' : null; ?> 


			<?php echo isset( $staff_fname ) && ! empty( $projects_for_this_staff_member ) ? '<p class="ywig-staff-bio">' . esc_html( $staff_fname ) . ' works at ' : null; ?> 
			<?php
			if ( isset( $projects_for_this_staff_member ) ) {
				foreach ( $projects_for_this_staff_member as $key => $value ) {
					if ( 0 === $key ) {
						echo esc_html( $value );
					} else {
						echo esc_html( ', ' . $value );
					}
				}
			}
			?>
		</p> 

		</div>	
		<?php
	}

	?>
	</div><!-- .page-staff-wrap -->
	</main>
<?php get_footer(); ?>
