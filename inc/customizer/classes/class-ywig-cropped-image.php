<?php

/**
 * Display Upload/select cropped image.
 *
 * @package ywig-theme
 */

if ( ! class_exists( 'YWIG_Cropped_Image' ) ) {
	/**
	 * Wrap WP_Customize_Cropped_Image_Control for convenience.
	 */
	class YWIG_Cropped_Image {

		/**
		 * Constructor.
		 *
		 * @param string $section Cropped Image section.
		 * @param object $args Cropped Image args.
		 */
		public function __construct( $section, $args ) {
			$this->section    = $section;
			$this->id         = $args['setting_id'];
			$this->label      = $args['label'];
			$this->capability = 'edit_theme_options';
			$this->type       = 'theme_mod';
			$this->width      = $args['width'];
			$this->height     = $args['height'];
		}

		/**
		 * Register settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer.
		 */
		public function register( $wp_customize ) {
			$wp_customize->add_setting(
				$this->section . '_' . $this->id,
				array(
					'type'              => $this->type,
					'capability'        => $this->capability,
					'sanitize_callback' => 'sanitize_text_field',

				)
			);

			$wp_customize->add_control(
				new WP_Customize_Cropped_Image_Control(
					$wp_customize,
					$this->section . '_' . $this->id,
					array(
						'label'    => $this->label,
						'section'  => $this->section,
						'settings' => $this->section . '_' . $this->id,
						'width'    => $this->width,
						'height'   => $this->height,
					)
				)
			);
		}

			/**
			 * Make sure file is an image.
			 *
			 * @param mixed $maybe_image Hopefully an image.
			 */
		private function ywig_sanitize_image( $maybe_image ) {
			// return empty string instead of $maybe_image.
			$confirmed_img_or_empty_string = '';

			// get mime type.
			$filetype = wp_check_filetype( $maybe_image );
			$mime     = $filetype['type'];

			// check mime type is an image
			if ( strpos( $mime, 'image' ) !== false ) {
					$output = $maybe_image;
			}

			return $confirmed_img_or_empty_string;
		}

	}

}
