<?php
/**
 * Location Taxonomy
 *
 * @package ywig-theme
 */

	get_header(); ?>


<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php $this_term = get_queried_object(); ?>
		<?php 
		
		set_query_var( 'taxonomy_loc_term', $this_term );
		 get_template_part( 'template-parts/content/content-taxonomy-entry-header' );

		// echo '<pre>';
		// var_dump($this_term);
		// echo '</pre>';
		// die();
		?>
<?php //echo '<h1>' . $this_term->name . '</h1>'; ?> 
		<section class="section-location-info">
			<?php
			require locate_template( 'template-parts/ywig-components/location-info.php', false, false );
			?>
		</section>

		<section class="section-location-projects">
			<h3>Projects @ <?php echo esc_html( $this_term->name ); ?></h3>
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
</article>
<?php
get_footer();
