<?php

/*
@package ywig-theme

YWIG Front Page - News section

*/
?>

<div class="row">
  <?php

	$args = array(
		'posts_per_page' => 50,
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'orderby'        => 'post_date',
		'order'          => 'ASC',
		'category_name'  => 'front-page-news',

	);



	$news = new WP_Query( $args );

	?>
  <div class="news-wrap">
	<?php
	$post_count = 0;
	if ( $news->have_posts() ) :
		while ( $news->have_posts() ) :
			$post_count += 1;
			$news->the_post();
			?>
		<div class="col-md-4 one-youth-club-wrap" style="background:var(--pink); border:1px solid;">
	  <h2><?php echo the_title(); ?> </h2>
			<?php echo the_post_thumbnail(); ?>
			<?php echo the_excerpt(); ?>
		</div>

			<?php
			/*
			Force next columns to break to new line.
			Bootstrap recommends this hack, need to do it every 3 projects .
			*/

			if ( $post_count % 3 === 0 ) {
				echo '<div class="w-100"></div> ';
			}

	  endwhile;
	endif;
	?>
  </div><!-- end .projects-wrap -->

  
</div><!-- end .tab-content -->
