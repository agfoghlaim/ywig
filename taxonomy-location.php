<?php
/**
 * Location Taxonomy
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main"> <h1>taxonomy-location.php</h1>
	<?php
	$term = get_queried_object();
	// var_dump( $term );
	// echo '<pre>';
	// print_r( $term );
	// echo '</pre>';

	$address  = get_term_meta( $term->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
	$eircode  = get_term_meta( $term->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
	$map_link = get_term_meta( $term->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
	$phone    = get_term_meta( $term->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
	?>
	<div class="row">

		<h1>This Location Dets - <?php echo $term->name; ?></h1>
		
	</div>

	<div class="row">
	<div class="">
				<h2><?php echo $term->name; ?></h2>
				<p> <?php echo isset( $address[0] ) ? $address[0] : ''; ?> </p>
				<p> <?php echo isset( $eircode[0] ) ? $eircode[0] : ''; ?> </p><br />
				<p> <?php echo isset( $phone[0] ) ? $phone[0] : ''; ?> </p>
				<p> <?php echo isset( $term->description ) ? $term->description : ''; ?> </p>
			</div>
	</div>

	<h2>Projects @ <?php echo $term->name; ?></h2>
	<?php
	if ( have_posts() ) :

		while ( have_posts() ) :

			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">

			<?php the_title( '<h1 class="entry-title>', '</h1>' ); ?>

		<div class="entry-meta">
	
		</div>
		</header>
		<div class="entry-content">
			
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="standard-featured">
					<?php the_post_thumbnail(); ?>
				</div>
			<?php endif; ?>

			<div class="entry-excerpt">
				<?php the_excerpt(); ?>
			</div>
		</div>

		<a href="<?php the_permalink(); ?>" class="btn">
				<?php esc_html_e( 'Read More' ); ?>
		</a>

		<footer class="entry-footer">

		</footer>

	
</article>
			<?php

		endwhile;

	endif;

	?>

	</main>

</div>

<?php
get_footer();
