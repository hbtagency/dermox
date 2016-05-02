<?php
wp_enqueue_style('wp-iv_directories-bidding-style-20', wp_iv_directories_URLPATH . 'admin/files/css/bidding.css');
wp_enqueue_style('wp-iv_directories-pubblic-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');

	$currencies = array();
	$currencies['AUD'] ='$';$currencies['CAD'] ='$';
	$currencies['EUR'] ='€';$currencies['GBP'] ='£';
	$currencies['JPY'] ='¥';$currencies['USD'] ='$';
	$currencies['NZD'] ='$';$currencies['CHF'] ='Fr';
	$currencies['HKD'] ='$';$currencies['SGD'] ='$';
	$currencies['SEK'] ='kr';$currencies['DKK'] ='kr';
	$currencies['PLN'] ='zł';$currencies['NOK'] ='kr';
	$currencies['HUF'] ='Ft';$currencies['CZK'] ='Kč';
	$currencies['ILS'] ='₪';$currencies['MXN'] ='$';
	$currencies['BRL'] ='R$';$currencies['PHP'] ='₱';
	$currencies['MYR'] ='RM';$currencies['AUD'] ='$';
	$currencies['TWD'] ='NT$';$currencies['THB'] ='฿';	
	$currencies['TRY'] ='TRY';	$currencies['CNY'] ='¥';		
	$currencies['INR'] ='₹';	
	$currencyCode= get_option('_iv_directories_api_currency');
	$currencyCode=(isset($currencies[$currencyCode]) ? $currencies[$currencyCode] :$currencyCode );
?>
<div class="bootstrap-wrapper" style="margin:0 20px">

<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 

<style>
input[type="text"]{
box-shadow: none !important;
}
/* Tables */
table { 
position:relative;
width:100%;
background:#fff;
border:0px !important;
border-bottom:0;
margin-bottom:15px;
border-spacing: 0; 
line-height: 18px; 
margin: 0 0 2px 0; 
text-align: left;
border-collapse: separate !important;
}

table tbody tr td {
padding: 5px 11px;
border:0px !important;
}

table tr:last-child td {
border-bottom: none !important;
}

td.label { 
font-size: 15px; 
text-align: left; 
display: table-cell; 
color: #747474; 
}


th, td { 
font-size:14px;
padding: 0px 0px;
border-top:0px solid rgba(255, 255, 255, 0.6);
border-bottom:0px solid rgba(0, 0, 0, 0.1);
}




