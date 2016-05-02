<?php
global $post,$wpdb;

	 $id=$_GET['id'];
	//print_r($_REQUEST);
	$id = $_GET['id'];
	 $post_id_1 = get_post($id);
	$post_id_1->post_title;

//wp_enqueue_style('iv_directories-style-359', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
$wp_directory= new wp_iv_directories();
	$logo_image_id=get_post_meta($id ,'logo_image_id',true);
	
	$directory_url=get_option('_iv_directory_url');					
	if($directory_url==""){$directory_url='directories';}	
?>
 <style>
 .red-heart { color: #53668A; }
 .icon-blue { color: #53668A; }
 .cbp-l-project-adi-list strong {
    display: inline-block;
    color: #696969;
    font-weight: 600;
    min-width: 200px;
}
.cbp-l-project-adi-list {
    margin: 0px;
    padding: 0px;
    list-style: outside none none;
	font: 400 12px/30px "Open Sans",sans-serif;
}
.cbp-l-award-title {
    font: 400 16px/25px "Open Sans",sans-serif;
    color: #474747;
}
 .cbp-l-inline-right-hd {
    float: right;
    width: 56%;
    padding-left: inherit;
}
textarea
{
  width:100%;
}
.tags{
    clear: both;
    margin:40px 0 0 0;
    padding:0;
    
    list-style:none;
    }
.tags li{ margin-bottom: 10px !important;}
.tags li, .tags a{
    float:left;
    height:24px;
    line-height:24px;
    position:relative;
    font-size:11px;
    }
.tags a{
    margin-left:20px;
    padding:0 10px 0 12px;
    background:#0089e0 !important;
    color:#fff !important;
    text-decoration:none !important;
    -moz-border-radius-bottomright:4px;
    -webkit-border-bottom-right-radius:4px; 
    border-bottom-right-radius:4px;
    -moz-border-radius-topright:4px;
    -webkit-border-top-right-radius:4px;    
    border-top-right-radius:4px;    
    } 
 .tags a:before{
    content:"";
    float:left;
    position:absolute;
    top:0;
    left:-12px;
    width:0;
    height:0;
    border-color:transparent #0089e0 transparent transparent;
    border-style:solid;
    border-width:12px 12px 12px 0;      
    }
 .tags a:after{
    content:"";
    position:absolute;
    top:10px;
    left:0;
    float:left;
    width:4px;
    height:4px;
    -moz-border-radius:2px;
    -webkit-border-radius:2px;
    border-radius:2px;
    background:#fff;
    -moz-box-shadow:-1px -1px 2px #004977 !important;
    -webkit-box-shadow:-1px -1px 2px #004977 !important;
    box-shadow:-1px -1px 2px #004977 !important;
    }
    .tags a:hover{background:#555!important;} 

.tags a:hover:before{border-color:transparent #555 transparent transparent !important;}
    .view_left_container img {
        max-width: 350px;
        height: auto !important;
        width: expression(this.width > 350 ? 350: true);
    }
 .cbp-3-project-desc {   
    width: 100%;
}
.cbp-3-project-desc-title {
  /* @editable properties */
  border-bottom: 1px solid #cdcdcd;
  margin-bottom: 22px;
  color: #444; }
.cbp-l-award-title  {
  /* @editable properties */
  font: 400 18px/36px "Open Sans", sans-serif;
  padding: 0 5px 0 0; 
  }     
 </style>

  
<div class="cbp-l-project-title">
		
	<?php 
	
	echo $post_id_1->post_title; ?>

</div>
<div class="cbp-l-project-subtitle">



</div>

<div class="cbp-slider">
    <ul class="cbp-slider-wrap">		
				<?php					
				//get_template_part( 'content', 'single' );					
				
				$gallery_ids=get_post_meta($id ,'image_gallery_ids',true);
				$gallery_ids_array = array_filter(explode(",", $gallery_ids));
				$i=1;
					foreach($gallery_ids_array as $slide){
						if($slide!=''){ ?>
						 <li class="cbp-slider-item">	
							<img src="<?php echo wp_get_attachment_url( $slide ); ?> " >						
						 </li>
						<?php
						$i++;	
						}						 
					}
				if(sizeof($gallery_ids_array)<1){ 
					
						if(has_post_thumbnail($id)){
							echo'<li class="cbp-slider-item">';
								echo get_the_post_thumbnail($id, 'large');
							echo '</li>';
						}else{
							?>		
							 <li class="cbp-slider-item">									
								<img   src="<?php echo  wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";?>">
							 </li>
						<?php
						}			
				}				
			?>
	</ul>
</div>




<div class="cbp-l-project-container">
    <div class="cbp-l-project-desc">
        <div class="cbp-l-project-desc-title"><span><?php _e('Location Map','ivdirectories'); ?></span> 
			
				<span style="float:right;">	
									<?php
									$now = time();
									$new_badge_day=get_option('_iv_new_badge_day');
									if($new_badge_day==''){$new_badge_day=7;}
									 $post_date = strtotime($post_id_1->post_date);
									 $datediff = $now - $post_date;
									 $total_day =  floor($datediff/(60*60*24));
									 if($total_day<=$new_badge_day ){ ?>
										
										<img  style="width:40px;margin-bottom:-8px" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/newicon-big.png";?>">
									
									<?php	
									 }
									$post_author_id= $post_id_1->post_author;
									$author_package_id=get_user_meta($post_author_id, 'iv_directories_package_id', true); 
									$have_vip_badge= get_post_meta($author_package_id,'iv_directories_package_vip_badge',true);
									$exprie_date= strtotime (get_user_meta($post_author_id, 'iv_directories_exprie_date', true));	
									$current_date=time();	
									?>
									
									<?php
									if($have_vip_badge=='yes'){
										if($exprie_date >= $current_date){ ?>
											<img style="width:30px; margin-bottom:-10px" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/vipicon.png";?>">										
										<?php
										}	
									}								
									?>
									
									
				<span id="fav_dir<?php echo $id; ?>">					
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
				</span>	
			</span>	
		</div>
        <div class="cbp-l-project-desc-text">
			<?php
				$lat=get_post_meta($id,'latitude',true);
				$lng=get_post_meta($id,'longitude',true);
				
				// Get latlng from address* START********
				$dir_lat=$lat;
				$dir_lng=$lng;
				$address = get_post_meta($id,'address',true);
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
								update_post_meta($id,'latitude',$latitude);
							}
							if($longitude!=''){
								update_post_meta($id,'longitude',$longitude);
							}
							$lat=$latitude;
							$lng=$longitude;
						}
				}
			?>
			
			<iframe width="100%" height="325" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=<?php echo $address; ?>&amp;ie=UTF8&amp;&amp;output=embed"></iframe><br />

        </div>
    </div>
    <div class="cbp-l-project-details">
			<div class="cbp-l-project-details-title"><span><?php _e('Share','ivdirectories'); ?></span>
			</div>
			
			<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('Share On Facebook','ivdirectories'); ?>" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($id);  ?>"><i class="fa fa-facebook-square fa-2x"></i></a>	
			
			<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('Share On Twitter','ivdirectories'); ?>" href="https://twitter.com/home?status=<?php echo get_permalink($id);  ?>"><i class="fa fa-twitter fa-2x"></i></a>
			
			<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('Share On linkedin','ivdirectories'); ?>" href="https://www.linkedin.com/shareArticle?mini=true&url=test&title=<?php the_title(); ?>&summary=&source="><i class="fa fa-linkedin-square fa-2x"></i></a>
			
			<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('Share On google+','ivdirectories'); ?>" href="https://plus.google.com/share?url=<?php echo get_permalink($id);  ?>"><i class="fa fa-google-plus-square fa-2x"></i></a>
						
    </div>
     <div class="cbp-l-project-details">
			<div class="cbp-l-project-details-title"><span><?php _e('Contact Info','ivdirectories'); ?></span>
			</div>
			<?php
					if($wp_directory->check_reading_access('contact info',$id)){ 
							?>	
					<ul class="cbp-l-project-details-list">
						<li><strong><?php _e('Location','ivdirectories'); ?></strong>	
						<?php
							echo '<a  class="icon-blue" style="text-decoration: none;" href="http://maps.google.com/maps?saddr=Current+Location&amp;daddr='.$lat.'%2C'.$lng.'" target="_blank"">'.get_post_meta($id,'address',true).'</a>';
						?>
						</li>
						  <li><strong><?php _e('Phone','ivdirectories'); ?></strong>	
							<?php echo '<a class="icon-blue" style="text-decoration: none;" href="tel:'.get_post_meta($id,'phone',true).'">'.get_post_meta($id,'phone',true).'</a>' ;?>	
						</li>
						  <li><strong><?php _e('Fax','ivdirectories'); ?></strong>	
									<?php echo get_post_meta($id,'fax',true).'&nbsp;';?>			</li>
						  <li><strong><?php _e('Email','ivdirectories'); ?></strong>	
									<?php echo get_post_meta($id,'contact-email',true).'&nbsp;';?>					</li>
						  <li><strong><?php _e('Web Site','ivdirectories'); ?></strong>	
								<?php echo '<a style="text-decoration: none;" href="'. get_post_meta($id,'contact_web',true).'" target="_blank"">'. get_post_meta($id,'contact_web',true).'&nbsp; </a>';?>
						 </li>            
					</ul>
			<?php
			}else{ 
				echo get_option('_iv_visibility_login_message');	
								
			}
			?>
    </div>
    <?php
		$dir_social_show=get_option('_dir_social_show');	
		if($dir_social_show==""){$dir_social_show='yes';}
	 if($dir_social_show=='yes'){
    ?>
	  <div class="cbp-l-project-details">
		<?php
				  if(get_post_meta($id,'facebook',true)!='' || get_post_meta($id,'twitter',true)!='' || get_post_meta($id,'linkedin',true)!=''|| get_post_meta($id,'gplus',true)!=''|| get_post_meta($id,'instagram',true)!='' ){
				?>
									
				<div class="cbp-l-project-details-title"><span><?php _e('Social Profile','ivdirectories'); ?></span>
				</div>	  
					
					<?php
					if(get_post_meta($id,'facebook',true)!=""){ ?>
						<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('Facebook Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'facebook',true);?>" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>	
					<?php	
					}
					?>
					<?php
					if(get_post_meta($id,'twitter',true)!=""){ ?>
						<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('Twitter Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'twitter',true);?>" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>	
					<?php	
					}
					?>
					<?php
					if(get_post_meta($id,'linkedin',true)!=""){ ?>
						<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('linkedin Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'linkedin',true);?>" target="_blank"><i class="fa fa-linkedin-square fa-2x"></i></a>	
					<?php	
					}
					?>
					<?php
					if(get_post_meta($id,'gplus',true)!=""){ ?>
						<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('google+ Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'gplus',true);?>" target="_blank"><i class="fa fa-google-plus-square fa-2x"></i></a>	
					<?php	
					}
					if(get_post_meta($id,'instagram',true)!=""){ ?>
						<a data-toggle="tooltip" class="icon-blue" data-placement="bottom" title="<?php _e('instagram Profile','ivdirectories'); ?>" href="<?php echo get_post_meta($id,'instagram',true);?>" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>	
					<?php	
					}
									
				}
			?>
		</div>
		<?php
		}
		?>
</div>
				
				
				
				
					
<div class="cbp-l-project-container">
    <div class="cbp-l-project-desc">
        <div class="cbp-l-project-desc-title"><span><?php _e('About Us','ivdirectories'); ?> </span></div>
			<?php
			if($wp_directory->check_reading_access('description',$id)){ 
			?>			 
			<div class="cbp-l-project-desc-text"><?php
										$content = $post_id_1->post_content;
										$content = apply_filters('the_content', $content);									
										$content = str_replace( ']]>', ']]&gt;', $content );	
										echo  $content.'&nbsp';									
								?>		
			</div>
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
		if(sizeof($default_fields)>0){ 	?>
			<ul class="cbp-l-project-adi-list">
			<?php					
			foreach ( $default_fields as $field_key => $field_value ) {	
				$field_value_trim=trim($field_value);
				//if(get_post_meta($id,$field_key,true)!=""){
				?>	
				 <li><strong><?php echo _e($field_value_trim, 'wp_iv_directories'); ?></strong>	
					<?php echo ' : '.get_post_meta($id,$field_key,true); ?>
				</li>
			<?php
				//}
			}
			?>
		</ul>
		<?php							
		}
	}else{ 
			echo get_option('_iv_visibility_login_message');	
								
		}	
		
		?>			
	
	
				
    </div>
      
     <?php
		$dir_tag_show=get_option('_dir_tag_show');	
		if($dir_tag_show==""){$dir_tag_show='yes';}
		
		$dir_contact_show=get_option('_dir_contact_show');	
		if($dir_contact_show==""){$dir_contact_show='yes';}
		
		if($dir_tag_show=='yes'){
		?> 
				<div class="cbp-l-project-details">
					
					<div class="cbp-l-project-details-title"><span><?php _e( 'Amenities/Tag', 'ivdirectories' ); ?></span></div>
					<?php 						 
					$tag_array= wp_get_post_tags( $id );							
					echo '<ul class="tags">';
					foreach($tag_array as $one_tag){								
						//echo'<li><a href="'.get_tag_link($one_tag->term_id) .'">'.$one_tag->name.'</a></li>';
						echo'<li><a href="#">'.$one_tag->name.'</a></li>';
													
					}
					echo'</ul>';
					?>
			</div>
		<?php
		}
		?>
		<div class="cbp-l-project-details">						
			<?php
				if($dir_contact_show=='yes'){
			?>
			<div class="cbp-l-project-details-title" ><span><?php _e( 'Contact Us', 'ivdirectories' ); ?></span></div>
			<?php
			
					if($wp_directory->check_reading_access('contact info',$id)){ 
				?>
			   <form action="" id="message-pop" name="message-pop"  method="POST" role="form">
					<div class="cbp-l-grid-projects-desc">
						<input id="subject" name ="subject" type="text" placeholder="Enter Subject" class="cbp-search-input">
					</div>	
					<div class="cbp-l-grid-projects-desc">
						<input name ="email_address" id="email_address" type="text" placeholder="Enter Email" class="cbp-search-input">
					</div>				
					<div class="cbp-l-grid-projects-desc">
						<textarea name="message-content" id="message-content"  class="cbp-search-"  cols="54" rows="4" title="Please Enter Message"  placeholder="<?php _e( 'Enter Message', 'ivdirectories' ); ?>"  ></textarea>
					</div>
					 <input type="hidden" name="dir_id" id="dir_id" value="<?php echo $id; ?>">
					  <a onclick="send_message_iv();" class="cbp-l-project-details-visit"><?php _e( 'Send Message', 'ivdirectories' ); ?></a>
					  <div id="update_message_popup"></div>
					 
				</form> 
				<br/><br/>
			<?php
				}else{ 
						echo get_option('_iv_visibility_login_message');	
								
				}
			}	
				?>
			
				<?php					
					$openin_days =get_post_meta($id ,'_opening_time',true);
					if($openin_days!=''){
					if(sizeof($openin_days)>0){?>		
						 
					<div class="cbp-l-project-details-title" ><span ><?php _e('Opening Time','ivdirectories'); ?></span></div>		
							
							<ul class="cbp-l-project-details-list">
						<?php						
							foreach($openin_days as $key => $item){
								$day_time = explode("|", $item);	
								?>
								 <li><strong><?php echo $key; ?></strong><?php echo $day_time[0].' - '.$day_time[1];  ?></li>
								 
								<?php
								
								}
							?>
							   </ul>									
								<?php												
							} }
						 ?>			      
						
					
					
						<?php
						if($wp_directory->check_reading_access('booking')){ 					
							
							
								if(trim(get_post_meta($id, 'booking', true))!="" || trim(get_post_meta($id, 'booking_detail', true))!=""){
										?>
											<div class="cbp-l-project-details-title"><span style="margin-top:30px"><?php _e( 'Booking', 'ivdirectories' ); ?></span></div> 
											
										<?php							
										
										}
										
										if(get_post_meta($id, 'booking_detail', true)!=""){
											?>									
												
													<div class="cbp-l-grid-projects-desc">
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
										
										
												<div class="cbp-l-grid-projects-desc">
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
					
				
					
					
			
					
	</div>	
			
	
	
</div>

					
<div class="cbp-l-project-container">
	<div class="cbp-2-project-desc">		
		<?php
			
			if(trim(get_post_meta($id,'_award_title_0',true))!='' || trim(get_post_meta($id,'_award_description_0',true))|| trim(get_post_meta($id,'_award_year_0',true))|| trim(get_post_meta($id,'_award_image_id_0',true)) ){
								
				?>					
				<div class="cbp-l-project-desc-title"><span><?php _e('Awards','ivdirectories'); ?></span></div>
								
						<div class="cbp-l-project-desc-text">
							<?php		 
							   for($i=0;$i<20;$i++){			  
								   if(get_post_meta($id,'_award_title_'.$i,true)!='' || get_post_meta($id,'_award_description_'.$i,true) || get_post_meta($id,'_award_year_'.$i,true)|| get_post_meta($id,'_award_image_id_'.$i,true) ){?>
									  
									   <div class="cbp-l-inline">
											<div class="cbp-l-inline-left">		
												<?php 
													if(get_post_meta($id,'_award_image_id_'.$i,true)!=''){?>
														<img src="<?php echo wp_get_attachment_url( get_post_meta($id,'_award_image_id_'.$i,true) ); ?> " >
													<?php
													}
												
												?>							
													
											</div>

											<div class="cbp-l-inline-right-hd">
												<div class="cbp-l-award-title"><?php echo get_post_meta($id,'_award_title_'.$i,true); ?></div>
												<div class="cbp-l-inline-subtitle"><?php echo get_post_meta($id,'_award_year_'.$i,true); ?></div>
												<div class="cbp-l-inline-desc">
														<?php echo get_post_meta($id,'_award_description_'.$i,true); ?>
												</div>				
											</div>
										</div>					
											
									<?php	
									}
								}		  
							  ?>						
						</div>
			<?php
				}
			?>
					
			</div>	
			
    <div class="cbp-l-project-desc">
		<?php
			if($wp_directory->check_reading_access('video',$id)){ 
			?>				
				<?php
				 $video_vimeo_id= get_post_meta($id,'vimeo',true);
				 $video_youtube_id=get_post_meta($id,'youtube',true);
				if($video_vimeo_id!='' || $video_youtube_id!=''){
				?>	
        <div class="cbp-l-project-desc-title"><span><?php _e('Video','ivdirectories'); ?></span></div>
        <div class="cbp-l-project-desc-text">
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
			}
		}	 
			?>
        </div>
    </div>
    
		
		 	
			
			<div class="cbp-l-project-details">
				<?php
				$dir_claim_show=get_option('_dir_claim_show');	
				if($dir_claim_show==""){$dir_claim_show='yes';}
				if($dir_claim_show=="yes"){
				if(get_post_meta($id,'iv_directories_approve',true)!='yes'){
				?>
					<div class="cbp-l-project-details-title"><span><?php _e( 'Claim The Listing', 'ivdirectories' ); ?></span></div>
				   <form action="" id="message-claim" name="message-claim"  method="POST" role="form">
						<div class="cbp-l-grid-projects-desc">
							<input id="subject" name ="subject" type="text" placeholder="Enter Subject" Value="<?php _e('Claim The Listing', 'ivdirectories' ); ?>" class="cbp-search-input">
						</div>						
						<div class="cbp-l-grid-projects-desc">
							<textarea name="message-content" id="message-content"  class="cbp-search-"  cols="56" rows="4" title="Please Enter Message"  placeholder="<?php _e( 'Enter Message', 'ivdirectories' ); ?>"  ></textarea>
						</div>
						 <input type="hidden" name="dir_id" id="dir_id" value="<?php echo $id; ?>">
						  <a onclick="send_message_claim();" class="cbp-l-project-details-visit"><?php _e( 'Submit Claim', 'ivdirectories' ); ?></a>
							<div id="update_message_claim"></div>
						 
					</form>       
				</div>  
				<?php
				}
				}
				?>  
	</div>
			
			
   </div>	 
    
<div class="cbp-l-project-container">
				<div class="cbp-2-project-desc">
						<?php									
						if($wp_directory->check_reading_access('event',$id)){ 
						?>	
						<?php   			  
						 if(trim(get_post_meta($id,'event_title',true))!='' || trim(get_post_meta($id,'event_detail',true))!=''  || trim(get_post_meta($id,'_event_image_id',true))!=''  ){?>						
							<div class="cbp-l-project-desc-title"><span><?php _e('Event','ivdirectories'); ?></span> 								
							</div>
								<div class="cbp-l-project-desc-text">
										   <div class="cbp-l-inline">
												<div class="cbp-l-inline-left">		
													<?php 
														if(get_post_meta($id,'_event_image_id',true)!=''){?>
															<img src="<?php echo wp_get_attachment_url( get_post_meta($id,'_event_image_id',true) ); ?> " >
														<?php
														}
													
													?>							
														
												</div>
												<div class="cbp-l-inline-right">
													<div class="cbp-l-award-title"><?php echo get_post_meta($id,'event_title',true); ?></div>													
													<div class="cbp-l-inline-desc">
															<?php echo get_post_meta($id,'event_detail',true); ?>
													</div>				
												</div>
											</div>					
												
															
							</div>	
							<?php	
								}									  
								?>						
							<?php
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
						?>
			</div>				
				
	</div>			

     
<div class="cbp-l-project-container">
				<div class="cbp-2-project-desc">
						<?php	
						$deal_image_id=get_post_meta($id,'_deal_image_id',true);
							$currencyCode= get_option('_iv_directories_api_currency');
							$deat_title=get_post_meta($id,'deal_title',true);
							$deat_detail=get_post_meta($id,'deal_detail',true);
						if($deat_title!='' || $deat_detail!='' || $deal_image_id!=''){	
														
							if($wp_directory->check_reading_access('coupon',$id)){ 
						?>	
						<?php   			  
						 if(trim(get_post_meta($id,'event_title',true))!='' || trim(get_post_meta($id,'event_detail',true))!=''  || trim(get_post_meta($id,'_event_image_id',true))!=''  ){?>						
							<div class="cbp-l-project-desc-title"><span><?php _e('Deal/Coupon','ivdirectories'); ?></span> 								
							</div>
								<div class="cbp-l-project-desc-text">			
										  
									   <div class="cbp-l-inline">
												<div class="cbp-l-inline-left">															
													<?php
													if($deal_image_id!=''){
														$image_attributes = wp_get_attachment_image_src( $deal_image_id ,'full' ); 														
														?>
														<img  src="<?php echo $image_attributes[0]; ?>" >																
													<?php	
													}														
													?>							
														
												</div>
												<div class="cbp-l-inline-right">
													
													<div class="cbp-l-award-title"><?php echo get_post_meta($id,'deal_title',true); 
														if($deat_title==""){$deat_title=site_url().' Deal/Coupon ';}
														?></div>													
													<div class="cbp-l-inline-desc">
															<?php echo get_post_meta($id,'deal_detail',true);
															
															 ?>
													</div>	
													
													<div class="cbp-l-inline-desc">											
													</div>				
											
														<form id="deal_paypa_form" name="deal_paypa_form"  action="https://www.paypal.com/cgi-bin/webscr" onkeypress="return event.keyCode != 13;" method="post">
															
															<!-- for sandbox
															<form id="deal_paypa_form" name="deal_paypa_form" action="https://www.sandbox.paypal.com/cgi-bin/webscr" onkeypress="return event.keyCode != 13;" method="post">	
															-->
															<?php
																if(get_post_meta($id,'deal_amount',true)>0 AND get_post_meta($id,'deal_paypal',true)!=""){ 
																$client_email='';									
																?>	
																<div class="cbp-l-inline-desc">
																	<?php _e('Amount : ','ivdirectories'); ?> 								
																
																	 <?php echo $currencyCode.get_post_meta($id,'deal_amount',true);?> 
																</div>
																<div class="cbp-l-grid-projects-desc">
																	<input id="deal_client_email" name ="deal_client_email" type="text" placeholder="Enter Email Address" Value="" class="cbp-search-input">
																</div>	
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
																		<button type="submit" class="cbp-l-project-details-visit"><?php _e('Pay By Paypal','ivdirectories'); ?> </button>																	
																<?php								
																}
																?>	
													
															</form> 
															<div class="cbp-l-inline-desc" id="deal_email_message">											
															</div>	
													</div>		
															
															
											</div>					
												
															
							</div>	
							<?php	
								}									  
								?>						
							<?php
						}else{ 
							echo get_option('_iv_visibility_login_message');	
								
						}
					}	
						?>
			</div>	
			
			<?php
			$postcats='';	
			$currentCategory=wp_get_object_terms( $id, $directory_url.'-category');							
			if(isset($currentCategory[0]->slug)){										
				$postcats = $currentCategory[0]->slug;
			}
		$dir_similar = get_posts(array(
			'numberposts'			=> '4',
			'post_type'				=> $directory_url,
			$directory_url.'-category'	=> $postcats,			
			'post_status'			=> 'publish',
			'orderby'				=> 'rand',
		));
		
		
												
		?>
			
			 <div class="cbp-l-project-desc-title"><span style="margin-top:20px;"><?php _e('Similar Listing','ivdirectories'); ?> </span></div>
			<div id="js-grid-slider-similar-dir" class="cbp">
				<?php
			
					foreach( $dir_similar as $listing ) : 
					
					 ?>
						
					<div class="cbp-item">
						<div class="cbp-caption">
							<div class="cbp-caption-defaultWrap">
								<figure style="margin-left: 0px;margin-right: 0px;margin-top: 0px;margin-bottom: 0px;">
								<?php
															
									if(has_post_thumbnail($listing->ID)){	
																		
											echo get_the_post_thumbnail($listing->ID, 'medium');										
										
									}else{	?>		
										 									
										<img   src="<?php echo  wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";?>">
										
									<?php
									}
								?>
								
							</div>
							<div class="cbp-caption-activeWrap">
								<div class="cbp-l-caption-alignCenter">
									<div class="cbp-l-caption-body">
										<a href="<?php echo get_permalink($listing->ID);?>" class="cbp-l-caption-buttonLeft" rel="nofollow"><?php _e( 'View Detail', 'ivdirectories' ); ?> </a>
									   
									</div>
								</div>
							</div>
						</div>
						<div class="cbp-l-grid-projects-title "><?php echo $listing->post_title; ?></div>
						<div class="cbp-l-grid-projects-desc">
							
						</div>
						
					</div>
		
		<?php
			
			endforeach;
			?>
			</div>
		
				
	</div>			
  
   


<script type="text/javascript">

(function($, window, document, undefined) {
    'use strict';
    // init cubeportfolio
    var singlePage = jQuery('#js-singlePage-container').children('div');
    jQuery('#js-grid-slider-similar-dir').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 4000,
        autoPauseOnHover: true,
        showNavigation: true,
        showPagination: true,
        rewindNav: false,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 5
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 25,
        caption: 'overlayBottomReveal',
        displayType: 'lazyLoading',
        displayTypeSpeed: 100,
        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageAnimation: 'fade',
        singlePageCallback: function(url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var indexElement = $(element).parents('.cbp-item').index(),
                item = singlePage.eq(indexElement);
            this.updateSinglePage(item.html());},
    });
})(jQuery, window, document);
(function($, window, document, undefined) {
    'use strict';
    // init cubeportfolio
    var singlePage = jQuery('#js-singlePage-container').children('div');
    jQuery('#js-grid-slider-projects').cubeportfolio({
        layoutMode: 'slider',
        drag: true,
        auto: false,
        autoTimeout: 4000,
        autoPauseOnHover: true,
        showNavigation: true,
        showPagination: true,
        rewindNav: false,
        scrollByPage: false,
        gridAdjustment: 'responsive',
        mediaQueries: [{
            width: 1500,
            cols: 5
        }, {
            width: 1100,
            cols: 4
        }, {
            width: 800,
            cols: 3
        }, {
            width: 480,
            cols: 2
        }, {
            width: 320,
            cols: 1
        }],
        gapHorizontal: 0,
        gapVertical: 25,
        caption: 'overlayBottomReveal',
        displayType: 'lazyLoading',
        displayTypeSpeed: 100,
        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
        // singlePage popup
        singlePageDelegate: '.cbp-singlePage',
        singlePageDeeplinking: true,
        singlePageStickyNavigation: true,
        singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
        singlePageAnimation: 'fade',
        singlePageCallback: function(url, element) {
            // to update singlePage content use the following method: this.updateSinglePage(yourContent)
            var indexElement = $(element).parents('.cbp-item').index(),
                item = singlePage.eq(indexElement);
            this.updateSinglePage(item.html());},
    });
})(jQuery, window, document);	
function send_message_iv(){		
		var formc = jQuery("#message-pop");
		if (jQuery.trim(jQuery("#message-content",formc).val()) == "") {
                  alert("Please put your message");
        } else {    
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var loader_image = '<img style="width:60px"  src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message_popup').html(loader_image); 
				var search_params={
					"action"  : 	"iv_directories_message_send",	
					"form_data":	jQuery("#message-pop").serialize(), 					
				};				
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){											
						jQuery('#update_message_popup').html(response.msg );
						jQuery("#message-pop").trigger('reset');						
					}
				});
		}	
	}
function send_message_claim(){	
			
		var isLogged ="<?php echo get_current_user_id();?>";                               
        if (isLogged=="0") {                   
                alert("<?php _e('Please login to Claim The Listing', 'ivdirectories' ); ?>");
        } else { 	
			
			var form = jQuery("#message-claim");			
			if (jQuery.trim(jQuery("#message-content", form).val()) == "") {
                  alert("Please put your message");
			} else {
				var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
				var loader_image = '<img style="width:60px"  src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message_claim').html(loader_image); 
				var search_params={
					"action"  : 	"iv_directories_claim_send",	
					"form_data":	jQuery("#message-claim").serialize(), 					
				};				
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){ 											
						jQuery('#update_message_claim').html('   '+response.msg );
						jQuery("#message-claim").trigger('reset');
						
					}
				});
			}
		}	
	
	}
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
<br><br><br>
