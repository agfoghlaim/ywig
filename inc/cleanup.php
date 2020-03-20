<?php

/*

@package ywig-theme

CLEANUP - don't print wp version on frontend

*/

// remove version from js & css
function ywig_remove_wp_version( $src ) {
  global $wp_version;
  parse_str( parse_url( $src, PHP_URL_QUERY ), $query );
  if( !empty( $query['ver']) && $query['ver'] === $wp_version ) {
    $src = remove_query_arg( 'ver', $src );
  }
  return $src;
}
add_filter( 'script_loader_src', 'ywig_remove_wp_version' );
add_filter( 'style_loader_src', 'ywig_remove_wp_version' );

// remove <meta> generator
function ywig_remove_meta_version() {
  return '';
}
add_filter( 'the_generator', 'ywig_remove_meta_version' );