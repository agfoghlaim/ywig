<?php
/**
 * Feature 2 Section (Projects & Clubs sections)
 *
 * @package ywig
 */

// Projects.
$title_1     = get_theme_mod( 'projects_section_title' );
$text_1      = get_theme_mod( 'projects_section_p' );
$link_1      = get_theme_mod( 'projects_section_link' );
$link_1_text = get_theme_mod( 'projects_section_link_text' );
$show_1      = get_theme_mod( 'projects_show_section' );
$image_1     = wp_get_attachment_url( get_theme_mod( 'projects_section_image' ) );


// Youth Clubs.
$title_2     = get_theme_mod( 'clubs_section_title' );
$text_2      = get_theme_mod( 'clubs_section_p' );
$link_2      = get_theme_mod( 'clubs_section_link' );
$link_2_text = get_theme_mod( 'clubs_section_link_text' );
// TODO. How to handle show because it's projcts/clubs are kinda 2 in 1.
$show_2  = get_theme_mod( 'clubs_show_section' );
$image_2 = wp_get_attachment_url( get_theme_mod( 'clubs_section_image' ) );



?>

<section class="feature-2-section"> 


	<div class="feature-2a">

	<?php

	if ( $image_1 ) {

		?>

<img src="<?php echo esc_url( $image_1 ); ?>">

		<?php

	}

	?>

		<div class="feature-2a-text">

		<?php

		if ( $title_1 ) {

			?>

				<h2 class="section-heading" ><?php echo esc_html( $title_1 ); ?></h2>

			<?php
		}
		?>

		<?php

		if ( $text_1 ) {

			?>

				<p><?php echo esc_html( $text_1 ); ?> </p>

			<?php

		}

		?>

		<?php

		if ( $link_1 && $link_1_text ) {

			?>

			<a href='<?php echo esc_url( $link_1 ); ?>' class="btn btn-dark btn-block">
			<?php echo esc_html( $link_1_text ); ?>
			</a>

			<?php

		}

		?>

		</div>


	</div>


	<div class="feature-2b">

		<div class="feature-2b-overlay"></div>
	<?php

	if ( $image_2 ) {

		?>

	<img src="<?php echo esc_url( $image_2 ); ?>">

		<?php

	}

	?>


		<div class="feature-2b-text">

		<?php

		if ( $title_2 ) {

			?>

				<h2 class="section-heading"><?php echo esc_html( $title_2 ); ?></h2>

			<?php
		}
		?>

		<?php

		if ( $text_2 ) {

			?>

				<p><?php echo esc_html( $text_2 ); ?> </p>

			<?php

		}

		?>

		<?php

		if ( $link_2 && $link_2_text ) {

			?>

			<a href='<?php echo esc_url( $link_2 ); ?>' class="btn btn-dark btn-block">

				<?php echo esc_html( $link_2_text ); ?>

			</a>
			<?php

		}

		?>

		</div>
	</div>
  
  

</section>

