<?php
/**
 *
 * YWIG Front Page - Quickposts section
 *
 * @package ywig-them
 */

?>


<?php

$args = array(
	'posts_per_page' => 30,
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

			// Get id (&title) of related project from meta.
			$stored_id = get_post_meta( $post->ID, 'related_project_id', true );
			if ( '' !== $stored_id ) {
				$proj_title = get_the_title( $stored_id );
			}
			?>
		<div class="quickpost-item">
			<img src="
			<?php
			echo esc_url(
				get_the_post_thumbnail_url()
			);
			?>
						" />
			<div class="quickpost-text">
				<h3 class="heading-size-5"><?php the_title(); ?> </h3>
				<?php the_content(); ?>
			</div>
			<div class="quickpost-info">
				<span>
				<?php echo get_the_date(); ?> By 

				<?php
				/**
				 * Note site_url($path, $scheme), change $scheme to 'https' in production
				 * Also note this is dependent on the author name being the same as the project cpt title
				 * Ultimately wp users need to have the same name as project cpt titles.
				 */
				?>
				<a href="<?php echo esc_url( site_url( '/project/', 'http' ) ) . get_the_author(); ?>"><?php echo get_the_author(); ?></a>
				</span>
			</div>
		</div>

			<?php


		endwhile;
	endif;
	?>
</div><!-- end .projects-wrap -->

