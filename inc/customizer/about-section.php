<?php

/*

@package ywig-theme

CUSTOMIZER - ABOUT SECTION (homepage)

*/


function ywig_customize_register($wp_customize) {

  // Add new section to Customizer
  $wp_customize->add_section('ywig-about-section', array(
    'title' => 'About Section'
  ));

  // Add boxes here and use class below - doing these individually is tres tedious.
  $boxes = [
    new YWIG_About_Box('mission','Mission Heading', 'Mission Text'),
    new YWIG_About_Box('box-1','Heading 1', 'Text 1'),
    new YWIG_About_Box('box-2','Heading 2', 'Text 2'),
    new YWIG_About_Box('box-3','Heading 3', 'Text 3'),

  ];

  foreach( $boxes as $box ) {
    $box->create_heading_field( $wp_customize );
    $box->create_text_area( $wp_customize );
  }

  $image = new YWIG_About_Box('image', 'Image', null );
  $image->create_image_field( $wp_customize );

}
add_action('customize_register', 'ywig_customize_register');

// ok to do this? - I think so, will need renamed
class YWIG_About_Box {
  public function __construct( $id, $heading_text, $textarea_text ) {

    $this->ywig_id = $id;
    $this->heading_text = $heading_text;
    $this->textarea_text = $textarea_text;

  }

  function create_text_area( $wp_customize ) {

    $wp_customize->add_setting('ywig-about-section-' . $this->ywig_id .'-p', array(
      'default'           => $this->textarea_text,
      'type'              => 'theme_mod', 
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_textarea_field', 
    ));
  
    $wp_customize->add_control(
      'ywig-about-section-' . $this->ywig_id .'-p', 
      array(
        'label'    => $this->textarea_text, 
        'section'  => 'ywig-about-section',
        'type'     => 'textarea',
        'settings' => 'ywig-about-section-' . $this->ywig_id .'-p' 
      )
    );

  }

  function create_heading_field( $wp_customize ) {

    $wp_customize->add_setting('ywig-about-section-' . $this->ywig_id .'-h', array(
      'default'           => $this->heading_text,
      'type'              => 'theme_mod', 
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field', 
    ));
  
    $wp_customize->add_control(
      'ywig-about-section-' . $this->ywig_id .'-h', 
      array(
        'label'    => $this->heading_text, 
        'section'  => 'ywig-about-section',
        'settings' => 'ywig-about-section-' . $this->ywig_id .'-h' 
      )
    );

  }

  function create_image_field( $wp_customize ) {

    $wp_customize->add_setting('ywig-about-section-' . $this->ywig_id, array(
      'type'              => 'theme_mod', 
      'capability'        => 'edit_theme_options',
    ));
  
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
        $wp_customize,
        'ywig-about-section-' . $this->ywig_id,
        array(
          'label'    => 'Image', 
          'section'  => 'ywig-about-section',
          'settings' => 'ywig-about-section-' . $this->ywig_id,
          'width'    => 570,
          'height'   => 300
        ) 
      )
    );
  }
}