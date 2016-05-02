<?php	
echo '<link href="' . wp_iv_directories_URLPATH . 'admin/files/css/jquery-ui.css" rel="stylesheet" media="screen">
				<script type="text/javascript" src="' . wp_iv_directories_URLPATH . 'admin/files/js/jquery-ui.min.js" ></script>';
				
						
?>	
<script type="text/javascript"> jQuery(function() {
							jQuery( "#start_date" ).datepicker();
							jQuery( "#end_date" ).datepicker();
						});</script>					
<script>

	function iv_create_coupon() {

	
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"iv_directories_create_coupon",	
					"form_data":	jQuery("#coupon_form_iv").serialize(), 
					"form_pac_ids": jQuery("#package_id").val(),
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						var url = "<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-coupons-form&form_submit=success";    						
						jQuery(location).attr('href',url);
						
					}
				});
				
	}

			
			</script>	
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
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">

				
					
					<!-- /.modal -->
					
					
					<!-- Start Form 101 -->
					<div class="row">					
						<div class="col-md-12" id="submit-button-holder">					
							<div class="pull-right"><button class="btn btn-info btn-lg" onclick="return iv_create_coupon();">Save Coupon</button></div>
						</div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12"><h3 class="page-header">Create New Coupon </h3>
						
						</div>	
											
						
					</div> 
					
						
						<form id="coupon_form_iv" name="coupon_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
							
							 
							 
										
							<div class="form-group">
								<label for="text" class="col-md-2 control-label"></label>
								<div id="iv-loading"></div>
							 </div>	
							<div class="form-group">
								<label for="text" class="col-md-2 control-label">Coupon Name</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" name="coupon_name" id="coupon_name" value="" placeholder="Enter Coupon Name Or Coupon Code">
								</div>
							  </div>
							 <div class="form-group">
								<label for="text" class="col-md-2 control-label">Discount Type</label>
								<div class="col-md-5">
									<select  name="coupon_type" id ="coupon_type" class="form-control">
										<option value="amount" >Fixed Amount</option>
										<option value="percentage" >Percentage</option>
									
									</select>
								
								</div>
							 </div> 			
							 <div class="form-group">
								<label for="text" class="col-md-2 control-label">Package Only</label>
								<div class="col-md-5">
									<?php
									global $wpdb, $post;
							$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'";
							$membership_pack = $wpdb->get_results($sql);
							$total_package=count($membership_pack);
							
							if(sizeof($membership_pack)>0){
								$i=0;
								echo'<select multiple name="package_id" id ="package_id" class="form-control">';
								//echo '<option value="0" selected >All Packages</option>';
								foreach ( $membership_pack as $row )
								{	
									$recurring= get_post_meta( $row->ID,'iv_directories_package_recurring',true);
									$pac_cost= get_post_meta( $row->ID,'iv_directories_package_cost',true);
									if($recurring!='on' and $pac_cost!="" ){										
										echo '<option value="'. $row->ID.'" selected >'. $row->post_title.'</option>';
									}
								}	
													
								echo '</select>';	
							}	
								?>
								</div>
							  </div> 
							 
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Usage Limit</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="coupon_count" name="coupon_count" value=""  placeholder="Enter Usage Limit Number" value="999999">
								</div>
							  </div>
							
							 
							<div class="form-group" >									
										<label for="text" class="col-md-2 control-label">Start Date</label>
										<div class="col-md-5">
											<input type="text"  name="start_date"  readonly   id="start_date" class="form-control ctrl-textbox"  placeholder="Select Date">

										</div>
									</div>							  
							    <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Expire Date</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" readonly id="end_date" name="end_date" value=""  placeholder="Select Datee">
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Amount</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="coupon_amount" name="coupon_amount" value=""  placeholder=" Coupon Amount [ Only Amount no Currency ]">
								</div>
							  </div>
							
							
							
							  
							 
								
							  
							 
												  
						  
						</form>
					
						<div class="row">					
								<div class="col-xs-12">					
										<div align="center">
											<button class="btn btn-info btn-lg" onclick="return iv_create_coupon();">Save Coupon</button>
										</div>
									<p>&nbsp;</p>
								</div>
							</div>
							<div class=" col-md-7  bs-callout bs-callout-info">		
					
								Note : Coupon will work on "One Time Payment" only. Coupon will not work on recurring payment.						
						</div>
						</div>
						
				</div>		 


				<!-- Zea test end -->

				<!-- End of templates -->

			
