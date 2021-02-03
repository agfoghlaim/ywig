<?php
/**
 * YWIG Theme - Search Results Template
 *
 * @package ywig-theme
 */

get_header();
set_query_var( 'use_title', 'Search Results' );
get_template_part( 'template-parts/content/content-page-entry-header-any' );

?>
<div class="search-content-wrap ywig-content-wrap">

	<?php
	if ( have_posts() ) {

		// So there isn't two search forms on the page - only show search form if there ARE results because content-none also shows it.
		get_search_form();
		printf(
			esc_html(
				/* translators: %d: the number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'ywig'
				)
			),
			(int) $wp_query->found_posts
		);
		while ( have_posts() ) {
			$permalink = get_permalink();
			the_post();

			if ( '' !== get_the_title() && '' !== get_the_excerpt() ) {
				?>
				<div class="search-result-wrap">
					<?php the_title( sprintf( '<h2 class="twist"><a href="%s">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<div class="search-result" >
						<?php the_post_thumbnail( 'thumb' ); ?>
						<?php the_excerpt(); ?>
						<span class="sr-only"><?php echo 'Read more about ' . esc_html( the_title() ); ?></span>
						<a class="btn btn-dark" href="<?php echo esc_url( get_permalink() ); ?>">More</a>
					</div>
				</div>
				<?php
			}
		}
	} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );
	}

	?>
</div>
<div class="ywig-pagination">
	<?php echo wp_kses_post( paginate_links() ); ?>
</div>

<?php
get_footer();
