<?php
wp_enqueue_style('wp-iv_directories-bidding-style-101', wp_iv_directories_URLPATH . 'admin/files/css/bidding.css');
wp_enqueue_style('wp-iv_directories-bidding-style-102', wp_iv_directories_URLPATH . 'admin/files/css/colorbox.css');
wp_enqueue_script('wp-iv_directories-bidding-script-103', wp_iv_directories_URLPATH . 'admin/files/js/jquery.colorbox-min.js');

	$currencies = array();
	$currencies['AUD'] ='$';$currencies['CAD'] ='$';
	$currencies['EUR'] ='€';$currencies['GBP'] ='£';
	$currencies['JPY'] ='¥';$currencies['USD'] ='$';
	$currencies['NZD'] ='$';$currencies['CHF'] ='Fr';
	$currencies['HKD'] ='$';$currencies['SGD'] ='$';
	$currencies['SEK'] ='kr';$currencies['DKK'] ='kr';
	$currencies['PLN'] ='zł';$currencies['NOK'] ='kr';
	$currencies['HUF'] ='Ft';$currencies['CZK'] ='Kč';
	$currencies['ILS'] ='₪';$currencies['MXN'] ='$';
	$currencies['BRL'] ='R$';$currencies['PHP'] ='₱';
	$currencies['MYR'] ='RM';$currencies['AUD'] ='$';
	$currencies['TWD'] ='NT$';$currencies['THB'] ='฿';	
	$currencies['TRY'] ='TRY';	$currencies['CNY'] ='¥';		
	$currencies['INR'] ='₹';	
	$currencyCode= get_option('_iv_directories_api_currency');
	
	$currencyCode=(isset($currencies[$currencyCode]) ? $currencies[$currencyCode] :$currencyCode );

	$profile_url=get_permalink(); 
	global $current_user;
	global $wpdb;
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
$radius=get_option('_iv_radius');
if($radius==''){$radius='50';}	

$dir_search_redius=get_option('_dir_search_redius');	
if($dir_search_redius==""){$dir_search_redius='Km';}	
							
