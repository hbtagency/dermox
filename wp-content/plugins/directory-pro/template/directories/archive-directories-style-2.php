<?php
global $post,$wpdb,$tag;

$directory_url=get_option('_iv_directory_url');					
if($directory_url==""){$directory_url='directories';}
wp_enqueue_style('iv_directories-style-1109', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-ar-script-21', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/markerclusterer.js');

wp_enqueue_style('iv_directories-style-11010', wp_iv_directories_URLPATH . 'admin/files/css/image_gallery.css');

?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
<style>

 .red-heart { color: red; }
 .iv-top-buffer { margin-top:10px!important; }



.range {   
    position: relative;
    height: 20px;
    
    background-color: rgb(245, 245, 245);
    border-radius: 5px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}
.range-value {   
    position: relative;
  
    
}
.range input[type="range"] {
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -ms-appearance: none !important;
    -o-appearance: none !important;
    appearance: none !important;

    display: table-cell;
    width: 100%;
    background-color: transparent;
    height: 20px;
    cursor: pointer;
}
.range input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -ms-appearance: none !important;
    -o-appearance: none !important;
    appearance: none !important;

    width: 11px;
    height: 20px;
    color: rgb(255, 255, 255);
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: 0px;
    background-color: rgb(153, 153, 153);
}
.range-success input[type="range"]::-webkit-slider-thumb {
    background-color: rgb(92, 184, 92);
}
.range-success input[type="range"]::-moz-slider-thumb {
    background-color: rgb(92, 184, 92);
}



.range input[type="range"] {
    outline: none;
}





#map-marker-info .address, .map-marker-info .rating, .map-marker-info h5 {
    margin: 0.5em 70px 0.5em 0px;
    display: block;
}
#map-marker-info .map-marker-info .list-cover {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    position: absolute;
    right: 5px;
}
#map-marker-info .list-cover {
    background-size: cover;
    background-position: center center;
    width: 60px;
    height: 60px;
}
.thumbnail {
    position: relative;
    height: 135px;
    overflow: hidden;
	border: 0px !important;
 
    img {
        width:920px
        max-width: 920px; //only set this if using Twitter Bootstrap
        position: absolute;
        left:50%;
        margin-left: -460px; //half of the image size
    }
}


.item-list-page-wrap .navbar {
  margin-bottom: 20px;
  background: #eee;
  border-radius: 0;
  border-top: 1px #ccc solid;
  border-bottom: 1px #ccc solid;
}


@media(max-width: 500px) {
    /* For mobile phones: */
    [class*="col-"] {
        padding-left:10px;padding-right:10px
    }
}

</style>

	<div class="bootstrap-wrapper ">
		<div class="container" id="directory-temp"> 	
			
					
	
