<?php
/**
 * YWIG Theme Categories. Eg. /category/uncategorised
 * Very similar to index.php.
 * Show header with category name (if we have it) and breadcrumbs.
 * Show excerpts of posts in this category.
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php
	$the_cat = ( single_cat_title( '', false ) );

	if ( ! empty( $the_cat ) ) {

		// set_query_var( 'use_title', $the_cat);
		$t = 'News - ' . $the_cat;
		set_query_var( 'use_title', $t );
		get_template_part( 'template-parts/content/content-page-entry-header-any' );
	}
	get_template_part( 'template-parts/ywig-components/category-links' );
	?>
	<div class="category-content-wrap ywig-content-wrap">
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
	<?php echo paginate_links(); ?>
</div>
<h1>category.php</h1>
<?php
get_footer();
