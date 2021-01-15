<?php
/**
 * Template Name: All Staff
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>
<article  id="page-<?php the_title(); ?>" <?php post_class(); ?>>
		<h1>page-locations.php</h1>
		<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
		<div class="page-locations-wrap">
	<?php


	$all_locations = get_terms(
		array(
			'taxonomy'   => 'location',
			'hide_empty' => false,
		)
	);

	if ( is_wp_error( $all_locations ) ) {
		return;
	}
	// echo '<pre>';
	// var_dump( $all_locations );
	// echo '</pre>';
	foreach ( $all_locations as $location => $value ) {

		$html_id   = sprintf( 'pills-%s-tab', $value->slug );
		$href      = sprintf( '#pills-%s', $value->slug );
		$aria      = sprintf( 'pills-%s', $value->slug );
		$this_term = $value;

		if ( $value->term_id ) {

			$term_link = get_term_link( $value->term_id ); // eg <site-url>/locations/galway.

			if ( is_wp_error( $term_link ) ) {
				continue;
			}
		}
		?>

		<div 
			class="" 
			id="<?php echo esc_attr( $aria ); ?>" 
		>

		<?php
		// Show link to the location page (eg <site-url>/locations/galway). Note this happens before locate_template so it will only show on the locations page (<site-url>/locations), not on the Project Finder.
		?>

		<a href="<?php echo esc_url( $term_link ); ?>" >
			<?php echo '<h3>' . esc_html( $value->name ) . '</h3>'; ?>
		</a>

		<?php

		include locate_template( 'template-parts/ywig-components/location-info.php', false, false );

		?>
		</div><!-- end .tab-pane -->
		<?php
	} // end foreach $all_locations
	?>
	</div> <!-- end .page-locations-wrap -->
	</article>
<?php get_footer(); ?>
