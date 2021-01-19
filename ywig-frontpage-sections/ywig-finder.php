<?php
/**
 * YWIG Project Finder Section for Front Page & Projects page
 *
 * Locations are a taxonomy for cpt Projects.
 * Contains some bootstrap classes for 'toggable tabs' but no longer uses Bootstrap.
 *
 * @package ywig-theme
 */

$all_locations = get_terms(
	array(
		'taxonomy'   => 'location',
		'hide_empty' => false,
	)
);

// The first pill (All Projects) controls every .project-info-all
// Get a string something like ('pills-whateverid, pills-whateverid ...') to use for aria-controls.
// The other pills will just have aria-controls="pills-whatever".
// NOTE TODO There is an accessibility issue here because the pills control two things - the location-info and the list of projects. The location-infos have an aria-labeled-by but the pills do not refer to the location-info (only the project-info).
$all_ids = wp_list_pluck( $all_locations, 'slug' );
$arr     = array();
foreach ( $all_ids as $id ) {
	array_push( $arr, sprintf( 'pills-%s', $id ) );
}
$all_ids_for_aria = join( ' ', $arr );

?>

<section class="ywig-finder" id="ywig-finder">
	<div class="temp"></div>
	<h2 class="twist">Project Finder</h2>



	<div class="ywig-finder-wrap">

	<div class="ywig-finder-left">

		<!-- pills -->
		<div class="nav nav-pills ywig-location-pills locations-nav" id="pills-tab" role="tablist" >

			<a 
				class="nav-link ywig-finder-loc active" 
				id="pills-all-tab" 
				data-location="all"
				data-toggle="pill" 
				title="Show All Projects"
				href="#pills-all"
				role="tab"
				aria-controls="<?php echo esc_attr( $all_ids_for_aria ); ?>" 
				aria-selected="true">
					<span class="sr-only">Show youth projects in all locations</span>
					<span>All Projects</span>
				</a>
				<?php

				foreach ( $all_locations as $location => $value ) {
					$html_id = sprintf( 'pills-%s-tab', $value->slug );
					$href    = sprintf( '#pills-%s', $value->slug );
					$aria    = sprintf( 'pills-%s', $value->slug );
					?>
					<a 
						class="nav-link ywig-finder-loc" 
						id="<?php echo esc_attr( $html_id ); ?>" 
						data-location="<?php echo esc_attr( $value->slug ); ?>"
						data-toggle="pill" 
						title="Show <?php echo esc_html( $value->name ); ?>"
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

		<!-- Show corresponding location-info for each pill -->
		<div class="tab-content" id="pills-tabContent">

			<!--  Dummy 'EVERYWHERE' -->
			<div 
				class="tab-pane tab-pane-summary show active fade" id="pills-all" 
				role="tabpanel" 
				aria-labelledby="pills-all-tab"
			>
				<div class="location-info-wrap">
					<div class="location-info-left"></div>
					<!-- <div class="location-info-right"></div> -->
				</div>

			</div>
			<!-- end .tab-pane for 'all' -->
			<!-- end ALL -->
			<?php

			// Show address, contact etc for each of the locations (location-info.php).
			foreach ( $all_locations as $location => $value ) {

				$html_id   = sprintf( 'pills-%s-tab', $value->slug );
				$href      = sprintf( '#pills-%s', $value->slug );
				$aria      = sprintf( 'pills-%s', $value->slug );
				$this_term = $value;
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

			// Close .tab-content here. Don't want to repeat the .project-info divs for every tab. Just show all projects once and handle show/hide with .show-proj. See js.
			?>
		</div><!-- .tab-content -->

	</div><!--.ywig-finder-left -->


	<?php
		// Show projects.
		$post_args = array(
			'post_type'   => 'project',
			'post_status' => 'publish',
		);

		// Because badly named projects-wrap also handles youth clubs... not anymore!!?.
		set_query_var( 'proj_args', $post_args );
		set_query_var( 'terms_taxonomy', 'location' );
		?>
		<div class="projects-wrap" id="projects-wrap-all">
			<?php
			get_template_part( 'template-parts/projects-wrap' );
			?>
		</div>

	</div><!--.ywig-finder-wrap-->
</section>
