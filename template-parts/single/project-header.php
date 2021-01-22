<?php
/**
 * Displays header for For YWIG Single Project Template (single-project.php).
 *
 * @package ywig-theme
 */

?>
<header class="<?php echo esc_attr( $post->post_type ); ?>-header">
	<?php echo esc_html( the_post_thumbnail( 'medium' ) ); ?>
		<div class="<?php echo esc_attr( $post->post_type ); ?>-header-text">
			<h1 class="<?php echo esc_attr( $post->post_type ); ?>-title twist"><?php echo esc_html( get_the_title() ); ?></h1>
			<?php
			if ( get_field( 'project_tagline', get_the_ID() ) ) {
				echo '<p>' . esc_html( get_field( 'project_tagline', get_the_ID() ) ) . '</p>';
			}
			?>
		</div>


	<?php ywig_breadcrumbs(); ?>

	<div class="torn-white-up"></div>
</header><!--.project-header -->
