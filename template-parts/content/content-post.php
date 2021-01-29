<?php
/**
 * Standard Post Format. Shows excerpt for non-singular pages.
 * (See content-single.php single posts).
 * eg <site-url>/category/uncategorised/ via index.php.
 *
 * @package ywig-theme
 */

?>

<?php

// .ywig-single where we want to show the_content();
// .ywig-non-single where we want to show the_excerpt();
if ( is_singular() ) {
	$ywig_class = 'ywig-single';
} else {
	$ywig_class = 'ywig-non-single';
}

?>
<article  id="post-<?php the_ID(); ?>" <?php post_class( $ywig_class ); ?>>
	<div class="entry-wrap">

		<div class="entry-header">

			<?php the_title( '<h2 class="twist-smaller">', '</h2>' ); ?>

			<?php
			if ( has_post_thumbnail() ) {
					ywig_post_thumbnail( 'medium' );
			} else {
				?>
					<img src="<?php bloginfo( 'template_directory' ); ?>/src/img/looking_at_the_sea.jpg" alt="<?php the_title(); ?>" />
					<?php
			}
			?>
		</div>

		<div class="entry-content">

			<?php the_excerpt(); ?>

		</div>
	</div>

	<footer class="entry-footer">
		<div class="entry-meta">

			<span class="entry-meta-date">
				<?php the_time( 'F jS, Y' ); ?>
			</span>

			<span class="entry-meta-category">
				<?php the_category( ', ' ); ?>
			</span>

		</div>

		<a 
			href="<?php the_permalink(); ?>" 
			class="btn btn-dark"
		>

			<span class="sr-only">
				Read More about <?php echo esc_html( get_the_title() ); ?>
			</span>

			<span><?php esc_html_e( 'More' ); ?></span>

		</a>

	</footer>

</article>
