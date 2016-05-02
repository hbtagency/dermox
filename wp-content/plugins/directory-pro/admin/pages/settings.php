<?php
wp_enqueue_style('wp-iv_directories-style-13', wp_iv_directories_URLPATH . 'admin/files/css/form-wizard-style-1.css');
global $wpdb;
?>
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
	
<div class="bootstrap-wrapper">
	<div class="container-fluid">
		
		<br/>
		<div id="update_message"> </div>
		  <div class="panel with-nav-tabs panel-info">
					<div class="panel-heading">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#page" data-toggle="tab"><?php _e('Page','ivdirectories'); ?></a></li>
								<li ><a href="#directory-url" data-toggle="tab"><?php _e('Directory URL','ivdirectories'); ?> </a></li>
								<li ><a href="#bidding" data-toggle="tab"><?php _e('Bidding','ivdirectories'); ?> </a></li>
								<li ><a href="#dir-setting" data-toggle="tab"><?php _e('Directory','ivdirectories'); ?> </a></li>
								<li ><a href="#dir-marker" data-toggle="tab"><?php _e('Category Image/Marker','ivdirectories'); ?></a></li>
								<li><a href="#payment" data-toggle="tab"><?php _e('Payment Page','ivdirectories'); ?></a></li>
								<li><a href="#email" data-toggle="tab"><?php _e('Email','ivdirectories'); ?> </a></li>								
								<li><a href="#mailchimp" data-toggle="tab"><?php _e('MailChimp','ivdirectories'); ?> </a></li>
								<li ><a href="#user_reg" data-toggle="tab"><?php _e('Page Redirect','ivdirectories'); ?></a></li>								
								<li ><a href="#protected_content" data-toggle="tab"><?php _e('Visibility Control','ivdirectories'); ?></a></li>
								<!--
								<li ><a href="#protected_page" data-toggle="tab"><?php _e('Protected Page','ivdirectories'); ?></a></li>
								-->
								
							</ul>
					</div>
					<div class="panel-body">
						<div class="tab-content">								
								<div class="tab-pane fade " id="protected_page">								
									<?php
										require (wp_iv_directories_DIR .'/admin/pages/protected_page.php');
									?>
								</div>
								<div class="tab-pane fade " id="directory-url">								
									<?php
										require (wp_iv_directories_DIR .'/admin/pages/directory-url.php');
									?>
								</div>
								<div class="tab-pane fade " id="dir-marker">								
									<?php
										require (wp_iv_directories_DIR .'/admin/pages/map_marker.php');
									?>
								</div>
								
								
								<div class="tab-pane fade " id="bidding">								
									<?php
										require (wp_iv_directories_DIR .'/admin/pages/bidding_setting.php');
									?>
								</div>
								<div class="tab-pane fade " id="dir-setting">								
									<?php
										require (wp_iv_directories_DIR .'/admin/pages/dir_setting.php');
									?>
								</div>
								
								
								
									<div class="tab-pane fade " id="protected_content">
									<form class="form-horizontal" role="form"  name='protected_settings' id='protected_settings'>										
											
											 <div class="form-group">
												<h3  class="col-md-12   page-header">Visibility Control </h3>												
											</div>
											
											<?php
										
											$store_array=get_option('_iv_visibility_serialize_role');											
											$active_module=get_option('_iv_directories_active_visibility'); 
											$active_check_y=''; $active_check_n='';
											if($active_module=='yes' )
											{	$active_check_n='';
												$active_check_y=' checked';												
											}else{ 
												$active_check_y='';
												$active_check_n=' checked';											
											}
											//print_r(get_option('_iv_visibility_serialize_role'));
											
											?>
											 <div class="row">
												<label  class="col-md-3  pull-left"> Content Visibility Module :</label>
												<div class="col-md-3">
													<label>												
													<input type="radio" name="active_visibility" id="active_visibility" value='yes' <?php echo $active_check_y; ?> > Hide Content By Role Access
													</label>	
												</div>
												<div class="col-md-3">	
													<label>											
													<input type="radio"  name="active_visibility" id="active_visibility" value='no' <?php echo $active_check_n; ?> > Show All
													</label>
												</div>												
											 </div>
											 	 <div class=" row form-group"> <br/>
												 </div>

											 <div class="form-group">
												<h3  class="col-md-12   page-header">Content Show By Roles</h3>												
											</div>
											
											<div class=" col-md-12  bs-callout bs-callout-info">							
												Select which contents are available for each user role.											
											</div>
											 	
											<div class="row ">
												<div class="col-md-12 ">
												<table class="table table-bordered table-responsive table-hover ">												  
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
													  <th>Check/Uncheck</th>
													  <?php
													  global $wp_roles;
													  //$roles = $wp_roles->get_names();
													  //foreach($roles as $role) {
													 foreach ( $wp_roles->roles as $key=>$value ){
														  //echo '<th>'.$key.'</th>';  
														  if($value['name']!='Administrator'){
																echo '<td style="text-align: center;"><input onclick="return protect_select_all(\''.$key.'\');" type="checkbox" name="'.$key.'_all" id="'.$key.'_all" value="'.$key.'" class="'.$key.'"></td>'; 
															}
													}
														  echo '<td style="text-align: center;"><input type="checkbox"  onclick="return protect_select_all(\'visitor\');" name="visitor_all" id="visitor_all"  value="visitor_all"  class="visitor"></td>'; 
													  ?>
													</tr>
												  </tfoot>
												  <tbody>
													 <?php 
														$dir_heads[0]='image';
														$dir_heads[1]='description';
														$dir_heads[2]='event';
														$dir_heads[3]='coupon';
														$dir_heads[4]='booking';
														$dir_heads[5]='video';
														$dir_heads[6]='contact info';
														  foreach($dir_heads as $head) { 
																echo'<tr>';
																echo ' <th scope="row">'.$head.'</th> ';
																foreach ( $wp_roles->roles as $key=>$value ){
																  //echo '<th>'.$key.'</th>';
																   if($key!='administrator'){
																		  if(isset($store_array[$key]))
																			{	if(in_array($head , $store_array[$key])){
																					echo '<td style="text-align: center;"><input type="checkbox" name="'.$key.'[]" id="'.$key.'[]"  class="'.$key.'"  value="'.$head.'" checked></td>'; 
																				}else{
																					echo '<td style="text-align: center;"><input type="checkbox" name="'.$key.'[]" id="'.$key.'[]"  class="'.$key.'"  value="'.$head.'"></td>'; 
																				}
																				//print_r($store_array['Silver']);
																			}else{ 
																				echo '<td style="text-align: center;"><input type="checkbox" name="'.$key.'[]" id="'.$key.'[]"  class="'.$key.'"  value="'.$head.'"></td>'; 
																			
																			}
																  
																	}
																  
																}
															if(isset($store_array['visitor'])){	
																if(in_array($head  , $store_array['visitor'])){
																		echo '<td style="text-align: center;"><input type="checkbox" class="visitor" name="visitor[]" id="visitor[]" value="'.$head.'"  checked ></td>';
																}else{
																	echo '<td style="text-align: center;"><input type="checkbox" name="visitor[]" id="visitor[]" value="'.$head.'" class="visitor" ></td>';
																}
															}else{
																	echo '<td style="text-align: center;"><input type="checkbox" name="visitor[]" id="visitor[]" value="'.$head.'" class="visitor" ></td>';
															
															}		
														echo'</tr>';
														
														}
													 ?> 													
												  </tbody>
												</table>
												</div>			
											</div>	
											<div class="form-group">
												<label  class="col-md-3 control-label"> Already logged In User Message</label>
												<div class="col-md-6">
												<?php
												$login_message=get_option('_iv_visibility_login_message');
												if($login_message=='' ){
													$login_message='Please Upgrade Your Account to View the Content.';
												}												
												$visitor_message=get_option('_iv_visibility_visitor_message');
												if($visitor_message=='' ){
													$visitor_message='Please Login to view the content.';
												}
												?>												
													<input type="text" class="form-control" name="login_message" id="login_message" value="<?php echo $login_message; ?>" placeholder="Enter Message">
												</div>
											 </div>
											 <div class="form-group">
												<label  class="col-md-3 control-label"> Visitor Message</label>
												<div class="col-md-6">												
													<input type="text" class="form-control" name="visitor_message" id="visitor_message" value="<?php echo $visitor_message; ?>" placeholder="Enter Message">
												</div>
											 </div>
											
											<div class="form-group">
											<label  class="col-md-3 control-label"> </label>
											<div class="col-md-8">
												
												<button type="button" onclick="return  iv_update_protected_settings();" class="btn btn-success">Update</button>
											</div>
										</div>
												
									</form>
								</div>	
								
							
									<div class="tab-pane fade " id="user_reg">
									<form class="form-horizontal" role="form"  name='account_settings' id='account_settings'>
										<br/>
										
											
											<?php
												$args = array(
															'child_of'     => 0,
															'sort_order'   => 'ASC',
															'sort_column'  => 'post_title',
															'hierarchical' => 1,															
															'post_type' => 'page'
															);
												?>
																<div class="form-group">
																	<label  class="col-md-3   control-label">User Registration Page Redirect: </label>
																	
																
																		<div class="checkbox col-md-3 ">
																			
																		<?php
																			$iv_redirect = get_option( 'iv_directories_signup_redirect');
																			
																		 if ( $pages = get_pages( $args ) ){
																			echo "<select id='signup_redirect' name='signup_redirect' class='form-control'>";
																			 echo "<option value='defult' ".($iv_redirect=='defult' ? 'selected':'').">Default WP Action</option>";
																			 
																			foreach ( $pages as $page ) {
																			  echo "<option value='{$page->ID}' ".($iv_redirect==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																			}
																			echo "</select>";
																		  }
																		?>
																			
																		 </div>
																		
																		
																</div>
										
																<div class="form-group">
																	<label  class="col-md-3   control-label">User My Account Page Redirect: </label>
																	
																
																		<div class="checkbox col-md-3 ">
																			
																		<?php
																			$iv_redirect = get_option( '_iv_directories_profile_page');
																			
																		 if ( $pages = get_pages( $args ) ){
																			echo "<select id='pri_profile_redirect' name='pri_profile_redirect' class='form-control'>";
																			 echo "<option value='defult' ".($iv_redirect=='defult' ? 'selected':'').">Default WP Action</option>";
																			 
																			foreach ( $pages as $page ) {
																			  echo "<option value='{$page->ID}' ".($iv_redirect==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																			}
																			echo "</select>";
																		  }
																		?>
																			
																		 </div>
																		
																		
																</div>
															<div class="form-group">
																	<label  class="col-md-3   control-label">User Public Profile Page Redirect: </label>
																	
																
																		<div class="checkbox col-md-3 ">
																			
																		<?php
																			$iv_redirect = get_option( '_iv_directories_profile_public_page');
																			
																		 if ( $pages = get_pages( $args ) ){
																			echo "<select id='profile_redirect' name='profile_redirect' class='form-control'>";
																			 echo "<option value='defult' ".($iv_redirect=='defult' ? 'selected':'').">Default WP Action</option>";
																			 
																			foreach ( $pages as $page ) {
																			  echo "<option value='{$page->ID}' ".($iv_redirect==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																			}
																			echo "</select>";
																		  }
																		?>
																			
																		 </div>
																		
																		
																</div>
																<div class="form-group">
																	<label  class="col-md-3   control-label">Hide Admin Bar for All Users Except for Administrators: </label>																	
																
																		<div class=" col-md-3 ">																			
																		<?php
																			 $hide_admin_bar='';
																			 if( get_option( '_iv_directories_hide_admin_bar' ) ) {
																				  $hide_admin_bar= get_option('_iv_directories_hide_admin_bar'); 
																			 }	 
																			 //echo  $t_terms;
																			?><label>
																		  <input  class="" type="checkbox" name="hide_admin_bar" id="hide_admin_bar" value="yes" <?php echo ($hide_admin_bar=='yes'? 'checked':'' ); ?> > 
																				Hide 
																				</label>
																			
																		 </div>
																		
																		
																</div>
																
																
																
																<div class="form-group">
																	<label  class="col-md-3 control-label"> </label>
																	<div class="col-md-8">
																		
																		<button type="button" onclick="return  iv_update_account_settings();" class="btn btn-success">Update</button>
																	</div>
																</div>
									</form>			
									
									</div>
							
										<div class="tab-pane fade " id="payment">
											<!--Payment  -->
														<form class="form-horizontal" role="form"  name='payment_settings' id='payment_settings'>
																
																<div class="form-group">
																	<label  class="col-md-2   control-label">Terms CheckBox : </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																				<div class="checkbox col-md-1 ">
																					<label><?php
																						 $t_terms='';
																						 if( get_option( 'iv_directories_payment_terms' ) ) {
																							  $t_terms= get_option('iv_directories_payment_terms'); 
																						 }	 
																						 //echo  $t_terms;
																						?>
																					  <input type="checkbox" name="iv_terms" id="iv_terms" value="yes" <?php echo ($t_terms=='yes'? 'checked':'' ); ?> > Dispaly
																					</label>
																				  </div>
																		  
																			
																			<div class=" col-md-6 col-xs-6 col-sm-6">	
																			<?php
																			 $t_text='I have read & accept the <a href="#"> Terms & Conditions</a>';
																			 if( get_option( 'iv_directories_payment_terms_text' ) ) {
																				  $t_text= get_option('iv_directories_payment_terms_text'); 
																			 }	 
																			 
																			?>																			
																				<textarea class="form-control" rows="3" name='terms_detail' id='terms_detail' >  <?php echo $t_text; ?></textarea>
																			</div>
																			
																	</div>
																	
																	
																</div>
																	<div class="form-group">
																	<label  class="col-md-2   control-label">Hide Coupon Buton : </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																				<div class="checkbox col-md-1 ">
																					<label><?php
																						 $t_coupon='';
																						 if( get_option( '_iv_directories_payment_coupon' ) ) {
																							  $t_coupon= get_option('_iv_directories_payment_coupon'); 
																						 }	 
																						 //echo  $t_terms;
																						?>
																					  <input type="checkbox" name="iv_coupon" id="iv_coupon" value="yes" <?php echo ($t_coupon=='yes'? 'checked':'' ); ?> > Hide
																					</label>
																				  </div>
																	</div>
																	
																	
																</div>
															
																
																<div class="form-group  row">
																	<label  class="col-md-3  control-label"> </label>
																	<div class="col-md-4">
																		<button type="button" onclick="return  iv_update_payment_settings();" class="btn btn-success">Update</button>				
																	 </div>							
																</div>
													</form>
													
										
										</div>
									<div class="tab-pane fade in active" id="page">
										
										
										<form class="form-horizontal" role="form"  name='page_settings' id='page_settings'>
																<?php
										$price_table=get_option('_iv_directories_price_table'); 
										$registration=get_option('_iv_directories_registration'); 
										$profile_page=get_option('_iv_directories_profile_page'); 	
										$profile_public=get_option('_iv_directories_profile_public_page');
										$login_page=get_option('_iv_directories_login_page');  										
										$thank_you=get_option('_iv_directories_thank_you_page'); 	

														$args = array(
															'child_of'     => 0,
															'sort_order'   => 'ASC',
															'sort_column'  => 'post_title',
															'hierarchical' => 1,															
															'post_type' => 'page'
															);
																?>
																<div class="form-group">
																	<label  class="col-md-2   control-label">Price Listing: </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">
																			
																			<?php
																			
																		 if ( $pages = get_pages( $args ) ){
																			echo "<select id='pricing_page' name='pricing_page' class='form-control'>";
																			foreach ( $pages as $page ) {
																			  echo "<option value='{$page->ID}' ".($price_table==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																			}
																			echo "</select>";
																		  }
																		?>
																			
																		 </div>
																		 <div class="checkbox col-md-1 ">
																		 <?php
																				
																				$reg_page= get_permalink( $price_table); 
																				?>
																				 <a class="btn btn-info " href="<?php  echo $reg_page; ?>"> View</a>
																		 </div>
																	</div>	
																</div>
															<div class="form-group">
																	<label  class="col-md-2   control-label">User Sign Up: </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">
																			<?php
																					
																				 if ( $pages = get_pages( $args ) ){
																					echo "<select id='signup_page' name='signup_page' class='form-control'>";
																					foreach ( $pages as $page ) {
																					  echo "<option value='{$page->ID}' ".($registration==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																					}
																					echo "</select>";
																				  }
																		?>
																		 </div>
																		 <div class="checkbox col-md-1 ">
																			 <?php
																			
																				$reg_page= get_permalink( $registration); 
																				?>
																				 <a class="btn btn-info " href="<?php  echo $reg_page; ?>"> View</a>
																		 </div>
																	</div>	
																</div>
																<div class="form-group">
																	<label  class="col-md-2   control-label">Signup Thanks : </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">
																				<?php
																				
																			 if ( $pages = get_pages( $args ) ){
																				echo "<select id='thank_you_page'  name='thank_you_page'  class='form-control'>";
																				foreach ( $pages as $page ) {
																				  echo "<option value='{$page->ID}' ".($thank_you==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																				}
																				echo "</select>";
																			  }
																			?>
																		 </div>
																		 <div class="checkbox col-md-1 ">
																			  <?php
																				
																				$reg_page= get_permalink( $thank_you); 
																				?>
																				 <a class="btn btn-info " href="<?php  echo $reg_page; ?>"> View</a>
																		
																		 </div>
																	</div>	
																</div>
																<div class="form-group">
																	<label  class="col-md-2   control-label">Login Page: </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">
																				<?php
																				
																			 if ( $pages = get_pages( $args ) ){
																				echo "<select id='login_page'  name='login_page'  class='form-control'>";
																				foreach ( $pages as $page ) {
																				  echo "<option value='{$page->ID}' ".($login_page==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																				}
																				echo "</select>";
																			  }
																			?>
																		 </div>
																		 <div class="checkbox col-md-1 ">
																		  <?php
																				
																				$reg_page= get_permalink( $login_page); 
																				?>
																				 <a class="btn btn-info " href="<?php  echo $reg_page; ?>"> View</a>
																		 </div>
																	</div>	
																</div>
																<div class="form-group">
																	<label  class="col-md-2   control-label">User My Account : </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">
																				<?php
																				
																			 if ( $pages = get_pages( $args ) ){
																				echo "<select id='profile_page'  name='profile_page'  class='form-control'>";
																				foreach ( $pages as $page ) {
																				  echo "<option value='{$page->ID}' ".($profile_page==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																				}
																				echo "</select>";
																			  }
																			?>
																		 </div>
																		 <div class="checkbox col-md-1 ">
																		  <?php
																				
																				$reg_page= get_permalink( $profile_page); 
																				?>
																				 <a class="btn btn-info " href="<?php  echo $reg_page; ?>"> View</a>
																		 </div>
																	</div>	
																</div>
																
																<div class="form-group">
																	<label  class="col-md-2   control-label">User Public Profile: </label>
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4 ">
																				<?php																				
																			 if ( $pages = get_pages( $args ) ){
																				echo "<select id='profile_public'  name='profile_public'  class='form-control'>";
																				foreach ( $pages as $page ) {
																				  echo "<option value='{$page->ID}' ".($profile_public==$page->ID ? 'selected':'').">{$page->post_title}</option>";
																				}
																				echo "</select>";
																			  }
																			?>
																		 </div>
																		 <div class="checkbox col-md-1 ">
																		 <?php																				
																				$reg_page= get_permalink( $profile_public); 
																				?>
																				 <a class="btn btn-info " href="<?php  echo $reg_page; ?>"> View</a>
																		 </div>
																	</div>	
																</div>
																<div class="form-group">
																	<label  class="col-md-2   control-label"><?php _e('Cron Job URL','ivdirectories');  ?> </label>
																		<div class="col-md-3 col-xs-10 col-sm-10">
																		
																				<b> <a href="<?php echo admin_url('admin-ajax.php'); ?>?action=iv_directories_cron_job"><?php echo admin_url('admin-ajax.php'); ?>?action=iv_directories_cron_job </a></b>
																		 </div>
																		 <div class="checkbox col-md-4 ">
																			Cron JOB Detail : Auto Bidding Renew update, Hide Listing( Package setting),Subscription Remainder email.
																		 </div>
																	
																</div>
																
																
																
															<div class="form-group">
																	<label  class="col-md-2   control-label"> </label>
																	
																	<div class="col-md-10 col-xs-10 col-sm-10">
																		<div class="checkbox col-md-4  ">
																			<button type="button" onclick="return  iv_update_page_settings();" class="btn btn-success">Update</button>
																		 </div>
																		 <div class="checkbox col-md-1 ">
																		
																		 </div>
																	</div>	
																</div>	
																
																
													</form>
									
									</div>
									<div class="tab-pane fade" id="email">
											<div class="row pull-right">
												<div class="col-md-12 ">

													 <button type="button" onclick="return  iv_update_email_settings();" class="btn btn-success">Update Email Setting</button>					</div>							
											</div>	
									<form class="form-horizontal" role="form"  name='email_settings' id='email_settings'>	
										<?php
										
										$form_id='';
										$form_name='iv_directories_account_form';
										$form_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '" . $form_name . "' ORDER BY `ID` DESC");
	
										?>
										<div class="form-group">
												<label  class="col-md-2  control-label"> Email Sender : </label>
												<div class="col-md-4 ">
													

													<?php
													$admin_email_setting='';
													if( get_option( 'admin_email_iv_directories' )==FALSE ) {
																$admin_email_setting = get_option('admin_email');						 
													}else{
														$admin_email_setting = get_option('admin_email_iv_directories');								
													}	
													 
													?>
													<input type="text" class="form-control" id="iv_directories_admin_email" name="iv_directories_admin_email" value="<?php echo $admin_email_setting; ?>" placeholder="">
												
											</div>
											
										</div>	
										<div class="form-group">
												<h3  class="col-md-12   page-header">Signup / Forget password Email </h3>
												
										</div>
										
										<div class="form-group">
												<label  class="col-md-2   control-label"> Email Subject : </label>
												<div class="col-md-4 ">
													
														<?php
														$iv_directories_signup_email_subject = get_option( 'iv_directories_signup_email_subject');
														?>
														<input type="hidden" name="signup_form_id" value="<?php echo $form_id; ?>">
														<input type="text" class="form-control" id="iv_directories_signup_email_subject" name="iv_directories_signup_email_subject" value="<?php echo $iv_directories_signup_email_subject; ?>" placeholder="Enter signup email subject">
												
											</div>
										</div>
										<div class="form-group">
												<label  class="col-md-2   control-label"> Email Tempalte : </label>
												<div class="col-md-10 ">
																							<?php
															$settings_a = array(															
																'textarea_rows' =>20,															 
																);
															$content_client = get_option( 'iv_directories_signup_email');
															$editor_id = 'signup_email_template';
															//wp_editor( $content_client, $editor_id,$settings_a );										
															?>
													<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
													<?php echo $content_client; ?>
													</textarea>		

											</div>
										</div>
												<div class="form-group">
												<label  class="col-md-2   control-label"> Forget Subject : </label>
												<div class="col-md-4 ">
													
														<?php
														$iv_directories_forget_email_subject = get_option( 'iv_directories_forget_email_subject');
														?>
														
														<input type="text" class="form-control" id="forget_email_subject" name="forget_email_subject" value="<?php echo $iv_directories_forget_email_subject; ?>" placeholder="Enter forget email subject">
												
											</div>
										</div>
										<div class="form-group">
												<label  class="col-md-2   control-label"> Forget Tempalte : </label>
												<div class="col-md-10 ">
																							<?php
															$settings_forget = array(															
																'textarea_rows' =>'20',	
																'editor_class'  => 'form-control',														 
																);
															$content_client = get_option( 'iv_directories_forget_email');
															$editor_id = 'forget_email_template';
															//wp_editor( $content_client, $editor_id,$settings_forget );										
															?>
															<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
													<?php echo $content_client; ?>
													</textarea>		

											</div>
										</div>
										<div class="form-group">
												<h3  class="col-md-12 col-xs-12 col-sm-12  page-header">Order Email </h3>
												
										</div>
										
										<div class="form-group">
												<label  class="col-md-2   control-label"> User Email Subject : </label>
												<div class="col-md-4 ">
													
														<?php
														$iv_directories_order_email_subject = get_option( 'iv_directories_order_client_email_sub');
														?>
														<input type="text" class="form-control" id="iv_directories_order_email_subject" name="iv_directories_order_email_subject" value="<?php echo $iv_directories_order_email_subject; ?>" placeholder="Enter order email subject">
												
											</div>
										</div>
										<div class="form-group">
												<label  class="col-md-2   control-label"> User Email Tempalte : </label>
												<div class="col-md-10 ">
																							<?php
															$settings_a = array(															
																'textarea_rows' =>20,															 
																);
															$content_client = get_option( 'iv_directories_order_client_email');
															$editor_id = 'order_client_email_template';
															//wp_editor( $content_client, $editor_id,$settings_a );										
															?>
														<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
													<?php echo $content_client; ?>
													</textarea>			
															

											</div>
										</div>
										
																				<div class="form-group">
												<label  class="col-md-2   control-label"> Admin Email Subject : </label>
												<div class="col-md-4 ">
													
														<?php
														$iv_directories_order_admin_email_subject = get_option( 'iv_directories_order_admin_email_sub');
														?>
														<input type="text" class="form-control" id="iv_directories_order_admin_email_subject" name="iv_directories_order_admin_email_subject" value="<?php echo $iv_directories_order_admin_email_subject; ?>" placeholder="Enter order email subject">
												
											</div>
										</div>
										<div class="form-group">
												<label  class="col-md-2   control-label"> Admin Email Tempalte : </label>
												<div class="col-md-10 ">
																							<?php
															$settings_a = array(															
																'textarea_rows' =>20,															 
																);
															$content_client = get_option( 'iv_directories_order_admin_email');
															$editor_id = 'order_admin_email_template';
															//wp_editor( $content_client, $editor_id,$settings_a );										
															?>
															<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
													<?php echo $content_client; ?>
													</textarea>		

											</div>
										</div>
										<div class="form-group">
												<h3  class="col-md-12 col-xs-12 col-sm-12  page-header">Reminder Email </h3>
										</div>
										<?php
											include (wp_iv_directories_DIR .'/admin/pages/reminder_email.php');
										?>
										<div class="form-group">
												<h3  class="col-md-12 col-xs-12 col-sm-12  page-header">New Message Email </h3>
												
										</div>
										<?php
											include (wp_iv_directories_DIR .'/admin/pages/new-message.php');
										?>
										<div class="form-group">
												<h3  class="col-md-12 col-xs-12 col-sm-12  page-header">Money Refund Email </h3>
												
										</div>
										<?php
											include (wp_iv_directories_DIR .'/admin/pages/refund-message.php');
										?>
										
										<div class="form-group">
												<h3  class="col-md-12 col-xs-12 col-sm-12  page-header">Deal/Coupon Email: Listing Owner + Client </h3>
												
										</div>
										<?php
											include (wp_iv_directories_DIR .'/admin/pages/deal-message.php');
										?>
									</form>
									<div id="email-success"></div>
										<div class="row pull-left">
											<div class="col-md-12 ">

											 <button type="button" onclick="return  iv_update_email_settings();" class="btn btn-success">Update Email Setting</button>					
											 </div>							
										</div>	
										
									
									</div>
									<div class="tab-pane fade" id="mailchimp">
										<form class="form-horizontal" role="form"  name='mailchimp_settings' id='mailchimp_settings'>
												<div class="form-group row">
													<label  class="col-md-3 col-xs-6 col-sm-6 control-label"> MailChimp API Key : </label>
													<div class="col-md-4 col-xs-6 col-sm-6">
														<?php
														$iv_mailchimp_api_key='';
														if( get_option( 'iv_directories_mailchimp_api_key' )==FALSE ) {
																	$iv_mailchimp_api_key = get_option('iv_directories_mailchimp_api_key');						 
														}else{
															$iv_mailchimp_api_key = get_option('iv_directories_mailchimp_api_key');								
														}	
														 
														 
														?>
														<input type="text" class="form-control" id="iv_directories_mailchimp_api_key" name="iv_directories_mailchimp_api_key" value="<?php echo $iv_mailchimp_api_key; ?>" placeholder="">
														<a href="http://admin.mailchimp.com/account/api" target="_blank">Get your API key here.</a>
														
													</div>
												</div>
												<div class="form-group row">
													<label  class="col-md-3 col-xs-6 col-sm-6  control-label">Confirmation Message : </label>
													<div class="col-md-4 col-xs-6 col-sm-6 ">
														<?php
														$iv_directories_mailchimp_confirmation='no';
														if( get_option( 'iv_directories_mailchimp_confirmation' )==FALSE ) {
																	$iv_directories_mailchimp_confirmation = get_option('iv_directories_mailchimp_confirmation');						 
														}else{
															$iv_directories_mailchimp_confirmation = get_option('iv_directories_mailchimp_confirmation');								
														}	
														 
														?>
														<select class="form-control" id="iv_directories_mailchimp_confirmation" name="iv_directories_mailchimp_confirmation">
															<option value="no" <?php echo ($iv_directories_mailchimp_confirmation == 'no' ? 'selected' : '') ?>>Yes</option>
															<option value="yes" <?php echo ($iv_directories_mailchimp_confirmation == 'yes' ? 'selected' : '') ?>>No</option>
														</select>
														
													</div>
												</div>
										<div class="form-group row">	
												<label  class="col-md-3 col-xs-6 col-sm-6 control-label">Mailchimp List : </label>
									<div class="col-md-4 col-xs-6 col-sm-6">
										<?php 
											if( ! class_exists('MCAPI' ) ) {
													require_once(wp_iv_directories_DIR . '/inc/MCAPI.class.php');
												}
												$iv_mailchimp_api_key='';
												if( get_option( 'iv_directories_mailchimp_api_key' )==FALSE ) {
														$iv_mailchimp_api_key = get_option('iv_directories_mailchimp_api_key');						 
												}else{
														$iv_mailchimp_api_key = get_option('iv_directories_mailchimp_api_key');								
												}	
												echo '<select class="form-control" id="iv_directories_mailchimp_list" name="iv_directories_mailchimp_list">';
												if($iv_mailchimp_api_key!=''){
													$iv_form_membership_mailchimp_list=get_option( 'iv_directories_mailchimp_list'); 
													
													$api = new MCAPI($iv_mailchimp_api_key);
													$list_data = $api->lists();
													if($list_data){
														foreach($list_data['data'] as $key => $list) :
															$lists[$list['id']] = $list['name'];
															echo '<option value="'.$list['id'].'" '.($iv_form_membership_mailchimp_list==$list['id']? 'selected': '').'>'.$list['name'].' </option>';
														endforeach;
													}else{
														echo '<option value=" " > Not Available</option>';
													}
													
												}
													
											echo'</select>';
											
											
										?>
										</div>
								</div>
									<div class=" col-md-7  bs-callout bs-callout-info">		
					
									Signup user email address will go to the mailchimp list.
								
									</div>
									<div class="clearfix"></div>
								</form>
												<div class="form-group  row">
													<label  class="col-md-3  control-label"> </label>
													<div class="col-md-4">
														 <button type="button" onclick="return  iv_update_mailchamp_settings();" class="btn btn-success">Update MailChimp Setting</button>					
													 </div>							
												</div>	
							
							</div>
									
							
							
						</div>
					</div>
            </div>
            
		
			


	</div>
</div>
<script>
function iv_update_reminder_email_settings(){
				
				//tinyMCE.triggerSave();	
				
				var search_params={
					"action"  : 	"iv_directories_update_reminder_email_setting",	
					"form_data":	jQuery("#reminder_email_settings").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
							jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});

}

	function iv_update_payment_settings() {
				// New Block For Ajax*****
				var search_params={
					"action"  : 	"iv_directories_update_payment_setting",	
					"form_data":	jQuery("#payment_settings").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
				
	}
function iv_update_page_settings(){
				var search_params={
					"action"  : 	"iv_directories_update_page_setting",	
					"form_data":	jQuery("#page_settings").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
					
					jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						//jQuery('#update_message').html(response.msg);
						
					}
				});

}
function iv_update_email_settings(){
				//tinyMCE.triggerSave();	
				var search_params={
					"action"  : 	"iv_directories_update_email_setting",	
					"form_data":	jQuery("#email_settings").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
							jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
							jQuery('#email-success').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
							
						
					}
				});
}			
function iv_update_mailchamp_settings(){

				var search_params={
					"action"  : 	"iv_directories_update_mailchamp_setting",	
					"form_data":	jQuery("#mailchimp_settings").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
}

function iv_update_account_settings(){

				var search_params={
					"action"  : 	"iv_directories_update_account_setting",	
					"form_data":	jQuery("#account_settings").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
}
function iv_update_post_settings(){
var search_params={
		"action"  : 	"iv_directories_update_post_setting",	
		"form_data":	jQuery("#post_settings").serialize(), 
	};
	jQuery.ajax({					
		url : ajaxurl,					 
		dataType : "json",
		type : "post",
		data : search_params,
		success : function(response){
			jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
			
		}
	});

}
function iv_update_protected_settings(){
var search_params={
		"action"  : 	"iv_directories_update_protected_setting",	
		"form_data":	jQuery("#protected_settings").serialize(), 
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
function protect_select_all(sel_name) {
	   
	   if(jQuery("#"+sel_name+"_all").prop("checked") == true){			
			jQuery("."+sel_name).prop("checked",jQuery("#"+sel_name+"_all").prop("checked"));
            
		}else{
			
			jQuery("."+sel_name).prop("checked", false);
		}
			
	  
   
    
}
	

</script>

