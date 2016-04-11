<footer>
	<div class="container">
	<div class="widget-footer two-widget">
        <div class="footer-column col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <div class="sale-footer">
            <?php 
              if (bleute_GetOption('price_sale')!= NULL) {?>
              <div class="sale"><?php print(bleute_GetOption('price_sale')); ?></div>
            <?php
              }
            ?>
            
            <?php 
              if (bleute_GetOption('title_sale')!= NULL) {
            ?>
                <div class="title"><?php print(bleute_GetOption('title_sale')); ?></div>
            <?php
              }
            ?>

            <?php 
              if (bleute_GetOption('description_sale')!= NULL) {
            ?>
              <div class="description"><?php print(bleute_GetOption('description_sale')); ?></div>
            <?php
              }
            ?>
          </div>
        </div>
        
        <div class="footer-column col-lg-6 col-md-6 col-sm-6 col-xs-6">
          <?php if (function_exists('bleute_latest_tweets_render')) { ?>
          <div class="twitter-footer">
            <div class="title"><?php esc_html_e('TWITTER','bleute');?></div>
            <div class="twitter">
              <?php 
                $twitterMessage = bleute_latest_tweets_render(2);
                 foreach ($twitterMessage as $key => $value) {?>
                  <div class="title-twitter">
                      <?php printf('%s',$value); ?>
                  </div> 
              <?php } ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
	</div>
	<div class="bottom-footer">
		<div class="row">
      
			<?php get_template_part( 'templates/footer', 'text' ); ?>
		</div>
	</div><!--End bottom footer-->
</footer>
