<?php
global $post,$wpdb,$tag;
$radius=get_option('_iv_radius');
$keyword_post='';
?>
<style>
.search-border{
	 border: 1px solid #c6c3c4;
	 padding: 20px 20px 20px 20px;
}
.cbp-search-select {
  height: 36px;
  padding: 0 0px 0 12px;
  margin: ;
  border-radius: 1px;
  border: 1px solid #c6c3c4;
  font: 400 12px "Open Sans", sans-serif;
  width: 100%; 
 }  
.cbp-search-input {
  height: 36px;
  padding: 0 0px 0 12px;
  margin: ;
  border-radius: 1px;
  border: 1px solid #c6c3c4;
  font: 400 12px "Open Sans", sans-serif;
  width: 100%; }
</style>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<div style="max-width: 380px;">		
  <div class="search-border">
	
	<div class="" style="margin-top:8px">
		<h5><strong><?php _e( 'Find Your Listing ', 'ivdirectories' ); ?> </strong></h5>
	 </div>	
	
	<form class="form" action="<?php echo get_post_type_archive_link( 'directories' ) ; ?>" method="POST"  onkeypress="return event.keyCode != 13;">
	 
	 <div class="" style="margin-top:8px">
		<?php _e( 'Keyword', 'ivdirectories' ); ?> 
	 </div>	
	 <div class="form-group" style="margin-top:8px">						
			<input type="text" class="cbp-search-input" id="keyword" name="keyword"  placeholder="<?php _e( 'Keyword', 'ivdirectories' ); ?>" value="<?php echo $keyword_post; ?>">
	  </div>
	  <div class="" style="margin-top:8px">
		<?php _e( 'Listing Type', 'ivdirectories' ); ?> 
	 </div>	
	  <div class="" style="margin-top:8px">
					<?php
				echo '<select name="directories-category" class="cbp-search-select">';
				echo'	<option selected="'.$selected.'" value="">'.__('Any Category','ivdirectories').'</option>';
				
						
						if( isset($_POST['submit'])){
							$selected = $_POST['directories-category'];
						}
							//property
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
									'type'                     => 'directories',						
									'parent'                   => $term_parent->term_id,
									'orderby'                  => 'name',
									'order'                    => 'ASC',
									'hide_empty'               => 1,
									'hierarchical'             => 1,
									'exclude'                  => '',
									'include'                  => '',
									'number'                   => '',
									'taxonomy'                 => 'directories-category',
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
		 <div class="" style="margin-top:8px">
			<?php _e( 'Location', 'ivdirectories' ); ?> 
		</div>	
		<div class="form-group" style="margin-top:8px">							
				<input type="text" class="cbp-search-input " id="address" name="address"  placeholder="<?php _e( 'Location', 'ivdirectories' ); ?>" 
				value="">
				<input type="hidden" id="latitude" name="latitude" placeholder="Latitude" value="" >
				<input type="hidden" id="longitude" name="longitude" placeholder="Longitude"  value="">
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
					<input type="range" name="range" id="range" min="1" max="1000" style="width: 100%;" value="<?php echo $radius;?>" onchange="range.value=value">	
					<input type="hidden" name="range_value" id="range_value" value="<?php echo $radius; ?>" >							
				</div>	
		</div>	  
		
		<div class="form-group" style="margin-top:8px">
			<button type="submit" id="submit" name="submit"  class="btn btn-default "><?php _e('Search','ivdirectories'); ?> </button>	
		</div>	
	</form>			
	</div>
</div>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>	
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
jQuery('input[name="range"]').on("change", function() { 
		//jQuery(this).next().html(jQuery(this).val() + '%');
		jQuery('#rvalue').html(jQuery(this).val());
		jQuery('#range_value').val(jQuery(this).val());
		//console.log(jQuery(this).val());
})	
</script>	
 
