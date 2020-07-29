<?php
/**
 * About Section
 *
 * @package ywig-theme
 */

$title_1  = get_theme_mod( 'about_title_1' );
$text_1   = get_theme_mod( 'about_text_1' );
$title_2  = get_theme_mod( 'about_title_2' );
$text_2   = get_theme_mod( 'about_text_2' );
$title_3  = get_theme_mod( 'about_title_3' );
$text_3   = get_theme_mod( 'about_text_3' );
$btn_link = get_theme_mod( 'about_link' );
$img_url  = wp_get_attachment_url( get_theme_mod( 'about_main_image' ) );
?>
<section class="about" id="about">
	<?php get_template_part( 'template-parts/svg/svg-triangle' ); ?>
	<div class="about-text-wrap">
			<h3><?php echo esc_html( $title_1 ); ?></h3>
			<blockquote class="ywig-blockquote"><?php echo esc_html( $text_1 ); ?></blockquote>
	</div>
	<div class="about-img-wrap">
			<img src="<?php echo esc_url( $img_url ); ?>">
	</div>
	<div class="about-who">
		<div class="overlay"></div>
		<h3><?php echo esc_html( $title_2 ); ?></h3>
		<p> <?php echo esc_html( $text_2 ); ?></p>
	</div>
	<div class="about-what">
		<h3><?php echo esc_html( $title_3 ); ?></h3>
		<p> <?php echo esc_html( $text_3 ); ?></p>
		<a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-outline-dark">More About Us</a>
	</div>
</section>
