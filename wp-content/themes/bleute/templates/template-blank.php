<?php
/*
* Template Name: Template blank
*/
get_header();
while ( have_posts() ) : the_post();
	the_content();
 endwhile;
get_footer();
?>