<?php

/**
 * Add new section to Customizer.
 *
 * CUSTOMIZER - About SECTION (homepage)
 *
 *  @package ywig-theme
 */

require_once __DIR__ . '/classes/class-ywig-input.php';
require_once __DIR__ . '/classes/class-ywig-cropped-image.php';

/**
 * Create About section & define inputs for theme Customizer.
 * Important. Define sanitize for urls. Otherwise YWIG_Input class handles
 *
 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
 */
function ywig_about_input_fields( $wp_customize ) {

	$section = 'about';
	$wp_customize->add_section(
		$section,
		array(
			'title'       => 'About-Alt Section',
			'description' => __( 'Edit the Front Page About Section.' ),
		)
	);

	// Text Inputs.
	$input_args = array(

		// Heroine Tagline Section.
				array(
					'setting_id' => 'section_title',
					'field_type' => 'text',
					'label'      => 'Section Title',
					'default'    => 'About Us',
				),
		array(
			'setting_id' => 'text_1',
			'field_type' => 'textarea',
			'label'      => 'Text 1',
			'default'    => 'Text 1...',
		),
		array(
			'setting_id' => 'title_2',
			'field_type' => 'text',
			'label'      => 'Title 2',
			'default'    => 'Title 2...',
		),
		array(
			'setting_id' => 'text_2',
			'field_type' => 'textarea',
			'label'      => 'Text 2',
			'default'    => 'Text 2...',
		),
		array(
			'setting_id' => 'title_3',
			'field_type' => 'text',
			'label'      => 'Title 3',
			'default'    => 'Title 3...',
		),
		array(
			'setting_id' => 'text_3',
			'field_type' => 'textarea',
			'label'      => 'Text 3',
			'default'    => 'Text 3...',
		),
		array(
			'setting_id' => 'link',
			'field_type' => 'text',
			'label'      => 'Link',
			'default'    => 'url...',
			'sanitize'   => 'esc_url_raw',
		),
		array(
			'setting_id' => 'show_section',
			'field_type' => 'checkbox',
			'label'      => 'Show Section',
			'default'    => true,
		),

	);

	// Image Inputs.
	$img_args = array(
		array(
			'setting_id' => 'main_image',
			'label'      => 'About Section Image Image',
			'width'      => 900,
			'height'     => 900,
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
add_action( 'customize_register', 'ywig_about_input_fields' );
