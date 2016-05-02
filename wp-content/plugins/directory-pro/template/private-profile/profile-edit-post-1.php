<script type='text/javascript' src='https://maps.googleapis.com/maps/api/js?v=3.exp&#038;sensor=false&#038;ver=2014-07-18'></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>  
   
          <div class="profile-content">
            
              <div class="portlet light">
                <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject"> <?php _e('Edit Listing','ivdirectories'); ?></span>
                    </div>
					
                  </div>
               
                  
                  
                  <div class="portlet-body">
                    <div class="tab-content">
                    
                      <div class="tab-pane active" id="tab_1_1">
					  <?php					
						
						// Check Max\
						$package_id=get_user_meta($current_user->ID,'iv_directories_package_id',true);						
						$max=get_post_meta($package_id, 'iv_directories_package_max_post_no', true);
						$curr_post_id=$_REQUEST['post-id'];
						$current_post = $curr_post_id;
						$post_edit = get_post($curr_post_id); 
						
						$have_edit_access='yes';
						$exp_date= get_user_meta($current_user->ID, 'iv_directories_exprie_date', true);
						if($exp_date!=''){
							$package_id=get_user_meta($current_user->ID,'iv_directories_package_id',true);
							$dir_hide= get_post_meta($package_id, 'iv_directories_package_hide_exp', true);
							if($dir_hide=='yes'){
								//echo 'exp_date...'.strtotime($exp_date) .' --Time..'. time();
								if(strtotime($exp_date) < time()){	
									$have_edit_access='no';		
								}
							}
						}
						
						if ( $post_edit->post_author != $current_user->ID or $have_edit_access=='no') {
							
							$iv_redirect = get_option( '_iv_directories_login_page');
							 $reg_page= get_permalink( $iv_redirect); 
							?>
							
							
							<?php _e('Please ','ivdirectories'); ?>
							 <a href="<?php echo $reg_page.'?&profile=level'; ?>" title="Upgarde"><b><?php _e('Login or upgrade ','ivdirectories'); ?> </b></a> 
							<?php _e('To Edit The Post.','ivdirectories'); ?>	
							
						
							
							
						<?php
						}else{
								$title = $post_edit->post_title;
								$content = $post_edit->post_content;
					
					?>					
					
						<div class="row">
							<div class="col-md-12">	 
							
							 
							<form action="" id="edit_post" name="edit_post"  method="POST" role="form">
								<div class=" form-group">
									<label for="text" class=" control-label"><?php _e('Title','ivdirectories'); ?></label>
									<div class="  "> 
										<input type="text" class="form-control" name="title" id="title"  placeholder="<?php _e('Enter Title Here','ivdirectories'); ?>" value="<?php echo $title;?>">
									</div>																		
								</div>
								
								<div class="form-group">
										
										<div class=" ">
												<?php
													$settings_a = array(															
														'textarea_rows' =>8,
														'editor_class' => 'form-control',
																													 
														);
													$content_client =$content;
													$editor_id = 'edit_post_content';
													wp_editor($content_client, $editor_id,$settings_a );										
													?>
									
										</div>
									
								</div>
								<div class=" row form-group ">
									<label for="text" class=" col-md-5 control-label"><?php _e('Feature Image','ivdirectories'); ?>  </label>
									
										<div class="col-md-4" id="post_image_div">
											
											<?php $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $curr_post_id ), 'thumbnail' ); 
												
												
												if($feature_image[0]!=""){ ?>
												
												<img title="profile image" class=" img-responsive" src="<?php  echo $feature_image[0]; ?>">
												
												<?php												
												}else{ ?>
												<a href="javascript:void(0);" onclick="edit_post_image('post_image_div');"  >									
											<?php  echo '<img src="'. wp_iv_directories_URLPATH.'assets/images/image-add-icon.png">'; ?>			
											</a>	
												<?php
												}
												$feature_image_id=get_post_thumbnail_id( $curr_post_id );
												?>
														
																
										</div>
										
										<input type="hidden" name="feature_image_id" id="feature_image_id" value="<?php echo $feature_image_id; ?>">
										
										<div class="col-md-3" id="post_image_edit">	
											<button type="button" onclick="edit_post_image('post_image_div');"  class="btn btn-xs green-haze"><?php _e('Add','ivdirectories'); ?> </button>
											
										</div>									
								</div>
								<div class=" row form-group ">
									<label for="text" class=" col-md-5 control-label"><?php _e('Image Gallery','ivdirectories'); ?> 
										<button type="button" onclick="edit_gallery_image('gallery_image_div');"  class="btn btn-xs green-haze"><?php _e('Add Images','ivdirectories'); ?></button>
									 </label>						
								</div>
								<div class=" row form-group ">	
											<!--
										<div class="col-md-12" id="gallery_image_div">
											
											<a  href="javascript:void(0);" onclick="edit_gallery_image('gallery_image_div');"  >									
											<?php  echo '<img src="'. wp_iv_directories_URLPATH.'assets/images/gallery_icon.png">'; ?>			
											</a>
															
										</div>
											-->
											<?php
											$gallery_ids=get_post_meta($curr_post_id ,'image_gallery_ids',true);
											$gallery_ids_array = array_filter(explode(",", $gallery_ids));
											?>
										<input type="hidden" name="gallery_image_ids" id="gallery_image_ids" value="<?php echo $gallery_ids; ?>">
										
										<div class="col-md-12" id="gallery_image_div">
											<?php
												if(sizeof($gallery_ids_array)>0){ 
													foreach($gallery_ids_array as $slide){	
														
												?>
												<div id="gallery_image_div<?php echo $slide;?>" class="col-md-3"><img  class="img-responsive"  src="<?php echo wp_get_attachment_url( $slide ); ?>"><button type="button" onclick="remove_gallery_image('gallery_image_div<?php echo $slide;?>', <?php echo $slide;?>);"  class="btn btn-xs btn-danger">Remove</button> </div>
												<?php
													}
												 }
												?>
												
										</div>									
								</div>
								
																
								
								<div class="clearfix"></div>
								<div class=" row form-group ">
									<label for="text" class=" col-md-12 control-label"><?php _e('Post Status','ivdirectories'); ?>  </label>
									
										<div class="col-md-12" id="">
										<select name="post_status" id="post_status"  class="form-control">
											<?php
												$dir_approve_publish =get_option('_dir_approve_publish');
												if($dir_approve_publish!='yes'){?>
													<option value="publish" <?php echo (get_post_status( $post_edit->ID )=='publish'?'selected="selected"':'' ) ; ?>><?php _e('Publish','ivdirectories'); ?></option>
												<?php	
												}else{ ?>
													<option value="pending" <?php echo (get_post_status( $post_edit->ID )=='pending'?'selected="selected"':'' ) ; ?>><?php _e('Pending Review','ivdirectories'); ?></option>
												<?php
												}
											?>											
											<option value="draft" <?php echo (get_post_status( $post_edit->ID )=='draft'?'selected="selected"':'' ) ; ?> >Draft</option>
										
										</select>										
											
											
										</div>				
																		
								</div>
								
								
								<div class="clearfix"></div>
								<div class=" row form-group">
									<label for="text" class=" col-md-12 control-label"><?php _e('Category','ivdirectories'); ?></label>									
									<div class=" col-md-12 "> 								
								<?php
																			
										$currentCategory=wp_get_object_terms( $post_edit->ID, $directory_url.'-category');
										
										$post_cats=array();
										foreach($currentCategory as $c)
										{
											
											array_push($post_cats,$c->slug);
										}
										$selected='';							
										
										echo '<select name="postcats[]" class="form-control " multiple="multiple">';
										//echo'	<option selected="'.$selected.'" value="">'.__('Choose a category','ivdirectories').'</option>';
																	
											//directories
											$taxonomy = $directory_url.'-category';
											$args = array(
												'orderby'           => 'name', 
												'order'             => 'ASC',
												'hide_empty'        => false, 
												'exclude'           => array(), 
												'exclude_tree'      => array(), 
												'include'           => array(),
												'number'            => '', 
												'fields'            => 'all', 
												'slug'              => '',
												'parent'            => '0',
												'hierarchical'      => true, 
												'child_of'          => 0,
												'childless'         => false,
												'get'               => '', 
												
											);
								$terms = get_terms($taxonomy,$args); // Get all terms of a taxonomy
								if ( $terms && !is_wp_error( $terms ) ) :
									$i=0;
									foreach ( $terms as $term_parent ) { 
											if(in_array($term_parent->slug,$post_cats)){														  
												$selected=$term_parent->slug;
											}
										
										 ?>												
										
										
											<?php 
											
											echo '<option  value="'.$term_parent->slug.'" '.($selected==$term_parent->slug?'selected':'' ).'><strong>'.$term_parent->name.'<strong></option>';
											?>	
												<?php
												
												$args2 = array(
													'type'                     => $directory_url,						
													'parent'                   => $term_parent->term_id,
													'orderby'                  => 'name',
													'order'                    => 'ASC',
													'hide_empty'               => 0,
													'hierarchical'             => 1,
													'exclude'                  => '',
													'include'                  => '',
													'number'                   => '',
													'taxonomy'                 => $directory_url.'-category',
													'pad_counts'               => false 

												); 											
												$categories = get_categories( $args2 );	
												if ( $categories && !is_wp_error( $categories ) ) :
														
														
													foreach ( $categories as $term ) {
														 
														if(in_array($term->slug,$post_cats)){														  
															$selected=$term->slug;
														  
														}
														echo '<option  value="'.$term->slug.'" '.($selected==$term->slug?'selected':'' ).'>--'.$term->name.'</option>';
													} 	
																				
												endif;		
												
												?>
																			
	  
									<?php
										$i++;
									} 								
								endif;	
									echo '</select>';	
								?>		
									</div>
																		
								</div>
								
								
								


						<div class=" form-group">
							<label for="text" class=" control-label"><?php _e('Address','ivdirectories'); ?></label>							
							<div class=" "> 
								<input type="text" class="form-control" name="address" id="address" value="<?php echo get_post_meta($post_edit->ID,'address',true); ?>" placeholder="<?php _e('Enter here Here','ivdirectories'); ?>">
							</div>
							<input type="hidden" id="latitude" name="latitude" placeholder="Latitude" value="<?php echo get_post_meta($post_edit->ID,'latitude',true); ?>" >
							<input type="hidden" id="longitude" name="longitude" placeholder="Longitude"  value="<?php echo get_post_meta($post_edit->ID,'longitude',true); ?>" >
                            <input type="hidden" id="city" name="city" value="<?php echo get_post_meta($post_edit->ID,'city',true); ?>" /> 
                            <input type="hidden" id="state" name="state" value="<?php echo get_post_meta($post_edit->ID,'state',true); ?>" /> 
                            <input type="hidden" id="postcode" name="postcode" value="<?php echo get_post_meta($post_edit->ID,'postcode',true); ?>" /> 
                            <input type="hidden" id="country" name="country" value="<?php echo get_post_meta($post_edit->ID,'country',true); ?>" /> 								
						</div>
						<div class=" form-group">
							<label for="text" class=" control-label"><?php _e('Address Map','ivdirectories'); ?></label>							
							<div class=" "> 
									<div  id="map-canvas"  style="width:100%;height:300px;"></div>
										
								<script type="text/javascript">
								var geocoder;
								jQuery(document).ready(function($) {									
									var map;
									var marker;

									 geocoder = new google.maps.Geocoder();
									

									function geocodePosition(pos) {
									  geocoder.geocode({
									    latLng: pos
									  }, function(responses) {
									    if (responses && responses.length > 0) {
									      updateMarkerAddress(responses[0].formatted_address);
									    } else {
									      updateMarkerAddress('Cannot determine address at this location.');
									    }
									  });
									}

									function updateMarkerPosition(latLng) {
									  jQuery('#latitude').val(latLng.lat());
									  jQuery('#longitude').val(latLng.lng());	
										//console.log(latLng);	
										codeLatLng(latLng.lat(), latLng.lng());
									}

									function updateMarkerAddress(str) {
									  jQuery('#address').val(str);
									}

									function initialize() {
									  var have_lat ='<?php echo get_post_meta($post_edit->ID,'latitude',true); ?>';
									  if(have_lat!=''){
										 var latlng = new google.maps.LatLng('<?php echo get_post_meta($post_edit->ID,'latitude',true); ?>',' <?php echo get_post_meta($post_edit->ID,'longitude',true); ?>');
									 
									  } else{
										 
										  var latlng = new google.maps.LatLng(40.748817, -73.985428);
									  }	
									  
									  var mapOptions = {
									    zoom: 2,
									    center: latlng
									  }

									  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
										
									  geocoder = new google.maps.Geocoder();

									  marker = new google.maps.Marker({
									  	position: latlng,
									    map: map,
									    draggable: true
									  });

									  // Add dragging event listeners.
									  google.maps.event.addListener(marker, 'dragstart', function() {
									    updateMarkerAddress('Please Wait Dragging...');
									  });
									  
									  google.maps.event.addListener(marker, 'drag', function() {
									    updateMarkerPosition(marker.getPosition());
									  });
									  
									  google.maps.event.addListener(marker, 'dragend', function() {
									    geocodePosition(marker.getPosition());
									  });

									}

									google.maps.event.addDomListener(window, 'load', initialize);

									jQuery(document).ready(function() { 
									         
									  initialize();
									          
									  jQuery(function() {
									    jQuery("#address").autocomplete({
									      //This bit uses the geocoder to fetch address values
									      source: function(request, response) {
									        geocoder.geocode( {'address': request.term }, function(results, status) {
									          response(jQuery.map(results, function(item) {
									            return {
									              label:  item.formatted_address,
									              value: item.formatted_address,
									              latitude: item.geometry.location.lat(),
									              longitude: item.geometry.location.lng()
									            }
									          }));
									        })
									      },
									      //This bit is executed upon selection of an address
									      select: function(event, ui) {
									        jQuery("#latitude").val(ui.item.latitude);
									        jQuery("#longitude").val(ui.item.longitude);
	
									        var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
											codeLatLng(ui.item.latitude, ui.item.longitude);
											
									        marker.setPosition(location);
									        map.setZoom(16);
									        map.setCenter(location);

									      }
									    });
									  });
									  
									  //Add listener to marker for reverse geocoding
									  google.maps.event.addListener(marker, 'drag', function() {
									    geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
									      if (status == google.maps.GeocoderStatus.OK) {
									        if (results[0]) {
												
									          jQuery('#address').val(results[0].formatted_address);
									          jQuery('#latitude').val(marker.getPosition().lat());
									          jQuery('#longitude').val(marker.getPosition().lng());
									        }
									      }
									    });
									  });
									  
									});

								});
								// For city country , zip
								function codeLatLng(lat, lng) {
									var city;
									var postcode;
									var state;
									var country;	
									var latlng = new google.maps.LatLng(lat, lng);
									geocoder.geocode({'latLng': latlng}, function(results, status) {
									  if (status == google.maps.GeocoderStatus.OK) {
									  //console.log(results)
										if (results[1]) {
									
										//find country name
											 for (var i=0; i<results[0].address_components.length; i++) {
											for (var b=0;b<results[0].address_components[i].types.length;b++) {

											//there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
												if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
													//this is the object you are looking for
													city= results[0].address_components[i];		
													//break;
												}
												if (results[0].address_components[i].types[b] == "country") {
													country= results[0].address_components[i];
												}
												if (results[0].address_components[i].types[b] == "postal_code") {													
													postcode= results[0].address_components[i];													
												}	
												
											}
										}
										//city data
										jQuery('#address').val(results[0].formatted_address); 
										jQuery('#city').val(city.long_name);
										jQuery('#postcode').val(postcode.long_name);
										jQuery('#country').val(country.long_name);
										//alert(city.short_name + " " + city.long_name)


										} else {
										  
										}
									  } else {
										
									  }
									});
								  }

						    </script>
							</div>																
						</div>
						<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapsethirty2">
									  <?php _e('Awards','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapsethirty2">
									   <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapsethirty2" class="panel-collapse collapse">
									<div class="panel-body">
									<?php
										// video, event ,  award
										//if($this->check_write_access('award')){												
										?>		
									  <div id="awards">
												
												<?php	$aw=0;	 
													   for($i=0;$i<20;$i++){
														 		  
														   if(get_post_meta($post_edit->ID,'_award_title_'.$i,true)!='' || get_post_meta($post_edit->ID,'_award_description_'.$i,true) || get_post_meta($post_edit->ID,'_award_year_'.$i,true)|| get_post_meta($post_edit->ID,'_award_image_id_'.$i,true) ){?>
															   
															   
															   <div id="award">
																   <div id="award_delete_<?php echo $i; ?>">
																   
																	<div class=" form-group">
																		<span class="pull-right"  > 
																		<button type="button" onclick="award_delete(<?php echo $i; ?>);"  class="btn btn-xs btn-danger">X</button>
																		</span>
																		<label for="text" class=" control-label"><?php _e('Award Title','ivdirectories'); ?>
																			
																		</label>
																		
																		<div class="  "> 
																			<input type="text" class="form-control" name="award_title[]" id="award_title[]" value="<?php echo get_post_meta($post_edit->ID,'_award_title_'.$i,true); ?>" placeholder="<?php _e('Enter award title','ivdirectories'); ?>">
																		</div>																
																	</div>		
																	<div class=" form-group">
																		<label for="text" class=" control-label"><?php _e('Award Description','ivdirectories'); ?></label>
																		
																		<div class="  "> 
																			<input type="text" class="form-control" name="award_description[]" id="award_description[]" value="<?php echo get_post_meta($post_edit->ID,'_award_description_'.$i,true); ?>" placeholder="<?php _e('Enter Award Description','ivdirectories'); ?>">
																		</div>																
																	</div>
																	<div class=" form-group">
																		<label for="text" class=" control-label"><?php _e('Year(s) for which award was received','ivdirectories'); ?></label>
																		
																		<div class="  "> 
																			<input type="text" class="form-control" name="award_year[]" id="award_year[]" value="<?php echo get_post_meta($post_edit->ID,'_award_year_'.$i,true); ?>" placeholder="<?php _e('Enter Award Year','ivdirectories'); ?>">
																		</div>																
																	</div>	
																	<div class=" form-group " style="margin-top:10px">
																		<label for="text" class=" col-md-5 control-label"><?php _e('Award Image','ivdirectories'); ?>  </label>
																		<div class="col-md-4" id="award_image_div">
																			<?php 
																				if(get_post_meta($post_edit->ID,'_award_image_id_'.$i,true)!=''){?>
																					<a  href="javascript:void(0);" onclick="award_post_image(this);"  >		
																					<img src="<?php echo wp_get_attachment_url( get_post_meta($post_edit->ID,'_award_image_id_'.$i,true) ); ?> " >
																					<input type="hidden" name="award_image_id[]" id="award_image_id[]" value="<?php echo get_post_meta($post_edit->ID,'_award_image_id_'.$i,true); ?>">
																					</a>
																				<?php
																				}else{?>
																						<a  href="javascript:void(0);" onclick="award_post_image(this);"  >									
																						<?php  echo '<img width="100px" src="'. wp_iv_directories_URLPATH.'assets/images/image-add-icon.png">'; ?>			
																						</a>																					
																			<?php		
																				}																		
																			?>
																							
																		</div>						
																	</div>
																</div>		
															</div>	
															 <div class="clearfix"></div>	 
															  <hr>
															 		
																	
															<?php
															$aw++;	
															}				 
														
														}
													if($aw==0){ ?>
															<div id="award">
															<div class=" form-group">
																<label for="text" class=" control-label"><?php _e('Award Title','ivdirectories'); ?></label>
																
																<div class="  "> 
																	<input type="text" class="form-control" name="award_title[]" id="award_title[]" value="" placeholder="<?php _e('Enter award title','ivdirectories'); ?>">
																</div>																
															</div>		
															<div class=" form-group">
																<label for="text" class=" control-label"><?php _e('Award Description','ivdirectories'); ?></label>
																
																<div class="  "> 
																	<input type="text" class="form-control" name="award_description[]" id="award_description[]" value="" placeholder="<?php _e('Enter Award Description','ivdirectories'); ?>">
																</div>																
															</div>
															<div class=" form-group">
																<label for="text" class=" control-label"><?php _e('Year(s) for which award was received','ivdirectories'); ?></label>
																
																<div class="  "> 
																	<input type="text" class="form-control" name="award_year[]" id="award_year[]" value="" placeholder="<?php _e('Enter Award Year','ivdirectories'); ?>">
																</div>																
															</div>	
															<div class=" form-group " style="margin-top:10px">
																<label for="text" class=" col-md-5 control-label"><?php _e('Award Image','ivdirectories'); ?>  </label>
																<div class="col-md-4" id="award_image_div">
																	<a  href="javascript:void(0);" onclick="award_post_image(this);"  >									
																	<?php  echo '<img width="100px" src="'. wp_iv_directories_URLPATH.'assets/images/image-add-icon.png">'; ?>			
																	</a>				
																</div>						
															</div>	
															</div>	
													
													<?php
													
													}			  
													  ?>																			
									 
									 </div>
											<div class=" row  form-group ">
												<div class="col-md-12" >	
												<button type="button" onclick="add_award_field();"  class="btn btn-xs green-haze"><?php _e('Add More','ivdirectories'); ?></button>
												</div>
											</div>
											
									
									
											<?php
											//}
											?>
									
								  </div>
								  
								</div>
					  </div>
					
				
										
					<div class="clearfix"></div>
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
									  <?php _e('Amenities/Tags','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
									  <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseEight" class="panel-collapse collapse">
								  <div class="panel-body">
									<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Select Amenities/Tag','ivdirectories'); ?></label>
											<div class=" "> 
												<?php
													$args =array();
													$args['hide_empty']=false;
													$tags = get_tags($args );		
													
													$tags_post= wp_get_post_tags($post_edit->ID, array( 'fields' => 'ids' ));											
													
													
													foreach ( $tags as $tag ) { 
														$checked='';
														if(in_array( $tag->term_id,$tags_post)){
															$checked=' checked';
														}
														?>
														<div class="col-md-4">
														 <label class="form-group"> 
															 
															 <input type="checkbox" name="tag_arr[]" id="tag_arr[]" value="<?php echo $tag->name; ?>" <?php echo $checked;?> > <?php echo $tag->name; ?> </label>  
														</div>
														<?php
													}
												?>
											</div>																
									</div>
									<div class="clearfix"></div>
									<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Add New Amenities/Tags','ivdirectories'); ?></label>						
											<div class="  "> 
												<input type="text" class="form-control" name="new_tag" id="new_tag" value="" placeholder="<?php _e('Enter New Tags: Separate tags with commas','ivdirectories'); ?>">
											</div>																
									</div>	
									
									
																		
								  </div>
								</div>
					  </div>
					
					<div class="clearfix"></div>	
					
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
									  <?php _e('Contact Info','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
									  <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseFour" class="panel-collapse collapse">
								  <div class="panel-body">											
									<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Phone','ivdirectories'); ?></label>						
											<div class="  "> 
												<input type="text" class="form-control" name="phone" id="phone" value="<?php echo get_post_meta($post_edit->ID,'phone',true); ?>" placeholder="<?php _e('Enter Phone Number','ivdirectories'); ?>">
											</div>																
									</div>
									<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Fax','ivdirectories'); ?></label>
											
											<div class="  "> 
												<input type="text" class="form-control" name="fax" id="fax" value="<?php echo get_post_meta($post_edit->ID,'fax',true); ?>" placeholder="<?php _e('Enter Fax Number','ivdirectories'); ?>">
											</div>																
									</div>	
									<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Email Address','ivdirectories'); ?></label>
											
											<div class="  "> 
												<input type="text" class="form-control" name="contact-email" id="contact-email" value="<?php echo get_post_meta($post_edit->ID,'contact-email',true); ?>" placeholder="<?php _e('Enter Email Address','ivdirectories'); ?>">
											</div>																
									</div>
									<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Web Site','ivdirectories'); ?></label>
											
											<div class="  "> 
												<input type="text" class="form-control" name="contact_web" id="contact_web" value="<?php echo get_post_meta($post_edit->ID,'contact_web',true); ?>" placeholder="<?php _e('Enter Web Site','ivdirectories'); ?>">
											</div>																
									</div>
									
									
								  </div>
								</div>
					  </div>
					
					
					<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									  <?php _e('Videos','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
									   <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
								  <div class="panel-body">	
									  <?php
											// video, event , coupon , vip_badge
										 if($this->check_write_access('video')){
											
										?>										
										<div class=" form-group">
											
												<label for="text" class=" control-label"><?php _e('Youtube','ivdirectories'); ?></label>
												
												<div class="  "> 
													<input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo get_post_meta($post_edit->ID,'youtube',true); ?>" placeholder="<?php _e('Enter Youtube video ID, e.g : bU1QPtOZQZU ','ivdirectories'); ?>">
												</div>																
										</div>
										<div class=" form-group">
												<label for="text" class=" control-label"><?php _e('Vimeo','ivdirectories'); ?></label>
												
												<div class="  "> 
													<input type="text" class="form-control" name="vimeo" id="vimeo" value="<?php echo get_post_meta($post_edit->ID,'vimeo',true); ?>" placeholder="<?php _e('Enter vimeo ID, e.g : 134173961','ivdirectories'); ?>">
												</div>																
										</div>
										<?php
										}else{
												_e('Please upgrade your account to add video ','ivdirectories');
										}
										?>
									
								  </div>
								</div>
					  </div>
					<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
									  <?php _e('Social Profiles','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
									   <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseFive" class="panel-collapse collapse">
								  <div class="panel-body">											
										
										<div class="form-group">
										<label class="control-label">FaceBook</label>
										<input type="text" name="facebook" id="facebook" value="<?php echo get_post_meta($post_edit->ID,'facebook',true); ?>" class="form-control"/>
									  </div>
									  <div class="form-group">
										<label class="control-label">Linkedin</label>
										<input type="text" name="linkedin" id="linkedin" value="<?php echo get_post_meta($post_edit->ID,'linkedin',true); ?>" class="form-control"/>
									  </div>
									  <div class="form-group">
										<label class="control-label">Twitter</label>
										<input type="text" name="twitter" id="twitter" value="<?php echo get_post_meta($post_edit->ID,'twitter',true); ?>" class="form-control"/>
									  </div>
									  <div class="form-group">
										<label class="control-label">Google+ </label>
										<input type="text" name="gplus" id="gplus" value="<?php echo get_post_meta($post_edit->ID,'gplus',true); ?>"  class="form-control"/>
									  </div>
									   <div class="form-group">
										<label class="control-label">Instagram </label>
										<input type="text" name="instagram" id="instagram" value="<?php echo get_post_meta($post_edit->ID,'instagram',true); ?>"  class="form-control"/>
									  </div>
									  
						  									
										
								  </div>
								</div>
					  </div>
					
					
					<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									  <?php _e('Additional Info','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
									 <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
								  <div class="panel-body">											
										<?php							
											
											
											$default_fields = array();
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
											if(sizeof($field_set)<1){																
													$default_fields['business_type']='Business Type';
													$default_fields['main_products']='Main Products';
													$default_fields['number_of_employees']='Number Of Employees';
													$default_fields['main_markets']='Main Markets';
													$default_fields['total_annual_sales_volume']='Total Annual Sales Volume';
											 }							
																	
														
										$i=1;							
										foreach ( $default_fields as $field_key => $field_value ) { ?>	
												 <div class="form-group">
													<label class="control-label"><?php echo _e($field_value, 'wp_iv_directories'); ?></label>
													<input type="text" placeholder="<?php echo 'Enter '.$field_value;?>" name="<?php echo $field_key;?>" id="<?php echo $field_key;?>"  class="form-control" value="<?php echo get_post_meta($post_edit->ID,$field_key,true); ?>"/>
												  </div>
										
										<?php
										}
										?>			
										
								  </div>
								</div>
					  </div>
					
					
						  <div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									  <?php _e('Opening Time','ivdirectories'); ?> 
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
									  <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse">
								  <div class="panel-body">	
								  <?php					
										$opeing_days = get_post_meta($post_edit->ID ,'_opening_time',true);
										if($opeing_days!=''){?>						
											
											<?php	
												$i=1;
												if(sizeof($opeing_days)>0){
													foreach($opeing_days as $key => $item){
														$day_time = explode("|", $item);	
														echo '<div id="old_days'. $i .'">
															<div class="col-md-4"><h5>'.$key.'</h5></div> <div class="col-md-7"> <h5>: '.$day_time[0].' - '.$day_time[1].'</h5></div><div class="col-md-1"> <button type="button" onclick="remove_old_day('.$i.');"  class="btn btn-xs btn-danger">X</button> 												
															 </div>
															<input type="hidden" name="day_name[]" id="day_name[]" value="'.$key.'">
															<input type="hidden" name="day_value1[]" id="day_value1[]" value="'.$day_time[0].'">
															<input type="hidden" name="day_value2[]" id="day_value2[]" value="'.$day_time[1].'">
															</div>
															';
														$i++;
													}	
												}										
										}
									 ?>		
									<div id="day_field_div">
										<div class=" row form-group " id="day-row1" >									
											<div class=" col-md-4"> 
											<select name="day_name[]" id="day_name[]" class="form-control">	
											<option value=""></option> 
											<option value="Monday"> <?php _e('Monday','ivdirectories'); ?>  </option> 
											<option value="Tuesday"><?php _e('Tuesday','ivdirectories'); ?></option> 
											<option value="Wednesday"><?php _e('Wednesday','ivdirectories'); ?></option> 
											<option value="Thursday"><?php _e('Thursday','ivdirectories'); ?></option> 
											<option value="Friday"><?php _e('Friday','ivdirectories'); ?></option> 
											<option value="Saturday"><?php _e('Saturday','ivdirectories'); ?></option> 
											<option value="Sunday"><?php _e('Sunday','ivdirectories'); ?></option> 
											</select>
											</div>		
											<div  class=" col-md-4">
											<select name="day_value1[]" id="day_value1[]" class="form-control">
												<option value=""> </option>												
												<option value="Closed"><?php _e('Closed','ivdirectories'); ?> </option>	
												<option value="Always"><?php _e('Always','ivdirectories'); ?></option>											
												<option value="12:00 AM">12:00 AM </option>
												<option value="12:30 AM">12:30 AM </option>
												<option value="01:00 AM">01:00 AM </option>
												<option value="01:30 AM">01:30 AM </option>
												<option value="02:00 AM">02:00 AM </option>
												<option value="02:30 AM">02:30 AM </option>
												<option value="03:00 AM">03:00 AM </option>
												<option value="03:30 AM">03:30 AM </option>
												<option value="04:00 AM">04:00 AM </option>
												<option value="04:30 AM">04:30 AM </option>
												<option value="05:00 AM">05:00 AM </option>
												<option value="05:30 AM">05:30 AM </option>
												<option value="06:00 AM">06:00 AM </option>
												<option value="06:30 AM">06:30 AM </option>
												<option value="07:00 AM">07:00 AM </option>
												<option value="07:30 AM">07:30 AM </option>
												<option value="08:00 AM">08:00 AM </option>
												<option value="08:30 AM">08:30 AM </option>
												<option value="09:00 AM">09:00 AM </option>
												<option value="09:30 AM">09:30 AM </option>
												<option value="10:00 AM">10:00 AM </option>
												<option value="10:30 AM">10:30 AM </option>
												<option value="11:00 AM">11:00 AM </option>
												<option value="11:30 AM">11:30 AM </option>
												<option value="12:00 PM">12:00 PM </option>
												<option value="12:30 PM">12:30 PM </option>
												<option value="01:00 PM">01:00 PM </option>
												<option value="01:30 PM">01:30 PM </option>
												<option value="02:00 PM">02:00 PM </option>
												<option value="02:30 PM">02:30 PM </option>
												<option value="03:00 PM">03:00 PM </option>
												<option value="03:30 PM">03:30 PM </option>
												<option value="04:00 PM">04:00 PM </option>
												<option value="04:30 PM">04:30 PM </option>
												<option value="05:00 PM">05:00 PM </option>
												<option value="05:30 PM">05:30 PM </option>
												<option value="06:00 PM">06:00 PM </option>
												<option value="06:30 PM">06:30 PM </option>
												<option value="07:00 PM">07:00 PM </option>
												<option value="07:30 PM">07:30 PM </option>
												<option value="08:00 PM">08:00 PM </option>
												<option value="08:30 PM">08:30 PM </option>
												<option value="09:00 PM">09:00 PM </option>
												<option value="09:30 PM">09:30 PM </option>
												<option value="10:00 PM">10:00 PM </option>
												<option value="10:30 PM">10:30 PM </option>
												<option value="11:00 PM">11:00 PM </option>
												<option value="11:30 PM">11:30 PM </option>
												<option value="12:00 PM">12:00 PM </option>
											</select>
												
												
											</div>
											<div  class="col-md-4">
											
												<select name="day_value2[]" id="day_value2[]" class="form-control">
												<option value=""> </option>
												<option value="12:00 AM">12:00 AM </option>
												<option value="12:30 AM">12:30 AM </option>
												<option value="01:00 AM">01:00 AM </option>
												<option value="01:30 AM">01:30 AM </option>
												<option value="02:00 AM">02:00 AM </option>
												<option value="02:30 AM">02:30 AM </option>
												<option value="03:00 AM">03:00 AM </option>
												<option value="03:30 AM">03:30 AM </option>
												<option value="04:00 AM">04:00 AM </option>
												<option value="04:30 AM">04:30 AM </option>
												<option value="05:00 AM">05:00 AM </option>
												<option value="05:30 AM">05:30 AM </option>
												<option value="06:00 AM">06:00 AM </option>
												<option value="06:30 AM">06:30 AM </option>
												<option value="07:00 AM">07:00 AM </option>
												<option value="07:30 AM">07:30 AM </option>
												<option value="08:00 AM">08:00 AM </option>
												<option value="08:30 AM">08:30 AM </option>
												<option value="09:00 AM">06:00 AM </option>
												<option value="09:30 AM">09:30 AM </option>
												<option value="10:00 AM">10:00 AM </option>
												<option value="10:30 AM">10:30 AM </option>
												<option value="11:00 AM">11:00 AM </option>
												<option value="11:30 AM">11:30 AM </option>
												<option value="12:00 PM">12:00 PM </option>
												<option value="12:30 PM">12:30 PM </option>
												<option value="01:00 PM">01:00 PM </option>
												<option value="01:30 PM">01:30 PM </option>
												<option value="02:00 PM">02:00 PM </option>
												<option value="02:30 PM">02:30 PM </option>
												<option value="03:00 PM">03:00 PM </option>
												<option value="03:30 PM">03:30 PM </option>
												<option value="04:00 PM">04:00 PM </option>
												<option value="04:30 PM">04:30 PM </option>
												<option value="05:00 PM">05:00 PM </option>
												<option value="05:30 PM">05:30 PM </option>
												<option value="06:00 PM">06:00 PM </option>
												<option value="06:30 PM">06:30 PM </option>
												<option value="07:00 PM">07:00 PM </option>
												<option value="07:30 PM">07:30 PM </option>
												<option value="08:00 PM">08:00 PM </option>
												<option value="08:30 PM">08:30 PM </option>
												<option value="09:00 PM">09:00 PM </option>
												<option value="09:30 PM">09:30 PM </option>
												<option value="10:00 PM">10:00 PM </option>
												<option value="10:30 PM">10:30 PM </option>
												<option value="11:00 PM">11:00 PM </option>
												<option value="11:30 PM">11:30 PM </option>
												<option value="12:00 PM">12:00 PM </option>
											</select>
												
											</div>
											
										</div>
									</div>	
											
									<div class=" row  form-group ">
										<div class="col-md-12" >	
										<button type="button" onclick="add_day_field();"  class="btn btn-xs green-haze"><?php _e('Add More','ivdirectories'); ?></button>
										</div>
									</div>	
								  </div>
								</div>
					  </div>
					<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
									  <?php _e('Event','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
									  <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseSix" class="panel-collapse collapse">
								  <div class="panel-body">											
										<?php
											// video, event , coupon , vip_badge , booking
										 if($this->check_write_access('event')){
											
										?>		
										<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Event Title','ivdirectories'); ?></label>
												<input type="text" class="form-control" name="event-title" id="event-title" value="<?php echo get_post_meta($post_edit->ID,'event_title',true); ?>" placeholder="<?php _e('Enter Title Here','ivdirectories'); ?>">							
										</div>	
										<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Event Detail','ivdirectories'); ?></label>
												<?php
													$settings_a = array(															
														'textarea_rows' =>10,	
														'editor_class' => 'form-control'															 
														);
													$content_client = get_post_meta($post_edit->ID,'event_detail',true);//$content;//get_option( 'iv_directories_signup_email');
													$editor_id = 'event-detail';
													//wp_editor( $content_client, $editor_id,$settings_a );	
																						
													?>
													<textarea id="event-detail" name="event-detail"  rows="4" class="form-control" > <?php echo $content_client; ?> </textarea>
											
												
												
										</div>
										<div class=" row form-group " style="margin-top:10px">
											<label for="text" class=" col-md-5 control-label"><?php _e('Event Image','ivdirectories'); ?>  </label>
										
											<div class="col-md-4" id="event_image_div">										
												
											
													<?php
													
													if(get_post_meta($post_edit->ID,'_event_image_id',true)!=''){
															$event_image_src= wp_get_attachment_url( get_post_meta($post_edit->ID,'_event_image_id',true) );
															?>
															<img  class="img-responsive"  src="<?php echo $event_image_src; ?>">
																														
													
													<?php		
													}else{ ?>
															<a  href="javascript:void(0);" onclick="event_post_image('event_image_div');"  >									
															<?php  echo '<img width="100px" src="'. wp_iv_directories_URLPATH.'assets/images/image-add-icon.png">'; ?>	
															</a>
															
																
															
													<?php
													}
													?>			
											</div>
										
											<div class="col-md-3" id="event_image_edit">	
													<?php
													
													if(get_post_meta($post_edit->ID,'_event_image_id',true)!=''){
															
															?>															
															<button type="button" onclick="event_post_image('event_image_div');"  class="btn btn-xs green-haze">Edit</button> &nbsp;<button type="button" onclick="remove_event_image('event_image_div');"  class="btn btn-xs green-haze">Remove</button>
															
													
													<?php		
													}else{ ?>
															<button type="button" onclick="event_post_image('event_image_div');"  class="btn btn-xs green-haze"><?php _e('Add','ivdirectories'); ?></button>
													<?php
													}
													?>		
											</div>	
											
											<input type="hidden" name="event_image_id" id="event_image_id" value="<?php echo get_post_meta($post_edit->ID,'_event_image_id',true); ?>" >
											
																				
										</div>	
										<?php
										}else{
												_e('Please upgrade your account to add event ','ivdirectories');
										}
										?>
								  </div>
								
								</div>
					  </div>
					<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapsenine">
									  <?php _e('Booking','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapsenine">
									  <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapsenine" class="panel-collapse collapse">
								  <div class="panel-body">	
									  <?php
											// video, event , coupon , vip_badge , booking
										 if($this->check_write_access('booking')){
											
										?>	
											 <div class="form-group">
												<label class="control-label"><?php _e('Booking Detail','ivdirectories'); ?>  </label>
												
												<?php
													$settings_booking = array(															
														'textarea_rows' =>2,	
														'editor_class' => 'form-control'															 
														);
													$content_client = get_post_meta($post_edit->ID,'booking_detail',true);
													$editor_id = 'booking_detail';
													//wp_editor( $content_client, $editor_id, $settings_booking );	
													
													$booking_shortcode = get_post_meta($post_edit->ID,'booking',true);									
													?>
												<textarea id="booking_detail" name="booking_detail"  rows="4" class="form-control" > <?php echo $content_client; ?> </textarea>
										  </div>
										  <div class="form-group">
												<label class="control-label"><?php _e('Or, Booking Shortcode','ivdirectories'); ?>  </label>
												<input type="text" name="booking" id="booking"  placeholder="e.g : [events_calendar long_events=1]" class="form-control" value="<?php echo $booking_shortcode; ?>" />
										  </div>
										  <?php
										}else{
												_e('Please upgrade your account to add booking detail ','ivdirectories');
										}
										?>
								  </div>
								</div>
					  </div>
					
						<div class="clearfix"></div>	
					<div class="panel panel-default">
								<div class="panel-heading">
								  <h4 class="panel-title col-lg-10">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven1">
									  <?php _e('Deal/Coupon','ivdirectories'); ?>
									</a>
								  </h4>
									<h4 class="panel-title" style="text-align:right;color:blue;font-size:12px;">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven1">
									   <?php _e('[ Edit ]','ivdirectories'); ?> 
									</a>
								  </h4>
								</div>
								<div id="collapseSeven1" class="panel-collapse collapse">
								  <div class="panel-body">											
										  <?php
											// video, event , coupon , vip_badge , booking
										 if($this->check_write_access('coupon')){
											
										?>	
										<div class=" form-group">
											
											<label for="text" class="control-label"><?php _e('Title','ivdirectories'); ?></label>
												<input type="text" class="form-control" name="deal-title" id="deal-title" value="<?php  echo get_post_meta($post_edit->ID,'deal_title',true);?>" placeholder="<?php _e('Enter Title Here','ivdirectories'); ?>">							
										</div>	
												<?php
												$currencyCode= get_option('_iv_directories_api_currency');
												?>
										<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Deals/Coupon Amount '.$currencyCode,'ivdirectories'); ?></label>
												
												<input type="text" class="form-control" name="deal-amount" id="deal-amount" value="<?php  echo get_post_meta($post_edit->ID,'deal_amount',true);?>" placeholder="<?php _e('Enter Deals or Coupon Amount on '.$currencyCode.' [ No currency, Only Number]','ivdirectories'); ?>">							
										</div>
									
										<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Paypal Email Address [Amount will deposit here]','ivdirectories'); ?></label>
												<input type="text" class="form-control" name="deal-paypal" id="deal-paypal" value="<?php  echo get_post_meta($post_edit->ID,'deal_paypal',true);?>" placeholder="<?php _e('Enter Your Paypal Email Address','ivdirectories'); ?>">							
										</div>
										
										<div class=" form-group">
											<label for="text" class=" control-label"><?php _e('Detail','ivdirectories'); ?></label>
													<?php
														$settings_a = array(															
															'textarea_rows' =>10,	
															'editor_class' => 'form-control'															 
															);
														$content_client =get_post_meta($post_edit->ID,'deal_detail',true);
														$editor_id = 'deal-detail';
														wp_editor( $content_client, $editor_id,$settings_a );	
																							
														?>
													
										</div>
									
										<div class="row form-group " >
											<label for="text" class=" col-md-5 control-label" ><?php _e('Deal/Coupon Image','ivdirectories'); ?></label>
										
											<div class="col-md-4" id="deal_image_div" >
												
												<?php													
													if(get_post_meta($post_edit->ID,'_deal_image_id',true)!=''){
															$deal_image_src= wp_get_attachment_url( get_post_meta($post_edit->ID,'_deal_image_id',true) );
															?>
															<img  class="img-responsive"  src="<?php echo $deal_image_src; ?>">
																														
													
													<?php		
													}else{ ?>
															<a  href="javascript:void(0);" onclick="deal_post_image('deal_image_div');"  >									
															<?php  echo '<img width="100px" src="'. wp_iv_directories_URLPATH.'assets/images/image-add-icon.png">'; ?>	
															</a>
															
																
															
													<?php
													}
													?>							
											</div>
											
											<input type="hidden" name="deal_image_id" id="deal_image_id" value="<?php echo get_post_meta($post_edit->ID,'_deal_image_id',true);  ?>">
											
											<div class="col-md-3" id="deal_image_edit">													
												<?php
													
													if(get_post_meta($post_edit->ID,'_deal_image_id',true)!=''){
															
															?>															
															<button type="button" onclick="deal_post_image('deal_image_div');"  class="btn btn-xs green-haze">Edit</button> &nbsp;<button type="button" onclick="remove_deal_image('deal_image_div');"  class="btn btn-xs green-haze">Remove</button>
															
													
													<?php		
													}else{ ?>
															<button type="button" onclick="deal_post_image('deal_image_div');"  class="btn btn-xs green-haze"><?php _e('Add','ivdirectories'); ?></button>
													<?php
													}
													?>	
												
											</div>									
										</div>	
										
						
								  <?php
										}else{
												_e('Please upgrade your account to add coupon/deal ','ivdirectories');
										}
										?>
						 </div>
								
								
								</div>
					  </div>
						
						
						
								<div class="margiv-top-10">
								    <div class="" id="update_message"></div>
									<input type="hidden" name="user_post_id" id="user_post_id" value="<?php echo $curr_post_id; ?>">
								    <button type="button" onclick="iv_save_post();"  class="btn green-haze"><?php _e('Save Post','ivdirectories'); ?></button>
		                          
		                        </div>	
									 
							</form>
						  </div>
						</div>
			<?php
			
				} // for Role
			
		
				
			?>
					
			

                      
					 </div>
                     
                  </div>
                </div>
              </div>
            </div>
          <!-- END PROFILE CONTENT -->

          
	 <script>
				 
		 
		 
function iv_save_post (){
	tinyMCE.triggerSave();	
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
				jQuery('#update_message').html(loader_image);
				var search_params={
					"action"  : 	"iv_directories_update_wp_post",	
					"form_data":	jQuery("#edit_post").serialize(), 
				};
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						if(response.code=='success'){
								var url = "<?php echo get_permalink(); ?>?&profile=all-post";    						
								jQuery(location).attr('href',url);	
						}
						//jQuery('#update_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg +'.</div>');
						
					}
				});
	
	}
function add_day_field(){
	var main_opening_div =jQuery('#day-row1').html(); 
	jQuery('#day_field_div').append('<div class="clearfix"></div><div class=" row form-group" >'+main_opening_div+'</div>');

}
function  remove_post_image	(profile_image_id){
	jQuery('#'+profile_image_id).html('');
	jQuery('#feature_image_id').val(''); 
	jQuery('#post_image_edit').html('<button type="button" onclick="edit_post_image(\'post_image_div\');"  class="btn btn-xs green-haze">Add</button>');  

}
function  remove_event_image	(profile_image_id){
	jQuery('#'+profile_image_id).html('');
	jQuery('#event_image_id').val(''); 
	jQuery('#event_image_edit').html('<button type="button" onclick="event_post_image(\'event_image_div\');"  class="btn btn-xs green-haze">Add</button>');  

}
function  remove_deal_image	(profile_image_id){
	jQuery('#'+profile_image_id).html('');
	jQuery('#deal_image_id').val(''); 
	jQuery('#deal_image_edit').html('<button type="button" onclick="deal_post_image(\'deal_image_div\');"  class="btn btn-xs green-haze">Add</button>');  

}	
 function edit_post_image(profile_image_id){	
				var image_gallery_frame;

               // event.preventDefault();
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: "<?php _e( 'Set Feature Image ', 'ivdirectories' ); ?>",
                    button: {
                        text: "<?php _e( 'Set Feature Image', 'ivdirectories' ); ?>",
                    },
                    multiple: false,
                    displayUserSettings: true,
                });                
                image_gallery_frame.on( 'select', function() {
                    var selection = image_gallery_frame.state().get('selection');
                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        if ( attachment.id ) {
							jQuery('#'+profile_image_id).html('<img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'">');
							jQuery('#feature_image_id').val(attachment.id ); 
							jQuery('#post_image_edit').html('<button type="button" onclick="edit_post_image(\'post_image_div\');"  class="btn btn-xs green-haze">Edit</button> &nbsp;<button type="button" onclick="remove_post_image(\'post_image_div\');"  class="btn btn-xs green-haze">Remove</button>');  
						   
						}
					});
                   
                });               
				image_gallery_frame.open(); 
				
	}
function event_post_image(profile_image_id){	
				var image_gallery_frame;

               // event.preventDefault();
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: "<?php _e( 'Set Event Image ', 'ivdirectories' ); ?>",
                    button: {
                        text: "<?php _e( 'Set Event Image', 'ivdirectories' ); ?>",
                    },
                    multiple: false,
                    displayUserSettings: true,
                });                
                image_gallery_frame.on( 'select', function() {
                    var selection = image_gallery_frame.state().get('selection');
                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        if ( attachment.id ) {
							jQuery('#'+profile_image_id).html('<img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'">');
							jQuery('#event_image_id').val(attachment.id ); 
							jQuery('#event_image_edit').html('<button type="button" onclick="event_post_image(\'event_image_div\');"  class="btn btn-xs green-haze">Edit</button> &nbsp;<button type="button" onclick="remove_event_image(\'event_image_div\');"  class="btn btn-xs green-haze">Remove</button>');  
						   
						}
					});
                   
                });               
				image_gallery_frame.open(); 
				
	}
