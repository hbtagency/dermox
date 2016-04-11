<?php
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
            	<div class="title">Search results for: <?php the_title(); ?></div>
                <?php if ($description_header!='') {
                ?>
                    <div class="description"><?php print($description_header); ?></div>
                <?php
                } ?>
        	</div>
        </div>
    </section>
    <div class="container blog-page padding">
		<?php
		while ( have_posts() ) : the_post();
			require(get_template_directory().'/templates/content-post.php');
		 endwhile;
        if (!have_posts()) {
            require(get_template_directory().'/templates/content-none.php');
        }
		?>
	</div>
<?php
get_footer();
?>