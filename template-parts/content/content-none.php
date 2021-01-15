<?php
/**
 * Standard Post Format
 *
 * @package ywig-theme
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'ywig-theme' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php

		if ( is_search() ) :
			?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ywig-theme' ); ?></p>
			<?php
			// get_search_form();

		else :
			?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'ywig-theme' ); ?></p>
			<?php
			// get_search_form();

		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
