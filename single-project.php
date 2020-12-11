<?php
/**
 * YWIG Single Project Page
 *
 * @package ywig-theme
 */

?>
<?php
get_header();
?>

<main class="<?php echo esc_attr( $post->post_type ); ?>-content">

	<div class="<?php echo esc_attr( $post->post_type ); ?>-intro">
		<?php echo esc_html( the_post_thumbnail( 'medium' ) ); ?>
		<h1 class="<?php echo esc_attr( $post->post_type ); ?>-title"><?php echo esc_html( get_the_title() ); ?></h1>
		<?php
		if ( get_field( 'project_tagline', get_the_ID() ) ) {
			?>
			<?php
			echo '<p>' . esc_html( get_field( 'project_tagline', get_the_ID() ) ) . '</p>';
			?>
			<?php
		}
		?>
	</div><!--.project-intro -->

	<div class="container <?php echo esc_attr( $post->post_type ); ?>-content-container">
		<div class="torn-white"></div>
		<div class="project-main">
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
		<div class="project-right">
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
		</div>
	</div>
</main>

<?php
get_footer();

