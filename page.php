<?php
/**
 * YWIG Page
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>

	<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>

		<div class="page-content-wrap ywig-content-wrap">
	<?php
	get_template_part( 'template-parts/content/content-page' );

	?>
</div>
page.php

<?php
get_footer();

