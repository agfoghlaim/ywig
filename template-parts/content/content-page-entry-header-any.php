<?php
/**
 * Header for page templates (use var as title)
 * Used by eg. 404.php
 *
 * @package ywig-theme
 */
$use_title = get_query_var( 'use_title' );


if ( ! empty( $use_title ) ) {
	?>
<header class="ywig-entry-header">
	<div class="header-img-overlay" style="background:url(	<?php echo esc_url( get_the_post_thumbnail_url() ); ?>); background-repeat:no-repeat; background-size: cover;background-position: center;"></div>
	<div class="haze-overlay"></div>
	<div class="torn-white"></div>
	<h1 class="entry-title twist"> <?php echo esc_html( $use_title ); ?></h1>
	<?php the_breadcrumb(); ?>
</header>
	<?php
}
