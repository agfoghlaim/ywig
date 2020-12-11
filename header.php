<?php
/**
 * The Header Template

 * @package ywig-theme
 */

$logo     = esc_url( get_option( 'logo' ) );
$twitter  = esc_url( get_option( 'twitter_link' ) );
$facebook = esc_url( get_option( 'facebook_link' ) );
$youtube  = esc_url( get_option( 'youtube_link' ) );
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

	<header id="home" class="header" role="banner">

		<a href="#main-content" class="skip-link screen-reader-text" >
			<?php echo esc_html_e( 'Skip to main content', 'ywig-theme' ); ?>
		</a>		
		<div class="header-left">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<div class="line"></div>
					<div class="line"></div>
					<div class="line"></div>
			</button>

			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
				<img src="<?php echo esc_url( $logo ); ?>" alt="Youth Work Ireland Galway Logo" />
			</a>

			<?php
				wp_nav_menu(
					array(

						'theme_location'  => 'main',
						'depth'           => 0, // 1 = no dropdowns, 2 = with dropdowns.
						'container'       => 'nav',
						'container_class' => 'collapse navbar-collapse navbar-fixed-top',
						'container_id'    => 'navbarSupportedContent',
						'menu_class'      => 'navbar-nav',
						// 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
						// 'walker'          => new WP_Bootstrap_Navwalker(),
					)
				);
				?>

			<div class="navbar-socials">
				<?php
				//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php
				echo ywig_render_socials( $twitter, $facebook, $youtube );
				?>
			</div>
		</div>
	</header>
