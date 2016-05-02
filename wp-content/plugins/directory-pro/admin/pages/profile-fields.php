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
			<?php
			global $wpdb;
			global $current_user;
			$ii=1;
			
			?>
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">
				
					<div class="row">					
						<div class="col-xs-12" id="submit-button-holder">					
								<div class="pull-right"><button class="btn btn-info btn-lg" onclick="return update_profile_fields();"><?php _e('Update','ivdirectories');?> </button>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12"><h3 class="page-header"><?php _e('Update Profile Setting','ivdirectories');?> <br /><small> &nbsp;</small> </h3>
						</div>
					</div> 
						
						<form id="profile_fields" name="profile_fields" class="form-horizontal" role="form" onsubmit="return false;">
							<div id="success_message">	</div>	
							<div class="panel panel-success">
								<div class="panel-heading"><h4> <?php _e('My Account Menu','ivdirectories');?> </h4></div>
								<div class="panel-body">
										 		
										<div class="row ">
												<div class="col-sm-3 ">										
													<h4><strong><?php _e('Menu Title / Label','ivdirectories');?> </strong> </h4>
												</div>
												<div class="col-sm-7">
													<h4><strong><?php _e('Link','ivdirectories');?> </strong></h4>									
												</div>
												<div class="col-sm-2">
													<h4><strong><?php _e('Action','ivdirectories');?></strong> </h4>
													
												</div>		
																		  
										</div>
												<?php
												$profile_page=get_option('_iv_directories_profile_page'); 	
												$page_link= get_permalink( $profile_page); 
												?>
										<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('Listing Home','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo get_post_type_archive_link( 'directories' ) ; ?>">
													<?php echo get_post_type_archive_link( 'directories' ) ; ?>
												</a>									
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menu_listinghome' ) ) {
														  $account_menu_check= get_option('_iv_directories_menu_listinghome'); 
													 }	 
													
													?>
												  <input type="checkbox" name="listinghome" id="listinghome" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>
										<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('Membership Level','ivdirectories');	 ?> 
											</div>
											<div class="col-sm-7">
												
												<a href="<?php echo $page_link; ?>?&profile=level">
													<?php echo $page_link; ?>?&profile=level
												</a>									
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_mylevel' ) ) {
														  $account_menu_check= get_option('_iv_directories_mylevel'); 
													 }	 
													
													?>
												  <input type="checkbox" name="mylevel" id="mylevel" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										

										<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('Balance + Bidding','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo $page_link; ?>?&profile=balance">
													<?php echo $page_link; ?>?&profile=balance
												</a>									
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menubidding' ) ) {
														  $account_menu_check= get_option('_iv_directories_menubidding'); 
													 }	 
													
													?>
												  <input type="checkbox" name="menubidding" id="menubidding" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										

																				<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('Account Settings','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo $page_link; ?>?&profile=setting">
													<?php echo $page_link; ?>?&profile=setting
												</a>									
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menusetting' ) ) {
														  $account_menu_check= get_option('_iv_directories_menusetting'); 
													 }	 
													 
													?>
												  <input type="checkbox" name="menusetting" id="menusetting" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										
										<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('All Listing','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo $page_link; ?>?&profile=all-post">
													<?php echo $page_link; ?>?&profile=all-post
												</a>										
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menuallpost' ) ) {
														  $account_menu_check= get_option('_iv_directories_menuallpost'); 
													 }	 
													
													?>
												  <input type="checkbox" name="menuallpost" id="menuallpost" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										
											<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('New Listing','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo $page_link; ?>?&profile=new-post">
													<?php echo $page_link; ?>?&profile=new-post
												</a>										
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menunewlisting' ) ) {
														  $account_menu_check= get_option('_iv_directories_menunewlisting'); 
													 }	 
													 
													?>
												  <input type="checkbox" name="menunewlisting" id="menunewlisting" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										
																				<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('My Favorites','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo $page_link; ?>?&profile=favorites">
													<?php echo $page_link; ?>?&profile=favorites
												</a>									
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menufavorites' ) ) {
														  $account_menu_check= get_option('_iv_directories_menufavorites'); 
													 }	 
													 //echo  $t_terms;
													?>
												  <input type="checkbox" name="menufavorites" id="menufavorites" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										
																				<div class="row ">
											<div class="col-sm-3 ">										
												<?php _e('Who is Interested','ivdirectories');?>  
											</div>
											<div class="col-sm-7">
												<a href="<?php echo $page_link; ?>?&profile=who-is-interested">
													<?php echo $page_link; ?>?&profile=who-is-interested
												</a>										
											</div>
											<div class="col-sm-2">
												<div class="checkbox ">
												<label><?php
													 $account_menu_check='';
													 if( get_option( '_iv_directories_menuinterested' ) ) {
														  $account_menu_check= get_option('_iv_directories_menuinterested'); 
													 }	 
													 
													?>
												  <input type="checkbox" name="menuinterested" id="menuinterested" value="yes" <?php echo ($account_menu_check=='yes'? 'checked':'' ); ?> > Hide
												</label>
											  </div>											
											</div>					  
										</div>										

										
										<div id="custom_menu_div">	
											
											<?php
											$old_custom_menu = array();
											if(get_option('iv_directories_profile_menu')){
												$old_custom_menu=get_option('iv_directories_profile_menu' );
											}													
											
											$ii=1;		
											if($old_custom_menu!=''){			
													foreach ( $old_custom_menu as $field_key => $field_value ) {	
														?>
														<div class="row form-group " id="menu_<?php echo $ii; ?>">
																<div class=" col-sm-3"> 
																	<input type="text" class="form-control" name="menu_title[]" id="menu_title[]"  value="<?php echo $field_key; ?>" placeholder="Enter Menu Title "> 
																</div>		
																<div  class=" col-sm-7">
																			<input type="text" class="form-control" name="menu_link[]" id="menu_link[]"  value="<?php echo $field_value; ?>" placeholder="Enter Menu Link">
																</div>
																			<div  class=" col-sm-2">												
																				<button class="btn btn-danger btn-xs" onclick="return iv_remove_menu('<?php echo $ii; ?>');"><?php _e('Delete','ivdirectories');?></button>
																			</div>													
														</div>
													<?php
													 $ii++;
													}
											}else{?>
													<div class="row form-group " id="menu_<?php echo $ii; ?>">
																<div class=" col-sm-3"> 
																	<input type="text" class="form-control" name="menu_title[]" id="menu_title[]"   placeholder="Enter Menu Title "> 
																</div>		
																<div  class=" col-sm-7">
																			<input type="text" class="form-control" name="menu_link[]" id="menu_link[]"  placeholder="Enter Menu Link. Example  http://www.google.com">
																</div>
																			<div  class=" col-sm-2">												
																				<button class="btn btn-danger btn-xs" onclick="return iv_remove_menu('<?php echo $ii; ?>');"><?php _e('Delete','ivdirectories');?></button>
																			</div>													
													</div>
											
											
											<?php
											
												$ii++;
											}
											?>	
										</div>	
							 <div class="col-xs-12">	
								<button class="btn btn-warning btn-xs" onclick="return iv_add_menu();"><?php _e('Add More','ivdirectories');?> </button>
							</div>			
				
				</div>
			</div>				
							
							
					<div class="panel panel-info">
						<div class="panel-heading"><h4><?php _e('User Profile Fields','ivdirectories');?> </h4></div>
						<div class="panel-body">	
							
											
										
										<div class="row ">
												<div class="col-sm-5 ">										
													<h4><?php _e('User Meta Name','ivdirectories');?> </h4>
												</div>
												<div class="col-sm-5">
													<h4><?php _e('Display Label','ivdirectories');?> </h4>									
												</div>
												<div class="col-sm-2">
													<h4><?php _e('Action','ivdirectories');?> </h4>
													
												</div>		
																		  
										</div>						 
									
											<div id="custom_field_div">	
																				
														<?php
														
														$default_fields = array();
															$field_set=get_option('iv_directories_profile_fields' );
														if($field_set!=""){ 
																$default_fields=get_option('iv_directories_profile_fields' );
														}else{
															
															$default_fields['first_name']='First Name';
															$default_fields['last_name']='Last Name';
															$default_fields['phone']='Phone Number';
															$default_fields['mobile']='Mobile Number';
															$default_fields['address']='Address';
															$default_fields['occupation']='Occupation';
															$default_fields['description']='About';
															$default_fields['web_site']='Website Url';
															
														}
														if(sizeof($field_set)<1){
																$default_fields['first_name']='First Name';
																$default_fields['last_name']='Last Name';
																$default_fields['phone']='Phone Number';
																$default_fields['mobile']='Mobile Number';
																$default_fields['address']='Address';
																$default_fields['occupation']='Occupation';
																$default_fields['description']='About';
																$default_fields['web_site']='Website Url';
														 }		
														
														
														$i=1;		
														
														foreach ( $default_fields as $field_key => $field_value ) {												
															
																//echo'<br/>$field_key....'.$field_key.'......$field_values....'.$field_values;
																echo '<div class="row form-group " id="field_'.$i.'"><div class=" col-sm-5"> <input type="text" class="form-control" name="meta_name[]" id="meta_name[]" value="'.$field_key . '" placeholder="Enter User Meta Name "> </div>		
																<div  class=" col-sm-5">
																<input type="text" class="form-control" name="meta_label[]" id="meta_label[]" value="'.$field_value . '" placeholder="Enter User Meta Label">													
																</div>
																<div  class=" col-sm-2">';
																?>
																<button class="btn btn-danger btn-xs" onclick="return iv_remove_field('<?php echo $i; ?>');"><?php _e('Delete','ivdirectories');?> </button>
																																								
																</div>
																
																</div>
															<?php	
															$i++;	
															
														}						
															
														?>
														
													
											</div>				  
									  <div class="col-xs-12">	
											<button class="btn btn-warning btn-xs" onclick="return iv_add_field();"><?php _e('Add More','ivdirectories');?> </button>
									 </div>	
									 
								 </div>		 
							 </div>			 	
							  
						</form>
					
								<div class="row">					
										<div class="col-xs-12">					
												<div align="center">
													<div id="loading"></div>
													<button class="btn btn-info btn-lg" onclick="return update_profile_fields();"><?php _e('Update','ivdirectories');?>  </button>
												</div>
												<p>&nbsp;</p>
											</div>
									</div>
							
			  
					<div class=" col-md-12  bs-callout bs-callout-info">	
						
						
						<h4> <?php _e('Display the user meta on "Public Profile','ivdirectories');?>" </h4>
						
						<p> <?php _e('Open the template file  your-theme/directory-pro/profile-public/profile-template-1.php and put the code on the file. It will display  the  "first_name" user meta value.','ivdirectories');?></p>
						<p> 		&lt;?php echo get_user_meta($user_id, 'first_name', true); ?&gt;</p>
					
					
						<h4> <?php _e('Overriding templates','ivdirectories');?></h4>	
						<p><?php _e('The template files can be found within the /directory-pro/template/ directory: Copy the template folder and paste it on your current theme folder and rename it as "directorypro".','ivdirectories');?>
						</p>
					</div>
			  
			  </div>
						
		</div>		 


