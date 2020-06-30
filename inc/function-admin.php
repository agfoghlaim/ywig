<?php

/*
@package ywig-theme

ADMIN PAGE

*/

function ywig_add_admin_page() {
	// Generate YWIG Admin Page (& dashboard menu entry)
	add_menu_page(
		'YWIG Theme Options',
		'YWIG',
		'manage_options',
		'moh_ywig',
		'ywig_theme_create_page'
	);

	// Generate YWIG Admin Sub Pages
	add_submenu_page(
		'moh_ywig',
		'YWIG Theme Options',
		'Settings',
		'manage_options',
		'moh_ywig',
		'ywig_theme_create_page'
	);

	add_submenu_page(
		'moh_ywig',
		'YWIG CSS Options',
		'Custom CSS',
		'manage_options',
		'moh_ywig_css',
		'ywig_theme_settings_page'
	);

	// Activat Custom Settings
	add_action( 'admin_init', 'ywig_custom_settings' );
}

add_action( 'admin_menu', 'ywig_add_admin_page' );

function ywig_theme_create_page() {
	 require_once get_template_directory() . '/inc/templates/ywig-admin.php';
}

function ywig_theme_settings_page() {
	// require_once( get_template_directory() . '/inc/templates/ywig-admin.php');
}

function ywig_custom_settings() {
	register_setting( 'ywig-settings-group', 'logo' );
	// register_setting('ywig-settings-group', 'first_name');
	register_setting( 'ywig-settings-group', 'twitter_link', 'ywig_sanitize_url' );
	register_setting( 'ywig-settings-group', 'facebook_link', 'ywig_sanitize_url' );
	register_setting( 'ywig-settings-group', 'youtube_link', 'ywig_sanitize_url' );

	add_settings_section( 'ywig-sidebar-options', 'Sidebar Options', 'ywig_sidebar_options', 'moh_ywig' );

	// add_settings_field(
	// 'sidebar-name',
	// 'First Name',
	// 'ywig_sidebar_name',
	// 'moh_ywig',
	// 'ywig-sidebar-options'
	// );
	// add_settings_field( $id:string, $title:string, $callback:callable, $page:string, $section:string, $args:array )
	add_settings_field(
		'sidebar-logo',
		'Logo',
		'ywig_sidebar_logo',
		'moh_ywig',
		'ywig-sidebar-options'
	);

	add_settings_field(
		'twitter-links',
		'Twitter Link',
		'ywig_twitter_link',
		'moh_ywig',
		'ywig-sidebar-options'
	);
	add_settings_field(
		'facebook-link',
		'Facebook',
		'ywig_facebook_link',
		'moh_ywig',
		'ywig-sidebar-options'
	);
	add_settings_field(
		'youtube-link',
		'Youtube',
		'ywig_youtube_link',
		'moh_ywig',
		'ywig-sidebar-options'
	);
}

function ywig_sidebar_options() {
	echo '<p>site info edit</p>';
}

function ywig_sidebar_logo() {
	$logo = esc_attr( get_option( 'logo' ) );
	if ( empty( $logo ) ) {
		echo '<input type="button" class="button-secondary" value="Choose Logo" id="upload-button" /><input type="hidden" id="logo-input" name="logo" value="' . $logo . '" />';
	} else {

		echo '<input type="button" class="button-secondary" value="Change Logo" id="upload-button" /><input type="hidden" id="logo-input" name="logo" value="' . $logo . '" /> <input type="button" class="button-secondary" value="Delete" id="logo-delete-button" />';
	}
}

// function ywig_sidebar_name()
// {
// $first_name = esc_attr(get_option('first_name'));
// echo '<input type="text" name="first_name" value="' . $first_name . '" placeholder="First Name" />';
// }

function ywig_twitter_link() {
	$twitter = esc_attr( get_option( 'twitter_link' ) );
	echo '<p class="description">Enter your Twitter url</p><input type="text" name="twitter_link" value="' . $twitter . '" placeholder="Twitter link" />';
}
function ywig_facebook_link() {
	$facebook = esc_attr( get_option( 'facebook_link' ) );
	echo '<p class="description">Enter your Facebook url</p><input type="text" name="facebook_link" value="' . $facebook . '" placeholder="Facebook link" />';
}

function ywig_youtube_link() {
	$youtube = esc_attr( get_option( 'youtube_link' ) );
	echo '<p class="description">Enter your Youtube url</p><input type="text" name="youtube_link" value="' . $youtube . '" placeholder="Youtube link" />';
}

function ywig_sanitize_url( $url ) {
	$output = esc_url_raw( $url );
	return $output;
}
