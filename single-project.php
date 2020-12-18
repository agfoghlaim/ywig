<?php
/**
 * YWIG Single Project Template.
 * Displays all information about CPT Projects.
 * Different from project-intros which show summary information.
 *
 * @package ywig-theme
 */

?>
<?php
get_header();

?>
<article  id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php get_template_part('template-parts/single/project-header'); ?>

	<div class="<?php echo esc_attr( $post->post_type ); ?>-content-container">
		<!-- <div class="torn-white"></div> -->
		<div class="project-content">
			<?php
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
		<aside class="project-aside">
			<?php
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
					echo ywig_single_yc_project_address( $post->post_type );
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
					echo ywig_single_yc_project_socials( $post->post_type );
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
					echo ywig_single_yc_project_staff( get_the_ID(), $post->post_type );
					//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.
					echo ywig_single_yc_project_show_project_news( get_the_ID(), $post->post_title );
			?>
		</aside>
	</div>
</article>
<?php
get_footer();