<?php
	$ins_lat='37.4419';
	$ins_lng='-122.1419';
	
	$dirs_data =array();
	$tag_arr= array();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => $directory_url, // enter your custom post type
		'paged' => $paged, 
		'post_status' => 'publish',
		//'fields' => 'all',
		//'orderby' => 'ASC',
		//'posts_per_page'=> '2',  // overrides posts per page in theme settings
	);
	
	$lat='';$long='';$keyword_post='';$address='';$postcats ='';$selected='';
	
	if(get_query_var('directories-category')!=''){			
			$postcats = get_query_var($directory_url.'-category');
			$args[$directory_url.'-category']=$postcats;
			$selected=$postcats;	
	}
	
	if( isset($_POST['directories-category'])){
		if($_POST['directories-category']!=''){
			$postcats = $_POST['directories-category'];
			$args[$directory_url.'-category']=$postcats;
			$selected=$postcats;
			$args['posts_per_page']='9999';	
		}		
	}
	
	
	$radius=get_option('_iv_radius');
	if( isset($_POST['range_value'])){
		$radius = $_POST['range_value'];
	}	
	if($radius==''){$radius='50';}
	
	if( isset($_POST['address'])){
		if($_POST['address']!=""){
			$lat =  $_POST['latitude'];
			$long = $_POST['longitude'];
			$address=trim($_POST['address']);
			$args['lat']=$lat;
			$args['lng']=$long;
			$args['distance']=$radius;
			$args['posts_per_page']='9999';			
		}		
	}
	if( isset($_POST['keyword'])){
		if($_POST['keyword']!=""){
			$args['s']= $_POST['keyword'];
			$keyword_post=$_POST['keyword'];
			$args['posts_per_page']='9999';
		}
	}
	
	
	if( isset($tag)){
		if($tag!=""){
			if(!isset($_POST['keyword'])){
				$args['tag']= $tag;						
			}
		}
	}	
	if( isset($_POST['tag_arr'])){  
		if($_POST['tag_arr']!=""){  
			
			$tag_arr= $_POST['tag_arr'];	
			//$tag_arr= get_query_var('tag_arr');	
				
			$tags_string= implode("+", $tag_arr);
			$args['tag']= $tags_string;
			
		}
	}		
	
		
		$args_bidding =$args ;
		
		$args_bidding['posts_per_page']='999999';
		$args_bidding['paged']='1';
		$the_query_bidding = new WP_GeoQuery( $args_bidding ); 
		
		// Bidding -- Search Paid listing*****
		$i=0;
		$bump_exp_date = '';//get_post_meta($row->ID,'_bump_exp_date',true);
		$bump_amount  = '';//get_post_meta($row->ID,'_bump_amount',true); 
		$bump_create_date='';// get_post_meta($row->ID,'_bump_create_date',true);
		$paid_area_count=0;
		$paid_ids = array();
		$paid_id_amount = array();
		if ( $the_query_bidding->have_posts() ) : 
			while ( $the_query_bidding->have_posts() ) : $the_query_bidding->the_post();
				$id = get_the_ID();
					$near_bump_exp_date=get_post_meta($id,'_bump_exp_date',true);
					$near_bump_create_date= get_post_meta($id,'_bump_create_date',true);
					$near_bump_amount= get_post_meta($id,'_bump_amount',true);												
					if(strtotime($near_bump_exp_date)>=time()){
						
							$paid_id_amount[$id]=$near_bump_amount;
							$paid_ids[$i]=$id;							
							$i++;																	
					}
			endwhile; 
		endif;		
		arsort($paid_id_amount); // sort TOP listing 
		
	// End Bidding Search Paid listing****
	
	   $the_query = new WP_GeoQuery( $args ); 
		
	// End Bidding Search Paid listing****
	
	
	?>
	<?php
$search_show=0;		
$map_show=0;
$dir_searchbar_show=get_option('_dir_searchbar_show');	
if($dir_searchbar_show=="yes"){$search_show=1;}
$dir_map_show=get_option('_dir_map_show');	
if($dir_map_show=="yes"){$map_show=1;}

