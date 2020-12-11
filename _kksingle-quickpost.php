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
	
	</div><!--.project-intro -->

	<div class="container <?php echo esc_attr( $post->post_type ); ?>-content-container">
		<div class="torn-white"></div>
		<div class="project-main">
			<?php
			//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php.


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

	</div>
</main>

<?php
get_footer();

