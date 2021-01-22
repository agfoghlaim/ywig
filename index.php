<?php
/**
 * YWIG Theme
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<?php

	// entry header shows the_title() and breadcrumbs, only use for singles and pages.


	// Think breadcrumbs are good in all scenarios now so test the use of this header on all pages. TODO, update logic in this template to be more logical!... header is called twice but I forget when exactly. it's /latest-news!!
	//if ( is_single() || is_page() ) {

		//get_template_part( 'template-parts/content/content-page-entry-header' );
	//}




		// entry header shows the_title() and breadcrumbs, specify title to use for cpts.
	if ( 'project' === get_post_type() ) {

		set_query_var( 'use_title', 'Projects' );
		get_template_part( 'template-parts/content/content-page-entry-header-any' );

	} elseif ( 'youthclub' === get_post_type() ) {

		set_query_var( 'use_title', 'Youth Clubs' );
		get_template_part( 'template-parts/content/content-page-entry-header-any' );

	} elseif ( is_home() ) {

			set_query_var( 'use_title', 'Latest Posts' );
			get_template_part( 'template-parts/content/content-page-entry-header-any' );

	}else {
		get_template_part( 'template-parts/content/content-page-entry-header' );
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
<div class="ywig-pagination">
	<?php echo paginate_links(); ?>
</div>
				
<h1>index.php</h1>
<?php
get_footer();