?>	
			<!-- Map**************-->
			<div class="" style="<?php echo ($map_show==1 ? '': 'display: none;'); ?>" >									
			<div id="map"  style=" height: 380px; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"> </div>											 
			</div>
				
				
				
		 <div class=" navbar-default navbar" style="<?php echo ($search_show==1 ? '': 'display: none;'); ?>">
			<div class=" navbar-collapse text-center" >		
					<form class="form-inline" method="POST"  onkeypress="return event.keyCode != 13;">
					  <div class="form-group" style="margin-top:8px">						
							<input type="text" class="form-control " id="keyword" name="keyword"  placeholder="<?php _e( 'Keyword', 'ivdirectories' ); ?>" value="<?php echo $keyword_post; ?>">
					  </div>
					  
					  <div class="form-group" style="margin-top:8px">
									<?php
								echo '<select name="directories-category" class="form-control">';
								echo'	<option selected="'.$selected.'" value="">'.__('Any Category','ivdirectories').'</option>';
								
										
										if( isset($_POST['submit'])){
											$selected = $_POST['directories-category'];
										}
											//directories
											$taxonomy = $directory_url.'-category';
											$args = array(
												'orderby'           => 'name', 
												'order'             => 'ASC',
												'hide_empty'        => true, 
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
									foreach ( $terms as $term_parent ) {  ?>												
										
										
											<?php  
											
											echo '<option  value="'.$term_parent->slug.'" '.($selected==$term_parent->slug?'selected':'' ).'><strong>'.$term_parent->name.'<strong></option>';
											?>	
												<?php
												
												$args2 = array(
													'type'                     => $directory_url,						
													'parent'                   => $term_parent->term_id,
													'orderby'                  => 'name',
													'order'                    => 'ASC',
													'hide_empty'               => 1,
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
														echo '<option  value="'.$term->slug.'" '.($selected==$term->slug?'selected':'' ).'>-'.$term->name.'</option>';
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
						<div class="form-group" style="margin-top:8px">							
								<input type="text" class="form-control " id="address" name="address"  placeholder="<?php _e( 'Location', 'ivdirectories' ); ?>" 
								value="<?php echo trim($address); ?>">
								<input type="hidden" id="latitude" name="latitude" placeholder="Latitude" value="<?php echo $lat; ?>" >
								<input type="hidden" id="longitude" name="longitude" placeholder="Longitude"  value="<?php echo $long; ?>">
					  </div>
						<?php
							$dir_search_redius=get_option('_dir_search_redius');	
							if($dir_search_redius==""){$dir_search_redius='Km';}	
							?>
						<div class="form-group" style="margin-top:8px">
							<?php _e( 'Radius', 'ivdirectories' ); ?>: <span id="rvalue"><?php echo $radius;?></span><?php echo ' '.$dir_search_redius; ?>
						</div>
						
					 	<div class="form-group" style="margin-top:8px">
								<div class="range range-success">					
									<input type="range" name="range" id="range" min="1" max="1000" value="<?php echo $radius;?>" onchange="range.value=value">	
									<input type="hidden" name="range_value" id="range_value" value="<?php echo $radius; ?>" >							
								</div>	
						</div>	
						
						<div class="form-group" style="margin-top:8px">
							<button type="submit" id="submit" name="submit"  class="btn btn-default "><?php _e('Search','ivdirectories'); ?> </button>	
						</div>	
						
						
					 
					</form>				
		
		 </div>
		</div>	
	
	
		<div class=" ">	
		<div class="categories-imgs text-center">
	
	
	<?php 
		// For Bidding Loop*******************
		$ii=1;
		if($paged==1){
			foreach ($paid_id_amount as $key => $val) { 
			$id=$key; 
			$post = get_post($id);
			
			//echo "$key = $val\n";	
			
					$feature_img='';
					if(has_post_thumbnail()){ 
						$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' ); 
						if($feature_image[0]!=""){ 							
							$feature_img =$feature_image[0];
						}					
					}else{
						$feature_img= wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";					
					
					}
					
					$currentCategory=wp_get_object_terms( $id, $directory_url.'-category');
					$cat_link='';$cat_name='';$cat_slug='';
					if(isset($currentCategory[0]->slug)){										
						$cat_slug = $currentCategory[0]->slug;
						$cat_name = $currentCategory[0]->name;
						$cc=0;
						foreach($currentCategory as $c){		
								if($cc==0){
									$cat_name =$c->slug;
									$cat_slug =$c->slug;
								}else{
									$cat_name = $cat_name .', '.$c->name;
									$cat_slug = $cat_slug .' '.$c->slug;
								}															
							$cc++;
						}	
						
						$cat_link= get_term_link($currentCategory[0], $directory_url.'-category');
						
					}
					?>						
					
					<a href="<?php echo the_permalink(); ?>" style="color:#000000;">
										
						<img src="<?php echo $feature_img; ?>" style="width:325px; height:178px;">																	
						<span style="font-size:18px;"><?php echo $post->post_title;  ?></span>
						<div class="categories-wrap-shadow"></div>
						<div class="inner-meta ">
							<div><?php echo $post->post_title;  ?></div>
							<small><?php echo $cat_name; ?></small>
						</div>
					</a>
		<?php	
			$ii++;	
		}
	}	
		// END Bidding top loop End**************
		
	?>
	
		
	<?php	
	$i=1;
	 if ( $the_query->have_posts() ) : 
	
	while ( $the_query->have_posts() ) : $the_query->the_post();
				$id = get_the_ID();
				
				$gallery_ids=get_post_meta($id ,'image_gallery_ids',true);
				$gallery_ids_array = array_filter(explode(",", $gallery_ids));
				
				$dir_data['link']=get_post_permalink();
				$dir_data['title']=$post->post_title; 				
				$dir_data['lat']=get_post_meta($id,'latitude',true);
				$dir_data['lng']=get_post_meta($id,'longitude',true);
				$ins_lat=get_post_meta($id,'latitude',true);
				$ins_lng=get_post_meta($id,'longitude',true);
				$dir_data['address']=get_post_meta($id,'address',true); 
				$dir_data['image']= '';
				$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'thumbnail' ); 
				if($feature_image[0]!=""){ 
					//$dir_data['image']= '<img class=" img-responsive" src="'. $feature_image[0].'">';
					$dir_data['image']=  $feature_image[0];
				}
				$dir_data['marker_icon']=wp_iv_directories_URLPATH."/assets/images/map-marker/map-marker.png";				
				$currentCategoryId='';
				$terms =get_the_terms($id, "directories-category");				
				if($terms!=""){
					foreach ($terms as $termid) {  
						if(isset($termid->term_id)){
							 $currentCategoryId= $termid->term_id; 
						}					  
					} 
				}
				$marker = get_option('_cat_map_marker_'.$currentCategoryId,true);
				if($marker!=''){
					$image_attributes = wp_get_attachment_image_src( $marker ); // returns an array
					if( $image_attributes ) {
					
						$dir_data['marker_icon']= $image_attributes[0];
					}							
				}
				
				
				
				
				array_push( $dirs_data, $dir_data );
				
				if (in_array($id, $paid_ids)) {
					continue;
				}
								
				
				?>
				<?php
					$feature_img='';
					if(has_post_thumbnail()){ 
						$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' ); 
						if($feature_image[0]!=""){ 							
							$feature_img =$feature_image[0];
						}					
					}else{
						$feature_img= wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";					
					
					}
					
					$currentCategory=wp_get_object_terms( $id, $directory_url.'-category');
					$cat_link='';$cat_name='';$cat_slug='';
					if(isset($currentCategory[0]->slug)){										
						$cat_slug = $currentCategory[0]->slug;
						$cat_name = $currentCategory[0]->name;
						$cc=0;
						foreach($currentCategory as $c){		
								if($cc==0){
									$cat_name =$c->slug;
									$cat_slug =$c->slug;
								}else{
									$cat_name = $cat_name .', '.$c->name;
									$cat_slug = $cat_slug .' '.$c->slug;
								}															
							$cc++;
						}	
						$cat_link= get_term_link($currentCategory[0], $directory_url.'-category');
						
					}
					?>		
					
					
				<a href="<?php echo the_permalink(); ?>" style="color:#000000;">
									
					<img src="<?php echo $feature_img; ?>" style="width:325px; height:178px;">																	
					<span style="font-size:18px;"><?php echo $post->post_title; ?></span>
					<div class="categories-wrap-shadow"></div>
					<div class="inner-meta ">
						<div><?php echo $post->post_title;  ?></div>
						<small><?php echo $cat_name; ?></small>						
					</div>
				</a>
						
				
			
		<?php 
				
			$ii++;		
		
		$i++;
		
	endwhile; 
				$dirs_json ='';
				if(!empty($dirs_data)){
					$dirs_json =json_encode($dirs_data);
				}
			 
				?>	
		

		<?php else :
			$dirs_json='';
		 ?>
				<div class="col-md-12 iv-top-buffer">
					<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
				</div>
		<?php endif; ?>
	
	
	
	<!-- Design loop -->
			</div>
		</div>	
	
					<!-- end of the loop -->	
					<!--
					paging plugin
					https://wordpress.org/plugins/wp-pagenavi/screenshots/
					-->
				
					<?php if (function_exists('wp_pagenavi')) : ?>
							<div class="col-md-12 text-center">
							<?php wp_pagenavi( array( 'query' => $the_query ) ); ?>
							</div>
						<?php else: ?>								
								<div class="row">			
									<div class="col-sm-6 col-md-6 nav-next"><?php previous_posts_link( '<div class=""> <div class="fa fa-arrow-circle-left"></div>'.__( ' Newer Entries', 'ivdirectories' ).'</div>' ); ?></div>
										<div class="col-sm-6 col-md-6 nav-previous"><?php next_posts_link( '<div class="pull-right">'.__( ' Older Entries ', 'ivdirectories' ).'<div class="fa fa-arrow-circle-right"></div></div>' ); ?>
									</div>
								</div>
					  <?php endif; ?>
					<!--END .navigation-links-->
					<div> <p>&nbsp;</p></div>
				<?php 
				wp_reset_query();
				wp_reset_postdata(); ?>
	</div>	
</div>


<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script type="text/javascript">								
function initialize() {
					var center = new google.maps.LatLng('<?php echo $ins_lat; ?>', '<?php echo $ins_lng; ?>');
					//var center = new google.maps.LatLng(49, 2.56);
					

					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 7,
						center: center,
						mapTypeId: google.maps.MapTypeId.ROADMAP
					});

					var markers = [];
					var infowindow = new google.maps.InfoWindow();
					var dirs ='';
					<?php echo ($dirs_json!=''? 'var dirs ='.$dirs_json:''); ?>;
					if(dirs!=''){
					 for (i = 0; i < dirs.length; i++) {
						//for(var i=0;i<5;i++){
							//console.log(dirs[i);
							
							var latLng = new google.maps.LatLng(dirs[i].lat,dirs[i].lng);
							var marker = new google.maps.Marker({
								position: latLng,
								map: map,
								icon: dirs[i].marker_icon,
							});
							markers.push(marker);
								 google.maps.event.addListener(marker, 'click', (function(marker, i) {
									return function() {
										
										
											//infowindow.setContent('<div id="map-marker-info " ><a href="'+dirs[i].link +'">'+dirs[i].image+'<h5>'+ dirs[i].title //+'</h5><span class="address">'+dirs[i].address+'</span></a></div>');
											
											infowindow.setContent('<div id="map-marker-info" style="overflow: auto; cursor: default; clear: both; position: relative; border-radius: 4px; padding: 15px; border-color: rgb(255, 255, 255); border-style: solid; background-color: rgb(255, 255, 255); border-width: 1px; width: 275px; height: 130px;"><div style="overflow: hidden;" class="map-marker-info"><a  style="text-decoration: none;" href="'+dirs[i].link +'">	<span style="background-image: url('+dirs[i].image+')" class="list-cover has-image"></span><span class="address"><strong>'+dirs[i].title +'</strong></span> <span class="address" style="margin-top:15px">'+dirs[i].address+'</span></a></div></div>');
										infowindow.open(map, marker);
									}
								})(marker, i));

						}
					}

					var markerCluster = new MarkerClusterer(map, markers);
				}	
				function cs_toggle_street_view(btn) {
				  var toggle = panorama.getVisible();
				  if (toggle == false) {
					if(btn == 'streetview'){
					  panorama.setVisible(true);
					}
				  } else {
					if(btn == 'mapview'){
					  panorama.setVisible(false);
					}
				  }
				}

                google.maps.event.addDomListener(window, 'load', initialize);					
				
				//google.maps.event.trigger(map, 'resize');					
					jQuery('a[href="#locationmap"]').on('click', function(e) {
						setTimeout(function(){
								initialize();	
								google.maps.event.trigger(map, 'resize');
						},500)
							
					});
				
						
			</script>
