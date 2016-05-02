<?php
global $post,$wpdb,$tag;

$directory_url=get_option('_iv_directory_url');					
if($directory_url==""){$directory_url='directories';}
wp_enqueue_style('iv_directories-style-1109', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-ar-script-21', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/markerclusterer.js');
?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  
<style>

 .red-heart { color: red; }
 .iv-top-buffer { margin-top:10px!important; }
 .row {
  margin-left: 0px!important;
  margin-right: 15px!important;
}

.range {   
    position: relative;
    height: 25px;
    margin-top: 20px;
    background-color: rgb(245, 245, 245);
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}
.range-value {   
    position: relative;
    height: 25px;
    margin-top: 20px;    
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
    height: 25px;
    cursor: pointer;
}
.range input[type="range"]::-webkit-slider-thumb {
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
    -ms-appearance: none !important;
    -o-appearance: none !important;
    appearance: none !important;

    width: 11px;
    height: 25px;
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


.range output {
    display: table-cell;
    padding: 3px 5px 2px;
    min-width: 40px;
    color: rgb(255, 255, 255);
    background-color: rgb(153, 153, 153);
    text-align: center;
    text-decoration: none;
    border-radius: 4px;
    border-bottom-left-radius: 0;
    border-top-left-radius: 0;
    width: 1%;
    white-space: nowrap;
    vertical-align: middle;

    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    -ms-transition: all 0.5s ease;
    transition: all 0.5s ease;

    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: -moz-none;
    -o-user-select: none;
    user-select: none;
}
.range input[type="range"] {
    outline: none;
}
.dir-box-ep {

	background: #FEFEFE;
	border: 2px solid #FAFAFA;
	box-shadow: 0 1px 2px rgba(34, 25, 25, 0.4);
	margin: 0 0px 30px;	
	-webkit-column-break-inside: avoid;
	-moz-column-break-inside: avoid;
	column-break-inside: avoid;
	padding: 10px;
	padding-bottom: 5px;
	background: -webkit-linear-gradient(45deg, #FFF, #F9F9F9);
	opacity: 1;
	min-height:255px;
	
	
}

.dir-box-ep:hover {	
	border-color: #D2D2D2;
	box-shadow: 0 0 6px rgba(210,210,210, 0.6);
}
 #directory-temp h5 {		
	font-size: 13px;
	padding: 0;
	font-family: 'Open Sans', Arial, sans-serif;
	text-shadow: none;
	margin: 1px 0 0;
	font-weight: 700;
	text-transform: capitalize;
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
.fixed {
        position: fixed;
         float: left!important;
		 
}
.scrollit {
       float: right!important;
	           
}
</style>

	<div class="bootstrap-wrapper ">
		<div class="row "> 			
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
	
	if(get_query_var($directory_url.'-category')!=''){			
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
		
			<div class="col-md-12 col-xs-12" >
				<div class="col-md-12 col-xs-12" style="<?php echo ($map_show==1 ? '': 'display: none;'); ?>" >		
					<div id="map" class="" style="width:100%;height:400px;"> </div>
				</div>					 
			</div>		
		
		<div class="col-md-12  col-xs-12" id="directory-temp" style= "margin-top:10px" >	
		  <div style="<?php echo ($search_show==1 ? '': 'display: none;'); ?>">
			<form   method="POST" role="form" onkeypress="return event.keyCode != 13;">
				<div class="row" >
						<div class="col-md-6">
							<input type="text" class="form-control " id="keyword" name="keyword"  placeholder="<?php _e( 'Keyword', 'ivdirectories' ); ?>" value="<?php echo $keyword_post; ?>">		
						</div>						
						
						<div class="col-md-6">
							
							<?php
								echo '<select name="directories-category" class="form-control ">';
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
						
					</div>
				<div class="row ">
						<div class="col-md-6" style= "margin-top:10px">								
								<input type="text" class="form-control " id="address" name="address"  placeholder="<?php _e( 'Location', 'ivdirectories' ); ?>" 
								value="<?php echo trim($address); ?>">
								<input type="hidden" id="latitude" name="latitude" placeholder="Latitude" value="<?php echo $lat; ?>" >
								<input type="hidden" id="longitude" name="longitude" placeholder="Longitude"  value="<?php echo $long; ?>">
						</div>
					
						<div class="col-md-2 ">
							<div  class="range-value" ><?php _e( 'Radius', 'ivdirectories' ); ?>: <span id="rvalue"><?php echo $radius;?></span>Km </div>
						</div>
						<div class="col-md-4 ">				
							<div class="range range-success">					
								<input type="range" name="range" id="range" min="1" max="1000" value="<?php echo $radius;?>" onchange="range.value=value">	
								<input type="hidden" name="range_value" id="range_value" value="<?php echo $radius; ?>" >							
							 </div>
						
						</div>
				</div>	
			
			<div class="clearfix"></div> 
			<div class="row iv-top-buffer">		
					<div class="col-md-12">
							<?php _e('Filter by tag :','ivdirectories'); ?>
					</div>	
					<div class="col-md-12">	
						<small>
							<?php
								$args =array();
								$args['hide_empty']=false;
								$tags = get_tags($args );													
								
								foreach ( $tags as $tag ) { 
									$checked='';
									if(isset($tag_arr)){
										
										if(in_array( $tag->slug,$tag_arr)){
												$checked=' checked';
										}
									}
									
									?>
									<div class="col-md-3  col-xs-6 checkbox">
										 <label > <input type="checkbox" name="tag_arr[]" id="tag_arr[]" value="<?php echo $tag->slug; ?>" <?php  echo $checked; ?> > 
												<?php echo $tag->name; ?> 
										</label>  
									</div>
									<?php													
									
								
								}
							?>
						</small>	
					</div>		
			</div>
			<div class="row">
					<div class="col-md-12 text-center">							
						<button type="submit" id="submit" name="submit"  class="btn btn-success "><?php _e('Search','ivdirectories'); ?> </button>	
					</div>
			</div>		
			</form>
		</div>	
	    <div class="row iv-top-buffer">	</div>	
	<?php 
	$ii=1;
		// For Bidding Loop*******************
		if($paged==1){
		
		foreach ($paid_id_amount as $key => $val) { 
			$id=$key; 
			$post = get_post($id);
			//echo "$key = $val\n";
			
			?>			
						<div class="col-md-3 col-sm-3 col-xs-12 ">
						<div class=" dir-box-ep">	
								<?php 
								if(has_post_thumbnail()){
									//$dirs_data['image']= wp_get_attachment_url( $event_img);
								?>
									<!--
									<a href="<?php echo the_permalink();?>"> <?php the_post_thumbnail( 'medium','class=img-responsive' );?></a>
									-->
									<a href="<?php echo get_post_permalink($id);?>"> 
									<div class="thumbnail">
										<?php the_post_thumbnail( 'medium','class=img-responsive' );?>
									
									</div>
								</a>	
								<?php	
								}else{?>
									<a href="<?php echo get_post_permalink($id);?>"> 
										<div class="thumbnail">
											<img  class=""   src="<?php echo  wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";?>">
										</div>
									</a>
								<?php
								
								}
								?>
								<p>
									<div class="row ">	
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
										<h5><a href="<?php echo the_permalink();?>"> <?php 
										 if (strlen(the_title('','',FALSE)) > 50) {
										   $title_short = substr(the_title('','',FALSE), 0, 50);
										   preg_match('/^(.*)\s/s', $title_short, $matches);
									   if (isset($matches[1])){ $title_short = $matches[1];}
										   $title_short = $title_short.'..';
									   } else {
										   $title_short = the_title('','',FALSE);
										}		
										echo $title_short;	
											//the_title();
										?></a> </h5>
										</div>
									</div>
								</p>
								<p>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">	
									<?php
									$now = time();
									$new_badge_day=get_option('_iv_new_badge_day');
									if($new_badge_day==''){$new_badge_day=7;}
									 $post_date = strtotime($post->post_date);
									 $datediff = $now - $post_date;
									 $total_day =  floor($datediff/(60*60*24));
									 if($total_day<=$new_badge_day ){ ?>									
											<img  style="width:40px;" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/newicon-big.png";?>">
										
									<?php	
									 }
									$post_author_id= $post->post_author;
									$author_package_id=get_user_meta($post_author_id, 'iv_directories_package_id', true); 
									$have_vip_badge= get_post_meta($author_package_id,'iv_directories_package_vip_badge',true);
									$exprie_date= strtotime (get_user_meta($post_author_id, 'iv_directories_exprie_date', true));	
									$current_date=time();
									if($have_vip_badge=='yes'){
										if($exprie_date >= $current_date){ ?>														
												<img style="width:30px;"   src="<?php echo  wp_iv_directories_URLPATH."/assets/images/vipicon.png";?>">
											
										<?php
										}	
									}								
								?>								
																
										<span id="fav_dir<?php echo $id; ?>" >					
											<?php
												$user_ID = get_current_user_id();
												if($user_ID>0){
													$my_favorite = get_post_meta($id,'_favorites',true);
													$all_users = explode(",", $my_favorite);
													if (in_array($user_ID, $all_users)) { ?>
														<a  data-toggle="tooltip" data-placement="bottom" title="<?php _e('Added to Favorites','ivdirectories'); ?>" href="javascript:;" style="text-decoration: none;" onclick="save_unfavorite('<?php echo $id; ?>')" >   
														<span class="hide-sm"><i class="fa fa-heart fa-lg red-heart"></i>&nbsp;&nbsp; </span></a> 
													<?php								
													}else{ ?>
														<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" style="text-decoration: none;" onclick="save_favorite('<?php echo $id; ?>')" >
														<span class="hide-sm"><i class="fa fa-heart fa-lg"></i>&nbsp;&nbsp; </span>
														</a> 
													<?php	
													}
													
												}else{ ?>
														<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" style="text-decoration: none;" onclick="save_favorite('<?php echo $id; ?>')" >
														<span class="hide-sm"><i class="fa fa-heart fa-lg "></i>&nbsp;&nbsp; </span>
														</a> 
												
											<?php							
												}
												 
											?>
										</span>									
									</div>
								</p>
								
						</div>				
					</div>
		
						
					
		<?php
				if($ii>=4){ $ii=0; ?>
					<div class="clearfix"></div> 
				<?php
				}
			$ii++;	
		}
	}	
		// END Bidding top loop End**************

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
				$terms =get_the_terms($id, $directory_url."-category");				
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
					<div class="col-md-3 col-sm-3 col-xs-12 ">
						<div class=" dir-box-ep">	
								<?php 
								if(has_post_thumbnail()){
									//$dirs_data['image']= wp_get_attachment_url( $event_img);
								?>
									<!--
									<a href="<?php echo the_permalink();?>"> <?php the_post_thumbnail( 'medium','class=img-responsive' );?></a>
									-->
									<a href="<?php echo get_post_permalink($id);?>"> 
									<div class="thumbnail">
										<?php the_post_thumbnail( 'medium','class=img-responsive' );?>
									
									</div>
								</a>	
								<?php	
								}else{?>
									<a href="<?php echo get_post_permalink($id);?>"> 
										<div class="thumbnail">
											<img  class=""   src="<?php echo  wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";?>">
										</div>
									</a>
								<?php
								
								}
								?>
								<p>
									<div class="row ">	
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
										<h5><a href="<?php echo the_permalink();?>"> <?php 
										 if (strlen(the_title('','',FALSE)) > 50) {
										   $title_short = substr(the_title('','',FALSE), 0, 50);
										   preg_match('/^(.*)\s/s', $title_short, $matches);
									   if (isset($matches[1])){ $title_short = $matches[1];}
										   $title_short = $title_short.'..';
									   } else {
										   $title_short = the_title('','',FALSE);
										}		
										echo $title_short;	
											//the_title();
										?></a> </h5>
										</div>
									</div>
								</p>
								<p>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">	
									<?php
								$now = time();
								$new_badge_day=get_option('_iv_new_badge_day');
								if($new_badge_day==''){$new_badge_day=7;}
								 $post_date = strtotime($post->post_date);
								 $datediff = $now - $post_date;
								 $total_day =  floor($datediff/(60*60*24));
								 if($total_day<=$new_badge_day ){ ?>
									
										<img  style="width:40px;" src="<?php echo  wp_iv_directories_URLPATH."/assets/images/newicon-big.png";?>">
									
								<?php	
								 }
								$post_author_id= $post->post_author;
								$author_package_id=get_user_meta($post_author_id, 'iv_directories_package_id', true); 
								$have_vip_badge= get_post_meta($author_package_id,'iv_directories_package_vip_badge',true);
								$exprie_date= strtotime (get_user_meta($post_author_id, 'iv_directories_exprie_date', true));	
								$current_date=time();
								if($have_vip_badge=='yes'){
									if($exprie_date >= $current_date){ ?>
																
											<img style="width:30px;"   src="<?php echo  wp_iv_directories_URLPATH."/assets/images/vipicon.png";?>">
										
									<?php
									}	
								}								
								?>
								
									<span id="fav_dir<?php echo $id; ?>" >					
										<?php
											$user_ID = get_current_user_id();
											if($user_ID>0){
												$my_favorite = get_post_meta($id,'_favorites',true);
												$all_users = explode(",", $my_favorite);
												if (in_array($user_ID, $all_users)) { ?>
													<a  data-toggle="tooltip" data-placement="bottom" title="<?php _e('Added to Favorites','ivdirectories'); ?>" href="javascript:;" style="text-decoration: none;" onclick="save_unfavorite('<?php echo $id; ?>')" >   
													<span class="hide-sm"><i class="fa fa-heart fa-lg red-heart"></i>&nbsp;&nbsp; </span></a> 
												<?php								
												}else{ ?>
													<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" style="text-decoration: none;" onclick="save_favorite('<?php echo $id; ?>')" >
													<span class="hide-sm"><i class="fa fa-heart fa-lg"></i>&nbsp;&nbsp; </span>
													</a> 
												<?php	
												}
												
											}else{ ?>
													<a data-toggle="tooltip" data-placement="bottom" title="<?php _e('Add to Favorites','ivdirectories'); ?>" href="javascript:;" style="text-decoration: none;" onclick="save_favorite('<?php echo $id; ?>')" >
													<span class="hide-sm"><i class="fa fa-heart fa-lg "></i>&nbsp;&nbsp; </span>
													</a> 
											
										<?php							
											}
											 
										?>
									</span>									
									</div>
								</p>
								
						</div>				
					</div>
		
		
		<?php 
				if($ii>=4){ $ii=0;?>
					<div class="clearfix"></div> 
				<?php
				}
			$ii++;	
		
		
		$i++;
		
	endwhile; 
		$dirs_json ='';
		if(!empty($dirs_data)){
			$dirs_json =json_encode($dirs_data);
		}
	 
	?>	
	<!-- end of the loop -->	
		<!--
		paging plugin
		https://wordpress.org/plugins/wp-pagenavi/screenshots/
		-->
		<div class="clearfix"></div>
		<?php if (function_exists('wp_pagenavi')) : ?>
				<div class="col-md-12 text-center">
				<?php wp_pagenavi(); ?>
				</div>
			<?php else: 
				?>
					<div class="clearfix"></div> 
					<div class="row">			
						<div class="col-sm-6 col-md-6 nav-next"><?php previous_posts_link( '<div class=""> <div class="fa fa-arrow-circle-left"></div>'.__( ' Newer Entries', 'ivdirectories' ).'</div>' ); ?></div>
					<div class="col-sm-6 col-md-6 nav-previous"><?php next_posts_link( '<div class="">'.__( ' Older Entries ', 'ivdirectories' ).'<div class="fa fa-arrow-circle-right"></div></div>' ); ?></div>
					</div>
		  <?php endif; ?>
		<!--END .navigation-links-->
			
			<div class="clearfix"></div> 	
		<?php wp_reset_postdata(); ?>

		<?php else :
			$dirs_json='';
		 ?>
				<div class="col-md-12 iv-top-buffer">
					<?php _e( 'Sorry, no posts matched your criteria.' ); ?>
				</div>
		<?php endif; ?>
		</div>
		
		<div> <p>&nbsp;</p></div>
	</div>
	
</div>


<script src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<!--
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" />
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	-->	
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>			
			<script type="text/javascript">								
                   
					
				function initialize() {
					var center = new google.maps.LatLng('<?php echo $ins_lat; ?>', '<?php echo $ins_lng; ?>');
					//var center = new google.maps.LatLng(49, 2.56);
					

					var map = new google.maps.Map(document.getElementById('map'), {
						zoom: 4,
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
<?php 


 ?>
