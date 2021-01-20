<?php
/**
 * Single Youth Club excerpt
 * For Project Finder - Project  Excerpt, Thumbnail, More Btn and Location Tags
 * For /youthclub via index.php and content-youthclub.php
 * For front page via ywig-frontpage-sections/youthclubs.php
 *
 * @package ywig-theme
 */

?>

<div  class="youthclub-info">

	<?php ywig_post_thumbnail( 'thumb' ); ?>

	<div class="youthclub-info-text">

		<?php
		// Use <h2> unless it's front page, ie club titles are second most important on /youthclub but not front-page.
		?>
		<?php if ( is_front_page() ) : ?>
			<h4><?php the_title(); ?></h4>
		<?php else : ?>
			<h2 class="twist-smaller"><?php the_title(); ?></h2>
		<?php endif; ?>


		<?php esc_html( the_excerpt() ); ?>

	</div>

	<a class="btn btn-outline-dark" href="<?php the_permalink(); ?>">More</a>

</div>
