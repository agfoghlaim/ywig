<?php
/**
 * Template Name: Youth Clubs
 *
 * @package ywig-theme
 */

$args = array(
	'post_type'   => 'youthclub',
	'post_status' => 'publish',
);

	$youth_clubs = new WP_Query( $args );

?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>
<section class="youthclubs-page-intro">

	<?php the_content(); ?>
	</section>

	<div class="index-content-wrap">
		<?php
		if ( $youth_clubs->have_posts() ) :

			while ( $youth_clubs->have_posts() ) : 
				?>
				<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="youthclubs-wrap">
					<?php

					$youth_clubs->the_post();

					?>

					<?php get_template_part( 'template-parts/content/content', 'youthclub-intro' ); ?>

					</div>
				</article>
				<?php

			endwhile;

			wp_reset_postdata();

		endif;

		?>

<?php get_footer(); ?>
