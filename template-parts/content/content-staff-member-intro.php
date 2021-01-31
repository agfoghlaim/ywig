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

		
	<?php 

		// Show staff photo if it exists, else show default user svg.
		if ( $is_staff_pic ) { 
			// is staff image has been set.

			// link to single staff page if we are not already on it... only on /staff (page-staff.php), not on page.php.
			if ( is_page_template( 'page-staff.php' ) ){
				?>
					<a href="<?php echo esc_url( get_term_link( $the_term->term_id ) ); ?>">
						<figure>
							<img  
								src="<?php echo esc_html( $staff_image_url ); ?>" 
								alt="<?php echo esc_html( $staff_image['alt'] ); ?>" 
								description="<?php echo esc_html( $staff_image['description'] ); ?>" 
							/>
						</figure>
					</a>
				<?php
			} else{
				?>
					<figure>
						<img  
							src="<?php echo esc_html( $staff_image_url ); ?>" 
							alt="<?php echo esc_html( $staff_image['alt'] ); ?>" 
							description="<?php echo esc_html( $staff_image['description'] ); ?>" 
						/>
					</figure>
				<?php 
			} 
		
		}else{
			// else if no staff image has been set.

			// link to single staff page if we are not already on it... only on /staff (page-staff.php), not on page.php.
			if ( is_page_template( 'page-staff.php' ) ) {
				?>
				<a href="<?php echo esc_url( get_term_link( $the_term->term_id ) ); ?>">
					<?php echo ywig_get_theme_svg( 'user' ); ?>
				</a>
				<?php 
			}else{ 
				echo ywig_get_theme_svg( 'user' );
			}
		} 

		?>

		<h3><?php echo isset( $staff_name ) ? esc_html( $staff_name ) : ''; ?> <?php echo isset( $staff_surname  ) ? esc_html( $staff_surname  ) : ''; ?> </h3>
		<?php echo isset( $job ) ? '<p class="ywig-staff-subtext">' . esc_html( $job ) . '<p>' : null; ?> 
		<?php echo isset( $email ) ? '<span>' . esc_html( $email ) . '</span>' : null; ?> 
		<?php echo isset( $phone ) ? '<span>' . esc_html( $phone ) . '</span>' : null; ?> 
		<?php echo isset( $about ) ? '<p class="ywig-staff-bio">' . esc_html( $about ) . '</p>' : null; ?> 


		<?php echo isset( $staff_fname ) && ! empty( $projects_for_this_staff_member ) ? '<p class="ywig-staff-projects">' . esc_html( $staff_fname ) . ' works at ' : null; ?> 
		<?php
		if ( isset( $projects_for_this_staff_member ) ) {
			?>
			<div class="wrap-links">
			<?php
			foreach ( $projects_for_this_staff_member as $key => $value ) {
			
					echo '<a class="link-secondary link-tiny" href="' . $value->guid . '">';
					echo esc_html( $value->post_title );
					echo '</a>';

			}
			?>
			</div>
		<?php	
		}

		?>
	</p> 

</div>	
