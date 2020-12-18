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
//$paged = get_query_var( 'paged' );
$args  = array(
	'posts_per_page' => 2, // NOTE. if this is changed button.load-more-quickposts data attribute must also be updated
	'paged'          => $paged,
	'post_type'      => 'quickpost',
	'post_status'    => 'publish',
	'orderby'        => 'post_date',
	'order'          => 'ASC',

);

$quickposts = new WP_Query( $args );

?>
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
//	next_posts_link( 'Next', $quickposts->max_num_pages );
		if( is_front_page(  )) {
			?>
			<a href="<?php echo esc_url( site_url( '/project-news/', 'http' ) ); ?>" class="btn btn-dark">More</a>
			<?php
			echo 'front page - load more button will link to /project-news';
		}else {
			// project-news page
			?>
			<button 
			class="btn btn-dark load-more-quickposts" 
			data-current-page="<?php echo esc_attr( $paged ); ?>"
			data-posts-per-page="2"
			data-max-pages="<?php echo esc_attr( $quickposts->max_num_pages ); ?>"
			>Load More </button>
			<?php
			//	echo paginate_links( array( 'total' => $quickposts->max_num_pages ) );
		}
		
