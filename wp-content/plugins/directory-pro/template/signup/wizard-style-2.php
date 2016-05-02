<?php
global $wpdb;

wp_enqueue_style('wp-iv_directories-style-signup-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-script-signup-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_script('iv_directories-script-signup-2-15', wp_iv_directories_URLPATH . 'admin/files/js/jquery.form-validator.js');



$api_currency= 'USD';
if( get_option('_iv_directories_api_currency' )!=FALSE ) {
	$api_currency= get_option('_iv_directories_api_currency' );
}	
if(isset($_REQUEST['payment_gateway'])){
	
		$payment_gateway=$_REQUEST['payment_gateway'];
		if($payment_gateway=='paypal'){
			//require_once(wp_iv_directories_DIR . '/admin/pages/payment-inc/paypal-submit.php');
							
		}
}
$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'  and post_status='draft' ";
$membership_pack = $wpdb->get_results($sql);
$total_package=count($membership_pack);
$package_id= 0;
		$iv_gateway='paypal-express';
		if( get_option( 'iv_directories_payment_gateway' )!=FALSE ) {
			$iv_gateway = get_option('iv_directories_payment_gateway');	
				   if($iv_gateway=='paypal-express'){
						$post_name='iv_directories_paypal_setting';						
						$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
						$paypal_id='0';
						if(sizeof($row )>0){
							$paypal_id= $row->ID;
						}
						$api_currency=get_post_meta($paypal_id, 'iv_directories_paypal_api_currency', true);	
					}				 
		}
		$package_id=''; 
		if(isset($_REQUEST['package_id'])){
			$package_id=$_REQUEST['package_id'];
			
			$recurring= get_post_meta($package_id, 'iv_directories_package_recurring', true);	
			if($recurring == 'on'){
				$package_amount=get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true);
			}else{
				$package_amount=get_post_meta($package_id, 'iv_directories_package_cost',true);
			}
		
			if($package_amount=='' || $package_amount=='0' ){$iv_gateway='paypal-express';}
																					
		}
	
		$form_meta_data= get_post_meta( $package_id,'iv_directories_content',true);			
		$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE id = '".$package_id."' ");
		$package_name='';
		$package_amount='';
		if(sizeof($row)>0){
			$package_name=$row->post_title;
			$count =get_post_meta($package_id, 'iv_directories_package_recurring_cycle_count', true);
			
			
			$package_name=$package_name;
																
			$package_amount=get_post_meta($package_id, 'iv_directories_package_cost',true);
		}
		
	$newpost_id='';
	$post_name='iv_directories_stripe_setting';
	$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
				if(sizeof($row )>0){
				  $newpost_id= $row->ID;
				}
	$stripe_mode=get_post_meta( $newpost_id,'iv_directories_stripe_mode',true);	
	if($stripe_mode=='test'){
		$stripe_publishable =get_post_meta($newpost_id, 'iv_directories_stripe_publishable_test',true);	
	}else{
		$stripe_publishable =get_post_meta($newpost_id, 'iv_directories_stripe_live_publishable_key',true);	
	}
				 
if($total_package<1){$iv_gateway='paypal-express';}
								
?>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 

  <style>
  /* Styles that are also copied for Preview */	
	.vcenter{				
		display : table-cell;
		vertical-align : middle !important;				
		float:none;
	}
	.chili{color:red}
	.chili:before{content:" *"}
  
  #iv-form3 h2{
    font-family: 'Oswald', sans-serif;
    font-weight: 400;
    font-size: 32px;
    line-height: 45px;
    margin-top: 0;
    
  }
  #iv-form3 h1 span{
    font-weight: 100;
    
  }
  .dark-txt{color:#333}
  #iv-form3 h1{
    font-family: 'Oswald', sans-serif;
    font-weight: 400;
    font-size: 45px;
    line-height: 45px;
    color: #fff;
    border: none;
    text-transform: uppercase;
    line-height: 50px;
    padding-bottom: 0;
    font-size: 45px;
  }

  #iv-form3 h3 {
  font-family: Oswald;
  
  font-weight: normal;
  font-style: normal;
  line-height:normal
 
  }
  #iv-form3 p{
    font-size: 1em;
    font-family: 'Roboto', sans-serif;
    color: #575757;
    font-weight: 400;
    line-height: 22px;
  }
  #iv-form3 label{ font-weight:normal;font-size:15px; color:#666}
   #iv-form3 .header-profile div{
	border-bottom: 4px solid #09C; display:inline-block; margin-bottom:-4px   
	}
	#iv-form3 .form-control{ color:#222}
	#iv-form3 .header-profile{ border-bottom:4px solid #eee;}
	#iv-form3{ max-width:960px}
 </style> 


