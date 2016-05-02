<?php
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
     <div class="profile-content">
            
              <div class="portlet light">
                  <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject"> 
						  <?php
											$iv_post = $directory_url; //get_option( '_iv_directories_profile_post');
											_e('All Listing','ivdirectories');	
							?></span>
							
							<?php echo '<a class="btn btn-xs  green-haze" href="'.get_post_type_archive_link( $directory_url ) .'"> '.  __('Listing Home','ivdirectories')	.' </a>'; ?>
							
							
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
					<div class="table-responsive">
					 <table class="table table-striped ">
		 
							<tr>
								<th><?php  _e('Title','ivdirectories')	;?></th>								
								<th><?php  _e('Status','ivdirectories')	;?></th>
								<th><?php  _e('Expire','ivdirectories')	;?></th>
								<th><?php  _e('Actions','ivdirectories')	;?></th>
							</tr>
						 
							<?php
								//if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
								global $wpdb;
									$per_page=10;$row_strat=0;$row_end=$per_page;
									$current_page=0 ;
									if(isset($_REQUEST['cpage']) and $_REQUEST['cpage']!=1 ){   
										$current_page=$_REQUEST['cpage']; $row_strat =($current_page-1)*$per_page; 
										$row_end=$per_page;
									}
									$sql="SELECT * FROM $wpdb->posts WHERE post_type = '".$iv_post."' and post_author='".$current_user->ID."' and post_status IN ('publish','pending','draft' )  ORDER BY `ID` DESC limit ".$row_strat.", ".$row_end;									
									$authpr_post = $wpdb->get_results($sql);
									$total_post=count($authpr_post);									
									if(sizeof($total_post)>0){
										$i=0;
										foreach ( $authpr_post as $row )								
										{									
										?>
											<tr>
												<td style="width:50%"> 
												<a class="profile-desc-link" href="<?php echo get_permalink($row->ID); ?>" style="font-size:15px;">
												<?php $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $row->ID), 'thumbnail' ); 
												if($feature_image[0]!=""){ ?>												
															<img title="profile image" style="width:45px;"  src="<?php  echo $feature_image[0]; ?>">
												<?php												
												}
												
												// Get latlng from address* START********
												$dir_lat=get_post_meta($row->ID,'latitude',true);
												$dir_lng=get_post_meta($row->ID,'longitude',true);
												$address = get_post_meta($row->ID, 'address', true);
												if($address!=''){
														if($dir_lat=='' || $dir_lng==''){
															$latitude='';$longitude='';
															
															$prepAddr = str_replace(' ','+',$address);
															$geocode=file_get_contents('http://maps.google.com/maps/api/geocode/json?address='.$prepAddr.'&sensor=false');
															$output= json_decode($geocode);
															if(isset( $output->results[0]->geometry->location->lat)){
																$latitude = $output->results[0]->geometry->location->lat;
															}
															if(isset($output->results[0]->geometry->location->lng)){
																$longitude = $output->results[0]->geometry->location->lng;
															}												
															
															 if($latitude!=''){
																update_post_meta($row->ID,'latitude',$latitude);
															 }
															 if($longitude!=''){
																update_post_meta($row->ID,'longitude',$longitude);
															 }
														}
												}	
												// Get latlng from address* ENDDDDDD********	
														
												?>
												&nbsp; <?php echo $row->post_title; ?></a></td>
												
												 <td width="15%" style="font-size:15px"><?php echo get_post_status( $row->ID ) ?></td>
												 <td width="15%" style="font-size:15px"><?php 
												 
													$exp_date= get_user_meta($current_user->ID, 'iv_directories_exprie_date', true);
													if($exp_date!=''){
														$package_id=get_user_meta($current_user->ID,'iv_directories_package_id',true);
														$dir_hide= get_post_meta($package_id, 'iv_directories_package_hide_exp', true);
														if($dir_hide=='yes'){
															echo date('d-M-Y',strtotime($exp_date));
														}
														
													}
														 ?>
												 
												 </td>
												<td width="20%" >
													<?php											
														$edit_post= $profile_url.'?&profile=post-edit&post-id='.$row->ID;										
														?>											
													<a href="<?php echo $edit_post; ?>" class="btn btn-xs green-haze" >Edit</a> 										
													<a href="<?php echo $profile_url.'?&profile=all-post&delete_id='.$row->ID ;?>"  onclick="return confirm('Are you sure to delete this post?');"  class="btn btn-xs btn-danger">Delete										
													</a></td>
											</tr>
								 
								<?php 
										}
									}	
								
								 ?>	
	
					</table>
					
					
					</div>
							<div class="center">
								<?php
								$sql2="SELECT * FROM $wpdb->posts WHERE post_type =  '".$iv_post."'  and post_author='".$current_user->ID."' and post_status IN ('publish','pending','draft' ) ";
								$authpr_post2 = $wpdb->get_results($sql2);
								$total_post=count($authpr_post2);
								$total_page= $total_post/$per_page;
								$total_page=ceil( $total_page);
								$current_page =($current_page==''? '1': $current_page );
								echo ' <ul class="iv-pagination">';										
								for($i=1;$i<= $total_page;$i++){
										echo '<li class="list-pagi '.($i==$current_page  ? 'active-li': '').'"><a href="'.get_permalink().'?&profile=all-post&cpage='.$i.'"> '.$i.'</a></li>';		
										
										 
											
											
							
							
								}
								echo'</ul>';
							
							?>
							 </div> 
					 </div>
                     
                  </div>
                </div>
              </div>
            </div>
          <!-- END PROFILE CONTENT -->
        
