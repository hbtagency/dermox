	

<script>

	function update_the_package() {
		var loader_image = "<img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>' />";
		jQuery("#loading").html(loader_image);
				// New Block For Ajax*****
				
				var search_params={
					"action"  : 	"iv_directories_update_package",	
					"form_data":	jQuery("#package_form_iv").serialize(), 
					
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){						
						var url = "<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-package-all&form_submit=success";    						
						jQuery(location).attr('href',url);
					}
				});
				
	}
	jQuery(document).ready(function(){
			jQuery('#package_recurring').click(function(){
				if(this.checked){				
					jQuery('#recurring_block').show();
				}else{				
					jQuery('#recurring_block').hide();
				}
			});
		});	
		jQuery(document).ready(function(){
			jQuery('#package_enable_trial_period').click(function(){
				if(this.checked){				
					jQuery('#trial_block').show();
				}else{				
					jQuery('#trial_block').hide();
				}
			});
		});		
			
			
			</script>	
			<?php
			global $wpdb;
			$package_id='';
			if(isset($_REQUEST['id'])){
				$package_id=$_REQUEST['id'];
			}
			$form_meta_data= get_post_meta( $package_id,'iv_directories_content',true);			
		
			$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE id = '".$package_id."' ");
			//echo'<br/>ID..'.$package_id;
			//echo '-----------------------------'.get_post_meta($package_id, 'iv_directories_package_recurring', true);
			
			
			
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">

				
					
					<!-- /.modal -->
					
					
					<!-- Start Form 101 -->
					<div class="row">					
						<div class="col-xs-12" id="submit-button-holder">					
							<div class="pull-right"><button class="btn btn-info btn-lg" onclick="return update_the_package();">Update Package</button></div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12"><h3 class="page-header">Update Package / Membership Level<br /><small> &nbsp;</small> </h3>
						</div>							
							
					</div> 
					<!--
							<form id="contact_form_iv" name="contact_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
									<div class="form-group col-md-6 row" style="z-index:12;">									
										<label for="text" class="col-md-3 control-label">Package Name</label>
										<div class="col-md-8">
											<input type="text"  name="package_name" class="form-control ctrl-textbox"  placeholder="Enter Package Name">
										</div>
									</div>
									
		
					
						</form>
						-->
						<form id="package_form_iv" name="package_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
							  <input type="hidden"  name="package_id" value="<?php echo $package_id; ?>">
							  <div class="form-group">
								<label for="text" class="col-md-2 control-label">Package Name</label>
								<div class="col-md-6">
								  <input type="text" class="form-control" name="package_name" id="package_name" value="<?php echo $row->post_title; ?>"placeholder="Enter Package Name">
								</div>
							  </div>
							  <div class="form-group">
								<label for="text" class="col-md-2 control-label">Package Feature List</label>
								<div class="col-md-6">
									<textarea class="form-control" name="package_feature" id="package_feature" placeholder="Enter Feature List " rows="5"><?php echo $row->post_content; ?></textarea>
								     It'll display on price list table
								</div>
							  </div>
							  <h3 class="page-header"> Billing Details</h3>
							 
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Initial Payment</label>
								<div class="col-md-6">
								  <input type="text" class="form-control" id="package_cost" name="package_cost" value="<?php echo get_post_meta($package_id, 'iv_directories_package_cost', true); ?>"  placeholder="Enter Initial Payment">The Initial Amount Collected at User Registration.
								</div>
							  </div>
							  
							    <div class="form-group">
								<label for="text" class="col-md-2 control-label">Package Expire After</label>
								<div class="col-md-2">
								  <select id="package_initial_expire_interval" name="package_initial_expire_interval" class="ctrl-combobox form-control">
									  
										<?php
											  $package_initial_period_interval= get_post_meta($package_id, 'iv_directories_package_initial_expire_interval', true); 
											  echo '<option value="">None</option>';
											for($ii=1;$ii<31;$ii++){
												echo '<option value="'.$ii.'" '.($package_initial_period_interval == $ii ? 'selected' : '').'>'.$ii.'</option>';
											
											}
											
											?>
                                           
                                    </select>	
                                     			
								</div>	
											
								
									<div class="col-md-4">
										<?php
											 $package_initial_expire_type= get_post_meta($package_id, 'iv_directories_package_initial_expire_type', true); 
											 ?>
											<select name="package_initial_expire_type" id ="package_initial_expire_type" class=" form-control">			
													<option value="">None </option>								
													<option value="day" <?php echo ($package_initial_expire_type == 'day' ? 'selected' : '') ?>>Day(s)</option>
													<option value="week" <?php echo ($package_initial_expire_type == 'week' ? 'selected' : '') ?>>Week(s)</option>
													<option value="month" <?php echo ($package_initial_expire_type == 'month' ? 'selected' : '') ?>>Month(s)</option>
													<option value="year" <?php echo ($package_initial_expire_type == 'year' ? 'selected' : '') ?>>Year(s)</option>
											</select>		
									 
									</div>
									<div class='col-md-12'><label for="text" class="col-md-2 control-label"></label>
										If select none then user's package will expire after 19 years. Package Expire Option will not work on Recurring Subscription. "Billing Cycle Limit" will Work For Recurring Subscription.
									</div>
								
							  </div>
						
							  
							  
							 
							  
							   <div class="form-group">
								<label for="text" class="col-md-2 control-label"> Recurring Subscription</label>
								<div class="col-md-6 ">
									<label>
									  <input type="checkbox"  <?php echo (get_post_meta($package_id, 'iv_directories_package_recurring', true)=='on'?'checked': ''); ?> name="package_recurring" id="package_recurring" value="on" > Enable Recurring Payment
									</label>
								</div>								
							  </div>
					<div id="recurring_block" style="display:<?php echo (get_post_meta($package_id, 'iv_directories_package_recurring', true)=='on'?'': 'none'); ?>" >		  
							   <div class="form-group">
								<label for="text" class="col-md-2 control-label">Billing Amount</label>
								<div class="col-md-2">
								  <input type="text" class="form-control" value="<?php echo get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true); ?>" name ="package_recurring_cost_initial" id="package_recurring_cost_initial" placeholder="Amount">
								</div>
								<label for="text" class="col-md-1 control-label">Per</label>
								<div class="col-md-1">									
								   <input type="text" class="form-control" value="<?php echo get_post_meta($package_id, 'iv_directories_package_recurring_cycle_count', true); ?>" id="package_recurring_cycle_count" name="package_recurring_cycle_count" placeholder="Cycle #">
								</div>
									<div class="col-md-2">
										<?php $package_recurring_cycle_type= get_post_meta($package_id, 'iv_directories_package_recurring_cycle_type', true); ?>
											<select name="package_recurring_cycle_type" id ="package_recurring_cycle_type" class="form-control">											
													<option value="day" <?php echo ($package_recurring_cycle_type == 'day' ? 'selected' : '') ?>>Day(s)</option>
													<option value="week" <?php echo ($package_recurring_cycle_type == 'week' ? 'selected' : '') ?>>Week(s)</option>
													<option value="month" <?php echo ($package_recurring_cycle_type == 'month' ? 'selected' : '') ?>>Month(s)</option>
													<option value="year" <?php echo ($package_recurring_cycle_type == 'year' ? 'selected' : '') ?>>Year(s)</option>
											</select>		
									 
									</div>
									<div class='col-md-12'><label for="text" class="col-md-2 control-label"></label>
									The "Billing Amount" will Collect at User Registration.
									</div>
							  </div>
							  
							   <div class="form-group">
								<label for="text" class="col-md-2 control-label">Billing Cycle Limit</label>
														
								<div class="col-md-2">
										<select name="package_recurring_cycle_limit" id ="package_recurring_cycle_limit" class="ctrl-combobox form-control">	
											<option value="">Never</option>										
											<?php
											 $package_recurring_cycle_limit= get_post_meta($package_id, 'iv_directories_package_recurring_cycle_limit', true); 
											for($ii=1;$ii<35;$ii++){
												echo '<option value="'.$ii.'" '.($package_recurring_cycle_limit == $ii ? 'selected' : '').'>'.$ii.'</option>';
											
											}
											
											?>
										</select>		
										
								 
								</div>
								
							  </div>
							
								<div class="form-group">
								<label for="text" class="col-md-2 control-label"> Trial</label>
								<div class="col-md-6 ">
									<label>
									  <input type="checkbox" <?php echo (get_post_meta($package_id, 'iv_directories_package_enable_trial_period', true)=='yes'? 'checked': ''); ?> name="package_enable_trial_period" id="package_enable_trial_period" value='yes'> Enable Trial Period
									</label>
									<br/>
									 "Billing Amount" will Collect After Trial Period.   
								</div>								
							  </div>
					<div id="trial_block" style="display:<?php echo (get_post_meta($package_id, 'iv_directories_package_enable_trial_period', true)=='yes'? '': 'none'); ?>" >		  
							   <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Trial Amount</label>
								<div class="col-md-6">
								  <input type="text" class="form-control" value="<?php echo get_post_meta($package_id, 'iv_directories_package_trial_amount', true); ?>" id="package_trial_amount" name="package_trial_amount" placeholder="Enter Amount to Bill for The Trial Period">
								  Amount to Bill for The Trial Period. Free is 0.[Stripe will not support this option ]
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for="text" class="col-md-2 control-label">Trial Period</label>
								<div class="col-md-2">
								  <select id="package_trial_period_interval" name="package_trial_period_interval" class="ctrl-combobox form-control">
									  
										<?php
											 $package_trial_period_interval= get_post_meta($package_id, 'iv_directories_package_trial_period_interval', true); 
											for($ii=1;$ii<31;$ii++){
												echo '<option value="'.$ii.'" '.($package_trial_period_interval == $ii ? 'selected' : '').'>'.$ii.'</option>';
											
											}
											
											?>
                                           
                                    </select>	
                                     			
								</div>	
											
								
									<div class="col-md-4">
										<?php
											 $package_recurring_trial_type= get_post_meta($package_id, 'iv_directories_package_recurring_trial_type', true); 
											 ?>
											<select name="package_recurring_trial_type" id ="package_recurring_trial_type" class=" form-control">											
													<option value="day" <?php echo ($package_recurring_trial_type == 'day' ? 'selected' : '') ?>>Day(s)</option>
													<option value="week" <?php echo ($package_recurring_trial_type == 'week' ? 'selected' : '') ?>>Week(s)</option>
													<option value="month" <?php echo ($package_recurring_trial_type == 'month' ? 'selected' : '') ?>>Month(s)</option>
													<option value="year" <?php echo ($package_recurring_trial_type == 'year' ? 'selected' : '') ?>>Year(s)</option>
											</select>		
									 
									</div>
									<div class='col-md-12'><label for="text" class="col-md-2 control-label"></label>
										After The Trial Period "Billing Amount"	Will Be Billed.	
									</div>
								
							  </div>
						
						</div> <!-- Trial Block --> 
				</div> <!-- Recurring Block -->	  
							<h3 class="page-header"> <?php _e('Access Control/Options','ivdirectories'); ?> </h3>
						 <div class="form-group">
							<label for="text" class="col-md-2  control-label"><?php _e('Maximum Post/Directory','ivdirectories'); ?> </label>
							<div class="col-md-6">
							  <input type="text" class="form-control" name="max_pst_no" id="max_pst_no" placeholder="Enter Max Number" value="<?php echo get_post_meta($package_id,'iv_directories_package_max_post_no',true); ?>">
							  <?php _e('Maximum # of post by this package. Blank is none.','ivdirectories'); ?>
							</div>
						  </div>
						 <div class="form-group">
							<label for="text" class="col-md-2 control-label"><?php _e('Directory Visibility','ivdirectories'); ?>  </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_hide" id="listing_hide"  value='yes' <?php echo (get_post_meta($package_id,'iv_directories_package_hide_exp',true)=='yes'?'checked':'' ); ?>> <?php _e('Directory will hide after user subscription expire.','ivdirectories'); ?>
								</label>																	
							</div>																
						</div> 
						<div class="form-group">
							<label for="text" class="col-md-2 control-label"> <?php _e('Directory Event','ivdirectories'); ?> </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_event" id="listing_event"  value='yes'  <?php echo (get_post_meta($package_id,'iv_directories_package_event',true)=='yes'?'checked':'' ); ?>> <?php _e('Can Add Event.','ivdirectories'); ?>
								</label>
																		
							</div>																
						</div> 						
						<div class="form-group">
							<label for="text" class="col-md-2 control-label"> <?php _e('Deals/Coupon','ivdirectories'); ?> </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_coupon" id="listing_coupon"  value='yes'  <?php echo (get_post_meta($package_id,'iv_directories_package_coupon',true)=='yes'?'checked':'' ); ?> >  <?php _e('Can Add Directory Deals/Coupon.','ivdirectories'); ?>
								</label>								 										
							</div>																
						</div> 
						<div class="form-group">
							<label for="text" class="col-md-2 control-label"> <?php _e('Directory Videos','ivdirectories'); ?> </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_video" id="listing_video"  value='yes'  <?php echo (get_post_meta($package_id,'iv_directories_package_video',true)=='yes'?'checked':'' ); ?> > <?php _e('Can Add Videos.','ivdirectories'); ?>
								</label>								 										
							</div>																
						</div> 
						<div class="form-group">
							<label for="text" class="col-md-2 control-label"> <?php _e('Directory VIP Badge','ivdirectories'); ?> </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_badge_vip" id="listing_badge_vip"  value='yes'  <?php echo (get_post_meta($package_id,'iv_directories_package_vip_badge',true)=='yes'?'checked':'' ); ?> > <?php _e('Will Add VIP Badge','ivdirectories'); ?> <img width="30px" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/vipicon.png";?>">	
								</label>								 										
							</div>																
						</div> 
						<div class="form-group">
							<label for="text" class="col-md-2 control-label"> <?php _e('Directory Booking','ivdirectories'); ?> </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_booking" id="listing_booking"  value='yes'  <?php echo (get_post_meta($package_id,'iv_directories_package_booking',true)=='yes'?'checked':'' ); ?> > <?php _e('Can Add Booking Shortcode','ivdirectories'); ?> 
								</label>								 										
							</div>																
						</div>
						
						<!--
						<div class="form-group">
							<label for="text" class="col-md-2 control-label"> <?php _e('Feature Directory ','ivdirectories'); ?> </label>
							<div class="col-md-6 ">
								<label>
								  <input type="checkbox" name="listing_badge" id="listing_badge"  value='yes'><?php _e('Will Add On Featured List','ivdirectories'); ?>
								</label>								 										
							</div>																
						</div> 
						-->	  
						  
						</form>
					
						<div class="row">					
							<div class="col-xs-12">					
								<div align="center">
									<div id="loading"></div>
									<button class="btn btn-info btn-lg" onclick="return update_the_package();">Update Package</button></div>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
				</div>		 


				<!-- Zea test end -->

				<!-- End of templates -->

			
