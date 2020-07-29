<?php
/**
 * Custom template tags for ywig.
 *
 * @package ywig-theme
 */

/**
 * Single Project Template.
 * Show project address.
 *
 *  @param string $post_type Post ID of project/youth club.
 */
function ywig_single_yc_project_address( $post_type = null ) {

	if ( ! $post_type ) {
		return;
	}

	$eircode = get_field( $post_type . '_eircode' );
	$address = get_field( $post_type . '_address' );

	ob_start();
	?>
	<div class="<?php echo esc_attr( $post_type ); ?>-address">
		<p> <?php echo esc_html( $address ); ?></p>		
		<p> <?php echo esc_html( $eircode ); ?></p>
	</div>
	<?php
	$address_output = ob_get_clean();

	if ( $address_output ) {
		return $address_output;
	}
}

/**
 * Single Project Template.
 * Show project social media links.
 *
 * @param string $post_type Post ID of project/youth club.
 */
function ywig_single_yc_project_socials( $post_type = null ) {

	if ( ! $post_type ) {
		return;
	}

	$facebook  = get_field( $post_type . '_facebook' );
	$twitter   = get_field( $post_type . '_twitter' );
	$instagram = get_field( $post_type . '_instagram' );
	ob_start();

	?>
	<div class="<?php echo esc_attr( $post_type ); ?>-intro-socials-wrap">
		<?php

		if ( $facebook ) {
			?>
			<a href="<?php echo esc_url( $facebook ); ?>"target="_blank" class="ywig-social-btn">
				<span class="ywig-icon-sidebar ywig-icon ywig-facebook"></span>
				<span class="sr-only">Visit <?php echo esc_html( get_the_title() ); ?>'s Facebook</span></a>
			<?php
		}
		if ( $twitter ) {
			?>
			<a href="<?php echo esc_url( $twitter ); ?>"target="_blank" class="ywig-social-btn">
				<span class="ywig-icon-sidebar ywig-icon ywig-twitter"></span>
				<span class="sr-only">Visit <?php echo esc_html( get_the_title() ); ?>'s Twitter</span></a>
			<?php
		}
		if ( $instagram ) {
			?>
			<a href="<?php echo esc_url( $instagram ); ?>"target="_blank" class="ywig-social-btn">
				<span class="ywig-icon-sidebar ywig-icon ywig-instagram"></span>
				<span class="sr-only">Visit <?php echo esc_html( get_the_title() ); ?>'s Instagram</span></a>
			<?php
		}
		?>
	</div>

	<?php

	$socials_output = ob_get_clean();

	if ( $socials_output ) {
		return $socials_output;
	}

}

/**
 * Single Project Template.
 * Show project staff
 *
 * @param int    $post_id Post ID of project.
 * @param string $post_type Post type -  project or youthclub.
 */
function ywig_single_yc_project_staff( $post_id = null, $post_type ) {

	if ( ! $post_id || ! $post_type ) {
		return;
	}

	ob_start();

	?>
	<div class="<?php echo esc_attr( $post_type ); ?>-staff">
		<div class="tableish" >
			<div class="headish">
					<h6>Contact</h6>
			</div>
			<div class="bodyish">

				<?php

				if ( 'project' === $post_type ) {

					$tax_name = 'staff';

				} elseif ( 'youthclub' === $post_type ) {

					$tax_name = 'club_contact';

				}

				if ( taxonomy_exists( $tax_name ) ) {
					// echo $tax_name;
					// echo sprintf( '%s_first_name', $tax_name, true );
					$staff_at_this_project = wp_get_post_terms( $post_id, $tax_name, array( 'fields' => 'all' ) );

					foreach ( $staff_at_this_project as $member => $value ) {
						$f_name = get_field( sprintf( '%s_first_name', $tax_name, true ), 'term_' . $value->term_id );

						// $s_name          = get_field( sprintf( '%s_surname', $tax_name, true ), 'term_' . $value->term_id );
						$job_title       = get_field( sprintf( '%s_job_title', $tax_name, true ), 'term_' . $value->term_id );
						$email           = get_field( sprintf( '%s_email', $tax_name, true ), 'term_' . $value->term_id );
						$phone           = get_field( sprintf( '%s_phone', $tax_name, true ), 'term_' . $value->term_id );
						$staff_image     = get_field( sprintf( '%s_pic', $tax_name, true ), 'term_' . $value->term_id );
						$staff_image_url = $staff_image['sizes']['thumbnail'];

						if ( ! empty( $staff_image['url'] ) ) {

							$is_staff_pic = true;

						} else {

							$is_staff_pic = false;

						}

						?>
				<div class="grid-item">
					<div>
						<?php
						if ( $is_staff_pic ) {
							?>
								<img  src="<?php echo esc_url( $staff_image_url ); ?>" alt="<?php echo esc_attr( $staff_image['alt'] ); ?>" description="<?php echo esc_html( $staff_image['description'] ); ?>" />
							<?php
						} else {
							get_template_part( 'template-parts/svg/svg-user' );
						}
						?>
					</div>

					<div>
						<a href="<?php echo esc_url( get_term_link( $value->term_id ) ); ?>">
							<?php echo esc_html( $f_name ); ?>
						</a>
					</div>
					<div><?php echo isset( $job_title ) ? esc_html( $job_title ) : ''; ?></div>
					<div><?php echo isset( $phone ) ? esc_html( $phone ) : ''; ?> </div>
					<div><?php echo isset( $email ) ? esc_html( $email ) : ''; ?></div>
				</div> <!-- grid-item -->
						<?php
					}
					?>
			</div><!-- .bodyish -->
		</div><!-- .tableish -->

					<?php
				}

				?>

	</div><!-- .project-staff  -->

	<?php

	$staff_output = ob_get_clean();

	if ( $staff_output ) {
		return $staff_output;
	}

}



/**
 * Single Project Template.
 * Show project ACF content
 *
 * NOTE: This needs work. Project & Youthclub custom fields are named the same for these.  This is only working because of the post id. I 'm not fixing this now because I'm not sure yet if youthclub/project pages content will be different. Also maybe don't need the acfs here at all.
 *
 *  @param int    $post_id Post ID of project.
 *  @param string $post_type Post type - project.
 */
function ywig_single_yc_project_acfs( $post_id = null, $post_type ) {

	if ( ! $post_id ) {
		return;
	}

	ob_start();
	if ( get_field( 'about_the_project', $post_id ) ) {
		?>
		<div class="<?php echo esc_attr( $post_type ); ?>-row">
		<?php
		echo '<h2>About ' . esc_html( get_the_title() ) . '</h2>';
		echo wp_kses_post( get_field( 'about_the_project', $post_id ) );
		?>
		</div>
		<?php
	}

	if ( get_field( 'section_1_content' ) ) {
		?>
		<div class="<?php echo esc_attr( $post_type ); ?>-row">
		<?php
		echo '<h2>' . esc_html( get_field( 'section_1_heading', $post_id ) ) . '</h2>';
		echo wp_kses_post( get_field( 'section_1_content', $post_id ) );
		?>
		</div>
		<?php
	}

	if ( get_field( 'section_2_content' ) ) {
		?>
		<div class="<?php echo esc_attr( $post_type ); ?>-row">
		<?php
		echo '<h2>' . esc_html( get_field( 'section_2_heading', $post_id ) ) . '</h2>';
		echo wp_kses_post( get_field( 'section_2_content', $post_id ) );
		?>
		</div>
		<?php
	}

	$acf_output = ob_get_clean();
	if ( $acf_output ) {
		return $acf_output;
	}

}
