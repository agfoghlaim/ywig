<?php
/**
 * To create input fields with Customizer API.
 *
 * @package ywig-theme
 */
class YWIG_Input {

	/**
	 * Constructor
	 *
	 * @param string $section Section id (created wherever this class is used).
	 * @param mixed  $args Only vital things needed to create input fields. $args ['sanitize'] included for urls only.
	 */
	public function __construct( $section, $args ) {
		$this->section    = $section;
		$this->id         = $args['setting_id'];
		$this->field_type = $args['field_type'];
		$this->label      = $args['label'];
		$this->default    = $args['default'];
		$this->sanitize   = $this->get_sanitize_callback( $args );
		$this->capability = 'edit_theme_options';
		$this->type       = 'theme_mod';
	}

	/**
	 * Get appropiate sanitize callback based on $args['field_type'].
	 *
	 * @param \WP_Customize_Manager $wp_customize Customizer Manager.
	 */
	public function register( $wp_customize ) {
		$wp_customize->add_setting(
			$this->section . '-' . $this->id,
			array(
				'default'           => $this->default,
				'type'              => $this->type,
				'capability'        => $this->capability,
				'sanitize_callback' => $this->sanitize,
			)
		);

		$wp_customize->add_control(
			$this->section . '-' . $this->id,
			array(
				'label'    => $this->label,
				'section'  => $this->section,
				'type'     => $this->field_type,
				'settings' => $this->section . '-' . $this->id,
			)
		);
	}

		/**
		 * Sanitize boolean for checkbox (from twentytwenty).
		 *
		 * @param bool $checked Whether or not a box is checked.
		 *
		 * @return bool
		 */
	public static function sanitize_checkbox( $checked ) {
		return ( ( isset( $checked ) && true === $checked ) ? true : false );
	}

	/**
	 * Get appropiate sanitize callback based on $args['field_type'].
	 *
	 * @param mixed $args Only vital things needed to create input fields. $args ['sanitize'] included for urls only.
	 */
	private function get_sanitize_callback( $args ) {
		$type = $args['field_type'];
		if ( ! empty( $args['sanitize'] ) ) {
			return $args['sanitize'];
		} else {
			if ( 'text' === $type ) {
				return 'sanitize_text_field';
			} elseif ( 'textarea' === $type ) {
				return 'sanitize_textarea_field';
			} elseif ( 'checkbox' === $type ) {
				return array( $this, 'sanitize_checkbox' );
			}
		}

	}

}
