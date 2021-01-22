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
	<section class="youthclubs" id="youthclubs">
		<div class="yc-overlay"></div>
		<h2 class="twist">Youth Clubs</h2>
		<p>This needs to be editable in the theme customizer under 'Youth Clubs Section'.</p>

		<div class="<?php echo esc_attr( $args['post_type'] . 's' ); ?>-wrap">
		<div class="over-yellow"></div>
		<?php
		if ( $myposts->have_posts() ) :

			while ( $myposts->have_posts() ) :

				$myposts->the_post();

				?>
		<?php get_template_part( 'template-parts/content/content', 'youthclub-intro' ); ?>

				<?php

			endwhile;

			wp_reset_postdata();

		endif;

		echo '</div>'; // end .XXX-wrap.
		?>
</section>

