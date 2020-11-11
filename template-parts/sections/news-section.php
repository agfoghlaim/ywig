<?php
/**
 * News
 *
 * @package ywig
 */
?>
  <section class="news" id="news">

	<div class="section-title-wrap">
	  <div class="row ywig-section-title-row">
		<img src="http://youthworkgalway.ie/wp-content/uploads/2018/06/ywig_tiny_colour.png">
	  </div>
	  <div class="row ywig-section-title-row">
		<h2 class="dark-text">News</h2>
	  </div>
	</div>

	<div 
		id="posts-from-app"
		style="display:grid; grid-template-columns:repeat(auto-fill, minmax(300px, 1fr)); "
	>
	</div>



	<div class="row">
	  <div class="offset-lg-3 col-lg-6 offset-md-3 col-md-6">
		<p class="text-center">This needs to be editable in the theme customizer under 'News Section'.</p>
	  </div>
	</div>
	
	<?php require_once get_template_directory() . '/ywig-frontpage-sections/news.php'; ?>

  </section>
