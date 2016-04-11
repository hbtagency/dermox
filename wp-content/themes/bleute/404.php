<?php
get_header('none');
?>
<section>
	<div class="bg-404">
      <div class="bg">
        <img src="<?php echo get_template_directory_uri(); ?>/asset/images/bg-404.png" alt="404">
      </div>
      <div class="logo">
        <?php
            if (bleute_GetOption('bleute-logo')!= NULL) {
                $store_logo_img = bleute_GetOption('bleute-logo');
                $store_logo = $store_logo_img['url'];
            }else{
                $store_logo = get_template_directory_uri().'/asset/images/logo-blue.png';
            }

            if ($store_logo!='') {
        	?>
	        <a href="<?php echo esc_url(home_url( '/' ));?>"><img src="<?php echo esc_url($store_logo);?>" alt="Logo"></a>
	        <?php } ?>
        
        
      </div>
      <div class="title">
        <?php esc_html_e('WHOOPS, OUR BAD...','bleute');?>
      </div>
      <div class="description">
        <?php esc_html_e('The page you requeted cannot be found.','bleute');?>
      </div>
      <div class="title-404"><?php esc_html_e('404','bleute');?></div>
    </div>
</section>
<?php get_footer()?>