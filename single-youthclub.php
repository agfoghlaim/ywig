<?php
/**
 * YWIG Single Youth Club Page
 *
 * NOTE This is a copy of single-project.php but I like the clarity.
 *
 * @package ywig-theme
 */

?>
<?php
get_header();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php get_template_part( 'template-parts/single/project-header' ); ?>
		<div class="<?php echo esc_attr( $post->post_type ); ?>-content-container">
			<div class="<?php echo esc_attr( $post->post_type ); ?>-content">

			<?php
			// afcs
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
			echo ywig_single_yc_project_acfs( get_the_ID(), $post->post_type );
			?>
			<div class="<?php echo esc_attr( $post->post_type ); ?>-row">
				<?php
				// Any content from editor.
				if ( have_posts() ) {

					while ( have_posts() ) {

						the_post();

						the_content();

					}
				}
				?>
			</div>
			</div>

	
			<aside class="<?php echo esc_attr( $post->post_type ); ?>-aside">
			<?php
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
			echo ywig_single_yc_project_address( $post->post_type );
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
			echo ywig_single_yc_project_socials( $post->post_type );
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
			echo ywig_single_yc_project_staff( get_the_ID(), $post->post_type );
			?>
			</aside>
	

	</div> <!-- .cpt-content-container-->
</article>

<?php
get_footer();

