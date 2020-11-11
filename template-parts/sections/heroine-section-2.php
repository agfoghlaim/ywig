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
$title_1    = get_theme_mod( 'heroine_title_1' );
$text_1     = get_theme_mod( 'heroine_text_1' );
$link_1     = get_theme_mod( 'heroine_link_1' );
$tick_1     = get_theme_mod( 'heroine_tick_1' );
$image_1    = wp_get_attachment_url( get_theme_mod( 'heroine_image_1' ) );
$blob_image = wp_get_attachment_url( get_theme_mod( 'heroine_blob_image' ) );

// Section 2.
$title_2 = get_theme_mod( 'heroine_title_2' );
$text_2  = get_theme_mod( 'heroine_text_2' );
$link_2  = get_theme_mod( 'heroine_link_2' );

// Section 3.
$title_3 = get_theme_mod( 'heroine_title_3' );
$text_3  = get_theme_mod( 'heroine_text_3' );
$link_3  = get_theme_mod( 'heroine_link_3' );


?>
<div class="heroine-alt"> 
	<div class="heroine-left">
		<div class="text">
			<h1>	
			<?php
				echo esc_html(
					$tagline_1
				);
				?>
				<br />
				<span class="h1-span">	
				<?php
				echo esc_html(
					$tagline_2
				);
				echo ' ' . esc_html(
					$tagline_3
				);
				?>
				</span>
		</h1>

		<svg
			class="blue-triangle"
			viewBox="0 0 87.970245 76.184472"
			height="76.184471mm"
			width="87.970245mm">	
				<path d="M43.985 0L87.97 76.184H0z" fill="#0ba3c2"paint-order="markers fill stroke"
			/>
		</svg>
				<p>
					We are a voluntary organisation committed to delivering quality
					youth services within local communities, to empower young people to
					identify and realise their potential in a safe and supportive
					environment.
				</p>
	</div>

	</div>

	<div class="heroine-right">
		<img class="heroine-blog-image" src="<?php echo esc_url( $blob_image ); ?>">
		<!-- <img src="img/looking_at_the_sea.png" class="heroine-blob" /> -->
	</div>

</div><!-- .heroine-alt -->
