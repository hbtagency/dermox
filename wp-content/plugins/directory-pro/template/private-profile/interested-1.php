<?php
wp_enqueue_style('wp-iv_directories-bidding-style-102', wp_iv_directories_URLPATH . 'admin/files/css/colorbox.css');
wp_enqueue_script('wp-iv_directories-bidding-script-103', wp_iv_directories_URLPATH . 'admin/files/js/jquery.colorbox-min.js');
global $wpdb;	
	$directory_url=get_option('_iv_directory_url');					
	if($directory_url==""){$directory_url='directories';}
wp_enqueue_style('wp_iv_directory-style-0A2', wp_iv_directories_URLPATH . 'admin/files/css/jquery.dataTables.css');

	$profile_url=get_permalink(); 
	global $current_user;
	get_currentuserinfo();
	$user = $current_user->ID;
	$message='';
if(isset($_GET['delete_id']))  {
	$post_id=$_GET['delete_id'];
	$post_edit = get_post($post_id); 
	
	if($post_edit->post_author==$current_user->ID){
		wp_delete_post($post_id);
		delete_post_meta($post_id,true);
		$message="Deleted Successfully";
	}

	
	
}
?>    
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script> 
     <div class="profile-content">
            
              <div class="portlet light">
                  <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject">
					  <?php											
							_e('Who is Interested','ivdirectories')	;	
						?></span>
                    </div>
					
                  </div>
                  
                  <div class="portlet-body">
                    <div class="tab-content">
                    
                      <div class="tab-pane active" id="tab_1_1">
					  <?php
					 
						
							
						
						if($message!=''){
						 echo  '<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'.$message.'.</div>';
						}
						
						?>
						
					<div class="">					
							<table id="user-data" class="display table" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th><?php _e('User Name','ivdirectories'); ?></th>											
											<th><?php _e('Email','ivdirectories'); ?></th>											
											<th><?php _e('Directory','ivdirectories'); ?></th>
											<th> <?php _e('Contact','ivdirectories'); ?></th>
										</tr>
									</thead>

									<tfoot>
										<tr>
											<th><?php _e('User Name','ivdirectories'); ?></th>											
											<th><?php _e('Email','ivdirectories'); ?></th>											
											<th><?php _e('Directory','ivdirectories'); ?></th>	
											<th> <?php _e('Contact','ivdirectories'); ?></th>
										
										</tr>
									</tfoot>

									<tbody>

										<?php	
										$sql="SELECT * FROM $wpdb->posts WHERE post_type = '".$directory_url."' and post_author='".$current_user->ID."' and post_status IN ('publish','pending','draft' )  ";									
									$authpr_post = $wpdb->get_results($sql);
									 $total_post=count($authpr_post);	
									$iv_redirect_user = get_option( '_iv_directories_profile_public_page');
									$reg_page_user='';
									if($iv_redirect_user!='defult'){ 
										$reg_page_user= get_permalink( $iv_redirect_user) ; 										 
									}	
									if(sizeof($total_post)>0){
										$i=0;
										foreach ( $authpr_post as $row )								
										{		//echo '<br/>ID...'.$row->ID;
												$user_list= get_post_meta($row->ID,'_favorites',true);	
												$user_list_arr2 = array();												 
												$user_list_arr = array_filter( explode(",", $user_list), 'strlen' ); 
												$i=0;
												foreach($user_list_arr as $arr){
													if(trim($arr)!=''){
														$user_list_arr2[$i]=$arr;
														$i++;
													}
												}
											if(sizeof($user_list_arr2)>0){	
												
													$args_users = array ('include'  =>$user_list_arr2,);
													// The User Query
													$user_query = new WP_User_Query( $args_users );
													
												if ( ! empty( $user_query->results ) ) {
													foreach ( $user_query->results as $user ) {
															//print_r( $user );													
													?>
														<tr>
															
															<td><?php $reg_page_u=$reg_page_user.'?&id='.$user->user_login;  echo '<a href="'.$reg_page_u.'">'. $user->display_name.'</a>'; ?> </td>							 
															<td><?php echo $user->user_email; ?></td>
															
															<td><?php
																echo '<a href="'.esc_url( get_permalink( $row->ID ) ).'">'.$row->post_title .'</a>';
																
																?>
															</td>
															<td>
																<a class='btn btn-primary btn-sm popup-contact' href="<?php echo admin_url('admin-ajax.php').'?action=iv_directories_contact_popup&dir-id='.$row->ID; ?>">
																				<?php _e('Contact','wp_iv_membership'); ?>		 
																 </a>
															</td>
														</tr>

														<?php	
													}
													
												}
											}		
										}
									}	
										?>



										

									</tbody>
								</table>
					
					</div>
							
					 </div>
                     
                  </div>
                </div>
              </div>
            </div>
          <!-- END PROFILE CONTENT -->
<script>
						
			jQuery(window).on('load',function(){
				jQuery('#user-data').show();				
				var oTable = $('#user-data').dataTable();
				oTable.fnSort( [ [1,'DESC'] ] );
			});
			
			
</script>		  
 <script>
jQuery(document).ready(function($) {		
		jQuery(".popup-contact").colorbox({transition:"None", width:"650px", height:"415px" ,opacity:"0.70"});
		
})	
</script> 
