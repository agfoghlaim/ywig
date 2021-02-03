<?php
/**
 *
 * ADMIN ENQUEUE
 *
 * @package ywig
 */

/**
 * Load Admin scripts.
 *
 * Note: Loads css and js from the /dist folder. admin.css is currently empty but I think it makes sense to still load it.
 *
 *  @param string $name_of_current_admin_page Name of current admin page. Passed by admin_enqueue_scripts.
 */
function ywig_load_admin_scripts( $name_of_current_admin_page ) {

	if ( 'toplevel_page_moh_ywig' === $name_of_current_admin_page ) {

		wp_register_style( 'ywig_admin', get_template_directory_uri() . '/dist/css/admin.css', array(), '1.0.0', 'all' );

		wp_enqueue_style( 'ywig_admin' );

		// Use media uploader.
		wp_enqueue_media();

		wp_register_script( 'ywig-admin-script', get_template_directory_uri() . '/dist/js/admin.js', array( 'jquery' ), '1.0.0', true );

		wp_enqueue_script( 'ywig-admin-script' );
	}

}
add_action( 'admin_enqueue_scripts', 'ywig_load_admin_scripts' );


/**
 * Load Front end scripts.
 */
function ywig_load_scripts() {

	wp_enqueue_style( 'ywig-theme', get_template_directory_uri() . '/dist/css/app.css', array(), '1.0.0', 'all' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/js/app.js', null, '1.0.0', true );

	if ( is_front_page() ) {
		wp_enqueue_script( 'front', get_template_directory_uri() . '/dist/js/front.js', null, '1.0.0', true );

	}

	// Dec 2020 for rest endpoint (load more quickposts).
	wp_localize_script(
		'main',
		'rest_object',
		array(
			'api_nonce' => wp_create_nonce( 'wp_rest' ),
			'api_url'   => site_url( '/wp-json/ywig/v1/' ),
		)
	);

}
add_action( 'wp_enqueue_scripts', 'ywig_load_scripts' );
