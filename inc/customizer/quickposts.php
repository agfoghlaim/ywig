<?php
/**
 * Add Quickposts to Theme Customizer.
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
function ywig_quickposts_input_fields( $wp_customize ) {

	$section = 'quickposts';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'Quick News Section',
			'description' => __( 'Edit Quick News Section.' ),
		)
	);

	// Define text/checkbox Inputs.
	$input_args = array(
		array(
			'setting_id' => 'section_title',
			'field_type' => 'text',
			'label'      => 'Section Title',
			'default'    => 'Quick News',
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

	foreach ( $input_args as $args ) {
		$input = new YWIG_Input( $section, $args );
		$input->register( $wp_customize );

	}

}
add_action( 'customize_register', 'ywig_quickposts_input_fields' );
