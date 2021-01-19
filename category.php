<?php
/**
 * YWIG Theme Categories. Eg. /category/uncategorised
 * Show header with category name (if we have it) and breadcrumbs.
 * Show excerpts of posts in this category.
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php
		$the_cat = get_the_category( );
	
		if( ! empty( $the_cat ) ){
		$use_title = $the_cat[0]->name;

			set_query_var( 'use_title', $use_title );
			get_template_part( 'template-parts/content/content-page-entry-header-any' );
		}


	?>
<div class="index-content-wrap">
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

<h1>category.php</h1>
<?php
get_footer();
