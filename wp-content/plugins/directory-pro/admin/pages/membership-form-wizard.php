<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		
		<div class="row">
			<div class="col-md-12">
				
				<h3 class="" >Signup Wizard <small> User Registration & Payment Form </small> </h3>
				
				<div class="col-md-12" id="update_message">
				</div>
				
			</div>
		</div>		
		<div class="panel panel-info">
			<div class="panel-body">		
				
				
						
					<ul class="list-group col-md-6">
							<li class="list-group-item">Short Code : <code>[iv_directories_form_wizard]  </code></li>
							<li class="list-group-item">PHP Code :<code>
										&lt;?php
										echo do_shortcode('[iv_directories_form_wizard]');
										?&gt;</code>  
									</li>
							<li class="list-group-item"> Signup Page : 
								<?php 
										$form_wizard=get_option('_iv_directories_registration');
										  ?>
										<a class="btn btn-info btn-xs " href="<?php echo get_permalink( $form_wizard ); ?>" target="blank">View Page</a>
					

							</li>		
				  </ul>				
				
			
			</div>
		</div>	
		
		<div class="form-group col-md-12 row">			
			
			<br/>
			<?php
					
						
					if(get_option('iv_directories_signup-template')){
						$opt_style=	get_option('iv_directories_signup-template');
						
					}else{
						$opt_style=	'signup-style-1';
					}
				?>
				<div id="update_message"> </div>
			<table class="table table-striped">
				<tr>
					<td width="15%">
							<label >
									<input type="radio" name="option-signup" id="option-signup" value="signup-style-1" class="" <?php  echo ($opt_style=='signup-style-1' ? 'checked': ''); ?>>
									Style 1 
								</label>
					</td>
					<td width="85%">
						<?php include( wp_iv_directories_template.'signup/wizard-style-1.php');?>
					</td>	
				</tr>
				
				<tr>
					<td>
							<label >
									<input type="radio" name="option-signup" id="option-signup" value="signup-style-2"  <?php  echo ($opt_style=='signup-style-2' ? 'checked': ''); ?> >
									Style 2 
								</label>
					</td>
					<td>
						<?php  include( wp_iv_directories_template.'signup/wizard-style-2.php');?>
					</td>	
				</tr>	
				
				
			</table>	
				
				
			
		</div>
		
	</div>
</div>
<script type="text/javascript">
	 jQuery(document).ready(function () {

		   jQuery("input[type='radio']").click(function(){
				update_wizard_template();
		   });

		});
function update_wizard_template(){
	
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 			"iv_directories_update_signup_template",
			"signup-st": jQuery("input[name=option-signup]:checked").val(),	
		};
		jQuery.ajax({
			url: ajaxurl,
			dataType: "json",
			type: "post",
			data: search_params,
			success: function(response) {  
				jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.code +'.</div>');			
				
			}
		});
}
</script>
