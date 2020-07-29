<?php
/**
 * Project Excerpt, Thumbnail, More Btn and Location Tags
 *
 * @package ywig-theme
 */

$term_obj_list = get_the_terms( get_the_ID(), $terms_taxonomy );

if ( is_array( $term_obj_list ) || is_object( $term_obj_list ) ) {

	$terms_string = join( ' ', wp_list_pluck( $term_obj_list, 'slug' ) );

}

?>

	<div 
		tabindex="0"
		class="project-info-all show-proj fade <?php echo esc_attr( $terms_string ); ?>" 
		data-locations="<?php echo esc_attr( $terms_string ); ?>"
		>
		<div class="overlay"></div>
		<?php the_post_thumbnail(); ?>

		<div class="project-info-all-text">

			<h4><?php the_title(); ?></h4>

			<?php the_excerpt(); ?>

		</div>

		<a class="btn btn-outline-light" href="<?php the_permalink(); ?>">More</a>

		<div class="location-tags-wrap">

		<?php


		if ( is_array( $term_obj_list ) || is_object( $term_obj_list ) ) :
			foreach ( $term_obj_list as $loc ) {

				?>

				<span class="location-tag">

					<a href="<?php echo esc_attr( get_term_link( $loc->term_id ) ); ?>">

						<?php echo esc_html( $loc->name ); ?>

					</a>

				</span>

					<?php

			}

		endif;

		?>

		</div><!-- .location-tags-wrap -->

	</div>
