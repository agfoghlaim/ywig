<?php

/*

@package ywig-theme

ADMIN PAGE

*/

function ywig_add_admin_page()
{

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
  add_action('admin_init', 'ywig_custom_settings');
}

add_action('admin_menu', 'ywig_add_admin_page');

function ywig_theme_create_page()
{
  require_once(get_template_directory() . '/inc/templates/ywig-admin.php');
}

function ywig_theme_settings_page()
{
  // require_once( get_template_directory() . '/inc/templates/ywig-admin.php');
}

function ywig_custom_settings()
{ register_setting('ywig-settings-group', 'logo');
  register_setting('ywig-settings-group', 'first_name');
  register_setting('ywig-settings-group', 'twitter_link', 'ywig_sanitize_url');

  add_settings_section('ywig-sidebar-options', 'Sidebar Options', 'ywig_sidebar_options', 'moh_ywig');

  add_settings_field(
    'sidebar-name',
    'First Name',
    'ywig_sidebar_name',
    'moh_ywig',
    'ywig-sidebar-options'
  );
  add_settings_field(
    'sidebar-twitter',
    'Twitter',
    'ywig_sidebar_twitter',
    'moh_ywig',
    'ywig-sidebar-options'
  );

  add_settings_field(
    'sidebar-logo',
    'Logo',
    'ywig_sidebar_logo',
    'moh_ywig',
    'ywig-sidebar-options'
  );
}

function ywig_sidebar_options() {
  echo '<p>site info edit</p>';
}

function ywig_sidebar_logo() {
  $logo = esc_attr(get_option('logo'));
  echo '<input type="button" class="button-secondary" value="Upload Logo" id="upload-button" /><input type="hidden" id="logo-input" name="logo" value="' . $logo . '" />';
}

function ywig_sidebar_name() {
  $first_name = esc_attr(get_option('first_name'));
  echo '<input type="text" name="first_name" value="' . $first_name . '" placeholder="First Name" />';
}

function ywig_sidebar_twitter() {
  $twitter = esc_attr(get_option('twitter_link'));
  echo '<input type="text" name="twitter_link" value="' . $twitter . '" placeholder="Twitter link" /><p class="description">Enter your Twitter url</p>';
}

function ywig_sanitize_url($url) {
  $output = esc_url_raw($url);
  return $output;
}
