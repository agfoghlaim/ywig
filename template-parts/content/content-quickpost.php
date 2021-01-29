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
<div class="quickpost-item">

	<?php

	// Get quick post link.....
	$quickpost_link = get_post_meta( get_the_ID(), 'quickpost_link' );

	// if user has entered a link wrap the post thumbnail in an <a> tag.
	if ( ! empty( $quickpost_link[0] ) && '' !== $quickpost_link[0] ) {

		// ie. there is a link & it's internal.
		if ( strpos( $quickpost_link[0], site_url() ) !== false ) {

			echo '<a title="Internal link" href="' . esc_url( $quickpost_link[0] ) . '">';

		} elseif ( strpos( $quickpost_link[0], site_url() ) === false ) {

			echo '<a target="_blank" rel="noopener noreferrer" title="External link" href="' . esc_url( $quickpost_link[0] ) . '" >';
		}
	}
	the_post_thumbnail( 'medium_large' );
	// close the link if there is one.
	if ( ! empty( $quickpost_link[0] && '' !== $quickpost_link[0] ) ) {
		echo '</a>';

	}

	?>
	<div class="quickpost-text">
		<h3 class="heading-size-5">
			<?php //the_title(); ?> 
			<?php echo esc_html( wp_trim_words( wp_kses( get_the_title(), array() ), 6, '' ) ); ?>
		</h3>
		<p><mark>
		<?php
		echo esc_html( wp_trim_words( wp_kses( get_the_content(), array() ), 40, '' ) );
		?>
		</mark><p>
	</div>

	<div class="quickpost-info">
		<span>
			<?php echo get_the_date(); ?> By 

			<?php
			/**
			 * TODO Note site_url($path, $scheme), change $scheme to 'https' in production
			 * Also note this is dependent on the author name being the same as the project cpt title
			 * Ultimately wp users need to have the same name as project cpt titles.
			 */
			?>
			<?php
			// Note: get_the_author() returns The author's display name.

			$link_to_related_project_page        = site_url( '/project/', 'http' ) . get_the_author();
			$link_to_related_project_page_exists = ywig_url_exists( $link_to_related_project_page );

			if ( $link_to_related_project_page_exists ) {

				?>

				<a href="<?php echo esc_url( $link_to_related_project_page ); ?>" >
					<?php echo get_the_author(); ?>
				</a> 	
				<?php
			} else {
				echo '<span>' . get_the_author() . '</span>';
			}
			?>
		</span>
	</div>

</div>
<?php

