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
require get_template_directory() . '/inc/template-functions.php';
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



/**
 * ====================================================================
 * Breadcrumbs
 * ====================================================================
 */

/**
 * Util for ywig_breadcrumbs(). Renders crumb markup.
 *
 * Note: Tried to get structured data for seo here but couldn't get it to pass the google test rich results. I tried microdata & RDFa. Checked Yoast docs for clues and they use JSON... so for future reference try using JSON (https://developers.google.com/search/docs/data-types/breadcrumb#json-ld).
 *
 * @param string $active Active page or not. Render <a> tag and aria-current if !== ''.
 * @param string $link Url of page.
 * @param string $txt Text to render in span tag (ie the name of the crumb).
 */
function ywig_wrap_in_li_span( $active = '', $link = '', $txt ) {

	// If $active is set, add 'class="active" as well as 'aria-current="page"' to the <li> attributes.
	if ( '' !== $active ) {
		$active = ' class="' . $active . '"' . ' aria-current="page"';
	}

	$open_li_span  = '<li itemtype="https://schema.org/ListItem"' . $active . '><span>';
	$close_li_span = '</span><meta></li>';

	if ( '' !== $link ) {

		$new_ans = '<li itemtype="https://schema.org/ListItem"' . $active . '><a href="' . $link . '"><span>' . $txt . '</span></a><meta></li>';

	} else {

		// If $link is NOT set, only the $txt will be wrapped in the <li><span>.
		$new_ans = $open_li_span . $txt . $close_li_span;
	}

	// for wp_kses.
	$ans_allowed_html = array(
		'span' => array(
			'class' => array(),
			'title' => array(),
		),
		'li'   => array(
			'class'        => array(),
			'itemtype'     => array(),
			'aria-current' => array(),

		),
		'a'    => array(
			'href' => array(),
			'id'   => array(),
		),
		'meta' => array(
			'content'  => array(),
			'property' => array(),
		),
	);

	echo wp_kses( $new_ans, $ans_allowed_html );
}

/**
 * Echo Breadcrumbs.
 *
 * @package ywig-theme
 */
