<?php
/*
* Template Name: Template padding
*/
get_header();
while ( have_posts() ) : the_post();
	?>
	<div class="padding-left-template">
		<?php the_content(); ?>
	</div>
	<?php
 endwhile;
get_footer();
?>