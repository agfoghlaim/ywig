<?php
/**
 * The template for displaying the 404.
 *
 * @package ywig-theme
 */

get_header();
set_query_var( 'use_title', 'Oops - Page not found.' );
get_template_part( 'template-parts/content/content-page-entry-header-any' );
?>
<div class="four04-content-wrap ywig-content-wrap">
	<div class="intro-text">
		<p><?php esc_html_e( 'We\'re sorry. The page you were looking for could not be found.', 'ywig' ); ?></p>
	</div>

	<?php get_search_form(); ?>

</div><!-- .four04-content-wrap -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>
<?php
get_footer();


