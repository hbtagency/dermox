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
.html-active .switch-html, .tmce-active .switch-tmce {
	height: 28px!important;
	}
	.wp-switch-editor {
		height: 28px!important;
	}
</style>	
	

		<h3  class=""><?php _e('Bidding Setting','ivdirectories');  ?><small></small>	
		</h3>

	
		
		
		<br/>
		<div id="update_message"> </div>
		 
					
			<form class="form-horizontal" role="form"  name='bidding_settings' id='bidding_settings'>											
					<?php
				
					$radius=get_option('_iv_radius');
					$bid_start_amount=get_option('_bid_start_amount');
																		
					?>
					
					<div class="form-group">
					<label  class="col-md-3 control-label"> <?php _e('Bidding Radius','ivdirectories');  ?></label>
						<div class="col-md-2">						
							<input type="text" class="form-control" name="radius" id="radius" value="<?php echo $radius;?>" placeholder="Enter radius">
							
						</div>
						<div class="col-md-2">	
							Radius will set for the directory bidding to get top on search result.
						</div>	
					</div>
					<div class="form-group">
					<label  class="col-md-3 control-label"> <?php _e('Bidding Start Amount','ivdirectories');  ?></label>
						<div class="col-md-2">						
							<input type="text" class="form-control" name="bid_start_amount" id="bid_start_amount" value="<?php echo $bid_start_amount;?>" placeholder="Enter Start Bid Amount">
							
						</div>
						<div class="col-md-2">	
							The 1st bid will start by this amount.
						</div>	
					</div>
					
				
					<div class="form-group">
					<label  class="col-md-3 control-label"> </label>
					<div class="col-md-8">
						
						<button type="button" onclick="return  iv_update_bidding_setting();" class="btn btn-success">Update</button>
					</div>
				</div>
						
			</form>
								

	
<script>

function iv_update_bidding_setting(){
var search_params={
		"action"  : 	"iv_update_bidding_setting",	
		"form_data":	jQuery("#bidding_settings").serialize(), 
	};
	jQuery.ajax({					
		url : ajaxurl,					 
		dataType : "json",
		type : "post",
		data : search_params,
		success : function(response){
			jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
			
		}
	})

}

	

</script>
