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
			'title'       => 'Heroine Section2',
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
			'default'    => 'People.',
		),
		array(
			'setting_id' => 'show_logo',
			'field_type' => 'checkbox',
			'label'      => 'Show Logo',
			'default'    => true,
		),
		// Heroine Section 1.
		array(
			'setting_id' => 'title_1',
			'field_type' => 'text',
			'label'      => 'Title 1',
			'default'    => 'Title 1',
		),
		array(
			'setting_id' => 'text_1',
			'field_type' => 'textarea',
			'label'      => 'Text 1',
			'default'    => 'Text 1',
		),
		array(
			'setting_id' => 'link_1',
			'field_type' => 'text',
			'label'      => 'Link 1',
			'default'    => 'Link 1',
			'sanitize'   => 'esc_url_raw', // !
		),
		array(
			'setting_id' => 'tick_1',
			'field_type' => 'checkbox',
			'label'      => 'Show Featured Label',
			'default'    => true,

		),
		// Heroine Section 2.
		array(
			'setting_id' => 'title_2',
			'field_type' => 'text',
			'label'      => 'Title 2',
			'default'    => 'Title 2',
		),
		array(
			'setting_id' => 'text_2',
			'field_type' => 'textarea',
			'label'      => 'Text 2',
			'default'    => 'Text 2',
		),
		array(
			'setting_id' => 'link_2',
			'field_type' => 'text',
			'label'      => 'Link 2',
			'default'    => 'Link 2',
			'sanitize'   => 'esc_url_raw', // !
		),
		// Heroine Section 3.
		array(
			'setting_id' => 'title_3',
			'field_type' => 'text',
			'label'      => 'Title 3',
			'default'    => 'Title 3',
		),
		array(
			'setting_id' => 'text_3',
			'field_type' => 'textarea',
			'label'      => 'Text 3',
			'default'    => 'Text 3',
		),
		array(
			'setting_id' => 'link_3',
			'field_type' => 'text',
			'label'      => 'Link 3',
			'default'    => 'Link 3',
			'sanitize'   => 'esc_url_raw', // !
		),

	);

	// Image Inputs.
	$img_args = array(
		array(
			'setting_id' => 'sepia_image',
			'label'      => 'Sepia Image',
			'width'      => 400,
			'height'     => 500,
		),
		array(
			'setting_id' => 'image_1',
			'label'      => 'Section One Image',
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
add_action( 'customize_register', 'ywig_heroine_input_fields' );
