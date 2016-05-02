<?php	
echo '<link href="' . wp_iv_directories_URLPATH . 'admin/files/css/jquery-ui.css" rel="stylesheet" media="screen">
				<script type="text/javascript" src="' . wp_iv_directories_URLPATH . 'admin/files/js/jquery-ui.min.js" ></script>';
				
						
?>	
<script type="text/javascript"> jQuery(function() {
							jQuery( "#start_date" ).datepicker();
							jQuery( "#end_date" ).datepicker();
						});</script>					
<script>

	function iv_update_coupon() {

	
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"iv_directories_update_coupon",	
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
			<?php
			global $wpdb;
			
			$id='';	$title='';
			if(isset($_REQUEST['id'])){
			$id=$_REQUEST['id'];
			}
			$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE Id = '".$id."' ");
						if(sizeof($row )>0){
						  $title= $row->post_title;
						}	
			
			
			
			?>
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
							<div class="pull-right"><button class="btn btn-info btn-lg" onclick="return iv_update_coupon();">Update Coupon</button></div>
						</div>
					</div>
					
					
					<div class="row">
						<div class="col-md-12"><h3 class="page-header">Update Coupon </h3>
						
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
								  <input type="text" class="form-control" name="coupon_name" id="coupon_name" value="<?php echo $title; ?>" placeholder="Enter Coupon Name Or Coupon Code">
								</div>
							  </div>	
							   <div class="form-group">
								<label for="text" class="col-md-2 control-label">Discount Type</label>
								<div class="col-md-5">
									<?php
										$dis_type= get_post_meta($id, 'iv_coupon_type', true); 
									?>
									<select  name="coupon_type" id ="coupon_type" class="form-control">
										<option value="amount" 		<?php echo ($dis_type=='amount' ? 'selected' : '' ); ?> >Fixed Amount</option>
										<option value="percentage"  <?php echo ($dis_type=='percentage' ? 'selected' : '' ); ?> >Percentage</option>
									
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
							$current_pac=get_post_meta($id, 'iv_coupon_pac_id', true);
							//echo'$total_package.....'.$total_package;
							$current_pac_arr=explode(",",$current_pac);
							if(sizeof($membership_pack)>0){
								$i=0;
								echo'<select multiple name="package_id" id ="package_id" class="form-control">';
								//echo '<option value="0" '.(in_array( '0', $current_pac_arr) ? 'selected' : '').' >All Packages</option>';
								foreach ( $membership_pack as $row )
								{
									$recurring= get_post_meta( $row->ID,'iv_directories_package_recurring',true);
									$pac_cost= get_post_meta( $row->ID,'iv_directories_package_cost',true);
									if($recurring!='on' and $pac_cost!="" ){ ?>
											<option value="<?php echo $row->ID; ?>" <?php echo (in_array( $row->ID, $current_pac_arr) ? 'selected' : '') ?>><?php echo $row->post_title; ?></option>
									<?php
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
								  <input type="text" class="form-control" id="coupon_count" name="coupon_count" value="<?php echo get_post_meta($id, 'iv_coupon_limit', true); ?>"  placeholder="Enter Usage Limit Number">
								</div>
							  </div>
							
							 
							<div class="form-group" >									
										<label for="text" class="col-md-2 control-label">Start Date</label>
										<div class="col-md-5">
											<input type="text"  readonly name="start_date"   id="start_date" class="form-control ctrl-textbox"  placeholder="Select Date" value="<?php echo get_post_meta($id, 'iv_coupon_start_date', true); ?>">

										</div>
									</div>							  
							    <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Expire Date</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" readonly id="end_date" name="end_date" value="<?php echo get_post_meta($id, 'iv_coupon_end_date', true); ?>"  placeholder="Select Datee">
								</div>
							  </div>
							  <div class="form-group">
								<label for="inputEmail3" class="col-md-2 control-label">Amount</label>
								<div class="col-md-5">
								  <input type="text" class="form-control" id="coupon_amount" name="coupon_amount" value="<?php echo get_post_meta($id, 'iv_coupon_amount', true); ?>"  placeholder=" Coupon Amount [ Only Amount no Currency ]">
								</div>
							  </div>
							
							<input type="hidden"  id="coupon_id" name="coupon_id" value="<?php echo $id; ?>"  >
							
							  
							 
								
							  
							 
												  
						  
						</form>
						<div class=" col-md-7  bs-callout bs-callout-info">		
					
							Note : Coupon will work on "One Time Payment" only. Coupon will not work on recurring payment.						
						</div>
						<div class="row">					
							<div class="col-xs-12">					
								<div align="center">
									<button class="btn btn-info btn-lg" onclick="return iv_update_coupon();">Update Coupon</button></div>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
						
				</div>		 


				<!-- Zea test end -->

				<!-- End of templates -->

			
