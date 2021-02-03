<?php
/**
 * CLEANUP - don't print wp version on frontend for security reasons.
 *
 * @package ywig-theme
 */

/**
 * Remove version from js & css.
 *
 * @param string $src The url of the file being loaded including version. Eg. 'http://localhost/ywig-theme/wp-content/themes/ywig-theme/dist/css/app.css?ver=1.0.0'.
 */
function ywig_remove_wp_version( $src ) {
	global $wp_version;
	parse_str( wp_parse_url( $src, PHP_URL_QUERY ), $query );
	if ( ! empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'script_loader_src', 'ywig_remove_wp_version' );
add_filter( 'style_loader_src', 'ywig_remove_wp_version' );

/**
 * Remove <meta> generator.
 */
function ywig_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'ywig_remove_meta_version' );
