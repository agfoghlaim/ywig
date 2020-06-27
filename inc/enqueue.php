<?php

/*
@package ywig-theme

ADMIN ENQUEUE

*/

function ywig_load_admin_scripts( $hook ) {
	// echo $hook; => 'toplevel_page_moh_ywig'
	echo '--------------------------------------------------------------------------------' . $hook;
	if ( 'toplevel_page_moh_ywig' == $hook ) {

		wp_register_style( 'ywig_admin', get_template_directory_uri() . '/dist/css/ywig.admin.css', array(), '1.0.0', 'all' );

		wp_enqueue_style( 'ywig_admin' );

		wp_enqueue_media();
		wp_register_script( 'ywig-admin-script', get_template_directory_uri() . '/js/ywig.admin.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'ywig-admin-script' );
	}

}
add_action( 'admin_enqueue_scripts', 'ywig_load_admin_scripts' );


/*
FRONT END ENQUEUE FUNCTIONS
*/

function ywig_load_scripts() {

	// wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.4.1', 'all' );

	wp_enqueue_style( 'ywig-theme', get_template_directory_uri() . '/dist/css/app.css', array(), '1.0.0', 'all' );

	// fonts
	wp_enqueue_style( 'montserrat_lato', 'https://fonts.googleapis.com/css?family=Lato:300i,400,400i,700|Montserrat:400,500,600,700,800,900&display=swap" rel="stylesheet"> ' );

	// wp_enqueue_script( 'bootstrap', get_template_directory_uri() . './js/bootstrap.min.js', array( 'jquery' ), '4.4.1', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/dist/js/app.js', null, '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'ywig_load_scripts' );
