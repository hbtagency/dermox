<?php
/*
* Template Name: Template Member
*/
if ( !is_user_logged_in() ) {
   auth_redirect();
}
get_header();
?>
<div class="container">
<div class="content page">
    <br>
    <div class="title"><?php the_title(); ?></div>
</div>
</div>
<div class="container">
    
<?php
while ( have_posts() ) : the_post();
	the_content();
 endwhile;
 ?>
</div>
<?php
get_footer();
?>