</style>

	
<div class="row">
		<br/>
			<?php
			if(isset($message)){?>
				<div class="alert alert-warning"><?php echo $message; ?></div>
			<?php
			}
			$dir_id=0; if(isset($_REQUEST['dir-id'])){$dir_id=$_REQUEST['dir-id'];}		
			$new_amount=0; if(isset($_REQUEST['new-amount'])){$new_amount=$_REQUEST['new-amount'];}	
			$area_count=0; if(isset($_REQUEST['area_count'])){$area_count=$_REQUEST['area_count'];}	
			$category_range=0; if(isset($_REQUEST['category_range'])){$category_range=$_REQUEST['category_range'];}	
			
			$top_bump_amount=$new_amount;	
			$radius=get_option('_iv_radius');
			if($radius==''){$radius='50';}
			
			$dir_search_redius=get_option('_dir_search_redius');	
			if($dir_search_redius==""){$dir_search_redius='Km';}		
			?>			
			<form name="biddingpop" class="form-horizontal"  id="biddingpop" role="form"  method="post" >			
					<!--
					<div class="row" >
						<div class="col-sm-6" >
							<span style="color:#f99b07"><strong><?php echo get_the_title( $dir_id );  ?></strong></span>
						</div>	
						<div class="col-sm-6" >
							<strong><?php //echo $room_data->area; ?>  <?php echo get_post_meta($dir_id ,'address',true); ?> </strong>
						</div>	
					
					</div>
					-->
					
					<table width="100%" border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td width="60%"><span style="color:#f99b07"><strong><?php echo get_the_title( $dir_id );  ?></strong></span></td>
					<td width="40%" align="right"><strong><?php //echo $room_data->area; ?>  <?php echo get_post_meta($dir_id ,'address',true); ?> </strong></td>
				  </tr>
				  
				  
				  <tr>
					<td><span style="color:#6ba9da"><strong></strong></span></td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td colspan="2" align="center" valign="middle" bgcolor="#eee" style="padding:15px"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
					  <tr>
							<td><strong><?php _e('Your Bid Amount','ivdirectories'); ?> </strong></td>
						<td align="center" valign="middle">
							<table width="60%" border="0" cellspacing="0" cellpadding="0" style="background:white">
							  <tr height="20px">
								<td   align="center" valign="middle">
									<span style="font-size:22px; font-weight:bold"><?php echo $currencyCode; ?></span>
										<span style="font-size:14px; font-weight:bold">										
											<input type="text" name="bump_amount"  placeholder="" onkeyup="change_amount()" id="bump_amount" value="<?php echo $top_bump_amount; ?>" data-validation="number" data-validation-error-msg="<?php _e('Please enter a amount','ivdirectories')?>">
										</span>
									</td>
								<td width="20px">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:white">
										<tr> 
											<td>
												<a href="javascript:;" onclick="add_amount();return false;" ><img style="margin-top:-15px" src="<?php echo wp_iv_directories_URLPATH."/assets"; ?>/images/plus.png" border="0" /></a>
											</td>
										 </tr>
										<tr> 
											<td>
												<a href="javascript:;" onclick="less_amount();return false;"><img src="<?php echo wp_iv_directories_URLPATH."/assets"; ?>/images/minus.png" border="0" /></a> 
											</td>
										 </tr>
									</table>	
								</td>
								
							  </tr>
							 
							</table>
						</td>
							<td width="5px">&nbsp;</td>
							<td >
								<!--
								<input name="confirm"  id="confirm" type="button" onclick="update_bidding_amount();" value="Confirm" style="background:#0061aa; font-size:16px; color:white; font-weight:bold; padding:5px 10px; display:block; border:1px solid #039; -webkit-border-radius: 5px;
				-moz-border-radius: 5px;border-radius: 5px;" />
							-->
							<input name="confirm" class="btn  btn-lg" id="confirm" type="button" onclick="update_bidding_amount();" value="Confirm" style=" background:#0061aa;font-size:16px; color:white; font-weight:bold; padding:5px 10px;   border:1px solid #039; "  />
							
							</td>
						</tr>
					  <tr>
						<td>&nbsp;</td>
						<td><span style="font-size:11px"><?php _e('Change bid amount to see the changes in projected rank','ivdirectories'); ?></span></td>
						<td>&nbsp;</td>
						</tr>
					</table></td>
					</tr>
				  <tr>
				    <tr> <td >&nbsp; </td>
					</tr>
					<td ><table width="90%" border="0" cellspacing="0" cellpadding="0">
						<tr>
						  <td width="42%"><strong><?php _e('Projected Rank:','ivdirectories'); ?></strong><br />
							<?php _e('when this bid goes live','ivdirectories'); ?>
							<div id="update_message"></div>
							
							</td>
						  
						  <td width="30%" align="center">
						  <span class="badge-up2">
						  <img style="width:10px" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/arrowUp.png";?>" /><span id="area_count"><?php echo $area_count; ?></span></span><br />
							<?php _e('By Locality '.$radius.' '.$dir_search_redius.' Radius','ivdirectories'); ?></td>
						</tr>
					  </table>
					  </td>
					<td><span style="font-size:11px"><?php _e(' What does the Projected Rank mean?
					  This means that once the bid takes affect (goes live)
					  we estimate that your listing will acheive this rank.
					  The top spot will go to the highest bidder.','ivdirectories') ?></span> </td>
				  </tr>
				</table>
				<input type="hidden" name="dir_id" id="dir_id" value="<?php echo $dir_id;?>" >
		</form>

 </div>
	
</div>
<?php

$user_past_bid=$top_bump_amount;

?>
<script type="text/javascript">
	
function update_bidding_amount(){
	
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img style="width:80px" src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message').html(loader_image); 
				
				var amount=jQuery("#bump_amount").val();
				if(amount>0){
					var search_params={
						"action"  : 	"iv_directories_save_bidding",	
						"form_data":	jQuery("#biddingpop").serialize(), 
					};
					
					jQuery.ajax({					
						url : ajaxurl,					 
						dataType : "json",
						type : "post",
						data : search_params,
						success : function(response){
							if(response.msg =='lowBalance'){
									jQuery('#update_message').html('<span style="color:red; font-weight: bold;"><?php _e('Low Balance: Please Add More Balance to Bid.','ivdirectories'); ?></span>');
							}
							if(response.msg =='success'){
								window.parent.populate_bump(); 
							}	
							
							
						}
					});
				}else{
					jQuery("#bump_amount").val(<?php echo $top_bump_amount; ?>);
					alert('Pleaee enter amount');
					jQuery('#update_message').html('');
				}	
	
	}		  
		
	
	function add_amount(){
		
		var amount= jQuery('#bump_amount').val();
		
		amount=parseFloat(amount)+0.01;
		//amount=	round(amount,12);
		amount=amount.toFixed(2);
		
		jQuery('#bump_amount').val(amount);
		check_position(amount);		
		
	}
	function change_amount(){
		 var amount= jQuery('#bump_amount').val();			
			jQuery('#bump_amount').val(amount);
			amount=amount.toFixed(2);
			check_position(amount);
	 
	}
	function less_amount(){
		var past_bid='<?php echo $user_past_bid; ?>';
		var amount= jQuery('#bump_amount').val();
		
		amount=parseFloat(amount)-0.01;
		amount=amount.toFixed(2);
		if(amount <= past_bid){
				amount=past_bid +0.01;
				amount=amount.toFixed(2);
		}
		jQuery('#bump_amount').val(amount);
		check_position(amount);
	}
	
	
	function check_position(amount){	

			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message').html(loader_image); 
				var search_params={
					"action"  : 	"iv_directories_bidding_position",	
					"form_data":	jQuery("#biddingpop").serialize(), 					
				};
				
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){ 
						jQuery('#update_message').html('');						
						jQuery("#area_count").text(response.area_count);
						
					}
				});
	
	}		 	
	
	
	
</script>	





