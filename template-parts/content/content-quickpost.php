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

// echo '<pre>';
// echo 'site_url() : ' . site_url();
// echo ' | get_site_url() : ' . get_site_url();
// echo  ' | home_url( ): ' . home_url( );
// echo '</pre>';

// if ( ! empty( $key_1_value ) ) {
// echo $key_1_value;
// }


// echo '<pre>';
// var_dump( $quickpost_link );



?>
<div class="quickpost-item">

<?php
			 // Get quick post link.....
			 $quickpost_link = get_post_meta( get_the_ID(), 'quickpost_link' );
if ( ! empty( $quickpost_link[0] ) && '' !== $quickpost_link[0] ) {
	// echo 'open link';
	// ie. there is a link & it's internal.
	if ( strpos( $quickpost_link[0], site_url() ) !== false ) {

						echo '<a href="' . esc_url( $quickpost_link[0] ) . '">';
	} elseif ( strpos( $quickpost_link[0], site_url() ) === false ) {

								  echo '<a target="_blank" rel="noopener noreferrer" title="external link" href="' . esc_url( $quickpost_link[0] ) . '" >';
	}
}
	 the_post_thumbnail( 'medium_large' );
	// close the link if there is one.
if ( ! empty( $quickpost_link[0] && '' !== $quickpost_link[0] ) ) {
	echo '</a>';
	// echo ' close link |>| ';
}

?>
	<div class="quickpost-text">
		<h3 class="heading-size-5"><?php the_title(); ?> </h3>
		<p><mark>
		<?php
		// echo get_the_content();
		echo wp_trim_words( wp_kses( get_the_content(), array() ), 40, '' );

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
			$link_to_related_project_page_exists = urlExists( $link_to_related_project_page );

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

