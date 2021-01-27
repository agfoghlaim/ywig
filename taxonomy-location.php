<?php
/**
 * Location Taxonomy (eg '<site-url>/location/galway-city')
 *
 * @package ywig-theme
 */

	get_header(); ?>

<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $this_term = get_queried_object(); ?>
<?php
			set_query_var( 'taxonomy_loc_term', $this_term );
			get_template_part( 'template-parts/content/content-taxonomy-entry-header' );
			?>
		<div class="location-taxonomy-content-wrap">
			<section class="section-location-info">
				<?php
				require locate_template( 'template-parts/ywig-components/location-info.php', false, false );
				?>
			</section>

		<aside class="section-location-projects">
			<?php
			if ( have_posts() ) :
				 echo '<h3>Projects in ' . esc_html( $this_term->name ) . '<h3>';
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
		</aside>
	</div>
	</article>
<?php
get_footer();