?>     
	<div class="profile-content"> 
		<div class="portlet-title tabbable-line clearfix">
			<div class="caption caption-md">
			  <span class="caption-subject"> <?php
				$iv_post = $directory_url;
				_e('Bidding System','ivdirectories');		
				?></span>
			</div>					
		</div>
        <div class="row tabbable-line"  >              
			<div class="col-sm-2">	
			</div>
			<div class="col-sm-3 row-centered " style=" margin-bottom:15px"><strong><?php _e('Current Search Rank (Trend) by Locality ['.$radius.' '.$dir_search_redius.' Radius]','ivdirectories');	?></strong>
			</div>	
			<div class="col-sm-3 row-centered "><strong><?php _e('My Bid Amount / day','ivdirectories');?> </strong>
			</div>	
			<div class="col-sm-4 row-centered "><strong><?php _e('Bid for Higher Rank / day','ivdirectories');?>  </strong>
			</div>				
		</div>
			
		<?php  // foreach ($rooms as $room):
	    	$per_page=10;$row_strat=0;$row_end=$per_page;
			$current_page=0 ;
			if(isset($_REQUEST['cpage']) and $_REQUEST['cpage']!=1 ){   
				$current_page=$_REQUEST['cpage']; $row_strat =($current_page-1)*$per_page; 
				$row_end=$per_page;
			}
			$sql="SELECT * FROM $wpdb->posts WHERE post_type = '".$iv_post."' and post_author='".$current_user->ID."' and post_status IN ('publish','pending','draft' ) limit ".$row_strat.", ".$row_end;									
			$authpr_post = $wpdb->get_results($sql);	    	
	    	foreach ( $authpr_post as $row )								
			{	
				$categories = get_the_category($row->ID);$row_category ='';
				if(isset( $categories[0]->cat_name)){$row_category = $categories[0]->cat_name;}
	    	 ?>
				<div class="row" >              
					<div class="col-sm-2">	  <strong><a href="<?php echo get_permalink($row->ID); ?>" ><?php echo $row->post_title; ?></a></strong> 
						<?php $feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $row->ID), 'medium' ); 
							if($feature_image[0]!=""){ ?>												
								<a href="<?php echo get_permalink($row->ID); ?>" > <img title="profile image"   src="<?php  echo $feature_image[0]; ?>"></a>
							<?php												
							}
						?>
						<small>						
							  <?php
							  $edit_post= $profile_url.'?&profile=post-edit&post-id='.$row->ID;	
							  ?>
							  <a href="<?php echo $edit_post; ?>" class="btn btn-xs green-haze" ><?php _e('Edit','ivdirectories'); ?> </a> 
							  <a href="<?php echo $profile_url.'?&profile=all-post&delete_id='.$row->ID ;?>"  onclick="return confirm('Are you sure to delete this post?');"  class="btn btn-xs btn-danger">X										
								</a>							
						  </small> 		
					</div>
					<div class="col-sm-3 row-centered ">	
						<?php
											
						$paid_category_range=0;
						$paid_area_count=0;
						$top_bump_amount=0;
						$bump_dir=0;
						$lat=get_post_meta($row->ID,'latitude',true);
						$long=get_post_meta($row->ID,'longitude',true);
						$radius=get_option('_iv_radius');
						
						$directory_ids=array();
						$nearest_listing = $this->get_nearest_listing($lat,$long,$radius);
						
						$bump_exp_date =get_post_meta($row->ID,'_bump_exp_date',true);
						$bump_amount  = get_post_meta($row->ID,'_bump_amount',true); 
						$bump_create_date= get_post_meta($row->ID,'_bump_create_date',true);
						
						if(strtotime($bump_exp_date)>= time()){	
													
							$bump_dir=1;							
							foreach ($nearest_listing as $nearest_listing_row) {										
								if($nearest_listing_row->ID!=$row->ID ){
									$near_bump_exp_date=get_post_meta($nearest_listing_row->ID,'_bump_exp_date',true);
									$near_bump_create_date= get_post_meta($nearest_listing_row->ID,'_bump_create_date',true);
									$near_bump_amount= get_post_meta($nearest_listing_row->ID,'_bump_amount',true);												
									if(strtotime($near_bump_exp_date)>=time()){														
											if($near_bump_amount >$bump_amount ){															
													
													if (!in_array($nearest_listing_row->ID, $directory_ids)) {
														$paid_area_count++;														
														$directory_ids[]=$nearest_listing_row->ID;	
													}											
											}
											if($bump_amount == $near_bump_amount ){
												 if(strtotime($bump_create_date) < strtotime($near_bump_create_date )){
														if (!in_array($nearest_listing_row->ID, $directory_ids)) {
															$paid_area_count++;														
															$directory_ids[]=$nearest_listing_row->ID;	
														}															
												 }	
											}											
									}
								}
								
							}
						
						}else{
									
							foreach ($nearest_listing as $nearest_listing_row) {
								
									if($nearest_listing_row->ID!=$row->ID ){
											// Here category Check wiil set*****											
											$near_bump_exp_date=get_post_meta($nearest_listing_row->ID,'_bump_exp_date',true);	
											if(strtotime($near_bump_exp_date)>=time()){											
												
												if (!in_array($nearest_listing_row->ID, $directory_ids)) {
														$paid_area_count++;														
														$directory_ids[]=$nearest_listing_row->ID;	
												}	
										}
									}
									
								}
						}
						
							
							$i=1;
							$free_area_count=0;
							$free_category_range=0;
							
							if($bump_dir==0){								
								foreach ($nearest_listing as $nearest_listing_row) {
									if($nearest_listing_row->ID!=$row->ID ){	
										$near_bump_create_date= get_post_meta($nearest_listing_row->ID,'_bump_create_date',true);
											
										if(strtotime($nearest_listing_row->post_date)>strtotime($row->post_date)){
														
													if (!in_array($nearest_listing_row->ID, $directory_ids)) {
														$free_area_count++;															
														$directory_ids[]=$nearest_listing_row->ID;	
													}	
														
														
										}
									}
									
								}
							}		
						
						
						
						$category_range=1+$paid_category_range+$free_category_range;
						
						$area_count=1+$paid_area_count+$free_area_count;
						
						
						if($bump_dir ==1){
							if($top_bump_amount<=0){
									$top_bump_amount=$top_bump_amount + $bump_amount + .01;
									$new_bid_amount=$bump_amount+.01;
							 }else{
								 $top_bump_amount=$top_bump_amount +.01;
								 $new_bid_amount=$bump_amount+.01;
							}
						}else{							
							$top_bump_amount=$top_bump_amount+.01;
							$new_bid_amount=get_option('_bid_start_amount');
							if($new_bid_amount==""){ $new_bid_amount='.01';}
													
						
						}
						
						if($row->post_status=='publish'){?>
						<span class="badge-up"><img style="width:10px"  src="<?php echo  wp_iv_directories_URLPATH."/assets/images/arrowUp.png";?>" /><?php echo $area_count; ?></span>
						<div style=" margin-top:15px">
						<?php _e('For','ivdirectories'); ?><br/><?php echo get_post_meta($row->ID,'address',true); ?>
						</div>
						<?php
							}else{ ?>
							<div style=" margin-top:15px">
								<span class="badge-up"><br/></span> <br/><?php echo get_post_meta($row->ID,'address',true); ?>
							</div>	
						<?php
							}
						?>	
					
					</div>	
					<div class=" col-sm-3 row-centered "   >
						<span class="bid-amount">
							<?php 
							if($bump_dir==0){
								echo "Free";
							}else{	
								
								if($bump_amount>0){
									echo $currencyCode. number_format($bump_amount, 2);
								}else{
									echo "Free";
								}
								 
					
							}	 ?> 
						</span>
						<div style=" margin-top:15px">
							<?php
							if(get_post_meta($row->ID,'_bump_amount_total',true)>0){ ?>							
									<?php _e('Total Spent:','ivdirectories'); ?> <?php echo $currencyCode; ?><?php echo get_post_meta($row->ID,'_bump_amount_total',true); ?><br />
							<?php
							}
							?>
						</div>
						<!--<a href="#">Put a limit on total</a> -->
					</div>	
					<div class=" col-lg-4 col-md-4 col-sm-12 col-xs-12  bid row-centered "  >	<?php if($row->post_status=='publish'){?>
								<span><?php echo $currencyCode.$new_bid_amount; ?></span><a class='popup-bid' href="<?php echo admin_url('admin-ajax.php').'?action=iv_directories_bidding_popup&dir-id='.$row->ID.'&new-amount='.$new_bid_amount.'&category_range='.$category_range.'&area_count='.$area_count ?>"><?php _e('Bid','ivdirectories'); ?> </a><div style=" margin-top:15px">
									<?php _e('Enter or more to bid the top rank','ivdirectories'); ?> 
								</div>
									
							<?php
							}else{ ?>
								<?php echo $row->post_status; ?>  
						<?php
							}
						?>		
					</div>						
				</div>	
			<div class="row tabbable-line" style=" margin-top:15px" >   
			</div>
			
			<?php
			
			}
			
			?>
	
	
	
					
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
							echo '<li class="list-pagi '.($i==$current_page  ? 'active-li': '').'"><a href="'.get_permalink().'?&profile=bidding&cpage='.$i.'"> '.$i.'</a></li>';		
														
					}
					echo'</ul>';
				
				?>
				 </div> 
		 
   
</div>
			
		
          <!-- END PROFILE CONTENT -->
 <script>
function populate_bump(){
		//jQuery.colorbox.close();	
		document.location.reload(true);
	  
}		 
jQuery(document).ready(function($) {		
		jQuery(".popup-bid").colorbox({transition:"None", width:"650px", height:"390px" ,opacity:"0.70"});
		
})	
</script> 
