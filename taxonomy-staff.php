<?php
/**
 * Staff Taxonomy Template
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">
		<h6>taxonomy-staff.php</h6>

		<?php
		$this_term = get_queried_object();
		set_query_var( 'taxonomy_loc_term', $this_term );
		get_template_part( 'template-parts/content/content-taxonomy-entry-header' );
		$the_term                            = get_queried_object();
		$this_taxonomys_associated_post_type = get_taxonomy( $the_term->taxonomy )->object_type[0];
		$this_terms_taxonomy                 = $the_term->taxonomy;


		// $the_term->taxonomy will be 'staff' or 'club_contact'
		$staff_name      = get_field( $the_term->taxonomy . '_first_name', 'term_' . $the_term->term_id );
		$email           = get_field( $the_term->taxonomy . '_email', 'term_' . $the_term->term_id );
		$phone           = get_field( $the_term->taxonomy . '_phone', 'term_' . $the_term->term_id );
		$staff_image     = get_field( $the_term->taxonomy . '_pic', 'term_' . $the_term->term_id );
		$job             = get_field( $the_term->taxonomy . '_job_title', 'term_' . $the_term->term_id );
		$staff_image_url = $staff_image['sizes']['thumbnail'];

		if ( ! empty( $staff_image['url'] ) ) {
			$is_staff_pic = true;
		} else {
			$is_staff_pic = false;
		}

		?>

		<div>
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

			<h1 style="display:block;">This Staff Member Dets (taxonomy-staff.php) - <?php echo esc_html( $the_term->name ); ?></h1>
			<p style="display:block;">Name:  <?php echo isset( $name ) ? esc_html( $staff_name ) : ''; ?> </p>
			<p style="display:block;">Email:  <?php echo isset( $email ) ? esc_html( $email ) : ''; ?> </p>
			<p style="display:block;">Phone:  <?php echo isset( $phone ) ? esc_html( $phone ) : ''; ?> </p>
			<p style="display:block;">Job:  <?php echo isset( $job ) ? esc_html( $job ) : ''; ?> </p>

		</div>

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
					echo ywig_get_theme_svg( 'user' );
					//get_template_part( 'template-parts/svgs/svg-user' );

				}

				?>

			<h3><?php echo isset( $staff_fname ) ? esc_html( $staff_fname ) : ''; ?> <?php echo isset( $staff_lname ) ? esc_html( $staff_lname ) : ''; ?> </h3> 
			<?php echo isset( $job ) ? '<p class="ywig-staff-subtext">' . esc_html( $job ) . '<p>' : null; ?> 
			<?php echo isset( $email ) ? '<span>' . esc_html( $email ) . '</span>' : null; ?> 
			<?php echo isset( $phone ) ? '<span>' . esc_html( $phone ) . '</span>' : null; ?> 
			<?php echo isset( $about ) ? '<p class="ywig-staff-bio">' . esc_html( $about ) . '</p>' : null; ?> 


			<?php echo isset( $staff_fname ) && ! empty( $projects_for_this_staff_member ) ? '<p class="ywig-staff-projects">' . esc_html( $staff_fname ) . ' works at ' : null; ?> 
			<?php
			if ( isset( $projects_for_this_staff_member ) ) {
				foreach ( $projects_for_this_staff_member as $key => $value ) {
					if ( 0 === $key ) {
						echo '<a href="' . $value->guid . '">';
						echo esc_html( $value->post_title );
						echo '</a>';
					} else {
						echo '<a href="' . $value->guid . '">';
						echo esc_html( ', ' . $value->post_title );
						echo '</a>';
					}
				}
			}

			?>
		</p> 

		</div>	

				<?php

				the_post();
				if ( ! empty( $this_taxonomys_associated_post_type ) && ! empty( $this_terms_taxonomy ) ) {
					?>
					<h4><?php echo esc_html( $the_term->name ); ?> works @ <?php echo esc_html( the_title() ); ?></h4>
					<?php
					$post_args = array(
						'post_type'   => $this_taxonomys_associated_post_type,
						'post_status' => 'publish',
						// @codingStandardsIgnoreStart WordPress.VIP.SlowDBQuery.slow_db_query
						'tax_query'   => array(
							array(
								'taxonomy' => $this_terms_taxonomy,
								'field'    => $the_term->term_id,
								'terms'    => $the_term->term_id,
							),
						),
					);

					set_query_var( 'proj_args', $post_args );
					set_query_var( 'terms_taxonomy', $this_terms_taxonomy );

					get_template_part( 'template-parts/projects-wrap' );

				}

				?>

	</main>

				<?php

				get_footer();
