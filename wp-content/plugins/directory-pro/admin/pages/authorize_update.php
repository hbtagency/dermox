	

<script>

	function update_authorize() {

	
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"iv_directories_update_authorize_setting",	
					"form_data":	jQuery("#package_form_iv").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						//alert('Successfully Updated');
						var url = "<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-package-all&form_submit=success";    						
						jQuery(location).attr('href',url);
					}
				});
				
	}

			
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
						<div class="col-md-12"><h2 class="page-header">Update Package / Membership Level<br /><small> &nbsp;</small> </h2>
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
								<div class="col-md-5">
								  <input type="text" class="form-control" name="package_name" id="package_name" value="<?php echo $row->post_title; ?>"placeholder="Enter Package Name">
								</div>
							  </div>
							  <h3 class="page-header"> Billing Details</h3>
							 
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Initial Payment</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="package_cost" name="package_cost" value="<?php echo get_post_meta($package_id, 'iv_directories_package_cost', true); ?>"  placeholder="Enter Initial Payment">The initial amount collected at user registration.
								</div>
							  </div>
							  
							   <div class="form-group">
								<label for="text" class="col-md-2 control-label"> Recurring Subscription</label>
								<div class="col-md-5 ">
									<label>
									  <input type="checkbox"  <?php echo (get_post_meta($package_id, 'iv_directories_package_recurring', true)=='on'?'checked': ''); ?> name="package_recurring" id="package_recurring" > Enable Recurring Payment
									</label>
								</div>								
							  </div>
							  
							   <div class="form-group">
								<label for="text" class="col-md-2 control-label">Billing Amount</label>
								<div class="col-md-1">
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
									The amount to be billed one cycle after the initial payment.
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
								<div class="col-md-5 ">
									<label>
									  <input type="checkbox" <?php echo (get_post_meta($package_id, 'iv_directories_package_enable_trial_period', true)=='yes'? 'checked': ''); ?> name="package_enable_trial_period" id="package_enable_trial_period" value='yes'> Enable Trial Period
									</label>
								</div>								
							  </div>
							  
							   <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Trial Amount</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" value="<?php echo get_post_meta($package_id, 'iv_directories_package_trial_amount', true); ?>" id="package_trial_amount" name="package_trial_amount" placeholder="Enter Amount to Bill for The Trial Period">
								</div>
							  </div>
							  
							  <div class="form-group">
								<label for="text" class="col-md-2 control-label">Trial Period</label>
								<div class="col-md-1">
								  <select id="package_trial_period_interval" name="package_trial_period_interval" class="ctrl-combobox form-control">
									  
										<?php
											 $package_trial_period_interval= get_post_meta($package_id, 'iv_directories_package_trial_period_interval', true); 
											for($ii=1;$ii<31;$ii++){
												echo '<option value="'.$ii.'" '.($package_trial_period_interval == $ii ? 'selected' : '').'>'.$ii.'</option>';
											
											}
											
											?>
                                            
                                    </select>			
								</div>	
											
								
									
								
							  </div>
							  
							   
												  
						  
						</form>
					
						<div class="row">					
							<div class="col-xs-12">					
								<div align="center">
									<button class="btn btn-info btn-lg" onclick="return update_authorize();">Update Authorize</button></div>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
				</div>		 


				<!-- Zea test end -->

				<!-- End of templates -->

			
