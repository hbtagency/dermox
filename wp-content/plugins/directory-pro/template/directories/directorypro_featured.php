<?php
wp_enqueue_style('iv_directories-style-1109', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-ar-script-21', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_style('iv_directories-style-11010', wp_iv_directories_URLPATH . 'admin/files/css/image_gallery.css');

$feature_post_ids =array();
if(isset($atts['post_ids'])){
		$feature_post_ids = explode(",", $atts['post_ids']);
}

?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	<div class="bootstrap-wrapper ">
		<div class="row">
			<div class="row">		
				<div class="col-md-12 ">	
					<div class="categories-imgs text-center">
			
						<?php
						foreach($feature_post_ids as $fpost){
							
							 $id =$fpost;
							 $post = get_post($id);
							 
								$feature_img='';
								if(has_post_thumbnail($id)){ 
									$feature_image = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'large' );
									if($feature_image[0]!=""){ 							
										$feature_img =$feature_image[0];
									}					
								}else{
									$feature_img= wp_iv_directories_URLPATH."/assets/images/default-directory.jpg";					
								
								}
								
								$currentCategory=wp_get_object_terms( $id, 'directories-category');
								$cat_link='';$cat_name='';$cat_slug='';
								if(isset($currentCategory[0]->slug)){										
									$cat_slug = $currentCategory[0]->slug;
									$cat_name = $currentCategory[0]->name;
									
									$cat_link= get_term_link($currentCategory[0], 'directories-category');
									
								}
							?>
							
							<a href="<?php echo get_post_permalink($id); ?>" style="color:#000000;">
												
								<img src="<?php echo $feature_img; ?>" style="width:325px; height:178px;">																	
								<span style="font-size:18px;"><?php echo $post->post_title;  ?></span>
								<div class="categories-wrap-shadow"></div>
								<div class="inner-meta ">
									<div><?php echo $post->post_title;  ?></div>
									<small><?php echo $cat_name; ?></small>
								</div>
							</a>
							
						<?php
						
						}
				
			?>
			</div>
		</div>
	</div>
	</div>
</div>
