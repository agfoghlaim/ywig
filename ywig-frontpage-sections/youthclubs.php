<?php
/**
 * Youth Clubs Section Front Page
 *
 * @package ywig-theme
 */
	// Theme Customizer.
$yc_section_title = get_theme_mod( 'youthclubs_section_title' );
$yc_section_text  = get_theme_mod( 'youthclubs_section_p' );

	$args = array(
		'post_type'   => 'youthclub',
		'post_status' => 'publish',
	);

		$myposts = new WP_Query( $args );

	?>
	<section class="youthclubs ywig-fp-section" id="youthclubs">
		<div class="yc-overlay"></div>
		<?php

		if ( $yc_section_title ) {
			echo '<h2 class="twist">' . esc_html( $yc_section_title ) . '</h2>';
		}
		if ( $yc_section_text ) {
			echo '<p class="section-tagline">' . esc_html( $yc_section_text ) . '</p>';
		}
		?>
	


		<div class="<?php echo esc_attr( $args['post_type'] . 's' ); ?>-wrap">
		<!-- <div class="over-yellow"></div> -->
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

