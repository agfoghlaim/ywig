<?php
/**
 * Standard Post Format
 *
 * @package ywig-theme
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _esc_html_e( 'Nothing Found', 'ywig' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php

		if ( is_search() ) :
			?>

			<p><?php _esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ywig' ); ?></p>
			<?php

			get_search_form();

		else :
			?>

			<p><?php _esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'ywig' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
