          <div class="profile-content">
            
              <div class="portlet row light">
                  <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject"><?php  _e('Profile','ivdirectories');?> </span>
                    </div>
                    <ul class="nav nav-tabs">
                      <li class="active">
                        <a href="#tab_1_1" data-toggle="tab"><?php  _e('Personal Info','ivdirectories');?> </a>
                      </li>
                      <li>
                        <a href="#tab_1_3" data-toggle="tab"><?php  _e('Change Password','ivdirectories');?> </a>
                      </li>
                      <li>
                        <a href="#tab_1_5" data-toggle="tab"><?php  _e('Social','ivdirectories');?> </a>
                      </li>
					  <li>
                        <a href="#tab_1_4" data-toggle="tab"><?php  _e('Privacy Settings','ivdirectories');?> </a>
                      </li>
                    </ul>
                  </div>
                  
                  <div class="portlet-body">
                    <div class="tab-content">
                    
                      <div class="tab-pane active" id="tab_1_1">
                        <form role="form" name="profile_setting_form" id="profile_setting_form" action="#">
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
							foreach ( $default_fields as $field_key => $field_value ) { ?>	
									 <div class="form-group">
										<label class="control-label"><?php echo _e($field_value, 'wp_iv_directories'); ?></label>
										<input type="text" placeholder="<?php echo 'Enter '.$field_value;?>" name="<?php echo $field_key;?>" id="<?php echo $field_key;?>"  class="form-control" value="<?php echo get_user_meta($current_user->ID,$field_key,true); ?>"/>
									  </div>
							
							<?php
							}
							?>		
                         <!--
                          <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" placeholder="John" name="first_name" id="first_name"  class="form-control" value="<?php echo get_user_meta($current_user->ID,'first_name',true); ?>"/>
                          </div>
                          
                          
                          <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" placeholder="Doe"  name="last_name" id="last_name" class="form-control"  value="<?php echo get_user_meta($current_user->ID,'last_name',true); ?>" />
                          </div>
                          <div class="form-group">
                            <label class="control-label">Phone Number</label>
                            <input type="text" placeholder="+1 646 580 232" name="phone" id="phone" class="form-control"  value="<?php echo get_user_meta($current_user->ID,'phone',true); ?>"/>
                          </div>
						  <div class="form-group">
                            <label class="control-label">Mobile Number</label>
                            <input type="text" placeholder="+1 646 580 DEMO (6284)" name="mobile" id="mobile"class="form-control"  value="<?php echo get_user_meta($current_user->ID,'mobile',true); ?>"/>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Address</label>
                            <input type="text" placeholder="" name="address" id="address" value="<?php echo get_user_meta($current_user->ID,'address',true); ?>" class="form-control"/>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Occupation</label>
                            <input type="text" placeholder="Web Developer" class="form-control"  name="occupation" id="occupation" value="<?php echo get_user_meta($current_user->ID,'occupation',true); ?>" />
                          </div>
                          <div class="form-group">
                            <label class="control-label">About</label>
                            <textarea class="form-control" name="about" id="about" rows="3" placeholder="About!!!"  ><?php echo get_user_meta($current_user->ID,'description',true); ?></textarea>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Website Url</label>
                            <input type="text"id="web_site" name="web_site" placeholder="www.mywebsite.com" class="form-control" value ="<?php echo get_user_meta($current_user->ID,'web_site',true);?>"/>
                          </div>
                          -->
                          <div class="margiv-top-10">
						    <div class="" id="update_message"></div>
						    <button type="button" onclick="update_profile_setting();"  class="btn green-haze"><?php  _e('Save Changes','ivdirectories');?></button>
                          
                          </div>
                        </form>
                      </div>
                      
					  <div class="tab-pane" id="tab_1_3">
                        <form action="" name="pass_word" id="pass_word">
                          <div class="form-group">
                            <label class="control-label"><?php  _e('Current Password','ivdirectories');?> </label>
                            <input type="password" id="c_pass" name="c_pass" class="form-control"/>
                          </div>
                          <div class="form-group">
                            <label class="control-label"><?php  _e('New Password','ivdirectories');?> </label>
                            <input type="password" id="n_pass" name="n_pass" class="form-control"/>
                          </div>
                          <div class="form-group">
                            <label class="control-label"><?php  _e('Re-type New Password','ivdirectories');?> </label>
                            <input type="password" id="r_pass" name="r_pass" class="form-control"/>
                          </div>
                          <div class="margin-top-10">
                            <div class="" id="update_message_pass"></div>
							 <button type="button" onclick="iv_update_password();"  class="btn green-haze"><?php  _e('Change Password','ivdirectories');?> </button>
                           `
                          </div>
                        </form>
                      </div>
					  
					  <div class="tab-pane" id="tab_1_5">
                        <form action="#" name="setting_fb" id="setting_fb">
                          <div class="form-group">
                            <label class="control-label">FaceBook</label>
                            <input type="text" name="facebook" id="facebook" value="<?php echo get_user_meta($current_user->ID,'facebook',true); ?>" class="form-control"/>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Linkedin</label>
                            <input type="text" name="linkedin" id="linkedin" value="<?php echo get_user_meta($current_user->ID,'linkedin',true); ?>" class="form-control"/>
                          </div>
                          <div class="form-group">
                            <label class="control-label">Twitter</label>
                            <input type="text" name="twitter" id="twitter" value="<?php echo get_user_meta($current_user->ID,'twitter',true); ?>" class="form-control"/>
                          </div>
						  <div class="form-group">
                            <label class="control-label">Google+ </label>
                            <input type="text" name="gplus" id="gplus" value="<?php echo get_user_meta($current_user->ID,'gplus',true); ?>"  class="form-control"/>
                          </div>
						  
						  
                          <div class="margin-top-10">
						     <div class="" id="update_message_fb"></div>
                            <button type="button" onclick="iv_update_fb();"  class="btn green-haze"><?php  _e('Save Changes','ivdirectories');?> </button>
                           `
                          </div>
                        </form>
                      </div>
                      <div class="tab-pane" id="tab_1_4">
                        <form action="#" name="setting_hide_form" id="setting_hide_form">
                        <div class="table-responsive">
                          <table class="table table-light table-hover">
                       
                          <tr>
                            <td style="font-size:14px">
                              <?php  _e('Hide Email Address ','ivdirectories');?> 
                            </td>
                            <td>
                              <label class="uniform-inline">
                              <input type="checkbox" id="email_hide" name="email_hide"  value="yes" <?php echo( get_user_meta($current_user->ID,'hide_email',true)=='yes'? 'checked':''); ?>/> <?php  _e('Yes','ivdirectories');?>  </label>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size:14px">
                               <?php  _e('Hide Phone Number','ivdirectories');?> 
                            </td>
                            <td>
                              <label class="uniform-inline">
                              <input type="checkbox" id="phone_hide" name="phone_hide" value="yes" <?php echo( get_user_meta($current_user->ID,'hide_phone',true)=='yes'? 'checked':''); ?>  /> <?php  _e('Yes','ivdirectories');?>  </label>
                            </td>
                          </tr>
                          <tr>
                            <td style="font-size:14px">
                              <?php  _e('Hide Mobile Number','ivdirectories');?> 
                            </td>
                            <td>
                              <label class="uniform-inline">
                              <input type="checkbox" id="mobile_hide" name="mobile_hide" value="yes"  <?php echo( get_user_meta($current_user->ID,'hide_mobile',true)=='yes'? 'checked':''); ?> /> <?php  _e('Yes','ivdirectories');?>  </label>
                            </td>
                          </tr>
                          </table>
                          </div>
                          <!--end profile-settings-->
                          <div class="margin-top-10">
						  <div class="" id="update_message_hide"></div>
						   <button type="button" onclick="iv_update_hide_setting();"  class="btn green-haze"><?php  _e('Save Changes','ivdirectories');?> </button>
                          
                           
                          </div>
                        </form>
                      </div>
                    
                  </div>
                </div>
              </div>
            </div>
          <!-- END PROFILE CONTENT -->
 <script>
 
function iv_update_hide_setting (){
	
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message_hide').html(loader_image);
				var search_params={
					"action"  : 	"iv_directories_update_setting_hide",	
					"form_data":	jQuery("#setting_hide_form").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						
						jQuery('#update_message_hide').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
	
	} 
function iv_update_fb (){
	
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message_fb').html(loader_image);
				var search_params={
					"action"  : 	"iv_directories_update_setting_fb",	
					"form_data":	jQuery("#setting_fb").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						
						jQuery('#update_message_fb').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
	
	}	
function iv_update_password (){
	
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message_pass').html(loader_image);
				var search_params={
					"action"  : 	"iv_directories_update_setting_password",	
					"form_data":	jQuery("#pass_word").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						
						jQuery('#update_message_pass').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
	
	}	
 </script>	
        
