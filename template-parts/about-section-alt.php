<?php
/**
 * About Section Alt
 *
 * @package ywig
 */
?>

<?php
$mission_h = get_theme_mod( 'ywig-about-section-mission-h' );
$mission_p = get_theme_mod( 'ywig-about-section-mission-p' );
$box_1_h   = get_theme_mod( 'ywig-about-section-box-1-h' );
$box_1_p   = get_theme_mod( 'ywig-about-section-box-1-p' );
$box_2_h   = get_theme_mod( 'ywig-about-section-box-2-h' );
$box_2_p   = get_theme_mod( 'ywig-about-section-box-2-p' );
$box_3_h   = get_theme_mod( 'ywig-about-section-box-3-h' );
$box_3_p   = get_theme_mod( 'ywig-about-section-box-3-p' );
$img_url   = wp_get_attachment_url( get_theme_mod( 'ywig-about-section-image' ) );

?>
<section class="about" id="about">
<?php get_template_part( 'template-parts/svg-triangle' ); ?>
<div class="about-text-wrap">
		<h3><?php echo $mission_h; ?></h3>
		<blockquote class="ywig-blockquote"><?php echo $mission_p; ?></blockquote>
</div>
<div class="about-img-wrap">
		<img src="<?php echo $img_url; ?>">
</div>
<div class="about-who">
	<div class="overlay"></div>
<?php // get_template_part( 'template-parts/svg-people' ); ?>
<h3>Who We Are</h3>

		<p> <?php echo $box_3_p; ?></p>
</div>
<!-- <a href="https://www.vecteezy.com/free-vector/escape-run"></a> -->
<div class="about-what">
<h3>What We Do</h3>
		<p> <?php echo $box_3_p; ?></p>
		<a href="#" class="btn-link btn-outline cw">More About Us</a>
</div>




</section>
