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
		$address  = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
		$eircode  = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
		$map_link = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
		$phone    = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
	if ( isset( $map_link[0] ) ) {
		// Note need a both map_src & map_link TODO.
		?>
				<a 
				href="<?php echo esc_attr( $map_link[0] ); ?>" 
				target="_blank" 
				rel="noopener noreferrer"
				title="Open Google Maps in new tab."><img style="max-width:6rem" 
				src="https://maps.googleapis.com/maps/api/staticmap?&amp;zoom=15&amp;size=300x300&amp;markers=youth+work+galway+ireland&amp;key=AIzaSyAMy60iJGjTU1DzZaO0x1f7KMx4qVoZhHM"></a>
			<?php
	}
	?>

	<div class="location-info-right-text">
	<p> <?php echo isset( $address[0] ) ? esc_html( $address[0] ) : ''; ?> </p>
	<p> <?php echo isset( $eircode[0] ) ? esc_html( $eircode[0] ) : ''; ?> </p>
	<p> <?php echo isset( $phone[0] ) ? esc_html( $phone[0] ) : ''; ?> </p>

	</div>
</div>

</div>
