<?php 
$id_ran = rand(1, 99999);
$text_background_color = 'style="background:'.$background_color.'"';
$text_title_color = 'style="color:'.$title_color.'"';
$text_description_color = 'style="color:'.$description_color.'"';
$text_background_linkvs_color = 'style="background:'.$background_linkvs_color.'"';
$text_button_buy_background = 'style="background:'.$button_buy_background.'"';
$text_sticke_background = 'style="background:'.$sticke_background.'"';
$text_name_product_color = 'style="color:'.$name_product_color.'"';
$text_price_color = 'style="color:'.$price_color.'"';

?>
<section>
	<div class="skin-care slide-product wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
	  <div class="container">
	    <div class="title-element" <?php print($text_title_color); ?>><?php print($section_title_box); ?></div>
	    <div class="product">
	      <div class="swiper-container slide-skin slide-skin-<?php print($id_ran); ?>">
	        <div class="swiper-wrapper">
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
	            		  $rating_count = $product->get_rating_count();
				          $average = $product->get_average_rating();
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
				      <div class="swiper-slide">
			            <div class="item-product">
			              <div class="img-product"  <?php print($text_background_color); ?>>
				            <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" width="270px" height="300px" />'; ?>
				            <a href="<?php echo get_permalink($loop->post->ID) ?>" <?php print($text_button_buy_background); ?>><?php esc_html_e('Buy now', 'bleute'); ?></a>
				          </div>
				          <?php if ($sale_price != '') { ?>
		              		<span class="stick-product sale" <?php print($text_sticke_background); ?>><?php esc_html_e('Sale', 'bleute'); ?></span>
		              	  <?php } ?>
						  
			              <div class="title"><a href="<?php echo esc_url(get_permalink($loop->post->ID)); ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>" <?php print($text_name_product_color) ?>><?php the_title(); ?></a></div>
			              <div class="woocommerce">
			              	<?php if ( $rating_count > 0 ) : ?>
		                  		<div class="star-rating" title="<?php printf( esc_html__( 'Rated %s out of 5', 'bleute' ), $average ); ?>">
									<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
										<strong class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %s5%s', 'bleute' ), '<span>', '</span>' ); ?>
										<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'bleute' ), '<span class="rating">' . $rating_count . '</span>' ); ?>
									</span>
								</div>
		                    <?php endif; ?>
			              </div>
			              <span class="item-price-slide">
			              	<?php if ($sale_price != '') { ?>
			              		<span class="sale-price"><?php print(get_woocommerce_currency_symbol()); ?><?php print ($regular_price); ?></span>
			              		<span class="price" <?php print($text_price_color) ?>><?php print(get_woocommerce_currency_symbol()); ?><?php print ($sale_price); ?></span>
			              	<?php } 
			              	else{
			              	?>
			                <span class="price" <?php print($text_price_color) ?>><?php print(get_woocommerce_currency_symbol()); ?><?php print ($regular_price); ?></span>
			              	<?php } ?>
			              </span>
			            </div>
			          </div>
		      	<?php endwhile; ?>
	            <?php wp_reset_postdata(); ?>
	          <?php }?>
	        </div>
	        <div class="swiper-button-next product-next-<?php print($id_ran); ?>"></div>
	        <div class="swiper-button-prev product-prev-<?php print($id_ran); ?>"></div>
	      </div>
	      <script type="text/javascript">
          (function($) {
             "use strict";
		      var slide_skin_<?php print($id_ran); ?> = new Swiper('.slide-skin-<?php print($id_ran); ?>', {
		          pagination: '.swiper-pagination',
		          paginationClickable: true,
		          nextButton: '.product-next-<?php print($id_ran); ?>',
		          prevButton: '.product-prev-<?php print($id_ran); ?>',
		          slidesPerView: 4,
		          breakpoints: {
	                // when window width is <= 320px
	                320: {
	                  slidesPerView: 1,
	                  spaceBetweenSlides: 10
	                },
	                568: {
	                  slidesPerView: 2,
	                  spaceBetweenSlides: 10
	                },
	              }
		      });
		    })(jQuery)
	      </script>
	    </div>
	  </div>
	</div>
	</section>