<?php
//wp_enqueue_style('wp-iv_directories-bidding-style-20', wp_iv_directories_URLPATH . 'admin/files/css/bidding.css');
wp_enqueue_style('wp-iv_directories-piblic-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');

$dir_id=0; if(isset($_REQUEST['dir-id'])){$dir_id=$_REQUEST['dir-id'];}	
	
?>
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script> 
<div class="bootstrap-wrapper" style="margin:0 20px">


		<div class=" row">
			<br/>
			<h3><?php _e( 'Message Board', 'ivdirectories' ); ?></h3>	
			
		</div>
		<div class="clearfix"></div>
		<form action="" id="message-pop" name="message-pop"  method="POST" role="form">
		  <div class="form-group">
			<label for="text" class="control-label"><?php _e( 'Subject', 'ivdirectories' ); ?></label>
			<input type="text" class="form-control" id="subject" placeholder="Enter Subject">
		  </div>
		  <div class="form-group">
			<label for="text" class="control-label"><?php _e( 'Enter Message', 'ivdirectories' ); ?></label>
			<textarea name="message-content" id="message-content"  class="form-control" cols="60" rows="4" title="Please Enter Message"  placeholder="Please Enter Message"  ></textarea>
		  </div>
		  <div class="row">
			 <div class="col-md-6">
			 <input type="hidden" name="dir_id" id="dir_id" value="<?php echo $dir_id; ?>">
			  <button type="button" onclick="send_message_iv();" class="btn btn-large btn-primary"><?php _e( 'Submit', 'ivdirectories' ); ?></button>
			  
			 </div> 
			<div class="col-md-1">
			</div>
			 <div class="col-md-5"> <div id="update_message_popup"></div>
			 </div>
		</div>	 
		</form>
			
</div>

<script type="text/javascript">

	
	function send_message_iv(){	
		if (jQuery.trim(jQuery("#message-content").val()) == "") {
                  alert("Please put your message");
        } else {    
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message_popup').html(loader_image); 
				var search_params={
					"action"  : 	"iv_directories_message_send",	
					"form_data":	jQuery("#message-pop").serialize(), 					
				};
				
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){ 
											
						jQuery('#update_message_popup').html(response.msg );
						jQuery("#message-pop").trigger('reset');
						
					}
				});
		}	
	
	}		 	
	
	
	
</script>	