if ( ! function_exists( 'ywig_breadcrumbs' ) ) {

	/**
	 * Echo Breadcrumbs
	 *
	 * A lot of the logic is based on Breadcrumbs in https://github.com/rachelbaker/bootstrapwp-Twitter-Bootstrap-for-WordPress/blob/master/functions.php
	 */
	function ywig_breadcrumbs() {
			global $post, $paged;
			ob_start();
			echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
			echo '<ul itemtype="https://schema.org/BreadcrumbList" aria-label="breadcrumbs">';

		if ( ! is_home() || ! is_front_page() || ! is_paged() ) {

			ywig_wrap_in_li_span( '', esc_url( get_home_url() ), 'Home' );

			// Custom Taxonomies eg '/staff/marie', '/location/prospect-hill'.
			$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			// Check Custom Taxonomy First.
			if ( $term ) {
				$taxonomy_name  = $term->taxonomy; // eg 'location'.
				$this_term_name = $term->name; // eg 'Galway City'.

				$link_to_parent_tax_page             = site_url( $taxonomy_name, 'http' ); // TODO https.
				$link_to_parent_taxonomy_page_exists = urlExists( $link_to_parent_tax_page );

				// check that parent link exists. eg for url <site-url>/location/galway, check <site-url>/location exists. Don't think this is necesserary though.
				if ( $link_to_parent_taxonomy_page_exists ) {

					// render link if it exists. eg /location.
					ywig_wrap_in_li_span( '', esc_url( $link_to_parent_tax_page ), esc_html( $taxonomy_name ) );
					?>

					<?php
				} else {

					// else just render the parent taxonomy name.
					ywig_wrap_in_li_span( 'active', '', esc_html( $taxonomy_name ) );

				}

				ywig_wrap_in_li_span( 'active', '', esc_html( $this_term_name ) );
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

			} elseif ( is_category() ) {

				// ie we are on something like /news/category/category.

				// 1. Definitely show link to /<a>News</a>.
				$blog_page_link = get_permalink( get_option( 'page_for_posts' ) );
				ywig_wrap_in_li_span( '', esc_url( $blog_page_link ), 'News' );
				// end new.

				// 2. Check parent cat

				// Use the name of whatever category we are on to get it's id.
				$this_cat_id = get_cat_ID( single_cat_title( '', false ) );

				// Use id of whatever category we are on to get category ancestors. Note this just returns an array of category ids.
				$gran = get_ancestors( $this_cat_id, 'category' );

				// Reverse the array because we display them from the top down.
				$gran_reversed = array_reverse( $gran );

				// Loop through the ancestor category ids.
				$num_ancestor_cats = count( $gran );
				for ( $i = 0;  $i < $num_ancestor_cats; $i++ ) {

					if ( isset( $gran_reversed[ $i ] ) ) {

						// Get ancestor category name and link.
						$related_cat  = get_category( $gran_reversed[ $i ] );
						$related_name = $related_cat->name;
						$related_link = get_category_link( $related_cat->term_id );

						// Display each ancestor <a>category</a>.
						ywig_wrap_in_li_span( '', esc_url( $related_link ), $related_name );
					}
				}

				// 3. Finally display the name of the current category.
				ywig_wrap_in_li_span( 'active', '', single_cat_title( '', false ) );

			} elseif ( is_day() ) {

				// For posts from 23rd November 2020... 'home/2020/11/23'.
					$year_link  = get_year_link( get_the_time( 'Y' ) );
					$month_link = get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) );

					// Eg '/<a>2020<a>'.
					ywig_wrap_in_li_span( '', $year_link, get_the_time( 'Y' ) );

					// Eg '/<a>November<a>'.
					ywig_wrap_in_li_span( '', $month_link, get_the_time( 'F' ) );

					// Eg '/23'.
					ywig_wrap_in_li_span( 'active', '', get_the_time( 'd' ) );
			} elseif ( is_month() ) {

					// For posts from November 2020... 'home/2020/11'.

					// Eg  '/2020.
					ywig_wrap_in_li_span( '', get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) );

					// Eg'/november'.
					ywig_wrap_in_li_span( 'active', '', get_the_time( 'F' ) );

			} elseif ( is_year() ) {
					ywig_wrap_in_li_span( 'active', '', get_the_time( 'Y' ) );
			} elseif ( is_single() && ! is_attachment() ) {

				if ( get_post_type() != 'post' ) {

					// Eg. 'home/project(cpt)/shout. Because no categories for cpts.
					$post_type      = get_post_type_object( get_post_type() );
					$slug           = $post_type->rewrite;
					$link_to_parent = home_url() . '/' . $slug['slug'];

					// Eg. '/<a>project</a>'.
					ywig_wrap_in_li_span( '', $link_to_parent, $post_type->name );

					// Eg. '/shout'.
					ywig_wrap_in_li_span( 'active', '', get_the_title() );

				} else {
						// Single post page. eg 'home / news / category / post name'.
						$category       = get_the_category();
						$blog_page_link = get_permalink( get_option( 'page_for_posts' ) );

						// new.
						ywig_wrap_in_li_span( '', esc_url( $blog_page_link ), 'News' );
						// end new.

					if ( is_array( $category ) ) {

						if ( count( $category ) > 0 ) {
							// Just use the first category even though some posts will be in more than one.
							// If post is in sub-categories breadcrumb will still only show 'home / news / category / post name'.
							ywig_wrap_in_li_span( '', get_category_link( $category[0]->term_id ), $category[0]->name );
						}
					}

						// Finally show post title.
						ywig_wrap_in_li_span( 'active', '', get_the_title() );

				}
			} elseif ( is_home() ) {

				if ( is_paged() ) {
					$blog_page_link = get_permalink( get_option( 'page_for_posts' ) );

					// ie. We need an <a> tag on Home on paged results...  'Home / <a>News</a> / Page 2'.
					ywig_wrap_in_li_span( '', esc_url( $blog_page_link ), 'News' );

				} else {

					// ie. No <a> tag on News page... 'Home / News'.
					ywig_wrap_in_li_span( 'active', '', 'News' );
				}
			} elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_404() && ! is_search() ) {

					// This one is a post type archive. Eg. '/project(cpt)', '/youthclub(cpt)'.
					$post_type = get_post_type_object( get_post_type() );
					ywig_wrap_in_li_span( 'active', '', $post_type->labels->singular_name );
			} elseif ( is_attachment() ) {

				// ywig does not use this.
				$parent   = get_post( $post->post_parent );
				$category = get_the_category( $parent->ID );
				if ( $category ) {
					foreach ( $category as $category ) {
						ywig_wrap_in_li_span( '', get_category_link( $category->term_id ), $category->name );
					}
				}

					echo '<li class="active" aria-current="page"><span>' . get_the_title() . '</span></li>';
			} elseif ( is_page() && ! $post->post_parent ) {

				// Regular page with no parent. Eg. '/resources'.
					ywig_wrap_in_li_span( 'active', '', get_the_title() );
			} elseif ( is_page() && $post->post_parent ) {
				$parent_id = $post->post_parent;
				$page      = get_post( $parent_id );

				// For pages with a parent page.

				// Eg. '/resources/vacancies', this renders <a>resources</a>.
				ywig_wrap_in_li_span( '', get_permalink( $page->ID ), get_the_title( $page->ID ) );

				// Eg. '/resources/vacancies', this renders <span>vacancies<span>.
				ywig_wrap_in_li_span( 'active', '', get_the_title() );
			} elseif ( is_search() ) {

				/* translators: %s: search term. */
				$txt = sprintf( __( 'Search results for <q>"%s"</q>', 'ywig' ), esc_attr( get_search_query() ) );

				// Eg. 'home/search results for whatever' (Page 1 of results).
				ywig_wrap_in_li_span( 'active', '', $txt );

			} elseif ( is_tag() ) {

				// Eg. /tag/test-tag.

				/* translators: %s: name of current tag. */
				$txt = sprintf( __( 'Posts tagged <q>"%s"</q>', 'ywig' ), single_tag_title( '', false ) );
				ywig_wrap_in_li_span( 'active', '', $txt );
			} elseif ( is_author() ) {
				global $author;

				/* translators: %s: author name. */
				$txt = sprintf( __( 'All posts by %s', 'ywig' ), get_the_author_meta( 'display_name', $author ) );

				// Eg. 'home/all posts by whoever' (Page 1 of results).
				ywig_wrap_in_li_span( 'active', '', $txt );
			} elseif ( is_404() ) {
				ywig_wrap_in_li_span( 'active', '', 'Page not found' );
			}
		}

		// Paged results.
		if ( is_paged() ) {

			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {

				/* translators: %s: current page of results. */
					$txt = sprintf( __( 'Page %s', 'ywig' ), esc_attr( $paged ) );
					ywig_wrap_in_li_span( 'active', '', $txt );
			} else {

				/* translators: %s: current page of results. */
				$txt = sprintf( __( 'Page %s', 'ywig' ), esc_attr( $paged ) );
				ywig_wrap_in_li_span( 'active', '', esc_attr( $txt ) );
			}
		}

			echo '</ul>';
			echo '</nav>';
			$ans = ob_get_clean();
		if ( $ans ) {
			// phpcs:ignore WordPress.Security.EscapeOutput --escaped above.
			echo $ans;
		}

	}
}
