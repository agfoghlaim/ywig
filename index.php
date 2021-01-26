<?php
/**
 * YWIG Theme
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php



	// entry header shows the_title() and breadcrumbs.
	// Think breadcrumbs are good in all scenarios now so test the use of this header on all pages.


	// entry header shows the_title() and breadcrumbs, specify title to use for cpts 'project' and 'youthclub' otherwise it will use the title of the first posts of those types.
	if ( 'project' === get_post_type() ) {

		set_query_var( 'use_title', 'Projects' );
		get_template_part( 'template-parts/content/content-page-entry-header-any' );

	} elseif ( 'youthclub' === get_post_type() ) {

		set_query_var( 'use_title', 'Youth Clubs' );
		get_template_part( 'template-parts/content/content-page-entry-header-any' );

	} elseif ( is_home() ) {

		// Also specify title if it is the Blog page.
		set_query_var( 'use_title', 'News' );
		get_template_part( 'template-parts/content/content-page-entry-header-any' );

	} else {
		get_template_part( 'template-parts/content/content-page-entry-header' );
	}
	?>

<?php
// if is blog page, show category links.
if ( is_home() ) {
	get_template_part( 'template-parts/ywig-components/category-links' );
}
?>
			<div class="index-content-wrap ywig-content-wrap">
			<?php
			if ( have_posts() ) {

				while ( have_posts() ) {
					the_post();

					get_template_part( 'template-parts/content/content', get_post_type() );
				}
			} else {

				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content/content', 'none' );

			}

			?>
	</div>
</div>
<div class="ywig-pagination">
	<?php
	// TODO check this is all escaped properly in template-tags before phpcs ignoring it.
	echo paginate_links(); 
	?>
</div>
<h1>index.php</h1>
<?php
get_footer();
