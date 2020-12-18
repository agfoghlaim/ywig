<?php
/**
 * Displays the site header.
 *
 * @package ywig-theme
 */

$logo     = esc_url( get_option( 'logo' ) );
$twitter  = esc_url( get_option( 'twitter_link' ) );
$facebook = esc_url( get_option( 'facebook_link' ) );
$youtube  = esc_url( get_option( 'youtube_link' ) );
$socials  = array( $twitter, $facebook, $youtube );
?>

<header id="home" class="header" role="banner">

<a href="#main" class="skip-link screen-reader-text" >
	<?php echo esc_html_e( 'Skip to main content', 'ywig-theme' ); ?>
</a>		
<div class="header-left">



	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="custom-logo-link" rel="home">
		<img src="<?php echo esc_url( $logo ); ?>" alt="Youth Work Ireland Galway Logo" />
	</a>
	<!-- class="collapse navbar-collapse navbar-fixed-top" -->
	<nav id="navbarSupportedContent" >
	<button 
	class="navbar-toggler" 
			data-toggle="collapse" 
			data-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" 
			aria-expanded="false" >
			<span class="dropdown-icon open">
				<span class="screen-reader-text"><?php esc_html_e( 'Menu', 'ywig-theme' ); ?></span>
				<?php echo ywig_get_theme_svg( 'burger_menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</span>
			<span class="dropdown-icon close">
				<span class="screen-reader-text"><?php esc_html_e( 'Close', 'ywig-theme' ); ?></span>
				<?php echo ywig_get_theme_svg( 'close_menu' ); // phpcs:ignore WordPress.Security.EscapeOutput ?>
			</span>
		</button><!-- #primary-mobile-menu -->
		<!-- <button 
			class="navbar-toggler" 
			data-toggle="collapse" 
			data-target="#navbarSupportedContent" 
			aria-controls="navbarSupportedContent" 
			aria-expanded="false" 
			aria-label="Toggle navigation">
				<div class="line"></div>
				<div class="line"></div>
				<div class="line"></div>
				<div class="screen-reader-text">Menu</div>	
		</button> -->

		<?php
			wp_nav_menu(
				array(

					'theme_location' => 'main',
					'depth'          => 0, // 1 = no dropdowns, 2 = with dropdowns.
					'show_toggles'   => true,
					'container'      => false,
					'menu_class'     => 'navbar-nav',
					'fallback_cb'    => false,
					// 'walker'          => new WP_Bootstrap_Navwalker(),
				)
			);
			?>
	</nav>

	<?php
		// wp_nav_menu(
		// array(

		// 'theme_location'  => 'main',
		// 'depth'           => 0, // 1 = no dropdowns, 2 = with dropdowns.
		// 'container'       => 'nav',
		// 'show_toggles'    => true,
		// 'container_class' => 'collapse navbar-collapse navbar-fixed-top',
		// 'container_id'    => 'navbarSupportedContent',
		// 'menu_class'      => 'navbar-nav',
		// 'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
		// 'walker'          => new WP_Bootstrap_Navwalker(),
		// )
		// );
	?>


	<div class="navbar-socials">
		<?php
		//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in template-tags.php
		echo ywig_render_socials( $twitter, $facebook, $youtube );
		?>
	</div>
</div>
</header>
