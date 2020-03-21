<?php

/*

@package ywig-theme

THEME SUPPORT

*/

function ywig_register_nav_menu() {
  // register_nav_menu('social', 'Social Media Menu');
  register_nav_menu('main', 'YWIG Main Menu');
}
add_action( 'after_setup_theme', 'ywig_register_nav_menu');