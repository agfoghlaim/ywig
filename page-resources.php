<?php
/**
 * Template Name: Resources
 *
 * Works with 'resource' custom taxonomy. Attachments are assigned as 'resources'. This template displays the page content for the 'Resources' page. It also loops through all terms in the 'resource' custom taxonomy, creates a heading for each term name and lists out attachments with that term.
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>



	<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
		<section class="resourses-intro">
			<?php
				the_content();
				the_post_thumbnail();
			?>
		</section>

		<?php
			// Get list of 'resource' taxonomy terms eg 'strategic-plan', 'consent-form'.
			$the_terms = get_terms(
				array(
					'taxonomy'   => 'resource',
					'hide_empty' => false,
					'orderby'    => 'name',
				)
			);
			echo '<section class="ywig-wrap-resource-sections" >';

			// Loop through $the_terms and find any attachments assigned with term.
			foreach ( $the_terms as $the_term ) {
				$args = array(
					'post_status' => 'inherit',
					'post_type'   => 'attachment',
					// @codingStandardsIgnoreStart WordPress.VIP.SlowDBQuery.slow_db_query
					'tax_query'   => array(
						array(
							'taxonomy' => 'resource',
							'field'    => 'slug',
							'terms'    => $the_term->slug,
						),
					),

				);
				$attachments_with_this_term = new WP_Query( $args );

				// Loop through the attachments with current term, render <section> with <h2>$the_term->name</h2> and list of relevant attachments.
				if ( $attachments_with_this_term->have_posts() ) :
					?>
					<section class="ywig-resource-section section-<?php echo esc_html( $the_term->slug ); ?>">
						<h2 class="ywig-resource-title"> <?php echo esc_html( $the_term->name ); ?>s
							<button 
							id="toggle-<?php echo esc_attr( $the_term->slug ); ?>"
							class="showHideResourcesBtn" 
							data-target-id="<?php echo esc_attr( $the_term->slug ); ?>"
							aria-expanded="false"
							aria-controls="<?php echo esc_attr( $the_term->slug ); ?>"
							>
							</button>
						</h2>

						<div 
							class="ywig-resource-wrap" 
							id="<?php echo esc_attr( $the_term->slug ); ?>" 
							role="region"
							aria-labeledby="toggle-<?php echo esc_attr( $the_term->slug ); ?>"
						>

						<?php
						while ( $attachments_with_this_term->have_posts() ) :

							$attachments_with_this_term->the_post();

							// Get more attachment metadata (alt, description, caption etc).
							$more_details = wp_prepare_attachment_for_js( $post->ID );

							?>
							<div class="ywig-resource-item">
								<div class="ywig-reource-title-wrap">

									<?php

									// Get attachment file type (.pdf, .jpg etc).
									$path_parts           = pathinfo( $post->guid );
									$attachment_file_type = $path_parts['extension'];

									// Echo file type & appropiate icon.
									if ( isset( $attachment_file_type ) ) {
										echo '<span>';
										ywig_the_theme_svg( $attachment_file_type );
										?>

										<h4><?php echo esc_html( $post->post_title ); ?></h4>

										<?php
										echo '</span>';
										echo '<span class="ywig-resource-file-info">.' . esc_html( $attachment_file_type ) . ' ';
									}
									?>

									<?php echo 'Uploaded ' . get_the_date(); ?>
										</span>

								</div>

								<span>
									<?php echo esc_html( $more_details['description'] ); ?>
								</span>

								<a 
									class="btn btn-dark" 
									title="Download file" 
									href="<?php echo $post->guid; ?>" 
									download="<?php echo esc_html( $post->post_title ); ?>" >
									Download
								</a>

								<?php

								$previewable_file_types = array( 'pdf', 'jpg', 'jpeg', 'png' );

								if ( in_array( $attachment_file_type, $previewable_file_types, true ) ) {
									?>
									<a 
										class="btn btn-dark" 
										title="View in new tab" 
										href="<?php echo esc_url( $post->guid ); ?>" 
										target="<?php echo esc_attr( '_blank' ); ?>">
										View
									</a>
									<?php
								}
								?>
							</div><!-- .ywig-resource-item-->
							<?php
						endwhile;
						?>
					</div><!-- .ywig-resource-wrap-->
					<?php
					echo '</section>';
				endif;

			} // foreach.
			echo '</section>'; // end .ywig-wrap-resource-sections.
			?>


<?php get_footer(); ?>
