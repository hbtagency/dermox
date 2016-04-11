<footer class="">
    
	<div class="top-footer">
            
		<div class="container">
                    
		<div class="col-xs-12">
                    <div class="footer-widget">
                      <div class="widget-body text-center">
                        <?php
                              if (bleute_GetOption('bleute-logo')!= NULL) {
                                  $store_logo = bleute_GetOption('bleute-logo')['url'];
                              }else{
                                  $store_logo = get_template_directory_uri().'/asset/images/logo-blue.png';
                              }

                              if ($store_logo!='') {
                                  ?>
                          <a class="center" href="<?php echo esc_url(home_url( '/' ));?>"><img src="<?php echo esc_url($store_logo);?>" alt="Logo"></a>
                                  <?php } ?>
                      </div>
                    </div>
                  </div>
		<?php
			if (bleute_GetOption('footer-widget-number')!= NULL) {
				$numshow = intval(bleute_GetOption('footer-widget-number'));
				
			}else{
				$numshow = 6;
			}
			if($numshow > 0){
				if (function_exists("dynamic_sidebar")) {
					for ($i=1; $i <= $numshow; $i++) {
					 	if ( is_active_sidebar( 'sidebar-footer-'.$i ) ){
							dynamic_sidebar( 'sidebar-footer-'.$i );
						}
					 }
				}
			}
		?>
		</div>

	</div><!--End top footer-->
	<div class="bottom-footer">
		<div class="row">
			<?php get_template_part( 'templates/footer', 'text-none' ); ?>
		</div>
	</div><!--End bottom footer-->
</footer>
