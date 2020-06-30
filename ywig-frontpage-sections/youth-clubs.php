<?php

/*
@package ywig-theme

YWIG Front Page - Youth Clubs section

*/
?>

<div class="youth-clubs-wrap">
	<?php
	  $args = array(
		  'post_type'   => 'youthClub',
		  'post_status' => 'publish',
	  );

	  $clubs = new WP_Query( $args );
		?>
  
		<?php
		$post_count = 0;
		if ( $clubs->have_posts() ) :
			while ( $clubs->have_posts() ) :
				$post_count += 1;
				$clubs->the_post();
				?>
		  <div class="youth-club-info">
			  <h4><?php echo the_title(); ?> </h4>
				<?php echo the_post_thumbnail(); ?>
				<?php echo the_excerpt(); ?>
		  </div>

				<?php


		  endwhile;
		endif;
		?>
  
</div><!-- end .tab-content -->
