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
	<a href="<?php the_permalink(); ?>">
		<?php the_title( '<h2 class="twist-smaller">', '</h2>' ); ?>
	</a>

	<div class="entry-wrap">

		<div class="entry-header">
			<?php
			if ( has_post_thumbnail() ) {
					ywig_post_thumbnail( 'thumb' );
			} else {
				?>
				<a href="<?php the_permalink(); ?>">

					<figure class="post-thumbnail"  style="width: 150px; height: 150px; background:url(	<?php echo bloginfo( 'template_directory' ) . '/src/img/looking_at_the_sea.jpg);'; ?>); background-repeat:no-repeat; background-size: cover;background-position: center;"></figure>
				</a>
				<?php
			}
			?>
		</div>

		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div>

	</div>

	<footer class="entry-footer">


			<span class="entry-meta-date">
				<?php the_time( 'F jS, Y' ); ?>
			</span>

			<span class="entry-meta-category wrap-cat-links">
				<?php the_category( ' ' ); ?>
			</span>

		</a>

	</footer>

</article>
