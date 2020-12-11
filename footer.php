<?php
/**
 * The Footer Template
 *
 * @package ywig-theme
 */

// Company Information.
$logo              = get_option( 'footer_logo' );
$company_address_1 = get_option( 'company_address_1' );
$company_address_2 = get_option( 'company_address_2' );
$company_address_3 = get_option( 'company_address_3' );
$chy_no            = get_option( 'chy_no' );
$charity_reg       = get_option( 'charity_reg' );
$company_reg       = get_option( 'company_reg' );

// Social media links.
$twitter  = esc_url( get_option( 'twitter_link' ) );
$facebook = esc_url( get_option( 'facebook_link' ) );
$youtube  = esc_url( get_option( 'youtube_link' ) );
?>


		<footer class="site-footer">
			<div class="footer-left item">
				<?php
				wp_nav_menu( array( 'theme_location' => 'secondary' ) );
				?>
			</div>

			<div class="footer-center item">

				<?php
				if ( ( ! empty( $twitter ) ) || ( ! empty( $facebook ) ) || ( ! empty( $youtube ) ) ) {
					?>
					<div class="ywig-socials-wrap">
						<?php
						//phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped --Escaped in template-tags.php
							echo ywig_render_socials( $twitter, $facebook, $youtube );
						?>
					</div>
					<?php
				}

				?>
			</div>

			<div class="footer-right item">
				<a href="#" class="custom-logo-link" rel="home">
					<img height="67" src="<?php echo esc_url( $logo ); ?>" />
				</a>
				<p class=""><?php echo esc_html( $company_address_1 ); ?></p>
				<p class=""><?php echo esc_html( $company_address_2 ); ?></p>
				<p class=""><?php echo esc_html( $company_address_3 ); ?></p>
				<p class=""><?php echo esc_html( $chy_no ); ?></p>
				<p class=""><?php echo esc_html( $charity_reg ); ?></p>
				<p class=""><?php echo esc_html( $company_reg ); ?></p>
			</div>
		</footer>

		<?php wp_footer(); ?>

	</body>
</html>
