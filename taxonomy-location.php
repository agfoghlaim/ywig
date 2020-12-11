<?php
/**
 * Location Taxonomy
 *
 * @package ywig-theme
 */

	get_header(); ?>

	<main id="main" class="site-main" role="main"> 
		 <!-- <h1>taxonomy-location.php</h1>  -->
		<?php $this_term = get_queried_object(); ?>

		<section class="section-location-info">
			<?php
			require locate_template( 'template-parts/ywig-components/location-info.php', false, false );
			?>
		</section>

		<section class="section-location-projects">
			<h3>Projects @ <?php echo $this_term->name; ?></h3>
			<?php
			if ( have_posts() ) :
				?>
				<div class="location-tax-project-wrap">	
				<?php
				get_template_part( 'template-parts/projects-wrap' );

				while ( have_posts() ) :

					the_post();

					set_query_var( 'terms_taxonomy', 'location' );
					get_template_part( 'template-parts/content/content', 'project-intro' );


				endwhile;
				?>
					</div>
				<?php
			endif;

			?>
		</section>
	</main>
<?php
get_footer();
