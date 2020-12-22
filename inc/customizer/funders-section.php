<?php

/**
 * Add Funders Section to Theme Customizer.
 *
 * CUSTOMIZER
 *
 *  @package ywig-theme
 */

require_once __DIR__ . '/classes/class-ywig-input.php';
require_once __DIR__ . '/classes/class-ywig-cropped-image.php';

/**
 * Create New section & define inputs for theme Customizer.
 * Important. Define sanitize for urls. Otherwise YWIG_Input class handles
 *
 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
 */
function ywig_funders_input_fields( $wp_customize ) {

	$section = 'funders';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Funders Section',
			'description' => __( 'Edit Funders Section.' ),
		)
	);

	// Define text/checkbox Inputs.
	$input_args = array(
		array(
			'setting_id' => 'section_title',
			'field_type' => 'text',
			'label'      => 'Section Title',
			'default'    => 'Funders',
		),
		array(
			'setting_id' => 'section_p',
			'field_type' => 'textarea',
			'label'      => 'Section Text',
			'default'    => '',
		),
		array(
			'setting_id' => 'show_section',
			'field_type' => 'checkbox',
			'label'      => 'Show Section',
			'default'    => true,
		),

	);

	// Define Image Inputs.
	$img_args = array(
		array(
			'setting_id' => 'section_image',
			'label'      => 'Funders Section Image',
			'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
			'flex_height' => true,
			'width'      => 1700,
			'height'     => 400,
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
add_action( 'customize_register', 'ywig_funders_input_fields' );
