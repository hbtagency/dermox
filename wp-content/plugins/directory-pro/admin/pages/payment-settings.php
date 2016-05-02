<?php

global $wpdb;
	$newpost_id='';
	$post_name='iv_directories_paypal_setting';			
	
	$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
				if(sizeof($row )>0){
				  $newpost_id= $row->ID;
				  }	
	$paypal_mode=get_post_meta( $newpost_id,'iv_directories_paypal_mode',true);
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
			<div class="col-md-12">				
				<h3 class="page-header" >Payment Gateways </h3>				
				<div class="col-md-12" id="update_message">
				</div>				
			</div>
		</div>
		
		
			<div class="row">
			<div class="col-md-12">
						<div id="update_message"> </div>
					<table class="table">
					  <thead>
						<tr>
						  <th>#</th>
						  <th>Gateways Name</th>
						  <th>Mode</th>
						  <th>Status</th>
						  <th>Action</th>
						</tr>
					  </thead>
					  <tbody>
						<tr>
						  <td>1</td>
						  <td> <label>
							<input name='payment_gateway' id='payment_gateway'  type="radio" <?php echo (get_option('iv_directories_payment_gateway')=='paypal-express')? 'checked':'' ?> value="paypal-express">
									Paypal
						  </label>
						  </td>
						  <td><?php echo strtoupper($paypal_mode); ?></td>
						  <td><?php echo (get_option('iv_directories_payment_gateway')=='paypal-express')? 'Active':'Inactive' ?> </td>
						   <td><a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-payment-paypal"> Edit Setting</a></td>
						</tr>
						<tr>
						  <td>2</td>
						  <td>
						   <label>
						  <input name='payment_gateway' id='payment_gateway'  type="radio" <?php echo (get_option('iv_directories_payment_gateway')=='stripe')? 'checked':'' ?>  value="stripe">
									Stripe
						  </label> </td>
						  <td><?php echo strtoupper($stripe_mode); ?></td>
						  <td><?php echo (get_option('iv_directories_payment_gateway')=='stripe')? 'Active':'Inactive' ?></td>
						  <td> <a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-payment-stripe"> Edit Setting</a> </td>
						</tr>
						<!--
						<tr>
						  <td>2</td>
						  <td><input name='payment_gateway' id='payment_gateway'  type="radio" <?php echo (get_option('iv_directories_payment_gateway')=='authorize')? 'checked':'' ?>  value="authorize.net">
									Authorize.net
						  </label> </td>
						  <td>Test</td>
						  <td><?php echo (get_option('iv_directories_payment_gateway')=='authorize')? 'Active':'Inactive' ?></td>
						  <td> <a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-payment-authorize"> Edit</a> </td>
						</tr>
						-->
					  </tbody>
					</table>
			
		</div>
				
			
		</div>
		
	</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function () {

		   jQuery("input[type='radio']").click(function(){
				iv_update_email_settings();
		   });

		});
	
function  iv_update_email_settings (){
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		
		var search_params = {
			"action": "iv_directories_gateway_settings_update",
			"payment_gateway": jQuery("input[name=payment_gateway]:checked").val(),	
			
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) { 
				jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						             		
			
			}
		});
}
</script>
