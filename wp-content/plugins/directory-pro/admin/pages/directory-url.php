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
	

		<h3  class=""><?php _e('Directory URL','ivdirectories');  ?><small></small>	
		</h3>
	
		<br/>
		<div id="update_message"> </div>		 
					
			<form class="form-horizontal" role="form"  name='directory_url' id='directory_url'>											
					<?php
				
					$directory_url=get_option('_iv_directory_url');					
					if($directory_url==""){$directory_url='directories';}	
					
					
				
					?>
					<div class="form-group">
					<label  class="col-md-3 control-label"> <?php _e('Listing URL','ivdirectories');  ?></label>
						<div class="col-md-2">						
							<input type="text" class="form-control" name="dir_url" id="dir_url" value="<?php echo $directory_url;?>" placeholder="Enter string e.g directories">
							
						</div>
						<div class="col-md-2">	
							After update the Custom Post Type you have to "Save" the permalink again.  Otherwise, you will get 404 error.
						</div>	
					</div>
				
					<div class="form-group">
					<label  class="col-md-3 control-label"> </label>
					<div class="col-md-8">
						
						<button type="button" onclick="return  iv_update_dir_cpt_save();" class="btn btn-success">Update</button>
					</div>
				</div>
					
						
			</form>
								

	
<script>

function iv_update_dir_cpt_save(){
var search_params={
		"action"  : 	"iv_update_dir_cpt_save",	
		"form_data":	jQuery("#directory_url").serialize(), 
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
