<?php
global $post,$wpdb;

get_header();?>
<style>
.red-heart { color: red; }
.iv-top-buffer { margin-top:30px!important; }
 .row {
  margin-left: 0px!important;
  margin-right: 15px!important;
}
.tabs, .nav ,.pp-single-content, .nav-tabs, ul#single-tabs {
		border: 2px solid #eee!important;}

#directory-temp .ch-item {
		width: 100%;
		border-radius: 50%;
		cursor: default;
		position: relative;
		box-shadow:none;
	}
#directory-temp{
	 	text-decoration: none;
 }
#directory-temp .profile-userpic img {
   float: none;
   margin: 0 auto;
   width: 150px;
   height: 150px;
   -webkit-border-radius: 50% !important;
   -moz-border-radius: 50% !important;
   border-radius: 50% !important;
 }	 


 #directory-temp p {		
	font-size: 13px;
	padding: 0;
	font-family: 'Open Sans', Arial, sans-serif;
	text-shadow: none;	

}	
#directory-temp .profile-userpic img:hover{
	border: 2px solid #ff4e00 !important;			
	-webkit-transition: all .3s ease-in-out;
	-moz-transition: all .3s ease-in-out;
	-o-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;	
			
}
.error {
    border: 2px solid red;	
    background: rgb(77,190,255);
}
#directory-temp .breadcrumb {
	margin-left:0px;
}

