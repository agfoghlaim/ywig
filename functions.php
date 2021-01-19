<?php
/**
 * YWIG Theme functions and definitions
 *
 * @package ywig-theme
 */

require get_template_directory() . '/inc/cleanup.php';
require get_template_directory() . '/inc/function-admin.php';
require get_template_directory() . '/inc/enqueue.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/customizer/about-section.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/customizer/heroine-section-alt.php';
require get_template_directory() . '/inc/customizer/counselling.php';
require get_template_directory() . '/inc/customizer/projects.php';
require get_template_directory() . '/inc/customizer/clubs.php';
require get_template_directory() . '/inc/customizer/programmes.php';
require get_template_directory() . '/inc/customizer/funders-section.php';
require get_template_directory() . '/inc/customizer/about-section-alt.php';
require get_template_directory() . '/inc/customizer/test-section.php';
require get_template_directory() . '/inc/cpt/youth-clubs-cpt.php';
require get_template_directory() . '/inc/cpt/projects-cpt.php';
require get_template_directory() . '/inc/cpt/quickposts-cpt.php';

// Handle SVG icons.
require get_template_directory() . '/inc/classes/class-ywig-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';


 add_theme_support( 'post-thumbnails' );

/*
	* Let WordPress manage the document title.
	* This theme does not use a hard-coded <title> tag in the document head,
	* WordPress will provide it for us.
	*/
add_theme_support( 'title-tag' );

// temp, does this allow editors to upload files via rest-api? yes
// temp, does it stop admin having capability? No it doesn't.
$edit_admin = get_role( 'editor' );
$edit_admin->add_cap( 'unfiltered_upload' );

/**
 * Add a button to top-level menu items that has sub-menus.
 * An icon is added using CSS depending on the value of aria-expanded.
 * Adapted from Twenty-Twentyone Theme
 *
 * @param string $output Nav menu item start element.
 * @param object $item   Nav menu item.
 * @param int    $depth  Depth.
 * @param object $args   Nav menu args.
 *
 * @return string Nav menu item start element.
 */
function ywig_add_sub_menu_toggle( $output, $item, $depth, $args ) {
	// if ( 0 === $depth && in_array( 'menu-item-has-children', $item->classes, true ) ) {
	if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

		// Add toggle button.
		// $output .= '<button class="sub-menu-toggle" aria-expanded="false" onClick="twentytwentyoneExpandSubMenu(this)">';
		$output .= '<button class="sub-menu-toggle" aria-expanded="false">';
		$output .= '<span class="icon-plus">' . ywig_get_theme_svg( 'plus' ) . '</span>';
		$output .= '<span class="icon-minus">' . ywig_get_theme_svg( 'minus' ) . '</span>';
		$output .= '<span class="screen-reader-text">' . esc_html__( 'Open menu', 'ywig-theme' ) . '</span>';
		$output .= '</button>';
	}
	return $output;
}
add_filter( 'walker_nav_menu_start_el', 'ywig_add_sub_menu_toggle', 10, 4 );

/**
 * Check if an item exists. Should be in some sort of util file.
 *
 * @param string $url - preferably a fully qualified URL
 * @return boolean - true if it is out there somewhere
 */
function urlExists( $url ) {
	if ( ( $url == '' ) || ( $url == null ) ) {
		return false; }
	$response              = wp_remote_head( $url, array( 'timeout' => 5 ) );
	$accepted_status_codes = array( 200, 301, 302 );
	if ( ! is_wp_error( $response ) && in_array( wp_remote_retrieve_response_code( $response ), $accepted_status_codes ) ) {
			return true;
	}
	return false;
}



/*
=============================================
=            BREADCRUMBS			            =
=============================================
*/

/**
 * Show Breadcrumbs. TODO move somewhere sensible.
 */
