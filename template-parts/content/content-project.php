<?php
/**
 * Related to Project CPT ('/project'). This is ~the same as content.php and should be imporved or deleted.
 * Displays project-intros whereas single-project displays all info about projects
 *
 * @package ywig-theme
 */

?>

<!-- <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> -->

	<?php
	set_query_var( 'terms_taxonomy', 'location' );
	get_template_part( 'template-parts/content/content', 'project-intro' );
	?>

<!-- </article> -->
