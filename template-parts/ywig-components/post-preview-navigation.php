<?php
/**
 * YWIG Post navigation - preview of next & previous posts
 *
 * @package ywig-theme
 */

$next_post     = get_next_post();
$previous_post = get_previous_post();

?>
<div class="ywig-post-nav-wrap">
	<h2>More Posts</h2>
	<div class="ywig-post-nav">

	<?php
	echo ywig_get_post_nav_preview( $next_post );
	echo ywig_get_post_nav_preview( $previous_post );
	?>
	</div>

</div>
