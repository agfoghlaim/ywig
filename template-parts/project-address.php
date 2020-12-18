<?php
/**
 * Project/Youth Club Address & Social Media
 *
 * @package ywig-theme
 */

?>

<div class="project-address">

<?php
$eircode   = get_field( 'youth_club_eircode' );
$add       = get_field( 'youth_club_address' );
$facebook  = get_field( 'youth_club_facebook' );
$twitter   = get_field( 'youth_club_twitter' );
$instagram = get_field( 'youth_club_instagram' );

?>

<p> <?php echo esc_html( $add ); ?></p>		

<p> <?php echo esc_html( $eircode ); ?></p>


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
</div>
