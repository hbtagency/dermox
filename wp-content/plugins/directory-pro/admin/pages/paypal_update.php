<style>
.chili{color:red}
.chili:before{content:" *"}
</style>	

<script>

	function update_paypal_setting() {

	
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"iv_directories_update_paypal_settings",	
					"form_data":	jQuery("#paypal_form_iv").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						jQuery('#iv-loading').html('<div class="col-md-5 alert alert-success">Update Successfully. <a class="btn btn-success btn-xs" href="?page=wp-iv_directories-payment-settings"> Go Payment Setting Page</aa></div>');
						
					}
				});
				
	}

			
			</script>	
			<?php
			global $wpdb;
			$newpost_id='';
			$post_name='iv_directories_paypal_setting';			
			
			$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
						if(sizeof($row )>0){
						  $newpost_id= $row->ID;
						}	
			
			$paypal_mode=get_post_meta( $newpost_id,'iv_directories_paypal_mode',true);	
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">

				
					
					<!-- /.modal -->
					
					
					<!-- Start Form 101 -->
					
					
					<div class="row">
						<div class="col-md-12"><h3 class="page-header">Paypal Api Settings [Express Checkout] </h3>
						
						</div>	
											
						
					</div> 
					
						
						<form id="paypal_form_iv" name="paypal_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
							
							 
							 
										
							<div class="form-group">
								<label for="text" class="col-md-3 control-label"></label>
								<div id="iv-loading"></div>
							 </div>		
							 <div class="form-group">
								<label for="text" class="col-md-3 control-label">Gateway Mode</label>
								<div class="col-md-5">
									
									<select name="paypal_mode" id ="paypal_mode" class="form-control">
													<option value="test" <?php echo ($paypal_mode == 'test' ? 'selected' : '') ?>>Test Mode</option>
													<option value="live" <?php echo ($paypal_mode == 'live' ? 'selected' : '') ?>>Live Mode</option>
													
									</select>	
								
								</div>
							  </div> 
							 
							  <div class="form-group">
								<label for="text" class="col-md-3 control-label">PayPal API Username <span class="chili"></span></label>
								<div class="col-md-5">
								  <input type="text" class="form-control" name="paypal_username" id="paypal_username" value="<?php echo get_post_meta($newpost_id, 'iv_directories_paypal_username', true); ?>" placeholder="Enter Paypal Username">
								</div>
							  </div>
							
							 
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-3 control-label">PayPal API Password <span class="chili"></span></label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="paypal_api_password" name="paypal_api_password" value="<?php echo get_post_meta($newpost_id, 'iv_directories_paypal_api_password', true); ?>"  placeholder="Enter Paypal Api Password">
								</div>
							  </div>
							  
							    <div class="form-group">
								<label for="inputEmail3" class="col-md-3 control-label">PayPal API Signature <span class="chili"></span></label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="paypal_api_signature" name="paypal_api_signature" value="<?php echo get_post_meta($newpost_id, 'iv_directories_paypal_api_signature', true); ?>"  placeholder="Enter Paypal Api Signature">
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-3 control-label">PayPal API Currency Code</label>
								<div class="col-md-5">
									<?php
										$currency_iv=get_post_meta($newpost_id, 'iv_directories_paypal_api_currency', true);
									?>
										<select id="paypal_api_currency" name="paypal_api_currency" class="form-control">
											
												<option value="USD" <?php echo ($currency_iv=='USD' ? 'selected':'')  ?> >US Dollars ($)</option>
												<option value="EUR" <?php echo ($currency_iv=='EUR' ? 'selected':'')  ?> >Euros (€)</option>
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
								  <input type="text" class="form-control" id="paypal_api_currency" name="paypal_api_currency" value="<?php echo get_post_meta($newpost_id, 'iv_directories_paypal_api_currency', true); ?>"  placeholder="Enter Paypal Api Currency">
								  -->
								</div>
							  </div>
							
							
										  
						  
						</form>
					
						<div class="row">	
					<label for="" class="col-md-3 control-label"></label>						
							<div class="col-md-5">					
								<div align="">
									<button class="btn btn-info " onclick="return update_paypal_setting();">Update Settings</button></div>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
				</div>		 


				<!-- Zea test end -->

				<!-- End of templates -->

			
