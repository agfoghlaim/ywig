<?php
/**
 * Staff Taxonomy Template - old, taxonomy meta is now handled with acf.
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		<h6>taxonomy-staff.php</h6>
		

		<?php
		

		$the_term        = get_queried_object();
		$staff_name      = get_term_meta( $the_term->term_id, sprintf( 'ywig_staff_%s_metadata', 'name', true ) );
		$job_title       = get_term_meta( $the_term->term_id, sprintf( 'ywig_staff_%s_metadata', 'job_title', true ) );
		$email           = get_term_meta( $the_term->term_id, sprintf( 'ywig_staff_%s_metadata', 'email', true ) );
		$staff_phone     = get_term_meta( $the_term->term_id, sprintf( 'ywig_staff_%s_metadata', 'phone', true ) );
		$staff_image     = get_field( 'personpic', 'term_' . $the_term->term_id );
		$staff_image_url = $staff_image['sizes']['thumbnail'];

		if ( ! empty( $staff_image['url'] ) ) {
			$is_staff_pic = true;
		} else {
			$is_staff_pic = false;
		}

		?>

		<div style="background: gray;">
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

			<h1 style="display:block;">This Staff Member Dets - <?php echo esc_html( $the_term->name ); ?></h1>

			<p style="display:block;">Name:  <?php echo isset( $name[0] ) ? esc_html( $staff_name[0] ) : ''; ?> </p>

			<p style="display:block;">Email:  <?php echo isset( $email[0] ) ? esc_html( $email[0] ) : ''; ?> </p>

			<p style="display:block;">Phone:  <?php echo isset( $staff_phone[0] ) ? esc_html( $staff_phone[0] ) : ''; ?> </p>

		</div>

				<h4><?php echo esc_html( $the_term->name ); ?> works @ <?php echo esc_html( the_title() ); ?></h4>

			<?php

				the_post();

				$post_args = array(
					'post_type'   => 'project',
					'post_status' => 'publish',
					// @codingStandardsIgnoreStart WordPress.VIP.SlowDBQuery.slow_db_query
					'tax_query'   => array(
						array(
							'taxonomy' => 'staff',
							'field'    => $the_term->term_id,
							'terms'    => $the_term->term_id,
						),
					),
				);

				set_query_var( 'proj_args', $post_args );
	
				get_template_part( 'template-parts/projects-wrap' );

				?>

	</main>

<?php

get_footer();
