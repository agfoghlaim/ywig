<?php

/*
@package ywig-theme

YWIG Front Page - Locations Verticalsection

*/

?>


		<div class="nav nav-pills ywig-location-pills" id="pills-tab" role="tablist">
		<?php
			$all_locations = get_terms(
				array(
					'taxonomy'   => 'location',
					'hide_empty' => false,
				)
			);
			foreach ( $all_locations as $location => $value ) {
				$html_id = sprintf( 'pills-%s-tab', $value->slug );
				$href    = sprintf( '#pills-%s', $value->slug );
				$aria    = sprintf( 'pills-%s', $value->slug );
				?>
			
			<a 
				class="nav-link <?php echo 0 === $location ? 'active' : ''; ?>" 
				id="<?php echo $html_id; ?>" 
				data-toggle="pill" 
				href="<?php echo $href; ?>"
				role="tab" 
				aria-controls="<?php echo $aria; ?>" 
				aria-selected="true">
					<?php echo $value->name; ?>
				</a>
				<?php
			} //end foreach $all_locations
			?>

		</div>


 
		<div class="tab-content" id="pills-tabContent">
			<?php
			foreach ( $all_locations as $location => $value ) {

				$html_id = sprintf( 'pills-%s-tab', $value->slug );
				$href    = sprintf( '#pills-%s', $value->slug );
				$aria    = sprintf( 'pills-%s', $value->slug );
				$mapLink = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
				$address = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
				$eircode = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
				$mapLink = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
				$phone   = get_term_meta( $value->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
				?>
			
			<div 
			class="tab-pane fade <?php echo $location === 0 ? 'show active' : ''; ?>" id="<?php echo $aria; ?>" 
			role="tabpanel" 
			aria-labelledby="<?php echo $html_id; ?>"
			>
			<div class="location-info-wrap">
			<div class="location-info-left"><a href="#" target="_blank" title="Open Google Maps in new tab.">
				<img style="max-width:100%;" src="https://maps.googleapis.com/maps/api/staticmap?&amp;zoom=15&amp;size=300x300&amp;markers=youth+work+galway+ireland&amp;key=AIzaSyAMy60iJGjTU1DzZaO0x1f7KMx4qVoZhHM"></a>
			</div>
			<div class="location-info-right">
				<h3><?php echo $value->name; ?></h3>
				<p> <?php echo isset( $address[0] ) ? $address[0] : ''; ?> </p>
				<p> <?php echo isset( $eircode[0] ) ? $eircode[0] : ''; ?> </p><br />
				<p> <?php echo isset( $phone[0] ) ? $phone[0] : ''; ?> </p>
			</div>
			</div>

				<?php
				// need to get projects with ~location $value->slug;
				$args = array(
					'post_type'   => 'project',
					'post_status' => 'publish',
					'tax_query'   => array(
						array(
							'taxonomy' => 'location',
							'field'    => 'slug',
							'terms'    => $value->slug,
						),
					),
				);


				$projects_at_this_location = new WP_Query( $args );
				?>
			<div class="projects-wrap">
				<?php
				$post_count = 0;
				if ( $projects_at_this_location->have_posts() ) :
					while ( $projects_at_this_location->have_posts() ) :
						$post_count += 1;
						$projects_at_this_location->the_post();
						?>
				<div class="project-info">
						<?php echo the_post_thumbnail(); ?>
				<h4><?php echo the_title(); ?> </h4>
						<?php echo the_excerpt(); ?>
				</div>

						<?php
						/*
						Force next columns to break to new line.
						Bootstrap recommends this hack, need to do it every 3 projects .
						*/



					endwhile;
				endif;
				?>
			</div><!-- end .projects-wrap -->
			</div><!-- end .tab-pane -->
				<?php
			} // end foreach $all_locations
			?>

		</div><!-- end .tab-content -->






