<?php
/**
 * Displays category links.
 * Used in index.php and category.php.
 *
 * Gets list of categories and shows each link and number of posts.
 * Eg, <a href"/news">News (5)</a>
 *
 * TODO - write js for wp_dropdown_categories. Code below is temp (copied from wp docs on wp_dropdown_categories()).
 *
 * @package ywig-theme
 */

echo '<div class="category-links-wrap">';

	// get all categories (ignores unused categories by default).
	$kats = get_categories(
		// array(
		// 'parent' => 0, // only top level categories
		// )
	);

	foreach ( $kats as $kat ) {

		// get this category url.
		$kat_link = get_category_link( $kat->term_id );

		// prepare link html.
		$category_link = sprintf(
			'<a class="btn btn-primary" href="%1$s" alt="%2$s">%3$s</a>',
			esc_url( $kat_link ),
			/* translators: %s: category name. */
			esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $kat->name ) ),
			esc_html( $kat->name ) . '<span> (' . esc_html( $kat->category_count ) . ')</span>'
		);

		// phpcs:ignore WordPress.Security.EscapeOutput
		echo $category_link;
	}
	echo '</div>';

	// for mobile?.
	?>
	<div class="category-links-wrap-mobile">

	<form id="category-select" class="category-select" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">

		<?php
		$args = array(
			'show_option_none' => __( 'Select category', 'ywig-theme' ),
			'show_count'       => 1,
			'orderby'          => 'name',
			'echo'             => 0,
		);
		?>

		<?php $select = wp_dropdown_categories( $args ); ?>
		<?php $replace = "<select$1 onchange='return this.form.submit()'>"; ?>
		<?php $select = preg_replace( '#<select([^>]*)>#', $replace, $select ); ?>

		<?php echo $select; ?>

		<noscript>
			<input type="submit" value="View" />
		</noscript>

	</form>
</div>


