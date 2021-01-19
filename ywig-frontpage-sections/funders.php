<?php
/**
 * Funders Section.
 *
 * @package ywig-theme
 */

$funders_title      = get_theme_mod( 'funders_section_title' );
$funders_text       = get_theme_mod( 'funders_section_p' );
$funders_show       = get_theme_mod( 'funders_show_section' );
$funders_image_id   = get_theme_mod( 'funders_section_image' );
$funders_image      = wp_get_attachment_url( $funders_image_id );
$funders_image_dets = wp_prepare_attachment_for_js( $funders_image_id );

?>
	<section class="funders-section" > 

	<h2 class="twist"><?php echo esc_html( $funders_title ); ?></h2>

	<p><?php echo esc_html( $funders_text ); ?></p>

	<?php echo wp_get_attachment_image( $funders_image_id, 'full' ); ?>

	</section>

	<?php


