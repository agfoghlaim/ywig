<?php
/**
 * Heroine
 *
 * @package ywig
 */

$tagline_1 = get_theme_mod( 'heroine_tagline_1' );
$tagline_2 = get_theme_mod( 'heroine_tagline_2' );
$tagline_3 = get_theme_mod( 'heroine-section-tagline-3' );
$text      = get_theme_mod( 'heroine_text_content' );
$img_url   = wp_get_attachment_url( get_theme_mod( 'heroine_blob_image' ) );

?>
<div class="heroine-alt"> 
	<div class="heroine-left">
		<div class="text">
			<h1>	
			<?php

				echo esc_html( $tagline_1 );

			?>
				<br />
				<span class="h1-span">	


					<?php

					echo esc_html( $tagline_2 );

					echo ' ' . esc_html( $tagline_3 );

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

		<?php
		if ( $text ) {

			?>

			<p> <?php echo esc_html( $text ); ?> </p>

			<?php

		}

		?>

	</div>

	</div>

	<div class="heroine-right">
		<?php

		if ( $img_url ) {

			?>

				<img class="heroine-blog-image" src="<?php echo esc_url( $img_url ); ?>">

			<?php

		}

		?>

	</div>

</div><!-- .heroine-alt -->
