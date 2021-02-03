<?php
/**
 * Theme support functions
 *
 * @package ywig-theme
 */

/**
 * Nav Menu.
 */
function ywig_register_nav_menu() {
	register_nav_menu( 'main', 'YWIG Main Menu' );
	register_nav_menu( 'primary', 'Primary 2020' );
	register_nav_menu( 'secondary', 'YWIG Footer Menu' );
}
add_action( 'after_setup_theme', 'ywig_register_nav_menu' );

/**
 * Attachments to Categories.
 * TODO This should be removed.
 */
function wptp_add_categories_to_attachments() {
	register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init', 'wptp_add_categories_to_attachments' );
