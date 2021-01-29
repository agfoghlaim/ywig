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

	<div class="ywig-content-wrap">
		<?php
		if ( $youth_clubs->have_posts() ) :
			?>
			<div class="youthclubs-wrap">
				<?php
				while ( $youth_clubs->have_posts() ) :


					$youth_clubs->the_post();

					get_template_part( 'template-parts/content/content', 'youthclub-intro' ); 

				endwhile;

				wp_reset_postdata();
				?>
			</div>
			<?php
		endif;

		?>
	</div>
<?php get_footer(); ?>