</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<div class="bootstrap-wrapper">
		<div class="container iv-top-buffer" id="directory-temp"> 	
		 <?php
		 $wp_directory= new wp_iv_directories();
		 
		 while ( have_posts() ) : the_post();			
			$id = get_the_ID();
		 ?>	
			<div class="col-md-12 ">
					<h3 class="page-header"> <?php the_title(); ?> </h3>
			</div>
			<?php
					$currentCategory=wp_get_object_terms( $id, 'directories-category');
					$cat_link='';$cat_name='';$cat_slug='';
					if(isset($currentCategory[0]->slug)){										
						$cat_slug = $currentCategory[0]->slug;
						$cat_name = $currentCategory[0]->name;
						
						$cat_link= get_term_link($currentCategory[0], 'directories-category');
						
					}
			?>	
			<div class="col-md-12 col-sm-12 col-xs-12 " style= "margin-bottom:10px;margin-top: -15px;">
				<div class="row ">					
					<h5><?php echo '<a style="text-decoration: none;" href="'.get_post_type_archive_link( 'directories' ) .'"> '.__('Directories /','ivdirectories').' </a>'; ?> <?php  echo'<a style="text-decoration: none;" href="'.$cat_link.'">'. $cat_name.'</a>' ;?> </h5>
									
				</div>
			</div>	
			
			<div class=" iv-top-buffer">		
				<div class="col-md-5 col-sm-12 col-xs-12 ">
					<?php				
					 include( wp_iv_directories_template. 'directories/single-map.php');
					?>					
				</div>
				<div class="col-md-3 col-sm-12 col-xs-12">
				
							<div class="row">							
							<?php echo '<div class="col-md-1 col-sm-1 col-xs-1"><i class="fa fa-location-arrow "></i></div> <div class="col-md-10 col-sm-10 col-xs-10"><h5><a style="text-decoration: none;" href="http://maps.google.com/maps?saddr=Current+Location&amp;daddr='.$lat.'%2C'.$lng.'" target="_blank"">'.get_post_meta($id,'address',true).'&nbsp;</a></h5></div>';?>
							</div>
							<div class="row ">
							<?php echo '<div class="col-md-1 col-sm-1 col-xs-1" style= "margin-top:10px"><i class="fa fa-phone "></i></div><div class="col-md-10 col-sm-10 col-xs-10" style= "margin-top:10px"><a style="text-decoration: none;" href="tel:'.get_post_meta($id,'phone',true).'"><h5>'.get_post_meta($id,'phone',true).'</h5>&nbsp;'.'</a></div>';?>
							</div>
							<div class="row ">
							<?php echo '<div class="col-md-1 col-sm-1 col-xs-1" ><i class="fa fa-globe"></i></div><div class="col-md-10 col-sm-10 col-xs-10"><a style="text-decoration: none;" href="'.get_post_meta($id,'contact_web',true).'" target="_blank"><p>'. get_post_meta($id,'contact_web',true).'</a>'.'</p></div>';?>						
							</div>
							
						<div class="row " style= "margin-top:10px">	
							
									<?php
									$now = time();
									$new_badge_day=get_option('_iv_new_badge_day');
									if($new_badge_day==''){$new_badge_day=7;}
									 $post_date = strtotime($post->post_date);
									 $datediff = $now - $post_date;
									 $total_day =  floor($datediff/(60*60*24));
									 if($total_day<=$new_badge_day ){ ?>
										<div class=" col-md-4 col-sm-4 col-xs-4">
											<img  width="40px" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/newicon-big.png";?>">
										</div>
									<?php	
									 }
									$post_author_id= $post->post_author;
									$author_package_id=get_user_meta($post_author_id, 'iv_directories_package_id', true); 
									$have_vip_badge= get_post_meta($author_package_id,'iv_directories_package_vip_badge',true);
									$exprie_date= strtotime (get_user_meta($post_author_id, 'iv_directories_exprie_date', true));	
									$current_date=time();	
									?>
									
									<?php
									if($have_vip_badge=='yes'){
										if($exprie_date >= $current_date){ ?>
											<div class=" col-md-4 col-sm-4 col-xs-4">								
													<img style="width:30px" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/vipicon.png";?>">
											</div>
										<?php
										}	
									}								
									?>
							
							
							<div class=" col-md-4 col-sm-4 col-xs-4">	
								<div id="fav_dir<?php echo $id; ?>">					
										<?php
											$user_ID = get_current_user_id();
											if($user_ID>0){
												$my_favorite = get_post_meta($id,'_favorites',true);
												$all_users = explode(",", $my_favorite);
												if (in_array($user_ID, $all_users)) { ?>
													<a style="text-decoration: none;" data-toggle="tooltip" data-placement="bottom" title="<?php _e('Added to Favorites','ivdirectories'); ?>" href="javascript:;" onclick="save_unfavorite('<?php echo $id; ?>')" >   
													<span class="hide-sm"><i class="fa fa-heart  red-heart fa-lg"></i>&nbsp;&nbsp; </span></a> 
												<?php								
												}else{ ?>
													<a style="text-decoration: none;" data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" onclick="save_favorite('<?php echo $id; ?>')" >
													<span class="hide-sm"><i class="fa fa-heart fa-lg"></i>&nbsp;&nbsp; </span>
													</a> 
												<?php	
												}												
											}else{ ?>
													<a style="text-decoration: none;" data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" onclick="save_favorite('<?php echo $id; ?>')" >
													<span class="hide-sm"><i class="fa fa-heart fa-lg"></i>&nbsp;&nbsp; </span>
													</a> 
										<?php							
											}											 
										?>
								</div>						
							</div>
						</div>
						
						
						
						<div class="row iv-top-buffer">
							<div class="col-md-12 col-sm-12 col-xs-12" >
								<a class='btn btn-info btn-sm popup-claim' href="<?php echo admin_url('admin-ajax.php').'?action=iv_directories_claim_popup&dir-id='.$id; ?>"> <?php _e('Claim The Listing','ivdirectories'); ?> </a>
							</div>						
													
						</div>
						<div class="row "style= "margin-top:10px">
							<div class="col-md-12 col-sm-12 col-xs-12" >
							<i class="fa fa-share fa-lg"></i> 
								<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Share On Facebook','ivdirectories'); ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();  ?>"><i class="fa fa-facebook-square fa-lg"></i></a>	
								
								<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Share On Twitter','ivdirectories'); ?>" href="https://twitter.com/home?status=<?php the_permalink();  ?>"><i class="fa fa-twitter fa-lg"></i></a>
								
								<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Share On linkedin','ivdirectories'); ?>" href="https://www.linkedin.com/shareArticle?mini=true&url=test&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin-square fa-lg"></i></a>
								
								<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Share On google+','ivdirectories'); ?>" href="https://plus.google.com/share?url=<?php the_permalink();  ?>"><i class="fa fa-google-plus-square fa-lg"></i></a>
							
							</div>
						</div>
						
						
				</div>
				<?php
					$post_user_name = get_the_author();
					$user= get_user_by( 'login', $post_user_name);
					
					$author_email= $user->user_email;
					$author_id= $user->ID;
					$iv_redirect_user = get_option( '_iv_directories_profile_public_page');
					$reg_page_user='';
					if($iv_redirect_user!='defult'){ 
						$reg_page_user= get_permalink( $iv_redirect_user) ; 										 
					}
					
					$iv_profile_pic_url=get_user_meta($author_id, 'iv_profile_pic_thum',true);					
					$reg_page_u=$reg_page_user.'?&id='.$user->user_login; //$reg_page ;
				?>
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center" >
					<div class="profile-userpic text-center"> 
						<a href="<?php echo $reg_page_u; ?>">	
						  <?php			  	
							if($iv_profile_pic_url!=''){ ?>
							 <img src="<?php echo $iv_profile_pic_url; ?>">
							<?php
							}else{
								
							 echo'	 <img src="'. wp_iv_directories_URLPATH.'assets/images/Blank-Profile.jpg" class="agent">';
							}
							?>  
						</a>	
                      </div>
					<div class="profile-usertitle-name text-center" style= "margin-top:10px">	
							
						 <h5> <?php echo $user->user_nicename; ?></h5>
						 <h5><?php _e('Listing Owner','ivdirectories'); ?> </h5>
						 <?php 
						if( get_user_meta($author_id,'hide_email',true)==''){?>
								<p	> 
									<?php echo $author_email; ?>
								</p>
						
						<?php
						}		
						 ?>
						
						 <a class="btn btn-info btn-sm popup-contact " style= "margin-top:0px"  href="<?php echo admin_url('admin-ajax.php').'?action=iv_directories_contact_popup&dir-id='.$id; ?>"><i class="fa fa-envelope-o"></i> <?php _e('Send Message','ivdirectories'); ?> </a>
							
					<div>	
							
							
						</div>
					</div>
					
				</div>	
			</div>
				
					
				<div class="col-md-8 col-sm-12 col-xs-12 iv-top-buffer">
				
				<h3 class="page-header"> <?php _e('Photos','ivdirectories'); ?></h3>
					<?php	
								
					if($wp_directory->check_reading_access('image')){ ?>
							<?php
					
							//get_template_part( 'content', 'single' );					
							$gallery_ids=get_post_meta($id ,'image_gallery_ids',true);
							$gallery_ids_array = array_filter(explode(",", $gallery_ids));
							
							if(sizeof($gallery_ids_array)>0){ 
							echo '<div class="col-md-12">';
								include( wp_iv_directories_template. 'directories/single-slider.php');
								echo'</div>';
							}else{ 
									if(has_post_thumbnail($id)){
									
										the_post_thumbnail( 'large','class=img-responsive' );
								
									}else{
										?>										
										<img  class="img-responsive"  src="<?php echo  wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";?>">
										
									<?php
									}			
							}
							?>	
					
					<?php	
					}else{ 
						echo get_option('_iv_visibility_login_message');	
							
					}
					?>
					
									
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 ">
						<div class="col-md-12 col-sm-12 col-xs-12 iv-top-buffer " style="padding-left:0px">
							<h3 class="page-header"> <?php _e('Amenities/Tag','ivdirectories'); ?></h3>

								  <?php 						 
									$tag_array= wp_get_post_tags( $id );							
									echo '<ul class="tags">';
									foreach($tag_array as $one_tag){								
										echo'<li><a href="'.get_tag_link($one_tag->term_id) .'">'.$one_tag->name.'</a></li>';							
									}
									echo'</ul>';
								  ?>
						</div>	
						<?php
						 if(get_post_meta($id,'facebook',true)!='' || get_post_meta($id,'twitter',true)!='' || get_post_meta($id,'linkedin',true)!=''|| get_post_meta($id,'gplus',true)!='' ){
						
						?>
						
							  	
						<div class="col-md-12 col-sm-12 col-xs-12 iv-top-buffer" style="padding-left:0px">		  
							<h3 class="page-header"> <?php _e('Social Profile','ivdirectories'); ?> </h3>
								<div class="col-md-12 col-xs-12 " style="padding-left:0px">
									<?php
									if(get_post_meta($id,'facebook',true)!=""){ ?>
										<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Facebook Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'facebook',true);?>" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>	
									<?php	
									}
									?>
									<?php
									if(get_post_meta($id,'twitter',true)!=""){ ?>
										<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Twitter Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'twitter',true);?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>	
									<?php	
									}
									?>
									<?php
									if(get_post_meta($id,'linkedin',true)!=""){ ?>
										<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('linkedin Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'linkedin',true);?>" target="_blank"><i class="fa fa-linkedin-square fa-2x"></i></a>	
									<?php	
									}
									?>
									<?php
									if(get_post_meta($id,'gplus',true)!=""){ ?>
										<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('google+ Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'gplus',true);?>" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>	
									<?php	
									}
									?>
							</div>	  
						</div>  
					<?php
						}
					?>					
				</div>	
			
				
				<div class="col-md-8 col-sm-12 col-xs-12 iv-top-buffer">
					<h3 class="page-header"> <?php _e('Description','ivdirectories'); ?> </h3>	
						
						<?php	
								
						if($wp_directory->check_reading_access('description')){ ?>
							<?php
								
									$content = apply_filters( 'the_content', get_the_content() );
									$content = str_replace( ']]>', ']]&gt;', $content );	
									echo '<p>'. $content.'</p>';
								?>
							<?php	
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
						?>
					
				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 iv-top-buffer">
					
					<h3 class="page-header"> <?php _e('Contact Info','ivdirectories'); ?> </h3>
					<h5>
					<?php	
								
						if($wp_directory->check_reading_access('contact info')){ ?>
								
							<div class="row">
								<div class="col-md-4 col-xs-4" style="padding-left:0px">					
									<?php _e('Location','ivdirectories'); ?>				
								</div>	
								<div class="col-md-8 col-xs-8 ">: 
									<?php
									echo '<a style="text-decoration: none;" href="http://maps.google.com/maps?saddr=Current+Location&amp;daddr='.$lat.'%2C'.$lng.'" target="_blank"">'.get_post_meta($id,'address',true).'</a>';
									?>
									
									<?php //echo trim(get_post_meta($id,'address',true));?>					
								</div>	
							</div>
							
							<div class="row" style= "margin-top:10px">
								<div class="col-md-4 col-xs-4" style="padding-left:0px">					
									<?php _e('Phone','ivdirectories'); ?>				
								</div>	
								<div class="col-md-8 col-xs-8">	:		
									<?php echo '<a style="text-decoration: none;" href="tel:'.get_post_meta($id,'phone',true).'">'.get_post_meta($id,'phone',true).'</a>' ;?>					
								</div>	
							</div>
							<div class="row" style= "margin-top:10px">
								<div class="col-md-4 col-xs-4" style="padding-left:0px">					
									<?php _e('Fax','ivdirectories'); ?>				
								</div>	
								<div class="col-md-8 col-xs-8">	:	
									<?php echo get_post_meta($id,'fax',true).'&nbsp;';?>					
								</div>
							</div>
							<div class="row" style= "margin-top:10px">
								<div class="col-md-4 col-xs-4" style="padding-left:0px">					
									<?php _e('Email ','ivdirectories'); ?>				
								</div>	
								<div class="col-md-8 col-xs-8">	:		
									<?php echo get_post_meta($id,'contact-email',true).'&nbsp;';?>					
								</div>	
							</div>	
							<div class="row" style= "margin-top:10px">
								<div class="col-md-4 col-xs-4" style="padding-left:0px">					
									<?php _e('Web Site','ivdirectories'); ?>				
								</div>	
								<div class="col-md-8 col-xs-8">	:				
									<?php echo '<a style="text-decoration: none;" href="'. get_post_meta($id,'contact_web',true).'" target="_blank"">'. get_post_meta($id,'contact_web',true).'&nbsp; </a>';?>					
								</div>		
							</div>	
							<div class="row " style= "margin-top:10px">
								<div class="col-md-4 col-xs-4" style="padding-left:0px">
								</div>	
								<div class="col-md-8 col-xs-8">				
									<a class='btn btn-info btn-sm popup-contact' href="<?php echo admin_url('admin-ajax.php').'?action=iv_directories_contact_popup&dir-id='.$id; ?>"> <i class="fa fa-envelope-o"></i> <?php _e(' Send Message','ivdirectories'); ?> </a>				
								</div>		
							</div>	
							
						<?php	
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
						?>	
				  </h5>	
				</div>
			
				<?php
				 $video_vimeo_id= get_post_meta($id,'vimeo',true);
				 $video_youtube_id=get_post_meta($id,'youtube',true);
				if($video_vimeo_id!='' || $video_youtube_id!=''){
				?>	
				<div class="col-md-8 col-sm-12 col-xs-12 iv-top-buffer">
					<h3 class="page-header"> <?php _e('Video','ivdirectories'); ?> </h3>	
						<?php	
								
						if($wp_directory->check_reading_access('video')){ ?>
									<?php
									 $v=0;
									 $video_vimeo_id= get_post_meta($id,'vimeo',true);
									 if($video_vimeo_id!=""){ $v=$v+1; ?>
											<iframe src="https://player.vimeo.com/video/<?php echo $video_vimeo_id; ?>" width="100%" height="315px" frameborder="0"></iframe> 
									<?php		
									 }
									?>
									<br/>
									<?php
									 $video_youtube_id=get_post_meta($id,'youtube',true);
									 if($video_youtube_id!=""){ 
											echo($v==1?'<hr>':''); 
										 ?>	
															
											<iframe width="100%" height="315px" src="https://www.youtube.com/embed/<?php echo $video_youtube_id; ?>" frameborder="0" allowfullscreen></iframe>
									<?php		
									 }
									?>
							<?php	
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
						?>
					
					
				</div>
				<?php
				}
				?>
			
				
						<?php					
						$openin_days =get_post_meta($id ,'_opening_time',true);
						if($openin_days!=''){
						if(sizeof($openin_days)>0){?>		
							<div class="col-md-4 col-sm-12 col-xs-12 iv-top-buffer" >				
								<h3 class="page-header"> <?php _e('Opening Time','ivdirectories'); ?> </h3>
								
							<?php						
								foreach($openin_days as $key => $item){
									$day_time = explode("|", $item);	
									echo '<div class="row " style= "margin-top:10px;""> 
										<div class="col-md-4 col-xs-6" style="padding-left:0px;"><h5>'.$key.'</h5></div> <div class="col-md-8 col-xs-6" style="padding-right:0px;"> <h5>: '.$day_time[0].' - '.$day_time[1].'</h5></div> </div> ';
								}
								?>
								</div>		
							<?php												
						} }
					 ?>		
					
			
			
				<div class="col-md-8 iv-top-buffer">
					<h3 class="page-header"> <?php _e('Additional Info','ivdirectories'); ?> </h3>
					<?php
									
					$i=1;	
					$field_set=get_option('iv_directories_fields' );
					if($field_set!=""){ 
							$default_fields=get_option('iv_directories_fields' );
					}else{															
							$default_fields['business_type']='Business Type';
							$default_fields['main_products']='Main Products';
							$default_fields['number_of_employees']='Number Of Employees';
							$default_fields['main_markets']='Main Markets';
							$default_fields['total_annual_sales_volume']='Total Annual Sales Volume';	
					}
					if(sizeof($default_fields)>0){ 						
						foreach ( $default_fields as $field_key => $field_value ) {	
							$field_value_trim=trim($field_value);
							?>	
							<div class="row" style= "margin-top:10px;">
								<div class="col-md-4 col-xs-6" style="padding-left:0px"><h5><?php echo _e($field_value_trim, 'wp_iv_directories'); ?></h5></div>						
								<div class="col-md-6 col-xs-6" style="padding-right:0px"><h5>:
										<?php echo ' '.get_post_meta($id,$field_key,true); ?>
									</h5>
								</div>
							</div>	
						  
						<?php
						}						
					}
					?>			
				</div>
				
			
			<div class="col-md-4 col-sm-12 col-xs-12 iv-top-buffer"  >
				
					<?php									
						if($wp_directory->check_reading_access('booking')){ 
								
								if(trim(get_post_meta($id, 'booking', true))!="" || trim(get_post_meta($id, 'booking_detail', true))!=""){
								?>
									<h3 class="page-header"> <?php _e('Booking','ivdirectories'); ?> </h3>	 
									
								<?php							
								
								}
								
								if(get_post_meta($id, 'booking_detail', true)!=""){
									?>									
										
											<div class="col-md-12" style="padding-left:0px">
											<?php 
													echo get_post_meta($id, 'booking_detail', true);
												
											?>
											</div>
										
								<?php
								}
								$booking_short_code= get_post_meta($id, 'booking', true);					
								$booking_shortcode_main = str_replace("[", '', $booking_short_code);
								$booking_shortcode_main = str_replace("]", '', $booking_shortcode_main);
								if($booking_short_code!=''){
									//if ( shortcode_exists( $booking_shortcode_main) ){ 
								?>								
								
								
										<div class="col-md-12" style="padding-left:0px">
										<?php 													
												echo do_shortcode($booking_short_code); 
										?>
										</div>
									
							<?php
									//}
							}	
							
							
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
						?>	
				
			</div>	
			
		
			
			<?php
			$event_title=get_post_meta($id,'event_title',true);
			$event_detail=get_post_meta($id,'event_detail',true);
			if(trim($event_title)!='' || trim($event_detail)!='' ){
			?>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 iv-top-buffer">
					<h3 class="page-header"> <?php _e('Event','ivdirectories'); ?> </h3>
					 <div class=" ">
						<?php									
						if($wp_directory->check_reading_access('event')){ ?>
								<div class="col-md-6 " style="padding-left:0px;">
									
										<?php
										$event_img=get_post_meta($id,'_event_image_id',true);
										if($event_img!=''){
											$image_attributes = wp_get_attachment_image_src( $event_img ,'full' ); 
											
											?>
											<img class="col-md-12 col-xs-12  img-responsive " style="padding-left:0px;"  src="<?php echo $image_attributes[0]; ?>" >
										<?php	
										}
										?>							
								</div>
								<div class="col-md-6 ">
									<div class="col-md-12">
									<h4><strong><?php echo get_post_meta($id,'event_title',true);?></strong> </h4>
									</div>
									<div class="col-md-12 ">
										<p>
									<?php echo  get_post_meta($id,'event_detail',true);?>	
										</p >
									</div>	
								
								</div>
							<?php	
						}else{ 
							//echo get_option('_iv_visibility_login_message');	
								
						}
						?>	
					</div>	
				</div>
					
			</div>	
			<?php
			}
			?>
			
				<?php
					$deal_image_id=get_post_meta($id,'_deal_image_id',true);
					$currencyCode= get_option('_iv_directories_api_currency');
					$deat_title=get_post_meta($id,'deal_title',true);
					$deat_detail=get_post_meta($id,'deal_detail',true);
				if($deat_title!='' || $deat_detail!='' || $deal_image_id!=''){
				?>	
					<div class="col-md-12 col-sm-12 col-xs-12 iv-top-buffer">
					<h3 class="page-header"> <?php _e('Deal/ Coupon','ivdirectories'); ?> </h3>	 	
					<div class="row">
						<?php									
						if($wp_directory->check_reading_access('coupon')){ ?>
							
							<div class="col-md-6" style="padding-left:0px;" >
							<?php
							
								
								if($deal_image_id!=''){
									$image_attributes = wp_get_attachment_image_src( $deal_image_id ,'full' ); 
									
									?>
									<img class="col-md-12 col-xs-12  img-responsive" style="padding-left:0px;"   src="<?php echo $image_attributes[0]; ?>" >
									
											
								<?php	
								}
								?>
							</div>	
							
							<div class="col-md-6">	
							<div class="col-md-12">	
								<h4><strong><?php echo get_post_meta($id,'deal_title',true);
										$deat_title=get_post_meta($id,'deal_title',true);
										if($deat_title==""){$deat_title=site_url().' Deal/Coupon ';}
								?> </strong> </h4>
							</div>	
							<div class="col-md-12 ">	
								<p>
								 <?php echo get_post_meta($id,'deal_detail',true);?> 
								</p> 
							</div>
							<!--	for LIVE
								<form action="https://www.paypal.com/cgi-bin/webscr" onkeypress="return event.keyCode != 13;" method="post">
							-->
							
							<form id="deal_paypa_form" name="deal_paypa_form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" onkeypress="return event.keyCode != 13;" method="post">	
							<?php
								if(get_post_meta($id,'deal_amount',true)>0 AND get_post_meta($id,'deal_paypal',true)!=""){ 
								$client_email='';									
								?>	
								<div class="col-md-6 iv-top-buffer">	
									 <h5><?php _e('Amount : ','ivdirectories'); ?> </h5>								
								</div>	
								<div class="col-md-6 iv-top-buffer">	
									 <h5><?php echo $currencyCode.get_post_meta($id,'deal_amount',true);?> </h5>
								</div>
								<div class="col-md-6 iv-top-buffer">	
									 <h5><?php _e('Your Email : ','ivdirectories'); ?> </h5>								
								</div>	
								<div class="col-md-6 iv-top-buffer">	
									 <input type="text" class="required"  name="deal_client_email" id="deal_client_email"  >
								</div>
								
								<div class="col-md-12 " id="deal_email_message">	
									
								</div>
								
								<div class="col-md-12 iv-top-buffer">	
										
										<!-- Identify your business so that you can collect the payments. -->
										<input type="hidden" name="business" value="<?php echo get_post_meta($id,'deal_paypal',true);?>">
										
										<input type="hidden" name="cmd" value="_xclick">
										<!-- Specify details about the item that buyers will purchase. -->
										<input type="hidden" name="item_name" value="<?php echo $deat_title; ?>">
										<input type="hidden" name="amount" value="<?php echo get_post_meta($id,'deal_amount',true);?>">
										<input type="hidden" name="quantity" value="1">
										<input type="hidden" name="currency_code" value="<?php echo $currencyCode; ?>">
										
										<input type="hidden" name="cancel_return" value="<?php the_permalink(); ?>">
										<input type="hidden" name="return" value="<?php the_permalink(); ?>">
										<?php
										$notify_url=  admin_url('admin-ajax.php').'?&action=iv_directories_paypal_notify_url&dir_id='.$id.'&client_email='.$client_email;
									
										?>
										<input type="hidden" name="notify_url" id="notify_url"  value="<?php echo $notify_url; ?>">
										
										

										<!-- Display the payment button. -->
										<button type="submit" class="btn btn-primary"><?php _e('Pay By Paypal','ivdirectories'); ?> </button>
										
										
							
										
										
								
								
								<?php								
								}
								?>	
								</div>
							</form> 
						</div>
						<?php
							
							
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
						?>	
				
				</div>	
								
				</div>
				<?php
					}
				?>
			
			
		
			
		</div>	
	</div>

<?php
endwhile;
?>

<script>
	function save_favorite(id) {       
		
		  var isLogged ="<?php echo get_current_user_id();?>";
                               
                if (isLogged=="0") {                   
                     alert("<?php _e('Please login to add favorite','ivdirectories'); ?>");
                } else { 
						
						var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';						 
						var search_params={
							"action"  : 	"iv_directories_save_favorite",	
							"data": "id=" + id,
						};
						
						jQuery.ajax({					
							url : ajaxurl,					 
							dataType : "json",
							type : "post",
							data : search_params,
							success : function(response){ 
								jQuery("#fav_dir"+id).html('<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Added to Favorites','ivdirectories'); ?>" href="javascript:;" onclick="save_unfavorite('+id+')" ><span class="hide-sm"><i class="fa fa-heart  red-heart fa-lg"></i>&nbsp;&nbsp; </span></a>');
							
								
							}
						});
						
				}  
				
    }
	function save_unfavorite(id) {       
		
		  var isLogged ="<?php echo get_current_user_id();?>";
                               
                if (isLogged=="0") {                   
                     alert("<?php _e('Please login to remove favorite','ivdirectories'); ?>");
                } else { 
						
						var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';						
						var search_params={
							"action"  : 	"iv_directories_save_un_favorite",	
							"data": "id=" + id,
						};
						
						jQuery.ajax({					
							url : ajaxurl,					 
							dataType : "json",
							type : "post",
							data : search_params,
							success : function(response){ 
								jQuery("#fav_dir"+id).html('<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" onclick="save_favorite('+id+')" ><span class="hide-sm"><i class="fa fa-heart fa-lg "></i>&nbsp;&nbsp; </span></a>');
							
								
							}
						});
						
				}  
				
    }
</script>
	<div class="row iv-top-buffer">
	</div>
 </div>	
 <script>
jQuery(document).ready(function($) {		
		jQuery(".popup-contact").colorbox({transition:"None", width:"450px", height:"450px" ,opacity:"0.70"});
		
})	
jQuery(document).ready(function($) {
	
		jQuery(".popup-claim").colorbox({transition:"None", width:"450px", height:"450px" ,opacity:"0.70"});
		
})

jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
})
jQuery(function () {
	jQuery('#deal_client_email').on('keyup', function() {
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';	
		var notify_url=  ajaxurl +'?&action=iv_directories_paypal_notify_url&dir_id=<?php echo $id; ?>&client_email=';
									
		var deal_email = jQuery('#deal_client_email').val();
		notify_url = notify_url+deal_email;
		jQuery('#notify_url').val(notify_url);
    });
	
})
jQuery("#deal_paypa_form").submit(function(){
    var isFormValid = true;
	//alert();    
	if ($.trim(jQuery('#deal_client_email').val()).length == 0){
		jQuery('#deal_client_email').addClass("error");
		isFormValid = false;
	}
	else{
		var email_valid= isValidEmailAddress(jQuery('#deal_client_email').val());
		
		if(email_valid==false){
				isFormValid = false;
		}else{
				jQuery('#deal_client_email').removeClass("error");
		}
	}
  

    if (!isFormValid){
		jQuery('#deal_email_message').html('<?php _e('Please enter your email address','ivdirectories'); ?>');
	}
    
     

    return isFormValid;
});
function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&"\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&"\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
	return pattern.test(emailAddress);
}	
</script>

<?php 
wp_enqueue_style('wp-iv_directories-style-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');

wp_enqueue_style('wp-iv_directories-bidding-style-102', wp_iv_directories_URLPATH . 'admin/files/css/colorbox.css');
wp_enqueue_script('wp-iv_directories-bidding-script-103', wp_iv_directories_URLPATH . 'admin/files/js/jquery.colorbox-min.js');

//wp_enqueue_script('iv_directories-script-16', wp_iv_directories_URLPATH . 'admin/files/js/jssor.js');
wp_enqueue_script('iv_directories-script-15', wp_iv_directories_URLPATH . 'admin/files/js/jssor.slider.mini.js');

get_footer(); ?>
