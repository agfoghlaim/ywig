<?php
/**
 * The Header Template

 * @package ywig-theme
 */


?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	</link>
	<?php endif; ?>
	<?php wp_head(); ?>
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	</meta>
</head>

<body <?php body_class(); ?>>
<?php get_template_part( 'template-parts/header/site-header' ); ?>


<main id="main">

