<?php
/**
 * Heroine
 *
 * @package ywig
 */

// Tagline.
$tagline_1 = get_theme_mod( 'heroine_tagline_1' );
$tagline_2 = get_theme_mod( 'heroine_tagline_2' );
$tagline_3 = get_theme_mod( 'heroine-section-tagline-3' );
$img_url   = wp_get_attachment_url( get_theme_mod( 'heroine-section-sepia-image' ) );
$show_logo = get_theme_mod( 'heroine_show_logo' );

// Section 1.
$title_1 = get_theme_mod( 'heroine_title_1' );
$text_1  = get_theme_mod( 'heroine_text_1' );
$link_1  = get_theme_mod( 'heroine_link_1' );
$tick_1  = get_theme_mod( 'heroine_tick_1' );
$image_1 = wp_get_attachment_url( get_theme_mod( 'heroine_image_1' ) );

// Section 2.
$title_2 = get_theme_mod( 'heroine_title_2' );
$text_2  = get_theme_mod( 'heroine_text_2' );
$link_2  = get_theme_mod( 'heroine_link_2' );

// Section 3.
$title_3 = get_theme_mod( 'heroine_title_3' );
$text_3  = get_theme_mod( 'heroine_text_3' );
$link_3  = get_theme_mod( 'heroine_link_3' );


?>
<div class="heroine"> 
	<div class="heroine-l-one">
		<div 
		class="heroine-l-one-box-one heroine-box" 
		style="background: linear-gradient(45deg, #0ba4c303, #0ba4c314), url(<?php echo esc_url( $img_url ); ?>); background-size: cover; background-position: left center; background-repeat: no-repeat;"
		>
			</div>

		<div class="heroine-l-one-box-two heroine-box">

		<?php

		if ( $show_logo === true ) {

			get_template_part( 'template-parts/svg/svg-logo' );
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
		echo true === $tick_1 ? '<div class="heroine-feature-label">Featured Project</div> ' : null;
		?>
		<h3><?php echo esc_html( $title_1 ); ?></h3>
			<p><?php echo esc_html( $text_1 ); ?></p>
			<a href='<?php echo esc_url( $link_1 ); ?>' class="btn btn-dark btn-block">More</a>
			<!-- <a href='<?php // echo esc_url( $link_1 ); ?>' class="btn-link btn-outline cw">More</a> -->
		</div>
	</div>
	<div class="heroine-l-three">
		<div class="heroine-l-three-box-one heroine-box">
		<div class="overlay"></div>
			<h3><?php echo esc_html( $title_2 ); ?></h3>
			<p><?php echo esc_html( $text_2 ); ?></p>
			<a href='<?php echo esc_url( $link_2 ); ?>' class="btn btn-outline-light">More</a>
		</div>
		<div class="heroine-l-three-box-two heroine-box">
		<div class="overlay"></div>
		<h3><?php echo esc_html( $title_3 ); ?></h3>
			<p><?php echo esc_html( $text_3 ); ?></p>
			<a href='<?php echo esc_url( $link_3 ); ?>' class="btn btn-outline-light">More</a>
		</div>
	</div>

</div><!-- .heroine -->
