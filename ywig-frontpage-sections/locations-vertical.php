<?php
/**
 * Locations Section Front Page
 *
 * @package ywig-theme
 *   YWIG Front Page - Locations-v section
 */

$all_locations = get_terms(
	array(
		'taxonomy'   => 'location',
		'hide_empty' => false,
	)
);

?>
<div class="locations-v-wrap">
		<!-- pills -->
		<div class="locations-v-left">
			<!-- <div class="sticky"> -->
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
							class="nav-link" 
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
			</div><!--.nav nav-pills-->

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

				$html_id   = sprintf( 'pills-%s-tab', $value->slug );
				$href      = sprintf( '#pills-%s', $value->slug );
				$aria      = sprintf( 'pills-%s', $value->slug );
				$this_term = $value;
				// $map_link = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
				// $address  = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
				// $eircode  = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
				// $phone    = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
				?>

				<div 
					class="tab-pane tab-pane-summary <?php echo 0 === $location ? '' : ''; ?>" 
					id="<?php echo esc_attr( $aria ); ?>" 
					role="tabpanel" 
					aria-labelledby="<?php echo esc_html( $html_id ); ?>"
				>
				<?php

				include locate_template( 'template-parts/ywig-components/location-info.php', false, false );

				?>
				</div><!-- end .tab-pane -->
				<?php
			} // end foreach $all_locations
			/**
			 * Close .tab-content here so bootstrap handles the locations only. Don't want to repeat the .project-info divs for every tab. Just show all projects once and handle show/hide with .show-proj. See js.
			 */
			?>
		</div><!-- .tab-content -->
		<!-- </div>.sticky -->
	</div><!--.locations-v-left -->



				<?php
					$post_args = array(
						'post_type'   => 'project',
						'post_status' => 'publish',
					);

					// Because badly named projects-wrap also handles youth clubs... not anymore!!?.
					set_query_var( 'proj_args', $post_args );
					set_query_var( 'terms_taxonomy', 'location' );
					?>
						<div class="projects-wrap">
					<?php
					get_template_part( 'template-parts/projects-wrap' );
					?>
						</div>
	</div><!--.locations-v-wrap-->
