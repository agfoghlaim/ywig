<?php
/**
 *
 * YWIG Front Page - Quickposts section
 *
 * @package ywig-them
 */

?>


<?php

$pgd = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

// Theme Customizer.
$fp_section_title = get_theme_mod( 'quickposts_section_title' );
$fp_section_text  = get_theme_mod( 'quickposts_section_p' );

// quickpost link (meta).
if ( is_front_page() ) {
	$num_posts_to_show = 6;
	$is_front          = true;
} else {
	$num_posts_to_show = 18;
	$is_front          = false;
}

$args = array(
	'posts_per_page' => $num_posts_to_show, // NOTE: Related to data- attr in button.load-more-quickposts btn.
	'paged'          => $pgd,
	'post_type'      => 'quickpost',
	'post_status'    => 'publish',
	'orderby'        => 'post_date',
	'order'          => 'DESC',

);

$quickposts = new WP_Query( $args );

?>
<section class="quickposts ywig-fp-section <?php echo $is_front ? 'quickposts-front' : null; ?>" id="quickposts">
	<?php echo $is_front ? '<div class="qp-over"></div>' : null; ?>

	<?php


	if ( $is_front && $fp_section_title ) {
		echo '<h2 class="twist">' . esc_html( $fp_section_title ) . '</h2>';
	}
	if ( $is_front && $fp_section_text ) {
		echo '<p class="section-tagline">' . esc_html( $fp_section_text ) . '</p>';
	}


	?>
	<div class="quickpost-wrap">
	<?php

	if ( $quickposts->have_posts() ) :
		while ( $quickposts->have_posts() ) :
			$quickposts->the_post();
			get_template_part( 'template-parts/content/content', 'quickpost' );
		endwhile;
		wp_reset_postdata();
		?>

		<?php

	endif;
	?>
</div><!-- end .projects-wrap -->
<?php


if ( is_front_page() ) {
	?>
			<a href="<?php echo esc_url( site_url( '/project-news/', 'http' ) ); ?>" class="btn btn-outline-light">More</a>
			<?php

} else {
	// project-news page.
	// only show 'load more' button if there are more posts to load. $quickposts->max_num_pages will be greater than one if there are more posts.
	if ( $quickposts->max_num_pages > 1 ) {
		?>

<button 
class="btn btn-dark load-more-quickposts" 
data-current-page="<?php echo esc_attr( $pgd ); ?>"
data-posts-per-page="<?php echo esc_attr( $num_posts_to_show ); ?>"
data-max-pages="<?php echo esc_attr( $quickposts->max_num_pages ); ?>"
>Load More </button>
		<?php
	}
}
?>
</section>		
