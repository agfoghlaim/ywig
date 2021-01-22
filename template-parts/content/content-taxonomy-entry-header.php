<?php
/**
 * Header for taxonomy (eg /location/prospect-hill)
 * Note the_post_thumbnail will only be vaguely related to this term.
 *
 * @package ywig-theme
 */

$this_term = get_query_var( 'taxonomy_loc_term' );
?>

<header class="ywig-entry-header">
	<div class="header-img-overlay" style="background:url(	<?php echo esc_url( get_the_post_thumbnail_url() ); ?>); background-repeat:no-repeat; background-size: cover;background-position: center;"></div>
	<div class="haze-overlay"></div>
	<div class="torn-white"></div>
	<h1 class="entry-title twist"><?php echo esc_html( $this_term->name ); ?></h1>
	<?php ywig_breadcrumbs(); ?>
</header>
