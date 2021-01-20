<?php
/**
 * YWIG Single Post
 *
 * @package ywig-theme
 */

?>
<?php get_header(); ?>

<?php get_template_part( 'template-parts/content/content-page-entry-header' ); ?>

<div class="single-content-wrap">
	<?php get_template_part( 'template-parts/content/content-single' ); ?>
	single.php
</div>

<?php
get_footer();

