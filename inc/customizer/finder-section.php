<?php

/**
 * Add Finder Section to Theme Customizer.
 *
 * CUSTOMIZER
 *
 *  @package ywig-theme
 */

require_once __DIR__ . '/classes/class-ywig-input.php';

/**
 * Create New section & define inputs for theme Customizer.
 *
 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
 */
function ywig_finder_input_fields( $wp_customize ) {

	$section = 'finder';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Project Finder Section',
			'description' => __( 'Show/Hide Finder Section.' ),
		)
	);

	// Define text/checkbox Inputs.
	$input_args = array(
		array(
			'setting_id' => 'section_title',
			'field_type' => 'text',
			'label'      => 'Project Finder Section Title',
			'default'    => 'Youth Project Finder',
		),
		array(
			'setting_id' => 'section_p',
			'field_type' => 'textarea',
			'label'      => 'Project Finder Section Text',
			'default'    => '',
		),
		array(
			'setting_id' => 'show_section',
			'field_type' => 'checkbox',
			'label'      => 'Show Section',
			'default'    => true,
		),

	);

	foreach ( $input_args as $args ) {
		$input = new YWIG_Input( $section, $args );
		$input->register( $wp_customize );

	}

}
add_action( 'customize_register', 'ywig_finder_input_fields' );