<script>
	var i=<?php echo $i; ?>;
	var ii=<?php echo $ii; ?>;
	
	
	function update_profile_fields(){
		
		var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
		var search_params = {
			"action": 		"iv_directories_update_profile_fields",
			"form_data":	jQuery("#profile_fields").serialize(), 	
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
	function iv_add_field(){	
	
	jQuery('#custom_field_div').append('<div class="row form-group " id="field_'+i+'"><div class=" col-sm-5"> <input type="text" class="form-control" name="meta_name[]" id="meta_name[]" value="" placeholder="Enter User Meta Name "> </div>	<div  class=" col-sm-5"><input type="text" class="form-control" name="meta_label[]" id="meta_label[]" value="" placeholder="Enter User Meta Label"></div><div  class=" col-sm-2"><button class="btn btn-danger btn-xs" onclick="return iv_remove_field('+i+');">Delete</button>');
	
		i=i+1;		
	}
	function iv_remove_field(div_id){		
		jQuery("#field_"+div_id).remove();
	}
	
	
	function iv_add_menu(){	
	
	jQuery('#custom_menu_div').append('<div class="row form-group " id="menu_'+ii+'"><div class=" col-sm-3"> <input type="text" class="form-control" name="menu_title[]" id="menu_title[]" value="" placeholder="Enter Menu Title "> </div>	<div  class=" col-sm-7"><input type="text" class="form-control" name="menu_link[]" id="menu_link[]" value="" placeholder="Enter Menu Link.  Example  http://www.google.com"></div><div  class=" col-sm-2"><button class="btn btn-danger btn-xs" onclick="return iv_remove_menu('+ii+');">Delete</button>');
	
		ii=ii+1;		
	}
	function iv_remove_menu(div_id){		
		jQuery("#menu_"+div_id).remove();
	}	
		
		
</script>				
			
