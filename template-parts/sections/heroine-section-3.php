<?php
/**
 * Heroine
 *
 * @package ywig
 */

$tagline_1     = get_theme_mod( 'heroine_tagline_1' );
$tagline_2     = get_theme_mod( 'heroine_tagline_2' );
$tagline_3     = get_theme_mod( 'heroine_tagline_3' );
$text          = get_theme_mod( 'heroine_text_content' );
$img_url       = wp_get_attachment_url( get_theme_mod( 'heroine_blob_image' ) );
$watermark_url = wp_get_attachment_url( get_theme_mod( 'heroine_watermark_image' ) );

?>
<div class="heroine-alt-3"> 
	<div class="heroine-left">
		<div class="text">
		<?php

		if ( $img_url ) {

			?>

		<img class="heroine-watermark" src="<?php echo esc_url( $watermark_url ); ?>">

			<?php

		}

		?>
			<div class="text-content">

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

				<?php
				if ( $text ) {

					?>

			<p> <?php echo esc_html( $text ); ?> </p>

					<?php

				}

				?>
			<a href="#">More</a>
			</div>
	</div>

	</div>

	<div class="heroine-right" > 
				<div class="heroine-img" style="background: url(<?php  echo esc_url( $img_url ); ?>);"></div>

	 </div> 
</div><!-- .heroine-alt -->
