<?php
/**
 * Custom template tags for ywig.
 *
 * @package ywig-theme
 */

/**
 * Table of Contents:
 * Single Project Template
 * Social Icons
 */

/**
 * Single Project Template
 */
/**
 * Single Project Template (Sidebar) - Show project address.
 *
 *  @param string $post_id Post ID of project/youth club.
 */
function ywig_single_yc_project_address( $post_id = null ) {

	if ( ! $post_id ) {
		return;
	}

	$eircode = get_field( $post_id . '_eircode' );
	$address = get_field( $post_id . '_address' );

	ob_start();
	?>
	<div class="<?php echo esc_attr( $post_id ); ?>-address">
		<h4>Address</h4>
		<div>
		<p> <?php echo esc_html( $address ); ?></p>		
		<p> <?php echo esc_html( $eircode ); ?></p>
		</div>
	</div>
	<?php
	$address_output = ob_get_clean();

	if ( $address_output ) {
		return $address_output;
	}
}

/**
 * Single Project Template (Sidebar) - Show project social media links.
 *
 * @param string $post_id Post ID of project/youth club.
 */
function ywig_single_yc_project_socials( $post_id = null ) {

	if ( ! $post_id ) {
		return;
	}

	$facebook  = get_field( $post_id . '_facebook' );
	$twitter   = get_field( $post_id . '_twitter' );
	$instagram = get_field( $post_id . '_instagram' );
	ob_start();

	?>
	<div class="<?php echo esc_attr( $post_id ); ?>-socials">
		<h4><?php echo esc_html( get_the_title() ); ?>'s Socials</h4>
		<div>
			<?php

			if ( $facebook ) {
				?>
				<a href="<?php echo esc_url( $facebook ); ?>"target="_blank" rel="noopener noreferrer" title="Facebook" class="ywig-social-btn">
					<span class="ywig-icon-sidebar ywig-icon ywig-facebook"></span>
					<span class="sr-only">Visit <?php echo esc_html( get_the_title() ); ?>'s Facebook</span></a>
				<?php
			}
			if ( $twitter ) {
				?>
				<a href="<?php echo esc_url( $twitter ); ?>"target="_blank" rel="noopener noreferrer" title="Twitter" class="ywig-social-btn">
					<span class="ywig-icon-sidebar ywig-icon ywig-twitter"></span>
					<span class="sr-only">Visit <?php echo esc_html( get_the_title() ); ?>'s Twitter</span></a>
				<?php
			}
			if ( $instagram ) {
				?>
				<a href="<?php echo esc_url( $instagram ); ?>"target="_blank" rel="noopener noreferrer" title="Instagram" class="ywig-social-btn">
					<span class="ywig-icon-sidebar ywig-icon ywig-instagram"></span>
					<span class="sr-only">Visit <?php echo esc_html( get_the_title() ); ?>'s Instagram</span></a>
				<?php
			}
			?>
		</div><!-- end wrap-socials -->
	</div>

	<?php

	$socials_output = ob_get_clean();

	if ( $socials_output ) {
		return $socials_output;
	}

}

/**
 * Single Project Template (Sidebar) - Show project staff
 *
 * @param int    $post_id Post ID of project.
 * @param string $post_type Post type -  either 'project' or 'youthclub'.
 */
function ywig_single_yc_project_staff( $post_id = null, $post_type ) {

	if ( ! $post_id || ! $post_type ) {
		return;
	}

	ob_start();

	?>
	<div class="<?php echo esc_attr( $post_type ); ?>-staff">
		<h4>Contacts</h4>
			<div>
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
				<div class="<?php echo esc_attr( $post_type ); ?>-staff-item">	
						<?php
						if ( $is_staff_pic ) {
							?>
							<img  src="<?php echo esc_url( $staff_image_url ); ?>" alt="<?php echo esc_attr( $staff_image['alt'] ); ?>" description="<?php echo esc_html( $staff_image['description'] ); ?>" />
							<?php
						} else {
							echo ywig_get_theme_svg( 'user' );
							// get_template_part( 'template-parts/svgs/svg-user' );
						}
						?>


					<a href="<?php echo esc_url( get_term_link( $value->term_id ) ); ?>">
						<?php echo esc_html( $f_name ); ?> (<?php echo isset( $job_title ) ? esc_html( $job_title ) : ''; ?>)
					</a>
					<p><?php echo isset( $phone ) ? esc_html( $phone ) : ''; ?> </p>
					<p><?php echo isset( $email ) ? esc_html( $email ) : ''; ?></p>
				</div> <!-- ...-staff-item -->
						<?php
					}
				}
				?>
			</div>
	</div><!-- .project-staff  -->

	<?php

	$staff_output = ob_get_clean();

	if ( $staff_output ) {
		return $staff_output;
	}

}

