<?php

/*
@package ywig-theme

YWIG Front Page - Youth Clubs section

*/
?>

<div class="row">
  <?php

	  // need to get projects with ~location $value->slug;
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
  
 
  
</div><!-- end .tab-content -->
