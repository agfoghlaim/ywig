<?php
/**
 * Feature 1 Section (Counselling)
 *
 * @package ywig
 */

// Section 1.
$title_1 = get_theme_mod( 'heroine_title_1' );
$text_1  = get_theme_mod( 'heroine_text_1' );
$link_1  = get_theme_mod( 'heroine_link_1' );
$tick_1  = get_theme_mod( 'heroine_tick_1' );
$image_1 = wp_get_attachment_url( get_theme_mod( 'heroine_image_1' ) );

?>

<section class="feature-1-section"> 

<div class="feature-1">
	<img src="<?php echo esc_url( $image_1 ); ?>">

	<div class="feature-1-text">
		<h2 class="section-heading"><?php echo esc_html( $title_1 ); ?></h2>
		<p>
			<?php echo esc_html( $text_1 ); ?>
			<span style="background:rgba(0,0,0,0.05);">hardcoded : 1 paragraph only.Our qualified and accredited counsellors work in Galway City, Tuam, Ballinasloe and Loughrea.  Our counselling service was set up in ??? and has 'helped?' over ?? young people since then. It is funded through.... and donations...  allow us to provide the service free of charge to young people.
			<del>A free counselling service for young people.</del> . Link to counselling page, donate page. 
			</span>
		</p>
		<a href='<?php echo esc_url( $link_1 ); ?>' class="btn btn-dark btn-block">More</a>
	</div>
</div>

		<!-- 
		<?php
		// echo true === $tick_1 ? '<div class="heroine-feature-label">Featured Project</div> ' : null;
		?>
		 -->

</section><!-- .heroine -->
