<?php

/**
 *
 *
 * @package ywig-theme
 * CUSTOMIZER - Heroine SECTION (homepage)
 */

/**
 * Short Description
 *
 * CUSTOMIZER - Heroine SECTION (homepage)
 */
function ywig_customize_register_heroine( $wp_customize ) {
	// Add new section to Customizer.
	$wp_customize->add_section(
		'ywig-heroine-section',
		array(
			'title' => 'Heroine Section',
		)
	);

	// Add boxes here and use class below - doing these individually is tres tedious.
	$boxes = array(

		// new YWIG_Heroine_Box( 'heroine-1', 'Heroine 1 Heading', 'Heroine 1 Text' ),
		// new YWIG_Heroine_Box( 'heroine-2', 'Heroine 2 Heading', 'Heroine 2 Text' ),
		// new YWIG_Heroine_Box( 'heroine-3', 'Heroine 3 Heading', 'Heroine 3 Text' ),
		new With_Button( 'heroine-1', 'Heroine 1 Heading', 'Heroine 1 Text', 'google.ie' ),
		new With_Button( 'heroine-2', 'Heroine 2 Heading', 'Heroine 2 Text', 'google.ie' ),
		new With_Button( 'heroine-3', 'Heroine 3 Heading', 'Heroine 3 Text', 'google.ie' ),

	);
	$image = new YWIG_Heroine_Box( 'heroine-1-image', 'Image', null );
	$image->create_image_field( $wp_customize );

	foreach ( $boxes as $box ) {
		$box->create_heading_field( $wp_customize );
		$box->create_text_area( $wp_customize );
		$box->create_link_field( $wp_customize );
		$box->create_tick_field( $wp_customize );

	}

}
add_action( 'customize_register', 'ywig_customize_register_heroine' );

/**
 * Something
 */
class YWIG_Heroine_Box {
	/**
	 * Short Description.
	 *
	 * @param string $id Section Id.
	 * @param string $heading_text Heading shown in customiser.
	 * @param string $textarea_text Paragraph Text.
	 */
	public function __construct( $id, $heading_text, $textarea_text ) {
		$this->ywig_id       = $id;
		$this->heading_text  = $heading_text;
		$this->textarea_text = $textarea_text;
	}

	/**
	 *
	 * Something
	 *
	 * @param \WP_Customize_Manager $wp_customize Something.
	 */
	public function create_text_area( $wp_customize ) {
		$wp_customize->add_setting(
			'ywig-heroine-section-' . $this->ywig_id . '-p',
			array(
				'default'           => $this->textarea_text,
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);

		$wp_customize->add_control(
			'ywig-heroine-section-' . $this->ywig_id . '-p',
			array(
				'label'    => $this->textarea_text,
				'section'  => 'ywig-heroine-section',
				'type'     => 'textarea',
				'settings' => 'ywig-heroine-section-' . $this->ywig_id . '-p',
			)
		);
	}

	public function create_heading_field( $wp_customize ) {
		$wp_customize->add_setting(
			'ywig-heroine-section-' . $this->ywig_id . '-h',
			array(
				'default'           => $this->heading_text,
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'ywig-heroine-section-' . $this->ywig_id . '-h',
			array(
				'label'             => $this->heading_text,
				'section'           => 'ywig-heroine-section',
				'settings'          => 'ywig-heroine-section-' . $this->ywig_id . '-h',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
	}

	public function create_image_field( $wp_customize ) {
		$wp_customize->add_setting(
			'ywig-heroine-section-' . $this->ywig_id,
			array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
	
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'ywig-heroine-section-' . $this->ywig_id,
				array(
					'label'    => 'Image',
					'section'  => 'ywig-heroine-section',
					'settings' => 'ywig-heroine-section-' . $this->ywig_id,
					'width'    => 570,
					'height'   => 300,
				)
			)
		);
	}
}


class With_Button extends YWIG_Heroine_Box {
	/**
	 * Short Description.
	 *
	 * @param string $id Section Id.
	 * @param string $heading_text Heading shown in customiser.
	 * @param string $textarea_text Paragraph Text.
	 * @param string $button_link Button Link.
	 */
	public function __construct( $id, $heading_text, $textarea_text, $button_link ) {
		$this->ywig_id       = $id;
		$this->heading_text  = $heading_text;
		$this->textarea_text = $textarea_text;
		$this->button_link   = $button_link;
	}
	/**
	 * Short Description.
	 *
	 * @param \WP_Customize_Manager $wp_customize.
	 */
	public function create_link_field( $wp_customize ) {
		$wp_customize->add_setting(
			'ywig-heroine-section-' . $this->ywig_id . '-link',
			array(
				'default'           => $this->button_link,
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field', // sanitize_url!!
			)
		);

		$wp_customize->add_control(
			'ywig-heroine-section-' . $this->ywig_id . '-link',
			array(
				// 'label'    => $this->button_link,
				 'label'   => 'Button Link (internal only)',
				'section'  => 'ywig-heroine-section',
				'settings' => 'ywig-heroine-section-' . $this->ywig_id . '-link',
			)
		);
	}
	public function create_tick_field( $wp_customize ) {
		$wp_customize->add_setting(
			'ywig-heroine-section-' . $this->ywig_id . '-tick',
			array(
				'default'           => true,
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'ywig-heroine-section-' . $this->ywig_id . '-tick',
			array(
				// 'label'    => $this->button_link,
				'label'    => 'Show featured thing',
				'type'     => 'checkbox',
				'section'  => 'ywig-heroine-section',
				'settings' => 'ywig-heroine-section-' . $this->ywig_id . '-tick',
			)
		);
	}
}
