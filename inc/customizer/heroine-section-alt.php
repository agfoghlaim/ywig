<?php

/**
 * Add new section to Customizer.
 *
 * CUSTOMIZER - Heroine SECTION (homepage)
 *
 *  @package ywig-theme
 */

require_once __DIR__ . '/classes/class-ywig-input.php';
require_once __DIR__ . '/classes/cropped-image.php';

/**
 * Create Heroine section & define inputs for theme Customizer.
 * Important. Define sanitize for urls. Otherwise YWIG_Input class handles
 *
 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
 */
function ywig_heroine_input_fields( $wp_customize ) {

	$section = 'heroine';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Heroine Section',
			'description' => __( 'Edit the Front Page Heroine Section.' ),
		)
	);

	// Text Inputs.
	$input_args = array(

		// Heroine Tagline Section.
				array(
					'setting_id' => 'tagline_1',
					'field_type' => 'text',
					'label'      => 'Tagline 1',
					'default'    => 'Empowering',
				),
		array(
			'setting_id' => 'tagline_2',
			'field_type' => 'text',
			'label'      => 'Tagline 2',
			'default'    => 'Young',
		),
		array(
			'setting_id' => 'tagline_3',
			'field_type' => 'text',
			'label'      => 'Tagline 3',
			'default'    => 'People',
		),
		array(
			'setting_id' => 'text_content',
			'field_type' => 'textarea',
			'label'      => 'Heroine Text Content',
			'default'    => '',
		),

	);

	// Image Inputs.
	$img_args = array(

		array(
			'setting_id' => 'blob_image',
			'label'      => 'Blog Image Image',
			'width'      => 900,
			'height'     => 500,
		),

	);

	foreach ( $img_args as $args ) {
		$img_input = new YWIG_Cropped_Image( $section, $args );
		$img_input->register( $wp_customize );

	}
	foreach ( $input_args as $args ) {
		$input = new YWIG_Input( $section, $args );
		$input->register( $wp_customize );

	}

}
add_action( 'customize_register', 'ywig_heroine_input_fields' );
