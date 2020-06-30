<?php
/**
 * Heroine
 *
 * @package ywig
 */

?>
<?php
// Tagline.
$tagline_1 = get_theme_mod( 'heroine-section-tagline-1' );
$tagline_2 = get_theme_mod( 'heroine-section-tagline-2' );
$tagline_3 = get_theme_mod( 'heroine-section-tagline-3' );
$img_url   = wp_get_attachment_url( get_theme_mod( 'heroine-section-sepia-image' ) );
$show_logo = get_theme_mod( 'heroine-section-show-logo' );

// Section 1.
$title_1 = get_theme_mod( 'heroine-section-title-1' );
$text_1  = get_theme_mod( 'heroine-section-text-1' );
$link_1  = get_theme_mod( 'heroine-section-link-1' );
$tick_1  = get_theme_mod( 'heroine-section-1-tick' );
$image_1 = wp_get_attachment_url( get_theme_mod( 'heroine-section-image-1' ) );

// Section 2
$title_2 = get_theme_mod( 'heroine-section-title-2' );
$text_2  = get_theme_mod( 'heroine-section-text-2' );
$link_2  = get_theme_mod( 'heroine-section-link-2' );

// Section 3
$title_3 = get_theme_mod( 'heroine-section-title-3' );
$text_3  = get_theme_mod( 'heroine-section-text-3' );
$link_3  = get_theme_mod( 'heroine-section-link-3' );

// $heading_1 = get_theme_mod( 'ywig-heroine-section-heroine-1-h' );
// $text_1 = get_theme_mod( 'ywig-heroine-section-heroine-1-p' );
// $link_1    = get_theme_mod( 'ywig-heroine-section-heroine-1-link' );
// $tick_1 = get_theme_mod( 'ywig-heroine-section-heroine-1-tick' );
// $img_url   = wp_get_attachment_url( get_theme_mod( 'ywig-heroine-section-heroine-1-image' ) );
// $box_1_h   = get_theme_mod( 'ywig-about-section-box-1-h' );
// $box_1_p   = get_theme_mod( 'ywig-about-section-box-1-p' );
// $box_2_h   = get_theme_mod( 'ywig-about-section-box-2-h' );
// $box_2_p   = get_theme_mod( 'ywig-about-section-box-2-p' );
// $box_3_h   = get_theme_mod( 'ywig-about-section-box-3-h' );
// $box_3_p   = get_theme_mod( 'ywig-about-section-box-3-p' );
// $img_url   = wp_get_attachment_url( get_theme_mod( 'ywig-about-section-image' ) );

?>
<div class="heroine"> 
	<div class="heroine-l-one">
		<div class="heroine-l-one-box-one heroine-box" style="background: linear-gradient(45deg, #0ba4c303, #0ba4c314),
		url(<?php echo esc_url( $img_url ); ?>);background-size: cover;
	  background-position: left center;
	  background-repeat: no-repeat;">
			</div>
		
		<div class="heroine-l-one-box-two heroine-box">
			
		<?php

		if ( $show_logo === true ) {

			get_template_part( 'template-parts/svg-logo' );
		}
		?>
			<h2>
				<span>
				<?php
				echo esc_html(
					$tagline_1
				);
				?>
				</span>
				<span><?php echo esc_html( $tagline_2 ); ?></span>
				<span><?php echo esc_html( $tagline_3 ); ?></span>
			</h2>
		</div>
	</div>
	<div class="heroine-l-two">
		<div class="overlay"></div>
		<div class="heroine-l-two-box-one heroine-box acc">
		<img src="<?php echo esc_url( $image_1 ); ?>">

		</div>
		<div class="heroine-l-two-box-two heroine-box">
		<?php
		echo $tick_1 ?
			'<div class="heroine-feature-label">Featured Project</div> '
		 : null;
		?>
			
		<h3><?php echo esc_html( $title_1 ); ?></h3>
			<p><?php echo esc_html( $text_1 ); ?></p>
		
			<a href='<?php echo esc_url( $link_1 ); ?>' class="btn-link btn-outline cw">More</a>
		</div>
	</div>
	<div class="heroine-l-three">
		<div class="heroine-l-three-box-one heroine-box">
		<div class="overlay"></div>
			<h3><?php echo esc_html( $title_2 ); ?></h3>
			<p><?php echo esc_html( $text_2 ); ?></p>
			<a href='<?php echo esc_url( $link_2 ); ?>' class="btn-link btn-outline cw">More</a>
		</div>
		<div class="heroine-l-three-box-two heroine-box">
		<div class="overlay"></div>
		<h3><?php echo esc_html( $title_3 ); ?></h3>
			<p><?php echo esc_html( $text_3 ); ?></p>
			<a href='<?php echo esc_url( $link_3 ); ?>' class="btn-link btn-outline cw">More</a>
		</div>
	</div>

</div><!-- home-hero-wrap -->

 
