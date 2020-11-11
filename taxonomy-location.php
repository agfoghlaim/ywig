<?php
/**
 * Location Taxonomy
 *
 * @package ywig-theme
 */

get_header(); ?>

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main"> <h1>taxonomy-locaion.php</h1>
	<?php


	$this_term = get_queried_object();
	// $address   = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'address', true ) );
	// $eircode   = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'eircode', true ) );
	// $map_link  = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'mapLink', true ) );
	// $phone     = get_term_meta( $this_term->term_id, sprintf( 'ywig_location_%s_metadata', 'phone', true ) );
	?>
	<div class="row">

		<h1>This Location Dets - <?php echo $this_term->name; ?></h1>

	</div>

	<?php
	require locate_template( 'template-parts/ywig-components/location-info.php', false, false );
	?>
	<h2>Projects @ <?php echo $this_term->name; ?></h2>
	<?php
	if ( have_posts() ) :
		?>
		<div class="location-tax-project-wrap">


		<?php
		get_template_part( 'template-parts/projects-wrap' );

		while ( have_posts() ) :

			the_post();

			set_query_var( 'terms_taxonomy', 'location' );
			get_template_part( 'template-parts/content/content', 'project-intro' );


		endwhile;
		?>
			</div>
		<?php
	endif;

	?>

	</main>

</div>

<?php
get_footer();
