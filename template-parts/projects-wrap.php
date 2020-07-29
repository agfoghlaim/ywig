<?php
/**
 * Project Excerpt, Thumbnail, More Btn and Location Tags
 *
 * @package ywig-theme
 */

	$post_args      = get_query_var( 'proj_args' );
	$terms_taxonomy = get_query_var( 'terms_taxonomy' );
	$myposts        = new WP_Query( $post_args );

?>

	<div class="<?php echo esc_attr( $post_args['post_type'] . 's' ); ?>-wrap">

	<?php
	if ( $myposts->have_posts() ) :

		while ( $myposts->have_posts() ) :

			$myposts->the_post();
			if ( $terms_taxonomy ) {
				get_template_part( 'template-parts/content/content', 'project-intro' );
			}

		endwhile;

		wp_reset_postdata();

	endif;

	echo '</div>'; // end .projects-wrap.
