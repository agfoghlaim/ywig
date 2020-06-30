<?php

class YWIG_Cropped_Image {
	public function __construct( $section, $args ) {
		$this->section    = $section;
		$this->id         = $args['setting_id'];
		$this->label      = $args['label'];
		$this->capability = 'edit_theme_options';
		$this->type       = 'theme_mod';
		$this->width      = $args['width'];
		$this->height     = $args['height'];
	}

	public function register( $wp_customize ) {
		$wp_customize->add_setting(
			$this->section . '-' . $this->id,
			array(
				'type'       => $this->type,
				'capability' => $this->capability,
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				$this->section . '-' . $this->id,
				array(
					'label'    => $this->label,
					'section'  => $this->section,
					'settings' => $this->section . '-' . $this->id,
					'width'    => $this->width,
					'height'   => $this->height,
				)
			)
		);
	}
}
