<?php
/*
  The Header Template
 @package ywig-theme
  */
$logo     = esc_attr( get_option( 'logo' ) );
$twitter  = esc_attr( get_option( 'twitter_link' ) );
$facebook = esc_attr( get_option( 'facebook_link' ) );
$youtube  = esc_attr( get_option( 'youtube_link' ) );
$socials  = array( $twitter, $facebook, $youtube );
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

  <title>
  <?php
	bloginfo( 'name' );
		  wp_title();
	?>
			</title>
			
</head>

<body <?php body_class(); ?>>

  <header id="home" class="header">

	<div class="header-left">
	<div class="navbar-brand">
		<a href="#" class="custom-logo-link" rel="home">
		<img height="67" src="<?php print $logo; ?>" />
		</a>
  </div> <!-- /.navbar-brand -->
  <div class="navbar-socials">
	  <?php
		if ( ! empty( $twitter ) ) :
			?>
	  <a href="<?php echo $twitter; ?>" target="_blank" class="ywig-social-btn">
		<span class="ywig-icon-sidebar ywig-icon ywig-twitter"></span>
		<span class="sr-only">Visit our Twitter</span></a>
			<?php
	  endif;
		if ( ! empty( $facebook ) ) :
			?>
	  <a href="<?php echo $facebook; ?>" target="_blank" class="ywig-social-btn">
		<span class="ywig-icon-sidebar ywig-icon ywig-facebook"></span>
		<span class="sr-only">Visit our Facebook</span></a>
			<?php
	  endif;
		if ( ! empty( $youtube ) ) :
			?>
	  <a href="<?php echo $youtube; ?>" target="_blank" class="ywig-social-btn">
		<span class="ywig-icon-sidebar ywig-icon ywig-youtube"></span>
		<span class="sr-only">Visit our Youtube</span></a>
			<?php
	  endif;
		?>
	  </div>
  </div>

	<div class="header-right">
	<nav class="navbar navbar-expand-sm navbar-light">

	  <button class="navbar-toggler" type="button" data-toggle="collapse" style="border:2px solid blue;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	  </button>
  
	  <?php
		wp_nav_menu(
			array(

				'theme_location'  => 'main',
				'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'collapse navbar-collapse navbar-fixed-top',
				'container_id'    => 'navbarSupportedContent',
				'menu_class'      => 'navbar-nav',
			// 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				// 'walker'          => new WP_Bootstrap_Navwalker(),
			)
		);

		?>
	</nav>

  </div>
  </header>


