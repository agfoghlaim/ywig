<?php

/**
 * Add Feature 2 (Youth Clubs) section to Customizer.
 *
 * CUSTOMIZER
 *
 *  @package ywig-theme
 */

require_once __DIR__ . '/classes/class-ywig-input.php';
require_once __DIR__ . '/classes/cropped-image.php';

/**
 * Create New section & define inputs for theme Customizer.
 * Important. Define sanitize for urls. Otherwise YWIG_Input class handles
 *
 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
 */
function ywig_clubs_input_fields( $wp_customize ) {

	$section = 'clubs';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Youth Clubs Section',
			'description' => __( 'Edit Youth Clubs Section.' ),
		)
	);

	// Define text/checkbox Inputs.
	$input_args = array(
		array(
			'setting_id' => 'section_title',
			'field_type' => 'text',
			'label'      => 'Section Title',
			'default'    => 'Youth Clubs',
		),
		array(
			'setting_id' => 'section_p',
			'field_type' => 'textarea',
			'label'      => 'Section Text',
			'default'    => '',
		),
		array(
			'setting_id' => 'section_link',
			'field_type' => 'text',
			'label'      => 'Link',
			'default'    => '',
			'sanitize'   => 'esc_url_raw',
		),
		array(
			'setting_id' => 'section_link_text',
			'field_type' => 'text',
			'label'      => 'Button/Link Text',
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
			'label'      => 'Projects Section Image',
			'width'      => 400,
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
add_action( 'customize_register', 'ywig_clubs_input_fields' );
