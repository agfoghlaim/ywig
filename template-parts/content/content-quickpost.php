<?php
/**
 * Quickpost CPT content
 *
 * Used by front page ywig-frontpage-sections/quickposts.php
 * Also used by Used by (probably) index.php for siteurl/quickpost
 * (Will) also used for siteurl/quickposts page
 *
 * @package ywig-theme
 */

?>

	<?php

			// Get id (&title) of related project from meta.
			// NOTE ++++++++++++++++++++++++++++++++++++++++++
			// I'm pretty certin this code is defunct. Now relying on author/user names being created to match project slugs. See below site_url( '/project/', 'http' ) ) . get_the_author()
	// 		$stored_id = get_post_meta( $post->ID, 'related_project_id', true );
	// if ( '' !== $stored_id ) {
	// 	$proj_title = get_the_title( $stored_id );
	// }
	?>
		<div class="quickpost-item">
			<?php the_post_thumbnail( 'medium' ); ?>

			<!-- <img src="
			<?php
			// echo esc_url(
			// get_the_post_thumbnail_url()
			// );
			?>
						" /> -->
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
				<?php
				$link_to_related_project_page        = site_url( '/project/', 'http' ) . get_the_author();
				$link_to_related_project_page_exists = urlExists( $link_to_related_project_page );

				if ( $link_to_related_project_page_exists ) {
					?>

					<a href="<?php echo esc_url( $link_to_related_project_page ); ?>"><?php echo get_the_author(); ?></a> 
					<?php
				} else {
					echo '<span>' . get_the_author() . '</span>';
				}
				?>
				</span>
			</div>
		</div>
