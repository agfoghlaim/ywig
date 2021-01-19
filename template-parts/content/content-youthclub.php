<?php

/**
 * Related to Youthclub CPT ('/youthclub').
 * Displays project-intros whereas single-project displays all info about projects
 *
 * @package ywig-theme
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- <h1>content-project.php</h1> -->
<!-- (content-project.php) -->



	<?php // get_template_part( 'ywig-frontpage-sections/youthclubs' ); ?>
	<div class="youthclubs-wrap">

		<?php  get_template_part( 'template-parts/content/content', 'youthclub-intro' ); ?>
	</div>
	

	



	
</article>