function deal_post_image(profile_image_id){	
				var image_gallery_frame;

               // event.preventDefault();
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: "<?php _e( 'Set Deal/Coupon Image ', 'ivdirectories' ); ?>",
                    button: {
                        text: "<?php _e( 'Set Deal/Coupon Image', 'ivdirectories' ); ?>",
                    },
                    multiple: false,
                    displayUserSettings: true,
                });                
                image_gallery_frame.on( 'select', function() {
                    var selection = image_gallery_frame.state().get('selection');
                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        if ( attachment.id ) {
							jQuery('#'+profile_image_id).html('<img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'">');
							jQuery('#deal_image_id').val(attachment.id ); 
							jQuery('#deal_image_edit').html('<button type="button" onclick="deal_post_image(\'deal_image_div\');"  class="btn btn-xs green-haze">Edit</button> &nbsp;<button type="button" onclick="remove_deal_image(\'deal_image_div\');"  class="btn btn-xs green-haze">Remove</button>');  
						   
						}
					});
                   
                });               
				image_gallery_frame.open(); 
				
	}			
 function edit_gallery_image(profile_image_id){
				
				var image_gallery_frame;
				var hidden_field_image_ids = jQuery('#gallery_image_ids').val();
               // event.preventDefault();
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: "<?php _e( 'Gallery Images ', 'ivdirectories' ); ?>",
                    button: {
                        text: "<?php _e( 'Gallery Images', 'ivdirectories' ); ?>",
                    },
                    multiple: true,
                    displayUserSettings: true,
                });                
                image_gallery_frame.on( 'select', function() {
                    var selection = image_gallery_frame.state().get('selection');
                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        console.log(attachment);
                        if ( attachment.id ) {
							jQuery('#'+profile_image_id).append('<div id="gallery_image_div'+attachment.id+'" class="col-md-3"><img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'"><button type="button" onclick="remove_gallery_image(\'gallery_image_div'+attachment.id+'\', '+attachment.id+');"  class="btn btn-xs btn-danger">Remove</button> </div>');
							
							hidden_field_image_ids=hidden_field_image_ids+','+attachment.id ;
							jQuery('#gallery_image_ids').val(hidden_field_image_ids); 
							
							//jQuery('#gallery_image_edit').html('');  
						   
						}
					});
                   
                });               
				image_gallery_frame.open(); 

 }			

