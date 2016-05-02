<style>
.bs-callout {
    margin: 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee;
}
.bs-callout-info {
    background-color: #E4F1FE;
    border-color: #22A7F0;
}

</style>
<script>

	function update_stripe_setting() {

	
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"iv_directories_update_stripe_settings",	
					"form_data":	jQuery("#stripe_form_iv").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						jQuery('#iv-loading').html('<div class="col-md-12 alert alert-success">Update Successfully. <a class="btn btn-success btn-xs" href="?page=wp-iv_directories-payment-settings"> Go Payment Setting Page</aa></div>');
						
					}
				});
				
	}

			
			</script>	
			<?php
			global $wpdb;
			$newpost_id='';
			$post_name='iv_directories_stripe_setting';
			$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
						if(sizeof($row )>0){
						  $newpost_id= $row->ID;
						}	
			
			$stripe_mode=get_post_meta( $newpost_id,'iv_directories_stripe_mode',true);	
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">				
					
					
					<div class="row">
						<div class="col-md-12"><h3 class="">Stripe Api Settings </h3>
						
						</div>	
											
						
					</div> 
					
						
						
					<div class="col-md-7 panel panel-info">
						<div class="panel-body">
					
					<!-- /.modal -->
					
					
					<!-- Start Form 101 -->
					
						
						<form id="stripe_form_iv" name="stripe_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
							
							 
							 
										
							<div class="form-group">
								<label for="text" class="col-md-3 control-label"></label>
								<div id="iv-loading"></div>
							 </div>		
							 <div class="form-group">
								<label for="text" class="col-md-4 control-label">Gateway Mode</label>
								<div class="col-md-8">
									
									<select name="stripe_mode" id ="stripe_mode" class="form-control">
													<option value="test" <?php echo ($stripe_mode == 'test' ? 'selected' : '') ?>>Test Mode</option>
													<option value="live" <?php echo ($stripe_mode == 'live' ? 'selected' : '') ?>>Live Mode</option>
													
									</select>	
								
								</div>
							  </div> 
							 
							  <div class="form-group">
								<label for="text" class="col-md-4 control-label">Live Secret</label>
								<div class="col-md-8">
								  <input type="text" class="form-control" name="secret_key" id="secret_key" value="<?php echo get_post_meta($newpost_id, 'iv_directories_stripe_live_secret_key', true); ?>" placeholder="Enter stripe secret key">
								</div>
							  </div>
							
							 
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Live Publishable</label>
								<div class="col-md-8">
								  <input type="text" class="form-control" id="publishable_key" name="publishable_key" value="<?php echo get_post_meta($newpost_id, 'iv_directories_stripe_live_publishable_key', true); ?>"  placeholder="Enter stripe Api publishable key">
								</div>
							  </div>
								<div class="col-md-12">
									<hr>
							    </div>
							    <div class="clearfix"></div>
							    <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Test Secret</label>
								<div class="col-md-8">
								  <input type="text" class="form-control" id="secret_key_test" name="secret_key_test" value="<?php echo get_post_meta($newpost_id, 'iv_directories_stripe_secret_test', true); ?>"  placeholder="Enter stripe Api Secret Key">
								</div>
							  </div>
							   <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Test Publishable</label>
								<div class="col-md-8">
								  <input type="text" class="form-control" id="stripe_publishable_test" name="stripe_publishable_test" value="<?php echo get_post_meta($newpost_id, 'iv_directories_stripe_publishable_test', true); ?>"  placeholder="Enter stripe Api publishable Key">
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-4 control-label">Stripe API Currency Code</label>
								<div class="col-md-8">
									<?php
										$currency_iv=get_post_meta($newpost_id, 'iv_directories_stripe_api_currency', true);
									?>
										<select id="stripe_api_currency" name="stripe_api_currency" class="form-control">
											
												<option value="USD" <?php echo ($currency_iv=='USD' ? 'selected':'')  ?> >US Dollars ($)</option>
												<option value="EUR" <?php echo ($currency_iv=='EUR' ? 'selected':'')  ?> >Euros (&euro;)</option>
												<option value="GBP" <?php echo ($currency_iv=='GBP' ? 'selected':'')  ?> >Pounds Sterling (£)</option>
												<option value="AUD" <?php echo ($currency_iv=='AUD' ? 'selected':'')  ?> >Australian Dollars ($)</option>
												<option value="BRL" <?php echo ($currency_iv=='BRL' ? 'selected':'')  ?> >Brazilian Real (R$)</option>
												<option value="CAD" <?php echo ($currency_iv=='CAD' ? 'selected':'')  ?> >Canadian Dollars ($)</option>
												<option value="CNY" <?php echo ($currency_iv=='CNY' ? 'selected':'')  ?> >Chinese Yuan</option>
												<option value="CZK" <?php echo ($currency_iv=='CZK' ? 'selected':'')  ?> >Czech Koruna</option>
												<option value="DKK" <?php echo ($currency_iv=='DKK' ? 'selected':'')  ?> >Danish Krone</option>
												<option value="HKD" <?php echo ($currency_iv=='HKD' ? 'selected':'')  ?> >Hong Kong Dollar ($)</option>
												<option value="HUF" <?php echo ($currency_iv=='HUF' ? 'selected':'')  ?> >Hungarian Forint</option>
												<option value="INR" <?php echo ($currency_iv=='INR' ? 'selected':'')  ?> >Indian Rupee</option>
												<option value="ILS" <?php echo ($currency_iv=='ILS' ? 'selected':'')  ?> >Israeli Sheqel</option>
												<option value="JPY" <?php echo ($currency_iv=='JPY' ? 'selected':'')  ?> >Japanese Yen (¥)</option>
												<option value="MYR" <?php echo ($currency_iv=='MYR' ? 'selected':'')  ?> >Malaysian Ringgits</option>
												<option value="MXN" <?php echo ($currency_iv=='MXN' ? 'selected':'')  ?> >Mexican Peso ($)</option>
												<option value="NZD" <?php echo ($currency_iv=='NZD' ? 'selected':'')  ?> >New Zealand Dollar ($)</option>
												<option value="NOK" <?php echo ($currency_iv=='NOK' ? 'selected':'')  ?> >Norwegian Krone</option>
												<option value="PHP" <?php echo ($currency_iv=='PHP' ? 'selected':'')  ?> >Philippine Pesos</option>
												<option value="PLN" <?php echo ($currency_iv=='PLN' ? 'selected':'')  ?> >Polish Zloty</option>
												<option value="SGD" <?php echo ($currency_iv=='SGD' ? 'selected':'')  ?> >Singapore Dollar ($)</option>
												<option value="ZAR" <?php echo ($currency_iv=='ZAR' ? 'selected':'')  ?> >South African Rand</option>
												<option value="KRW" <?php echo ($currency_iv=='KRW' ? 'selected':'')  ?> >South Korean Won</option>
												<option value="SEK" <?php echo ($currency_iv=='SEK' ? 'selected':'')  ?> >Swedish Krona</option>
												<option value="CHF" <?php echo ($currency_iv=='CHF' ? 'selected':'')  ?> >Swiss Franc</option>
												<option value="RUB" <?php echo ($currency_iv=='RUB' ? 'selected':'')  ?> >Russian Ruble</option> 
												<option value="TWD" <?php echo ($currency_iv=='TWD' ? 'selected':'')  ?> >Taiwan New Dollars</option>
												<option value="THB" <?php echo ($currency_iv=='THB' ? 'selected':'')  ?> >Thai Baht</option>
												<option value="TRY" <?php echo ($currency_iv=='TRY' ? 'selected':'')  ?> >Turkish Lira</option>
												
											</select>
											
									<!--
								  <input type="text" class="form-control" id="stripe_api_currency" name="stripe_api_currency" value="<?php echo get_post_meta($newpost_id, 'iv_directories_stripe_api_currency', true); ?>"  placeholder="Enter stripe Api Currency">
								  -->
								</div>
							  </div>
							
							
							
							  
							 
								
							  
							 
												  
						  
						</form>
					
						<div class="row">					
							<div class="col-md-12">	
								<label for="" class="col-md-4 control-label"></label>
								<div class="col-md-8">
									<button class="btn btn-info " onclick="return update_stripe_setting();">Update Settings</button></div>
									<p>&nbsp;</p>
								</div>
							</div>
							<div class=" col-md-12  bs-callout bs-callout-info">
								<b>Stripe Test to Live mode: </b><br/>
								When turned from Test to Live didn't have any of the plans you've created on Stripe.
								When you will switch from Stripe to Paypal and PayPal to Stripe again, the connection between  WP Memembership plugin and Stripe was corrected and thus the plans were re-created in the Stripe account.
							
						   </div>
							
							
							
						</div>
						</div>			
					</div>
				</div>		 


				<!-- Zea test end -->

				<!-- End of templates -->

			
