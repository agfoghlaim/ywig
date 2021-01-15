<?php
/**
 * Article header (MAYBE) for taxonomy (eg /location/prospect-hill)
 *
 * @package ywig-theme
 */

$this_term = get_query_var( 'taxonomy_loc_term' );
//var_dump($this_term);
?>

<header class="entry-header">
	<div class="header-img-overlay" style="background:url(	<?php echo get_the_post_thumbnail_url(); ?>); background-repeat:no-repeat; background-size: cover;background-position: center;"></div>
	<div class="haze-overlay"></div>
	<div class="torn-white"></div>
	<h1 class="entry-title twist"><?php echo $this_term->name; ?></h1>

	<?php the_breadcrumb(); ?>
</header>
