<?php
/**
 * Single Project Excerpt.
 * For Project Finder - Project  Excerpt, Thumbnail, More Btn and Location Tags
 * For /project via index.php and content-project.php
 *
 * @package ywig-theme
 */

$term_obj_list = get_the_terms( get_the_ID(), $terms_taxonomy );
if ( is_array( $term_obj_list ) || is_object( $term_obj_list ) ) {

	$terms_string = join( ' ', wp_list_pluck( $term_obj_list, 'slug' ) );

	/**
	 * Attr aria-labelledby corresponds to the tab ids in ywig-finder.php.
	 * where $terms_string is "somewhere somewhere-else", $aria_string will be "pills-somewhere-tab pills-somewhere-else-tab".
	 * */
	$aria_string = ywig_get_aria_labelledby_str( $terms_string );

}

?>

	<div 
		class="project-info-all show-proj fade <?php echo esc_attr( $terms_string ); ?>" 
		data-locations="<?php echo esc_attr( $terms_string ); ?>" 
		aria-labelledby="<?php echo esc_attr( $aria_string ); ?>"
		>
		<div class="project-info-img-wrap">

			<?php the_post_thumbnail(); ?>
		</div>


		<div class="project-info-all-text">

			<h3><?php the_title(); ?></h3>

			<?php the_excerpt(); ?>

		</div>

		<a class="btn btn-outline-light" href="<?php the_permalink(); ?>">
		<span class="sr-only">Read more about <?php the_title(); ?></span>
		<span>More</span>
	</a>

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
