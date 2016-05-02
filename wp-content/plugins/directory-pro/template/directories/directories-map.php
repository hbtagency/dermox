<?php
global $post,$wpdb,$tag;


wp_enqueue_style('iv_directories-style-1109', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');

wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/markerclusterer.js');


?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
<style>


 .red-heart { color: red; }
 .iv-top-buffer { margin-top:10px!important; }

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





</style>

	<div class="bootstrap-wrapper ">
		<div class="" id="directory-temp"> 	
			
					
	
<?php
	$ins_lat='37.4419';
	$ins_lng='-122.1419';
	
	$dirs_data =array();
	$tag_arr= array();
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' => 'directories', // enter your custom post type
		'paged' => $paged, 
		'post_status' => 'publish',
		//'fields' => 'all',
		//'orderby' => 'ASC',
		'posts_per_page'=> '9999999',  // overrides posts per page in theme settings
	);
	
	$lat='';$long='';$keyword_post='';$address='';$postcats ='';$selected='';
	

	
	
    $the_query = new WP_GeoQuery( $args ); 
	
	
	?>	

	<!-- Map**************-->
	<div class="row" style= "" >	
		<div class="col-md-12" >							
			<div id="map"  style="height: 480px; position: relative; background-color: rgb(229, 227, 223); overflow: hidden;"> </div>	
		</div>										 
	</div>		
			
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
					
	endwhile; 
				$dirs_json ='';
				if(!empty($dirs_data)){
					$dirs_json =json_encode($dirs_data);
				}
			 
				?>	
		

		<?php else :
			$dirs_json='';
		 ?>
				
		<?php endif; ?>
	
	
	
	<!-- Design loop -->
			
	<input type="hidden" id="latitude" name="latitude" placeholder="Latitude" value="<?php echo $ins_lat; ?>" >
	<input type="hidden" id="longitude" name="longitude" placeholder="Longitude"  value="<?php echo $ins_lng; ?>">	
	<input type="hidden" class="form-control " id="address" name="address"  placeholder="<?php _e( 'Location', 'ivdirectories' ); ?>" 
					value="<?php echo trim($address); ?>">	
					
				<?php 
		wp_reset_query();
		wp_reset_postdata(); ?>
	</div>	
</div>


<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>

<!--
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	-->				
			<script type="text/javascript">								
                   
					
				function initialize() {
					var center = new google.maps.LatLng('<?php echo $ins_lat; ?>', '<?php echo $ins_lng; ?>');
					//var center = new google.maps.LatLng(49, 2.56);
					

					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 6,
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
	

</script>
