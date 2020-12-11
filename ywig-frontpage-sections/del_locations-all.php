<?php

/*
@package ywig-theme

YWIG Front Page - Locations section

*/
$all_locations = get_terms(
	array(
		'taxonomy'   => 'location',
		'hide_empty' => false,
	)
);

?>
		<!-- pills -->
		<div class="nav nav-pills ywig-location-pills locations-nav" id="pills-tab" role="tablist" >
			<a 
				class="nav-link active" 
				id="pills-all-tab" 
				data-location="all"
				data-toggle="pill" 
				href="#pills-all"
				role="tab" 
				aria-controls="aria-all" 
				aria-selected="true">
					All
				</a>
			<?php

			foreach ( $all_locations as $location => $value ) {
				$html_id = sprintf( 'pills-%s-tab', $value->slug );
				$href    = sprintf( '#pills-%s', $value->slug );
				$aria    = sprintf( 'pills-%s', $value->slug );
				?>
				<a 
					class="nav-link <?php // echo 0 === $location ? 'active' : ''; ?>" 
					id="<?php echo esc_attr( $html_id ); ?>" 
					data-location="<?php echo esc_attr( $value->slug ); ?>"
					data-toggle="pill" 
					href="<?php echo esc_attr( $href ); ?>"
					role="tab" 
					aria-controls="<?php echo esc_attr( $aria ); ?>" 
					aria-selected="false">
					<?php echo esc_html( $value->name ); ?>
					</a>
					<?php
			} //end foreach $all_locations

			?>

		</div>


		<div class="tab-content" id="pills-tabContent">

			<!--  ALL -->
			<div 
				class="tab-pane tab-pane-summary show active fade" id="pills-all" 
				role="tabpanel" 
				aria-labelledby="pills-all-tab"
			>
				<div class="location-info-wrap">
					<div class="location-info-left"><h5>All projects</h5></div>
					<div class="location-info-right"></div>
				</div>

			</div>
			<!-- end .tab-pane for 'all' -->
			<!-- end ALL -->
			<?php
			foreach ( $all_locations as $location => $value ) {

				$html_id  = sprintf( 'pills-%s-tab', $value->slug );
				$href     = sprintf( '#pills-%s', $value->slug );
				$aria     = sprintf( 'pills-%s', $value->slug );
				$map_link = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
				$address  = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
				$eircode  = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
				$phone    = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
				?>

				<div 
					class="tab-pane tab-pane-summary <?php echo 0 === $location ? '' : ''; ?>" 
					id="<?php echo esc_attr( $aria ); ?>" 
					role="tabpanel" 
					aria-labelledby="<?php echo esc_html( $html_id ); ?>"
				>
					<div class="location-info-wrap">
					<div class="location-info-left">
							<h5>Projects in <?php echo esc_html( $value->name ); ?></h5>
					</div>
						<div class="location-info-right">
							<?php
							if ( isset( $map_link[0] ) ) {
								// Note need a both map_src & map_link TODO.
								?>
										<a 
										href="<?php echo esc_attr( $map_link[0] ); ?>" 
										target="_blank" 
										title="Open Google Maps in new tab."><img style="max-width:6rem" 
										src="https://maps.googleapis.com/maps/api/staticmap?&amp;zoom=15&amp;size=300x300&amp;markers=youth+work+galway+ireland&amp;key=AIzaSyAMy60iJGjTU1DzZaO0x1f7KMx4qVoZhHM"></a>
									<?php
							}
							?>

							<div class="location-info-right-text">
							<p style="margin: 0"> <?php echo isset( $address[0] ) ? esc_html( $address[0] ) : ''; ?> </p>
							<p style="margin: 0"> <?php echo isset( $eircode[0] ) ? esc_html( $eircode[0] ) : ''; ?> </p>
							<p style="margin: 0"> <?php echo isset( $phone[0] ) ? esc_html( $phone[0] ) : ''; ?> </p>

							</div>
						</div>

					</div>


				</div><!-- end .tab-pane -->
				<?php
			} // end foreach $all_locations
			/**
			 * Close .tab-content here so bootstrap handles the locations only. Don't want to repeat the .project-info divs for every tab. Just show all projects once and handle show/hide with .show-proj. See js.
			 */
			?>
			</div><!-- .tab-content -->

			<?php
				$post_args = array(
					'post_type'   => 'project',
					'post_status' => 'publish',
				);

				// Because badly named projects-wrap also handles youth clubs.
				set_query_var( 'proj_args', $post_args );
				set_query_var( 'terms_taxonomy', 'location' );

				get_template_part( 'template-parts/projects-wrap' );
				?>
