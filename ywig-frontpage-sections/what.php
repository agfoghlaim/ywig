<?php
/**
 * What we do section - counselling, projects, youth clubs & programmes
 *
 * Maybe this doesn't belong in template-parts...
 *
 * @package ywig
 */

?>
	<section class="what-section" > 

	<?php

		$strs = array( 'counselling', 'projects', 'clubs', 'programmes' );
		ob_start();
	foreach ( $strs as $str ) {
		$what_title     = get_theme_mod( $str . '_section_title' );
		$what_text      = get_theme_mod( $str . '_section_p' );
		$what_link      = get_theme_mod( $str . '_section_link' );
		$what_link_text = get_theme_mod( $str . '_section_link_text' );
		$what_show      = get_theme_mod( $str . '_show_section' );
		$what_image     = wp_get_attachment_url( get_theme_mod( $str . '_section_image' ) );

		include locate_template( 'template-parts/ywig-components/what-section-item.php', false, false );

	}
	$what_we_do_output = ob_get_clean();
	if ( $what_we_do_output ) {
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-parts/ywig-components/what-section-item.php .
		echo $what_we_do_output;
	}

	?>
	</section>

	<?php


