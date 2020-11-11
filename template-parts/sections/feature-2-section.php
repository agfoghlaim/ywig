<?php
/**
 * Feature 2 Section (Projects & Clubs sections)
 *
 * @package ywig
 */



// Section 1.
$title_2 = get_theme_mod( 'heroine_title_2' );
$text_2  = get_theme_mod( 'heroine_text_2' );
$link_2  = get_theme_mod( 'heroine_link_2' );

$title_3 = get_theme_mod( 'heroine_title_3' );
$text_3  = get_theme_mod( 'heroine_text_3' );
$link_3  = get_theme_mod( 'heroine_link_3' );
// $image_2 = wp_get_attachment_url( get_theme_mod( 'heroine_image_2' ) );


?>
<section class="feature-2-section"> 


	<div class="feature-2a">
		<div class="feature-2a-text">
			<img src="img/proj_big.png" alt="" />
			<h2 class="section-heading"><?php echo esc_html( $title_2 ); ?></h2>
			<p><?php echo esc_html( $text_2 ); ?>
			<span style="background: rgba(0,0,0,0.05);">1 paragraph only.
			About youth projects. Link to Project finder section. Seperate services?.
			All around galway. Art, Environment, LGBT+, Political?, Garda Diversion, Youth Information Service. 
			<a href='<?php echo esc_url( $link_2 ); ?>' class="btn btn-dark btn-block">More</a>
			</p>
		</div>
	</div>
  
  
	<div class="feature-2b">
		<img src="img/proj_big.png" alt="" />
		<div class="feature-2b-text">
		<h2 class="section-heading"><?php echo esc_html( $title_3 ); ?></h2>
			<p><?php echo esc_html( $text_2 ); ?><span style="background: rgba(0,0,0,0.05);">
			1 paragraph only.
			About youth clubs. Link to Youth Clubs section. Link to how to get affilliated.</span>
			</p>
		</div>
	</div>

</section>

