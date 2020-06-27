<?php
/*
  The Header Template
 @package ywig-theme
  */

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

	<div class="container-fluid top-line">
	  <div class="row align-items-center">
		<div class="navbar-socials col-sm">

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
		<div class="navbar-brand col-sm">
		  <a href="#" class="custom-logo-link" rel="home">
			<img width="200" height="67" src="http://youthworkgalway.ie/wp-content/uploads/2018/06/ywig_new_logo-_op.png" />
		  </a>
		</div> <!-- /.navbar-brand -->
		<div class="navbar-donate col-sm">
		  <a href="#" target="_blank" class="btn btn-danger">Donate</a>
		</div>
	  </div>

	</div>

	<nav class="navbar nav-fill w-100 navbar-expand-sm navbar-light bg-light">
	  <div class="container">

		<button class="navbar-toggler" type="button" data-toggle="collapse" style="border:2px solid blue;" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>

		<?php
		wp_nav_menu(
			array(
				'theme_location'  => 'main',
				'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
				'container'       => 'div',
				'container_class' => 'collapse navbar-collapse',
				'container_id'    => 'navbarSupportedContent',
				'menu_class'      => 'navbar-nav mx-auto',
				'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
				'walker'          => new WP_Bootstrap_Navwalker(),
			)
		);
		?>

	  </div>
	</nav>
  </header>