<div class="bootstrap-wrapper">

	<div id="iv-form3" class="col-md-12">
	<?php
		if($iv_gateway=='paypal-express'){	
		 ?>
	
			<form id="iv_directories_registration" name="iv_directories_registration" class="form-horizontal" action="<?php  the_permalink() ?>?package_id=<?php echo $package_id; ?>&payment_gateway=paypal&iv-submit-listing=register" method="post" role="form">
	
	<?php	
	}
	if($iv_gateway=='stripe'){?>
			<form id="iv_directories_registration" name="iv_directories_registration" class="form-horizontal" action="<?php  the_permalink() ?>?&package_id=<?php echo $package_id; ?>&payment_gateway=stripe&iv-submit-stripe=register" method="post" role="form">
			
			<input type="hidden" name="payment_gateway" id="payment_gateway" value="stripe">	
			<input type="hidden" name="iv-submit-stripe" id="iv-submit-stripe" value="register">	
	<?php	
	}
	?>	
		
				<div class="row">	
					  <div class="col-md-1">
					  </div>
				   
					  <div class="col-md-10"> 
						<h2 class="header-profile"><div><?php  _e('User Info','ivdirectories');?></div></h2>
					  </div>
			 </div>
		
			<div class="row">	
				  <div class="col-md-1 ">
				  </div>
           
              <div class="col-md-10 "> 
					<?php
						 if(isset($_REQUEST['message-error'])){?>
						  <div class="row alert alert-info alert-dismissable" id='loading-2'><a class="panel-close close" data-dismiss="alert">x</a> <?php  echo $_REQUEST['message-error']; ?></div>
						  <?php
						  }
					?>
							
	<!--  
		For Form Validation we used plugins http://formvalidator.net/index.html#reg-form  
		This is in line validation so you can add fields easily. 	
	-->

				
				<div>
						<div id="selected-column-1" class=" ">
						<div class="text-center" id="loading"> </div>
						<div class="form-group row"  >									
						<label for="text" class="col-md-4 control-label"><?php  _e('User Name','ivdirectories');?><span class="chili"></span></label>
						<div class="col-md-8">
							<input type="text"  name="iv_member_user_name"  data-validation="length alphanumeric" 
data-validation-length="4-12" data-validation-error-msg="<?php  _e(' The user name has to be an alphanumeric value between 4-12 characters','ivdirectories');?>" class="form-control ctrl-textbox" placeholder="Enter User Name"  alt="required">

						</div>
					</div>
					<div class="form-group row">									
						<label for="email" class="col-md-4 control-label" ><?php  _e('Email Address','ivdirectories');?><span class="chili"></span></label>
						<div class="col-md-8">
							<input type="email" name="iv_member_email" data-validation="email"  class="form-control ctrl-textbox" placeholder="Enter email address" data-validation-error-msg="<?php  _e('Please enter a valid email address','ivdirectories');?> " >
						</div>
					</div>
					<div class="form-group row ">									
						<label for="text" class="col-md-4 control-label"><?php  _e('Password','ivdirectories');?><span class="chili"></span></label>
						<div class="col-md-8">
							<input type="password" name="iv_member_password"  class="form-control ctrl-textbox" placeholder="" data-validation="strength" 
		 data-validation-strength="2">
						</div>
					</div>
					
					
					</div>							
					</div>	
						
																	
					<input type="hidden" name="hidden_form_name" id="hidden_form_name" value="iv_directories_registration">
						

              </div>
         </div>
		
		 <br/>
		 <?php
		 if($total_package>0){
		 ?>
		<div class="row">	
              <div class="col-md-1 ">
              </div>
           
              <div class="col-md-10 "> 
				<h2 class="header-profile"><div><?php  _e('Payment Info','ivdirectories');?></div></h2>
              </div>
         </div>
			
		<?php
		}
		?>
				<div class="row">	
					  <div class="col-md-1 ">
					  </div>
           
					<div class="col-md-10 ">
						<?php 														
						if($iv_gateway=='paypal-express'){
							require_once(wp_iv_directories_template.'signup/paypal_form_2.php');
						}
						
						if($iv_gateway=='stripe'){
							require_once(wp_iv_directories_template.'signup/iv_stripe_form_2.php');					
						}										
						?>			
				</div>		
			</div>	
		</form>
		<div style="display: none;">
			<img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>' />
		</div>
	</div>
</div>


