<?php
wp_enqueue_style('iv_directories-style-1109', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-ar-script-21', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_style('iv_directories-style-11010', wp_iv_directories_URLPATH . 'admin/files/css/image_gallery.css');

global $post,$wpdb,$tag;
?>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

	
	<div class="bootstrap-wrapper ">
		<div class="row"> 				
		<div class="row">
			<div class="col-md-12">	
			<div class="categories-imgs text-center">
				<?php
						if( isset($_POST['submit'])){
							$selected = $_POST['directories-category'];
						}
							//directories
							$taxonomy = 'directories-category';
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
								//'parent'            => '0',
								'hierarchical'      => true, 
								'child_of'          => 0,
								'childless'         => false,								
								'show_count'               => '1', 
																
							);
				$terms = get_terms($taxonomy,$args); // Get all terms of a taxonomy
				if ( $terms && !is_wp_error( $terms ) ) :
						$i=0;
						foreach ( $terms as $term_parent ) {  
							
							if($term_parent->count>0){
								
								$feature_img_id = get_option('_cate_main_image_'.$term_parent->term_id);
								$feature_img='';								
								$feature_image = wp_get_attachment_image_src( $feature_img_id, 'large' ); 
								if($feature_image[0]!=""){ 
									$feature_img=$feature_image[0];
									$feature_img_width=$feature_image[1];
									$feature_img_height=$feature_image[2];
									
								}
								 $cat_link= get_term_link($term_parent , 'directories-category');
							?>							
								<a href="<?php echo $cat_link; ?>" style="color:#000000;">
									
									<img src="<?php echo $feature_img; ?>" style="width:325px; height:178px;">																	
									<span style="font-size:18px;"><?php echo $term_parent->name; ?></span>
									<div class="categories-wrap-shadow"></div>
									<div class="inner-meta ">
										<div><?php echo $term_parent->name; ?></div>
										<small>(<?php echo $term_parent->count; ?>)</small>
									</div>
								</a>
						<?php
							}	
						}
				endif;										
				?>		
			</div>
			</div>
		</div>			
	
	
	</div>
</div>
