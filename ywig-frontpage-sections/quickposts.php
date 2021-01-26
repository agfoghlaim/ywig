<?php
/**
 *
 * YWIG Front Page - Quickposts section
 *
 * @package ywig-them
 */

?>


<?php
 $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
// $paged = get_query_var( 'paged' );
$args = array(
	'posts_per_page' => 6, // NOTE. if this is changed button.load-more-quickposts data attribute must also be updated
	'paged'          => $paged,
	'post_type'      => 'quickpost',
	'post_status'    => 'publish',
	'orderby'        => 'post_date',
	'order'          => 'DESC',

);

$quickposts = new WP_Query( $args );

?>
<section class="quickposts ywig-fp-section" id="quickposts">
	
	
	
	<h2 class="twist">Project News</h2>
	<div class="quickpost-wrap">
	<?php

	if ( $quickposts->have_posts() ) :
		while ( $quickposts->have_posts() ) :
			$quickposts->the_post();
			get_template_part( 'template-parts/content/content', 'quickpost' );
			// Get id (&title) of related project from meta.



		endwhile;
		?>

		<?php

	endif;
	?>
</div><!-- end .projects-wrap -->
<?php

// next_posts_link( 'Next', $quickposts->max_num_pages );
if ( is_front_page() ) {
	?>
			<a href="<?php echo esc_url( site_url( '/project-news/', 'http' ) ); ?>" class="btn btn-dark">More</a>
			<?php

} else {
	// project-news page.
	// only show 'load more' button if there are more posts to load. $quickposts->max_num_pages will be greater than one if there are more posts.
	if ( $quickposts->max_num_pages > 1 ) {
		?>

<button 
class="btn btn-dark load-more-quickposts" 
data-current-page="<?php echo esc_attr( $paged ); ?>"
data-posts-per-page="6"
data-max-pages="<?php echo esc_attr( $quickposts->max_num_pages ); ?>"
>Load More </button>
		<?php
	}

			// echo paginate_links( array( 'total' => $quickposts->max_num_pages ) );
}
?>
</section>		
