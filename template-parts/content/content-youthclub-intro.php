<?php
/**
 * Single Youth Club excerpt
 * For Project Finder - Project  Excerpt, Thumbnail, More Btn and Location Tags
 * For /project via index.php and content-project.php
 *
 * @package ywig-theme
 */

 ?>

<div  class="youthclub-info">
	<!-- <div class="yc-info-overlay"></div> -->
			<?php the_post_thumbnail(); ?>

	<div class="youthclub-info-text">

		<h4><?php the_title(); ?></h4>

		<?php esc_html( the_excerpt() ); ?>

	</div>

	<a class="btn btn-outline-dark" href="<?php the_permalink(); ?>">More</a>

</div>