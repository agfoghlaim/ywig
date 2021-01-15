<?php
/**
 * Template to display single posts and attachments
 *
 * @package ywig-theme
 */

?>




		<?php the_title( '<h2 class="entry-title">' . '(content-single.php)', '</h2>' ); ?>
		

	<div class="entry-content">


			<?php the_content(); ?>

	</div>

	<footer class="entry-footer">
		entry -	footer
	</footer>

