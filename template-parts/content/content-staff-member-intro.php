<?php
/**
 * Render staff member details.
 * Used by Staff page (page-staff.php)
 * Used by Single staff member page (taxonomy-staff.php)
 *
 * @package ywig-theme
 */

// Get projects that each staff member works at.
$projects_for_this_staff_member = get_posts(
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

?>

<div class="page-staff-item">

	<?php if ( $is_staff_pic ) : 

		// Show staff photo if it exists, else show default user svg.
		?>

		<img  
			src="<?php echo esc_html( $staff_image_url ); ?>" 
			alt="<?php echo esc_html( $staff_image['alt'] ); ?>" 
			description="<?php echo esc_html( $staff_image['description'] ); ?>" 
		/>
		<?php 
		else : echo ywig_get_theme_svg( 'user' );
		endif; 

		?>

		<h3><?php echo isset( $staff_name ) ? esc_html( $staff_name ) : ''; ?> <?php echo isset( $staff_surname  ) ? esc_html( $staff_surname  ) : ''; ?> </h3>
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