<script>
	function save_favorite(id) {       
		
		  var isLogged ="<?php echo get_current_user_id();?>";
                               
                if (isLogged=="0") {                   
                     alert("<?php _e('Please login to add favorite','ivdirectories'); ?>");
                } else { 
						
						var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
						var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
						//jQuery('#fav_message').html(loader_image); 
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
								jQuery("#fav_dir"+id).html('<a href="javascript:;" onclick="save_unfavorite('+id+')" ><span class="hide-sm"><i class="fa fa-heart fa-lg red-heart"></i>&nbsp;&nbsp; </span></a>');
							
								
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
						var loader_image = '<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />';
						//jQuery('#fav_message'+id).html(loader_image); 
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
								jQuery("#fav_dir"+id).html('<a href="javascript:;" onclick="save_favorite('+id+')" ><span class="hide-sm"><i class="fa fa-heart fa-lg "></i>&nbsp;&nbsp; </span></a>');
							
								
							}
						});
						
				}  
				
    }
	
function initialize_address() {
        var input = document.getElementById('address');
        var autocomplete = new google.maps.places.Autocomplete(input);
			google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            //document.getElementById('city2').value = place.name;
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng(); 
        });
    }
google.maps.event.addDomListener(window, 'load', initialize_address);
jQuery('input[name="range"]').on("change", function() { 
		//jQuery(this).next().html(jQuery(this).val() + '%');
		jQuery('#rvalue').html(jQuery(this).val());
		jQuery('#range_value').val(jQuery(this).val());
		//console.log(jQuery(this).val());
});
jQuery(function () {
  jQuery('[data-toggle="tooltip"]').tooltip();
})
</script>
