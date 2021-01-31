<?php
/**
 * About Section
 *
 * @package ywig-theme
 */

$section_title  = get_theme_mod( 'about_section_title' );
$text_1         = get_theme_mod( 'about_text_1' );
$title_2        = get_theme_mod( 'about_title_2' );
$text_2         = get_theme_mod( 'about_text_2' );
$title_3        = get_theme_mod( 'about_title_3' );
$text_3         = get_theme_mod( 'about_text_3' );
$btn_link       = get_theme_mod( 'about_link' );
$img_url        = wp_get_attachment_url( get_theme_mod( 'about_main_image' ) );
$complete_image = wp_get_attachment_image( get_theme_mod( 'about_main_image' ), array( '700', '600' ) );
?>
<section class="about-2 ywig-fp-section" id="about">
		<div class="over"></div>
		<div class="about-what">
			<div class="item">

				<h2 class="twist"><?php echo esc_html( $section_title ); ?></h2>
				<h3><?php echo esc_html( $title_2 ); ?></h3>
				<p> <?php echo esc_html( $text_2 ); ?></p>
				<h3><?php echo esc_html( $title_3 ); ?></h3>
				<p> <?php echo esc_html( $text_3 ); ?></p>
				<a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-outline-dark">More About Us</a>
			</div>
			<?php
				$img_args = array(
					'img' => array(
						'class'   => array(),
						'width'   => array(),
						'height'  => array(),
						'src'     => array(),
						'loading' => array(),
						'srcset'  => array(),
						'sizes'   => array(),
					),
				);
				echo wp_kses( $complete_image, $img_args );
				?>

		</div>


</section>
