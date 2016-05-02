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
	

		<h3  class=""><?php _e('Pages Restriction By Roles','ivdirectories'); ?>  <small></small>	
		</h3>

	
		
		
		<br/>
		<div id="update_message"> </div>	
			<form class="form-horizontal" role="form"  name='protected_page_settings' id='protected_page_settings'>											
				<?php
				
					$store_array=get_option('_iv_visibility_serialize_page_role');					
																
						$active_module=get_option('_iv_directories_active_visibility_page'); 
						$active_check_y=''; $active_check_n='';
						if($active_module=='yes' )
						{	$active_check_n='';
							$active_check_y=' checked';												
						}else{ 
							$active_check_y='';
							$active_check_n=' checked';											
						}											
					?>
					 <div class="row">
						<label  class="col-md-3  pull-left"> <?php _e('Page Visibility Module :','ivdirectories'); ?> </label>
						<div class="col-md-3">
							<label>												
							<input type="radio" name="active_visibility_page" id="active_visibility_page" value='yes' <?php echo $active_check_y; ?> > <?php _e('Show Page By Role Access','ivdirectories'); ?>
							</label>	
						</div>
						<div class="col-md-3">	
							<label>											
							<input type="radio"  name="active_visibility_page" id="active_visibility_page" value='no' <?php echo $active_check_n; ?> ><?php _e('Show All','ivdirectories'); ?> 
							</label>
						</div>												
					 </div>
					
					<div class=" col-md-12  bs-callout bs-callout-info">							
						<?php _e('Select which pages are available for each user role.	','ivdirectories'); ?>										
					</div>
						
					<div class="row ">
						<div class="col-md-12 ">
						<table class="table table-bordered table-hover table-responsive">												  
						  <thead>
							<tr>
							  <th></th>
							  <?php
							  global $wp_roles;
							  //$roles = $wp_roles->get_names();
							  //foreach($roles as $role) {
							 foreach ( $wp_roles->roles as $key=>$value ){
								  //echo '<th>'.$key.'</th>';
								  if($value['name']!='Administrator'){
										echo '<th style="text-align: center;">'.$value['name'].'</th>'; 
									}
								}
								  echo '<th style="text-align: center;">Visitor</th>'; 
							  ?>
							</tr>
						  </thead>
						   <tfoot>
							<tr>
							  <th> <?php _e('Check/Uncheck','ivdirectories'); ?> </th>
							  <?php
							  global $wp_roles;
							  //$roles = $wp_roles->get_names();
							  //foreach($roles as $role) {
							 foreach ( $wp_roles->roles as $key=>$value ){
								  //echo '<th>'.$key.'</th>';  
								  if($value['name']!='Administrator'){
										echo '<td style="text-align: center;"><input onclick="return protect_page_select_all(\''.$key.'\');" type="checkbox" name="'.$key.'_all2" id="'.$key.'_all2" value="'.$key.'" class="'.$key.'-page"></td>'; 
									}
							}
								  echo '<td style="text-align: center;"><input type="checkbox"  onclick="return protect_page_select_all(\'visitor\');" name="visitor_all2" id="visitor_all2" value="visitor"  class="visitor"></td>'; 
							  ?>
							</tr>
						  </tfoot>
						  <tbody>
							 <?php 
							$args = array(
									'child_of'     => 0,
									'sort_order'   => 'ASC',
									'sort_column'  => 'post_title',
									'hierarchical' => 1,															
									'post_type' => 'page'
									);		
							 if ( $pages = get_pages( $args ) ){
								
								
								 foreach ( $pages as $page ) {
										echo'<tr>';
										echo ' <th scope="row">'.$page->post_title .'</th> ';
										foreach ( $wp_roles->roles as $key=>$value ){
										  //echo '<th>'.$key.'</th>';
										   if($key!='administrator'){
												  if(isset($store_array[$key]))
													{	if(in_array($page->post_name  , $store_array[$key])){
															echo '<td style="text-align: center;"><input type="checkbox" name="'.$key.'[]" id="'.$key.'[]"  class="'.$key.'2"  value="'.$page->post_name .'" checked></td>'; 
														}else{
															echo '<td style="text-align: center;"><input type="checkbox" name="'.$key.'[]" id="'.$key.'[]"  class="'.$key.'2"  value="'.$page->post_name .'"></td>'; 
														}
														//print_r($store_array['Silver']);
													}else{ 
														echo '<td style="text-align: center;"><input type="checkbox" name="'.$key.'[]" id="'.$key.'[]"  class="'.$key.'2"  value="'.$page->post_name .'"></td>'; 
													
													}
										  
											}
										  
										}
									if(isset($store_array['visitor'])){	
										if(in_array($page->post_name   , $store_array['visitor'])){
												echo '<td style="text-align: center;"><input type="checkbox" name="visitor[]" id="visitor[]" class="visitor2"  value="'.$page->post_name .'" checked ></td>';
										}else{
											echo '<td style="text-align: center;"><input type="checkbox" name="visitor[]" id="visitor[]" class="visitor2"  value="'.$page->post_name .'"></td>';
										}
									}else{
											echo '<td style="text-align: center;"><input type="checkbox" name="visitor[]" id="visitor[]" class="visitor2"  value="'.$page->post_name .'"></td>';
									
									}		
										echo'</tr>';
								
								}
							}
							 ?> 													
						  </tbody>
						</table>
						</div>			
					</div>	
					
					<div class="form-group">
					<label  class="col-md-3 control-label"> </label>
					<div class="col-md-8">
						
						<button type="button" onclick="return  iv_update_protected_settings_page();" class="btn btn-success"><?php _e('Update','ivdirectories'); ?></button>
					</div>
				</div>
						
			</form>
								

	
<script>

function iv_update_protected_settings_page(){
var search_params={
		"action"  : 	"iv_update_protected_page_setting",	
		"form_data":	jQuery("#protected_page_settings").serialize(), 
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
function protect_page_select_all(sel_name) {
	  
	   
	   if(jQuery("#"+sel_name+"_all2").prop("checked") == true){			
			jQuery("."+sel_name+"2").prop("checked",jQuery("#"+sel_name+"_all2").prop("checked"));
            
		}else{			
			jQuery("."+sel_name+"2").prop("checked", false);
		}
			
	  
   
    
}
	

</script>
