<?php
/**
 * Displays social icons. Used in footer.
 *
 *   @package ywig-theme
 */


$facebook = get_option( 'facebook_link' );
$youtube  = get_option( 'youtube_link' );
$twitter  = get_option( 'twitter_link' );


if ( ( ! empty( $twitter ) ) || ( ! empty( $facebook ) ) || ( ! empty( $youtube ) ) ) {
	?>
	<div class="ywig-socials-wrap">
		<?php
		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in ywig_render_socials
			echo ywig_render_socials( $twitter, $facebook, $youtube );
		?>
	</div>
	<?php
}
