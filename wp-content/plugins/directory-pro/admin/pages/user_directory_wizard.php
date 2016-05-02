<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		
		<div class="row">
			<div class="col-md-12">
				
				<h3 class="page-header" >User Directory <small>  </small> </h3>
				
				
				
			</div>
		</div>
		
		
		<div class="form-group col-md-12 row">
			
			<div class="row ">
				<label for="text" class="col-md-2 control-label">Short Code</label>
				<div class="col-md-4" >
					[iv_directories_user_directory per_page="12"]
				</div>
				
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label">Php Code</label>
				<div class="col-md-10" >
							<p>
										&lt;?php
										echo do_shortcode('[iv_directories_user_directory per_page="12"]');
										?&gt;</p>	
				</div>
			</div>
			<div class="row ">
				<label for="text" class="col-md-2 control-label"> User Directory Page</label>
				<div class="col-md-10" >
					<!--
					 get_option('_iv_directories_registration','73');
					-->
					<?php 
					$form_wizard=get_option('_iv_directories_user_dir_page');
							//echo get_the_title( $form_wizard );  ?>
					<a class="btn btn-info btn-xs " href="<?php echo get_permalink( $form_wizard ); ?>" target="blank">View Page</a>
				
					
				</div>
			</div>
			<div class="col-md-12" id="success_message">
			</div>
			<br/>
			
			<table class="table table-striped">
				<?php
					$opt_style=	get_option('iv_directories_user_directory');
					$filename = get_template_directory()."/wpmembership/";
					$folder_check_theme=get_template_directory()."/wpmembership/user-directory"; 
					
					if (!file_exists($filename)) { 										
						define( 'wp_iv_directories_user_dir', wp_iv_directories_ABSPATH.'template/' );
						
					}else{
						if (!file_exists($folder_check_theme)) {
							
							define( 'wp_iv_directories_user_dir', wp_iv_directories_ABSPATH.'template/' );
						}else{ 
							define( 'wp_iv_directories_user_dir', $filename);
						}	
						
					}	
					
				?>
				<tr>
					<td width ="15%">
							<label >
									<input type="radio" name="option-profile" id="option-profile" value="style-1"  <?php  echo ($opt_style=='style-1' ? 'checked': ''); ?> >
									Style 1 
								</label>
					</td>
					<td>
						<?php include( wp_iv_directories_user_dir. 'user-directory/directory-template-1.php');?>
					</td>	
				</tr>
				
				<tr>
					<td>
							<label >
									<input type="radio" name="option-profile" id="option-profile" value="style-2"  <?php  echo ($opt_style=='style-2' ? 'checked': ''); ?>>
									Style 2 
								</label>
					</td>
					<td>
					<?php include( wp_iv_directories_user_dir. 'user-directory/directory-template-2.php');?>
					</td>	
				</tr>
				
							
				
			</table>	
				
				
			
		</div>
		
			
		
	</div>
</div>
<script type="text/javascript">

	 jQuery(document).ready(function () {

		   jQuery("input[type='radio']").click(function(){
		   		 
				update_user_directory_template(); 
		   });

		});
function update_user_directory_template(){
		
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 			"iv_directories_update_user_directory",
			"profile-st": jQuery("input[name=option-profile]:checked").val(),	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {              		
				//jQuery("#success_message").html('<h4><span style="color: #04B404;"> ' + response.code + '</span></h4>');
				jQuery('#success_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.code +'.</div>');
			}
		});
}
</script>