function  remove_gallery_image(img_remove_div,rid){	
	var hidden_field_image_ids = jQuery('#gallery_image_ids').val();	
	hidden_field_image_ids =hidden_field_image_ids.replace(rid, '');	
	jQuery('#'+img_remove_div).remove();
	jQuery('#gallery_image_ids').val(hidden_field_image_ids); 
	//jQuery('#gallery_gallery_edit').html('');  

}	
function remove_old_day(div_id){
	jQuery('#old_days'+div_id).remove();
}
function award_delete(id_delete){
	
	jQuery('#award_delete_'+id_delete).remove();
	
}
function add_award_field(){
	var main_award_div =jQuery('#award').html(); 
	jQuery('#awards').append('<div class="clearfix"></div><hr>'+main_award_div+'');
}
function award_post_image(awardthis){	
				var image_gallery_frame;
               // event.preventDefault();
                image_gallery_frame = wp.media.frames.downloadable_file = wp.media({
                    // Set the title of the modal.
                    title: "<?php _e( 'Set award Image ', 'ivdirectories' ); ?>",
                    button: {
                        text: "<?php _e( 'Set award Image', 'ivdirectories' ); ?>",
                    },
                    multiple: false,
                    displayUserSettings: true,
                });                
                image_gallery_frame.on( 'select', function() {
                    var selection = image_gallery_frame.state().get('selection');
                    selection.map( function( attachment ) {
                        attachment = attachment.toJSON();
                        if ( attachment.id ) {		
													
							jQuery(awardthis).html('<img  class="img-responsive"  src="'+attachment.sizes.thumbnail.url+'"><input type="hidden" name="award_image_id[]" id="award_image_id[]" value="'+attachment.id+'">');
							
							
						}
					});                   
                });               
				image_gallery_frame.open(); 				
	}	

</script>	  
<!-- for divi theme
<script>
jQuery( document ).ready(function() {
   jQuery('.collapse').collapse()
});	
</script>	
  -->      
