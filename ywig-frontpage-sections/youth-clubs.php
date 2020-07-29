<?php

/**
 * Youth Clubs Section Front Page
 *
 * @package ywig-theme
 */

	$args = array(
		'post_type'   => 'youthclub',
		'post_status' => 'publish',
	);

		$myposts = new WP_Query( $args );

	?>

	<div class="<?php echo esc_attr( $args['post_type'] . 's' ); ?>-wrap">

	<?php
	if ( $myposts->have_posts() ) :

		while ( $myposts->have_posts() ) :

			$myposts->the_post();

			?>

			<div  class="youthclub-info">
				<!-- <div class="yc-info-overlay"></div> -->
						<?php the_post_thumbnail(); ?>

				<div class="youthclub-info-text">

					<h4><?php the_title(); ?></h4>

					<?php esc_html( the_excerpt() ); ?>

				</div>

				<a class="btn btn-outline-light" href="<?php the_permalink(); ?>">More</a>

			</div>

			<?php

		endwhile;

		wp_reset_postdata();

	endif;

	echo '</div>'; // end .XXX-wrap.