function the_breadcrumb() {
	$span      = '<span class="crumb-seperator">';
	$end_span  = '</span>';
	$seperator = $span . ' / ' . $end_span;

	// for wp_kses.
	$seperator_allowed_html = array(
		'span' => array(
			'class' => array(),
			'title' => array(),
		),
	);

	if ( ! is_front_page() ) {
		echo '<div class="breadcrumbs">';
		echo '<a href="';
		echo esc_url( get_option( 'home' ) );
		echo '">';
		echo 'HOME';
		echo '</a>';

		// new.
		$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
		if ( $term ) {

			$taxonomy_name  = $term->taxonomy; // eg 'location'.
			$this_term_name = $term->name; // eg 'Galway City'.

			echo wp_kses( $seperator, $seperator_allowed_html );
			$link_to_parent_tax_page             = site_url( $taxonomy_name, 'http' ); // TODO https.
			$link_to_parent_taxonomy_page_exists = urlExists( $link_to_parent_tax_page );

			// check that parent link exists. eg for url <site-url>/location/galway, check <site-url>/location exists.
			if ( $link_to_parent_taxonomy_page_exists ) {
				// render link if it exists.
				?>
				<a href="<?php echo esc_url( $link_to_parent_tax_page ); ?>"><?php echo esc_html( $taxonomy_name ); ?></a> 
				<?php
			} else {
				// else just render the parent taxonomy name.
				echo '<span>' . esc_html( $taxonomy_name ) . '</span>';
			}

			echo wp_kses( $seperator, $seperator_allowed_html );
			echo $span . esc_html( $this_term_name ) . $end_span;
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

		}
				// end new.

		if ( 'project' === get_post_type() && ( ! $term ) ) {

			echo wp_kses( $seperator, $seperator_allowed_html );
			echo '<a href="';
			echo esc_url( get_option( 'home' ) ) . '/projects';

			echo '">';
			echo $span . esc_html( 'projects' ) . $end_span;

		}
		if ( 'youthclub' === get_post_type() && ( ! $term ) ) {

			echo wp_kses( $seperator, $seperator_allowed_html );
			echo '<a href="';
			echo esc_url( get_option( 'home' ) ) . '/youthclubs';

			echo '">';
			echo $span . esc_html( 'youthclub' ) . $end_span;

		}
		echo '</a>';

		// Check if the current page is a category, an archive or a single page. If so show the category or archive name.
		if ( is_category() || is_single() ) {
			//echo 'cat' . is_category(  );
			// echo 'sin' . is_single(  );
			if ( is_category()  ) {

				echo wp_kses( $seperator, $seperator_allowed_html );
			}
			//the_category( '/' );
			the_category( 'title_li=' );
			// echo 'wh0';
			// } elseif ( is_archive() || is_single() ) {
			// if ( is_day() ) {
			// printf( __( '%s', 'text_domain' ), get_the_date() );
			// } elseif ( is_month() ) {
			// printf( __( '%s', 'text_domain' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'text_domain' ) ) );
			// } elseif ( is_year() ) {
			// printf( __( '%s', 'text_domain' ), get_the_date( _x( 'Y', 'yearly archives date format', 'text_domain' ) ) );
			// } else {
			// _e( 'Blog Archives', 'text_domain' );
			// }
		}
		// If the current page is a single post, show its title.
		if ( is_single() ) {

			// TODO this shows second seperator for ..? (maybe specific cpts)
			//if( 'project' !== get_post_type()) {
// echo 'wh1';
				echo wp_kses( $seperator, $seperator_allowed_html );
			//}
			echo '<span class="crumb">';

		the_title();
			echo '</span>';

		}

		// If the current page is a static page, show its title.
		if ( is_page() ) {
			echo wp_kses( $seperator, $seperator_allowed_html );
			echo $span;
			the_title();
			echo $end_span;
		}

		// if you have a static page assigned to be you posts list page. It will find the title of the static page and display it. i.e Home >> Blog
		if ( is_home() ) {
			global $post;
			$page_for_posts_id = get_option( 'page_for_posts' );
			if ( $page_for_posts_id ) {
				$post = get_page( $page_for_posts_id );
				setup_postdata( $post );
				echo $span;
				the_title();
				echo $end_span;
				rewind_posts();
			}
		}

		echo '</div>';
	}
	/*
	* Credit: http://www.thatweblook.co.uk/blog/tutorials/tutorial-wordpress-breadcrumb-function/ (https://gist.github.com/tinotriste/5387124)
	*/
}



// Load more quickposts ajax

function load_more_posts() {

	$next_page = $_POST['current_page'] + 1;
	$args      = array(
		'posts_per_page' => 2, // NOTE. if this is changed button.load-more-quickposts data attribute must also be updated
		'paged'          => $next_page,
		'post_type'      => 'quickpost',
		'post_status'    => 'publish',
		'orderby'        => 'post_date',
		'order'          => 'ASC',

	);

	$quickposts = new WP_Query( $args );
	if ( $quickposts->have_posts() ) :
		ob_start();
		while ( $quickposts->have_posts() ) :
			$quickposts->the_post();
			get_template_part( 'template-parts/content/content', 'quickpost' );
	endwhile;
		wp_send_json_success( ob_get_clean() );
	else :
		// this is not an error though!!
		wp_send_json_error( 'no more news!' );
	endif;

}
add_action( 'wp_ajax_nopriv_load_more_posts', 'load_more_posts' );
add_action( 'wp_ajax_load_more_posts', 'load_more_posts' );

// this goesin a plugin

function ywig_quickpost() {
	$next_page = $_POST['current_page'] + 1;
	$args      = array(
		'posts_per_page' => 2, // NOTE. if this is changed button.load-more-quickposts data attribute must also be updated
		'paged'          => $next_page,
		'post_type'      => 'quickpost',
		'post_status'    => 'publish',
		'orderby'        => 'post_date',
		'order'          => 'ASC',

	);

	$quickposts = new WP_Query( $args );
	if ( $quickposts->have_posts() ) :
		ob_start();
		while ( $quickposts->have_posts() ) :
			$quickposts->the_post();
			get_template_part( 'template-parts/content/content', 'quickpost' );
	endwhile;
		wp_send_json_success( ob_get_clean() );
	else :
		// this is not an error though!!
		wp_send_json_error( 'no more news!' );
	endif;
}
add_action(
	'rest_api_init',
	function() {
		register_rest_route(
			'ywig/v1',
			'quickpost',
			array(
				'methods'             => 'POST',
				'callback'            => 'ywig_quickpost',
				'permission_callback' => function () {
					// always return true because anyone can read posts.
					// having this ensures the wp_rest nonce is checked though.
					// will send 'rest_cookie_invalid_nonce' if no valid nonce.
					return true;
				},
			)
		);
	}
);
