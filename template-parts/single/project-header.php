<?php
/**
 * Badly named.
 * Displays header for For YWIG Single Project Template (single-project.php).
 * Displays header for For YWIG Single Youth Club Template (single-youthclub.php).
 * @package ywig-theme
 */

?>
<header class="<?php echo esc_attr( $post->post_type ); ?>-header">
<div class="<?php echo esc_attr( $post->post_type ); ?>-header-img-overlay" style="background:url(	<?php echo esc_url( get_the_post_thumbnail_url() ); ?>); background-repeat:no-repeat; background-size: cover;background-position: center;"></div>
	<?php echo esc_html( the_post_thumbnail( 'medium' ) ); ?>
		<div class="<?php echo esc_attr( $post->post_type ); ?>-header-text">
			<h1 class="<?php echo esc_attr( $post->post_type ); ?>-title twist"><?php echo esc_html( get_the_title() ); ?></h1>
			<?php
			
			if ( get_field( 'project_tagline', get_the_ID() ) ) {
				echo '<p>' . esc_html( get_field( 'project_tagline', get_the_ID() ) ) . '</p>';
			} else {
				// There is no youthclub equivilent of 'project_tagline', echo empty paragraph for easier css.
				echo '<p style="height: 1.5rem"></p>';
			}
			?>
		</div>


	<?php ywig_breadcrumbs(); ?>

	<div class="torn-white-up"></div>
</header><!--.project-header -->
