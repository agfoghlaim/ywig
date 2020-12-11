<?php

/*
@package ywig-theme

ADMIN PAGE

*/

/**
 * Generate YWIG Admin Page (& dashboard menu entry).
 */
function ywig_add_admin_page() {

	add_menu_page(
		'YWIG Theme Options',
		'YWIG',
		'manage_options',
		'moh_ywig',
		'ywig_theme_create_page'
	);

	// Generate YWIG Admin Sub Pages
	// add_submenu_page(
	// 'moh_ywig',
	// 'YWIG Theme Options',
	// 'Settings',
	// 'manage_options',
	// 'moh_ywig',
	// 'ywig_theme_create_page'
	// );

	add_action( 'admin_init', 'ywig_custom_settings' );
}
add_action( 'admin_menu', 'ywig_add_admin_page' );


/**
 * Gets setting page template.
 */
function ywig_theme_create_page() {
	require_once get_template_directory() . '/inc/templates/ywig-admin.php';
}

/**
 * Registers settings in .ywig-settings-group' and adds a field for each.
 */
function ywig_custom_settings() {
	register_setting( 'ywig-settings-group', 'logo' );
	register_setting( 'ywig-settings-group', 'footer_logo' );
	register_setting( 'ywig-settings-group', 'twitter_link', 'ywig_sanitize_url' );
	register_setting( 'ywig-settings-group', 'facebook_link', 'ywig_sanitize_url' );
	register_setting( 'ywig-settings-group', 'youtube_link', 'ywig_sanitize_url' );

	// Company Address.
	register_setting( 'ywig-settings-group', 'company_address_1', 'sanitize_text_field' );
	register_setting( 'ywig-settings-group', 'company_address_2', 'sanitize_text_field' );
	register_setting( 'ywig-settings-group', 'company_address_3', 'sanitize_text_field' );

	// CHY, Charity & Company numbers
	register_setting( 'ywig-settings-group', 'chy_no', 'sanitize_text_field' );
	register_setting( 'ywig-settings-group', 'charity_reg', 'sanitize_text_field' );
	register_setting( 'ywig-settings-group', 'company_reg', 'sanitize_text_field' );

	add_settings_section( 'ywig-sidebar-options', 'YWIG Options', 'ywig_sidebar_options', 'moh_ywig' );

	function ywig_sidebar_options() {

	}

	// Header Logo.
	add_settings_field(
		'sidebar-logo',
		'Logo',
		'ywig_sidebar_logo_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	// Footer Logo.
	add_settings_field(
		'footer-logo',
		'Footer Logo',
		'ywig_footer_logo_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	// Social links.
	add_settings_field(
		'twitter-links', // why is this one plural??
		'Twitter Link',
		'ywig_twitter_link_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);
	add_settings_field(
		'facebook-link',
		'Facebook',
		'ywig_facebook_link_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);
	add_settings_field(
		'youtube-link',
		'Youtube',
		'ywig_youtube_link_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	// Company Address.
	add_settings_field(
		'company-address-1',
		'Company Address 1',
		'ywig_company_address_1_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);
	add_settings_field(
		'company-address-2',
		'Company Address 2',
		'ywig_company_address_2_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);
	add_settings_field(
		'company-address-3',
		'Company Address 3',
		'ywig_company_address_3_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	// CHY.
	add_settings_field(
		'chy-no',
		'CHY No.',
		'ywig_chy_no_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	// Charity Reg.
	add_settings_field(
		'charity_reg',
		'Charity Reg',
		'ywig_charity_reg_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	// Company No.
	add_settings_field(
		'company_no',
		'Company No.',
		'ywig_company_no_callback',
		'moh_ywig',
		'ywig-sidebar-options'
	);
}

// Social Media Setting Field Callbacks.

/**
 * Echos html for for the setting 'sidebar-logo' in 'YWIG Theme Options' settings page.
 * (sidebar-logo is badly named, should be header-logo)
 */
function ywig_sidebar_logo_callback() {
	 $logo = esc_url( get_option( 'logo' ) );

	if ( empty( $logo ) ) {
		echo '<input type="button" class="button-secondary" value="Choose Logo" id="upload-button" /><input type="hidden" id="logo-input" name="logo" value="' . esc_url( get_option( 'logo' ) ) . '" />';
	} else {

		echo '<input type="button" class="button-secondary" value="Change Logo" id="upload-button" /><input type="hidden" id="logo-input" name="logo" value="' . esc_url( get_option( 'logo' ) ) . '" /> <input type="button" class="button-secondary" value="Delete" id="logo-delete-button" />';
	}
}

/**
 * Echos html for for the setting 'footer-logo' in 'YWIG Theme Options' settings page.
 */
function ywig_footer_logo_callback() {
	 $footer_logo = esc_url( get_option( 'footer_logo' ) );
	if ( empty( $footer_logo ) ) {
		echo '<input type="button" class="button-secondary" value="Choose Footer Logo" id="footer-upload-button" /><input type="hidden" id="footer-logo-input" name="footer_logo" value="' . esc_url( get_option( 'footer_logo' ) ) . '" />';
	} else {

		echo '<input type="button" class="button-secondary" value="Change Footer Logo" id="footer-upload-button" /><input type="hidden" id="footer-logo-input" name="footer_logo" value="' . esc_url( get_option( 'footer_logo' ) ) . '" /> <input type="button" class="button-secondary" value="Delete" id="footer-logo-delete-button" />';
	}
}

/**
 * Echos html for for the setting 'twitter_link' in 'YWIG Theme Options' settings page.
 */
function ywig_twitter_link_callback() {
	// $twitter = esc_url( get_option( 'twitter_link' ) );
	echo '<p class="description">Enter your Twitter url</p><input type="text" name="twitter_link" value="' . esc_url( get_option( 'twitter_link' ) ) . '" placeholder="Twitter link" />';
}

/**
 * Echos html for for the setting 'fackbook_link' in 'YWIG Theme Options' settings page.
 */
function ywig_facebook_link_callback() {
	// $facebook = esc_url( get_option( 'facebook_link' ) );
	echo '<p class="description">Enter your Facebook url</p><input type="text" name="facebook_link" value="' . esc_url( get_option( 'facebook_link' ) ) . '" placeholder="Facebook link" />';
}

/**.
 * Echos html for for the setting 'youtube_link' in 'YWIG Theme Options' settings page.
 */
function ywig_youtube_link_callback() {
	// $youtube = esc_url( get_option( 'youtube_link' ) );
	echo '<p class="description">Enter your Youtube url</p><input type="text" name="youtube_link" value="' . esc_url( get_option( 'youtube_link' ) ) . '" placeholder="Youtube link" />';
}

// Company Address Setting Field Callbacks.

/**
 * Echos html for for the setting 'company_address_1' in 'YWIG Theme Options' settings page.
 */
function ywig_company_address_1_callback() {
	// $line = esc_html( get_option( 'company_address_1' ) );
	echo '<p class="description">Company Address Line 1</p><input type="text" name="company_address_1" value="' . esc_html( get_option( 'company_address_1' ) ) . '" placeholder="Company Address 1" />';
}

/**
 * Echos html for for the setting 'company_address_2' in 'YWIG Theme Options' settings page.
 */
function ywig_company_address_2_callback() {
	// $line = esc_html( get_option( 'company_address_2' ) );
	echo '<p class="description">Company Address Line 2</p><input type="text" name="company_address_2" value="' . esc_html( get_option( 'company_address_2' ) ) . '" placeholder="Company Address 2" />';
}

/**
 * Echos html for for the setting 'company_address_3' in 'YWIG Theme Options' settings page.
 */
function ywig_company_address_3_callback() {
	// $line = esc_html( get_option( 'company_address_3' ) );
	echo '<p class="description">Company Address Line 3</p><input type="text" name="company_address_3" value="' . esc_html( get_option( 'company_address_3' ) ) . '" placeholder="Company Address 3" />';
}

// Charity, CHY and Company Reg numbers

/**
 * Echos html for for the setting 'chy_no' in 'YWIG Theme Options' settings page.
 */
function ywig_chy_no_callback() {
	// $chy_no = esc_html( get_option( 'chy_no' ) );
	echo '<p class="description">CHY No.</p><input type="text" name="chy_no" value="' . esc_html( get_option( 'chy_no' ) ) . '" placeholder="CHY" />';
}

/**
 * Echos html for for the setting 'company_reg' in 'YWIG Theme Options' settings page.
 */
function ywig_company_no_callback() {
	// $company_reg = esc_html( get_option( 'company_reg' ) );
	echo '<p class="description">Company Reg</p><input type="text" name="company_reg" value="' . esc_html( get_option( 'company_reg' ) ) . '" placeholder="Company Reg" />';
}

/**
 * Echos html for for the setting 'charity_reg' in 'YWIG Theme Options' settings page.
 */
function ywig_charity_reg_callback() {
	// $charity_reg = esc_html( get_option( 'charity_reg' ) );
	echo '<p class="description">Charity Reg</p><input type="text" name="charity_reg" value="' . esc_html( get_option( 'charity_reg' ) ) . '" placeholder="Charity Reg" />';
}

/**
 * Util function. Sanitizes url
 *
 * @param string $url Url to sanitize.
 * @return string $output Sanitized Url.
 */
function ywig_sanitize_url( $url ) {
	$output = esc_url_raw( $url );
	return $output;
}

