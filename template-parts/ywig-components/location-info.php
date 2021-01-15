<?php
/**
 * Location details
 *
 * @package ywig-theme
 */

?>

<div class="location-info-wrap">

<div class="location-info-right">
	<!-- <pre>location-info.php</pre> -->
	<?php
		$address   = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
		$eircode   = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
		$map_link  = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
		$phone     = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
		$latitude  = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'latitude', true ) );
		$longitude = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'longitude', true ) );
	if ( isset( $map_link[0] ) ) {
		// Note need a both map_src & map_link TODO.
		?>

				<?php
				if ( ! empty( $latitude[0] ) && ! empty( $longitude[0] ) && ! empty( $address[0] ) ) {
					$mapbox_key = defined( 'YWIG_MAPBOX_KEY' ) ? YWIG_MAPBOX_KEY : false;
					?>
						<img 
						src="https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/pin-s-y+000(<?php echo esc_html( $longitude[0] ); ?>,<?php echo esc_html( $latitude[0] ); ?>)/<?php echo esc_html( $longitude[0] ); ?>,<?php echo esc_html( $latitude[0] ); ?>,14/200x200?access_token=<?php echo esc_attr( $mapbox_key ); ?>" 
						alt="Map preview for <?php echo esc_html( $address[0] ); ?>.">
					<?php
				}
				?>

				<?php
				if ( ! empty( esc_url( $map_link[0] ) ) ) {
					?>
						<a 	
							target="_blank" 
							rel="noopener noreferrer"
							title="Open Google Maps in new tab."
							href="<?php echo esc_url( $map_link[0] ); ?>">
							Open Google map.
						</a>
					<?php
				}
				?>
			<?php
	}
	?>

	<div class="location-info-right-text">
	<?php echo isset( $address[0] ) ? '<p>' . esc_html( $address[0] ) . '</p>' : null; ?>
	<?php echo isset( $eircode[0] ) ? '<p>' . esc_html( $eircode[0] ) . '</p>' : null; ?>
	<?php echo isset( $phone[0] ) ? '<p>' . esc_html( $phone[0] ) . '</p>' : null; ?>
	<?php echo isset( $latitude[0] ) ? '<p>' . esc_html( $latitude[0] ) . '</p>' : null; ?>
	<?php echo isset( $longitude[0] ) ? '<p>' . esc_html( $longitude[0] ) . '</p>' : null; ?>

	</div>
</div>

</div>
