<?php
/*
* Template Name: Template page
*/
get_header();
?>
	<section class="menu-breadcrumb">
        <div class="container">
          <div class="breadcrumb">
            <ul>
            	<?php if (function_exists('beau_the_breadcrumb')) beau_the_breadcrumb(); ?>
            </ul>
          </div>
        </div>
    </section>
    <section>
    	<?php 
            $description_header = get_post_meta( get_the_ID(), '_beautheme_header_description', TRUE ); 
            $margin = '';
            if ($description_header=='') {
                $margin = 'margin-bottom';
            }
        ?>
        <div class="container">
        	<div class="content page <?php print($margin); ?>">
            	<div class="title"><?php the_title(); ?></div>
                <?php if ($description_header!='') {
                ?>
                    <div class="description"><?php print($description_header); ?></div>
                <?php
                } ?>
        	</div>
        </div>
    </section>
	<?php
	while ( have_posts() ) : the_post();
		the_content();
	 endwhile;
	?>
<?php
get_footer();
?>