/**
 * Single Project Template (Main Section) - Show project ACF content
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
		echo '<h2 class="heading-size-4">About ' . esc_html( get_the_title() ) . '</h2>';
		echo wp_kses_post( get_field( 'about_the_project', $post_id ) );
		?>
		</div>
		<?php
	}

	if ( get_field( 'section_1_content' ) ) {
		?>
		<div class="<?php echo esc_attr( $post_type ); ?>-row">
		<?php
		echo '<h2 class="heading-size-4">' . esc_html( get_field( 'section_1_heading', $post_id ) ) . '</h2>';
		echo wp_kses_post( get_field( 'section_1_content', $post_id ) );
		?>
		</div>
		<?php
	}

	if ( get_field( 'section_2_content' ) ) {
		?>
		<div class="<?php echo esc_attr( $post_type ); ?>-row">
		<?php
		echo '<h2 class="heading-size-4">' . esc_html( get_field( 'section_2_heading', $post_id ) ) . '</h2>';
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

/**
 * Single Project Template (Main Section) - Show project news
 *
 *  @param int    $post_id Post ID of project.
 *  @param string $author_name Name of quickpost author. Usernames (and therefore author names) must correspond to name of 'project' cpt. ie $author_name here is post->post_title in single-project.php.
 */
function ywig_single_yc_project_show_project_news( $post_id, $author_name ) {
	$q_args = array(
		'post_type'   => 'quickpost',
		'post_status' => 'publish',
		'author_name' => $author_name,

	);

	$quickposts = new WP_Query( $q_args );

	ob_start();
	?>

	<div class="quickpost-wrap">
		<?php

		if ( $quickposts->have_posts() ) :
			while ( $quickposts->have_posts() ) :
				$quickposts->the_post();

				// Get id (&title) of related project from meta.
				// $stored_id = get_post_meta( $post_id, 'related_project_id', true );
				// if ( '' !== $stored_id ) {
				// $proj_title = get_the_title( $stored_id );
				// }
				?>
			<div class="quickpost-item">

				<?php
					echo '<span class="quickpost-project-span"> author:' . get_the_author() . '</span>';
				?>
				<img style="max-width: 100%" src="
					<?php
					echo esc_url(
						get_the_post_thumbnail_url()
					);
					?>
					"
					/>

				<div class="quickpost-text">
					<h3><?php the_title(); ?> </h3>
					<?php the_content(); ?>
				</div>
			</div>
	
				<?php

			endwhile;
		endif;
		?>
	</div><!-- end .projects-wrap -->
	<?php
	$news_output = ob_get_clean();
	if ( $news_output ) {
		return $news_output;
	}
}

 /**
  * Social Icons
  */
/**
 * Renders individual social icons  & links.
 *
 *  @param string $twitter ywig twitter url.
 *  @param string $facebook  ywig facebook url.
 *  @param string $youtube  ywig youtube url.
 */
function ywig_render_socials( $twitter, $facebook, $youtube ) {
	ob_start();

	if ( ! empty( $twitter ) ) :
		?>
	<a href="<?php echo esc_url( $twitter ); ?>" target="_blank" rel="noopener noreferrer" title="Twitter" class="ywig-social-btn">
	<span class="ywig-icon-sidebar ywig-icon ywig-twitter"></span>
	<span class="sr-only">Visit our Twitter</span></a>
		<?php
	endif;
	if ( ! empty( $facebook ) ) :
		?>
	<a href="<?php echo esc_url( $facebook ); ?>" target="_blank" rel="noopener noreferrer" title="Facebook" class="ywig-social-btn">
	<span class="ywig-icon-sidebar ywig-icon ywig-facebook"></span>
	<span class="sr-only">Visit our Facebook</span></a>
		<?php
	endif;
	if ( ! empty( $youtube ) ) :
		?>
	<a href="<?php echo esc_url( $youtube ); ?>" target="_blank" rel="noopener noreferrer" title="YouTube" class="ywig-social-btn">
	<span class="ywig-icon-sidebar ywig-icon ywig-youtube"></span>
	<span class="sr-only">Visit our Youtube</span></a>
		<?php
	endif;

	$social_output = ob_get_clean();

	if ( $social_output ) {
		return $social_output;
	}
}


/**
 * Util function for array_map, wraps string and returns
 *
 * @param string $str text to be wrapped.
 *
 * @return string $str. Original $str with pills- prepended & -tab appended.
 */
function ywig_do_stuff( $str ) {
	return sprintf( 'pills-%s-tab', $str );
}

/**
 * Converts string of locations to array, operates and returns new string.
 *
 * @param string $terms_str String of location terms seperated by a space ' '.
 *
 * @return string $ans. Original $terms_string with pills- prepended & -tab appended.
 */
function ywig_get_aria_labelledby_str( $terms_str ) {
	$terms_array             = explode( ' ', $terms_str );
	$aria_labelled_by_string = array_map( 'ywig_do_stuff', $terms_array );
	$ans                     = join( ' ', $aria_labelled_by_string );
	return $ans;
}


