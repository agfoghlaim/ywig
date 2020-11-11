<?php
/**
 * About Section Alt
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
<section class="about-anything" id="about">
	<div class="overlay"></div>
	<?php get_template_part( 'template-parts/svg/svg-triangle' ); ?>
	<div class="about-text-wrap">
		<img src="http://localhost/ywig-theme/wp-content/uploads/2020/07/you_can_do_anything_c.png"/>
		<div class="text-right">

			<h3><?php echo esc_html( $title_1 ); ?></h3>
			<blockquote class="ywig-blockquote"><?php echo esc_html( $text_1 ); ?></blockquote>
			<a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-outline-dark">More About Us</a>
		</div>
	</div>



</section>