<script type="text/javascript">
var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';		
(function($) {
	
	var active_payment_gateway='<?php echo $iv_gateway; ?>'; 
	
	jQuery(document).ready(function($) {
			
						jQuery.validate({
							form : '#iv_directories_registration',
							modules : 'security',		
												
							onSuccess : function() {
							
							  	jQuery("#loading-3").show();
								jQuery("#loading").html(loader_image);
								
								if(active_payment_gateway=='stripe'){
									
										 Stripe.createToken({
											number: jQuery('#card_number').val(),
											cvc: jQuery('#card_cvc').val(),
											exp_month: jQuery('#card_month').val(),
											exp_year: jQuery('#card_year').val(),
											//name: $('.card-holder-name').val(),
											//address_line1: $('.address').val(),
											//address_city: $('.city').val(),
											//address_zip: $('.zip').val(),
											//address_state: $('.state').val(),
											//address_country: $('.country').val()
										}, stripeResponseHandler);
									
									return false;
									
								}else{ // Else for paypal
									
									return true; // false Will stop the submission of the form
								}
								
							},
							
					  })
 
	 })
	 
	 
	 // this identifies your website in the createToken call below
	 if(active_payment_gateway=='stripe'){
		Stripe.setPublishableKey('<?php echo  $stripe_publishable; ?>');

			function stripeResponseHandler(status, response) {
				if (response.error) {				
					jQuery("#payment-errors").html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.error.message +'.</div> ');
				
				} else {
					var form$ = jQuery("#iv_directories_registration");
					// token contains id, last4, and card type
					var token = response['id'];
					// insert the token into the form so it gets submitted to the server
					form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
					// and submit
					form$.get(0).submit();
				}
			}
	}
	 
	 
})(jQuery);
		
    

												

									
		
jQuery(document).ready(function() {
    jQuery('#coupon_name').on('keyup change', function() {
				
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params={
			"action"  			: "iv_directories_check_coupon",	
			"coupon_code" 		:jQuery("#coupon_name").val(),
			"package_id" 		:jQuery("#package_id").val(),
			"package_amount" 	:'<?php echo $package_amount; ?>',
			"api_currency" 		:'<?php echo $api_currency; ?>',
			
		};
		jQuery('#coupon-result').html('<img src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/old-loader.gif">');
		jQuery.ajax({					
			url : ajaxurl,					 
			dataType : "json",
			type : "post",
			data : search_params,
			success : function(response){
				if(response.code=='success'){							
					jQuery('#coupon-result').html('<img src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/right_icon.png">');							
					
				}else{
					jQuery('#coupon-result').html('<img src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/wrong_16x16.png">');
				}
				
				jQuery('#total').html('<label class="control-label">'+response.gtotal +'</label>');
				jQuery('#discount').html('<label class="control-label">'+response.dis_amount +'</label>');
			}
		});
	});
});

jQuery(function(){	
	jQuery('#package_sel').on('change', function (e) {
		var optionSelected = jQuery("option:selected", this);
		var pack_id = this.value;
		
		jQuery("#package_id").val(pack_id);
								
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params={
		"action"  			: "iv_directories_check_package_amount",	
		"coupon_code" 		:jQuery("#coupon_name").val(),
		"package_id" 		: pack_id,
		"package_amount" 	:'<?php echo $package_amount; ?>',
		"api_currency" 		:'<?php echo $api_currency; ?>',
		};
		jQuery.ajax({					
			url : ajaxurl,					 
			dataType : "json",
			type : "post",
			data : search_params,
			success : function(response){
				if(response.code=='success'){							
					jQuery('#coupon-result').html('<img src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/right_icon.png">');
				}else{
						jQuery('#coupon-result').html('<img src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/wrong_16x16.png">');
				}
				jQuery('#p_amount').html(response.p_amount);							
				jQuery('#total').html(response.gtotal);
				jQuery('#discount').html(response.dis_amount);
			}
			});
		});	
	});	
	

function show_coupon(){
				jQuery("#coupon-div").show();
                 jQuery("#show_hide_div").html('<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"></label><div class="col-md-8 col-xs-8 col-sm-8 " ><button type="button" onclick="hide_coupon();"  class="btn btn-default center"><?php  _e('Hide Coupon','ivdirectories');?></button></div>');
}
function hide_coupon(){
				 jQuery("#coupon-div").hide();
                 jQuery("#show_hide_div").html('<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"></label><div class="col-md-8 col-xs-8 col-sm-8 " ><button type="button" onclick="show_coupon();"  class="btn btn-default center"><?php  _e('Have a coupon?','ivdirectories');?></button></div>');
}
 
 </script>
 								

