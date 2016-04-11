<?php 
$bg = '';
if ($option == 'Style transparent') {
  $bg = 'no-bg';
}
$text_background_color = '';
$text_description_color = '';
$text_background_linkvs_color = '';
$text_button_buy_background = '';
$text_sticke_background = '';
$text_name_product_color = '';
$text_price_color = '';
$text_title_color = '';
if ($background_color != '') {
	$text_background_color = 'style="background:'.$background_color.'"';
}
if ($title_color != '') {
$text_title_color = 'style="color:'.$title_color.'"';
}
if ($description_color != '') {
$text_description_color = 'style="color:'.$description_color.'"';
}
if ($background_linkvs_color != '') {
$text_background_linkvs_color = 'style="background:'.$background_linkvs_color.'"';
}
if ($button_buy_background != '') {
$text_button_buy_background = 'style="background:'.$button_buy_background.'"';
}
if ($sticke_background != '') {
$text_sticke_background = 'style="background:'.$sticke_background.'"';
}
if ($name_product_color != '') {
$text_name_product_color = 'style="color:'.$name_product_color.'"';
}
if ($price_color != '') {
$text_price_color = 'style="color:'.$price_color.'"';
}
?>
<section>
	<div class="skin-care <?php print($bg); ?>">
	  <div class="container">
	    <div class="content">
	      <div class="title" <?php print($text_title_color); ?>><?php print($section_title_box); ?></div>
	      <div class="description" <?php print($text_description_color); ?>><?php print($subtile_box); ?></div>
	    </div>
	    <a href="<?php print($url); ?>" class="visit"  <?php print($text_background_linkvs_color); ?>><?php print($text_link); ?></a>
	    <div class="product">
	    	<?php
	    		if ($category != 'All') {
				      	$args = array(
			              'post_type' => 'product',
			              'posts_per_page' => $number,
			              'order' => 'DESC' ,
			              'tax_query' => array(
			                'relation' => 'OR',
			                array(
			                    'taxonomy' => 'product_cat',
			                    'field' => 'slug',
			                    'terms' => $category
			                ),
			      		),
			        );
				 }
	            else{
	            	$args = array(
	                  'post_type' => 'product',
	                  'posts_per_page' => $number,
	                  'order' => 'DESC' ,
	            	);
	            }
	             $loop = new WP_Query( $args );
	          ?>
	          <?php if ($loop->have_posts()) {?>
            	<?php while ( $loop->have_posts() ) : $loop->the_post();?>
            		<?php 
            		  global $product;
            		  $product_type = $product->get_type();
            		  	$sale_price = '';
			            if( $product_type == 'simple' ){
						   $sale_price = get_post_meta(get_the_ID(),'_sale_price',true);
			          	   $regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
						} elseif( $product_type == 'variable'){
						   $available_variations = $product->get_available_variations();
	            		   $variation_id=$available_variations[0]['variation_id'];
	            		   $variable_product1= new WC_Product_Variation( $variation_id );
	            		   $regular_price = $variable_product1 ->regular_price;
						   $sales_price = $variable_product1 ->sale_price;
						}
                    ?>
			      <div class="item-product wow bounceInUp col-lg-3 col-md-3 col-sm-3 col-xs-12" data-wow-duration="1s" data-wow-delay="0.3s">
			        <div class="img-product" <?php print($text_background_color); ?>>
			            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="245px" height="300px" />'; ?>
			            <a href="<?php echo get_permalink($loop->post->ID) ?>" <?php print($text_button_buy_background); ?>><?php esc_html_e('Buy now', 'bleute'); ?></a>
			        </div>
					<?php if ($sale_price != '') { ?>
              			<span class="stick-product sale" <?php print($text_sticke_background) ?>><?php esc_html_e('Sale', 'bleute'); ?></span>
              	    <?php } ?>
			        <div class="content-product">
			          <div class="title"><a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" <?php print($text_name_product_color) ?>><?php the_title(); ?></a></div>
			          <div class="content" <?php print($text_description_color) ?>>
			          	<?php 
							$content_product  = get_field('sub_content',$loop->post->ID); 
							print($content_product);
						?>
			          </div>
			          <span class="item-price">
		              	<?php if ($sale_price != '') { ?>
		              		<?php if ($sale_price == $regular_price) { ?>
		              			<span class="price only" <?php print($text_price_color) ?>><?php print(get_woocommerce_currency_symbol()); ?><?php print ($regular_price); ?></span>
		              		<?php } elseif( $product_type == 'variable') { ?>
		              			<span class="price only" <?php print($text_price_color) ?>><?php print(get_woocommerce_currency_symbol()); ?><?php print ($regular_price); ?>- <?php print(get_woocommerce_currency_symbol()); ?><?php print ($sale_price); ?></span>
		              		<?php } else{ ?>
			              		<span class="sale-price"><?php print(get_woocommerce_currency_symbol()); ?><?php print ($regular_price); ?></span>
			              		<span class="price" <?php print($text_price_color) ?>><?php print(get_woocommerce_currency_symbol()); ?><?php print ($sale_price); ?></span>
		              		<?php } ?>
		              	<?php } 
		              	else{
		              	?>
		                <span class="price only" <?php print($text_price_color) ?>><?php print(get_woocommerce_currency_symbol()); ?><?php print ($regular_price); ?></span>
		              	<?php } ?>
		              </span>
			        </div>
			      </div>
	      	<?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php }?>
	    </div>
	  </div>
	</div>
	</section>