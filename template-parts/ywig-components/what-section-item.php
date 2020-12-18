<?php
/**
 * What we do section items.
 *
 * @package ywig-theme
 */

if ( true === $what_show ) {
	?>
	<div class="what-item  what-item-<?php echo esc_attr( $str ); ?>">
	<?php
	if ( $what_image ) {
		?>
		<div class="what-img-wrap">
			<img src="<?php echo esc_url( $what_image ); ?>" />
		</div>
		<?php
	}
	?>
		<div class="what-section-title">
		<?php
		if ( $what_title ) {
			?>
			<h3><?php echo esc_html( $what_title ); ?></h3>
					<?php
		}

		?>
		</div><!-- end .what-section-title -->

		<div class="what-feature-text">
		<?php
		if ( $what_text ) {
			?>
			<p><?php echo esc_html( $what_text ); ?></p>
			<?php
		}
		?>
		<?php
		if ( $what_link && $what_link_text ) {
			?>
			<a href='<?php echo esc_url( $what_link ); ?>' class="btn btn-dark btn-block ywig-maybe-custom-link"><?php echo esc_html( $what_link_text ); ?></a>
			<?php
		}
		?>
		</div> <!-- end .what-feature-text -->
	</div>

	<?php
}
