<?php
/**
 * Feature 1 Section (Counselling)
 *
 * @package ywig
 */

$title_1     = get_theme_mod( 'counselling_section_title' );
$text_1      = get_theme_mod( 'counselling_section_p' );
$link_1      = get_theme_mod( 'counselling_section_link' );
$link_1_text = get_theme_mod( 'counselling_section_link_text' );
$show        = get_theme_mod( 'counselling_show_section' );
$image_1     = wp_get_attachment_url( get_theme_mod( 'counselling_section_image' ) );


if ( true === $show ) {
	?>
	<section class="feature-1-section"> 

		<div class="feature-1">

		<?php

		if ( $image_1 ) {

			?>

			<img src="<?php echo esc_url( $image_1 ); ?>">

			<?php

		}

		?>


			<div class="feature-1-text">

			<?php

			if ( $title_1 ) {

				?>

				<h2 class="section-heading"><?php echo esc_html( $title_1 ); ?></h2>

				<?php

			}

			?>

			<?php

			if ( $text_1 ) {

				?>

				<p><?php echo esc_html( $text_1 ); ?></p>

				<?php

			}

			?>

			<?php

			if ( $link_1 && $link_1_text ) {

				?>

				<a href='<?php echo esc_url( $link_1 ); ?>' class="btn btn-dark btn-block"><?php echo esc_html( $link_1_text ); ?></a>

				<?php

			}

			?>

			</div>
		</div>
	</section>

	<?php
}

