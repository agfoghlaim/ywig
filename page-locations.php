<?php
/**
 *   Template Name: All Staff
 * @package ywig-theme
 */

?>
<?php get_header(); ?>
	<main>
		<h1>page-locations.php</h1>
	<?php
	

	$all_locations = get_terms(
		array(
			'taxonomy'   => 'location',
			'hide_empty' => false,
		)
	);
	// echo '<pre>';
	// var_dump($all_locations);
	// echo '</pre>';
	if(is_wp_error( $all_locations )) {
		echo 'error!!!!!!!!!!!!!!!';
		return;
	}
	foreach ( $all_locations as $location => $value ) {

		$html_id   = sprintf( 'pills-%s-tab', $value->slug );
		$href      = sprintf( '#pills-%s', $value->slug );
		$aria      = sprintf( 'pills-%s', $value->slug );
		$this_term = $value;

		?>

		<div 
			class="" 
			id="<?php echo esc_attr( $aria ); ?>" 
		>
		<?php

		include locate_template( 'template-parts/ywig-components/location-info.php', false, false );

		?>
		</div><!-- end .tab-pane -->
		<?php
	} // end foreach $all_locations
?>
	</main>
<?php get_footer(); ?>
