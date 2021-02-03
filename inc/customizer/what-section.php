<?php
/**
 * Add What We Do Section to Theme Customizer.
 *
 * CUSTOMIZER
 *
 *  @package ywig-theme
 */

/**
 * Require class.
 */
require_once __DIR__ . '/classes/class-ywig-input.php';

/**
 * Create New section & define inputs for theme Customizer.
 *
 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
 */
function ywig_what_input_fields( $wp_customize ) {

	$section = 'what';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'What We Do Section',
			'description' => __( 'Show/Hide What We Do Section.' ),
		)
	);

	// Define text/checkbox Inputs.
	$input_args = array(
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
add_action( 'customize_register', 'ywig_what_input_fields' );
