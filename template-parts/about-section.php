<?php
/**
 * About
 *
 * @package ywig
 */
?>
  <section class="about" id="about">

<div class="container-fluid">

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
  <div class="row ywig-mission-row">
  <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6">
	<h3><?php echo $mission_h; ?></h3>
	<blockquote class="ywig-blockquote"><?php echo $mission_p; ?></blockquote>
  </div>
  </div>

  <div class="row ywig-about-row ywig-about-row-1">

  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 ywig-about-box-1">
	<h3 class="ywig-about-h3"><?php echo $box_1_h; ?></h3>

	<!-- TODO - php/wp has some function that will put these into paragraphs as per paragraphs in textarea of customizer -->
	<p class="ywig-about-p"><?php echo $box_1_p; ?></p>
  </div>

  <div class="col col-lg-6 col-md-6">
	<div class="ywig-about-box-2">
	<img src="<?php echo $img_url; ?>">
	</div>
  </div>
  </div>

  <div class="row ywig-about-row ywig-about-row-2">
  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 ywig-about-box-3">
	<h3 class="ywig-about-h3"><?php $box_2_h; ?></h3>
	<p class="ywig-about-p"><?php echo $box_2_p; ?></p>
  </div>

  <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12 ywig-about-box-4">
	<h3 class="ywig-about-h3"><?php echo $box_3_h; ?></h3>
	<p class="ywig-about-p"><?php echo $box_3_p; ?></p>
	<div class="ywig-about-btn-group">
	<button class="btn btn-info">Learn More</button>
	<button class="btn btn-info">Donate</button>
	<button class="btn btn-info">Get Involved</button>
	</div>
  </div>

  </div><!-- .ywig-about-row-2 -->

</div> <!-- .container-fluid-->
</section>
